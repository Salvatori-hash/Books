<?php
    $host = 'localhost';
    $database = 'books';
    $user = 'root';
    $password = '';

    $mysqli = mysqli_connect($host, $user, $password, $database);

    if (mysqli_connect_errno($mysqli)) {
        echo "Не удалось подключиться к MySQL: " . mysqli_connect_error();
    }
?>
