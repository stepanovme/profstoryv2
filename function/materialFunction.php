<?php
// ����������� � ���� ������
$host = 'C:\OSPanel\domains\profstroy\BASE4_IVAPER+_23_08_2023 .FDB';
$username = 'SYSDBA';
$password = 'masterkey';

try {
    $dbh = new PDO("firebird:dbname=$host;charset=WIN1251", $username, $password);
    
    $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    header('Content-Type: text/html; charset=WIN1251');

    // ������ � ���� ������ ��� ��������� ������ �������
    $sql = 'SELECT a.ANUMB, a.ANAME, v.CLPRC, v.CLPR1, v.CLPR2, cl.CNAME, v.CLNUM
            FROM Artikls a
            JOIN ArtsVst v ON a.ANUMB = v.ANUMB
            JOIN ColsLst cl ON v.CLNUM = cl.CNUMB';

    $sth = $dbh->query($sql);

    // ������������ HTML-���� �������
    $tableHTML = "<table>";
    $tableHTML .= "<thead>
            <tr>
                <th><a href='#' id='sort-anumb'>�������</a></th>
                <th><a href='#' id='sort-name'>��������</th>
                <th><a href='#' id='sort-color'>����</th>
                <th><a href='#' id='sort-price'>���� ��������</th>
                <th><a href='#' id='sort-iternal-price'>���� ���������</th>
                <th><a href='#' id='sort-external-price'>���� �������</th>
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

    // ���������� HTML-��� �������
    echo $tableHTML;

} catch (PDOException $e) {
    // ��������� ������
    echo "������ ����������: " . $e->getMessage();
}
?>