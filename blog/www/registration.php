<?php

require_once __DIR__ . '/../init.php';
//var_dump($_POST);

//$date = isset($_POST['post'] ? $_POST['post'] : []);
$data = $_POST['user'] ?? []; // PHP 7
$errors = []; //Создаем пустой массив
$user = []; //Создаем пустой массив
$id = $data['user'] ?? $_GET['user']; //Получаем введенный идент. Если нет то из GET
//проверка на существование

if ($id) {
    $user = userGetById((int) $id);

    if (!$user) {
        header($_SERVER['SERVER_PROTOCOL'] .  '404');
        exit ('Юзер не найден');
    }
}

// отправлен
if ($data) {
    $user = userSave($data);

    if (!$errors) {
        header('location: registration.php?user=' . $user['user']);
        exit;
    }
//всплывающее сообшщение с ошибками
}

?>

<?php include  __DIR__ . '/../app/views/layout/header.php'; ?>

<form method="post">
<div>
    <label for="user_name">имя</label>
    <input type="text" id="user_name" name="user[name]" value="<?= $user['name'] ?? '' ?>"><!--имя или пустоту-->
</div>
    <div>
        <label for="user_password">пароль</label>
        <input type="password"  name="user[password]" id="user_password" value="<?= $user['password'] ?? '' ?>"><!--пароль или пустоту-->
    </div>

    <?php if (isset($user['id'])): ?>
    <input type="hidden" name="user['user']" value="<?= $user['user'] ?>">
    <?php endif; ?>
    <div>
        <input type="submit" value="htubcnhfwbz">
    </div>
</form>

<?php include __DIR__ . '/../app/views/layout/footer.php'; ?>
