<?php

const STORAGE_DB_DIR = ROOT_DIR . DIRECTORY_SEPARATOR . 'db';
const STORAGE_FILENAME_PATTERN = '%d.json';

function storageCreateFilename ($entity, $id)
{
    return storageGetDir($entity) . DIRECTORY_SEPARATOR . sprintf(STORAGE_FILENAME_PATTERN, $id);
}

function storageGetDir($entity) //Получает путь к директории
{
    return STORAGE_DB_DIR . DIRECTORY_SEPARATOR . str_replace(['/', '\\'], '_', $entity);
}

function storageGetIdFromFilename($filename)
{
    $filename = basename($filename);
    sscanf($filename, STORAGE_FILENAME_PATTERN, $id);
    return (int) $id;

}

function storageGetNextId($entity)
{
    $dir = storageGetDir($entity);
    if (!is_readable($dir)){
        return 0;
    }

    $ids = array_map('storageGetIdFromFilename', scandir($dir));
    $ids = array_filter($ids);
    //var_dump($ids);
    //exit;
    //$id = max($ids);
    return $ids ? max($ids) + 1 : 1;
}

function storageGetItemBy($entity, $attribute, $criteria)
{
   /* array_filter(storageGetAll($entity), function ($item)
    {
        if (isset($item[$attribute])){

        }
    });
   */

   $items = [];
   $storedItems = storageGetAll($entity);

   foreach ($storedItems as $storedItem){
       if(isset($storedItem[$attribute]) && $storedItem[$attribute] == $criteria)
       {
           $items[] = $storedItem;
       }
   }

   return $items;
}

function storageGetItemById ($entity, $id)
{
    $filename = storageCreateFilename($entity, $id);

    if (is_readable($filename)){ //проверка на наличие и чтение файла.
        return json_decode(file_get_contents($filename), true); //чтение json и разбор.
    }
    return null;
}

function storageGetAll($entity)
{
    $items = [];
    $files = scandir(storageGetDir($entity));

    foreach ($files as $filename){
        $id = storageGetIdFromFilename($filename);
        $item = storageGetItemById($entity, $id);

        if ($item){
            $items[] = $item;
        }
    }
    return $items;
}

function storageSaveItem($entity, array &$item)
{
    $dir = storageGetDir($entity);
    $succes = true;
    if(!file_exists($dir)) {
        $succes = mkdir($dir, 0755, true);
    }
    //доп. проверка
    if (!$succes) {
    return false;
    }


    $id = $item['id'] ?? 0; //проверка на существование ключа и добавление, если есть.
    $storedItem = storageGetItemById($entity, $id) ?? [];

    if ($id && !$storedItem){
        return false;
    }

    $item = array_merge($storedItem, $item); //Обновляем и объеденяем массивы.

    if (!$id) {
        $id = storageGetNextId($entity);
        $item['created'] = time();
    }
    $item['id'] = (int) $id;
    $item['update'] = time();

    $filename = storageCreateFilename($entity, $id);

    return $status = file_put_contents($filename, json_encode($item), LOCK_EX);
}
