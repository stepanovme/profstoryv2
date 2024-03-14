<?php
header('Content-Type: text/html; charset=WIN1251'); 
if(isset($_GET['kompListId']) && !empty($_GET['kompListId'])) {
    $kompListId = $_GET['kompListId'];
    
    // Подключение к базе данных и выполнение SQL-запроса
    include '../database/conn_mysql.php';

    // Проверка наличия соединения
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $kompListId_escaped = mysqli_real_escape_string($conn, $kompListId);

    // SQL-запрос для вставки новой строки с указанным значением kompListId
    $sql = "INSERT INTO kompContent (kompListId) VALUES ('$kompListId_escaped')";

    if (mysqli_query($conn, $sql)) {
        $sql = "SELECT * FROM kompContent WHERE kompListId = '$kompListId_escaped'";
        $result = $conn->query($sql);
        // Генерация HTML для второй таблицы
    $output = "
    <div class='wrapper-head'>
        <p class='title'>Содержимое комплекта</p>
        <div class='buttons'>
            <button class='addButton' data-kompListId=". htmlspecialchars($kompListId).">Добавить</button>
            <button class='deleteButton'>Удалить</button>
        </div>
    </div>
    <table>
        <thead>
            <tr>
                <th><a href='#'>Артикул</a></th>
                <th><a href='#'>Название</th>
                <th><a href='#'>Цвет</th>
                <th><a href='#'>Формула</th>
            </tr>
        </thead>
        <tbody>";

        while ($row = $result->fetch_assoc()){
        $output .= "<tr>";
        $output .= "<td>".$row['anumb']."</td>";
        $output .= "<td>Название</td>"; // Замените это значение на соответствующее поле вашей таблицы
        $output .= "<td>".$row['clnum']."</td>";
        $output .= "<td>".$row['formula']."</td>";
        $output .= "</tr>";
        }

        $output .= "</tbody></table>";

        echo $output;
    } else {
        echo "Ошибка при добавлении строки: " . mysqli_error($conn);
    }

    // Закрытие соединения
    mysqli_close($conn);
} else {
    echo "Недопустимое значение kompListId";
}
?>

