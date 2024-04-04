<?php
// delete_tickets.php

// Подключение к базе данных
include '../database/conn_mysql.php';

// Получение данных из запроса
$data = json_decode(file_get_contents('php://input'), true);
$ticketIds = $data['ticketIds'];

// Удаление выбранных заявок из базы данных
foreach ($ticketIds as $ticketId) {
    $sql = "DELETE FROM TicketListCad WHERE TicketListCadId = $ticketId";
    $conn->query($sql);
}

// Закрываем соединение с базой данных
$conn->close();

// Возвращаем успешный статус
http_response_code(200);
?>