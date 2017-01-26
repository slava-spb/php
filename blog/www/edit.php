<?php

require_once __DIR__ . '/../init.php';
//var_dump($_POST);

if (!isAuthorize()) {
    header('location: login.php');
    exit;
}


//$date = isset($_POST['post'] ? $_POST['post'] : []);
$data = $_POST['post'] ?? []; // PHP 7
$errors = []; //Создаем пустой массив
$post = []; //Создаем пустой массив
$id = $data['id'] ?? $_GET ?? null; //Получаем введенный идент. Если нет то из GET,  если нет то null
//проверка на существование
if ($id) {
    $post = postGetById((int) $id);

    if (!$post) {
        header($_SERVER['SERVER_PROTOCOL'] .  '404');
        exit ('Запись не найдена');
    }
}

//если форма отправлена
if ($data) {
    $msg = 'Запись успешно' . ($id ? 'обновлена' : 'добавлена');
    $post = postSave($data, $errors);

    if (!$errors) {
    //всплывающее сообщение об успехе
        header('location: edit.php?id=' . $post['id']);
        exit;
    }
//всплывающее сообшщение с ошибками
}

?>

<?php include  __DIR__ . '/../app/views/layout/header.php'; ?>

<h1>
    <?= isset($post['id']) ? 'Редактировать запись' : 'Новая запись' ?>
</h1>
<form method="post">
<div>
    <label for="post_title">Заголовок</label>
    <input type="text" id="post_title" name="post[title]" value="<?= $post['title'] ?? '' ?>"><!--таитл или пустоту-->
</div>
    <div>
        <label for="post_content">Содержимое</label>
        <textarea name="post[content]" id="post_content"><?= $post['content'] ?? '' ?></textarea><!--контент поста или пустоту-->
    </div>

    <?php if (isset($post['id'])): ?>
    <input type="hidden" name="post[id]" value="<?= $post['id'] ?>">
    <?php endif; ?>

    <div>
        <input type="submit" value="Send">
    </div>
</form>

<?php include __DIR__ . '/../app/views/layout/footer.php'; ?>
