//�������� ����� ������ � ������� KompList
document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('.create-kompl-content').addEventListener('click', function() {
        // ��������� ������ ����� ������� �����
        this.disabled = true;
        
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'kompl-content.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status === 200) {
                // ��������� ��������� ������
                console.log(xhr.responseText);
                // ������������ �������� ����� ���������� ������
                // window.location.reload();
            } else {
                // ��������� ������
                console.log('������: ' + xhr.status);
            }
        };
        xhr.send('create-kompl-content=true');
    });
});