<?php
if(isset($_POST['id']) && isset($_POST['column']) && isset($_POST['value'])) {
    $id = $_POST['id'];
    $column = $_POST['column'];
    $value = $_POST['value'];
    
    // Подключение к базе данных и выполнение SQL-запроса
    include '../database/conn_mysql.php';

    // Проверка наличия соединения
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    // Обновление значения ячейки в базе данных
    $update_sql = "UPDATE kompContent SET column$column = '$value' WHERE kompListId = $id";

    if ($conn->query($update_sql) === TRUE) {
        echo "Значение обновлено успешно";
    } else {
        echo "Ошибка при обновлении значения: " . $conn->error;
    }

    // Закрытие соединения
    mysqli_close($conn);
}
?>
