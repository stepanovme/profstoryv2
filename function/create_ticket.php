<?php

$projectListCadId = $_POST['projectListCadId'];

include '../database/conn_mysql.php';

// ��������� �������� ������������� ������ ������
$sql = "SELECT MAX(TicketListCadNum) AS maxId FROM TicketListCad";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$maxId = $row['maxId'];

// �������� ����������� ����� ��� ����� ������
$Num = $maxId + 1;
$ticketName = "������ �� ����� ������� �";

// ������� ����� ������ � ���� ������ � ��������� projectListCadId
$insertSql = "INSERT INTO TicketListCad (TicketListCadName, TicketListCadNum, projectListCadId) VALUES ('$ticketName', $Num, $projectListCadId)";
if ($conn->query($insertSql) === TRUE) {
    // ���������� �������� ������
    http_response_code(200);
} else {
    // ���������� ������, ���� ���-�� ����� �� ���
    http_response_code(500);
}

// ��������� ���������� � ����� ������
$conn->close();
?>