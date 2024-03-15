// ��������� ������� ������ ��������
document.querySelector('.delete-kompl-content').addEventListener('click', function() {
    var selectedRows = document.querySelectorAll('.row-checkbox:checked');
    var ids = [];
    selectedRows.forEach(function(row) {
        ids.push(row.getAttribute('data-id'));
    });

    if (ids.length > 0) {
        // ���������� ������ �� �������� ��������� ����� �� ������
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '../function/delete_rows_content.php', true);
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


// ���������� ��������� ������ � ������� anumb
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
        // ���� �������� ������, �������� ��� �� 0
        newValue = newValue.trim() === '' ? '0' : newValue.trim();
    
        // �������� AJAX ������� �� ������
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'function/update_kompl_content.php', true);
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


// ���������� ��������� ������ � ������� formula
document.addEventListener('DOMContentLoaded', function() {
    const editableCells = document.querySelectorAll('.editable-formula');

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
        // �������� ������� �� �����
        newValue = newValue.replace(',', '.');
    
        // ���� �������� ������, �������� ��� �� 0
        newValue = newValue.trim() === '' ? '0' : newValue.trim();
    
        // �������� AJAX ������� �� ������
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'function/update_kompl_content_formula.php', true);
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



// ���������� ��������� ������ � ������� clnum
document.addEventListener('DOMContentLoaded', function() {
    const editableCells = document.querySelectorAll('.editable-clnum');

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
        // �������� ������� �� �����
        newValue = newValue.replace(',', '.');
    
        // ���� �������� ������, �������� ��� �� 0
        newValue = newValue.trim() === '' ? '0' : newValue.trim();
    
        // �������� AJAX ������� �� ������
        const xhr = new XMLHttpRequest();
        xhr.open('POST', 'function/update_kompl_content_clnum.php', true);
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