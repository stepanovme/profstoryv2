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


// ���������
// �������� ������ �� ��� �������� canvas
var canvases = document.getElementsByClassName('myCanvas');

// ������� ��� ��������� ����� �� ������ canvas
function drawGrid(ctx, canvas) {
    var gridSize = 20; // ������ �����
    for (var x = 0; x <= canvas.width; x += gridSize) {
        ctx.moveTo(x, 0);
        ctx.lineTo(x, canvas.height);
    }
    for (var y = 0; y <= canvas.height; y += gridSize) {
        ctx.moveTo(0, y);
        ctx.lineTo(canvas.width, y);
    }
    ctx.strokeStyle = "#ddd"; // ���� �����
    ctx.lineWidth = 1; // ������� ����� �����
    ctx.stroke();
}

// ������� ��� ��������� ����� �� ������ canvas
function drawLine(ctx, startX, startY, endX, endY) {
    ctx.beginPath();
    ctx.moveTo(startX, startY);
    ctx.lineTo(endX, endY);
    ctx.strokeStyle = "#000"; // ���� �����
    ctx.lineWidth = 3; // ������� �����
    ctx.stroke();
}

// ������� ��� ��������� ����� ��� ������
function drawNumber(ctx, x, y, number) {
    ctx.font = "16px Arial";
    ctx.fillStyle = "#000";
    ctx.fillText(number, x, y);
}

// ����������� ������� ��� ������� canvas
Array.prototype.forEach.call(canvases, function(canvas) {
    var ctx = canvas.getContext('2d');
    var lines = []; // ������ ��� �������� ������������ �����
    var numbers = []; // ������ ��� �������� ����� ��� �������
    var isDrawing = false;

    // ������ ����� ��� �������� ��������
    drawGrid(ctx, canvas);

    // ���������� ������� ������ �� canvas
    canvas.addEventListener('click', function(event) {
        var rect = canvas.getBoundingClientRect();
        var mouseX = Math.round((event.clientX - rect.left) / 20) * 20;
        var mouseY = Math.round((event.clientY - rect.top) / 20) * 20;
        
        // ���������, ��� �� ������ �� �����-���� �����
        numbers.forEach(function(number, index) {
            var distance = Math.sqrt(Math.pow(mouseX - number.x, 2) + Math.pow(mouseY - number.y, 2)); // ��������� ���������� ����� ������� � ������
            if (distance < 10) { // ���� ���������� ������ 10 ��������, �� ������ ��������� �� �����
                var newValue = prompt("������� ����� ��������:");
                if (!isNaN(newValue)) { // ���������, ��� ������� �����
                    numbers[index].value = parseFloat(newValue);
                    redraw();
                }
            }
        });
    });

    // ���������� ������� ������� ������ ����
    canvas.addEventListener('mousedown', function(event) {
        if (event.button === 0) { // ��������, ��� ������ ����� ������ ����
            var rect = canvas.getBoundingClientRect();
            var mouseX = Math.round((event.clientX - rect.left) / 20) * 20;
            var mouseY = Math.round((event.clientY - rect.top) / 20) * 20;
            var lastLine = lines[lines.length - 1];
            if (!lastLine || mouseX !== lastLine.startX || mouseY !== lastLine.startY) {
                var newLine = { startX: mouseX, startY: mouseY, endX: mouseX, endY: mouseY };
                lines.push(newLine); // ��������� ����� �����
                var numberX = (mouseX + mouseX) / 2;
                var numberY = (mouseY + mouseY) / 2;
                numbers.push({ x: numberX, y: numberY, value: 0 }); // ��������� ����� � ��������� ��������� 0
                drawLine(ctx, mouseX, mouseY, mouseX, mouseY); // �������� �������� ����� �����
                if (newLine.startX !== newLine.endX || newLine.startY !== newLine.endY) {
                    drawNumber(ctx, numberX, numberY - 20, 0); // ���������� ����� � ������� ��������� ��� ������������ �����
                }
                isDrawing = true;
            }
        }
    });

    // ���������� ������� ����������� ����
    canvas.addEventListener('mousemove', function(event) {
        if (isDrawing) {
            var rect = canvas.getBoundingClientRect();
            var mouseX = Math.round((event.clientX - rect.left) / 20) * 20;
            var mouseY = Math.round((event.clientY - rect.top) / 20) * 20;
            var currentLine = lines[lines.length - 1]; // �������� ��������� ������������ �����
            if (currentLine) {
                currentLine.endX = mouseX;
                currentLine.endY = mouseY;
                var numberIndex = numbers.length - 1;
                var numberX = (currentLine.startX + mouseX) / 2;
                var numberY = (currentLine.startY + mouseY) / 2;
                numbers[numberIndex].x = numberX;
                numbers[numberIndex].y = numberY;
                redraw(); // ��������� ����� � �����
            }
        }
    });

    // ���������� ������� ���������� ������ ����
    canvas.addEventListener('mouseup', function(event) {
        if (isDrawing && event.button === 0) { // ��������, ��� �������� ����� ������ ����
            isDrawing = false;
        }
    });

    // ������� ��� ���������� ���� ������������ ����� � �����
    function redraw() {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        drawGrid(ctx, canvas);
        lines.forEach(function(line, index) {
            drawLine(ctx, line.startX, line.startY, line.endX, line.endY);
            // if(line.startX > line.endX && line.startY < line.endY){
            //     var numberX = ((line.startX + line.endX) / 2) - 10;
            //     var numberY = ((line.startY + line.endY) / 2) - 10;
            // } else if((line.startX > line.endX && line.startY == line.endY) || (line.startX < line.endX && line.startY == line.endY)){
            //     var numberX = ((line.startX + line.endX) / 2) - 10;
            //     var numberY = ((line.startY + line.endY) / 2) - 10;
            // } else if(line.startX < line.endX && line.startY < line.endY){
            //     var numberX = ((line.startX + line.endX) / 2) + 10;
            //     var numberY = ((line.startY + line.endY) / 2) - 10;
            // } else if((line.startY > line.endY && line.startX == line.endX) || (line.startY < line.endY && line.startX == line.endX)){
            //     var numberX = ((line.startX + line.endX) / 2) - 20;
            //     var numberY = ((line.startY + line.endY) / 2) - 0;
            // } else if(line.startX < line.endX && line.startY > line.endY){
            //     var numberX = ((line.startX + line.endX) / 2) - 10;
            //     var numberY = ((line.startY + line.endY) / 2) - 20;
            // } else if(line.startX > line.endX && line.startY > line.endY){
            //     var numberX = ((line.startX + line.endX) / 2) + 0;
            //     var numberY = ((line.startY + line.endY) / 2) - 20;
            // }
            // drawNumber(ctx, numberX, numberY, numbers[index].value); // ���������� �����
        });
    }

    // ���������� ������� ������� ������� Enter
    window.addEventListener('keydown', function(event) {
        if (event.key === 'Enter') {
            isDrawing = false; // ���������� ��������� �����
        }
    });
});