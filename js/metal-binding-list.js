document.addEventListener('DOMContentLoaded', function() {
    const addKomplButton = document.querySelector('.create-project');
    const modal = document.getElementById('myModal');
    const cancelButton = modal.querySelector('.cancel');
    const modalContent = modal.querySelector('.modal-content');

    addKomplButton.addEventListener('click', function(event) {
        event.preventDefault(); // Предотвращаем действие по умолчанию для кнопки
        modal.style.display = 'flex';
    });

    modal.addEventListener('click', function(event) {
        event.stopPropagation(); // Предотвращаем закрытие модального окна при клике на нем
    });

    cancelButton.addEventListener('click', function(event) {
        event.preventDefault(); // Предотвращаем действие по умолчанию для кнопки
        modal.style.display = 'none'; // Скрываем модальное окно
    });

    document.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.style.display = 'none'; // Скрываем модальное окно при клике на нем
        }
    });

    modal.addEventListener('click', function(event) {
        if (!modalContent.contains(event.target)) {
            modal.style.display = 'none';
        }
    });

});

// function handleFormSubmit(event) {
//     event.preventDefault(); // Предотвращаем стандартное поведение отправки формы

//     const form = document.getElementById('projectForm');
//     const errorContainer = document.getElementById('errorContainer');
//     const formData = new FormData(form); // Создаем объект FormData для сбора данных формы

//     fetch('function/process.php', {
//         method: 'POST',
//         body: formData
//     })
//     .then(response => response.text())
//     .then(data => {
//         console.log(data);  
//         if (data.startsWith('Error:')) {
//             // Если сервер вернул ошибку, отображаем ее в модальном окне
//             errorContainer.textContent = data;
//             errorContainer.style.display = 'block';
//         } else {
//             // Очистим содержимое формы или выполним другие действия, не вызывая перезагрузку страницы
//             form.reset(); // Это очистит содержимое всех полей формы
//             // Можно также скрыть модальное окно или выполнить другие действия
//         }
//     })
//     .catch(error => {
//         // Обработка ошибки
//         console.error('Произошла ошибка при выполнении запроса:', error);
//         errorContainer.textContent = 'Произошла ошибка при выполнении запроса. Пожалуйста, попробуйте еще раз.';
//         errorContainer.style.display = 'block';
//     });
// }

// document.addEventListener('DOMContentLoaded', function() {
//     const addButton = document.querySelector('.add');

//     addButton.addEventListener('click', handleFormSubmit);
// });






document.addEventListener('DOMContentLoaded', function() {
    const form = document.getElementById('projectForm');

    form.addEventListener('submit', function(event) {
        event.preventDefault(); // Предотвращаем стандартное поведение отправки формы

        // Собираем данные формы вручную
        const projectName = form.querySelector('input[name="projectName"]').value;
        const responsibleUserId = form.querySelector('select[name="responsibleUserId"]').value;

        // Формируем строку запроса в формате, соответствующем кодировке cp1251
        const formDataString = `projectName=${encodeURIComponent(projectName)}&responsibleUserId=${encodeURIComponent(responsibleUserId)}`;

        // Устанавливаем заголовок Content-Type для указания кодировки
        const headers = new Headers();
        headers.append('Content-Type', 'application/x-www-form-urlencoded; charset=cp1251');

        // Отправляем данные формы на сервер с помощью AJAX
        fetch('function/process.php', {
            method: 'POST',
            body: formDataString, // Отправляем собранную строку запроса
            headers: headers // Указываем заголовки запроса
        })
        .then(response => response.text()) // Получаем текстовый ответ от сервера
        .then(data => {
            // Выводим ответ сервера в консоль (можно изменить на другое действие, например, обновление части страницы)
            console.log(data);

            // Обновляем страницу
            window.location.reload();
        })
        .catch(error => {
            console.error('Произошла ошибка:', error);
        });
    });
});

