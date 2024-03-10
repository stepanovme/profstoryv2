<?php include 'function/materialFunction.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="windows-1251">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div class="materialFunctionTable">

    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            function updateTable() {
                $.ajax({
                    url: 'function/materialFunction.php?random=' + new Date().getTime(), // Путь к скрипту на сервере, который обновляет таблицу
                    type: 'GET',
                    success: function(data) {
                        // Заменяем содержимое блока с классом materialFunctionTable на новую таблицу
                        $('.materialFunctionTable').html(data);
                    },
                    error: function(xhr, status, error) {
                        // Обработка ошибок
                        console.error(error);
                    }
                });
            }

            // Вызов функции обновления таблицы через определенный интервал времени
            setInterval(updateTable, 5000); // Обновление каждые 5 секунд (5000 миллисекунд)
        });
    </script>
</body>
</html>