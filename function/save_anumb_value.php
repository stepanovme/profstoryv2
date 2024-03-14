<?php
// Подключение к базе данных MySQL
include '../database/conn_mysql.php';

// Получение данных из POST-запроса
$kompListId = $_POST['kompListId'];
$selectedValue = $_POST['selectedValue'];

// Экранирование данных
$kompListId = mysqli_real_escape_string($conn, $kompListId);
$selectedValue = mysqli_real_escape_string($conn, $selectedValue);

// SQL-запрос для обновления значения ANUMB
$sql = "UPDATE kompContent SET anumb = '$selectedValue' WHERE kompListId = '$kompListId'";

// Выполнение запроса
if (mysqli_query($conn, $sql)) {
    echo "Значение ANUMB успешно обновлено";
} else {
    echo "Ошибка: " . $sql . "<br>" . mysqli_error($conn);
}

// Закрытие соединения с базой данных MySQL
mysqli_close($conn);
?>
