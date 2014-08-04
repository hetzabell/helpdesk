function llena_dashboard() {
    var l = window.location;
    var base_url = l.protocol + "//" + l.host + "/" + l.pathname.split('/')[1];
    $.ajax({
        type: 'POST',
        url: base_url + '/dashboard/llena_dashboard', 
        success: function(resp) {
            $('tbody#dashboard').html(resp);
        }
    });
}

function Alertas() {
  llena_dashboard();
}

Alertas();
setInterval('Alertas()', 5000);
