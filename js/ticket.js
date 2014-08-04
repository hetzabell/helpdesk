function LlenaCbxAsuntos() {
    var l = window.location;
    var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
    var idDepartamento = $("input[name='rbtTipoServicio']:checked").val();

    $.ajax({
        type: 'POST',
        url: base_url + '/panel_General/llena_cbxAsuntos', //Realizaremos la petición al metodo llena_cbxAsuntos
        data: 'idDepartamento=' + idDepartamento, //Pasaremos por parámetro POST el tipo de servicio
        success: function(resp) { //Cuando se procese con éxito la petición se ejecutará esta función
            //llenar combo con opciones de asunto
            $('select#cbxAsuntos').html(resp); //Con el método ".html()" incluimos el código html devuelto por AJAX en la tabla del reporte
        }
    });
}

function MuestraTxbOtro (){
    var idServicio = $('select#cbxAsuntos').val();
    if (idServicio == 1 || idServicio == 2) {
        $("div#OtroServicio").show();
    }else{
        $("div#OtroServicio").hide();
    }
}