<?php

$projectListCadId = $_POST['projectListCadId'];

include '../database/conn_mysql.php';

// ��������� �������� ������������� ������ ������
$sql = "SELECT MAX(TicketListCadId) AS maxId FROM TicketListCad";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$maxId = $row['maxId'];

// �������� ����������� ����� ��� ����� ������
$ticketName = "������ �� ����� �� �������� ����� �" . ($maxId + 1);

// ������� ����� ������ � ���� ������ � ��������� projectListCadId
$insertSql = "INSERT INTO TicketListCad (TicketListCadName, projectListCadId) VALUES ('$ticketName', $projectListCadId)";
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