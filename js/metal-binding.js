$(document).ready(function(){
    $('#ticketNum').on('change keypress', function(event){
        // ���������, ���� �� ������ ������� Enter
        if (event.type === 'change' || event.keyCode === 13) {
            var ticketId = $(this).data('id');
            var newValue = $(this).val();
            
            // ���������� ������ �� ������
            $.ajax({
                url: 'function/update_data_ticket.php', // �������� �� ���� � ������ PHP ������� ���������� ������
                method: 'POST',
                data: {id: ticketId, value: newValue},
                success: function(response){
                    console.log(response); // ��� ������, ������� ����� �� ������� � �������
                }
            });

            // ���������� �������������� ���� �����
            $(this).blur(); // ���� ����� ������� ����� � ���� �����, ��������� ��� ��������������
        }
    });
});

$(document).ready(function(){
    $('#TicketListCadObject').on('change keypress', function(event){
        // ���������, ���� �� ������ ������� Enter
        if (event.type === 'change' || event.keyCode === 13) {
            var ticketId = $(this).data('id');
            var newValue = $(this).val();
            
            // ���������� ������ �� ������
            $.ajax({
                url: 'function/update_data_ticket_object.php', // �������� �� ���� � ������ PHP ������� ���������� ������
                method: 'POST',
                data: {id: ticketId, value: newValue},
                success: function(response){
                    console.log(response); // ��� ������, ������� ����� �� ������� � �������
                }
            });

            // ���������� �������������� ���� �����
            $(this).blur(); // ���� ����� ������� ����� � ���� �����, ��������� ��� ��������������
        }
    });
});

$(document).ready(function(){
    $('#TicketListCadColor').on('change keypress', function(event){
        // ���������, ���� �� ������ ������� Enter
        if (event.type === 'change' || event.keyCode === 13) {
            var ticketId = $(this).data('id');
            var newValue = $(this).val();
            
            // ���������� ������ �� ������
            $.ajax({
                url: 'function/update_data_ticket_color.php', // �������� �� ���� � ������ PHP ������� ���������� ������
                method: 'POST',
                data: {id: ticketId, value: newValue},
                success: function(response){
                    console.log(response); // ��� ������, ������� ����� �� ������� � �������
                }
            });

            // ���������� �������������� ���� �����
            $(this).blur(); // ���� ����� ������� ����� � ���� �����, ��������� ��� ��������������
        }
    });
});

$(document).ready(function(){
    $('#TicketListCadDatePlan').on('change keypress', function(event){
        // ���������, ���� �� ������ ������� Enter
        if (event.type === 'change' || event.keyCode === 13) {
            var ticketId = $(this).data('id');
            var newValue = $(this).val();
            
            // ���������� ������ �� ������
            $.ajax({
                url: 'function/update_data_ticket_dateplan.php', // �������� �� ���� � ������ PHP ������� ���������� ������
                method: 'POST',
                data: {id: ticketId, value: newValue},
                success: function(response){
                    console.log(response); // ��� ������, ������� ����� �� ������� � �������
                }
            });

            // ���������� �������������� ���� �����
            $(this).blur(); // ���� ����� ������� ����� � ���� �����, ��������� ��� ��������������
        }
    });
});

$(document).ready(function(){
    $('#TicketListCadThickness').on('change keypress', function(event){
        // ���������, ���� �� ������ ������� Enter
        if (event.type === 'change' || event.keyCode === 13) {
            var ticketId = $(this).data('id');
            var newValue = $(this).val();
            
            // ���������� ������ �� ������
            $.ajax({
                url: 'function/update_data_ticket_thickness.php', // �������� �� ���� � ������ PHP ������� ���������� ������
                method: 'POST',
                data: {id: ticketId, value: newValue},
                success: function(response){
                    console.log(response); // ��� ������, ������� ����� �� ������� � �������
                }
            });

            // ���������� �������������� ���� �����
            $(this).blur(); // ���� ����� ������� ����� � ���� �����, ��������� ��� ��������������
        }
    });
});

$(document).ready(function(){
    $('#TicketListCadPlace').on('change keypress', function(event){
        // ���������, ���� �� ������ ������� Enter
        if (event.type === 'change' || event.keyCode === 13) {
            var ticketId = $(this).data('id');
            var newValue = $(this).val();
            
            // ���������� ������ �� ������
            $.ajax({
                url: 'function/update_data_ticket_place.php', // �������� �� ���� � ������ PHP ������� ���������� ������
                method: 'POST',
                data: {id: ticketId, value: newValue},
                success: function(response){
                    console.log(response); // ��� ������, ������� ����� �� ������� � �������
                }
            });

            // ���������� �������������� ���� �����
            $(this).blur(); // ���� ����� ������� ����� � ���� �����, ��������� ��� ��������������
        }
    });
});

$(document).ready(function(){
    $('#TicketListCadBrigade').on('change keypress', function(event){
        // ���������, ���� �� ������ ������� Enter
        if (event.type === 'change' || event.keyCode === 13) {
            var ticketId = $(this).data('id');
            var newValue = $(this).val();
            
            // ���������� ������ �� ������
            $.ajax({
                url: 'function/update_data_ticket_brigade.php', // �������� �� ���� � ������ PHP ������� ���������� ������
                method: 'POST',
                data: {id: ticketId, value: newValue},
                success: function(response){
                    console.log(response); // ��� ������, ������� ����� �� ������� � �������
                }
            });

            // ���������� �������������� ���� �����
            $(this).blur(); // ���� ����� ������� ����� � ���� �����, ��������� ��� ��������������
        }
    });
});

$(document).ready(function(){
    $('#TicketListCadAddress').on('change keypress', function(event){
        // ���������, ���� �� ������ ������� Enter
        if (event.type === 'change' || event.keyCode === 13) {
            var ticketId = $(this).data('id');
            var newValue = $(this).val();
            
            // ���������� ������ �� ������
            $.ajax({
                url: 'function/update_data_ticket_address.php', // �������� �� ���� � ������ PHP ������� ���������� ������
                method: 'POST',
                data: {id: ticketId, value: newValue},
                success: function(response){
                    console.log(response); // ��� ������, ������� ����� �� ������� � �������
                }
            });

            // ���������� �������������� ���� �����
            $(this).blur(); // ���� ����� ������� ����� � ���� �����, ��������� ��� ��������������
        }
    });
});

$(document).ready(function(){
    // ������� ������, �������� ���������� � ������� ���������� ����
    var nextField = {
        "#ticketNum": "#TicketListCadObject",
        "#TicketListCadObject": "#TicketListCadColor",
        "#TicketListCadColor": "#TicketListCadThickness",
        "#TicketListCadThickness": "#TicketListCadPlace",
        "#TicketListCadPlace": "#TicketListCadBrigade",
        "#TicketListCadBrigade": "#TicketListCadAddress",
        "#TicketListCadAddress": "#TicketListCadDatePlan",
        "#TicketListCadDatePlan": "#TicketListCadObject" // ����������� ��������� ������� �� ������
    };

    // ��������� ������� ������� ������� Enter �� input
    $('.wrapper input').on('keypress', function(event){
        // ���������, ���� �� ������ ������� Enter
        if (event.keyCode === 13) {
            // ������� ID �������� input
            var currentFieldId = "#" + $(this).attr("id");
            
            // ������� ID ���������� input � ������������ � ��������
            var nextFieldId = nextField[currentFieldId];
            
            // ��������� � ���������� input ��� ��������������
            $(nextFieldId).focus();

            // ���������� ������ � ����� �������� � ���� �����
            var input = document.querySelector(nextFieldId);
            input.selectionStart = input.selectionEnd = input.value.length;
        }
    });
});

document.querySelector('.delete-izd').addEventListener('click', function() {
    var checkedRows = document.querySelectorAll('.row-checkbox:checked');
    var ticketIds = [];

    checkedRows.forEach(function(row) {
        ticketIds.push(row.closest('tr').getAttribute('data-id'));
    });

    if (ticketIds.length > 0) {
        var xhr = new XMLHttpRequest();
            xhr.onreadystatechange = function() {
                if (xhr.readyState === XMLHttpRequest.DONE) {
                    if (xhr.status === 200) {
                        // ��������� �������� ����� ��������� �������� ������
                        window.location.reload();
                    } else {
                        alert('��������� ������ ��� �������� ������');
                    }
                }
            };
            xhr.open('POST', 'function/delete_izd.php');
            xhr.setRequestHeader('Content-Type', 'application/json');
            xhr.send(JSON.stringify({ ticketIds: ticketIds }));
    }
});



// ���������� ��������� ������ � ������� length
document.addEventListener('DOMContentLoaded', function() {
    const editableCells = document.querySelectorAll('.editable-length');

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
        xhr.open('POST', 'function/update_izd_length.php', true);
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

document.addEventListener('DOMContentLoaded', function() {
    const editableCells = document.querySelectorAll('.editable-quantity');

    editableCells.forEach(cell => {
        cell.addEventListener('blur', function() {
            const newValue = this.textContent.trim();
            const anumb = this.getAttribute('data-id');
            const TicketListCadId = this.dataset.ticketlistcadid; // �������� �������� ����� dataset
            updateCellValue(anumb, newValue, TicketListCadId);
        });
        cell.addEventListener('keydown', function(event) {
            if (event.key === 'Enter') {
                event.preventDefault(); // ������������� �������� �� ��������� (������� �� ����� ������)

                // ��������� �������������� ������� ������
                this.blur();
            }
        });
    });

    async function updateCellValue(anumb, newValue, TicketListCadId) {
        // ���� �������� ������, �������� ��� �� 0
        newValue = newValue.trim() === '' ? '0' : newValue.trim();
    
        try {
            const response = await fetch('function/update_izd_quantity.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded'
                },
                body: `anumb=${encodeURIComponent(anumb)}&TicketListCadId=${encodeURIComponent(TicketListCadId)}&newValue=${encodeURIComponent(newValue)}`
            });
            
            if (response.ok) {
                const responseData = await response.text();
                console.log(responseData);
                // ������������ ��������
                window.location.reload();
            } else {
                console.error('������ HTTP: ' + response.status);
            }
        } catch (error) {
            console.error('������ fetch:', error);
        }
    }
});

// ���������� ��������� ������ � ������� address
document.addEventListener('DOMContentLoaded', function() {
    const editableCells = document.querySelectorAll('.editable-address');

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
        xhr.open('POST', 'function/update_izd_address.php', true);
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