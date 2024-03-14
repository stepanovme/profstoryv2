//Создание новой строки в таблице KompList
document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('.create-kompl-content').addEventListener('click', function() {
        // Отключаем кнопку после первого клика
        this.disabled = true;
        
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'kompl-content.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status === 200) {
                // Обработка успешного ответа
                console.log(xhr.responseText);
                // Перезагрузка страницы после добавления записи
                // window.location.reload();
            } else {
                // Обработка ошибки
                console.log('Ошибка: ' + xhr.status);
            }
        };
        xhr.send('create-kompl-content=true');
    });
});