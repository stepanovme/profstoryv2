<?php
header('Content-Type: text/html; charset=WIN1251'); 

// ÐŸÐ¾Ð´ÐºÐ»ÑŽÑ‡ÐµÐ½Ð¸Ðµ Ðº Ð±Ð°Ð·Ðµ Ð´Ð°Ð½Ð½Ñ‹Ñ…
include '../database/conn_mysql.php';

$anumb = $_POST['anumb'];
$newValue = $_POST['newValue'];

$newValue_cp1251 = iconv("UTF-8", "CP1251", $newValue);
$anumb_cp1251 = iconv("UTF-8", "CP1251", $anumb);

try {
    $sql = "UPDATE ProductListCad SET ProductListCadLength = ? WHERE ProductListCadId = ?";
    $update = $conn->prepare($sql);
    $update->bind_param("si", $newValue_cp1251, $anumb_cp1251);
    $update->execute();
    $update->close();
    echo "Óñïåøíî!";
} catch (PDOException $e) {
    echo "Îøèáêà: " . $e->getMessage();
}
?>
