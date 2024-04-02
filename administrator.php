<?php 
header('Content-Type: text/html; charset=WIN1251'); 

session_start();

global $pathDB;

if (!isset($_SESSION['userId'])) {
    // Если сессия не установлена, перенаправляем пользователя на страницу входа
    header("Location: auth.php");
    exit;
}

@include './database/conn_mysql.php';

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
    <link rel="stylesheet" href="css/administrator.css">
    <title>Админ панель</title>
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
                <div class="nav-link">
                    <img src="/assets/icons/report.svg" alt="">
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
                <div class="nav-link active">
                    <img src="/assets/icons/lock.svg" alt="">
                    <a href="administrator.php">Админ</a>
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
                    <h1>Список пользователей</h1>
                    <div></div>
                </div>
                <table>
                    <thead>
                        <tr>
                            <th style="width:100px;">№</th>
                            <th>Сотрудник</th>
                            <th style="width:300px;">Дата регистрации</th>
                            <th style="width:300px;">Роль</th>
                        </tr>
                    </thead>  

                    <tbody>

                        <?php 
                        
                        $sql = "SELECT u.userId, u.name, u.surname, u.roleId, r.roleName
                                FROM user u
                                INNER JOIN role r ON u.roleId = r.roleId";

                        $result = $conn->query($sql);

                        $NUM = 0;

                        while ($row = $result->fetch_assoc()){
                            $NUM = $NUM + 1;
                            echo '<tr>';
                            echo '<td>'.$NUM.'</td>';
                            echo '<td>'.$row['name'].' '.$row['surname'].'</td>';
                            echo '<td>'.$row['userId'].'</td>';
                            echo '<td class="styled-select">
                                    <select onchange="changeRole(this.value, '.$row['userId'].')">
                                        <option value="1"'.($row['roleId'] == 1 ? ' selected' : '').'>Пользователь</option>
                                        <option value="2"'.($row['roleId'] == 2 ? ' selected' : '').'>Администратор</option>
                                    </select>
                                   </td>';
                        }
                        
                        ?>

                    </tbody>

                </table>
            </div>
        </div>
    </div>
    <script src="/js/jquery.js"></script>
    <script src="/js/administrator.js"></script>
</body>
</html>