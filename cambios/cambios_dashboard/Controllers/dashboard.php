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
        $this->datos_vista['head'] = $this->load->view('generales/head_general', $this->vista_head, TRUE);
        $this->datos_vista['contenido'] = $this->load->view('dashboard/dashboard_vw', $this->vista_contenido, TRUE);
        $this->datos_vista['footer'] = $this->load->view('generales/footerJS_general', $this->vista_footer, TRUE);
        $this->load->view('General_vw', $this->datos_vista);
    }

    public function llena_dashboard() {
        //llena el panel de tickets pendiente y en proceso
        $parametros['iStatus <> '] = 4;
        $data['data'] = $this->dashboard_model->getworks($parametros);
        echo $this->load->view('dashboard/table_dashboard', $data, TRUE);
    }

}
