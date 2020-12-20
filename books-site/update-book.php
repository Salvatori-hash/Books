<?php
session_start();
require_once 'dbconnect.php';

if (!isset($_SESSION['user'])) {
    header('Location: /books-site/index.php');
}

if (!empty($_GET['id'])) {
    $book_id = (int)$_GET['id'];
    $query = mysqli_query($mysqli, "SELECT * FROM `book` WHERE `id` = '$book_id'");
    $book = mysqli_fetch_assoc($query);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Редактирование</title>
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

        <h2 class="mt-3">Редактирование</h2>

        <form action="vendor/update.php" method="post">
            <div class="form-group center" style="width: 28em">
                <input type="hidden" name="id" value="<?= $book['id'] ?>">
                
                <label for="author">Автор</label>
                <input type="text" id="author" name="author" class="form-control" value="<?= $book['Author'] ?>">

                <label for="title">Заголовок</label>
                <input type="text" id="title" name="title" class="form-control" value="<?= $book['Title'] ?>">

                <label for="category">Категория</label>
                <input type="text" id="category" name="type" class="form-control" value="<?= $book['Category'] ?>">

                <label for="year">Год</label>
                <input type="text" id="year" name="year" class="form-control" value="<?= $book['Year'] ?>">

                <input type="submit" name="submit" class="btn btn-primary mt-3" value="Обновить">
            </div>
        </form>
    </div>
</body>
</html>