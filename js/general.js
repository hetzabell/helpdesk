function addFileBox(ancho)
{
    var _adjuntos = (document.getElementById('numficheros').value) * 1;
    addFormField(document.formu1, 'file', 'txbArchivo' + _adjuntos,ancho);
    document.getElementById('numficheros').value = _adjuntos + 1;
}

function addFormField(form, fieldType, fieldName, fieldWidth, fieldValue)
{
    if (typeof (fieldWidth) === "undefined") {
        fieldWidth = "100%";
    }
    if (document.getElementById)
    {
        var input = document.createElement('INPUT');
        var div = document.createElement('DIV');

        if (document.all)
        {
            input.type = fieldType;
            input.name = fieldName;
            // input.value = fieldValue;
            input.class = 'form-control';
        }
        else if (document.getElementById)
        {
            input.setAttribute('type', fieldType);
            input.setAttribute('name', fieldName);
            // input.setAttribute('value', fieldValue);
            input.setAttribute('class', 'form-control');
        }

        input.style.width = fieldWidth;
        input.style.border = "none";
        div.innerHTML = '<strong class="text-primary"><span class="glyphicon glyphicon-file"></span> Archivo ' + document.getElementById('numficheros').value + '</strong>';
        div.appendChild(input);
        document.getElementById('ficheros').appendChild(div);
    }
}

$(document).ready(function() {
    var url = window.location;
    $('ul.nav a[href="' + url + '"]').parent().addClass('active');
    $('ul.nav a').filter(function() {
        return this.href == url;
    }).parent().addClass('active');
});

/*
 * Tomar ticket
 */
function TomarTicket(idIncidencia,actualizar) {
    var l = window.location;
    var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];

    if (confirm('¿Seguro de tomar el ticket?')) {
        $.ajax({
            type: 'POST',
            url: base_url + '/panel_General/tomar_ticket',
            data: 'idIncidencia=' + idIncidencia,
            dataType: 'json',
            success: function(data) {
                alert(data.msg);
                if (data.status !== 'error') {
                    if(actualizar == 1){
                        window.location.reload();
                    }else{
                        LlenaTbl_bandeja();
                    }
                }
            }
        });
    }
}

/***
 * Llena la bandeja de tickets Sin Asginar
 */
function LlenaTbl_bandeja() {
    var l = window.location;
    var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];

    $.ajax({
        type: 'POST',
        url: base_url + '/panel_General/llena_tbl_bandeja', //Realizaremos la petición al metodo llena_cbxAsuntos
        success: function(resp) {
            $('div#tbl_bandeja').html(resp);
            $('[data-toggle="popover"]').popover({trigger: 'hover', 'placement': 'left'});
        }
    });
}

/***
 * Llena la bandeja de tickets Abiertos
 */
function LlenaTbl_abiertos() {
    var l = window.location;
    var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];

    $.ajax({
        type: 'POST',
        url: base_url + '/panel_General/llena_tbl_abiertos', //Realizaremos la petición al metodo llena_cbxAsuntos
        success: function(resp) {
            $('div#tbl_abiertos').html(resp);
            $('[data-toggle="popover"]').popover({trigger: 'hover', 'placement': 'left'});
        }
    });
}

/***
 * Llena la bandeja de tickets Cerrados
 */
function LlenaTbl_cerrados_usr() {
    var l = window.location;
    var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];

    $.ajax({
        type: 'POST',
        url: base_url + '/panel_General/llena_tbl_cerrados_usr', //Realizaremos la petición al metodo llena_cbxAsuntos
        success: function(resp) {
            $('div#tbl_cerrados_usr').html(resp);
            $('[data-toggle="popover"]').popover({trigger: 'hover', 'placement': 'left'});
        }
    });
}

/***
 * Llena la bandeja de tickets Abiertos
 */
function LlenaTbl_abiertos_usr() {
    var l = window.location;
    var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];

    $.ajax({
        type: 'POST',
        url: base_url + '/panel_General/llena_tbl_abiertos_usr', //Realizaremos la petición al metodo llena_cbxAsuntos
        success: function(resp) {
            $('div#tbl_abiertos_usr').html(resp);
            $('[data-toggle="popover"]').popover({trigger: 'hover', 'placement': 'left'});
        }
    });
}

/***
 * Llena la bandeja de tickets Cerrados
 */
function LlenaTbl_cerrados() {
    var l = window.location;
    var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];

    $.ajax({
        type: 'POST',
        url: base_url + '/panel_General/llena_tbl_cerrados', //Realizaremos la petición al metodo llena_cbxAsuntos
        success: function(resp) {
            $('div#tbl_cerrados').html(resp);
            $('[data-toggle="popover"]').popover({trigger: 'hover', 'placement': 'left'});
        }
    });
}

/***
 * Llena la tabla de en atencion para administrador
 */
function LlenaTbl_Atencion() {
    var l = window.location;
    var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];

    $.ajax({
        type: 'POST',
        url: base_url + '/panel_General/llena_tbl_atencion', //Realizaremos la petición al metodo llena_cbxAsuntos
        success: function(resp) {
            $('div#tbl_atencion').html(resp);
            $('[data-toggle="popover"]').popover({trigger: 'hover', 'placement': 'left'});
        }
    });
}

function CargaResumenes() {
    LlenaTbl_bandeja();
    LlenaTbl_abiertos();
    LlenaTbl_abiertos_usr();
    LlenaTbl_cerrados();
    LlenaTbl_cerrados_usr();
}

CargaResumenes();
