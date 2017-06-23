;
(function () {
    $(document).ready(function () {
        setCalendar();
        addClickImageHandler();
        setCalendarBonus();
    });

    function setCalendar() {
        var calendar = $('#datetimepicker1').datetimepicker({
            defaultDate: "1/1/2017",
            format: 'YYYY-MM'
        });

        calendar.on('dp.change', function (e) {
            var date = calendar.data('date') + '-01';
            $.ajax({
                method: 'GET',
                url: '/main/index/' + date,
                success: function (data, status, xhr) {
                    removeImageEventListener();
                    var newTable = $(data).find('table.table').html();
                    $('table.table').html(newTable);
                    addClickImageHandler();
                }
            });

        });
    }

    function setCalendarBonus() {
        var calendar = $('#datetimepicker2').datetimepicker({
            defaultDate: "1/1/2017",
            format: 'YYYY-MM'
        });

    }

    function addClickImageHandler() {
        $('td').children('img').click(onClickImage);
    }

    function onClickImage() {
        var workerId = $(this).attr('data-worker-id');
        $.ajax({
            method: 'POST',
            url: '/main/worker',
            data: {
                id: workerId
            },
            success: function(data, status, xhr) {
                data = JSON.parse(data);
                $('.modal-body').find('img').attr('src', data.photo).load(function(){});
                $('#fname-lname h3').text(data.firstname + ' ' + data.lastname);
                $('#w-prof h4').text(data.prof);
                $('#w-salary h4').text('Оклад: ' + data.salary);
            }
        });
    }

    function removeImageEventListener() {
        $('td').children('img').unbind('click');
    }
}());