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

if($roleId == 3){
    header("Location: index.php");
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


// Получаем значение TicketListCadId из GET-запроса
if (isset($_GET['TicketListCadId'])) {
    // Получаем значение параметра
    $TicketListCadId = $_GET['TicketListCadId'];
} else {
    // Если параметр не был передан, выводим сообщение об ошибке или выполняем другие действия
    echo "Ошибка: Не передан номер комплекта";
    exit; // Выход из скрипта, чтобы избежать дальнейшей обработки
}

$sql = "SELECT t.TicketListCadId, t.TicketListCadPlace, t.TicketListCadDatePlan, t.TicketListCadName, t.TicketListCadObject, t.TicketListCadColor, t.TicketListCadThickness, t.TicketListCadBrigade, t.TicketListCadAddress, t.TicketListCadDate, t.TicketListCadQuantity, t.TicketListCadMetr, t.TicketListCadNum, t.projectListCadId, t.StatusCadId, s.StatusName
        FROM TicketListCad t
        INNER JOIN StatusCad s ON t.StatusCadId = s.StatusCadId
        WHERE t.TicketListCadId = $TicketListCadId";

$result = $conn->query($sql);

while ($row = $result->fetch_assoc()){
    $projectListCadId = $row['projectListCadId'];
    $TicketListCadName = $row['TicketListCadName'];
    $TicketListCadObject = $row['TicketListCadObject'];
    $TicketListCadColor = $row['TicketListCadColor'];
    $TicketListCadThickness = $row['TicketListCadThickness'];
    $TicketListCadBrigade = $row['TicketListCadBrigade'];
    $TicketListCadAddress = $row['TicketListCadAddress'];
    $TicketListCadDate = $row['TicketListCadDate'];
    $TicketListCadQuantity = $row['TicketListCadQuantity'];
    $TicketListCadMetr = $row['TicketListCadMetr'];
    $TicketListCadNum = $row['TicketListCadNum'];
    $StatusName = $row['StatusName'];
    $TicketListCadDatePlan = $row['TicketListCadDatePlan'];
    $TicketListCadPlace = $row['TicketListCadPlace'];
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
    <link rel="stylesheet" href="css/metal-binding.css">
    <title>Проект</title>
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
                <a class="back" onclick="window.location.href = 'metal-binding-product-list.php?projectListCadId=<?php echo $projectListCadId;?>'">< вернутся</a>
                <div class="wrapper-head">
                    <div class="menu">
                        <a href="project-info.php?PNUMB=<?php echo htmlspecialchars($PNUMB); ?>" class="active">Заявка</a>
                        <a href="project-info.php?PNUMB=<?php echo htmlspecialchars($PNUMB); ?>">Расчёт</a>
                    </div>
                    <div></div>
                </div>
                <div class="info-project-product">

                <div class="header-ticket" style="text-align:center;">
                    <h1>Заявка на гибку метала №</h1>
                    <input type="text" class="ticket-num" id="ticketNum" data-id="<?php echo $TicketListCadId; ?>" value="<?php echo $TicketListCadNum; ?>">
                </div>

                <div class="ticket">
                    <div class="line">
                        <div class="object">
                            <p>Объект:</p>
                            <input type="text" id="TicketListCadObject" data-id="<?php echo $TicketListCadId; ?>" name="object" value="<?php echo $TicketListCadObject; ?>">
                        </div>
                        <div class="status">
                            <p>Статус:</p>
                            <input type="status" name="status-project" data-id="<?php echo $TicketListCadId; ?>" value="<?php echo $StatusName; ?>" readonly>
                        </div>
                    </div>
                    <div class="line">
                        <div class="color">
                            <p>Цвет:</p>
                            <input type="text" id="TicketListCadColor" data-id="<?php echo $TicketListCadId; ?>" name="color" value="<?php echo $TicketListCadColor; ?>">
                        </div>
                        <div class="date">
                            <p>Дата план:</p>
                            <input type="date" id="TicketListCadDatePlan" data-id="<?php echo $TicketListCadId; ?>" name="data-project" value="<?php echo $TicketListCadDatePlan; ?>">
                        </div>
                    </div>
                    
                    <div class="line">
                        <div class="tikness">
                            <p>Толщина:</p>
                            <input type="text" id="TicketListCadThickness" data-id="<?php echo $TicketListCadId; ?>" name="brigada" value="<?php echo $TicketListCadThickness; ?>">
                        </div>
                        <div class="izd">
                            <p>Кол-во изделий:</p>
                            <input type="text" id="TicketListCadQuantity" data-id="<?php echo $TicketListCadId; ?>" name="count" value="<?php echo $TicketListCadQuantity; ?>" readonly>
                        </div>
                    </div>

                    <div class="line">
                        <div class="place">
                            <p>Участок:</p>
                            <input type="text" id="TicketListCadPlace" data-id="<?php echo $TicketListCadId; ?>" name="place" value="<?php echo $TicketListCadPlace; ?>">
                        </div>
                        <div class="mterpog">
                            <p>м.п.</p>
                            <input type="text" id="TicketListCadMetr" data-id="<?php echo $TicketListCadId; ?>" name="metrpog" value="<?php echo $TicketListCadMetr; ?>" readonly>
                        </div>
                    </div>

                    <div class="line">
                        <div class="brigada">
                            <p>Бригада:</p>
                            <input type="text" id="TicketListCadBrigade" data-id="<?php echo $TicketListCadId; ?>" name="brigada" value="<?php echo $TicketListCadBrigade; ?>">
                        </div>
                        <div></div>
                    </div>

                    <div class="line">
                        <div class="address">
                            <p>Адрес доставки:</p>
                            <input type="text" id="TicketListCadAddress" data-id="<?php echo $TicketListCadId; ?>" name="address" value="<?php echo $TicketListCadAddress; ?>">
                        </div>
                        <div></div>
                    </div>
                </div>

                <div class="buttons">
                    <form method="post">
                        <button class="create-izd" id="create-izd" data-id="<?php echo $TicketListCadId; ?>" name="create-izd">
                            Создать
                        </button>
                    </form>
                    <button class="delete-izd">
                        Удалить
                    </button>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th style="width: 40px;"></th>
                            <th style="width: 60px;">Поз.</th>
                            <th>Изделие</th>
                            <th style="width: 100px;">Сумма развёртки</th>
                            <th style="width: 100px;">L, м</th>
                            <th style="width: 100px;">кол-во, шт</th>
                            <th style="width: 600px;">Место</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>

                    <?php
                    
                    $sql = "SELECT * FROM ProductListCad WHERE TicketListCadId = $TicketListCadId";

                    $result = $conn->query($sql);

                    $num = 0;

                    while ($row = $result->fetch_assoc()){
                        $num = $num + 1;
                        echo "<tr data-id='".$row['ProductListCadId']."'>";
                        echo "<td><input type='checkbox' data-id='".$row['ProductListCadId']."' class='row-checkbox'></td>";
                        echo '<td>'.$num.'</td>';
                        echo '<td id="drawCell">
                                <input type="text" placeholder="Название изделия" value="'.$row['ProductListCadName'].'">
                                <canvas></canvas>
                               </td>';
                        echo '<td>'.$row['ProductListCadSum'].'</td>';
                        echo "<td class='editable-length' contenteditable='true' data-id='".$row['ProductListCadId']."'>".$row['ProductListCadLength']."</td>";
                        echo "<td class='editable-quantity' contenteditable='true' data-id='".$row['ProductListCadId']."' data-ticketlistcadid='".$TicketListCadId."'>".$row['ProductListCadQuantity']."</td>";
                        echo "<td class='editable-address' contenteditable='true' data-id='".$row['ProductListCadId']."'>".$row['ProductListCadAddress']."</td>";
                        echo "</tr>";
                    }

                    ?>
                    </tbody>
                </table>
                
                <div class="total">
                    <p>Итого количество: <?php echo $TicketListCadId;?> м.п.</p>
                    <button>Отправить</button>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.18.5/xlsx.full.min.js"></script> 
<script src="/js/jquery.js"></script>
<script src="js/metal-binding.js"></script>
<script>

document.getElementById('create-izd').addEventListener('click', function() {
    var TicketListCadId = <?php echo $TicketListCadId; ?>; // Получаем значение TicketListCadId из PHP
    // Отправляем запрос на создание новой заявки
    var xhr = new XMLHttpRequest();
    xhr.onreadystatechange = function() {
        if (xhr.readyState === XMLHttpRequest.DONE) {
            if (xhr.status === 200) {
                // После успешного создания заявки перенаправляем на страницу с новой заявкой
                // window.location.reload();
            } else {
                alert('Произошла ошибка при создании заявки');
                // window.location.reload();
            }
        }
    };
    xhr.open('POST', 'function/create_izd.php');
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.send('TicketListCadId=' + TicketListCadId); // Отправляем TicketListCadId на сервер
});

</script>

</body>
</html>