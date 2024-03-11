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

@include './database/conn_mysql.php';

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Получаем данные из результата запроса
    $row = $result->fetch_assoc();
    // Извлекаем значение столбца pathBD и сохраняем его в глобальной переменной $pathDB
    $pathDB = $row['pathBD'];
} else {
    echo "0 results";
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
    <title>Проект</title>
</head>
<body>
    <div class="page">
        <div class="side">
            <button class="logo" onclick="window.location.href = 'index.php'">
                PROF-INTEGRATE
            </button>
            <div class="nav">
                <p class="side-title">ГЛАВНОЕ МЕНЮ</p>
                <div class="nav-link">
                    <img src="/assets/icons/dashbord-icon.svg" alt="">
                    <a href="materialValues.php">МЦ</a>
                </div>
                <div class="nav-link active">
                    <img src="/assets/icons/report.svg" alt="">
                    <a href="index.php">Проекты</a>
                </div>
                <div class="nav-link">
                    <img src="/assets/icons/gear.svg" alt="">
                    <a href="settings.php">Настройки</a>
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
                            echo 'Администратор';
                        } else {
                            echo 'Пользователь';
                        }
                        ?>
                        </p>
                    </div>
                </div>
            </header>

            <div class="wrapper">
                <a href="index.php" class="back">< вернутся</a>
                <div class="wrapper-head">
                    <div class="menu">
                        <a class="active">Главная</a>
                        <a>Изделия</a>
                        <a>Комлектация</a>
                        <a>Работы</a>
                    </div>
                    <div></div>
                </div>
                <div class="info-project">

                    <?php 
                    if (isset($_GET['PNUMB'])) {
                        // Получаем значение параметра
                        $projectNumber = $_GET['PNUMB'];
                        
                        // Далее можно использовать значение $projectNumber для запроса нужных данных из базы данных
                        // Например:
                        // $sql = "SELECT * FROM LISTPRJ WHERE PNUMB = '$projectNumber'";
                        // Выполнение запроса и вывод данных
                    } else {
                        // Если параметр не был передан, выводим сообщение об ошибке или выполняем другие действия
                        echo "Ошибка: Не передан номер проекта";
                    }
                    ?>

                    <table>
                        <tr>
                            <td>Проект № </td>
                            <td><?php echo $projectNumber; ?></td>
                            <td>Заказ №</td>
                            <td>6</td>
                            <td>Статус проекта</td>
                            <td>6</td>
                        </tr>
                        <tr>
                            <td>Менеджер</td>
                            <td>6</td>
                            <td>Конструктор</td>
                            <td>6</td>
                            <td>Категория</td>
                            <td>6</td>
                        </tr>
                        <tr>
                            <td>Объект</td>
                            <td>6</td>
                            <td>Счет №</td>
                            <td>6</td>
                            <td>Контрагент</td>
                            <td>6</td>
                        </tr>
                        <tr>
                            <td>Описание</td>
                            <td>6</td>
                            <td>Регистрация</td>
                            <td>6</td>
                            <td>Продавец</td>
                            <td>6</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>
</html>