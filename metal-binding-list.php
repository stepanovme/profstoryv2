<?php 
header('Content-Type: text/html; charset=WIN1251'); 

session_start();

if (!isset($_SESSION['userId'])) {
    // Если сессия не установлена, перенаправляем пользователя на страницу входа
    header("Location: auth.php");
    exit;
}

global $userId;

$userId = $_SESSION['userId'];


@include './database/conn_mysql.php';

$sql = "SELECT roleId from user where userId = $userId";

$result = $conn->query($sql);

while($row = $result->fetch_assoc()){
    $roleId = $row['roleId'];
}

if($roleId == 3){
    header("Location: index.php");
    exit;
}

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
    <link rel="stylesheet" href="css/metal-binding-list.css">
    <title>Гибка метала</title>
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
                            <div class="nav-link">
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
                            <div class="nav-link active">
                                <img src="/assets/icons/pencil.svg" alt="">
                                <a href="metal-binding-list.php">Гибка металла</a>
                            </div>
                        </div>';
                        break;
                case 'Бригадир':
                    echo '<div class="nav">
                            <p class="side-title">ГЛАВНОЕ МЕНЮ</p>
                            <div class="nav-link active">
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
                    <h1>Список проектов</h1>
                    <div>
                        <div class="buttons">
                            <form method="post">
                                <button class="create-project" id="create-project" name="create-project">
                                    Создать
                                </button>
                            </form>
                            <button class="delete-project">
                                Удалить
                            </button>
                        </div>
                    </div>
                </div>

                <div class="komp-list">
                        <table>
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>№</th>
                                    <th>Проект</th>
                                    <th>Дата создания</th>
                                    <th>Ответственный</th>
                                    <th>План</th>
                                    <th>Факт</th>
                                    <th>Статус</th>
                                </tr>
                            </thead>
                            <tbody>
                        <?php
                        
                            $userId = $_SESSION['userId'];

                            $sql = "SELECT roleId FROM user WHERE userId = $userId";
                            $result = $conn->query($sql);
                            while ($row = $result->fetch_assoc()) { 
                                $roleId = $row['roleId'];
                            }

                            if ($roleId == 2 || $roleId == 6) {
                                $sql = "SELECT p.projectListCadId, p.projectListCadName, p.projectListCadDate, p.projectListCadPlan, p.projectListCadFact, p.projectListCadResponsible, p.StatusCadId, s.StatusName
                                FROM projectListCad p
                                INNER JOIN StatusCad s ON p.StatusCadId = s.StatusCadId";
    
                                $result = $conn->query($sql);
    
                                $NUM = 0;
    
                                while ($row = $result->fetch_assoc()) {
                                $NUM = $NUM + 1;
                                echo "<tr>";
                                echo "<td><input type='checkbox' class='row-checkbox'></td>";
                                echo "<td data-id='" . $row['projectListCadId'] ."' onclick=\"window.location.href = 'metal-binding-product-list.php?projectListCadId=".$row['projectListCadId']."'\">".$NUM."</td>";
                                echo "<td data-id='" . $row['projectListCadId'] ."' onclick=\"window.location.href = 'metal-binding-product-list.php?projectListCadId=".$row['projectListCadId']."'\">".$row['projectListCadName']."</td>";
                                echo "<td data-id='" . $row['projectListCadId'] ."' onclick=\"window.location.href = 'metal-binding-product-list.php?projectListCadId=".$row['projectListCadId']."'\">".date("d.m.Y", strtotime($row['projectListCadDate']))."</td>";
                                echo "<td data-id='" . $row['projectListCadId'] ."'>";
    
                                // Выводим имя и фамилию ответственного
                                $userId = $row['projectListCadResponsible'];
                                $userSql = "SELECT name, surname FROM user WHERE userId = $userId";
                                $userResult = $conn->query($userSql);
                                if ($userRow = $userResult->fetch_assoc()) {
                                echo $userRow['name'] . " " . $userRow['surname'];
                                } else {
                                echo "Unknown";
                                }
    
                                echo "</td>";
                                echo "<td data-id='" . $row['projectListCadId'] ."' onclick=\"window.location.href = 'metal-binding-product-list.php?projectListCadId=".$row['projectListCadId']."'\">".$row['projectListCadPlan']."</td>";
                                echo "<td data-id='" . $row['projectListCadId'] ."' onclick=\"window.location.href = 'metal-binding-product-list.php?projectListCadId=".$row['projectListCadId']."'\">".$row['projectListCadFact']."</td>";
                                echo "<td data-id='" . $row['projectListCadId'] ."' onclick=\"window.location.href = 'metal-binding-product-list.php?projectListCadId=".$row['projectListCadId']."'\">".$row['StatusName']."</td>";
                                echo "</tr>";
                                }
                                echo "<tbody>";
                                echo "</table>";
                            }else{
                                $sql = "SELECT p.projectListCadId, p.projectListCadName, p.projectListCadDate, p.projectListCadPlan, p.projectListCadFact, p.projectListCadResponsible, p.StatusCadId, s.StatusName
                                FROM projectListCad p
                                INNER JOIN StatusCad s ON p.StatusCadId = s.StatusCadId 
                                WHERE p.projectListCadResponsible = $userId";
    
                                $result = $conn->query($sql);
    
                                $NUM = 0;
    
                                while ($row = $result->fetch_assoc()) {
                                $NUM = $NUM + 1;
                                echo "<tr>";
                                echo "<td><input type='checkbox' class='row-checkbox'></td>";
                                echo "<td data-id='" . $row['projectListCadId'] ."' onclick=\"window.location.href = 'metal-binding-product-list.php?projectListCadId=".$row['projectListCadId']."'\">".$NUM."</td>";
                                echo "<td data-id='" . $row['projectListCadId'] ."' onclick=\"window.location.href = 'metal-binding-product-list.php?projectListCadId=".$row['projectListCadId']."'\">".$row['projectListCadName']."</td>";
                                echo "<td data-id='" . $row['projectListCadId'] ."' onclick=\"window.location.href = 'metal-binding-product-list.php?projectListCadId=".$row['projectListCadId']."'\">".date("d.m.Y", strtotime($row['projectListCadDate']))."</td>";
                                echo "<td data-id='" . $row['projectListCadId'] ."'>";
    
                                // Выводим имя и фамилию ответственного
                                $userId = $row['projectListCadResponsible'];
                                $userSql = "SELECT name, surname FROM user WHERE userId = $userId";
                                $userResult = $conn->query($userSql);
                                if ($userRow = $userResult->fetch_assoc()) {
                                echo $userRow['name'] . " " . $userRow['surname'];
                                } else {
                                echo "Unknown";
                                }
    
                                echo "</td>";
                                echo "<td data-id='" . $row['projectListCadId'] ."' onclick=\"window.location.href = 'metal-binding-product-list.php?projectListCadId=".$row['projectListCadId']."'\">".$row['projectListCadPlan']."</td>";
                                echo "<td data-id='" . $row['projectListCadId'] ."' onclick=\"window.location.href = 'metal-binding-product-list.php?projectListCadId=".$row['projectListCadId']."'\">".$row['projectListCadFact']."</td>";
                                echo "<td data-id='" . $row['projectListCadId'] ."' onclick=\"window.location.href = 'metal-binding-product-list.php?projectListCadId=".$row['projectListCadId']."'\">".$row['StatusName']."</td>";
                                echo "</tr>";
                                }
                                echo "<tbody>";
                                echo "</table>";
                            }

                            
                        ?>
                </div>
            </div>
        </div>
    </div>

    <div id="myModal" class="modal">
    <div class="modal-content">
        <p class="modal-title">Создание проекта</p>
        <div id="errorContainer"></div>
        <form action="function/process.php" id="projectForm" method="post">
            <p>Название проекта</p>
            <input type="text" name="projectName" id="projectName" required>
            <?php
                $userId = $_SESSION['userId'];

                $sql = "SELECT roleId FROM user WHERE userId = $userId";
                $result = $conn->query($sql);
                while ($row = $result->fetch_assoc()) { 
                    $roleId = $row['roleId'];
                }
                

                if ($roleId == 2 || $roleId == 6) {
                    echo '<p>Ответственный</p>';
                    echo '<select name="responsibleUserId" id="responsibleUserId" required>';
                    $sql = "SELECT * FROM user WHERE roleId IN (2, 4, 5, 6)";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        $selected = ($row['userId'] == $userId) ? "selected" : "";
                        echo '<option value="'.$row['userId'].'" '.$selected.'>'.$row['name'].' '.$row['surname'].'</option>';
                    }
                    echo '</select>';
                } else {
                    echo '<select name="responsibleUserId" id="responsibleUserId" required hidden>';
                    $sql = "SELECT * FROM user WHERE roleId IN (2, 4, 5, 6)";
                    $result = $conn->query($sql);
                    while ($row = $result->fetch_assoc()) {
                        $selected = ($row['userId'] == $userId) ? "selected" : "";
                        echo '<option value="'.$row['userId'].'" '.$selected.'>'.$row['name'].' '.$row['surname'].'</option>';
                    }
                    echo '</select>';
                }
            ?>
            <button type="submit" class="add">Добавить</button>
            <button type="button" class="cancel">Отменить</button>
        </form>
    </div>
</div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script> 
    <script src="/js/jquery.js"></script>
    <script src="/js/metal-binding-list.js"></script>
</body>
</html>