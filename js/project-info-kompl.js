document.addEventListener('DOMContentLoaded', function() {
    const addKomplButton = document.getElementById('addKomplButton');

    addKomplButton.addEventListener('click', function() {
        // Здесь вы можете написать код для открытия модального окна
        // Например, вы можете показать скрытый блок с модальным окном:
        const modal = document.getElementById('addKomplModal');
        modal.style.display = 'flex';
    });

    // Добавляем обработчик событий на строки таблицы в модальном окне
    const modalTableRows = document.querySelectorAll('#addKomplModal .table-data tbody tr');
    modalTableRows.forEach(row => {
        row.addEventListener('click', function() {
            const kompListId = this.getAttribute('data-id');
            const punic = this.getAttribute('data-punic'); // Получаем значение data-punic
            // Отправляем запрос на сервер для получения дополнительной информации о выбранном элементе
            const xhr = new XMLHttpRequest();
            xhr.open('GET', 'function/get_komp_content.php?kompListId=' + kompListId + '&punic=' + punic, true); // Передаем punic через GET-параметр
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    const modal = document.getElementById('addKomplModal');
                    modal.style.display = 'none';
                    const kompContentModal = document.createElement('div');
                    kompContentModal.classList.add('modal');
                    kompContentModal.innerHTML = xhr.responseText;
                    document.body.appendChild(kompContentModal);
                    // Показываем модальное окно с данными о выбранном элементе
                    kompContentModal.style.display = 'flex';
                }
            };
            xhr.send();
        });
    });
});


$(document).ready(function() {
    $('body').on('click', '.second-table tr', function() {
        var punic = $(this).data('punic');
        var anumb = $(this).data('anumb');
        var clnum = $(this).data('clnum');
        var formula = $(this).data('formula');

        // Скрытие модального окна
        $('.modal').css('display', 'none');

        $.ajax({
            type: 'POST',
            url: 'function/add_specpau.php',
            data: {
                punic: punic,
                anumb: anumb,
                clnum: clnum,
                formula: formula
            },
            success: function(response) {
                // Обработка успешного ответа от сервера
                console.log(response);
            },
            error: function(xhr, status, error) {
                // Обработка ошибок
                console.error(xhr.responseText);
            }
        });
    });
});


