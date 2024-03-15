<?php
// Получаем данные из POST-запроса
$punic = $_POST['punic'];
$anumb = $_POST['anumb'];
$clnum = $_POST['clnum'];
$formula = $_POST['formula'];

// Дальнейшие действия с данными (например, добавление в базу данных или другие операции)

// Возвращаем ответ (если необходимо)
echo 'Данные успешно получены: PUNIC = ' . $punic . ', ANUMB = ' . $anumb . ', CLNUM = ' . $clnum . ', FORMULA = ' . $formula;
?>
