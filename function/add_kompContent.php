<?php
header('Content-Type: text/html; charset=WIN1251'); 
if(isset($_GET['kompListId']) && !empty($_GET['kompListId'])) {
    $kompListId = $_GET['kompListId'];
    
    // ����������� � ���� ������ � ���������� SQL-�������
    include '../database/conn_mysql.php';

    // �������� ������� ����������
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $kompListId_escaped = mysqli_real_escape_string($conn, $kompListId);

    // SQL-������ ��� ������� ����� ������ � ��������� ��������� kompListId
    $sql = "INSERT INTO kompContent (kompListId) VALUES ('$kompListId_escaped')";

    if (mysqli_query($conn, $sql)) {
        $sql = "SELECT * FROM kompContent WHERE kompListId = '$kompListId_escaped'";
        $result = $conn->query($sql);
        // ��������� HTML ��� ������ �������
    $output = "
    <div class='wrapper-head'>
        <p class='title'>���������� ���������</p>
        <div class='buttons'>
            <button class='addButton' data-kompListId=". htmlspecialchars($kompListId).">��������</button>
            <button class='deleteButton'>�������</button>
        </div>
    </div>
    <table>
        <thead>
            <tr>
                <th><a href='#'>�������</a></th>
                <th><a href='#'>��������</th>
                <th><a href='#'>����</th>
                <th><a href='#'>�������</th>
            </tr>
        </thead>
        <tbody>";

        while ($row = $result->fetch_assoc()){
        $output .= "<tr>";
        $output .= "<td>".$row['anumb']."</td>";
        $output .= "<td>��������</td>"; // �������� ��� �������� �� ��������������� ���� ����� �������
        $output .= "<td>".$row['clnum']."</td>";
        $output .= "<td>".$row['formula']."</td>";
        $output .= "</tr>";
        }

        $output .= "</tbody></table>";

        echo $output;
    } else {
        echo "������ ��� ���������� ������: " . mysqli_error($conn);
    }

    // �������� ����������
    mysqli_close($conn);
} else {
    echo "������������ �������� kompListId";
}
?>

