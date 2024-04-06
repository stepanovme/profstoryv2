<?php
// delete_tickets.php

// ����������� � ���� ������
include '../database/conn_mysql.php';

// ��������� ������ �� �������
$data = json_decode(file_get_contents('php://input'), true);
$ticketIds = $data['ticketIds'];
$ticketDataArray = $data['ticketData']; // ������������� ���������� ��� ��������� ��������� ����

// �������� ��������� ������ �� ���� ������
foreach ($ticketIds as $ticketId) {
    $sql = "DELETE FROM ProductListCad WHERE ProductListCadId = ?";
    $statement = $conn->prepare($sql);
    $statement->bind_param("i", $ticketId);
    $statement->execute();
    $statement->close();
}

// ���������� ������ ��� ������ ������
foreach ($ticketDataArray as $ticketData) {
    // �������� ��������� ���������� ��� ���� ��������� � ����� �� $TicketListCadId
    $sql_sum = "SELECT SUM(ProductListCadQuantity) AS totalQuantity FROM ProductListCad WHERE TicketListCadId = ?";
    $statement = $conn->prepare($sql_sum);
    $statement->bind_param("i", $ticketData);
    $statement->execute();
    $result = $statement->get_result();
    $row = $result->fetch_assoc();
    $totalQuantity = $row['totalQuantity'];
    $statement->close();

    // ��������� $TicketListCadId
    $sql_update_total = "UPDATE TicketListCad SET TicketListCadQuantity = ? WHERE TicketListCadId = ?";
    $update_total = $conn->prepare($sql_update_total);
    $update_total->bind_param("ii", $totalQuantity, $ticketData);
    $update_total->execute();
    $update_total->close();

    // ��������� ������ ��� ������ ������
    $sql_update_metr = "UPDATE TicketListCad SET TicketListCadMetr = (SELECT SUM(ProductListCadLength * 0.001 * ProductListCadQuantity) FROM ProductListCad WHERE TicketListCadId = ?) WHERE TicketListCadId = ?";
    $update_metr = $conn->prepare($sql_update_metr);
    $update_metr->bind_param("ii", $ticketData, $ticketData);
    $update_metr->execute();
    $update_metr->close();
}

echo "������ ������� ���������";

// ��������� ���������� � ����� ������
$conn->close();

// ���������� �������� ������
http_response_code(200);
?>
