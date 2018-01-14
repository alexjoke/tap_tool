
require('./bootstrap');
require ('../../../public/js/jquery.dataTables');


$(document).ready(function () {
    if($('#domainsDatatable')){
        var url = $('#domainsDatatable').data('url');
        var domaintable = $('#domainsDatatable').DataTable({
            "pageLength": 10,
            processing: true,
            responsive: true,
            serverSide: true,
            ajax: url ,
            columns: [
                {data: 'id'},
                {data: 'name'},

            ]
        });

        $('form').submit(function (e) {
            e.preventDefault();
            var url = $('form').attr('action');
            var msg = $('form').serialize();
            $.ajax({
                url: url,
                method: 'POST',
                data: msg,
                success: function (res) {
                    domaintable.ajax.reload();
                    $('form input').val('');
                    $('.err-block p').remove();
                    $('.err-block').hide(0);
                },
                error: function (data) {
                    $('.err-block').show(0);
                    var errors = $.parseJSON(data.responseText);
                    $.each(errors.errors, function (index, value) {
                        $('.err-block').append('<p>' + value + '</p>');
                    });
                }
            });
        });
    }

    if($('#clicksDatatable')){
        var url = $('#clicksDatatable').data('url');
        $('#clicksDatatable').dataTable({
            "pageLength": 10,
            processing: true,
            responsive: true,
            serverSide: true,
            ajax: url ,
            columns: [
                {data: 'id'},
                {data: 'country'},
                {data: 'ip'},
                {data: 'ref'},
                {data: 'user_agent'},
                {data: 'param1'},
                {data: 'param2'},
                {data: 'error'},
                {data: 'bad_domain'},

            ]
        });
    }
    if($('.check').length>0){
        setTimeout(function () {
            window.location.href = "http://google.com";
        }, 5000);
        var count = 5;
        var counter=setInterval(timer, 1000);
        timer();
        function timer()
        {
            count=count-1;
            if (count <= 0)
            {
                clearInterval(counter);
                return;
            }

            document.getElementById("timer").innerHTML=count; // watch for spelling
        }
    }
    
});


