<?php

include '../database/conn_mysql.php';

$ticketId = $_POST['id'];
$newValue = mysqli_real_escape_string($conn, $_POST['value']);

$newValue_cp1251 = iconv("UTF-8", "CP1251", $newValue);

try {
    $sql = "UPDATE TicketListCad SET TicketListCadColor = ? WHERE TicketListCadId = ?";
    $update = $conn->prepare($sql);

    $update->bind_param("si", $newValue_cp1251, $ticketId);

    $update->execute();

    $update->close();

    echo "Успешно!";
} catch (Exception $e) {
    echo "Ошибка: " . $e->getMessage();
}
?>
