<?php
// Подключение к базе данных
include '../database/conn_mysql.php';

$data = json_decode(file_get_contents('php://input'), true);
$projectIds = $data['projectIds'];


foreach ($projectIds as $projectId) {
    $sql = "DELETE FROM projectListCad WHERE projectListCadId = $projectId";
    echo $sql;
    $conn->query($sql);
}


// Возвращаем успешный статус
http_response_code(200);
?>
