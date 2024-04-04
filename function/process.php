<?php 
include '../database/conn_mysql.php';
mysqli_set_charset($conn, "utf8"); // ������������� ��������� UTF-8 ��� ������ � ����� ������
header('Content-Type: text/html; charset=utf-8'); // ������������� ��������� ��� ������ ������ � UTF-8


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // ���������, ���������� �� ����������� ������ � �������
    if (isset($_POST['projectName']) && isset($_POST['responsibleUserId'])) {
        // �������� ������ �� �����
        $projectName = $_POST['projectName'];
        $responsibleUserId = $_POST['responsibleUserId'];

        // ���������� ������� INSERT
        $sql = "INSERT INTO projectListCad (projectListCadName, projectListCadResponsible, StatusCadId) VALUES (?, ?, 1)";
        
        // ���������� � ���������� ������� � �������������� ��������������� ���������
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $projectName, $responsibleUserId); // "si" - ������ ������ ����������: s - ������, i - ����� �����
        $stmt->execute();

        // ��������� ���������� ���������� �������
        if ($stmt->affected_rows > 0) {
            echo "������ ������� ��������!";
        } else {
            echo "������ ��� ���������� �������: " . $conn->error;
        }

        // ��������� �������������� ��������� � ���������� � ����� ������
        $stmt->close();
        $conn->close();
    } else {
        echo "�� ������� �������� ����������� ������ �� �����.";
    }
} else {
    echo "Error: ����� �� ���� ����������.";
}

?>