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
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/favicon/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/kompl-content.css">
    <title>Комплекты</title>
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
                <div class="nav-link active">
                    <img src="/assets/icons/report.svg" alt="">
                    <a href="kompl-list.php">Комплекты</a>
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
                <div class="wrapper-head">

                <?php

                if (isset($_GET['kompListId'])) {
                    // Получаем значение параметра
                    $kompListId = $_GET['kompListId'];
                } else {
                    // Если параметр не был передан, выводим сообщение об ошибке или выполняем другие действия
                    echo "Ошибка: Не передан номер проекта";
                }

                $pathDB_escaped = mysqli_real_escape_string($conn, $pathDB);

                $sql = "SELECT * FROM kompList WHERE kompListId = $kompListId";

                $result = $conn->query($sql);

                while ($row = $result->fetch_assoc()){
                    $KonplName = $row['kompListName'];
                }

                ?>

                    <h1>Содержимое комплекта <?php echo $KonplName; ?></h1>
                    <div>
                        <div class="buttons">
                            <form method="post">
                                <button class="create-kompl" name="create-kompl">
                                    Добавить
                                </button>
                            </form>
                            <button class="delete-kompl">
                                Удалить
                            </button>
                        </div>
                    </div>
                </div>
                <a href="kompl-list.php" class="back-button">< вернутся</a>
                <?php

                $pathDB_escaped = mysqli_real_escape_string($conn, $pathDB);

                $sql = "SELECT * FROM kompContent WHERE kompListId = $kompListId";

                $result = $conn->query($sql);

                echo "<table>";
                echo "<thead>
                        <tr>
                            <th><a href='#'>№</a></th>
                            <th><a href='#'>Артикул</th>
                            <th><a href='#'>Название</th>
                            <th><a href='#'>Формула</th>
                        </tr>
                    </thead>";
                echo "<tbody>";

                $NUM = 0;

                while ($row = $result->fetch_assoc()){
                    $NUM = $NUM + 1;
                    echo "<tr>";
                    echo "<td>".$NUM."</td>";
                    echo "<td>".$row['anumb']."</td>";
                    echo "<td>Название</td>";
                    echo "<td>".$row['clnum']."</td>";
                    echo "<td>".$row['formula']."</td>";
                    echo "</tr>";
                }

                echo "</table>";

                ?>

            </div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script> 
    <script src="/js/jquery.js"></script>
    <script src="/js/kompl-list.js"></script>
</body>
</html>