<?php
// Подключение к базе данных
$host = 'C:\OSPanel\domains\profstroy\BASE4_IVAPER+_23_08_2023 .FDB';
$username = 'SYSDBA';
$password = 'masterkey';

try {
    $dbh = new PDO("firebird:dbname=$host;charset=WIN1251", $username, $password);
    
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    header('Content-Type: text/html; charset=WIN1251');

    // Запрос к базе данных для получения данных таблицы
    $sql = 'SELECT a.ANUMB, a.ANAME, v.CLPRC, v.CLPR1, v.CLPR2, cl.CNAME, v.CLNUM
            FROM Artikls a
            JOIN ArtsVst v ON a.ANUMB = v.ANUMB
            JOIN ColsLst cl ON v.CLNUM = cl.CNUMB';

    $sth = $dbh->query($sql);

    // Формирование HTML-кода таблицы
    $tableHTML = "<table>";
    $tableHTML .= "<thead>
            <tr>
                <th><a href='#' id='sort-anumb'>Артикул</a></th>
                <th><a href='#' id='sort-name'>Название</th>
                <th><a href='#' id='sort-color'>Цвет</th>
                <th><a href='#' id='sort-price'>Цена основная</th>
                <th><a href='#' id='sort-iternal-price'>Цена внутряняя</th>
                <th><a href='#' id='sort-external-price'>Цена внешняя</th>
            </tr>
        </thead>";
    $tableHTML .= "<tbody>";
    
    while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
        $tableHTML .= "<tr>";
        $tableHTML .= "<td>".$row['ANUMB']."</td>";
        $tableHTML .= "<td>".$row['ANAME']."</td>";
        $tableHTML .= "<td>".$row['CNAME']."</td>";
        $tableHTML .= "<td contenteditable='true' class='editable-cell' data-anumb='" . $row['ANUMB'] . "' data-clnum='" . $row['CLNUM'] . "'>" . ($row['CLPRC'] != '0.000000' ? number_format($row['CLPRC'], 2, '.', '') : '0') . "</td>";
        $tableHTML .= "<td contenteditable='true' class='editable-cell-clpr1' data-anumb='" . $row['ANUMB'] . "' data-clnum='" . $row['CLNUM'] . "'>" .($row['CLPR1'] != '0.000000' ? number_format($row['CLPR1'], 2, '.', '') : '0')."</td>";
        $tableHTML .= "<td contenteditable='true' class='editable-cell-clpr2' data-anumb='" . $row['ANUMB'] . "' data-clnum='" . $row['CLNUM'] . "'>".($row['CLPR2'] != '0.000000' ? number_format($row['CLPR2'], 2, '.', '') : '0')."</td>";
        $tableHTML .= "</tr>";
    }

    $tableHTML .= "</tbody>";
    $tableHTML .= "</table>";

    // Возвращаем HTML-код таблицы
    echo $tableHTML;

} catch (PDOException $e) {
    // Обработка ошибок
    echo "Ошибка соединения: " . $e->getMessage();
}
?>