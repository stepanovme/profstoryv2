$(document).ready(function(){
    $('#ticketNum').on('change keypress', function(event){
        // Проверяем, была ли нажата клавиша Enter
        if (event.type === 'change' || event.keyCode === 13) {
            var ticketId = $(this).data('id');
            var newValue = $(this).val();
            
            // Отправляем данные на сервер
            $.ajax({
                url: 'function/update_data_ticket.php', // Замените на путь к вашему PHP скрипту обновления данных
                method: 'POST',
                data: {id: ticketId, value: newValue},
                success: function(response){
                    console.log(response); // Для дебага, выводим ответ от сервера в консоль
                }
            });

            // Прекращаем редактирование поля ввода
            $(this).blur(); // Этот метод убирает фокус с поля ввода, прекращая его редактирование
        }
    });
});

$(document).ready(function(){
    $('#TicketListCadObject').on('change keypress', function(event){
        // Проверяем, была ли нажата клавиша Enter
        if (event.type === 'change' || event.keyCode === 13) {
            var ticketId = $(this).data('id');
            var newValue = $(this).val();
            
            // Отправляем данные на сервер
            $.ajax({
                url: 'function/update_data_ticket_object.php', // Замените на путь к вашему PHP скрипту обновления данных
                method: 'POST',
                data: {id: ticketId, value: newValue},
                success: function(response){
                    console.log(response); // Для дебага, выводим ответ от сервера в консоль
                }
            });

            // Прекращаем редактирование поля ввода
            $(this).blur(); // Этот метод убирает фокус с поля ввода, прекращая его редактирование
        }
    });
});

$(document).ready(function(){
    $('#TicketListCadColor').on('change keypress', function(event){
        // Проверяем, была ли нажата клавиша Enter
        if (event.type === 'change' || event.keyCode === 13) {
            var ticketId = $(this).data('id');
            var newValue = $(this).val();
            
            // Отправляем данные на сервер
            $.ajax({
                url: 'function/update_data_ticket_color.php', // Замените на путь к вашему PHP скрипту обновления данных
                method: 'POST',
                data: {id: ticketId, value: newValue},
                success: function(response){
                    console.log(response); // Для дебага, выводим ответ от сервера в консоль
                }
            });

            // Прекращаем редактирование поля ввода
            $(this).blur(); // Этот метод убирает фокус с поля ввода, прекращая его редактирование
        }
    });
});

$(document).ready(function(){
    $('#TicketListCadDatePlan').on('change keypress', function(event){
        // Проверяем, была ли нажата клавиша Enter
        if (event.type === 'change' || event.keyCode === 13) {
            var ticketId = $(this).data('id');
            var newValue = $(this).val();
            
            // Отправляем данные на сервер
            $.ajax({
                url: 'function/update_data_ticket_dateplan.php', // Замените на путь к вашему PHP скрипту обновления данных
                method: 'POST',
                data: {id: ticketId, value: newValue},
                success: function(response){
                    console.log(response); // Для дебага, выводим ответ от сервера в консоль
                }
            });

            // Прекращаем редактирование поля ввода
            $(this).blur(); // Этот метод убирает фокус с поля ввода, прекращая его редактирование
        }
    });
});

$(document).ready(function(){
    $('#TicketListCadThickness').on('change keypress', function(event){
        // Проверяем, была ли нажата клавиша Enter
        if (event.type === 'change' || event.keyCode === 13) {
            var ticketId = $(this).data('id');
            var newValue = $(this).val();
            
            // Отправляем данные на сервер
            $.ajax({
                url: 'function/update_data_ticket_thickness.php', // Замените на путь к вашему PHP скрипту обновления данных
                method: 'POST',
                data: {id: ticketId, value: newValue},
                success: function(response){
                    console.log(response); // Для дебага, выводим ответ от сервера в консоль
                }
            });

            // Прекращаем редактирование поля ввода
            $(this).blur(); // Этот метод убирает фокус с поля ввода, прекращая его редактирование
        }
    });
});

$(document).ready(function(){
    $('#TicketListCadPlace').on('change keypress', function(event){
        // Проверяем, была ли нажата клавиша Enter
        if (event.type === 'change' || event.keyCode === 13) {
            var ticketId = $(this).data('id');
            var newValue = $(this).val();
            
            // Отправляем данные на сервер
            $.ajax({
                url: 'function/update_data_ticket_place.php', // Замените на путь к вашему PHP скрипту обновления данных
                method: 'POST',
                data: {id: ticketId, value: newValue},
                success: function(response){
                    console.log(response); // Для дебага, выводим ответ от сервера в консоль
                }
            });

            // Прекращаем редактирование поля ввода
            $(this).blur(); // Этот метод убирает фокус с поля ввода, прекращая его редактирование
        }
    });
});

$(document).ready(function(){
    $('#TicketListCadBrigade').on('change keypress', function(event){
        // Проверяем, была ли нажата клавиша Enter
        if (event.type === 'change' || event.keyCode === 13) {
            var ticketId = $(this).data('id');
            var newValue = $(this).val();
            
            // Отправляем данные на сервер
            $.ajax({
                url: 'function/update_data_ticket_brigade.php', // Замените на путь к вашему PHP скрипту обновления данных
                method: 'POST',
                data: {id: ticketId, value: newValue},
                success: function(response){
                    console.log(response); // Для дебага, выводим ответ от сервера в консоль
                }
            });

            // Прекращаем редактирование поля ввода
            $(this).blur(); // Этот метод убирает фокус с поля ввода, прекращая его редактирование
        }
    });
});

$(document).ready(function(){
    $('#TicketListCadAddress').on('change keypress', function(event){
        // Проверяем, была ли нажата клавиша Enter
        if (event.type === 'change' || event.keyCode === 13) {
            var ticketId = $(this).data('id');
            var newValue = $(this).val();
            
            // Отправляем данные на сервер
            $.ajax({
                url: 'function/update_data_ticket_address.php', // Замените на путь к вашему PHP скрипту обновления данных
                method: 'POST',
                data: {id: ticketId, value: newValue},
                success: function(response){
                    console.log(response); // Для дебага, выводим ответ от сервера в консоль
                }
            });

            // Прекращаем редактирование поля ввода
            $(this).blur(); // Этот метод убирает фокус с поля ввода, прекращая его редактирование
        }
    });
});

$(document).ready(function(){
    // Создаем объект, хранящий информацию о порядке следующего поля
    var nextField = {
        "#ticketNum": "#TicketListCadObject",
        "#TicketListCadObject": "#TicketListCadColor",
        "#TicketListCadColor": "#TicketListCadThickness",
        "#TicketListCadThickness": "#TicketListCadPlace",
        "#TicketListCadPlace": "#TicketListCadBrigade",
        "#TicketListCadBrigade": "#TicketListCadAddress",
        "#TicketListCadAddress": "#TicketListCadDatePlan",
        "#TicketListCadDatePlan": "#TicketListCadObject" // Зацикливаем последний элемент на первый
    };

    // Обработка события нажатия клавиши Enter на input
    $('.wrapper input').on('keypress', function(event){
        // Проверяем, была ли нажата клавиша Enter
        if (event.keyCode === 13) {
            // Находим ID текущего input
            var currentFieldId = "#" + $(this).attr("id");
            
            // Находим ID следующего input в соответствии с порядком
            var nextFieldId = nextField[currentFieldId];
            
            // Переходим к следующему input для редактирования
            $(nextFieldId).focus();

            // Перемещаем курсор в конец значения в поле ввода
            var input = document.querySelector(nextFieldId);
            input.selectionStart = input.selectionEnd = input.value.length;
        }
    });
});

document.querySelector('.delete-izd').addEventListener('click', function() {
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
            xhr.open('POST', 'function/delete_izd.php');
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.send(JSON.stringify({ ticketIds: ticketIds }));
    }
});
