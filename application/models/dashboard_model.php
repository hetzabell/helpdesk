<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class dashboard_model extends CI_Model {
    /*
      Constructor del modelo, aqui establecemos
      que tabla utilizamos y cual es su llave primaria.
     */

    function __construct() {
        parent::__construct();
    }

    /*
      Función que regresa las actividades pendientes y en proceso
     */

    function getworks($Parametros) {
        $this->db->order_by('Color', 'desc');
        $this->db->order_by('idAtiende', 'asc');
        $this->db->order_by('tFechaCreacion', 'asc');
        $consulta = $this->db->get_where('vw_tickets', $Parametros);
        if ($consulta->num_rows() > 0) {
            return $consulta;
        } else {
            return FALSE;
        }
    }

}
