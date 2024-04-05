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
        xhr.open('POST', 'function/update_izd_length.php', true);
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
// Получаем ссылки на все элементы canvas
var canvases = document.getElementsByClassName('myCanvas');

// Функция для рисования сетки на каждом canvas
function drawGrid(ctx, canvas) {
    var gridSize = 20; // размер сетки
    for (var x = 0; x <= canvas.width; x += gridSize) {
        ctx.moveTo(x, 0);
        ctx.lineTo(x, canvas.height);
    }
    for (var y = 0; y <= canvas.height; y += gridSize) {
        ctx.moveTo(0, y);
        ctx.lineTo(canvas.width, y);
    }
    ctx.strokeStyle = "#ddd"; // цвет сетки
    ctx.lineWidth = 1; // толщина линии сетки
    ctx.stroke();
}

// Функция для рисования линии на каждом canvas
function drawLine(ctx, startX, startY, endX, endY) {
    ctx.beginPath();
    ctx.moveTo(startX, startY);
    ctx.lineTo(endX, endY);
    ctx.strokeStyle = "#000"; // цвет линии
    ctx.lineWidth = 3; // толщина линии
    ctx.stroke();
}

// Функция для рисования числа над линией
function drawNumber(ctx, x, y, number) {
    ctx.font = "16px Arial";
    ctx.fillStyle = "#000";
    ctx.fillText(number, x, y);
}

// Обработчики событий для каждого canvas
Array.prototype.forEach.call(canvases, function(canvas) {
    var ctx = canvas.getContext('2d');
    var lines = []; // массив для хранения нарисованных линий
    var numbers = []; // массив для хранения чисел над линиями
    var isDrawing = false;

    // Рисуем сетку при загрузке страницы
    drawGrid(ctx, canvas);

    // Обработчик события щелчка на canvas
    canvas.addEventListener('click', function(event) {
        var rect = canvas.getBoundingClientRect();
        var mouseX = Math.round((event.clientX - rect.left) / 20) * 20;
        var mouseY = Math.round((event.clientY - rect.top) / 20) * 20;
        
        // Проверяем, был ли щелчок на каком-либо числе
        numbers.forEach(function(number, index) {
            var distance = Math.sqrt(Math.pow(mouseX - number.x, 2) + Math.pow(mouseY - number.y, 2)); // Вычисляем расстояние между щелчком и числом
            if (distance < 10) { // Если расстояние меньше 10 пикселей, то щелчок произошел на числе
                var newValue = prompt("Введите новое значение:");
                if (!isNaN(newValue)) { // Проверяем, что введено число
                    numbers[index].value = parseFloat(newValue);
                    redraw();
                }
            }
        });
    });

    // Обработчик события нажатия кнопки мыши
    canvas.addEventListener('mousedown', function(event) {
        if (event.button === 0) { // Проверка, что нажата левая кнопка мыши
            var rect = canvas.getBoundingClientRect();
            var mouseX = Math.round((event.clientX - rect.left) / 20) * 20;
            var mouseY = Math.round((event.clientY - rect.top) / 20) * 20;
            var lastLine = lines[lines.length - 1];
            if (!lastLine || mouseX !== lastLine.startX || mouseY !== lastLine.startY) {
                var newLine = { startX: mouseX, startY: mouseY, endX: mouseX, endY: mouseY };
                lines.push(newLine); // добавляем новую линию
                var numberX = (mouseX + mouseX) / 2;
                var numberY = (mouseY + mouseY) / 2;
                numbers.push({ x: numberX, y: numberY, value: 0 }); // добавляем число с начальным значением 0
                drawLine(ctx, mouseX, mouseY, mouseX, mouseY); // начинаем рисовать новую линию
                if (newLine.startX !== newLine.endX || newLine.startY !== newLine.endY) {
                    drawNumber(ctx, numberX, numberY - 20, 0); // отображаем число с большим смещением для вертикальных линий
                }
                isDrawing = true;
            }
        }
    });

    // Обработчик события перемещения мыши
    canvas.addEventListener('mousemove', function(event) {
        if (isDrawing) {
            var rect = canvas.getBoundingClientRect();
            var mouseX = Math.round((event.clientX - rect.left) / 20) * 20;
            var mouseY = Math.round((event.clientY - rect.top) / 20) * 20;
            var currentLine = lines[lines.length - 1]; // получаем последнюю нарисованную линию
            if (currentLine) {
                currentLine.endX = mouseX;
                currentLine.endY = mouseY;
                var numberIndex = numbers.length - 1;
                var numberX = (currentLine.startX + mouseX) / 2;
                var numberY = (currentLine.startY + mouseY) / 2;
                numbers[numberIndex].x = numberX;
                numbers[numberIndex].y = numberY;
                redraw(); // обновляем сетку и линии
            }
        }
    });

    // Обработчик события отпускания кнопки мыши
    canvas.addEventListener('mouseup', function(event) {
        if (isDrawing && event.button === 0) { // Проверка, что отпущена левая кнопка мыши
            isDrawing = false;
        }
    });

    // Функция для обновления всех нарисованных линий и чисел
    function redraw() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        drawGrid(ctx, canvas);
        lines.forEach(function(line, index) {
            drawLine(ctx, line.startX, line.startY, line.endX, line.endY);
            // if(line.startX > line.endX && line.startY < line.endY){
            //     var numberX = ((line.startX + line.endX) / 2) - 10;
            //     var numberY = ((line.startY + line.endY) / 2) - 10;
            // } else if((line.startX > line.endX && line.startY == line.endY) || (line.startX < line.endX && line.startY == line.endY)){
            //     var numberX = ((line.startX + line.endX) / 2) - 10;
            //     var numberY = ((line.startY + line.endY) / 2) - 10;
            // } else if(line.startX < line.endX && line.startY < line.endY){
            //     var numberX = ((line.startX + line.endX) / 2) + 10;
            //     var numberY = ((line.startY + line.endY) / 2) - 10;
            // } else if((line.startY > line.endY && line.startX == line.endX) || (line.startY < line.endY && line.startX == line.endX)){
            //     var numberX = ((line.startX + line.endX) / 2) - 20;
            //     var numberY = ((line.startY + line.endY) / 2) - 0;
            // } else if(line.startX < line.endX && line.startY > line.endY){
            //     var numberX = ((line.startX + line.endX) / 2) - 10;
            //     var numberY = ((line.startY + line.endY) / 2) - 20;
            // } else if(line.startX > line.endX && line.startY > line.endY){
            //     var numberX = ((line.startX + line.endX) / 2) + 0;
            //     var numberY = ((line.startY + line.endY) / 2) - 20;
            // }
            // drawNumber(ctx, numberX, numberY, numbers[index].value); // Отображаем число
        });
    }

    // Обработчик события нажатия клавиши Enter
    window.addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
            isDrawing = false; // Прекращаем рисование линий
        }
    });
});