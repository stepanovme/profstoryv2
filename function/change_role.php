<?php 
// Подключение к базе данных
include '../database/conn_mysql.php';

// Проверяем, был ли отправлен POST-запрос
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Получаем и проверяем данные из POST-запроса
    $userId = $_POST['userId'];
    $newRoleId = $_POST['newRoleId'];

    // Подготавливаем SQL-запрос для обновления роли пользователя
    $sql = "UPDATE user SET roleId = ? WHERE userId = ?";
    
    // Подготавливаем запрос
    $stmt = $conn->prepare($sql);

    // Привязываем параметры
    $stmt->bind_param("ii", $newRoleId, $userId);

    // Выполняем запрос
    if ($stmt->execute()) {
        // Роль пользователя успешно обновлена
        echo "success";
    } else {
        // Возникла ошибка при обновлении роли пользователя
        echo "error";
    }

    // Закрываем подготовленное выражение
    $stmt->close();
}

// Закрываем соединение с базой данных
$conn->close();
?>