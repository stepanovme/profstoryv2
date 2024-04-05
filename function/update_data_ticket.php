<?php

include '../database/conn_mysql.php';

$ticketId = $_POST['id'];
$newValue = mysqli_real_escape_string($conn, $_POST['value']);

try {
    $sql = "UPDATE TicketListCad SET TicketListCadNum = ? WHERE TicketListCadId = ?";
    $update = $conn->prepare($sql);

    $update->bind_param("si", $newValue, $ticketId);

    $update->execute();

    $update->close();

    echo "Успешно!";
} catch (Exception $e) {
    echo "Ошибка: " . $e->getMessage();
}
?>
