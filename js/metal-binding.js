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
