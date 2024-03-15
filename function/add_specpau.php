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

global $ANUMB;

try {
    $dbh = new PDO("firebird:dbname=$host;charset=WIN1251", $username, $password);
    
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // $sql = "INSERT INTO SPECPAU (PUNIC, ANUMB) VALUES ('$punic','$anumb')";
    // SQL запрос для вставки данных в таблицу SPECPAU
    $sql = "INSERT INTO SPECPAU (PUNIC, ANUMB, CLKK) VALUES ('$punic', '$anumb', '0')";

    // $sql = "SELECT * FROM ARTIKLS WHERE ANUMB='$anumb'";

    $sth = $dbh->query($sql);
    
    // while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
    //     $ANUMB = $row['ANUMB'];
    // }
    echo 'Данные добавлены';
} catch (PDOException $e) {
    echo "Ошибка соединения: " . $e->getMessage();
}
?>
