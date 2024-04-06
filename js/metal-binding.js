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
    $('.editable-ticket-name').on('change keypress', function(event){
        // Проверяем, была ли нажата клавиша Enter
        if (event.type === 'change' || event.keyCode === 13) {
            var ticketId = $(this).data('id');
            var newValue = $(this).val();
            
            // Отправляем данные на сервер
            $.ajax({
                url: 'function/update_data_izd_name.php', // Замените на путь к вашему PHP скрипту обновления данных
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
    var ticketData = [];

    checkedRows.forEach(function(row) {
        ticketIds.push(row.closest('tr').getAttribute('data-id'));
        ticketData.push(row.getAttribute('data-ticket'));
    });

    if (ticketIds.length > 0) {
        // Добавляем отладочный вывод
        console.log("Ticket IDs: ", ticketIds);
        console.log("Ticket Data: ", ticketData);

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

        // Передаем оба массива в виде объекта
        xhr.send(JSON.stringify({ ticketIds: ticketIds, ticketData: ticketData }));
    }
});





// Обработчик изминения данных в столбце length
document.addEventListener('DOMContentLoaded', function() {
    const editableCells = document.querySelectorAll('.editable-length');

    editableCells.forEach(cell => {
        cell.addEventListener('blur', function() {
            const newValue = this.textContent.trim();
            const anumb = this.getAttribute('data-id');
            const TicketListCadId = this.dataset.ticketlistcadid; // Получаем значение через dataset
            updateCellValue(anumb, newValue, TicketListCadId);
        });
        cell.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault(); // Предотвращаем действие по умолчанию (переход на новую строку)

                // Завершаем редактирование текущей ячейки
                this.blur();
            }
        });
    });

    async function updateCellValue(anumb, newValue, TicketListCadId) {
        // Если значение пустое, заменяем его на 0
        newValue = newValue.trim() === '' ? '0' : newValue.trim();
    
        try {
            const response = await fetch('function/update_izd_length.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `anumb=${encodeURIComponent(anumb)}&TicketListCadId=${encodeURIComponent(TicketListCadId)}&newValue=${encodeURIComponent(newValue)}`
            });
            
            if (response.ok) {
                const responseData = await response.text();
                console.log(responseData);
                // Перезагрузка страницы
                window.location.reload();
            } else {
                console.error('Ошибка HTTP: ' + response.status);
            }
        } catch (error) {
            console.error('Ошибка fetch:', error);
        }
    }
});

document.addEventListener('DOMContentLoaded', function() {
    const editableCells = document.querySelectorAll('.editable-quantity');

    editableCells.forEach(cell => {
        cell.addEventListener('blur', function() {
            const newValue = this.textContent.trim();
            const anumb = this.getAttribute('data-id');
            const TicketListCadId = this.dataset.ticketlistcadid; // Получаем значение через dataset
            updateCellValue(anumb, newValue, TicketListCadId);
        });
        cell.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault(); // Предотвращаем действие по умолчанию (переход на новую строку)

                // Завершаем редактирование текущей ячейки
                this.blur();
            }
        });
    });

    async function updateCellValue(anumb, newValue, TicketListCadId) {
        // Если значение пустое, заменяем его на 0
        newValue = newValue.trim() === '' ? '0' : newValue.trim();
    
        try {
            const response = await fetch('function/update_izd_quantity.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `anumb=${encodeURIComponent(anumb)}&TicketListCadId=${encodeURIComponent(TicketListCadId)}&newValue=${encodeURIComponent(newValue)}`
            });
            
            if (response.ok) {
                const responseData = await response.text();
                console.log(responseData);
                // Перезагрузка страницы
                window.location.reload();
            } else {
                console.error('Ошибка HTTP: ' + response.status);
            }
        } catch (error) {
            console.error('Ошибка fetch:', error);
        }
    }
});

// Обработчик изминения данных в столбце address
document.addEventListener('DOMContentLoaded', function() {
    const editableCells = document.querySelectorAll('.editable-address');

    editableCells.forEach(cell => {
        cell.addEventListener('blur', function() {
            const newValue = this.textContent.trim();
            const anumb = this.getAttribute('data-id');
            updateCellValue(anumb, newValue);
        });
        cell.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault(); // Предотвращаем действие по умолчанию (переход на новую строку)

                // Завершаем редактирование текущей ячейки
                this.blur();
            }
        });
    });

    function updateCellValue(anumb, newValue) {
        // Заменяем запятую на точку
        newValue = newValue.replace(',', '.');
    
        // Если значение пустое, заменяем его на 0
        newValue = newValue.trim() === '' ? '0' : newValue.trim();
    
        // Отправка AJAX запроса на сервер
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'function/update_izd_address.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // Обработка ответа от сервера, если необходимо
                console.log(xhr.responseText);
            }
        };
        xhr.send('anumb=' + encodeURIComponent(anumb) + '&newValue=' + encodeURIComponent(newValue));
    }
});


// Рисование
// Получаем все элементы canvas на странице
var canvases = document.getElementsByClassName('myCanvas');

// Проходимся по всем canvas и добавляем обработчик события для рисования линий
Array.from(canvases).forEach(function(canvas) {
    var ctx = canvas.getContext('2d');
    var isDrawingLine = false; // флаг для отслеживания рисования линии
    var lines = []; // массив для хранения всех нарисованных линий

    // Функция для рисования сетки
    function drawGrid(step) {
        ctx.beginPath();
        ctx.lineWidth = 1; // толщина линий сетки
        for (var x = 0; x < canvas.width; x += step) {
            ctx.moveTo(x, 0);
            ctx.lineTo(x, canvas.height);
        }
        for (var y = 0; y < canvas.height; y += step) {
            ctx.moveTo(0, y);
            ctx.lineTo(canvas.width, y);
        }
        ctx.strokeStyle = "#888"; // серый цвет сетки
        ctx.stroke();
        ctx.closePath();
    }

    // Функция для рисования всех линий и чисел
    function redrawLines() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        drawGrid(20); // рисуем сетку
        ctx.strokeStyle = "#000"; // черный цвет для всех линий
        ctx.lineWidth = 3; // толщина черных линий
        lines.forEach(function(line) {
            ctx.beginPath();
            // Коррекция координат для привязки к сетке
            var startX = Math.round(line.startX / 20) * 20;
            var startY = Math.round(line.startY / 20) * 20;
            var endX = Math.round(line.endX / 20) * 20;
            var endY = Math.round(line.endY / 20) * 20;
            ctx.moveTo(startX, startY);
            ctx.lineTo(endX, endY);
            ctx.stroke();
            ctx.closePath();

            // Вычисляем координаты для числа над линией
            var numberX = (startX + endX) / 2;
            var numberY = (startY + endY) / 2;
            drawNumber(numberX, numberY, line.value); // рисуем число
        });
    }

    // Функция для рисования числа
    function drawNumber(x, y, value) {
        ctx.fillStyle = '#000'; // черный цвет для текста
        ctx.font = '16px Arial'; // размер и шрифт текста
        ctx.textAlign = 'center'; // выравнивание текста по центру
        ctx.fillText(value, x, y - 10); // рисуем текст над линией
    }

    // Обработчик события клика по canvas
    canvas.addEventListener('mousedown', function(e) {
        if (!isDrawingLine) {
            isDrawingLine = true;
            var startX = e.offsetX;
            var startY = e.offsetY;
            lines.push({ startX: startX, startY: startY, endX: startX, endY: startY, value: 0 }); // добавляем начальные координаты линии, значение числа 0
        }
    });

    // Обработчик события перемещения мыши
    canvas.addEventListener('mousemove', function(e) {
        if (isDrawingLine) {
            var mouseX = Math.round(e.offsetX / 20) * 20;
            var mouseY = Math.round(e.offsetY / 20) * 20;
            lines[lines.length - 1].endX = mouseX;
            lines[lines.length - 1].endY = mouseY;
            redrawLines();
        }
    });

    // Обработчик события отпускания кнопки мыши
canvas.addEventListener('mouseup', function(e) {
    if (isDrawingLine) {
        isDrawingLine = false;
        var lastLine = lines[lines.length - 1];
        if (Math.abs(lastLine.startX - lastLine.endX) > 1 || Math.abs(lastLine.startY - lastLine.endY) > 1) {
            lastLine.value = 0; // устанавливаем значение линии в 0
            redrawLines(); // перерисовываем линии после добавления числа
        } else {
            lines.pop(); // удалить линию, если она слишком короткая (не нарисована)
        }
    }
});

    // Обработчик события клика по числу
canvas.addEventListener('click', function(e) {
    var mouseX = e.offsetX;
    var mouseY = e.offsetY;
    lines.forEach(function(line) {
        var numberX = (line.startX + line.endX) / 2;
        var numberY = (line.startY + line.endY) / 2;
        ctx.font = '16px Arial'; // установим такой же шрифт, как при рисовании числа
        var textWidth = ctx.measureText(line.value).width; // получим ширину текста числа
        var textHeight = 16; // высота текста числа
        var startX = numberX - textWidth / 2; // координаты верхнего левого угла области числа
        var startY = numberY - textHeight;
        var endX = numberX + textWidth / 2; // координаты нижнего правого угла области числа
        var endY = numberY;
        if (mouseX >= startX && mouseX <= endX && mouseY >= startY && mouseY <= endY) {
            var newValue = prompt("Введите новое число:", line.value);
            if (newValue !== null) {
                line.value = parseFloat(newValue);
                redrawLines();
            }
        }
    });
});

    // Инициализируем сетку при загрузке страницы
    drawGrid(20);
});