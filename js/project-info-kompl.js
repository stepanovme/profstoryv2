// modal.js
document.addEventListener('DOMContentLoaded', function() {
    const addKomplButton = document.getElementById('addKomplButton');

    addKomplButton.addEventListener('click', function() {
        // Здесь вы можете написать код для открытия модального окна
        // Например, вы можете показать скрытый блок с модальным окном:
        const modal = document.getElementById('addKomplModal');
        modal.style.display = 'block';
    });
});
