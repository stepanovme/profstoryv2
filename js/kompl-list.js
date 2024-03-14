//Создание новой строки в таблице KompList
document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('.create-kompl').addEventListener('click', function() {
        // Отключаем кнопку после первого клика
        this.disabled = true;
        
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'kompl-list.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Обработка успешного ответа
                console.log(xhr.responseText);
                // Перезагрузка страницы после добавления записи
                window.location.reload();
            } else {
                // Обработка ошибки
                console.log('Ошибка: ' + xhr.status);
            }
        };
        xhr.send('create-kompl=true');
    });
});

//Обновление KomplistName
document.addEventListener('DOMContentLoaded', function() {
const editableCells = document.querySelectorAll('.editable-name');

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

    // Отправка AJAX запроса на сервер
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '/function/save-edit.php', true);
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

//Обновление KomplistCategory
document.addEventListener('DOMContentLoaded', function() {
    const editableCells = document.querySelectorAll('.editable-category');
    
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
    
        // Отправка AJAX запроса на сервер
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '/function/save-edit-category.php', true);
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

// Получение всех строк таблицы
var rows = document.querySelectorAll(".komp-list tr");

// Добавление обработчика события для каждой строки
rows.forEach(function(row) {
    row.addEventListener("click", function() {
        // Получение значения kompListId из атрибута data-id
        var kompListId = row.getAttribute("data-id");

        // Формирование запроса к базе данных для второй таблицы
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Обновление содержимого второй таблицы после получения данных
                document.querySelector(".komp-content").innerHTML = this.responseText;
            }
        };
        xhttp.open("GET", "../function/get_kompContent.php?kompListId=" + kompListId, true);
        xhttp.send();
    });
});


// Находим родительский элемент, который существует на момент загрузки страницы
var parentElement = document.querySelector('.komp-content');

// Добавляем обработчик события на клик на родительский элемент
parentElement.addEventListener('click', function(event) {
    // Проверяем, был ли клик на кнопке "Добавить"
    if (event.target.classList.contains('addButton')) {
        // Получаем значение kompListId из атрибута data-kompListId кнопки "Добавить"
        var kompListId = event.target.getAttribute('data-kompListId');
        console.log('Clicked on addButton with kompListId:', kompListId);

        // Отправляем AJAX-запрос на сервер для выполнения INSERT INTO
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                // Обновляем содержимое второй таблицы после успешного выполнения запроса
                document.querySelector('.komp-content').innerHTML = this.responseText;
            }
        };
        xhttp.open('GET', '../function/add_kompContent.php?kompListId=' + encodeURIComponent(kompListId), true);
        xhttp.send();
    }
});


$(document).ready(function(){
    // Обработчик клика на редактируемые ячейки
    $('.komp-content').on('click', '.editable', function(){
        var td = $(this);
        var id = td.data('kompListId');
        var currentValue = td.text();
        
        // Получение данных для выпадающего списка из другой БД
        $.ajax({
            url: '../function/get_anumb_options.php',
            method: 'GET',
            success: function(data) {
                var options = data.split(',');
                var select = $('<select>');
                $.each(options, function(index, value){
                    var option = $('<option>').text(value.trim()).attr('value', value.trim());
                    select.append(option);
                });

                // Установка выпадающего списка в ячейку
                td.empty().append(select);

                // Установка текущего значения в списке
                select.val(currentValue);

                // Обработка изменения значения списка
                select.on('change', function(){
                    var newValue = $(this).val();
                    td.text(newValue);
                    
                    // Отправка обновленного значения на сервер
                    $.ajax({
                        url: '../function/update_cell.php',
                        method: 'POST',
                        data: {id: id, column: td.index(), value: newValue},
                        success: function(response){
                            console.log(response);
                        }
                    });
                });
            }
        });
    });
});

