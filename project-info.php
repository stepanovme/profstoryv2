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

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/favicon/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/project-info.css">
    <title>������</title>
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
                <div class="nav-link active">
                    <img src="/assets/icons/report.svg" alt="">
                    <a href="index.php">�������</a>
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
                <a href="index.php" class="back">< ��������</a>
                <div class="wrapper-head">
                    <div class="menu">
                        <a class="active">�������</a>
                        <a>�������</a>
                        <a>�����������</a>
                        <a>������</a>
                    </div>
                    <div></div>
                </div>
                <div class="info-project">

                    <?php 
                    if (isset($_GET['PNUMB'])) {
                        // �������� �������� ���������
                        $projectNumber = $_GET['PNUMB'];
                        
                        // ����� ����� ������������ �������� $projectNumber ��� ������� ������ ������ �� ���� ������
                        // ��������:
                        // $sql = "SELECT * FROM LISTPRJ WHERE PNUMB = '$projectNumber'";
                        // ���������� ������� � ����� ������
                    } else {
                        // ���� �������� �� ��� �������, ������� ��������� �� ������ ��� ��������� ������ ��������
                        echo "������: �� ������� ����� �������";
                    }
                    ?>

                    <table>
                        <tr>
                            <td>������ � </td>
                            <td><?php echo $projectNumber; ?></td>
                            <td>����� �</td>
                            <td>6</td>
                            <td>������ �������</td>
                            <td>6</td>
                        </tr>
                        <tr>
                            <td>��������</td>
                            <td>6</td>
                            <td>�����������</td>
                            <td>6</td>
                            <td>���������</td>
                            <td>6</td>
                        </tr>
                        <tr>
                            <td>������</td>
                            <td>6</td>
                            <td>���� �</td>
                            <td>6</td>
                            <td>����������</td>
                            <td>6</td>
                        </tr>
                        <tr>
                            <td>��������</td>
                            <td>6</td>
                            <td>�����������</td>
                            <td>6</td>
                            <td>��������</td>
                            <td>6</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>