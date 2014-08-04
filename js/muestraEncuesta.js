$('#usuarioCalifica').modal({backdrop: 'static'});
$('#usuarioCalifica').modal('show');

$('#frmCalificaionUsuario').submit(function(e) {
    e.preventDefault();
    CalificarServicio();
});

function CalificarServicio() {
    var l = window.location;
    var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
    var iPuntaje = $('input[name=iPuntaje]:checked').val();
    var idIncidencia = $('input#idIncidencia').val();
    var sDescripcion = $('textarea#txaComentarioEncuesta').val();

    $.ajax({
        type: 'POST',
        url: base_url + '/panel_General/calificar_servicio',
        data: 'iPuntaje=' + iPuntaje + '&idIncidencia=' + idIncidencia + '&sDescripcion=' + sDescripcion,
        dataType: 'json',
        success: function(data) {
            //alert(data.msg);
            $('#usuarioCalifica').modal('hide');
            $('#msgboxGracias').modal({backdrop: 'static'});
            $('#msgboxGracias').modal('show');
        }
    });
}