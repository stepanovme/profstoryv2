<?php

session_start();

if(!isset($_SESSION['userId'])){
    header("Location: auth.php");
    exit;
}

$userId = $_SESSION['userId'];

$sql = "SELECT user.*, role.roleName
        FROM user
        INNER JOIN role ON user.roleId = role.roleId
        WHERE user.userID = '$userId'";

@include '../database/conn_mysql.php';

$result = $conn->query($sql);

if($result->num_rows > 0){
    $row = $result->fetch_assoc();

    $pathDB = $row['pathBD'];
} else {
    echo '0 results';
}

$punic = iconv('UTF-8', 'CP1251', $_POST['punic']);
$anumb = iconv('UTF-8', 'CP1251', $_POST['anumb']);
$clnum = iconv('UTF-8', 'CP1251', $_POST['clnum']);
$formula = iconv('UTF-8', 'CP1251', $_POST['formula']);

echo 'Данные успешно получены: PUNIC = '. $punic . ', ANUMB = ' . $anumb . ', CLNUM = ' . $clnum . ', FORMULA = ' . $formula;

$host = $pathDB;
$username = 'SYSDBA';
$password = 'masterkey';

global $ATYPM;
global $ATYPP;
global $Qty;
global $APERC;
global $CLPRC;
global $Pm;

try {
    $dbh = new PDO("firebird:dbname=$host;charset=WIN1251", $username, $password);
    
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $sql = "SELECT * FROM ARTIKLS WHERE ANUMB = '$anumb'";

    $sth = $dbh->query($sql);

    while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
        $ATYPM = $row['ATYPM'];
        $ATYPP = $row['ATYPP'];
        $APERC = $row['AOUTS'];
    }

    $sql = "SELECT * FROM ARTSVST WHERE ANUMB = '$anumb' AND CLNUM = '$clnum'";

    $sth = $dbh->query($sql);

    while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
        $CLPRC = $row['CLPRC'];
    }

    $sql = "SELECT * FROM LISTORD WHERE PUNIC = '$punic'";

    $sth = $dbh->query($sql);

    while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
        $Qty = $Qty + $row['OQTYI'];
        $P = ($row['OLENG'] * 2 + $row['OHEIG'] * 2) * $row['OQTYI'] / 1000;
        $Pm = $Pm + $P;
    }

    // Заменяем подстроку "$Qty" на значение переменной $Qty в строке $formula
    $formula = str_replace('$Qty', $Qty, $formula);
    // Заменяем подстроку "$Pm" на значение переменной $Qty в строке $formula
    $formula = str_replace('$Pm', $Pm, $formula);

    $result = eval("return $formula;");

    echo $result;


    $sql = "INSERT INTO SPECPAU (PUNIC, ANUMB, CLKK, ONUMB, ATYPM, ATYPP, NEL, CLNUM, CLNU1, CLNU2, GFORM, CLKC, CLKE, AVIEW, ARADI, AUG01, AUG02, ALENG, ATYPR, AQTYP, AQTYA, APERC, ASEB1, APRC1, APRCD, AUGP1, AUGP2, NOPTI, ADESC, NSQ, NHAVE, NRAMA, NUNIC) VALUES ('$punic', '$anumb', '0', '0', '$ATYPM', '$ATYPP', '-1', '$clnum', 
                                '$clnum', '$clnum', '0', '0', '-1', '0', '0', '0', '0', '0', '0', '$result', '$result', '$APERC', '$CLPRC', '$CLPRC', '$CLPRC', '90', '90', '0', '0', '-1', '0', '0', '0')";

    // $sql = "SELECT * FROM ARTIKLS WHERE ANUMB='$anumb'";

    $sth = $dbh->query($sql);
    
    echo 'Данные добавлены';
} catch (PDOException $e) {
    echo "Ошибка соединения: " . $e->getMessage();
}
?>
