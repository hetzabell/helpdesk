<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Controlador_Privado extends CI_Controller {

    public $user;

    /*
      La clase Private_Controller hereda de CI_Controller
      ahora aqui establecemos el usuario logueado.
     */

    function __construct() {
        parent::__construct();

        // Se carga el modelo de usuarios.
        $this->load->model('usuario_model');

        // Se le asigna a la informacion a la variable $user.
        $this->user = @$this->session->userdata('logged_user');
    }

}