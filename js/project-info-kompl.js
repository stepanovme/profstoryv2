// modal.js
document.addEventListener('DOMContentLoaded', function() {
    const addKomplButton = document.getElementById('addKomplButton');

    addKomplButton.addEventListener('click', function() {
        // Здесь вы можете написать код для открытия модального окна
        // Например, вы можете показать скрытый блок с модальным окном:
        const modal = document.getElementById('addKomplModal');
        modal.style.display = 'flex';
    });
});


// Добавляем обработчик событий на строки таблицы в модальном окне
document.addEventListener('DOMContentLoaded', function() {
    const modalTableRows = document.querySelectorAll('#addKomplModal .table-data tbody tr');
    modalTableRows.forEach(row => {
        row.addEventListener('click', function() {
            const kompListId = this.getAttribute('data-id');
            // Отправляем запрос на сервер для получения дополнительной информации о выбранном элементе
            const xhr = new XMLHttpRequest();
            xhr.open('GET', 'function/get_komp_content.php?kompListId=' + kompListId, true);
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    const kompContentModal = document.createElement('div');
                    kompContentModal.classList.add('modal');
                    kompContentModal.innerHTML = xhr.responseText;
                    document.body.appendChild(kompContentModal);
                    // Показываем модальное окно с данными о выбранном элементе
                    kompContentModal.style.display = 'block';
                }
            };
            xhr.send();
        });
    });
});

