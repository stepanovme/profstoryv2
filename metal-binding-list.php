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
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/favicon/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/metal-binding-list.css">
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
                            <div class="nav-link">
                                <img src="/assets/icons/pencil.svg" alt="">
                                <a href="metal-binding-list.php">����� �������</a>
                            </div>
                            <div class="nav-link">
                                <img src="/assets/icons/lock.svg" alt="">
                                <a href="administrator.php">����������</a>
                            </div>
                            <div class="nav-link active">
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
                            <div class="nav-link">
                                <img src="/assets/icons/pencil.svg" alt="">
                                <a href="metal-binding-list.php">����� �������</a>
                            </div>
                            <div class="nav-link">
                                <img src="/assets/icons/lock.svg" alt="">
                                <a href="administrator.php">����������</a>
                            </div>
                            <div class="nav-link active">
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
                            <div class="nav-link active">
                                <img src="/assets/icons/gear.svg" alt="">
                                <a href="settings.php">���������</a>
                            </div>
                        </div>';
                        break;
                case '������':
                    echo '<div class="nav">
                            <p class="side-title">������� ����</p>
                            <div class="nav-link">
                                <img src="/assets/icons/pencil.svg" alt="">
                                <a href="metal-binding-list.php">����� �������</a>
                            </div>
                        </div>';
                        break;
                case '��������':
                    echo '<div class="nav">
                            <p class="side-title">������� ����</p>
                            <div class="nav-link">
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
                <div class="wrapper-head">
                    <h1>������ ��������</h1>
                    <div>
                        <div class="buttons">
                            <form method="post">
                                <button class="create-project" name="create-project">
                                    �������
                                </button>
                            </form>
                            <button class="delete-project">
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
                                    <th>������������ �������</th>
                                </tr>
                            </thead>
                            <tbody>
                        <?php

                        $sql = "SELECT * FROM projectListCad";

                        $result = $conn->query($sql);
        
                        $NUM = 0;
        
                        while ($row = $result->fetch_assoc()){
                            $NUM = $NUM + 1;
                            echo "<tr data-id='" . $row['projectListCadId'] ."' onclick=\"window.location.href = 'metal-binding-product-list.php?projectListCadId=".$row['projectListCadId']."'\">";
                            echo "<td><input type='checkbox' class='row-checkbox'></td>";
                            echo "<td>".$NUM."</td>";
                            echo "<td>".$row['projectListCadName']."</td>";
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
    <script src="/js/metal-binding-list.js"></script>
</body>
</html>