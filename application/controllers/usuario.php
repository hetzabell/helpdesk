 <?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Usuario extends Controlador_Privado {
    
    private $vista_head;
    private $vista_navbar;
    private $vista_contenido;
    private $vista_sidebar;
    private $vista_footer;
    private $datos_vista;
    private $datos_usuario;
    private $plantilla;

    public function __construct() {
        parent::__construct();
        $this->datos_usuario = $this->session->userdata('logged_user');
        $this->load->helper('fgenericas_helper');
        $this->load->library('email', '', 'correo');
        $this->load->library('encryption');
    }

    public function index() {
        redirect('acceso');
    }

    /*
     * Registro de usuarios
     */

    public function Registrate() {
        $datos['errores'] = FALSE;
        $datos['sucursales'] = $this->usuario_model->getSucursales();

        if ($this->input->post('sNombreCompleto') &&
                $this->input->post('sEmail') &&
                $this->input->post('sPuesto') &&
                $this->input->post('iSucursal')) {
            //Se arma el arreglo con los datps del registro
            $sucursales = explode('|',$this->input->post('iSucursal'));
            $sucursal = $sucursales[0];
            $datosRegistro = array(
                'sNombreCompleto' => $this->input->post('sNombreCompleto'),
                'sEmail' => $this->input->post('sEmail'),
                'sExtension' => $this->input->post('sExtension'),
                'sPuesto' => $this->input->post('sPuesto'),
                'iSucursal' => $sucursal,
                'iArea' => $this->input->post('iArea')
            );
            $dominio = strstr($datosRegistro['sEmail'], '@');
            $predominio = strstr($datosRegistro['sEmail'], '@', TRUE);
            if (!($dominio == '@hircasa.com') && !($dominio == 'sucursaleshircasa.com')) {
                $errores['emailDominio'] = 'Email no permitido, solo se permite dominios @hircasa.com y @sucursaleshircasa.com';
            }
            //Validamos si existe el email
            if ($this->usuario_model->ExisteEmail($datosRegistro['sEmail'])) {
                $errores['emailExiste'] = 'El email ya esta registrado';
            }

            if (!$errores) {
                $llave = $datosRegistro['sNombreCompleto'] . $predominio . $datosRegistro['iSucursal'] . $datosRegistro['iArea'];
                $datosRegistro['sActivacion'] = $this->encryption->encode($llave);
                $activador = $this->usuario_model->altaUsuario($datosRegistro);
                if ($activador) {
                    //Envia correo
                    $datosBody['NombreUsuario'] = $datosRegistro['sNombreCompleto'];
                    $datosBody['enlace'] = base_url() . 'Usuario/Activar/' . $activador;
                    $datosEmail['destinatario'] = $datosRegistro['sEmail'];
                    $datosEmail['asunto'] = 'Confirma tu cuenta HIR Casa IT';
                    $datosEmail['body'] = $this->load->view('generales/emailActivaCuenta', $datosBody, TRUE);
                    $this->correo->enviaCorreo($datosEmail);
                    $this->load->view('usuario/exito_registro_vw');
                } else {
                    $errores['altaUsuario'] = 'Error al registrar, Intenta de nuevo.';
                    $datos['errores'] = $errores;
                    $datos['usuario'] = $datosRegistro;
                    $this->load->view('usuario/registrate_vw', $datos);
                }
            } else {
                $datos['errores'] = $errores;
                $datos['usuario'] = $datosRegistro;
                $this->load->view('usuario/registrate_vw', $datos);
            }
        } else {
            $this->load->view('usuario/registrate_vw', $datos);
        }
    }
    
    public function Activar($llave){
        $resultado = $this->usuario_model->activaUsuario($llave);
        switch ($resultado) {
            case FALSE:
                $datos['msj'] = 'El enlace caducó o el usuario ya está activado.';
                $this->load->view('usuario/error_activacion_vw',$datos);
                break;
            case 'Error':
                $datos['msj'] = 'Error de aplicación. Intenta de nuevo.';
                $this->load->view('usuario/error_activacion_vw',$datos);
                break;
            default:
                $this->load->view('usuario/exito_activacion_vw');
                break;
        }
        
    }
    
    public function Mi_Perfil($resultado = ''){
        if (!$this->user) {
            redirect('acceso');
        }
        if(!$resultado == ''){
            switch ($resultado) {
                case 'ok':
                    $this->vista_contenido['mensaje'] = '<div class="alert alert-success" role="alert"><strong>Éxito!</strong><br>Cambios realizados.</div>';
                    break;
                default:
                    $this->vista_contenido['mensaje'] = '<div class="alert alert-danger" role="alert"><strong>Error!</strong><br>Recuerda que los correos solo pueden ser @hircasa.com ó @sucursaleshircasa.com<br>Intentalo de nuevo.</div>';
                    break;
            }
        }
        if ($this->input->post('sNombreCompleto') && $this->input->post('sPuesto')) {
            if($this->_Actualiza_Perfil()){
                $param['idUsuario'] = $this->datos_usuario->idUsuario;
                $usuario_valido = $this->usuario_model->getUsuarios($param);
                $this->session->set_userdata('logged_user', $usuario_valido);
                redirect('usuario/Mi-Perfil/ok');
            }  else {
                redirect('usuario/Mi-Perfil/error');
            }
        }
        
        $this->plantilla = 'usuario/editaPerfilUsuario';
        //=========================================
        //Head de la pÃƒÂ¡gina
        //=========================================
        //Css exclusivos de esta pÃƒÂ¡gina
        $cssExtra = array(
            1 => 'dashboard'
        );
        $this->vista_head['titulo_seccion'] = 'HelpDesk - Mi Perfil';
        $this->vista_head['cssExtra'] = $cssExtra;
        $this->datos_vista['head'] = $this->load->view('generales/head_general', $this->vista_head, TRUE);

        //=========================================
        //Barra de navegaciÃƒÂ³n
        //=========================================        
        $this->vista_navbar['usuario'] = $this->datos_usuario->sNombreCompleto; //Enviamos el nombre del usuario
        $this->datos_vista['navbar'] = $this->load->view('generales/navbar_general', $this->vista_navbar, TRUE);

        //=========================================        
        //Contenido
        //=========================================        
        $this->vista_contenido['sidebar'] = $this->load->view('generales/sidebar_PanelGeneral', $this->vista_sidebar, TRUE);
        $this->vista_contenido['usuario'] = $this->datos_usuario;
        $this->vista_contenido['sucursales'] = $this->usuario_model->getSucursales();
        $this->datos_vista['contenido'] = $this->load->view($this->plantilla, $this->vista_contenido, TRUE);

        //=========================================        
        //footer
        //=========================================        
        //Scripts exclusivos de esta pÃƒÂ¡gina
        $jsExtra = array(0=>'registrate');
        $jsOtro = array(0=>'LlenaCbxAreasEditar('.$this->datos_usuario->iArea.')');
        $this->vista_footer['jsExtra'] = muestraNotificaciones($jsExtra, $this->datos_usuario->iTipoUsuario);
        $this->vista_footer['jsOtro'] = $jsOtro;
        $this->datos_vista['footer'] = $this->load->view('generales/footerJS_general', $this->vista_footer, TRUE);
        $this->load->view('General_vw', $this->datos_vista);
    }




    /**************************
     *   FUNCIONES POR AJAX   *
     **************************/
    public function Llena_Areas() {
        //Esto asegura que sea enviado el tipo de servicio
        if (!$this->input->post('iSucursal')) {
            redirect('404');
        }
        $datos = explode('|', $this->input->post('iSucursal'));
        if (!($datos[1] == 'CORPORATIVO')) {
            $datos[1] = 'SUCURSAL';
        }
        $datosSucursal['sTipo'] = $datos[1];
        $data['areas'] = $this->usuario_model->getAreas($datosSucursal);
        echo $this->load->view('usuario/parciales/cbxAreas', $data, TRUE);
    }
    
    /**************************
     *   FUNCIONES PRIVADAS   *
     **************************/
    private function _Actualiza_Perfil(){
        $datos['sNombreCompleto'] = $this->input->post('sNombreCompleto');
        $datos['sEmail'] = $this->input->post('sEmail');
        $datos['sExtension'] = $this->input->post('sExtension');
        $datos['sPuesto'] = $this->input->post('sPuesto');
        $datos['iSucursal'] = $this->input->post('iSucursal');
        $datos['iArea'] = $this->input->post('iArea');
        $idUsuario = $this->datos_usuario->idUsuario;
        if (!dominioValido($datos['sEmail'])) {
            return FALSE;
        }
        return $this->usuario_model->upUsuario($datos,$idUsuario);
    }

}

/* Fin de archivo acceso.php */
/* Ubicación: ./application/controllers/acceso.php */