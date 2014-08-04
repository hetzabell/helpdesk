<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Dashboard extends Controlador_Privado {

    public function __construct() {
        parent::__construct();
        $this->load->model('dashboard_model');
    }

    public function index() {
        $this->table();
    }

    public function Table() {
        $this->load->view('dashboard/dashboard_vw', $this->datos_vista);
    }

    public function llena_dashboard() {
        //llena el panel de tickets pendiente y en proceso
        $parametros['iStatus <> '] = 4;
        $data['data'] = $this->dashboard_model->getworks($parametros);
        echo $this->load->view('dashboard/table_dashboard', $data, TRUE);
    }

}
