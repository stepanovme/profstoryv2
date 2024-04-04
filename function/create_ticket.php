<?php

$projectListCadId = $_POST['projectListCadId'];

include '../database/conn_mysql.php';

// Получение текущего максимального номера заявки
$sql = "SELECT MAX(TicketListCadId) AS maxId FROM TicketListCad";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$maxId = $row['maxId'];

// Создание уникального имени для новой заявки
$ticketName = "Заявка на гибку из плоского листа №" . ($maxId + 1);

// Вставка новой заявки в базу данных с указанием projectListCadId
$insertSql = "INSERT INTO TicketListCad (TicketListCadName, projectListCadId) VALUES ('$ticketName', $projectListCadId)";
if ($conn->query($insertSql) === TRUE) {
    // Возвращаем успешный статус
    http_response_code(200);
} else {
    // Возвращаем ошибку, если что-то пошло не так
    http_response_code(500);
}

// Закрываем соединение с базой данных
$conn->close();
?>