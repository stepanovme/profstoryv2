<?php
// delete_tickets.php

// ����������� � ���� ������
include '../database/conn_mysql.php';

// ��������� ������ �� �������
$data = json_decode(file_get_contents('php://input'), true);
$ticketIds = $data['ticketIds'];

// �������� ��������� ������ �� ���� ������
foreach ($ticketIds as $ticketId) {
    $sql = "DELETE FROM TicketListCad WHERE TicketListCadId = $ticketId";
    $conn->query($sql);
}

// ��������� ���������� � ����� ������
$conn->close();

// ���������� �������� ������
http_response_code(200);
?>