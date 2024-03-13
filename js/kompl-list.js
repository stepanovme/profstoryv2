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