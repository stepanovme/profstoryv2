<?php 
header('Content-Type: text/html; charset=WIN1251'); 

session_start();

if (!isset($_SESSION['userId'])) {
    // Если сессия не установлена, перенаправляем пользователя на страницу входа
    header("Location: auth.php");
    exit;
}

$userId = $_SESSION['userId'];

@include './database/conn_mysql.php';

$sql = "SELECT roleId from user where userId = $userId";

$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
    $roleId = $row['roleId'];
}

if($roleId == 4 || $roleId == 5){
    header("Location: metal-binding-list.php");
    exit;
}

$sql = "SELECT user.*, role.roleName 
        FROM user 
        INNER JOIN role ON user.roleId = role.roleId 
        WHERE user.userId = '$userId'";

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
    <link rel="stylesheet" href="css/index.css">
    <title>Проекты</title>
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
                case 'Администратор':
                    echo '<div class="nav">
                            <p class="side-title">ГЛАВНОЕ МЕНЮ</p>
                            <div class="nav-link">
                                <img src="/assets/icons/dashbord-icon.svg" alt="">
                                <a href="materialValues.php">МЦ</a>
                            </div>
                            <div class="nav-link active">
                                <img src="/assets/icons/project.svg" alt="">
                                <a href="index.php">Проекты</a>
                            </div>
                            <div class="nav-link">
                                <img src="/assets/icons/report.svg" alt="">
                                <a href="kompl-list.php">Комплекты</a>
                            </div>
                            <div class="nav-link">
                                <img src="/assets/icons/pencil.svg" alt="">
                                <a href="metal-binding-list.php">Гибка металла</a>
                            </div>
                            <div class="nav-link">
                                <img src="/assets/icons/lock.svg" alt="">
                                <a href="administrator.php">Сотрудники</a>
                            </div>
                            <div class="nav-link">
                                <img src="/assets/icons/gear.svg" alt="">
                                <a href="settings.php">Настройки</a>
                            </div>
                        </div>';
                        break;
                case 'Директор':
                    echo '<div class="nav">
                            <p class="side-title">ГЛАВНОЕ МЕНЮ</p>
                            <div class="nav-link">
                                <img src="/assets/icons/dashbord-icon.svg" alt="">
                                <a href="materialValues.php">МЦ</a>
                            </div>
                            <div class="nav-link">
                                <img src="/assets/icons/project.svg" alt="">
                                <a href="index.php">Проекты</a>
                            </div>
                            <div class="nav-link">
                                <img src="/assets/icons/report.svg" alt="">
                                <a href="kompl-list.php">Комплекты</a>
                            </div>
                            <div class="nav-link active">
                                <img src="/assets/icons/pencil.svg" alt="">
                                <a href="metal-binding-list.php">Гибка металла</a>
                            </div>
                            <div class="nav-link">
                                <img src="/assets/icons/lock.svg" alt="">
                                <a href="administrator.php">Сотрудники</a>
                            </div>
                            <div class="nav-link">
                                <img src="/assets/icons/gear.svg" alt="">
                                <a href="settings.php">Настройки</a>
                            </div>
                        </div>';
                        break;
                case 'Проектировщик':
                    echo '<div class="nav">
                            <p class="side-title">ГЛАВНОЕ МЕНЮ</p>
                            <div class="nav-link">
                                <img src="/assets/icons/dashbord-icon.svg" alt="">
                                <a href="materialValues.php">МЦ</a>
                            </div>
                            <div class="nav-link active">
                                <img src="/assets/icons/project.svg" alt="">
                                <a href="index.php">Проекты</a>
                            </div>
                            <div class="nav-link">
                                <img src="/assets/icons/report.svg" alt="">
                                <a href="kompl-list.php">Комплекты</a>
                            </div>
                            <div class="nav-link">
                                <img src="/assets/icons/gear.svg" alt="">
                                <a href="settings.php">Настройки</a>
                            </div>
                        </div>';
                        break;
                case 'Прораб':
                    echo '<div class="nav">
                            <p class="side-title">ГЛАВНОЕ МЕНЮ</p>
                            <div class="nav-link">
                                <img src="/assets/icons/pencil.svg" alt="">
                                <a href="metal-binding-list.php">Гибка металла</a>
                            </div>
                        </div>';
                        break;
                case 'Бригадир':
                    echo '<div class="nav">
                            <p class="side-title">ГЛАВНОЕ МЕНЮ</p>
                            <div class="nav-link">
                                <img src="/assets/icons/pencil.svg" alt="">
                                <a href="metal-binding-list.php">Гибка металла</a>
                            </div>
                        </div>';
                        break;
                case 'Пользователь':
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
                    <h1>Список  проектов</h1>
                    <div></div>
                </div>
                <?php

                $host = $pathDB;
                $username = 'SYSDBA';
                $password = 'masterkey';

                try {
                    $dbh = new PDO("firebird:dbname=$host;charset=WIN1251", $username, $password);
                    
                    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                    header('Content-Type: text/html; charset=WIN1251');

                    $sql = 'SELECT PNUMB, ZNUMB, KNAME, PDATE, POBJA, PSTAT, MNAME FROM LISTPRJ ORDER BY PNUMB';

                    $sth = $dbh->query($sql);

                    echo "<table>";
                    echo "<thead>
                            <tr>
                                <th><a href='#' id='sort-anumb'>№</a></th>
                                <th><a href='#' id='sort-name'>Заказ</th>
                                <th><a href='#' id='sort-color'>Контрагент</th>
                                <th><a href='#' id='sort-price'>Регистрация</th>
                                <th><a href='#' id='sort-iternal-price'>Описания</th>
                                <th><a href='#' id='sort-external-price'>Статус</th>
                                <th><a href='#' id='sort-external-price'>Менеджер</th>
                            </tr>
                        </thead>";
                    echo "<tbody>";
                    
                    while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                        echo "<tr onclick=\"window.location.href = 'project-info.php?PNUMB=".$row['PNUMB']."'\">";
                        echo "<td><p>".$row['PNUMB']."</p></td>";
                        echo "<td><p>".$row['ZNUMB']."</p></td>";
                        echo "<td><p>".$row['KNAME']."</p></td>";
                        echo "<td><p>".$row['PDATE']."</p></td>";
                        echo "<td><p>".$row['POBJA']."</p></td>";
                        echo "<td><p>".$row['PSTAT']."</p></td>";
                        echo "<td><p>".$row['MNAME']."</p></td>";
                        echo "</tr>";
                    }

                    echo "</tbody>";
                    echo "</table>";

                } catch (PDOException $e) {
                    echo "Ошибка соединения: " . $e->getMessage();
                }
                ?>
            </div>
        </div>
    </div>
</body>
</html>