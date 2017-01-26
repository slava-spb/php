<?php

/*$posts = [
    [
        'id' => 0,
        'title' => 'Запись №1',
        'content' => 'Текст записи №1',
        'created' => 564654,
        'updated' => 56478321,
    ],
    [
        'id' => 1,
        'title' => 'Запись №2',
        'content' => 'Текст записи №2',
        'created' => 2342,
        'updated' => 456,
    ],
    [
        'id' => 2,
        'title' => 'Запись №3',
        'content' => 'Текст записи №3',
        'created' => 2341232,
        'updated' => 412356,
    ],
];
*/
const ROOT_DIR = __DIR__;

require_once ROOT_DIR . '/libs/storage.php';
require_once ROOT_DIR . '/libs/sanitize.php';
require_once ROOT_DIR . '/libs/models/user.php';
require_once ROOT_DIR . '/libs/auth.php';
require_once ROOT_DIR . '/libs/view.php';

require_once  ROOT_DIR . '/app/models/post.php';

session_start();