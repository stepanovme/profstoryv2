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

    if (isset($_GET['PNUMB'])) {
        // �������� �������� ���������
        $projectNumber = $_GET['PNUMB'];
    } else {
        // ���� �������� �� ��� �������, ������� ��������� �� ������ ��� ��������� ������ ��������
        echo "������: �� ������� ����� �������";
    }

    $sql = "SELECT * FROM LISTPRJ WHERE PNUMB = $projectNumber";
    $sth = $dbh->query($sql);
    
    while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
        $MNAME = $row['MNAME'];
        $ZNUMB = $row['ZNUMB'];
        $PSTAT = $row['PSTAT'];
        $PPREF = $row['PPREF'];
        $POBJA = $row['POBJA'];
        $KNAME = $row['KNAME'];
        $PDATE = $row['PDATE'];
        $POBJL = $row['POBJL'];
        $INUMB = $row['INUMB'];
        $CNAME = $row['CNAME'];
        $PNAME = $row['PNAME'];
        $KDESC = $row['KDESC'];
        $ADESC = $row['ADESC'];
        $WDESC = $row['WDESC'];
        $PDESC = $row['PDESC'];
        $DESC1 = $row['DESC1'];
        $DESC2 = $row['DESC2'];
        $DESC3 = $row['DESC3'];
        $DESC5 = $row['DESC5'];
        $XDESC = $row['XDESC'];
        $KPRIC = $row['KPRIC'];
        $APRIC = $row['APRIC'];
        $WPRIC = $row['WPRIC'];
        $PPRIC = $row['PPRIC'];
        $KPRCD = $row['KPRCD'];
        $APRCD = $row['APRCD'];
        $WPRCD = $row['WPRCD'];
        $PPRCD = $row['PPRCD'];
        $PUNIC = $row['PUNIC'];
    }

    $formattedDate = date("d-m-Y", strtotime($PDATE));

} catch (PDOException $e) {
    echo "������ ����������: " . $e->getMessage();
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
                        <a class="active">�������</a>
                        <a href="project-info-product.php?PUNIC=<?php echo htmlspecialchars($PUNIC); ?>">�������</a>
                        <a href="project-info-kompl.php?PUNIC=<?php echo htmlspecialchars($PUNIC); ?>">�����������</a>
                        <a href="project-info-work.php?PUNIC=<?php echo htmlspecialchars($PUNIC); ?>">������</a>
                    </div>
                    <div></div>
                </div>
                <div class="info-project">
                    <p>������ � </p>
                    <p class="edit"><?php echo $projectNumber; ?></p>
                    <p>����� �</p>
                    <p class="edit"><?php echo $ZNUMB; ?></p>
                    <p>������ �������</p>
                    <p class="edit"><?php echo $ZNUMB; ?></p>
                    <p>��������</p>
                    <p class="edit"><?php echo $MNAME; ?></p>
                    <p>�����������</p>
                    <p class="edit"><?php echo $CNAME; ?></p>
                    <p>���������</p>
                    <p class="edit"><?php echo $PPREF; ?></p>
                    <p>������</p>
                    <p class="edit"><?php echo $POBJA; ?></p>
                    <p>���� �</p>
                    <p class="edit"><?php echo $INUMB; ?></p>
                    <p>����������</p>
                    <p class="edit"><?php echo $KNAME; ?></p>
                    <p>��������</p>
                    <p class="edit"><?php echo $POBJL; ?></p>
                    <p>�����������</p>
                    <p class="edit"><?php echo $formattedDate; ?></p>
                    <p>��������</p>
                    <p class="edit"><?php echo $PNAME; ?></p>
                </div>

                <div class="prices">
                    <div class="discount">
                        <p class="title">������, %</p>
                        <div class="discount-data">
                            <p>�����������</p>
                            <p class="edit"><?php echo number_format($KDESC, 2, '.', ''); ?></p>
                            <p>�������</p>
                            <p class="edit"><?php echo number_format($DESC1, 2, '.', ''); ?></p>
                            <p>������������</p>
                            <p class="edit"><?php echo number_format($ADESC, 2, '.', '') ?></p>
                            <p>����������</p>
                            <p class="edit"><?php echo number_format($DESC2, 2, '.', ''); ?></p>
                            <p>������</p>
                            <p class="edit"><?php echo number_format($WDESC, 2, '.', ''); ?></p>
                            <p>�������</p>
                            <p class="edit"><?php echo number_format($DESC3, 2, '.', ''); ?></p>
                            <p>�����</p>
                            <p class="edit"><?php echo number_format($PDESC, 2, '.', ''); ?></p>
                            <p>����������</p>
                            <p class="edit"><?php echo number_format($DESC5, 2, '.', ''); ?></p>
                            <p>��������������</p>
                            <p class="edit"><?php echo number_format($XDESC, 2, '.', ''); ?></p>
                        </div>
                    </div>

                    <div class="price-without-discount">
                        <p class="title">��������� ��� ������</p>
                        <div class="price-without-discount-data">
                            <p>�����������</p>
                            <p class="edit"><?php echo number_format($KPRIC, 2, '.', ' ') . " ���"; ?></p>
                            <p>������������</p>
                            <p class="edit"><?php echo number_format($APRIC, 2, '.', ' ') . " ���"; ?></p>
                            <p>������</p>
                            <p class="edit"><?php echo number_format($WPRIC, 2, '.', ' ') . " ���"; ?></p>
                            <p>�����</p>
                            <p class="edit"><?php echo number_format($PPRIC, 2, '.', ' ') . " ���"; ?></p>
                            <p>�������</p>
                            <p class="edit"><?php echo number_format($PPRIC, 2, '.', ' ') . " ���"; ?></p>
                        </div>
                    </div>

                    <div class="to-paid">
                        <p class="title">� ������</p>
                        <div class="to-paid-data">
                            <p>�����������</p>
                            <p class="edit"><?php echo number_format($KPRCD, 2, '.', ' ') . " ���"; ?></p>
                            <p>������������</p>
                            <p class="edit"><?php echo number_format($APRCD, 2, '.', ' ') . " ���"; ?></p>
                            <p>������</p>
                            <p class="edit"><?php echo number_format($WPRCD, 2, '.', ' ') . " ���"; ?></p>
                            <p>�����</p>
                            <p class="edit"><?php echo number_format($PPRCD, 2, '.', ' ') . " ���"; ?></p>
                            <p>�������</p>
                            <p class="edit"><?php echo number_format($PPRCD, 2, '.', ' ') . " ���"; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>