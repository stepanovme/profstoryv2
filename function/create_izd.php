<?php

$TicketListCadId = $_POST['TicketListCadId'];

include '../database/conn_mysql.php';

// ������� ����� ������ � ���� ������ � ��������� TicketListCadId
$sql = "INSERT INTO ProductListCad (TicketListCadId) VALUES ($TicketListCadId)";
if ($conn->query($sql) === TRUE) {
    // ���������� �������� ������
    http_response_code(200);
} else {
    // ���������� ������, ���� ���-�� ����� �� ���
    http_response_code(500);
}

// ��������� ���������� � ����� ������
$conn->close();
?>