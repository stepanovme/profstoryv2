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
    <title>Авторизация</title>
</head>
<body>
    <div class="page">
        <div class="image"></div>
        <div class="auth">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                <?php
                    if ($_SERVER["REQUEST_METHOD"] == "POST") {
                        // Получение введенных пользователем данных
                        $login = $_POST['login'];
                        $password = $_POST['password'];
                    
                        // Поиск пользователя в базе данных
                        $sql = "SELECT * FROM user WHERE login='$login' AND password='$password'";
                        $result = $conn->query($sql);
                    
                        if ($result->num_rows == 1) {
                            // Авторизация успешна, устанавливаем сессию и перенаправляем на страницу с именем и фамилией
                            $row = $result->fetch_assoc();
                            $_SESSION['userId'] = $row['userId'];
                            $_SESSION['name'] = $row['name'];
                            $_SESSION['surname'] = $row['surname'];
                            $_SESSION['roleId'] = $row['roleId'];
                            header("Location: index.php");
                            exit;
                        } else {
                            echo "<button class='auth-error'>Неверный логин или пароль</button>";
                        }
                    }
                ?>
                <h1>Авторизация</h1>
                <p>Логин</p>
                <input type="text" name="login" id="login" placeholder="E-mail">
                <p>Пароль</p>
                <input type="password" name="password" id="password" placeholder="***********">
                <p class="under-text">Ещё нет аккаунта? <a href="register.php">Зарегистрироваться</a></p>
                <button type="submit">Войти</button>
            </form>
        </div>
    </div>
</body>
</html>