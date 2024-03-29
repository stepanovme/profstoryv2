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
    <link rel="stylesheet" href="css/metal-binding.css">
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
                        <a href="project-info.php?PNUMB=<?php echo htmlspecialchars($PNUMB); ?>" class="active">Первое изделие</a>
                    </div>
                    <div></div>
                </div>
                <div class="info-project-product">

                <div class="header-ticket" style="text-align:center;">
                    <h1>Заявка на гибку метала №1</h1>
                </div>
                <div class="ticket">
                        <div class="line">
                            <div class="object">
                                <p>Объект:</p>
                                <input type="text" name="object">
                            </div>
                            <div class="date">
                                <p>Дата:</p>
                                <input type="date" name="data-project">
                            </div>
                        </div>

    
                        
                        <div class="line">
                            <div class="color">
                                <p>Цвет/толщина:</p>
                                <input type="text" name="color">
                            </div>
                            <div class="izd">
                                <p>Кол-во изделий:</p>
                                <input type="text" name="count">
                            </div>
                        </div>
                        
                        <div class="line">
                            <div class="brigada">
                                <p>Бригада:</p>
                                <input type="text" name="brigada">
                            </div>
                            <div class="mterpog">
                                <p>м.п.</p>
                                <input type="text" name="metrpog">
                            </div>
                        </div>

                        <div class="line">
                            <div class="address">
                                <p>Адрес доставки:</p>
                                <input type="text" name="address">
                            </div>
                        </div>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th style="width: 100px;">Поз.</th>
                            <th>Изделие</th>
                            <th style="width: 100px;">кол-во, шт</th>
                            <th style="width: 100px;">L, м</th>
                            <th style="width: 600px;">Место</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td id="drawCell">
                                <canvas id="drawingCanvas" width="1000" height="300" willReadFrequently></canvas>
                            </td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                        </tr>
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>
    <script>
// Переменные для хранения истории рисования
var drawingHistory = [];
var isDrawing = false;
var lastX = 0;
var lastY = 0;

// Получаем ссылку на холст
var canvas = document.getElementById("drawingCanvas");
var ctx = canvas.getContext("2d");

// Задаем параметры сетки
var gridSpacing = 20; // Расстояние между линиями сетки
var gridColor = "#ccc"; // Цвет линий сетки

// Функция для рисования фоновой сетки
function drawGrid() {
    ctx.beginPath();
    ctx.strokeStyle = gridColor;

    // Рисуем вертикальные линии сетки
    for (var x = 0; x < canvas.width; x += gridSpacing) {
        ctx.moveTo(x, 0);
        ctx.lineTo(x, canvas.height);
    }

    // Рисуем горизонтальные линии сетки
    for (var y = 0; y < canvas.height; y += gridSpacing) {
        ctx.moveTo(0, y);
        ctx.lineTo(canvas.width, y);
    }

    ctx.stroke();
}

// Переменные для хранения предыдущих координат мыши
var prevX = 0;
var prevY = 0;

// Функция для рисования линий
function drawLine(e) {
    if (!isDrawing) return;

    // Определяем координаты линии в соответствии с сеткой
    var mouseX = Math.round(e.offsetX / gridSpacing) * gridSpacing;
    var mouseY = Math.round(e.offsetY / gridSpacing) * gridSpacing;

    ctx.beginPath();
    ctx.moveTo(lastX, lastY);

    // Проверяем, была ли нажата клавиша Ctrl
    if (e.ctrlKey) {
        // Определяем радиус полуокружности
        var radius = gridSpacing / 2;

        // Определяем координаты центра полуокружности в соседней клетке
        var centerX = mouseX;
        var centerY = mouseY - gridSpacing / 2;

        // Определяем начальный и конечный угол полуокружности в зависимости от движения мыши
        var startAngle, endAngle;
        if (mouseY > prevY) {
            startAngle = Math.PI * 1.5; // 270 градусов (вниз)
            endAngle = Math.PI * 0.5; // 90 градусов (вверх)
        } else {
            startAngle = Math.PI * 1.5; // 90 градусов (вверх)
            endAngle = Math.PI * 0.5; // 270 градусов (вниз)
        }

        // Рисуем полуокружность
        ctx.arc(centerX, centerY, radius, startAngle, endAngle);
    } else {
        // Рисуем обычную линию, если не нажата клавиша Ctrl
        ctx.lineTo(mouseX, mouseY);
    }

    ctx.lineWidth = 2;
    ctx.strokeStyle = "#000"; // Устанавливаем цвет линии в черный
    ctx.stroke();

    [lastX, lastY] = [mouseX, mouseY];

    // Запоминаем предыдущие координаты мыши
    prevX = mouseX;
    prevY = mouseY;
}



// Функция для начала рисования
function startDrawing(e) {
    isDrawing = true;
    [lastX, lastY] = [Math.round(e.offsetX / gridSpacing) * gridSpacing, Math.round(e.offsetY / gridSpacing) * gridSpacing];
}

// Функция для завершения рисования
function endDrawing() {
    isDrawing = false;
    saveDrawing(); // Сохраняем текущее состояние рисунка после завершения рисования
}

// Функция для сохранения текущего состояния рисунка
function saveDrawing() {
    var imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
    drawingHistory.push(imageData);
}

// Функция для отмены последнего действия
function undoLastAction(e) {
    if (e.ctrlKey && e.key === 'z' || (e.ctrlKey && e.code === 'KeyZ')) {
        e.preventDefault(); // Предотвращаем стандартное действие браузера (например, отмену)

        if (drawingHistory.length > 0) {
            drawingHistory.pop(); // Удаляем последнее действие из истории
            redrawCanvas(); // Перерисовываем холст без последнего действия
        }
    }
}

// Функция для перерисовки холста без последнего действия
// Функция для перерисовки холста без последнего действия
function redrawCanvas() {
    clearCanvas(); // Очищаем холст
    drawGrid(); // Рисуем фоновую сетку
    if (drawingHistory.length > 0) {
        ctx.putImageData(drawingHistory[drawingHistory.length - 1], 0, 0); // Отображаем последнее сохраненное состояние
    }
}


// Очищаем холст перед отрисовкой
function clearCanvas() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
}

// Рисуем сетку при загрузке страницы
drawGrid();

// Добавляем обработчики событий для рисования и отмены действия
canvas.addEventListener("mousedown", startDrawing);
canvas.addEventListener("mousemove", drawLine);
canvas.addEventListener("mouseup", endDrawing);
canvas.addEventListener("mouseout", endDrawing);
window.addEventListener("keydown", undoLastAction); 
    </script>
</body>
</html>