$(document).ready(function () {
    var i = 0;
    $('#calendar').fullCalendar({
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'month,agendaWeek,agendaDay'
        },
        // defaultDate: '2017-03-03',
        month: {columnFormat: 'ddd DD MMM'},
        defaultView: 'agendaWeek',
        editable: typeof(acc)!=='undefined' && acc<3,
        slotLabelFormat: 'h пара\n',
      slotDuration: '01:00:00',
        snapDuration: '01:00:00',
        minTime: '01:00:00',
        maxTime: '09:00:00',
        height:'auto',
        allDaySlot:false,
//        navLinks: true,
//        eventLimit: true,
        selectable: typeof(acc)!=='undefined' && acc<3,
        // selectHelper: true,
        select: function(start, end) {
            // var title = prompt('Event Title:');
            $('#save_event').data('start',start);
            $('#save_event').data('end',end);
            if ($('#class').val() !== '') $('#modalevent').modal('show');
        },
        events: {
            url: 'events/getEvents',
            type: 'post',
            cache: false,
            data: function() { // a function that returns an object
                console.log($('#class').val());
                return {
                    class: $('#class').val(),
                    podgr: $('#podgr').val(),
                    view: $('#calendar').fullCalendar('getView').name
                };
            }
        },
        viewRender: function(event, element) {
            var para_time = {
                '0' : '08.30-10.00',
                '1' : '10.10-11.40',
                '2' : '11.50-13.20',
                '3' : '13.50-15.20',
                '4' : '15.30-17.00',
                '5' : '17.10-18.40',
                '6' : '18.50-20.20',
                '7' : '20.30-22.00'
            };

            $('.fc-axis > span').each(function( index ) {
                $( this ).append('<small>'+para_time[index]+'</small><br>');
                $( this ).css('width:100px');
            });
        },
        timeFormat: ' '
    });
});
