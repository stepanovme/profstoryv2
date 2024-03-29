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
// ���������� ��� �������� ������� ���������
var drawingHistory = [];
var isDrawing = false;
var lastX = 0;
var lastY = 0;

// �������� ������ �� �����
var canvas = document.getElementById("drawingCanvas");
var ctx = canvas.getContext("2d");

// ������ ��������� �����
var gridSpacing = 20; // ���������� ����� ������� �����
var gridColor = "#ccc"; // ���� ����� �����

// ������� ��� ��������� ������� �����
function drawGrid() {
    ctx.beginPath();
    ctx.strokeStyle = gridColor;

    // ������ ������������ ����� �����
    for (var x = 0; x < canvas.width; x += gridSpacing) {
        ctx.moveTo(x, 0);
        ctx.lineTo(x, canvas.height);
    }

    // ������ �������������� ����� �����
    for (var y = 0; y < canvas.height; y += gridSpacing) {
        ctx.moveTo(0, y);
        ctx.lineTo(canvas.width, y);
    }

    ctx.stroke();
}

// ���������� ��� �������� ���������� ��������� ����
var prevX = 0;
var prevY = 0;

// ������� ��� ��������� �����
function drawLine(e) {
    if (!isDrawing) return;

    // ���������� ���������� ����� � ������������ � ������
    var mouseX = Math.round(e.offsetX / gridSpacing) * gridSpacing;
    var mouseY = Math.round(e.offsetY / gridSpacing) * gridSpacing;

    ctx.beginPath();
    ctx.moveTo(lastX, lastY);

    // ���������, ���� �� ������ ������� Ctrl
    if (e.ctrlKey) {
        // ���������� ������ ��������������
        var radius = gridSpacing / 2;

        // ���������� ���������� ������ �������������� � �������� ������
        var centerX = mouseX;
        var centerY = mouseY - gridSpacing / 2;

        // ���������� ��������� � �������� ���� �������������� � ����������� �� �������� ����
        var startAngle, endAngle;
        if (mouseY > prevY) {
            startAngle = Math.PI * 1.5; // 270 �������� (����)
            endAngle = Math.PI * 0.5; // 90 �������� (�����)
        } else {
            startAngle = Math.PI * 1.5; // 90 �������� (�����)
            endAngle = Math.PI * 0.5; // 270 �������� (����)
        }

        // ������ ��������������
        ctx.arc(centerX, centerY, radius, startAngle, endAngle);
    } else {
        // ������ ������� �����, ���� �� ������ ������� Ctrl
        ctx.lineTo(mouseX, mouseY);
    }

    ctx.lineWidth = 2;
    ctx.strokeStyle = "#000"; // ������������� ���� ����� � ������
    ctx.stroke();

    [lastX, lastY] = [mouseX, mouseY];

    // ���������� ���������� ���������� ����
    prevX = mouseX;
    prevY = mouseY;
}



// ������� ��� ������ ���������
function startDrawing(e) {
    isDrawing = true;
    [lastX, lastY] = [Math.round(e.offsetX / gridSpacing) * gridSpacing, Math.round(e.offsetY / gridSpacing) * gridSpacing];
}

// ������� ��� ���������� ���������
function endDrawing() {
    isDrawing = false;
    saveDrawing(); // ��������� ������� ��������� ������� ����� ���������� ���������
}

// ������� ��� ���������� �������� ��������� �������
function saveDrawing() {
    var imageData = ctx.getImageData(0, 0, canvas.width, canvas.height);
    drawingHistory.push(imageData);
}

// ������� ��� ������ ���������� ��������
function undoLastAction(e) {
    if (e.ctrlKey && e.key === 'z' || (e.ctrlKey && e.code === 'KeyZ')) {
        e.preventDefault(); // ������������� ����������� �������� �������� (��������, ������)

        if (drawingHistory.length > 0) {
            drawingHistory.pop(); // ������� ��������� �������� �� �������
            redrawCanvas(); // �������������� ����� ��� ���������� ��������
        }
    }
}

// ������� ��� ����������� ������ ��� ���������� ��������
// ������� ��� ����������� ������ ��� ���������� ��������
function redrawCanvas() {
    clearCanvas(); // ������� �����
    drawGrid(); // ������ ������� �����
    if (drawingHistory.length > 0) {
        ctx.putImageData(drawingHistory[drawingHistory.length - 1], 0, 0); // ���������� ��������� ����������� ���������
    }
}


// ������� ����� ����� ����������
function clearCanvas() {
    ctx.clearRect(0, 0, canvas.width, canvas.height);
}

// ������ ����� ��� �������� ��������
drawGrid();

// ��������� ����������� ������� ��� ��������� � ������ ��������
canvas.addEventListener("mousedown", startDrawing);
canvas.addEventListener("mousemove", drawLine);
canvas.addEventListener("mouseup", endDrawing);
canvas.addEventListener("mouseout", endDrawing);
window.addEventListener("keydown", undoLastAction); 
    </script>
</body>
</html>