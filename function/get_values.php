<?php
header('Content-Type: text/html; charset=WIN1251'); 

session_start();

if (!isset($_SESSION['userId'])) {
    // Если сессия не установлена, перенаправляем пользователя на страницу входа
    header("Location: auth.php");
    exit;
}

$userId = $_SESSION['userId'];

$sql = "SELECT user.*, role.roleName 
        FROM user 
        INNER JOIN role ON user.roleId = role.roleId 
        WHERE user.userId = '$userId'";

@include '../database/conn_mysql.php';

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Получаем данные из результата запроса
    $row = $result->fetch_assoc();
    // Извлекаем значение столбца pathBD и сохраняем его в глобальной переменной $pathDB
    $pathDB = $row['pathBD'];
} else {
    echo "0 results";
}

// Получаем значение kompListId из GET-запроса
if (isset($_GET['kompListId'])) {
    // Получаем значение параметра
    $kompListId = $_GET['kompListId'];
} else {
    // Если параметр не был передан, выводим сообщение об ошибке или выполняем другие действия
    echo "Ошибка: Не передан номер комплекта";
    exit; // Выход из скрипта, чтобы избежать дальнейшей обработки
}

// Подключение к базе данных Firebird
$host = $pathDB;
$username = 'SYSDBA';
$password = 'masterkey';

try {
    $dbh = new PDO("firebird:dbname=$host;charset=WIN1251", $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    $sql = 'SELECT ANUMB, CLNUM FROM ARTSVST ORDER BY ANUMB';
    $sth = $dbh->query($sql);
    
    // Возвращаем результат в формате JSON
    echo json_encode($sth->fetchAll(PDO::FETCH_ASSOC));
} catch (PDOException $e) {
    echo "Ошибка соединения: " . $e->getMessage();
}

?>