<?php
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

@include '../database/conn_mysql.php';

$conn->set_charset("utf8");

$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Получаем данные из результата запроса
    $row = $result->fetch_assoc();
    // Извлекаем значение столбца pathBD и сохраняем его в глобальной переменной $pathDB
    $pathDB = $row['pathBD'];
} else {
    echo "0 results";
}

$pathDB_escaped = mysqli_real_escape_string($conn, $pathDB);

if(isset($_GET['kompListId'])) { 

    header('Content-Type: text/html; charset=WIN1251'); 

    $kompListId = $_GET['kompListId'];

    // Получаем значение punic из GET-параметра
    $punic = isset($_GET['punic']) ? $_GET['punic'] : '';

    $sql = "SELECT * FROM kompContent WHERE kompListId = $kompListId";

    $result = $conn->query($sql);

    echo "<table style='width: 60%;' class='second-table'>";
    echo "<thead>
            <tr>
                <th><a href='#'>№</a></th>
                <th><a href='#'>Артикул</th>
                <th><a href='#'>Название</th>
                <th><a href='#'>Цвет</th>
            </tr>
        </thead>";
    echo "<tbody>";

    $NUM = 0;

    while ($row = $result->fetch_assoc()){
        $NUM = $NUM + 1;
        echo "<tr data-punic='".$punic."' data-anumb='".$row['anumb']."' data-clnum='".$row['clnum']."' data-formula='".$row['formula']."'>";
        echo "<td>".$NUM."</td>";
        echo "<td>".$row['anumb']."</td>";
        echo "<td>Название</td>";
        echo "<td>".$row['clnum']."</td>";
        echo "</tr>";
    }
    

    echo "</table>";
}
?>

<script src="../js/jquery.js"></script>
<script>

</script>

