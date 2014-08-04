<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

class Panel_General extends Controlador_Privado {

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
        $this->load->model('ticket_model');
        $this->datos_usuario = $this->session->userdata('logged_user');
        $this->load->helper('fgenericas_helper');
        $this->load->library('email', '', 'correo');
        $this->load->library('encryption');
    }

    public function index() {
        $this->Panel_General();
    }

    /*
     * Paginas accesibles
     */

    public function Panel_General() {
        if (!$this->user) {
            redirect('acceso');
        }
        /*         * Tipo plantilla segun usuario** */
        $this->plantilla = 'PanelGeneral/resumen' . $this->datos_usuario->iTipoUsuario;
        //=========================================
        //Head de la pÃƒÂ¡gina
        //=========================================
        //Css exclusivos de esta pÃƒÂ¡gina
        $cssExtra = array(
            1 => 'dashboard'
        );
        $this->vista_head['titulo_seccion'] = 'HelpDesk - Panel General';
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
        $this->datos_vista['contenido'] = $this->load->view($this->plantilla, $this->vista_contenido, TRUE);

        //=========================================        
        //footer
        //=========================================        
        //Scripts exclusivos de esta pÃƒÂ¡gina
        $jsExtra = array();
        $this->vista_footer['jsExtra'] = $jsExtra;
        $this->datos_vista['footer'] = $this->load->view('generales/footerJS_general', $this->vista_footer, TRUE);
        $this->load->view('General_vw', $this->datos_vista);
    }

    public function Levantar_Ticket() {
        if (!$this->user) {
            redirect('acceso');
        }
        /*         * Tipo plantilla segun usuario** */
        $this->plantilla = 'PanelGeneral/levantar_ticket' . $this->datos_usuario->iTipoUsuario;
        //=========================================
        //Head de la pÃƒÂ¡gina
        //=========================================
        //Css exclusivos de esta pÃƒÂ¡gina
        $cssExtra = array(
            1 => 'dashboard'
        );
        $this->vista_head['titulo_seccion'] = 'HelpDesk - Levantar Ticket';
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
        $this->vista_contenido['usuarios'] = $this->usuario_model->getUsuariosCombo($this->datos_usuario->idUsuario);
        $this->vista_contenido['miId'] = $this->datos_usuario->idUsuario;
        /* Validamos si el formulario envia datos */
        if ((($this->input->post('cbxAsuntos')) && ($this->input->post('txaDescripcionProblema')))) {
            $this->_registraTicket();
        } else {
            $this->datos_vista['contenido'] = $this->load->view($this->plantilla, $this->vista_contenido, TRUE);
        }
        //=========================================        
        //footer
        //=========================================        
        //Scripts exclusivos de esta página
        $jsExtra = array(
            1 => 'ticket'
        );
        $this->vista_footer['jsExtra'] = $jsExtra;
        $this->datos_vista['footer'] = $this->load->view('generales/footerJS_general', $this->vista_footer, TRUE);
        $this->load->view('General_vw', $this->datos_vista);
    }

    public function Ver_Ticket($idTicket = '') {
        if (!$this->user) {
            redirect('acceso');
        }
        if ($idTicket == '') {
            redirect('Panel-General');
        }

        /* Tipo plantilla segun usuario */
        $this->plantilla = 'PanelGeneral/ver_ticket';
        //=========================================
        //Head de la página
        //=========================================
        //Css exclusivos de esta página
        $cssExtra = array(
            1 => 'dashboard'
        );
        $this->vista_head['titulo_seccion'] = 'HelpDesk - Ver Ticket';
        $this->vista_head['cssExtra'] = $cssExtra;
        $this->datos_vista['head'] = $this->load->view('generales/head_general', $this->vista_head, TRUE);

        //=========================================
        //Barra de navegación
        //=========================================        
        $this->vista_navbar['usuario'] = $this->datos_usuario->sNombreCompleto; //Enviamos el nombre del usuario
        $this->datos_vista['navbar'] = $this->load->view('generales/navbar_general', $this->vista_navbar, TRUE);

        //=========================================        
        //Contenido
        //========================================= 
        $comentarios['comentarios'] = $this->ticket_model->getVerTicket($idTicket);
        $datosTicket = $comentarios['comentarios'][0];
        if ($this->input->post('txaDescripcionComentario')) {
            $this->_registraPausaEstatusIngeniero($datosTicket);
            $this->_registraComentario($idTicket);
            redirect(base_url() . 'Panel-General/Ver-Ticket/' . $idTicket, 'refresh');
        }
        $comentarios['archivos'] = $this->ticket_model->getArchivosIncidencia($idTicket);
        $this->vista_contenido['sidebar'] = $this->load->view('generales/sidebar_PanelGeneral', $this->vista_sidebar, TRUE);
        $this->vista_contenido['historial'] = $this->load->view('PanelGeneral/parciales/Historial_Incidencia', $comentarios, TRUE);
        $this->vista_contenido['IdTicket'] = $idTicket;
        $this->vista_contenido['asunto'] = $datosTicket->sAsunto;
        $this->vista_contenido['status'] = $datosTicket->iStatus;
        $this->vista_contenido['motivos'] = $this->ticket_model->getMotivosPausas();
        $this->datos_vista['contenido'] = $this->load->view($this->plantilla, $this->vista_contenido, TRUE);
        //=========================================        
        //footer
        //=========================================        
        //Scripts exclusivos de esta página
        $jsExtra = array();
        $this->vista_footer['jsExtra'] = $jsExtra;
        $this->datos_vista['footer'] = $this->load->view('generales/footerJS_general', $this->vista_footer, TRUE);
        $this->load->view('General_vw', $this->datos_vista);
    }

    public function Ver_Ticket_Usuario($idTicket = '') {
        if (!$this->user) {
            redirect('acceso');
        }
        if ($idTicket == '') {
            redirect('Panel-General');
        }

        /* Tipo plantilla segun usuario */
        $this->plantilla = 'PanelGeneral/ver_ticket_usuario';
        //=========================================
        //Head de la página
        //=========================================
        //Css exclusivos de esta página
        $cssExtra = array(
            1 => 'dashboard'
        );
        $this->vista_head['titulo_seccion'] = 'HelpDesk - Ver Ticket';
        $this->vista_head['cssExtra'] = $cssExtra;
        $this->datos_vista['head'] = $this->load->view('generales/head_general', $this->vista_head, TRUE);

        //=========================================
        //Barra de navegación
        //=========================================        
        $this->vista_navbar['usuario'] = $this->datos_usuario->sNombreCompleto; //Enviamos el nombre del usuario
        $this->datos_vista['navbar'] = $this->load->view('generales/navbar_general', $this->vista_navbar, TRUE);

        //=========================================        
        //Contenido
        //========================================= 
        $comentarios['comentarios'] = $this->ticket_model->getVerTicket($idTicket);
        $datosTicket = $comentarios['comentarios'][0];
        if ($this->input->post('txaDescripcionComentario')) {
            if ($datosTicket->iStatus == 3) {
                $this->_registraPausaEstatusUsuario($datosTicket);
            }
            $this->_registraComentario($idTicket);
            redirect(base_url() . 'Panel-General/ver-ticket-usuario/' . $idTicket, 'refresh');
        }
        $comentarios['archivos'] = $this->ticket_model->getArchivosIncidencia($idTicket);
        $this->vista_contenido['sidebar'] = $this->load->view('generales/sidebar_PanelGeneral', $this->vista_sidebar, TRUE);
        $this->vista_contenido['historial'] = $this->load->view('PanelGeneral/parciales/Historial_Incidencia', $comentarios, TRUE);
        $this->vista_contenido['IdTicket'] = $idTicket;
        $this->vista_contenido['asunto'] = $datosTicket->sAsunto;
        $this->vista_contenido['status'] = $datosTicket->iStatus;
        $this->vista_contenido['tipoPausa'] = $datosTicket->iMotivoPausa;
        $this->datos_vista['contenido'] = $this->load->view($this->plantilla, $this->vista_contenido, TRUE);
        //=========================================        
        //footer
        //=========================================        
        //Scripts exclusivos de esta página
        if (($datosTicket->iStatus == 4) && !($this->ticket_model->getTicketCalificado($idTicket))) {
            $jsExtra = array(0 => 'muestraEncuesta');
        }
        $this->vista_footer['jsExtra'] = $jsExtra;
        $this->datos_vista['footer'] = $this->load->view('generales/footerJS_general', $this->vista_footer, TRUE);
        $this->load->view('General_vw', $this->datos_vista);
    }

    public function Ver_Ticket_Externo($enc = '') {
        if ($enc == '') {
            redirect('acceso');
        }
        $dec = $this->encryption->decode($enc);
        $datos = explode('|', $dec);
        if (!$this->user) {
            $user_data = $this->usuario_model->getUsuarioLogin($datos[1]);
            $this->session->set_userdata('logged_user', $user_data);
        }
        redirect(base_url() . 'Panel-General/ver-ticket-usuario/' . $datos[0]);
    }

    /* ============================== 
     * FUNCIONES PARA AJAX 
      /* ============================== */

    public function llena_cbxAsuntos() {
        //Esto asegura que sea enviado el tipo de servicio
        if (!$this->input->post('idDepartamento')) {
            redirect('404');
        }
        $data['asuntos'] = $this->ticket_model->getAsuntosDepto($this->input->post('idDepartamento'));
        echo $this->load->view('PanelGeneral/parciales/cbxAsuntos', $data, TRUE);
    }

    public function llena_tbl_bandeja() {
        //Esto asegura que sea enviado el tipo de servicio
        if (!$this->user) {
            redirect('acceso');
        }
        $datosBandeja['idDepartamento'] = $this->datos_usuario->idDepartamento;
        $datosBandeja['idAtiende'] = 1;
        $datosBandeja['iStatus'] = 1;
        $data['tickets'] = $this->ticket_model->getTickets($datosBandeja);
        echo $this->load->view('PanelGeneral/parciales/tbl_bandeja', $data, TRUE);
    }

    public function llena_tbl_abiertos() {
        //Esto asegura que sea enviado el tipo de servicio
        if (!$this->user) {
            redirect('acceso');
        }
        $datosAbiertos['iStatus >'] = 1;
        $datosAbiertos['iStatus <'] = 4;
        $datosAbiertos['idAtiende'] = $this->datos_usuario->idUsuario;
        $data['tickets'] = $this->ticket_model->getTickets($datosAbiertos);
        echo $this->load->view('PanelGeneral/parciales/tbl_abiertos', $data, TRUE);
    }

    public function llena_tbl_cerrados() {
        //Esto asegura que sea enviado el tipo de servicio
        if (!$this->user) {
            redirect('acceso');
        }
        $datosCerrados['iStatus'] = 4;
        $datosCerrados['idAtiende'] = $this->datos_usuario->idUsuario;
        $data['tickets'] = $this->ticket_model->getTickets($datosCerrados);
        echo $this->load->view('PanelGeneral/parciales/tbl_cerrados', $data, TRUE);
    }

    public function llena_tbl_abiertos_usr() {
        //Esto asegura que sea enviado el tipo de servicio
        if (!$this->user) {
            redirect('acceso');
        }
        $datosAbiertos['iStatus <'] = 4;
        $datosAbiertos['idSolicitante'] = $this->datos_usuario->idUsuario;
        $data['tickets'] = $this->ticket_model->getTickets($datosAbiertos);
        echo $this->load->view('PanelGeneral/parciales/tbl_abiertos_usr', $data, TRUE);
    }

    public function llena_tbl_cerrados_usr() {
        //Esto asegura que sea enviado el tipo de servicio
        if (!$this->user) {
            redirect('acceso');
        }
        $datosCerrados['iStatus'] = 4;
        $datosCerrados['idSolicitante'] = $this->datos_usuario->idUsuario;
        $data['tickets'] = $this->ticket_model->getTickets($datosCerrados);
        echo $this->load->view('PanelGeneral/parciales/tbl_cerrados_usr', $data, TRUE);
    }

    public function tomar_ticket() {
        //Esto asegura que sea enviado el tipo de servicio
        if (!$this->input->post('idIncidencia')) {
            redirect('404');
        }
        $idIncidencia = $this->input->post('idIncidencia');
        $idAtiende['idAtiende'] = $this->datos_usuario->idUsuario;
        $idAtiende['iStatus'] = 2;
        if ($this->ticket_model->asignaTicket($idIncidencia, $idAtiende)) {
            $status = "Ok";
            $msg = "El ticket esta bajo tu responsabilidad.";
        } else {
            $status = "error";
            $msg = "Error al asignar, intentelo de nuevo.";
        }
        echo json_encode(array('status' => $status, 'msg' => $msg));
    }

    public function calificar_servicio() {
        //Esto asegura que sea enviado el tipo de servicio
        if (!$this->input->post('iPuntaje')) {
            redirect('404');
        }
        $calificacion['idIncidencia'] = $this->input->post('idIncidencia');
        $calificacion['iPuntaje'] = $this->input->post('iPuntaje');
        $calificacion['sDescripcion'] = $this->input->post('sDescripcion');
        $calificacion['sHost'] = $this->input->ip_address();
        if ($this->ticket_model->calificaServicio($calificacion)) {
            $status = "Ok";
            $msg = "Gracias por tu calificación.";
        } else {
            $status = "error";
            $msg = "Error al calificar, intentelo de nuevo.";
        }
        echo json_encode(array('status' => $status, 'msg' => $msg));
    }

    public function Actualizar_Notificaciones() {
        if (!$this->input->post('iAccion')) {
            redirect('404');
        }
        $parametros['iAccion'] = $this->input->post('iAccion');
        if ($this->input->post('iAccion') == 5) {
            $parametros['iStatus < '] = 4;
            $parametros['iStatus > '] = 1;
        } else  {
            $parametros['iStatus'] = $this->input->post('iStatus');
        }
        if ($this->input->post('iAccion') != 1) {
            $parametros['idAtiende'] = $this->datos_usuario->idUsuario;
        }
        $parametros['idUsuario !='] = $this->datos_usuario->idUsuario;
        $parametros['idDepartamento'] = $this->datos_usuario->idDepartamento;
        $Notificaciones['Notificaciones'] = $this->ticket_model->getNotificacion($parametros);
        echo $this->load->view('generales/notificaciones_vw', $Notificaciones, TRUE);
    }

    /* ==============================
     * FUNCIONES PRIVADAS 
      /* ============================== */

    private function _subirAdjuntos($idComentario) {
        if ($_FILES) {
            $raiz_path = 'adjuntos/' . $this->datos_usuario->idUsuario;
            if (!file_exists($raiz_path)) {
                mkdir($raiz_path);
            }
            $config["upload_path"] = $raiz_path . '/';
            $config['allowed_types'] = ARCHIVOS_PERMITIDOS;
            $this->load->library('upload', $config);
            foreach ($_FILES as $nombreInput => $archivo) {
                if ($archivo['error'] == 0) {
                    $this->upload->do_upload($nombreInput);
                    $UploadData = $this->upload->data();
                    $datosArchivo['sRuta'] = $UploadData['file_path'];
                    $datosArchivo['sNombreArchivo'] = $UploadData['file_name'];
                    $datosArchivo['idComentario'] = $idComentario;
                    $this->ticket_model->insAdjunto($datosArchivo);
                }
            }
        }
    }

    private function _registraTicket() {
        if ($this->datos_usuario->iTipoUsuario == 4)
            $datos['idSolicitante'] = $this->datos_usuario->idUsuario;
        else
            $datos['idSolicitante'] = $this->input->post('cbxSolicitante');

        $datos['sDescripcion'] = nl2br($this->input->post('txaDescripcionProblema'));
        $datos['iServicio'] = $this->input->post('cbxAsuntos');
        $datos['sAsunto'] = $this->input->post('txbOtroServicio');
        $datos['sHost'] = $this->input->ip_address();
        //$datos['sHost'] = GetIp();
        $comentario1 = $this->ticket_model->insTicket($datos);
        if ($comentario1) {
            $this->_subirAdjuntos($comentario1);
            $idTicket = $this->ticket_model->getIdIncidenciaporComentario($comentario1);
            $direcciones = $this->ticket_model->getDatosIncidencia($idTicket);
            $datosBody['NombreUsuario'] = $direcciones->sSolicitante;
            $datosBody['folio'] = $idTicket;
            $llaveEnlace = $idTicket . '|' . $direcciones->sEmailSolicitante;
            $llaveEnlace = $this->encryption->encode($llaveEnlace);
            $datosBody['enlace'] = base_url() . 'Panel-General/Ver-Ticket-Externo/' . $llaveEnlace;
            $datosEmail['destinatario'] = $direcciones->sEmailSolicitante;
            $datosEmail['asunto'] = 'Ticket levantado';
            $datosEmail['body'] = $this->load->view('generales/emailRegsitroTicket', $datosBody, TRUE);
            $this->correo->enviaCorreo($datosEmail);
            $this->vista_contenido['idTicket'] = $idTicket;
            $this->datos_vista['contenido'] = $this->load->view('PanelGeneral/levantarSuccess', $this->vista_contenido, TRUE);
        } else {
            $this->vista_contenido['error'] = TRUE;
            $this->datos_vista['contenido'] = $this->load->view($this->plantilla, $this->vista_contenido, TRUE);
        }
    }

    private function _registraComentario($idTicket) {
        $datosComentario['idIncidencia'] = $idTicket;
        $datosComentario['idUsuario'] = $this->datos_usuario->idUsuario;
        $datosComentario['sDescripcion'] = nl2br($this->input->post('txaDescripcionComentario'));
        $datosComentario['sHost'] = $this->input->ip_address();
        $idComentario = $this->ticket_model->insComentario($datosComentario);
        if ($idComentario) {
            $this->_subirAdjuntos($idComentario);
            $this->ticket_model->insAccionBitacora($idTicket, $datosComentario['idUsuario'], 5);
        }
    }

    private function _registraPausaEstatusIngeniero($Ticket) {
        $direcciones = $this->ticket_model->getDatosIncidencia($Ticket->idIncidencia);
        $datosBody['NombreUsuario'] = $direcciones->sSolicitante;
        $datosBody['folio'] = $Ticket->idIncidencia;
        $datosBody['Atiende'] = $direcciones->sAtiende;
        $llaveEnlace = $Ticket->idIncidencia . '|' . $direcciones->sEmailSolicitante;
        $llaveEnlace = $this->encryption->encode($llaveEnlace);
        $datosBody['enlace'] = base_url() . 'Panel-General/Ver-Ticket-Externo/' . $llaveEnlace;
        $datosBody['comentario'] = nl2br($this->input->post('txaDescripcionComentario'));
        $datosEmail['destinatario'] = $direcciones->sEmailSolicitante;
        if ($Ticket->iStatus == 2) {
            $datosPausa['idIncidencia'] = $Ticket->idIncidencia;
            $datosPausa['iMotivoPausa'] = $this->input->post('cbxMotivoPausa');
            $this->ticket_model->insPausa($datosPausa);
            $this->ticket_model->upStatusIncidencia($Ticket->idIncidencia, 3);
            switch ($datosPausa['iMotivoPausa']) {
                case 1:
                    $this->ticket_model->insAccionBitacora($Ticket->idIncidencia, $this->datos_usuario->idUsuario, 3);
                    $datosEmail['asunto'] = 'Comentario agregado en ticket #' . $Ticket->idIncidencia;
                    $datosEmail['body'] = $this->load->view('generales/emailRespuestaUsuario', $datosBody, TRUE);
                    $this->correo->enviaCorreo($datosEmail);
                    break;
                case 2:
                    $this->ticket_model->insAccionBitacora($Ticket->idIncidencia, $this->datos_usuario->idUsuario, 4);
                    $datosEmail['asunto'] = 'Ticket #' . $Ticket->idIncidencia . ' notificado a Proveedor';
                    $datosEmail['body'] = $this->load->view('generales/emailRespuestaProveedor', $datosBody, TRUE);
                    $this->correo->enviaCorreo($datosEmail);
                    break;
                default:
                    $this->ticket_model->insAccionBitacora($Ticket->idIncidencia, $this->datos_usuario->idUsuario, 3);
                    break;
            }
        } elseif ($Ticket->iStatus == 3) {
            if ($Ticket->iMotivoPausa == 2) {
                $this->ticket_model->closePausa($Ticket->idIncidencia, $Ticket->iPausa);
                $datosPausa['idIncidencia'] = $Ticket->idIncidencia;
                $datosPausa['iMotivoPausa'] = 3;
                $this->ticket_model->insPausa($datosPausa);
                $this->ticket_model->insAccionBitacora($Ticket->idIncidencia, $this->datos_usuario->idUsuario, 3);
                $datosEmail['asunto'] = 'Ticket #' . $Ticket->idIncidencia . ' espera Vo. Bo.';
                $datosEmail['body'] = $this->load->view('generales/emailVoBoUsuario', $datosBody, TRUE);
                $this->correo->enviaCorreo($datosEmail);
            }
        }
    }

    private function _registraPausaEstatusUsuario($Ticket) {
//        $direcciones = $this->ticket_model->getDatosIncidencia($Ticket->idIncidencia);
//        $datosBody['NombreUsuario'] = $direcciones->sSolicitante;
//        $datosBody['folio'] = $Ticket->idIncidencia;
//        $datosBody['Atiende'] = $direcciones->sAtiende;
//        $datosBody['enlace'] = base_url() . 'Panel-General/ver-ticket-usuario/' . $Ticket->idIncidencia;
//        $datosBody['comentario'] = nl2br($this->input->post('txaDescripcionComentario'));
//        $datosEmail['destinatario'] = $direcciones->sEmailSolicitante;
        switch ($Ticket->iMotivoPausa) {
            case 1:
                $this->ticket_model->closePausa($Ticket->idIncidencia, $Ticket->iPausa);
                $this->ticket_model->upStatusIncidencia($Ticket->idIncidencia, 2);
                break;
            case 3:
                $respuesta = $this->input->post('cbxRespuestaUsuario');
                if ($respuesta == 0) {
                    $this->ticket_model->closePausa($Ticket->idIncidencia, $Ticket->iPausa);
                    $this->ticket_model->upStatusIncidencia($Ticket->idIncidencia, 2);
                } else {
                    $this->ticket_model->closePausa($Ticket->idIncidencia, $Ticket->iPausa);
                    $this->ticket_model->upStatusIncidencia($Ticket->idIncidencia, 4);
                    $this->ticket_model->insAccionBitacora($Ticket->idIncidencia, $this->datos_usuario->idUsuario, 7);
                    $this->ticket_model->closeIncidencia($Ticket->idIncidencia);
                }
                break;
            default:
                break;
        }
    }

}

/* Fin de archivo acceso.php */
/* UbicaciÃƒÂ³n: ./application/controllers/acceso.php */