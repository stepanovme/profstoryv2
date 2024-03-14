// Обработка нажатия кнопки удаления
document.querySelector('.delete-kompl-content').addEventListener('click', function() {
    var selectedRows = document.querySelectorAll('.row-checkbox:checked');
    var ids = [];
    selectedRows.forEach(function(row) {
        ids.push(row.getAttribute('data-id'));
    });

    if (ids.length > 0) {
        // Отправляем запрос на удаление выбранных строк на сервер
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../function/delete_rows_content.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Обработка ответа сервера, если необходимо
                console.log(xhr.responseText);
            }
        };
        xhr.send('ids=' + JSON.stringify(ids));
    location.reload();

    } else {
        alert('Выберите строки для удаления.');
    }
});


