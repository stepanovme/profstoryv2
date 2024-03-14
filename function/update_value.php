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


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['kompContentId']) && isset($_POST['newValue'])) {
    // Подключаемся к базе данных
    include '../database/conn_mysql.php';

    // Проверяем наличие соединения
    if (!$conn) {
        echo "Ошибка: Нет соединения с базой данных";
        exit;
    }

    // Экранируем данные
    $kompContentId = mysqli_real_escape_string($conn, $_POST['kompContentId']);
    $newValue = mysqli_real_escape_string($conn, $_POST['newValue']);

    // SQL-запрос для обновления значения
    $sql = "UPDATE kompContent SET anumb = '$newValue' WHERE kompContentId = '$kompContentId'";

    // Выполняем запрос
    if (mysqli_query($conn, $sql)) {
        echo "Значение успешно обновлено";
    } else {
        echo "Ошибка: " . mysqli_error($conn);
    }
} else {
    echo "Ошибка: Недостаточно данных для обновления значения";
}
