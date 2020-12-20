<?php
session_start();
require_once '../dbconnect.php';

$username = strip_tags(trim($_POST['username']));
$password = strip_tags(trim($_POST['password']));

$query = "SELECT * FROM `user` WHERE `name` = '$username'";
$res = mysqli_query($mysqli, $query);

$user = mysqli_fetch_assoc($res);

if (password_verify($password, $user['password'])) {
    $_SESSION['user'] = [
        "id" => $user['id'],
        "name" => $user['name'],
    ];
    $_SESSION['message'] = 'Успешный вход';
    header('Location: ../index.php');
} else {
    $_SESSION['message'] = 'Неверный логин или пароль';
    header('Location: ../login.php');
}

if (!$res) {
    die (mysqli_error($mysqli));
}
?>