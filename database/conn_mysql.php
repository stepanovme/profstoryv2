<?php 
include 'db_mysql.php';

$conn = new mysqli($host, $username, $password, $dbname);
$conn->set_charset("cp1251");

// $conn = new mysqli($host, $username, $password, $dbname);
// $conn->set_charset("windows-1251"); // Убедитесь, что правильно указано название кодировки


// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>