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

<?php
$host = $pathDB;
$username = 'SYSDBA';
$password = 'masterkey';



header('Content-Type: text/html; charset=WIN1251');


try{
    $dbh = new PDO("firebird:dbname=$host;charset=WIN1251", $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    header('Content-Type: text/html; charset=WIN1251');

    if (isset($_GET['PUNIC'])) {
        // �������� �������� ���������
        $PUNIC = $_GET['PUNIC'];
    } else {
        // ���� �������� �� ��� �������, ������� ��������� �� ������ ��� ��������� ������ ��������
        echo "������: �� ������� ����� �������";
    }

    $sql = "SELECT * FROM LISTPRJ WHERE PUNIC = $PUNIC";
    $sth = $dbh->query($sql);

    while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
        $PNUMB = $row['PNUMB'];
    }

    $sql = "SELECT WORKPRJ.*, WORKLST.WNAME
            FROM WORKPRJ
            JOIN WORKLST ON WORKPRJ.WNUMB = WORKLST.WNUMB
            WHERE WORKPRJ.PUNIC = $PUNIC
            ORDER BY WORKLST.WNUMB;";
    $sth = $dbh->query($sql);

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
    <link rel="stylesheet" href="css/project-info-product.css">
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
                <a href="index.php" class="back">< ��������</a>
                <div class="wrapper-head">
                    <div class="menu">
                        <a href="project-info.php?PNUMB=<?php echo htmlspecialchars($PNUMB); ?>">�������</a>
                        <a href="project-info-product.php?PUNIC=<?php echo htmlspecialchars($PUNIC); ?>">�������</a>
                        <a href="project-info-kompl.php?PUNIC=<?php echo htmlspecialchars($PUNIC); ?>">�����������</a>
                        <a href="project-info-work.php?PUNIC=<?php echo htmlspecialchars($PUNIC); ?>" class="active">������</a>
                    </div>
                    <div></div>
                </div>
                <div class="info-project-product">

                    <?php
                        
                    echo "<table>";
                    echo "<thead>
                            <tr>
                                <th><a href='#' id='sort-anumb'>�</a></th>
                                <th><a href='#' id='sort-color'>������������</th>
                                <th><a href='#' id='sort-price'>�����</th>
                                <th><a href='#' id='sort-iternal-price'>��������</th>
                                <th><a href='#' id='sort-external-price'>����</th>
                                <th><a href='#' id='sort-external-price'>�����</th>
                            </tr>
                        </thead>";
                    echo "<tbody>";
                    
                    while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr>";
                        echo "<td><p>".$row['WNUMB']."</p></td>";
                        echo "<td><p>".$row['WNAME']."</p></td>";
                        echo "<td><p>".number_format($row['WDIME'], 2, '.', '') ."</p></td>";
                        echo "<td><p>".number_format($row['WVALU'], 0, '.', '') ."</p></td>";
                        echo "<td><p>".number_format($row['WPRCW'], 0, '.', '') ."</p></td>";
                        echo "<td><p>".number_format($row['WPRIC'], 1, '.', '') ."</p></td>";
                        echo "</tr>";
                    }

                    echo "</tbody>";
                    echo "</table>";

                ?>
            </div>
        </div>
        <?php 
        } catch (PDOException $e) {
            echo "������ ����������: " . $e->getMessage();
        }
        ?>
    </div>
</body>
</html>