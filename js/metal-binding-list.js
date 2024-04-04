document.addEventListener('DOMContentLoaded', function() {
    const addKomplButton = document.querySelector('.create-project');
    const modal = document.getElementById('myModal');
    const cancelButton = modal.querySelector('.cancel');
    const modalContent = modal.querySelector('.modal-content');

    addKomplButton.addEventListener('click', function(event) {
        event.preventDefault(); // ������������� �������� �� ��������� ��� ������
        modal.style.display = 'flex';
    });

    modal.addEventListener('click', function(event) {
        event.stopPropagation(); // ������������� �������� ���������� ���� ��� ����� �� ���
    });

    cancelButton.addEventListener('click', function(event) {
        event.preventDefault(); // ������������� �������� �� ��������� ��� ������
        modal.style.display = 'none'; // �������� ��������� ����
    });

    document.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.style.display = 'none'; // �������� ��������� ���� ��� ����� �� ���
        }
    });

    modal.addEventListener('click', function(event) {
        if (!modalContent.contains(event.target)) {
            modal.style.display = 'none';
        }
    });

});

// function handleFormSubmit(event) {
//     event.preventDefault(); // ������������� ����������� ��������� �������� �����

//     const form = document.getElementById('projectForm');
//     const errorContainer = document.getElementById('errorContainer');
//     const formData = new FormData(form); // ������� ������ FormData ��� ����� ������ �����

//     fetch('function/process.php', {
//         method: 'POST',
//         body: formData
//     })
//     .then(response => response.text())
//     .then(data => {
//         console.log(data);  
//         if (data.startsWith('Error:')) {
//             // ���� ������ ������ ������, ���������� �� � ��������� ����
//             errorContainer.textContent = data;
//             errorContainer.style.display = 'block';
//         } else {
//             // ������� ���������� ����� ��� �������� ������ ��������, �� ������� ������������ ��������
//             form.reset(); // ��� ������� ���������� ���� ����� �����
//             // ����� ����� ������ ��������� ���� ��� ��������� ������ ��������
//         }
//     })
//     .catch(error => {
//         // ��������� ������
//         console.error('��������� ������ ��� ���������� �������:', error);
//         errorContainer.textContent = '��������� ������ ��� ���������� �������. ����������, ���������� ��� ���.';
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
        event.preventDefault(); // ������������� ����������� ��������� �������� �����

        // �������� ������ ����� �������
        const projectName = form.querySelector('input[name="projectName"]').value;
        const responsibleUserId = form.querySelector('select[name="responsibleUserId"]').value;

        // ��������� ������ ������� � �������, ��������������� ��������� cp1251
        const formDataString = `projectName=${encodeURIComponent(projectName)}&responsibleUserId=${encodeURIComponent(responsibleUserId)}`;

        // ������������� ��������� Content-Type ��� �������� ���������
        const headers = new Headers();
        headers.append('Content-Type', 'application/x-www-form-urlencoded; charset=cp1251');

        // ���������� ������ ����� �� ������ � ������� AJAX
        fetch('function/process.php', {
            method: 'POST',
            body: formDataString, // ���������� ��������� ������ �������
            headers: headers // ��������� ��������� �������
        })
        .then(response => response.text()) // �������� ��������� ����� �� �������
        .then(data => {
            // ������� ����� ������� � ������� (����� �������� �� ������ ��������, ��������, ���������� ����� ��������)
            console.log(data);

            // ��������� ��������
            window.location.reload();
        })
        .catch(error => {
            console.error('��������� ������:', error);
        });
    });
});

