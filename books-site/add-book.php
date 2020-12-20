<?php
session_start();
require_once 'dbconnect.php';

if (!isset($_SESSION['user'])) {
    header('Location: /books-site/index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Добавление книги</title>
</head>

<body>
    <div class="container">
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

        <h2 class="mt-3">Добавление книги</h2>

        <form action="vendor/add.php" method="post" class="mt-3">
            <div class="form-group center" style="width: 28em">
                <label for="author">Автор</label>
                <input type="text" class="form-control" id="author" name="author">

                <label for="title">Заголовок</label>
                <input type="text" class="form-control" id="title" name="title">

                <label for="category">Категория</label>
                <input type="text" class="form-control" id="category" name="type">

                <label for="year">Год</label>
                <input type="text" class="form-control" id="year" name="year">

                <input type="submit" class="btn btn-primary mt-3" name="submit" value="Добавить">
            </div>
        </form>
    </div>
</body>
</html>