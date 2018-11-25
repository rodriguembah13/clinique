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
           $('#creaneau').text(calEvent.periode);
           $('#medecin').text(calEvent.medecin);
           $('#patient').text(calEvent.patient);
           $('#daterv').text(calEvent.dateRv);
           //$('p').text('Nouveau contenu !');
           // remplace le contenu actuel du paragraphe par "Nouveau contenu !"

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
    $("#more_com").click(function(){

        $.ajax({
            url : 'more_com.php',
            type : 'GET',
            dataType : 'json',
            success : function(code_html, statut){ // success est toujours en place, bien sûr !

            },

            error : function(resultat, statut, erreur){

            }

        });

    });

});
/*$(document).on('change','#appbundle_rv_medecin',function () {
    let $field=$(this);
    let data={};
    data[$field.attr('name')]=$field.val();
    let $input=$(data).find('#appbundle_rv_creneauxMedecin');
    $('#appbundle_rv_creneauxMedecin').replaceWith($input);
});*/

$(document).on('change','#appbundle_rv_medecin',function () {
    let $field=$(this);
    let $form=$field.closest('form');
    let data={};
    data[$field.attr('name')]=$field.val();
    $.post($form.attr('action'),data).then(function (data) {
        let $input=$(data).find('#appbundle_rv_creneauxMedecin');
        $('#appbundle_rv_creneauxMedecin').replaceWith($input);
    })
});
