<?php
header('Content-Type: text/html; charset=WIN1251'); 

// Подключение к базе данных
include '../database/conn_mysql.php';

$anumb = $_POST['anumb'];
$newValue = $_POST['newValue'];
$TicketListCadId = $_POST['TicketListCadId'];

$newValue_cp1251 = iconv("UTF-8", "CP1251", $newValue);
$anumb_cp1251 = iconv("UTF-8", "CP1251", $anumb);
$TicketListCadId_cp1251 = iconv("UTF-8", "CP1251", $TicketListCadId);

try {
    $sql = "UPDATE ProductListCad SET ProductListCadLength = ? WHERE ProductListCadId = ?";
    $update = $conn->prepare($sql);
    $update->bind_param("si", $newValue_cp1251, $anumb_cp1251);
    $update->execute();
    $update->close();
    
    $sql_metr = "UPDATE ProductListCad SET ProductListCadMetr = ProductListCadLength * 0.001 * ProductListCadQuantity;";
    $update = $conn->prepare($sql_metr);
    $update->execute();
    $update->close();

    $sql_sum_metr = "SELECT SUM(ProductListCadMetr) AS totalMetr FROM ProductListCad WHERE TicketListCadId = ?";
    $statement = $conn->prepare($sql_sum_metr);
    $statement->bind_param("i", $TicketListCadId_cp1251);
    $statement->execute();
    $result = $statement->get_result();
    $row = $result->fetch_assoc();
    $totalQuantity = $row['totalMetr'];
    $statement->close();

    $sql_update_total = "UPDATE TicketListCad SET TicketListCadMetr = ? WHERE TicketListCadId = ?";
    $update_total = $conn->prepare($sql_update_total);
    $update_total->bind_param("ii", $totalQuantity, $TicketListCadId_cp1251);
    $update_total->execute();
    $update_total->close();

} catch (PDOException $e) {
    echo "������: " . $e->getMessage();
}
?>
