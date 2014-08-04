/*
 * Actualiza Notificaciones
 */
function Actualiza_Comentarios() {
    var l = window.location;
    var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
    var iAccion = 5;

    $.ajax({
        type: 'POST',
        url: base_url + '/panel_General/Actualizar_Notificaciones', 
        data: 'iAccion=' + iAccion,
        success: function(resp) {
            $('li#NuevosComentarios').html(resp);
        }
    });
}

/*
 * Nuevos tickets
 */
function Nuevos_Tickets() {
    var l = window.location;
    var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
    var iAccion = 1;
    var iStatus = 1;

    $.ajax({
        type: 'POST',
        url: base_url + '/panel_General/Actualizar_Notificaciones', 
        data: 'iAccion=' + iAccion + '&iStatus=' + iStatus,
        success: function(resp) {
            $('li#NuevoTicket').html(resp);
        }
    });
}

/*
 * Nuevos tickets
 */
function Asignacion_Tickets() {
    var l = window.location;
    var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
    var iAccion = 8;

    $.ajax({
        type: 'POST',
        url: base_url + '/panel_General/Actualizar_Notificaciones', 
        data: 'iAccion=' + iAccion,
        success: function(resp) {
            $('li#AsignacionTicket').html(resp);
        }
    });
}

/*
 * tickets con Vo.Bo.
 */
function Cerrardos_Tickets() {
    var l = window.location;
    var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
    var iAccion = 7;
    var iStatus = 4;

    $.ajax({
        type: 'POST',
        url: base_url + '/panel_General/Actualizar_Notificaciones', 
        data: 'iAccion=' + iAccion +'&iStatus=' + iStatus,
        success: function(resp) {
            $('li#CerrarTicket').html(resp);
        }
    });
}

function Alertas() {
    Nuevos_Tickets();
    Actualiza_Comentarios();
    Cerrardos_Tickets();
    Asignacion_Tickets();
}

Alertas();

setInterval('Alertas()', 5000);