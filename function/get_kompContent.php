<?php
if(isset($_GET['kompListId'])) {
    $kompListId = $_GET['kompListId'];
    
    // Подключение к базе данных и выполнение SQL-запроса
    include '../database/conn_mysql.php';

    // Проверка наличия соединения
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $kompListId_escaped = mysqli_real_escape_string($conn, $kompListId);

    $sql = "SELECT * FROM kompContent WHERE kompListId = '$kompListId_escaped'";

    $result = $conn->query($sql);

    // Генерация HTML для второй таблицы
    $output = "
            <div class='wrapper-head'>
                <p class='title'>Содержимое комплекта</p>
                <div class='buttons'>
                    <button class='addButton'>Добавить</button>
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

    // Закрытие соединения
    mysqli_close($conn);
}
?>
