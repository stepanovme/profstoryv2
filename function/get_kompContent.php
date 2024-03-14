<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
</head>
<body>
<?php
header('Content-Type: text/html; charset=WIN1251'); 
if(isset($_GET['kompListId'])) {
    $kompListId = $_GET['kompListId'];
    
    // ����������� � ���� ������ � ���������� SQL-�������
    include '../database/conn_mysql.php';

    // �������� ������� ����������
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $kompListId_escaped = mysqli_real_escape_string($conn, $kompListId);

    $sql = "SELECT * FROM kompContent WHERE kompListId = '$kompListId_escaped'";

    $result = $conn->query($sql);

    // ��������� HTML ��� ������ �������
    $output = "
            <div class='wrapper-head'>
                <p class='title'>����������</p>
                <div class='buttons'>+
                    <button class='addButton' data-kompListId=". htmlspecialchars($kompListId).">��������</button>
                    <button class='deleteButton'>�������</button>
                </div>
            </div>
            <table id='contentTable'>
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
        $output .= "<td class='editable' data-id='".$row['kompListId']."'>".$row['anumb']."</td>";
        $output .= "<td class='editable' data-id='".$row['kompListId']."'>��������</td>";
        $output .= "<td class='editable' data-id='".$row['kompListId']."'>".$row['clnum']."</td>";
        $output .= "<td class='editable' data-id='".$row['kompListId']."'>".$row['formula']."</td>";
        $output .= "</tr>";
    }

    $output .= "</tbody></table>";

    echo $output;

    // �������� ����������
    mysqli_close($conn);
}
?>
</body>
</html>