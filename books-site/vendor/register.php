<?php
header('Location: ../login.php'); 
require_once '../dbconnect.php';

$username = strip_tags(trim($_POST['username']));
$email = strip_tags(trim($_POST['email']));
$password = strip_tags(trim($_POST['password']));

$password = password_hash($password, PASSWORD_BCRYPT);

$query = "INSERT INTO user (name, email, password) VALUES ('$username', '$email', '$password')";
$res = mysqli_query($mysqli, $query);

if (!$res) {
    die (mysqli_error($mysqli));
} 
?>