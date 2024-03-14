<?php
// Подключение к базе данных
include '../database/conn_mysql.php';

// Проверка наличия соединения
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Получение данных из POST-запроса
$ids = json_decode($_POST['ids']);

// Экранируем идентификаторы строк
$escaped_ids = array_map(function($id) use ($conn) {
    return mysqli_real_escape_string($conn, $id);
}, $ids);

// Собираем SQL-запрос для удаления строк
$sql = "DELETE FROM kompContent WHERE kompContentId IN ('" . implode("','", $escaped_ids) . "')";

// Выполнение запроса
if (mysqli_query($conn, $sql)) {
    echo "Строки успешно удалены";
} else {
    echo "Ошибка: " . $sql . "<br>" . mysqli_error($conn);
}

// Закрытие соединения
mysqli_close($conn);
?>
