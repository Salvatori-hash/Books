<?php
session_start();
require_once 'dbconnect.php';
require_once 'vendor/del.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Главная страница</title>
</head>
<body>
    <div class="content container">
        <nav class="container content navbar navbar-expand-lg navbar-light bg-light">
            <div class="collapse navbar-collapse" id="navbarText">
                <ul class="navbar-nav mr-auto">
                    <li class="nav-item active">
                        <a class="nav-link" href="/books-site/index.php">Главная</a>
                    </li>

                    <?php
                    if (isset($_SESSION['user'])) {
                    ?>
                        <li class="nav-item active">
                            <li class="nav-link"><?= $_SESSION['user']['name'] ?></li>
                        </li>
                    <?php 
                    } 
                    ?>

                    <?php
                    if (!isset($_SESSION['user'])) {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link register" href="/books-site/register-user.php">Зарегистрироваться</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/books-site/login.php">Войти</a>
                        </li>
                    <?php 
                    }
                    else {
                    ?>
                        <li class="nav-item">
                            <a class="nav-link register" href="/books-site/add-book.php">Добавить книгу</a>
                        </li>

                        <li class="nav-item">
                            <a class="nav-link" href="/books-site/vendor/logout.php">Выйти</a>
                        </li>
                    <?php
                    }
                    ?>
                </ul>
            </div>
        </nav>

        <?php
        if (isset($_SESSION['message'])) {
        ?>

        <div class="alert alert-success mt-3" role="alert">
            <?= $_SESSION['message'] ?>
            <button type="button" class="close"><span aria-hidden="true">&times;</span></button>
        </div>

        <?php
        }
        unset($_SESSION['message']);
        ?>

        <h2 class="mt-3">Список книг</h2>

        <div class="container content mt-3 flex">
            <?php 
                $query = "SELECT * FROM book";
                $res = mysqli_query($mysqli, $query);

                if (!$res) die (mysqli_error($mysqli));
                
                while ($row = mysqli_fetch_assoc($res)) { ?>
                <?php 
                echo $_SESSION['del-book']; 
                unset($_SESSION['del-book']); 
                ?>
                <div class="card flex card-m" style="width: 20rem;">
                    <div class="card-body">
                        <h5 class="card-text"><?= $row['Title'] ?></h5>
                        <p class="card-text">Автор: <?= $row['Author'] ?></p>
                        <p class="card-text">Категория: <?= $row['Category'] ?></p>
                        <p class="card-text">Год: <?= $row['Year'] ?></p>

                        <?php
                        if (isset($_SESSION['user'])) {
                        ?>
                            <a href="" class="card-link delete" id="del" data-del="<?= $row['id']?>">Удалить</a>
                            <a href="/books-site/update-book.php?id=<?= $row['id'] ?>" class="card-link">Редактировать</a>
                        <?php
                        }
                        ?>

                    </div>
                </div><br>
            <?php } ?>
        </div>
    </div>

    <script src="scripts/main.js"></script>
</body>
</html>