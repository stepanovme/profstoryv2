<?php 
header('Content-Type: text/html; charset=WIN1251'); 

session_start();

if (!isset($_SESSION['userId'])) {
    // ���� ������ �� �����������, �������������� ������������ �� �������� �����
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
    // �������� ������ �� ���������� �������
    $row = $result->fetch_assoc();
    // ��������� �������� ������� pathBD � ��������� ��� � ���������� ���������� $pathDB
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
    <title>������</title>
</head>
<body>
    <div class="page">
        <div class="side">
            <button class="logo" onclick="window.location.href = 'index.php'">
                PROF-INTEGRATE
            </button>
            <div class="nav">
                <p class="side-title">������� ����</p>
                <div class="nav-link">
                    <img src="/assets/icons/dashbord-icon.svg" alt="">
                    <a href="materialValues.php">��</a>
                </div>
                <div class="nav-link active">
                    <img src="/assets/icons/report.svg" alt="">
                    <a href="index.php">�������</a>
                </div>
                <div class="nav-link">
                    <img src="/assets/icons/report.svg" alt="">
                    <a href="kompl-list.php">���������</a>
                </div>
                <div class="nav-link">
                    <img src="/assets/icons/gear.svg" alt="">
                    <a href="settings.php">���������</a>
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
                            echo '�������������';
                        } else {
                            echo '������������';
                        }
                        ?>
                        </p>
                    </div>
                </div>
            </header>

            <div class="wrapper">
                <a href="index.php" class="back">< ��������</a>
                <div class="wrapper-head">
                    <div class="menu">
                        <a href="project-info.php?PNUMB=<?php echo htmlspecialchars($PNUMB); ?>" class="active">������ �������</a>
                    </div>
                    <div></div>
                </div>
                <div class="info-project-product">

                <div class="header-ticket" style="text-align:center;">
                    <h1>������ �� ����� ������ �1</h1>
                </div>
                <div class="ticket">
                        <div class="line">
                            <div class="object">
                                <p>������:</p>
                                <input type="text" name="object">
                            </div>
                            <div class="date">
                                <p>����:</p>
                                <input type="date" name="data-project">
                            </div>
                        </div>

    
                        
                        <div class="line">
                            <div class="color">
                                <p>����/�������:</p>
                                <input type="text" name="color">
                            </div>
                            <div class="izd">
                                <p>���-�� �������:</p>
                                <input type="text" name="count">
                            </div>
                        </div>
                        
                        <div class="line">
                            <div class="brigada">
                                <p>�������:</p>
                                <input type="text" name="brigada">
                            </div>
                            <div class="mterpog">
                                <p>�.�.</p>
                                <input type="text" name="metrpog">
                            </div>
                        </div>

                        <div class="line">
                            <div class="address">
                                <p>����� ��������:</p>
                                <input type="text" name="address">
                            </div>
                        </div>
                </div>

                <table>
                    <thead>
                        <tr>
                            <th style="width: 100px;">���.</th>
                            <th>�������</th>
                            <th style="width: 100px;">���-��, ��</th>
                            <th style="width: 100px;">L, �</th>
                            <th style="width: 600px;">�����</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td id="drawCell">
                                <div class="canvas-panel">
                                    <button id="textButton">T</button>
                                    <button id="arrowButton">�</button>
                                    <canvas id="drawingCanvas" width="1000" height="300" willReadFrequently></canvas>
                                </div>
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
document.addEventListener("DOMContentLoaded", function () {
    var canvas = document.getElementById('drawingCanvas');
    var ctx = canvas.getContext('2d');
    ctx.lineWidth = 1; // ������� ����� �����
    var gridColor = '#ccc'; // ���� �����
    ctx.strokeStyle = gridColor; // ������������� ���� �����

    var gridSize = 20; // ������ ������ �����

    // ������ �����
    function drawGrid() {
        ctx.strokeStyle = gridColor; // ������������� ���� �����
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

    // ������ ����� ��� �������� ��������
    drawGrid();

    var isDrawing = false;
    var lines = []; // ������ ��� �������� �����
    var texts = []; 
    var arrows = []; // ������ ��� �������� �������

    // ���������� ��� ������������ ��������� ������ "T"
    var textEnabled = false;
    var arrowEnabled = false; // ����, �����������, ������� �� ����� ��������� �������

    var startLinePoint = { x: 0, y: 0 };
    var endLinePoint = { x: 0, y: 0 };

    // ���������� ��� ������������ ���������� �����������
    var selectedTool = ''; // �� ��������� ��� ���������� �����������

    
    // ���������� ������� ��� ������ "�"
    document.getElementById('arrowButton').addEventListener('click', function () {
        selectedTool = 'arrow'; // ������������� ��������� ���������� �� "�������"
    });

    // ���������� ������� ��� ������ "T"
    document.getElementById('textButton').addEventListener('click', function () {
        selectedTool = 'text'; // ������������� ��������� ���������� �� "�����"
    });


    // ����������� ������� ��� ��������� �����
    canvas.addEventListener('mousedown', function (e) {
        if (!textEnabled) {
            isDrawing = true;
            var startPoint = { x: Math.round((e.clientX - canvas.getBoundingClientRect().left) / gridSize) * gridSize, y: Math.round((e.clientY - canvas.getBoundingClientRect().top) / gridSize) * gridSize };
            if (e.ctrlKey) { // ���� ������ ������� Ctrl
                lines.push({ start: startPoint, end: startPoint, isCircle: true }); // ��������� ����� �������� � ������
            } else {
                lines.push({ start: startPoint, end: startPoint }); // ��������� ����� ����� � ������
            }
        }
    });

    canvas.addEventListener('mousemove', function (e) {
        if (isDrawing && !textEnabled) {
            var currentPoint = { x: Math.round((e.clientX - canvas.getBoundingClientRect().left) / gridSize) * gridSize, y: Math.round((e.clientY - canvas.getBoundingClientRect().top) / gridSize) * gridSize };
            lines[lines.length - 1].end = currentPoint; // ��������� �������� ����� ��������� �����
            redraw();
        }
    });

    canvas.addEventListener('mouseup', function () {
        isDrawing = false;
    });

    // ���������� ������� ����� �� canvas-panel
canvas.addEventListener('click', function (e) {
    if (textEnabled) {
        var textInput = document.createElement('input');
        textInput.type = 'text';
        textInput.style.position = 'absolute';
        // ���������� ������������� ���������� ����� ������������ canvas-panel
        textInput.style.left = (e.offsetX) + 'px';
        textInput.style.top = (e.offsetY) + 'px';
        textInput.addEventListener('keyup', function (event) {
            if (event.key === 'Enter') {
                var text = textInput.value;
                // ��������� ����� � �������
                texts.push({ text: text, x: parseInt(textInput.style.left), y: parseInt(textInput.style.top) });
                redraw(); // �������������� �����
                document.querySelector('.canvas-panel').removeChild(textInput);
            }
        });
        document.querySelector('.canvas-panel').appendChild(textInput);
        textInput.focus();
    }
});

    function redraw() {
        ctx.clearRect(0, 0, canvas.width, canvas.height); // ������� �����
    drawGrid(); // ������ �����
    lines.forEach(function (line) {
        if (line.isCircle) {
            drawCircle(line.start.x, line.start.y, line.end.x, line.end.y); // ������ ��������, ���� ��� ��������
        } else {
            drawLine(line.start.x, line.start.y, line.end.x, line.end.y); // ������ ��� ����� �� �������
        }
    });
    // ������������� ����� �� �������
    texts.forEach(function (textObj) {
        ctx.font = "16px Arial";
        ctx.fillText(textObj.text, textObj.x, textObj.y);
    });

    // ������ ������� ������ ��� ���������� ������ ��������� �������
    if (arrowEnabled) {
        arrows.forEach(function (arrow) {
            drawArrow(arrow.start.x, arrow.start.y, arrow.end.x, arrow.end.y); // ������ �������
        });
    }
}

    function drawLine(x1, y1, x2, y2) {
        ctx.beginPath();
        ctx.moveTo(x1, y1);
        ctx.lineTo(x2, y2);
        ctx.strokeStyle = 'black'; // ������������� ������ ���� ��� �����
        ctx.stroke();
        ctx.closePath();
    }

    function drawCircle(x1, y1, x2, y2) {
        var gridSize = 20; // ������ ������ �����
        var radius = Math.sqrt(Math.pow(x2 - x1, 2) + Math.pow(y2 - y1, 2)); // ��������� ������ ���������

        // ������� ��������� ����������, ������� ������� ������
        var startX = Math.round(x1 / gridSize) * gridSize;
        var startY = Math.round(y1 / gridSize) * gridSize;
        var endX = Math.round(x2 / gridSize) * gridSize;
        var endY = Math.round(y2 / gridSize) * gridSize;

        ctx.beginPath();

        // ���������� ����������� �������� ���� � ������ �������� ��������������
        if (x2 > x1 && Math.abs(y2 - y1) < radius) {
            ctx.arc(startX, startY, radius, 0, Math.PI, false); // ������ �������� ������ �� ��������� �����
        } else if (x2 < x1 && Math.abs(y2 - y1) < radius) {
            ctx.arc(startX, startY, radius, Math.PI, 0, false); // ������ �������� ����� �� ��������� �����
        } else if (y2 < y1 && Math.abs(x2 - x1) < radius) {
            ctx.arc(startX, startY, radius, Math.PI / 2, -Math.PI / 2, false); // ������ �������� ������ �� ��������� �����
        } else if (y2 > y1 && Math.abs(x2 - x1) < radius) {
            ctx.arc(startX, startY, radius, -Math.PI / 2, Math.PI / 2, false); // ������ �������� ����� �� ��������� �����
        }

        ctx.strokeStyle = 'black'; // ������������� ������ ���� ��� �����
        ctx.stroke();
        ctx.closePath();
    }

    // ��������� ���������� ������� ����� �� ������ "T"
    textButton.addEventListener('click', function () {
        // ��������� ������� ��������� ������ ��������� ������
        if (textEnabled) {
            // ���� ����� ��������� ������ ��� �������, ��������� ���
            textButton.style.backgroundColor = ''; // ���������� ��� ������ � ���������� ���������
            textEnabled = false; // ������������� ���������� textEnabled � false
        } else {
            // ���� ����� ��������� ������ ��� ��������, �������� ���
            textButton.style.backgroundColor = '#ccc'; // ������ ��� ������ �� �����
            textEnabled = true; // ������������� ���������� textEnabled � true
        }
    });

    // ��������� ���������� ������� ����� �� ������ "�"
    arrowButton.addEventListener('click', function () {
    // ��������� ������� ��������� ������ ��������� �������
    if (arrowEnabled) {
        // ���� ����� ��������� ������� ��� �������, ��������� ���
        arrowButton.style.backgroundColor = ''; // ���������� ��� ������ � ���������� ���������
        arrowEnabled = false; // ������������� ���������� arrowEnabled � false
    } else {
        // ���� ����� ��������� ������� ��� ��������, �������� ���
        arrowButton.style.backgroundColor = '#ccc'; // ������ ��� ������ �� �����
        arrowEnabled = true; // ������������� ���������� arrowEnabled � true
        textEnabled = false; // ������� ��������� ������ ��������� ������, ���� �� ��� �����������
    }
});


 // ������� ��� ��������� �������
function drawArrow(x1, y1, x2, y2) {
    // ��������� ���� ����� ��������� � �������� ������� �������
    var angle = Math.atan2(y2 - y1, x2 - x1);

    // ����� �������
    var arrowLength = 10;

    // ��������� �������� ���������� ��� ����� �������
    var endX = x2 - arrowLength * Math.cos(angle);
    var endY = y2 - arrowLength * Math.sin(angle);

    // ������ ����� �������
    ctx.beginPath();
    ctx.moveTo(x1, y1);
    ctx.lineTo(endX, endY);
    ctx.stroke();

    // ������ "�������" �������
    ctx.beginPath();
    ctx.moveTo(endX, endY);
    ctx.lineTo(endX - arrowLength * Math.cos(angle - Math.PI / 6), endY - arrowLength * Math.sin(angle - Math.PI / 6));
    ctx.stroke();

    ctx.beginPath();
    ctx.moveTo(endX, endY);
    ctx.lineTo(endX - arrowLength * Math.cos(angle + Math.PI / 6), endY - arrowLength * Math.sin(angle + Math.PI / 6));
    ctx.stroke();
}

// ������� ��� ��������� ����� � �������� ������� � �����
function drawLineWithArrow(x1, y1, x2, y2) {
    // ������ ���� �����
    ctx.beginPath();
    ctx.moveTo(x1, y1);
    ctx.lineTo(x2, y2);
    ctx.stroke();

    // ��������� ���� ����� ��������� � �������� ������� �����
    var angle = Math.atan2(y2 - y1, x2 - x1);

    // ������ "�������" ������� � ����� �����
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

// ���������� ������� ��� ��������� �����
canvas.addEventListener('mousedown', function (e) {
    // ���������� ��������� ���������� �����
    startLinePoint.x = e.clientX - canvas.getBoundingClientRect().left;
    startLinePoint.y = e.clientY - canvas.getBoundingClientRect().top;
});

canvas.addEventListener('mouseup', function (e) {
    isDrawing = false; // ��������� ��� ������, ����� ��������� ��������� �����
    // ���������� �������� ���������� �����
    endLinePoint.x = e.clientX - canvas.getBoundingClientRect().left;
    endLinePoint.y = e.clientY - canvas.getBoundingClientRect().top;

    // ��������� ����� ������� � ������ ������ ��� ���������� ������ ��������� �������
    if (arrowEnabled) {
        arrows.push({ start: startLinePoint, end: endLinePoint }); // ��������� ����� ������� � ������
        redraw(); // �������������� �����
    }
});





});



</script>

</body>
</html>