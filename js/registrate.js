function LlenaCbxAreas() {
    var l = window.location;
    var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
    var iSucursal = $('select#iSucursal').val();

    $.ajax({
        type: 'POST',
        url: base_url + '/Usuario/Llena_Areas', //Realizaremos la petición al metodo llena_cbxAsuntos
        data: 'iSucursal=' + iSucursal, //Pasaremos por parámetro POST el tipo de servicio
        success: function(resp) { //Cuando se procese con éxito la petición se ejecutará esta función
            //llenar combo con opciones de asunto
            $('select#iArea').html(resp); //Con el método ".html()" incluimos el código html devuelto por AJAX en la tabla del reporte
        }
    });
}

function LlenaCbxAreasEditar(iArea) {
    var l = window.location;
    var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
    var iSucursal = $('select#iSucursal').val();

    $.ajax({
        type: 'POST',
        url: base_url + '/Usuario/Llena_Areas', //Realizaremos la petición al metodo llena_cbxAsuntos
        data: 'iSucursal=' + iSucursal, //Pasaremos por parámetro POST el tipo de servicio
        success: function(resp) { //Cuando se procese con éxito la petición se ejecutará esta función
            $('select#iArea').html(resp); 
            $('select#iArea').val(iArea);
        }
    });
}