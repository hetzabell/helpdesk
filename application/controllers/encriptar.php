<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Encriptar extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->library('encryption');
    }

    public function index() {
        $this->load->view('PanelGeneral/encuesta_final');
    }

    public function prueba() {
        $cadena = 'Carlos cmartinez 118';
        $enc = $this->encryption->encode($cadena);
        //$enc = $cadena;
        $dec = $this->encryption->decode($enc);
        echo '<h3>Cadena original:</h3><p>' . $cadena . '</p>';
        echo '<h3>Cadena encriptado:</h3><p>' . $enc . '</p>';
        $dec = str_replace(array('-'), array('_'), $dec);
        echo '<h3>Cadena desencriptado:</h3><p>' . $dec . '</p>';
    }

}

/* Fin de archivo acceso.php */
/* Ubicación: ./application/controllers/acceso.php */