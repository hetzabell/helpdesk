$('#frmAsignaTicket').submit(function(e) {
    e.preventDefault();
    AsignaTicket();
});

function AsignaTicket() {
    var l = window.location;
    var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
    var idIncidencia = $('input#idIncidencia').val();
    var idAtiende = $('select#cbxIngenieros').val();
    var iStatus = $('input#iStatus').val();

    $.ajax({
        type: 'POST',
        url: base_url + '/panel_General/asignar_ticket',
        data: 'idIncidencia=' + idIncidencia + '&idAtiende=' + idAtiende + '&iStatus='+ iStatus,
        dataType: 'json',
        success: function(data) {
            $('#asignar_ticket').modal('hide');
            if (data.status != 'error') {
                $('#msgboxGracias').modal({backdrop: 'static'});
                $('#msgboxGracias').modal('show');
                window.location.reload();
            } else {
                $('#msgboxError').modal({backdrop: 'static'});
                $('#msgboxError').modal('show');
            }
        }
    });
}