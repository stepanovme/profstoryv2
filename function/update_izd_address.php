<?php
header('Content-Type: text/html; charset=WIN1251'); 

// Подключение к базе данных
include '../database/conn_mysql.php';

$anumb = $_POST['anumb'];
$newValue = $_POST['newValue'];

$newValue_cp1251 = iconv("UTF-8", "CP1251", $newValue);
$anumb_cp1251 = iconv("UTF-8", "CP1251", $anumb);

try {
    $sql = "UPDATE ProductListCad SET ProductListCadAddress  = ? WHERE ProductListCadId = ?";
    $update = $conn->prepare($sql);
    $update->bind_param("si", $newValue_cp1251, $anumb_cp1251);
    $update->execute();
    $update->close();
    echo "�������!";
} catch (PDOException $e) {
    echo "������: " . $e->getMessage();
}
?>
