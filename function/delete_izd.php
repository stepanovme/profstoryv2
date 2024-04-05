<?php
// delete_tickets.php

// Подключение к базе данных
include '../database/conn_mysql.php';

// Получение данных из запроса
$data = json_decode(file_get_contents('php://input'), true);
$ticketIds = $data['ticketIds'];
$ticketData = $data['ticketData'];

// Удаление выбранных заявок из базы данных
foreach ($ticketIds as $ticketId) {
    $sql = "DELETE FROM ProductListCad WHERE ProductListCadId = $ticketId";
    $conn->query($sql);
}


foreach ($ticketData as $ticketData){
    // Получаем суммарное количество для всех продуктов с таким же $TicketListCadId
$sql_sum = "SELECT SUM(ProductListCadQuantity) AS totalQuantity FROM ProductListCad WHERE TicketListCadId = ?";
$statement = $conn->prepare($sql_sum);
$statement->bind_param("i", $ticketData);
$statement->execute();
$result = $statement->get_result();
$row = $result->fetch_assoc();
$totalQuantity = $row['totalQuantity'];
$statement->close();

// Обновляем $TicketListCadId
$sql_update_total = "UPDATE TicketListCad SET TicketListCadQuantity = ? WHERE TicketListCadId = ?";
$update_total = $conn->prepare($sql_update_total);
$update_total->bind_param("ii", $totalQuantity, $ticketData);
$update_total->execute();
$update_total->close();

echo "Данные успешно обновлены";
}


// Закрываем соединение с базой данных
$conn->close();

// Возвращаем успешный статус
http_response_code(200);
?>