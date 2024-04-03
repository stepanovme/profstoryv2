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

$sql = "SELECT * FROM TicketListCad WHERE TicketListCadId = $TicketListCadId";

$result = $conn->query($sql);

while ($row = $result->fetch_assoc()){
    $projectListCadId = $row['projectListCadId'];
    $TicketListCadName = $row['TicketListCadName'];
    $TicketListCadColor = $row['TicketListCadColor'];
    $TicketListCadBrigade = $row['TicketListCadBrigade'];
    $TicketListCadAddress = $row['TicketListCadAddress'];
    $TicketListCadDate = $row['TicketListCadDate'];
    $TicketListCadQuantity = $row['TicketListCadQuantity'];
    $TicketListCadMetr = $row['TicketListCadMetr'];
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
                    <h1>Заявка на гибку метала №1</h1>
                </div>
                <div class="ticket">
                        <div class="line">
                            <div class="object">
                                <p>Объект:</p>
                                <input type="text" name="object" value="<?php echo $TicketListCadName; ?>">
                            </div>
                            <div class="date">
                                <p>Дата:</p>
                                <input type="date" name="data-project" value="<?php echo $TicketListCadDate; ?>">
                            </div>
                        </div>
                        <div class="line">
                            <div class="color">
                                <p>Цвет/толщина:</p>
                                <input type="text" name="color" value="<?php echo $TicketListCadColor; ?>">
                            </div>
                            <div class="izd">
                                <p>Кол-во изделий:</p>
                                <input type="text" name="count" value="<?php echo $TicketListCadQuantity; ?>">
                            </div>
                        </div>
                        
                        <div class="line">
                            <div class="brigada">
                                <p>Бригада:</p>
                                <input type="text" name="brigada" value="<?php echo $TicketListCadBrigade; ?>">
                            </div>
                            <div class="mterpog">
                                <p>м.п.</p>
                                <input type="text" name="metrpog" value="<?php echo $TicketListCadMetr; ?>">
                            </div>
                        </div>

                        <div class="line">
                            <div class="address">
                                <p>Адрес доставки:</p>
                                <input type="text" name="address" value="<?php echo $TicketListCadAddress; ?>">
                            </div>
                        </div>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th style="width: 100px;">Поз.</th>
                            <th>Изделие</th>
                            <th style="width: 100px;">Сумма развёртки</th>
                            <th style="width: 100px;">L, м</th>
                            <th style="width: 100px;">кол-во, шт</th>
                            <th style="width: 600px;">Место</th>
                        </tr>
                    </thead>
                    <tbody>

                    <?php
                    
                    $sql = "SELECT * FROM ProductListCad WHERE TicketListCadId = $TicketListCadId";

                    $result = $conn->query($sql);

                    $num = 0;

                    while ($row = $result->fetch_assoc()){
                        $num = $num + 1;
                        echo '<td>'.$num.'</td>';
                        echo '<td id="drawCell">
                                <div class="canvas-panel">
                                    <button id="textButton">T</button>
                                    <button id="arrowButton">С</button>
                                    <canvas id="drawingCanvas" width="1000" height="300" willReadFrequently></canvas>
                                </div>
                               </td>';
                        echo '<td></td>';
                        echo '<td>'.$row['ProductListCadLength'].'</td>';
                        echo '<td>'.$row['ProductListCadQuantity'].'</td>';
                        echo '<td>'.$row['ProductListCadPlace'].'</td>';
                    }

                    ?>

                        <!-- <tr>
                            <td>1</td>
                            <td id="drawCell">
                                <div class="canvas-panel">
                                    <button id="textButton">T</button>
                                    <button id="arrowButton">С</button>
                                    <canvas id="drawingCanvas" width="1000" height="300" willReadFrequently></canvas>
                                </div>
                            </td>
                            <td>1</td>
                            <td>1</td>
                            <td>1</td>
                        </tr> -->
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>

<script>
document.addEventListener("DOMContentLoaded", function () {
    var canvas = document.getElementById('drawingCanvas');
    var ctx = canvas.getContext('2d');
    ctx.lineWidth = 1; // Толщина линии сетки
    var gridColor = '#ccc'; // Цвет сетки
    ctx.strokeStyle = gridColor; // Устанавливаем цвет сетки

    var gridSize = 20; // Размер клетки сетки

    // Рисуем сетку
    function drawGrid() {
        ctx.strokeStyle = gridColor; // Устанавливаем цвет сетки
        for (var x = 0; x < canvas.width; x += gridSize) {
            ctx.beginPath();
            ctx.moveTo(x, 0);
            ctx.lineTo(x, canvas.height);
            ctx.stroke();
        }
        for (var y = 0; y < canvas.height; y += gridSize) {
            ctx.beginPath();
            ctx.moveTo(0, y);
            ctx.lineTo(canvas.width, y);
            ctx.stroke();
        }
    }

    // Рисуем сетку при загрузке страницы
    drawGrid();

    var isDrawing = false;
    var lines = []; // Массив для хранения линий
    var texts = []; 
    var arrows = []; // Массив для хранения стрелок

    // Переменная для отслеживания состояния кнопки "T"
    var textEnabled = false;
    var arrowEnabled = false; // Флаг, указывающий, включен ли режим рисования стрелок

    var startLinePoint = { x: 0, y: 0 };
    var endLinePoint = { x: 0, y: 0 };

    // Переменная для отслеживания выбранного инструмента
    var selectedTool = ''; // По умолчанию нет выбранного инструмента

    
    // Обработчик события для кнопки "С"
    document.getElementById('arrowButton').addEventListener('click', function () {
        selectedTool = 'arrow'; // Устанавливаем выбранный инструмент на "стрелка"
    });

    // Обработчик события для кнопки "T"
    document.getElementById('textButton').addEventListener('click', function () {
        selectedTool = 'text'; // Устанавливаем выбранный инструмент на "текст"
    });


    // Обработчики событий для рисования линий
    canvas.addEventListener('mousedown', function (e) {
    if (!textEnabled && !arrowEnabled) {
        isDrawing = true;
        var startPoint = { x: Math.round((e.clientX - canvas.getBoundingClientRect().left) / gridSize) * gridSize, y: Math.round((e.clientY - canvas.getBoundingClientRect().top) / gridSize) * gridSize };
        if (e.ctrlKey) { // Если нажата клавиша Ctrl
            lines.push({ start: startPoint, end: startPoint, isCircle: true }); // Добавляем новый полукруг в массив
        } else {
            lines.push({ start: startPoint, end: startPoint }); // Добавляем новую линию в массив
        }
    }
    if (arrowEnabled && !isDrawing) {
        tempArrowStart = { x: e.clientX - canvas.getBoundingClientRect().left, y: e.clientY - canvas.getBoundingClientRect().top };
        tempArrowEnd = tempArrowStart;
        isDrawing = true;
        redraw();
    }
});

canvas.addEventListener('mousemove', function (e) {
    if (isDrawing && !textEnabled && !arrowEnabled) {
        var currentPoint = { x: Math.round((e.clientX - canvas.getBoundingClientRect().left) / gridSize) * gridSize, y: Math.round((e.clientY - canvas.getBoundingClientRect().top) / gridSize) * gridSize };
        lines[lines.length - 1].end = currentPoint; // Обновляем конечную точку последней линии
        redraw();
    }
    if (arrowEnabled && isDrawing) {
        var currentPoint = { x: e.clientX - canvas.getBoundingClientRect().left, y: e.clientY - canvas.getBoundingClientRect().top };
        tempArrowEnd = currentPoint;
        redraw();
    }
});


    canvas.addEventListener('mouseup', function () {
        if (arrowEnabled && isDrawing) {
        isDrawing = false;
        arrows.push({ start: tempArrowStart, end: tempArrowEnd });
        redraw();
    }
    });

    // Обработчик события клика на canvas-panel
canvas.addEventListener('click', function (e) {
    if (textEnabled) {
        var textInput = document.createElement('input');
        textInput.type = 'text';
        textInput.style.position = 'absolute';
        // Используем относительные координаты клика относительно canvas-panel
        textInput.style.left = (e.offsetX) + 'px';
        textInput.style.top = (e.offsetY) + 'px';
        textInput.addEventListener('keyup', function (event) {
            if (event.key === 'Enter') {
                var text = textInput.value;
                // Сохраняем текст в массиве
                texts.push({ text: text, x: parseInt(textInput.style.left), y: parseInt(textInput.style.top) });
                redraw(); // Перерисовываем холст
                document.querySelector('.canvas-panel').removeChild(textInput);
            }
        });
        document.querySelector('.canvas-panel').appendChild(textInput);
        textInput.focus();
    }
});

    function redraw() {
        ctx.clearRect(0, 0, canvas.width, canvas.height); // Очищаем холст
    drawGrid(); // Рисуем сетку
    lines.forEach(function (line) {
        if (line.isCircle) {
            drawCircle(line.start.x, line.start.y, line.end.x, line.end.y); // Рисуем полукруг, если это полукруг
        } else {
            drawLine(line.start.x, line.start.y, line.end.x, line.end.y); // Рисуем все линии из массива
        }
    });
    // Воспроизводим текст из массива
    texts.forEach(function (textObj) {
        ctx.font = "16px Arial";
        ctx.fillText(textObj.text, textObj.x, textObj.y);
    });

    // Рисуем стрелки только при включенном режиме рисования стрелок
    if (arrowEnabled) {
        arrows.forEach(function (arrow) {
            drawArrow(arrow.start.x, arrow.start.y, arrow.end.x, arrow.end.y); // Рисуем стрелку
        });
    }
}

    function drawLine(x1, y1, x2, y2) {
        ctx.beginPath();
        ctx.moveTo(x1, y1);
        ctx.lineTo(x2, y2);
        ctx.strokeStyle = 'black'; // Устанавливаем черный цвет для линии
        ctx.lineWidth = 1;
        ctx.stroke();
        ctx.closePath();
    }

    function drawCircle(x1, y1, x2, y2) {
        var gridSize = 20; // Размер клетки сетки
        var radius = Math.sqrt(Math.pow(x2 - x1, 2) + Math.pow(y2 - y1, 2)); // Вычисляем радиус полукруга

        // Находим ближайшие координаты, кратные размеру клетки
        var startX = Math.round(x1 / gridSize) * gridSize;
        var startY = Math.round(y1 / gridSize) * gridSize;
        var endX = Math.round(x2 / gridSize) * gridSize;
        var endY = Math.round(y2 / gridSize) * gridSize;

        ctx.beginPath();

        // Определяем направление движения мыши и рисуем полукруг соответственно
        if (x2 > x1 && Math.abs(y2 - y1) < radius) {
            ctx.arc(startX, startY, radius, 0, Math.PI, false); // Рисуем полукруг справа от начальной точки
        } else if (x2 < x1 && Math.abs(y2 - y1) < radius) {
            ctx.arc(startX, startY, radius, Math.PI, 0, false); // Рисуем полукруг слева от начальной точки
        } else if (y2 < y1 && Math.abs(x2 - x1) < radius) {
            ctx.arc(startX, startY, radius, Math.PI / 2, -Math.PI / 2, false); // Рисуем полукруг сверху от начальной точки
        } else if (y2 > y1 && Math.abs(x2 - x1) < radius) {
            ctx.arc(startX, startY, radius, -Math.PI / 2, Math.PI / 2, false); // Рисуем полукруг снизу от начальной точки
        }

        ctx.strokeStyle = 'black'; // Устанавливаем черный цвет для линии
        ctx.stroke();
        ctx.closePath();
    }

    // Добавляем обработчик события клика на кнопку "T"
    textButton.addEventListener('click', function () {
        // Проверяем текущее состояние режима рисования текста
        if (textEnabled) {
            // Если режим рисования текста был включен, отключаем его
            textButton.style.color = ''; // Возвращаем фон кнопки к начальному состоянию
            textEnabled = false; // Устанавливаем переменную textEnabled в false
        } else {
            // Если режим рисования текста был выключен, включаем его
            textButton.style.color = '#59B077'; // Меняем фон кнопки на серый
            textEnabled = true; // Устанавливаем переменную textEnabled в true
        }
    });

    // Добавляем обработчик события клика на кнопку "С"
    arrowButton.addEventListener('click', function () {
    // Проверяем текущее состояние режима рисования стрелок
    if (arrowEnabled) {
        // Если режим рисования стрелок был включен, отключаем его
        arrowButton.style.color = ''; // Возвращаем фон кнопки к начальному состоянию
        arrowEnabled = false; // Устанавливаем переменную arrowEnabled в false
    } else {
        // Если режим рисования стрелок был выключен, включаем его
        arrowButton.style.color = '#59B077'; // Меняем фон кнопки на серый
        arrowEnabled = true; // Устанавливаем переменную arrowEnabled в true
        textEnabled = false; // Убираем включение режима рисования текста, если он был активирован
    }
});


 // Функция для рисования стрелки
function drawArrow(x1, y1, x2, y2) {
    // Вычисляем угол между начальной и конечной точками стрелки
    var angle = Math.atan2(y2 - y1, x2 - x1);

    // Длина стрелки
    var arrowLength = 10;

    // Вычисляем конечные координаты для линии стрелки
    var endX = x2 - arrowLength * Math.cos(angle);
    var endY = y2 - arrowLength * Math.sin(angle);

    // Рисуем линию стрелки
    ctx.beginPath();
    ctx.moveTo(x1, y1);
    ctx.lineTo(endX, endY);
    ctx.stroke();

    // Рисуем "головку" стрелки
    ctx.beginPath();
    ctx.moveTo(endX, endY);
    ctx.lineTo(endX - arrowLength * Math.cos(angle - Math.PI / 6), endY - arrowLength * Math.sin(angle - Math.PI / 6));
    ctx.stroke();

    ctx.beginPath();
    ctx.moveTo(endX, endY);
    ctx.lineTo(endX - arrowLength * Math.cos(angle + Math.PI / 6), endY - arrowLength * Math.sin(angle + Math.PI / 6));
    ctx.stroke();
}

// Функция для рисования линии с головкой стрелки в конце
function drawLineWithArrow(x1, y1, x2, y2) {
    // Рисуем вашу линию
    ctx.beginPath();
    ctx.moveTo(x1, y1);
    ctx.lineTo(x2, y2);
    ctx.stroke();

    // Вычисляем угол между начальной и конечной точками линии
    var angle = Math.atan2(y2 - y1, x2 - x1);

    // Рисуем "головку" стрелки в конце линии
    var arrowLength = 10;
    ctx.beginPath();
    ctx.moveTo(x2, y2);
    ctx.lineTo(x2 - arrowLength * Math.cos(angle - Math.PI / 6), y2 - arrowLength * Math.sin(angle - Math.PI / 6));
    ctx.stroke();

    ctx.beginPath();
    ctx.moveTo(x2, y2);
    ctx.lineTo(x2 - arrowLength * Math.cos(angle + Math.PI / 6), y2 - arrowLength * Math.sin(angle + Math.PI / 6));
    ctx.stroke();
}

// Обработчик события для рисования линий
canvas.addEventListener('mousedown', function (e) {
    // Запоминаем начальные координаты линии
    startLinePoint.x = e.clientX - canvas.getBoundingClientRect().left;
    startLinePoint.y = e.clientY - canvas.getBoundingClientRect().top;
});

canvas.addEventListener('mouseup', function (e) {
    isDrawing = false; // Добавляем эту строку, чтобы завершить рисование линии
    // Запоминаем конечные координаты линии
    endLinePoint.x = e.clientX - canvas.getBoundingClientRect().left;
    endLinePoint.y = e.clientY - canvas.getBoundingClientRect().top;

    // Добавляем новую стрелку в массив только при включенном режиме рисования стрелок
    if (arrowEnabled) {
        arrows.push({ start: startLinePoint, end: endLinePoint }); // Добавляем новую стрелку в массив
        redraw(); // Перерисовываем холст
    }
});

var tempArrowStart = { x: 0, y: 0 };
var tempArrowEnd = { x: 0, y: 0 };

function drawTempArrow() {
    if (arrowEnabled && isDrawing) {
        drawArrow(tempArrowStart.x, tempArrowStart.y, tempArrowEnd.x, tempArrowEnd.y);
    }
}


});



</script>

</body>
</html>