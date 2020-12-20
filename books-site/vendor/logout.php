<?php
session_start();
header('Location: ../index.php');
unset($_SESSION['user']);

$_SESSION['message'] = 'Вы вышли с аккаунта';
?>