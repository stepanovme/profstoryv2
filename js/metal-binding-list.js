document.addEventListener('DOMContentLoaded', function() {
    const addKomplButton = document.querySelector('.create-project');
    const modal = document.getElementById('myModal');
    const cancelButton = modal.querySelector('.cancel');

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
});