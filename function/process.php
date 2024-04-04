<?php 
include '../database/conn_mysql.php';
mysqli_set_charset($conn, "utf8"); // Устанавливаем кодировку UTF-8 для работы с базой данных
header('Content-Type: text/html; charset=utf-8'); // Устанавливаем заголовок для вывода данных в UTF-8


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Проверяем, существуют ли необходимые данные в запросе
    if (isset($_POST['projectName']) && isset($_POST['responsibleUserId'])) {
        // Получаем данные из формы
        $projectName = $_POST['projectName'];
        $responsibleUserId = $_POST['responsibleUserId'];

        // Подготовка запроса INSERT
        $sql = "INSERT INTO projectListCad (projectListCadName, projectListCadResponsible, StatusCadId) VALUES (?, ?, 1)";
        
        // Подготовка и выполнение запроса с использованием подготовленного выражения
        $stmt = $conn->prepare($sql);
        $stmt->bind_param("si", $projectName, $responsibleUserId); // "si" - формат строки параметров: s - строка, i - целое число
        $stmt->execute();

        // Проверяем успешность выполнения запроса
        if ($stmt->affected_rows > 0) {
            echo "Проект успешно добавлен!";
        } else {
            echo "Ошибка при добавлении проекта: " . $conn->error;
        }

        // Закрываем подготовленное выражение и соединение с базой данных
        $stmt->close();
        $conn->close();
    } else {
        echo "Не удалось получить необходимые данные из формы.";
    }
} else {
    echo "Error: форма не была отправлена.";
}

?>