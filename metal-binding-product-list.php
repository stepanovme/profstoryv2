<?php 
header('Content-Type: text/html; charset=WIN1251'); 

session_start();

if (!isset($_SESSION['userId'])) {
    // ���� ������ �� �����������, �������������� ������������ �� �������� �����
    header("Location: auth.php");
    exit;
}

$userId = $_SESSION['userId'];

@include './database/conn_mysql.php';

$sql = "SELECT roleId from user where userId = $userId";

$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
    $roleId = $row['roleId'];
}

if($roleId == 3){
    header("Location: index.php");
    exit;
}

$sql = "SELECT user.*, role.roleName 
        FROM user 
        INNER JOIN role ON user.roleId = role.roleId 
        WHERE user.userId = '$userId'";

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // �������� ������ �� ���������� �������
    $row = $result->fetch_assoc();
    // ��������� �������� ������� pathBD � ��������� ��� � ���������� ���������� $pathDB
    $pathDB = $row['pathBD'];
} else {
    echo "0 results";
}

// �������� �������� projectListCadId �� GET-�������
if (isset($_GET['projectListCadId'])) {
    // �������� �������� ���������
    $projectListCadId = $_GET['projectListCadId'];
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
    <link rel="stylesheet" href="css/metal-binding-product-list.css">
    <title>����� ������</title>
</head>
<body>
    <div class="page">
        <div class="side">
            <button class="logo" onclick="window.location.href = 'index.php'">
                PROF-INTEGRATE
            </button>
            <?php 
            $sql = "SELECT user.*, role.roleName 
            FROM user 
            INNER JOIN role ON user.roleId = role.roleId 
            WHERE user.userId = '$userId'";

            $result = $conn->query($sql);

            while($row = $result->fetch_assoc()){
                $roleName = $row['roleName'];
            }
            switch($roleName){
                case '�������������':
                    echo '<div class="nav">
                            <p class="side-title">������� ����</p>
                            <div class="nav-link">
                                <img src="/assets/icons/dashbord-icon.svg" alt="">
                                <a href="materialValues.php">��</a>
                            </div>
                            <div class="nav-link">
                                <img src="/assets/icons/project.svg" alt="">
                                <a href="index.php">�������</a>
                            </div>
                            <div class="nav-link">
                                <img src="/assets/icons/report.svg" alt="">
                                <a href="kompl-list.php">���������</a>
                            </div>
                            <div class="nav-link active">
                                <img src="/assets/icons/pencil.svg" alt="">
                                <a href="metal-binding-list.php">����� �������</a>
                            </div>
                            <div class="nav-link">
                                <img src="/assets/icons/lock.svg" alt="">
                                <a href="administrator.php">����������</a>
                            </div>
                            <div class="nav-link">
                                <img src="/assets/icons/gear.svg" alt="">
                                <a href="settings.php">���������</a>
                            </div>
                        </div>';
                        break;
                case '��������':
                    echo '<div class="nav">
                            <p class="side-title">������� ����</p>
                            <div class="nav-link">
                                <img src="/assets/icons/dashbord-icon.svg" alt="">
                                <a href="materialValues.php">��</a>
                            </div>
                            <div class="nav-link">
                                <img src="/assets/icons/project.svg" alt="">
                                <a href="index.php">�������</a>
                            </div>
                            <div class="nav-link">
                                <img src="/assets/icons/report.svg" alt="">
                                <a href="kompl-list.php">���������</a>
                            </div>
                            <div class="nav-link active">
                                <img src="/assets/icons/pencil.svg" alt="">
                                <a href="metal-binding-list.php">����� �������</a>
                            </div>
                            <div class="nav-link">
                                <img src="/assets/icons/lock.svg" alt="">
                                <a href="administrator.php">����������</a>
                            </div>
                            <div class="nav-link">
                                <img src="/assets/icons/gear.svg" alt="">
                                <a href="settings.php">���������</a>
                            </div>
                        </div>';
                        break;
                case '�������������':
                    echo '<div class="nav">
                            <p class="side-title">������� ����</p>
                            <div class="nav-link">
                                <img src="/assets/icons/dashbord-icon.svg" alt="">
                                <a href="materialValues.php">��</a>
                            </div>
                            <div class="nav-link">
                                <img src="/assets/icons/project.svg" alt="">
                                <a href="index.php">�������</a>
                            </div>
                            <div class="nav-link">
                                <img src="/assets/icons/report.svg" alt="">
                                <a href="kompl-list.php">���������</a>
                            </div>
                            <div class="nav-link">
                                <img src="/assets/icons/gear.svg" alt="">
                                <a href="settings.php">���������</a>
                            </div>
                        </div>';
                        break;
                case '������':
                    echo '<div class="nav">
                            <p class="side-title">������� ����</p>
                            <div class="nav-link active">
                                <img src="/assets/icons/pencil.svg" alt="">
                                <a href="metal-binding-list.php">����� �������</a>
                            </div>
                        </div>';
                        break;
                case '��������':
                    echo '<div class="nav">
                            <p class="side-title">������� ����</p>
                            <div class="nav-link active">
                                <img src="/assets/icons/pencil.svg" alt="">
                                <a href="metal-binding-list.php">����� �������</a>
                            </div>
                        </div>';
                        break;
                case '������������':
                    echo '';
                    break;
            }
            ?>
        </div>

        <div class="content">
            <header>
                <div class="profile">
                    <img src="/assets/icons/avatar.svg" class="avatar">
                    <div class="information">
                        <p class="name"><?php echo $_SESSION['name'] . " " . $_SESSION['surname'];?></p>
                        <p class="role">
                        <?php
                        $sql = "SELECT user.*, role.roleName 
                        FROM user 
                        INNER JOIN role ON user.roleId = role.roleId 
                        WHERE user.userId = '$userId'";

                        $result = $conn->query($sql);

                        while($row = $result->fetch_assoc()){
                            $roleName = $row['roleName'];
                        }

                        echo $roleName;
                        ?>
                        </p>
                    </div>
                </div>
            </header>

            <div class="wrapper">
                <p class="back" onclick="window.location.href = 'metal-binding-list.php'">< ��������</p>
                <div class="menu">
                    <a href="#" class="active">������</a>
                    <a href="#">���������</a>
                </div>
                <div class="wrapper-head">
                    <h1>������ ������</h1>
                    <div>
                        <div class="buttons">
                            <form method="post">
                                <button class="create-ticket" id="create-ticket" name="create-ticket">
                                    �������
                                </button>
                            </form>
                            <button class="delete-ticket">
                                �������
                            </button>
                        </div>
                    </div>
                </div>

                <div class="komp-list">
                        <table>
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>�</th>
                                    <th>��������</th>
                                    <th>������</th>
                                    <th>����</th>
                                    <th>�������</th>
                                    <th>���.�.</th>
                                    <th>����</th>
                                    <th>�������</th>
                                    <th>������</th>
                                </tr>
                            </thead>
                            <tbody>
                        <?php

                        $sql = "SELECT t.TicketListCadId, t.TicketListCadName, t.TicketListCadObject, t.TicketListCadColor, t.TicketListCadThickness, t.TicketListCadBrigade, t.TicketListCadAddress, t.TicketListCadDate, t.TicketListCadQuantity, t.TicketListCadMetr, t.TicketListCadNum, t.projectListCadId, t.StatusCadId, s.StatusName
                        FROM TicketListCad t
                        INNER JOIN StatusCad s ON t.StatusCadId = s.StatusCadId
                        WHERE t.projectListCadId = $projectListCadId";

                        $result = $conn->query($sql);
        
                        $NUM = 0;
        
                        while ($row = $result->fetch_assoc()){
                            $NUM = $NUM + 1;
                            echo "<tr data-id='" . $row['TicketListCadId'] ."'>";
                            echo "<td><input type='checkbox' class='row-checkbox'></td>";
                            echo "<td onclick=\"window.location.href = 'metal-binding.php?TicketListCadId=".$row['TicketListCadId']."'\">".$NUM."</td>";
                            echo "<td onclick=\"window.location.href = 'metal-binding.php?TicketListCadId=".$row['TicketListCadId']."'\">".$row['TicketListCadName'].$row['TicketListCadNum']."</td>";
                            echo "<td onclick=\"window.location.href = 'metal-binding.php?TicketListCadId=".$row['TicketListCadId']."'\">".$row['TicketListCadObject']."</td>";
                            echo "<td onclick=\"window.location.href = 'metal-binding.php?TicketListCadId=".$row['TicketListCadId']."'\">".$row['TicketListCadColor']."</td>";
                            echo "<td onclick=\"window.location.href = 'metal-binding.php?TicketListCadId=".$row['TicketListCadId']."'\">".$row['TicketListCadThickness']."</td>";
                            echo "<td onclick=\"window.location.href = 'metal-binding.php?TicketListCadId=".$row['TicketListCadId']."'\">".$row['TicketListCadMetr']."</td>";
                            echo "<td onclick=\"window.location.href = 'metal-binding.php?TicketListCadId=".$row['TicketListCadId']."'\">".date("d.m.Y", strtotime($row['TicketListCadDate']))."</td>";
                            echo "<td onclick=\"window.location.href = 'metal-binding.php?TicketListCadId=".$row['TicketListCadId']."'\">".$row['TicketListCadBrigade']."</td>";
                            echo "<td onclick=\"window.location.href = 'metal-binding.php?TicketListCadId=".$row['TicketListCadId']."'\">";
                            if($row['StatusName'] == "�����"){
                                echo '<div class="new-status">�����</div>';
                            } elseif($row['StatusName'] == "� ������������"){
                                echo '<div class="process-status">� ������������</div>';
                            } elseif($row['StatusName'] == "���������"){
                                echo '<div class="completed-status">���������</div>';
                            } elseif($row['StatusName'] == "���������"){
                                echo '<div class="shipped-status">���������</div>';
                            } elseif($row['StatusName'] == "����������"){
                                echo '<div class="sent-status">����������</div>';
                            }
                            echo "</td>";
                            echo "</tr>";
                        }
                        echo "<tbody>";
                        echo "</table>";

                        ?>

                </div>
            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script> 
    <script src="/js/jquery.js"></script>
    <script>
        document.getElementById('create-ticket').addEventListener('click', function() {
        var projectListCadId = <?php echo $projectListCadId; ?>; // �������� �������� projectListCadId �� PHP
        // ���������� ������ �� �������� ����� ������
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function() {
            if (xhr.readyState === XMLHttpRequest.DONE) {
                if (xhr.status === 200) {
                    // ����� ��������� �������� ������ �������������� �� �������� � ����� �������
                    window.location.reload();
                } else {
                    alert('��������� ������ ��� �������� ������');
                }
            }
        };
        xhr.open('POST', 'function/create_ticket.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.send('projectListCadId=' + projectListCadId); // ���������� projectListCadId �� ������
    });
    </script>
    <script src="/js/metal-binding-product-list.js"></script>
</body>
</html>