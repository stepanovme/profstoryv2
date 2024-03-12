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

<?php
$host = $pathDB;
$username = 'SYSDBA';
$password = 'masterkey';



header('Content-Type: text/html; charset=WIN1251');


try{
    $dbh = new PDO("firebird:dbname=$host;charset=WIN1251", $username, $password);
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    header('Content-Type: text/html; charset=WIN1251');

    if (isset($_GET['PNUMB'])) {
        // Получаем значение параметра
        $projectNumber = $_GET['PNUMB'];
    } else {
        // Если параметр не был передан, выводим сообщение об ошибке или выполняем другие действия
        echo "Ошибка: Не передан номер проекта";
    }

    $sql = "SELECT * FROM LISTPRJ WHERE PNUMB = $projectNumber";
    $sth = $dbh->query($sql);
    
    while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
        $MNAME = $row['MNAME'];
        $ZNUMB = $row['ZNUMB'];
        $PSTAT = $row['PSTAT'];
        $PPREF = $row['PPREF'];
        $POBJA = $row['POBJA'];
        $KNAME = $row['KNAME'];
        $PDATE = $row['PDATE'];
        $POBJL = $row['POBJL'];
        $INUMB = $row['INUMB'];
        $CNAME = $row['CNAME'];
        $PNAME = $row['PNAME'];
        $KDESC = $row['KDESC'];
        $ADESC = $row['ADESC'];
        $WDESC = $row['WDESC'];
        $PDESC = $row['PDESC'];
        $DESC1 = $row['DESC1'];
        $DESC2 = $row['DESC2'];
        $DESC3 = $row['DESC3'];
        $DESC5 = $row['DESC5'];
        $XDESC = $row['XDESC'];
        $KPRIC = $row['KPRIC'];
        $APRIC = $row['APRIC'];
        $WPRIC = $row['WPRIC'];
        $PPRIC = $row['PPRIC'];
        $KPRCD = $row['KPRCD'];
        $APRCD = $row['APRCD'];
        $WPRCD = $row['WPRCD'];
        $PPRCD = $row['PPRCD'];
        $PUNIC = $row['PUNIC'];
    }

    $formattedDate = date("d-m-Y", strtotime($PDATE));

} catch (PDOException $e) {
    echo "Ошибка соединения: " . $e->getMessage();
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
                <a href="index.php" class="back">< вернутся</a>
                <div class="wrapper-head">
                    <div class="menu">
                        <a class="active">Главная</a>
                        <a href="project-info-product.php?PUNIC=<?php echo htmlspecialchars($PUNIC); ?>">Изделия</a>
                        <a href="project-info-kompl.php?PUNIC=<?php echo htmlspecialchars($PUNIC); ?>">Комлектация</a>
                        <a href="project-info-work.php?PUNIC=<?php echo htmlspecialchars($PUNIC); ?>">Работы</a>
                    </div>
                    <div></div>
                </div>
                <div class="info-project">
                    <p>Проект № </p>
                    <p class="edit"><?php echo $projectNumber; ?></p>
                    <p>Заказ №</p>
                    <p class="edit"><?php echo $ZNUMB; ?></p>
                    <p>Статус проекта</p>
                    <p class="edit"><?php echo $ZNUMB; ?></p>
                    <p>Менеджер</p>
                    <p class="edit"><?php echo $MNAME; ?></p>
                    <p>Конструктор</p>
                    <p class="edit"><?php echo $CNAME; ?></p>
                    <p>Категория</p>
                    <p class="edit"><?php echo $PPREF; ?></p>
                    <p>Объект</p>
                    <p class="edit"><?php echo $POBJA; ?></p>
                    <p>Счет №</p>
                    <p class="edit"><?php echo $INUMB; ?></p>
                    <p>Контрагент</p>
                    <p class="edit"><?php echo $KNAME; ?></p>
                    <p>Описание</p>
                    <p class="edit"><?php echo $POBJL; ?></p>
                    <p>Регистрация</p>
                    <p class="edit"><?php echo $formattedDate; ?></p>
                    <p>Продавец</p>
                    <p class="edit"><?php echo $PNAME; ?></p>
                </div>

                <div class="prices">
                    <div class="discount">
                        <p class="title">Скидка, %</p>
                        <div class="discount-data">
                            <p>Конструкции</p>
                            <p class="edit"><?php echo number_format($KDESC, 2, '.', ''); ?></p>
                            <p>Профили</p>
                            <p class="edit"><?php echo number_format($DESC1, 2, '.', ''); ?></p>
                            <p>Комплектация</p>
                            <p class="edit"><?php echo number_format($ADESC, 2, '.', '') ?></p>
                            <p>Аксессуары</p>
                            <p class="edit"><?php echo number_format($DESC2, 2, '.', ''); ?></p>
                            <p>Работы</p>
                            <p class="edit"><?php echo number_format($WDESC, 2, '.', ''); ?></p>
                            <p>Погонаж</p>
                            <p class="edit"><?php echo number_format($DESC3, 2, '.', ''); ?></p>
                            <p>Общая</p>
                            <p class="edit"><?php echo number_format($PDESC, 2, '.', ''); ?></p>
                            <p>Заполнения</p>
                            <p class="edit"><?php echo number_format($DESC5, 2, '.', ''); ?></p>
                            <p>Дополнительная</p>
                            <p class="edit"><?php echo number_format($XDESC, 2, '.', ''); ?></p>
                        </div>
                    </div>

                    <div class="price-without-discount">
                        <p class="title">Стоимость без скидок</p>
                        <div class="price-without-discount-data">
                            <p>Конструкции</p>
                            <p class="edit"><?php echo number_format($KPRIC, 2, '.', ' ') . " руб"; ?></p>
                            <p>Комплектация</p>
                            <p class="edit"><?php echo number_format($APRIC, 2, '.', ' ') . " руб"; ?></p>
                            <p>Работы</p>
                            <p class="edit"><?php echo number_format($WPRIC, 2, '.', ' ') . " руб"; ?></p>
                            <p>Общая</p>
                            <p class="edit"><?php echo number_format($PPRIC, 2, '.', ' ') . " руб"; ?></p>
                            <p>Проекта</p>
                            <p class="edit"><?php echo number_format($PPRIC, 2, '.', ' ') . " руб"; ?></p>
                        </div>
                    </div>

                    <div class="to-paid">
                        <p class="title">К оплате</p>
                        <div class="to-paid-data">
                            <p>Конструкции</p>
                            <p class="edit"><?php echo number_format($KPRCD, 2, '.', ' ') . " руб"; ?></p>
                            <p>Комплектация</p>
                            <p class="edit"><?php echo number_format($APRCD, 2, '.', ' ') . " руб"; ?></p>
                            <p>Работы</p>
                            <p class="edit"><?php echo number_format($WPRCD, 2, '.', ' ') . " руб"; ?></p>
                            <p>Общая</p>
                            <p class="edit"><?php echo number_format($PPRCD, 2, '.', ' ') . " руб"; ?></p>
                            <p>Проекта</p>
                            <p class="edit"><?php echo number_format($PPRCD, 2, '.', ' ') . " руб"; ?></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>