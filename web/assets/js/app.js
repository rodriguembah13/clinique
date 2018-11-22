const $ = require('jquery');
require('bootstrap');
require('metisMenu');
$(document).ready(function () {
    $('[data-toggle="popover"]').popover();
    // $("#metismenu").metisMenu();
    $(".form_datetime").datepicker({
        format: "YYYY-MM-DD  HH:mm"
    });
    $("#example1").DataTable();
    $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false
    });
});

