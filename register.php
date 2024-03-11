<?php
header('Content-Type: text/html; charset=WIN1251');

include "./database/conn_mysql.php";

session_start();
?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@100..900&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="assets/favicon/favicon.png" type="image/x-icon">
    <link rel="stylesheet" href="css/auth.css">
    <title>Регистрация</title>
</head>
<body>
    <div class="page">
        <div class="image"></div>
        <div class="auth">
            <form method="POST">
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Получение данных из формы
                        $name = $_POST['name'];
                        $surname = $_POST['surname'];
                        $login = $_POST['login'];
                        $password = $_POST['password'];
                        $repeatPassword = $_POST['repeatPassword'];
                    
                        // Проверка на совпадение паролей
                        if ($password !== $repeatPassword) {
                            echo "<button class='auth-error'>Пароли не совпадают</button>";
                        } else {
                            // Проверка на существующий логин
                            $check_query = "SELECT * FROM user WHERE login='$login'";
                            $check_result = $conn->query($check_query);
                            if ($check_result->num_rows > 0) {
                                echo "<button class='auth-error'>Пользователь с таким логином уже зарегистрирован</button>";
                            } else {
                                // Вставка данных в таблицу
                                $insert_query = "INSERT INTO user (name, surname, login, password, roleId) VALUES ('$name', '$surname', '$login', '$password', 1)";
                                if ($conn->query($insert_query) === TRUE) {
                                    // Перенаправление на страницу авторизации
                                    header("Location: auth.php");
                                    exit();
                                } else {
                                    echo "<button class='auth-error'>Ошибка:" . $insert_query . "</button>";
                                    $conn->error;
                                }
                            }
                        }
                    }
                ?>
                <h1>Регистрация</h1>
                <p>Имя</p>
                <input type="text" name="name" id="name" placehodler="Анатолий">
                <p>Фамилия</p>
                <input type="text" name="surname" id="surname" placehodler="Ильев">
                <p>Логин</p>
                <input type="text" name="login" id="login" placehodler="E-mail">
                <p>Пароль</p>
                <input type="password" name="password" name="password" placehodler="***********">
                <p>Повторить пароль</p>
                <input type="password" name="repeatPassword" name="repeatPassword" placehodler="***********">
                <p class="under-text">Уже есть аккаунт? <a href="auth.php">Авторизироваться</a></p>
                <button type="submit">Зарегистрироваться</button>
            </form>
        </div>
    </div>
</body>
</html>