<?php 
include 'db_mysql.php';

$conn = new mysqli($host, $username, $password, $dbname);
$conn->set_charset("cp1251");

// Проверка соединения
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>