<?php
header('Content-Type: text/html; charset=WIN1251'); 

// РџРѕРґРєР»СЋС‡РµРЅРёРµ Рє Р±Р°Р·Рµ РґР°РЅРЅС‹С…
include '../database/conn_mysql.php';

$anumb = $_POST['anumb'];
$newValue = $_POST['newValue'];
$TicketListCadId = $_POST['TicketListCadId'];

$newValue_cp1251 = iconv("UTF-8", "CP1251", $newValue);
$anumb_cp1251 = iconv("UTF-8", "CP1251", $anumb);
$TicketListCadId_cp1251 = iconv("UTF-8", "CP1251", $TicketListCadId);

try {
    $sql = "UPDATE ProductListCad SET ProductListCadQuantity = ? WHERE ProductListCadId = ?";
    $update = $conn->prepare($sql);
    $update->bind_param("si", $newValue_cp1251, $anumb_cp1251);
    $update->execute();
    $update->close();
    echo "Успешно!";

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

    // Получаем суммарное количество для всех продуктов с таким же $TicketListCadId
    $sql_sum = "SELECT SUM(ProductListCadQuantity) AS totalQuantity FROM ProductListCad WHERE TicketListCadId = ?";
    $statement = $conn->prepare($sql_sum);
    $statement->bind_param("i", $TicketListCadId_cp1251);
    $statement->execute();
    $result = $statement->get_result();
    $row = $result->fetch_assoc();
    $totalQuantity = $row['totalQuantity'];
    $statement->close();

    // Обновляем $TicketListCadId
    $sql_update_total = "UPDATE TicketListCad SET TicketListCadQuantity = ? WHERE TicketListCadId = ?";
    $update_total = $conn->prepare($sql_update_total);
    $update_total->bind_param("ii", $totalQuantity, $TicketListCadId_cp1251);
    $update_total->execute();
    $update_total->close();

    echo "Данные успешно обновлены";

} catch (PDOException $e) {
    echo "Ошибка: " . $e->getMessage();
}
?>
