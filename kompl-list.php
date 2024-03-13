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


// ���� ����� ���� ����������, ������������ � ������
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['create-kompl'])) {
    // ������������ � ���� ������
    include './database/conn_mysql.php';

    // ��������� ������� ����������
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // ���������� ����������� ������� � ������ ����
    $pathDB_escaped = mysqli_real_escape_string($conn, $pathDB);

    // SQL-������ ��� ���������� ������ � ������� kompList
    $sql = "INSERT INTO kompList (pathBD) VALUES ('$pathDB_escaped')";

    // ���������� �������
    if (mysqli_query($conn, $sql)) {
        echo "������ ������� ���������";
    } else {
        echo "������: " . $sql . "<br>" . mysqli_error($conn);
    }

    // �������� ����������
    mysqli_close($conn);
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
    <link rel="stylesheet" href="css/kompl-list.css">
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
                    <h1>������ ����������</h1>
                    <div>
                        <div class="buttons">
                            <form method="post">
                                <button class="create-kompl" name="create-kompl">
                                    �������
                                </button>
                            </form>
                            <button class="delete-kompl">
                                �������
                            </button>
                        </div>
                    </div>
                </div>

                <div class="komp-list">
                <?php

                $pathDB_escaped = mysqli_real_escape_string($conn, $pathDB);

                $sql = "SELECT * FROM kompList WHERE pathBD = '$pathDB_escaped'";

                $result = $conn->query($sql);

                echo "<table>";
                echo "<thead>
                        <tr>
                            <th><a href='#'>�</a></th>
                            <th><a href='#'>��������</th>
                            <th><a href='#'>���������</th>
                        </tr>
                    </thead>";
                echo "<tbody>";

                $NUM = 0;

                while ($row = $result->fetch_assoc()){
                    $NUM = $NUM + 1;
                    echo "<tr data-id='" . $row['kompListId'] . "'>";
                    echo "<td>".$NUM."</td>";
                    echo "<td class='editable-name' contenteditable='true' data-id='" . $row['kompListId'] . "'>".$row['kompListName']."</td>";
                    echo "<td class='editable-category' contenteditable='true' data-id='" . $row['kompListId'] . "'>".$row['kompListCategory']."</td>";
                    echo "</tr>";
                }

                echo "</table>";

                ?>
                </div>

                <div class="komp-content">
                <?php                

                $sql = "SELECT * FROM kompContent WHERE kompListId = 19";

                $result = $conn->query($sql);

                // echo "<table>";
                // echo "<thead>
                //         <tr>
                //             <th><a href='#'>�������</a></th>
                //             <th><a href='#'>��������</th>
                //             <th><a href='#'>����</th>
                //             <th><a href='#'>�������</th>
                //         </tr>
                //     </thead>";
                // echo "<tbody>";

                // while ($row = $result->fetch_assoc()){
                //     echo "<tr>";
                //     echo "<td>".$row['anumb']."</td>";
                //     echo "<td>��������</td>";
                //     echo "<td>".$row['clnum']."</td>";
                //     echo "<td>".$row['formula']."</td>";
                //     echo "</tr>";
                // }

                // echo "</table>";

                // $host = $pathDB;
                // $username = 'SYSDBA';
                // $password = 'masterkey';

                // try {
                //     $dbh = new PDO("firebird:dbname=$host;charset=WIN1251", $username, $password);
                    
                //     $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                //     $sql = 'SELECT * FROM KOMPLST ORDER BY KNAME';

                //     $sth = $dbh->query($sql);

                //     echo "<table class='komp-content-table'>";
                //     echo "<thead>
                //             <tr>
                //                 <th><a href='#'>�������</a></th>
                //                 <th><a href='#'>��������</th>
                //                 <th><a href='#'>��������</th>
                //                 <th><a href='#'>�������</th>
                //             </tr>
                //         </thead>";
                //     echo "<tbody>";
                    
                //     $NUM = 0;

                //     while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                //         $NUM = $NUM + 1;
                //         echo "<tr>";
                //         echo "<td><p>".$NUM."</p></td>";
                //         echo "<td><p>".$row['KNAME']."</p></td>";
                //         echo "<td><p>".$row['KPREF']."</p></td>";
                //         echo "<td><p></p></td>";
                //         echo "</tr>";
                //     }

                //     echo "</tbody>";
                //     echo "</table>";

                // } catch (PDOException $e) {
                //     echo "������ ����������: " . $e->getMessage();
                // }
                ?>

                </div>

            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script> 
    <script src="/js/jquery.js"></script>
    <script src="/js/kompl-list.js"></script>
</body>
</html>