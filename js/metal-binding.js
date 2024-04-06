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
    $('.editable-ticket-name').on('change keypress', function(event){
        // ���������, ���� �� ������ ������� Enter
        if (event.type === 'change' || event.keyCode === 13) {
            var ticketId = $(this).data('id');
            var newValue = $(this).val();
            
            // ���������� ������ �� ������
            $.ajax({
                url: 'function/update_data_izd_name.php', // �������� �� ���� � ������ PHP ������� ���������� ������
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
    var ticketData = [];

    checkedRows.forEach(function(row) {
        ticketIds.push(row.closest('tr').getAttribute('data-id'));
        ticketData.push(row.getAttribute('data-ticket'));
    });

    if (ticketIds.length > 0) {
        // ��������� ���������� �����
        console.log("Ticket IDs: ", ticketIds);
        console.log("Ticket Data: ", ticketData);

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

        // �������� ��� ������� � ���� �������
        xhr.send(JSON.stringify({ ticketIds: ticketIds, ticketData: ticketData }));
    }
});





// ���������� ��������� ������ � ������� length
document.addEventListener('DOMContentLoaded', function() {
    const editableCells = document.querySelectorAll('.editable-length');

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
            const response = await fetch('function/update_izd_length.php', {
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


// ���������
// �������� ��� �������� canvas �� ��������
var canvases = document.getElementsByClassName('myCanvas');

// ���������� �� ���� canvas � ��������� ���������� ������� ��� ��������� �����
Array.from(canvases).forEach(function(canvas) {
    var ctx = canvas.getContext('2d');
    var isDrawingLine = false; // ���� ��� ������������ ��������� �����
    var lines = []; // ������ ��� �������� ���� ������������ �����

    // ������� ��� ��������� �����
    function drawGrid(step) {
        ctx.beginPath();
        ctx.lineWidth = 1; // ������� ����� �����
        for (var x = 0; x < canvas.width; x += step) {
            ctx.moveTo(x, 0);
            ctx.lineTo(x, canvas.height);
        }
        for (var y = 0; y < canvas.height; y += step) {
            ctx.moveTo(0, y);
            ctx.lineTo(canvas.width, y);
        }
        ctx.strokeStyle = "#888"; // ����� ���� �����
        ctx.stroke();
        ctx.closePath();
    }

    // ������� ��� ��������� ���� ����� � �����
    function redrawLines() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        drawGrid(20); // ������ �����
        ctx.strokeStyle = "#000"; // ������ ���� ��� ���� �����
        ctx.lineWidth = 3; // ������� ������ �����
        lines.forEach(function(line) {
            ctx.beginPath();
            // ��������� ��������� ��� �������� � �����
            var startX = Math.round(line.startX / 20) * 20;
            var startY = Math.round(line.startY / 20) * 20;
            var endX = Math.round(line.endX / 20) * 20;
            var endY = Math.round(line.endY / 20) * 20;
            ctx.moveTo(startX, startY);
            ctx.lineTo(endX, endY);
            ctx.stroke();
            ctx.closePath();

            // ��������� ���������� ��� ����� ��� ������
            var numberX = (startX + endX) / 2;
            var numberY = (startY + endY) / 2;
            drawNumber(numberX, numberY, line.value); // ������ �����
        });
    }

    // ������� ��� ��������� �����
    function drawNumber(x, y, value) {
        ctx.fillStyle = '#000'; // ������ ���� ��� ������
        ctx.font = '16px Arial'; // ������ � ����� ������
        ctx.textAlign = 'center'; // ������������ ������ �� ������
        ctx.fillText(value, x, y - 10); // ������ ����� ��� ������
    }

    // ���������� ������� ����� �� canvas
    canvas.addEventListener('mousedown', function(e) {
        if (!isDrawingLine) {
            isDrawingLine = true;
            var startX = e.offsetX;
            var startY = e.offsetY;
            lines.push({ startX: startX, startY: startY, endX: startX, endY: startY, value: 0 }); // ��������� ��������� ���������� �����, �������� ����� 0
        }
    });

    // ���������� ������� ����������� ����
    canvas.addEventListener('mousemove', function(e) {
        if (isDrawingLine) {
            var mouseX = Math.round(e.offsetX / 20) * 20;
            var mouseY = Math.round(e.offsetY / 20) * 20;
            lines[lines.length - 1].endX = mouseX;
            lines[lines.length - 1].endY = mouseY;
            redrawLines();
        }
    });

    // ���������� ������� ���������� ������ ����
canvas.addEventListener('mouseup', function(e) {
    if (isDrawingLine) {
        isDrawingLine = false;
        var lastLine = lines[lines.length - 1];
        if (Math.abs(lastLine.startX - lastLine.endX) > 1 || Math.abs(lastLine.startY - lastLine.endY) > 1) {
            lastLine.value = 0; // ������������� �������� ����� � 0
            redrawLines(); // �������������� ����� ����� ���������� �����
        } else {
            lines.pop(); // ������� �����, ���� ��� ������� �������� (�� ����������)
        }
    }
});

    // ���������� ������� ����� �� �����
canvas.addEventListener('click', function(e) {
    var mouseX = e.offsetX;
    var mouseY = e.offsetY;
    lines.forEach(function(line) {
        var numberX = (line.startX + line.endX) / 2;
        var numberY = (line.startY + line.endY) / 2;
        ctx.font = '16px Arial'; // ��������� ����� �� �����, ��� ��� ��������� �����
        var textWidth = ctx.measureText(line.value).width; // ������� ������ ������ �����
        var textHeight = 16; // ������ ������ �����
        var startX = numberX - textWidth / 2; // ���������� �������� ������ ���� ������� �����
        var startY = numberY - textHeight;
        var endX = numberX + textWidth / 2; // ���������� ������� ������� ���� ������� �����
        var endY = numberY;
        if (mouseX >= startX && mouseX <= endX && mouseY >= startY && mouseY <= endY) {
            var newValue = prompt("������� ����� �����:", line.value);
            if (newValue !== null) {
                line.value = parseFloat(newValue);
                redrawLines();
            }
        }
    });
});

    // �������������� ����� ��� �������� ��������
    drawGrid(20);
});