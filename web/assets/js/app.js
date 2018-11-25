const $ = require('jquery');
require('bootstrap');
require('fullcalendar');
$(document).ready(function () {
    $('[data-toggle="popover"]').popover();
    $('[data-toggle="dropdown-toggle"]').dropdown();
    //alert('merci');
    $('#calendar-holder').fullCalendar({
        header: {
            left: 'prev, next today',
            center: 'title',
            right: 'month, agendaWeek, agendaDay,listMonth',
        },
        navLinks: true, // can click day/week names to navigate views
        businessHours: true, // display business hours
        //timezone: ('Europe/London'),
        //allDaySlot: false,
        defaultView: 'agendaWeek',
        lazyFetching: true,
       // firstDay: 1,
        //selectable: true,
       eventClick: function(calEvent, jsEvent, view) {
            $('#fc_show').click();
            $('#titre').val(calEvent.title);
           $('#creaneau').val(calEvent.periode);
           $('#medecin').val(calEvent.medecin);
           $('#patient').val(calEvent.patient);
           $('#daterv').data(calEvent.dateRv);
           // $('#title2').val(calEvent.title);
           // $('#descr2').val(calEvent.patient);
        },
        loading: function (isLoading) {
            if (isLoading) { //Display/Hide a pop-up showing an animated icon during the Ajax query.
                $('#loading').modal('show');
            } else {
                $('#loading').modal('hide');
            }
        },
        eventRender: function (event, element) {
            var tooltip = event.patient;
            $(element).attr("data-original-title", tooltip)
            $(element).tooltip({container: "body"})
        },
        selectable: true,
        selectHelper: true,
        select: function(start, end, allDay) {
            $('#fc_create').click();
        },
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