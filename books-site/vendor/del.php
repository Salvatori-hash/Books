<?php
session_start();
require_once './index.php';

// Если флаг на удаление и идентификатор записи не пустой
if (isset($_SESSION['user']) && !empty($_GET['del']) && !empty((int)$_GET['id'])) {
    del($mysqli);
}

function del(&$mysqli) {
    $id = (int)$_GET['id'];
    $query = "DELETE FROM book WHERE id = $id";
    $res = mysqli_query($mysqli, $query);

    if (!$res) {
        die (mysqli_error($mysqli));
    } 

    // Если количество затронутых запростом записей равно 1 (одна запись удалена)
    // то выводим сообщение
    if (mysqli_affected_rows($mysqli) == 1) {
        $_SESSION['message'] = 'Книга удалена';
    }
}
?>