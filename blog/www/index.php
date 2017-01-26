
<?php require_once __DIR__ . '/../init.php' ?>
<?php include  __DIR__ . '/../app/views/layout/header.php'; ?>

    <?php  foreach ($posts as $post): ?>

        <section class="post">
            <header>
                <h2>
                    <a href="show.php?id=<?= $post['id'] ?>">
                        <?= $post['title'] ?>
                    </a>
                </h2>
                <ul>
                    <li>Создан <?php echo date ('Y-m-d H-m-s', $post['created'])?></li>
                    <li>Обновлен <?= $post['updated'] ?> </li>
                </ul>
            </header>
            <div>
                <?= $post['content'] ?>
            </div>
            <footer></footer>
        </section>
    <!-- Заканчиваем foreach -->
    <?php endforeach; ?>

<?php include __DIR__ . '/../app/views/layout/footer.php'; ?>

<?php echo __DIR__  ?>
<?php echo __FILE__ ?>