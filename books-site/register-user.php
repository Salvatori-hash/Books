<?php
session_start();
if (isset($_SESSION['user'])) {
    header('Location: /books-site/index.php');
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css">
    <title>Регистрация</title>
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
                    ?>
                    </ul>
                </div>
        </nav>

        <h2 class="mt-3">Регистрация</h2>

        <form action="vendor/register.php" method="post" class="mt-3">
            <div class="form-group center" style="width: 28em">
                <label for="username">Имя пользователя</label>
                <input type="text" class="form-control" id="username" name="username" required>

                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" name="email" required>

                <label for="password">Пароль</label>
                <input type="password" class="form-control" id="password" name="password" required>

                <button type="submit" class="btn btn-primary mt-3" name="submit">Зарегистрироваться</button>
            </div>
        </form>
    </div>
</body>
</html>