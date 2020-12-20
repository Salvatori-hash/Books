<?php
session_start();
header('Location: ../index.php');
require_once '../dbconnect.php';
require_once '../update-book.php';

$book_id = $_POST['id'];

// Если флаг на добавление, до добавляем запись
if (!empty($_POST['submit']) && $_POST['submit'] == 'Обновить') {
    update($mysqli, $book_id);
}

function update(&$mysqli, &$book_id) {
    // Очищаем пришедшие данные от HTML и PHP тегов
    $author = strip_tags($_POST['author']);
    $title = strip_tags($_POST['title']);
    $category = strip_tags($_POST['type']);
    $year = strip_tags($_POST['year']);

    $query = "UPDATE `book` SET `Author` = '$author', `Title` = '$title', `Category` = '$category', `Year` = '$year' WHERE `book`.`id` = '$book_id'";
    $res = mysqli_query($mysqli, $query);

    if (!$res) {
        die (mysqli_error($mysqli));
    } 

    // Если количество затронутых запростом записей равно 1 (одна запись добавлена)
    // то выводим сообщение
    if (mysqli_affected_rows($mysqli) == 1) {
        $_SESSION['message'] = 'Книга обновлена';
    }
}
?>