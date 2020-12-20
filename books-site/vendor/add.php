<?php
header('Location: ../index.php');
session_start();
require_once '../dbconnect.php';
require_once '../add-book.php';

// Если флаг на добавление, до добавляем запись
if (!empty($_POST['submit']) && $_POST['submit'] == 'Добавить') {
    add($mysqli);
}

function add(&$mysqli) {
    // Очищаем пришедшие данные от HTML и PHP тегов
    $author = strip_tags($_POST['author']);
    $title = strip_tags($_POST['title']);
    $category = strip_tags($_POST['type']);
    $year = strip_tags($_POST['year']);

    $query = "INSERT INTO book (author, title, category, year) VALUES ('$author', '$title', '$category', '$year')";
    $res = mysqli_query($mysqli, $query);

    if (!$res) {
        die (mysqli_error($mysqli));
    } 

    // Если количество затронутых запростом записей равно 1 (одна запись добавлена)
    // то выводим сообщение
    if (mysqli_affected_rows($mysqli) == 1) {
        $_SESSION['message'] = 'Книга добавлена';
    }
}
?>
