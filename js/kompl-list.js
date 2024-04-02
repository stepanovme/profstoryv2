//�������� ����� ������ � ������� KompList
document.addEventListener('DOMContentLoaded', function() {
    document.querySelector('.create-kompl').addEventListener('click', function() {
        // ��������� ������ ����� ������� �����
        this.disabled = true;
        
        var xhr = new XMLHttpRequest();
        xhr.open('POST', 'kompl-list.php');
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
        xhr.onload = function() {
            if (xhr.status === 200) {
                // ��������� ��������� ������
                console.log(xhr.responseText);
                // ������������ �������� ����� ���������� ������
                window.location.reload();
            } else {
                // ��������� ������
                console.log('��������: ' + xhr.status);
            }
        };
        xhr.send('create-kompl=true');
    });
});

//���������� KomplistName
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
            event.preventDefault(); // ������������� �������� �� ��������� (������� �� ����� ������)

            // ��������� �������������� ������� ������
            this.blur();
        }
    });
});

function updateCellValue(anumb, newValue) {

    // �������� AJAX ������� �� ������
    const xhr = new XMLHttpRequest();
    xhr.open('POST', '/function/save-edit.php', true);
    xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            // ��������� ������ �� �������, ���� ����������
            console.log(xhr.responseText);
        }
    };
    xhr.send('anumb=' + encodeURIComponent(anumb) + '&newValue=' + encodeURIComponent(newValue));
}
});

//���������� KomplistCategory
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
                event.preventDefault(); // ������������� �������� �� ��������� (������� �� ����� ������)
    
                // ��������� �������������� ������� ������
                this.blur();
            }
        });
    });
    
    function updateCellValue(anumb, newValue) {
    
        // �������� AJAX ������� �� ������
        const xhr = new XMLHttpRequest();
        xhr.open('POST', '/function/save-edit-category.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // ��������� ������ �� �������, ���� ����������
                console.log(xhr.responseText);
            }
        };
        xhr.send('anumb=' + encodeURIComponent(anumb) + '&newValue=' + encodeURIComponent(newValue));
    }
    });



// ��������� ������� ������ ��������
document.querySelector('.delete-kompl').addEventListener('click', function() {
    var selectedRows = document.querySelectorAll('.row-checkbox:checked');
    var ids = [];
    selectedRows.forEach(function(row) {
        ids.push(row.getAttribute('data-id'));
    });

    if (ids.length > 0) {
        // ���������� ������ �� �������� ��������� ����� �� ������
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../function/delete_rows.php', true);
        xhr.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
        xhr.onreadystatechange = function() {
            if (xhr.readyState == 4 && xhr.status == 200) {
                // ��������� ������ �������, ���� ����������
                console.log(xhr.responseText);
            }
        };
        xhr.send('ids=' + JSON.stringify(ids));
        location.reload();   
    } else {
        alert('�������� ������ ��� ��������.');
    }
});