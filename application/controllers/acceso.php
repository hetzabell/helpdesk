<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Acceso extends Controlador_Privado {

    public function __construct() {
        parent::__construct();
    }

    public function index() {
		$this->login();
        //redirect(base_url().'acceso/login');
    }
    
    /***
     * Página principal de login
     */
    public function login() {
        $datos_vista_login['error_login'] = FALSE;

        if ($this->input->post('usr')) {
            $usuario_valido = $this->usuario_model->getUsuarioLogin($this->input->post('usr'));

            if ($usuario_valido) {
                $this->session->set_userdata('logged_user', $usuario_valido);
                redirect(base_url().'Panel-General');
            } else {
                $datos_vista_login['error_login'] = TRUE;
            }
        }
        $this->load->view('acceso/login_vw', $datos_vista_login);
    }

    public function logout() {
        $this->session->unset_userdata('logged_user');
        $this->session->sess_destroy();
        redirect(base_url().'acceso');
    }

}

/* Fin de archivo acceso.php */
/* Ubicación: ./application/controllers/acceso.php */