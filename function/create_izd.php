<?php

$TicketListCadId = $_POST['TicketListCadId'];

include '../database/conn_mysql.php';

// Вставка новой заявки в базу данных с указанием TicketListCadId
$sql = "INSERT INTO ProductListCad (TicketListCadId) VALUES ($TicketListCadId)";
if ($conn->query($sql) === TRUE) {
    // Возвращаем успешный статус
    http_response_code(200);
} else {
    // Возвращаем ошибку, если что-то пошло не так
    http_response_code(500);
}

// Закрываем соединение с базой данных
$conn->close();
?>