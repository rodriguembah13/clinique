const $ = require('jquery');
require('bootstrap');
require('fullcalendar');
$(document).ready(function () {
    $('[data-toggle="popover"]').popover();
    $('[data-toggle="dropdown-toggle"]').dropdown();
    //alert('merci');
    $('#calendar-holder').fullCalendar({
        header: {
            left: 'prev, next',
            center: 'title',
            right: 'month, agendaWeek, agendaDay,listMonth',
        },
        navLinks: true, // can click day/week names to navigate views
        businessHours: true, // display business hours
       timezone: ('Europe/London'),
        allDaySlot: false,
        defaultView: 'agendaWeek',
        lazyFetching: true,
        firstDay: 1,
        selectable: true,
        timeFormat: {
            agenda: 'h:mmt',
            '': 'h:mmt'
        },
        /* columnFormat:{
             month: 'ddd',
             week: 'ddd D/M',
             day: 'dddd'
         }, */
        editable: true,
        eventDurationEditable: true,
       eventSources: [
            {
                url: '/full-calendar/load' ,
                type: 'POST',
                data: {
                    filters: { param: 'foo' }
                },
                error: function() {
                    alert("rest")
                }
            }] /**/
    });
});