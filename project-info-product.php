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

    $sql = "SELECT * FROM LISTORD WHERE PUNIC = $PUNIC";
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
                    <img src="/assets/icons/pencil.svg" alt="">
                    <a href="metal-binding-list.php">����� �������</a>
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
                        <a href="project-info.php?PNUMB=<?php echo htmlspecialchars($PNUMB); ?>" >�������</a>
                        <a href="project-info-product.php?PUNIC=<?php echo htmlspecialchars($PUNIC); ?>" class="active">�������</a>
                        <a href="project-info-kompl.php?PUNIC=<?php echo htmlspecialchars($PUNIC); ?>">�����������</a>
                        <a href="project-info-work.php?PUNIC=<?php echo htmlspecialchars($PUNIC); ?>">������</a>
                    </div>
                    <div></div>
                </div>
                <div class="info-project-product">

                    <?php
                        while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                            $imageData = base64_encode($row['BPICT']);
                            // ��������� URL ����������� � ��������� data:image � ����� MIME
                            $imageUrl = 'data:image/jpeg;base64,' . $imageData;
                            echo '<div class="product">
                            <div class="product-info">
                                <p>�����</p>
                                <p class="edit">' . $row['ONUMB'] . '</p>
                                <p>��������</p>
                                <p class="edit">' . $row['ONAME'] . '</p>
                                <p>��������</p>
                                <p class="edit">6</p>
                                <p>���������</p>
                                <p class="edit">6</p>
                                <p>�������</p>
                                <p class="edit">6</p>
                            </div>
    
                            <div class="product-dimensions">
                                <p>����������</p>
                                <p class="edit">' . number_format($row['OQTYI'], 0, '.', '')  . '</p>
                                <p>��������</p>
                                <div class="size">
                                    <p class="edit">' . number_format($row['OLENG'], 0, '.', '')  . '</p>
                                    <p>x</p>
                                    <p class="edit">' . number_format($row['OHEIG'], 0, '.', '')  . '</p>
                                </div>
                                <p>�������� �������</p>
                                <div class="size">
                                    <p class="edit">' . number_format($row['OPERI'], 0, '.', '')  . '</p>
                                    <p>/</p>
                                    <p class="edit">' . number_format($row['OPERI'] * $row['OQTYI'], 0, '.', '')  . '</p>
                                </div>
                                <p>������� �������</p>
                                <div class="size">
                                    <p class="edit">' . number_format($row['OSQRK'], 2, '.', '')  . '</p>
                                    <p>/</p>
                                    <p class="edit">' . number_format($row['OSQRK'] * $row['OQTYI'], 2, '.', '')  . '</p>
                                </div>
                                <p>������� ����������</p>
                                <div class="size">
                                    <p class="edit">' . number_format($row['OSQRG'], 2, '.', '')  . '</p>
                                    <p>/</p>
                                    <p class="edit">' . number_format($row['OSQRG'] * $row['OQTYI'], 2, '.', '')  . '</p>
                                </div>
                            </div>
    
                            <div class="product-image">
                                <img src="' . $imageUrl . '">
                            </div>
    
                            <div class="product-descr">
                                <p>���������� � �������</p>
                                <p class="edit">' . $row['OPRIM'] . '</p>
                            </div>
                        </div>';
                        }

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