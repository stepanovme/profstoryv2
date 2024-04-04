document.querySelector('.delete-ticket').addEventListener('click', function() {
    var checkedRows = document.querySelectorAll('.row-checkbox:checked');
    var ticketIds = [];

    checkedRows.forEach(function(row) {
        ticketIds.push(row.closest('tr').getAttribute('data-id'));
    });

    if (ticketIds.length > 0) {
        var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // Обновляем страницу после успешного удаления заявок
                        window.location.reload();
                    } else {
                        alert('Произошла ошибка при удалении заявок');
                    }
                }
            };
            xhr.open('POST', 'function/delete_tickets.php');
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.send(JSON.stringify({ ticketIds: ticketIds }));
    }
});