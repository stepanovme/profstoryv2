<?php 
header('Content-Type: text/html; charset=WIN1251'); 

session_start();

if (!isset($_SESSION['userId'])) {
    // ���� ������ �� �����������, �������������� ������������ �� �������� �����
    header("Location: auth.php");
    exit;
}

$userId = $_SESSION['userId'];

$sql = "SELECT user.*, role.roleName 
        FROM user 
        INNER JOIN role ON user.roleId = role.roleId 
        WHERE user.userId = '$userId'";

@include './database/conn_mysql.php';

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // �������� ������ �� ���������� �������
    $row = $result->fetch_assoc();
    // ��������� �������� ������� pathBD � ��������� ��� � ���������� ���������� $pathDB
    $pathDB = $row['pathBD'];
} else {
    echo "0 results";
}

// �������� �������� kompListId �� GET-�������
if (isset($_GET['kompListId'])) {
    // �������� �������� ���������
    $kompListId = $_GET['kompListId'];
} else {
    // ���� �������� �� ��� �������, ������� ��������� �� ������ ��� ��������� ������ ��������
    echo "������: �� ������� ����� ���������";
    exit; // ����� �� �������, ����� �������� ���������� ���������
}
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/favicon/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/kompl-content.css">
    <title>���������</title>
</head>
<body>
    <div class="page">
        <div class="side">
            <button class="logo" onclick="window.location.href = 'index.php'">
                PROF-INTEGRATE
            </button>
            <div class="nav">
                <p class="side-title">������� ����</p>
                <div class="nav-link">
                    <img src="/assets/icons/dashbord-icon.svg" alt="">
                    <a href="materialValues.php">��</a>
                </div>
                <div class="nav-link">
                    <img src="/assets/icons/report.svg" alt="">
                    <a href="index.php">�������</a>
                </div>
                <div class="nav-link active">
                    <img src="/assets/icons/report.svg" alt="">
                    <a href="kompl-list.php">���������</a>
                </div>
                <div class="nav-link">
                    <img src="/assets/icons/gear.svg" alt="">
                    <a href="settings.php">���������</a>
                </div>
            </div>
        </div>

        <div class="content">
            <header>
                <div class="profile">
                    <img src="/assets/icons/avatar.svg" class="avatar">
                    <div class="information">
                        <p class="name"><?php echo $_SESSION['name'] . " " . $_SESSION['surname'];?></p>
                        <p class="role">
                        <?php
                        if($_SESSION['roleId'] = 2){
                            echo '�������������';
                        } else {
                            echo '������������';
                        }
                        ?>
                        </p>
                    </div>
                </div>
            </header>

            <div class="wrapper">
                <div class="wrapper-head">

                <?php

                $pathDB_escaped = mysqli_real_escape_string($conn, $pathDB);

                $sql = "SELECT * FROM kompList WHERE kompListId = $kompListId";

                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()){
                    $KonplName = $row['kompListName'];
                }

                // ���� ����� ���� ����������, ������������ � ������
                if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create-kompl-content'])) {
                    // ������������ � ���� ������
                    include './database/conn_mysql.php';

                    // ��������� ������� ����������
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    }

                    // ���������� ������������� ���������
                    $kompListId = mysqli_real_escape_string($conn, $kompListId);

                    // SQL-������ ��� ���������� ������ � ������� kompContent
                    $sql = "INSERT INTO kompContent (kompListId) VALUES ('$kompListId')";

                    // ���������� �������
                    if (mysqli_query($conn, $sql)) {
                        // ����� ��������� ���������� ������, �������������� ������������ �� ������� �������� ��� POST-������
                        header("Location: " . $_SERVER['REQUEST_URI']);
                        exit; // ����� �� ������� ����� ���������������
                    } else {
                        echo "������: " . $sql . "<br>" . mysqli_error($conn);
                    }

                }
                ?>

                    <h1>���������� ��������� <?php echo $KonplName; ?></h1>
                    <div>
                        <div class="buttons">
                            <form method="post">
                                <input type="hidden" name="kompListId" value="<?php echo $kompListId; ?>">
                                <button class="create-kompl-content" name="create-kompl-content">
                                    ��������
                                </button>
                            </form>
                            <button class="delete-kompl-content">
                                �������
                            </button>
                        </div>
                    </div>
                </div>
                <a href="kompl-list.php" class="back-button">< ��������</a>
                <?php

                $pathDB_escaped = mysqli_real_escape_string($conn, $pathDB);

                $sql = "SELECT * FROM kompContent WHERE kompListId = $kompListId";

                $result = $conn->query($sql);

                echo "<table>";
                echo "<thead>
                        <tr>
                            <th></th>
                            <th><a href='#'>�</a></th>
                            <th><a href='#'>�������</th>
                            <th><a href='#'>��������</th>
                            <th><a href='#'>����</th>
                            <th><a href='#'>�������</th>
                        </tr>
                    </thead>";
                echo "<tbody>";

                $NUM = 0;

                while ($row = $result->fetch_assoc()){
                    $NUM = $NUM + 1;
                    echo "<tr>";
                    echo "<td><input type='checkbox' class='row-checkbox' data-id='".$row['kompContentId']."'></td>";
                    echo "<td>".$NUM."</td>";
                    echo "<td class='editable-name' contenteditable='true' data-id='".$row['kompContentId']."'>".$row['anumb']."</td>";
                    echo "<td>��������</td>";
                    echo "<td class='editable-clnum' contenteditable='true' data-id='".$row['kompContentId']."'>".$row['clnum']."</td>";
                    echo "<td class='editable-formula' contenteditable='true' data-id='".$row['kompContentId']."'>".$row['formula']."</td>";
                    echo "</tr>";
                }

                echo "</table>";
                ?>

            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script> 
    <script src="/js/jquery.js"></script>
    <script src="/js/kompl-content.js"></script>
</body>
</html>