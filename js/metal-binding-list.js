document.addEventListener('DOMContentLoaded', function() {
    const addKomplButton = document.querySelector('.create-project');
    const modal = document.getElementById('myModal');
    const cancelButton = modal.querySelector('.cancel');

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
});