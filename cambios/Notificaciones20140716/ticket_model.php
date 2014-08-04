<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Ticket_model extends CI_Model {
    /*
      Constructor del modelo, aqui establecemos
      que tabla utilizamos y cual es su llave primaria.
     */

    function __construct() {
        parent::__construct();
    }

    /*
      Función que regresa los servicio por departamento
     */

    function getAsuntosDepto($depto = '') {
        //Parametros de la consulta
        $parametros['idDepartamento'] = $depto;
        $this->db->order_by('idServicio', 'desc');
        //Ejecutamos la consulta y guardamos el resultado en la variable consulta
        $consulta = $this->db->get_where('servicios_t', $parametros);

        //Verificamos que exista registros con los parametros proporcionados
        //Si es asi retornamos la fila con el usuario
        //De lo contrario retornamos FALSE
        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        } else {
            return FALSE;
        }
    }

    /*
      Función que regresa los servicio por departamento
     */

    function getMotivosPausas() {
        //Parametros de la consulta
        $parametros['bActivo'] = 1;
        $this->db->order_by('idMotivoPausa', 'asc');
        //Ejecutamos la consulta y guardamos el resultado en la variable consulta
        $consulta = $this->db->get_where('motivopausas_t', $parametros);

        //Verificamos que exista registros con los parametros proporcionados
        //Si es asi retornamos la fila con el usuario
        //De lo contrario retornamos FALSE
        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        } else {
            return FALSE;
        }
    }

    /*
      Función que regresa los tickets segun parametros
     */

    function getTickets($datos = '') {
        //Parametros de la consulta
        if ($datos == '') {
            $datos['idAtiende'] = 1;
        }
        $this->db->order_by('idIncidencia', 'asc');
        //Ejecutamos la consulta y guardamos el resultado en la variable consulta
        $consulta = $this->db->get_where('vw_Tickets', $datos);

        //Verificamos que exista registros con los parametros proporcionados
        //Si es asi retornamos la fila con el usuario
        //De lo contrario retornamos FALSE
        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        } else {
            return FALSE;
        }
    }

    /*
      Registra el  ticket y sus elementos relacionados
     */

    function insAccionBitacora($idIncidencia, $idUsuario, $idAccion) {
        $datosBitacora['idIncidencia'] = $idIncidencia;
        $datosBitacora['idUsuario'] = $idUsuario;
        $datosBitacora['iAccion'] = $idAccion;
        return $this->db->insert('BitacoraAcciones_T', $datosBitacora);
    }

    /*
      Registra el  ticket y sus elementos relacionados
     */

    function insTicket($datos) {
        /*
         * Preparamos el arreglo para insertar los datos
         */
        $datosIncidencia['idSolicitante'] = $datos['idSolicitante'];
        $datosIncidencia['iServicio'] = $datos['iServicio'];
        $datosIncidencia['sAsunto'] = $datos['sAsunto'];
        $datosIncidencia['sHost'] = $datos['sHost'];
        /* Registramos el ticket en la tabla incidencias */
        if ($this->db->insert('Incidencias_T', $datosIncidencia)) {
            /*
             * Preparamos el arreglo para insertar el primer comentario
             * de la incidencia
             */
            $datosComentario['idIncidencia'] = $this->db->insert_id();
            $datosComentario['idUsuario'] = $datos['idSolicitante'];
            $datosComentario['sDescripcion'] = $datos['sDescripcion'];
            $datosComentario['sHost'] = $datos['sHost'];
            $resultado = $this->insAccionBitacora($datosComentario['idIncidencia'], $datosComentario['idUsuario'], 1);
            /* Registramos el comentario en la tabla comentarios */
            $resultado = $this->insComentario($datosComentario);
        } else {
            $resultado = FALSE;
        }
        return $resultado;
    }

    /*
      Registra un comentario
     */

    function insComentario($datosComentario) {
        /* Registramos el comentario en la tabla comentarios */
        $this->db->insert('Comentarios_T', $datosComentario);
        return $this->db->insert_id();
    }

    /*
      Registro de subida de archivos
     */

    function insAdjunto($datosArchivo) {
        /* Registramos ruta y fecha del archivo adjunto */
        return $this->db->insert('Archivos_T', $datosArchivo);
    }

    /*
      Registra una pausa
     */

    function insPausa($datosPausa) {
        $this->db->select_max('iPausa');
        $numeroPausa = $this->db->get_where('pausas_t', array('idIncidencia' => $datosPausa['idIncidencia']))->row();
        $datosPausa['iPausa'] = $numeroPausa->iPausa + 1;
        return $this->db->insert('pausas_t', $datosPausa);
    }

    /*
      Cambia estatus de la incidencia
     */

    function upStatusIncidencia($idIncidencia, $status) {
        $nuevoStatus['iStatus'] = $status;
        $this->db->where('idIncidencia', $idIncidencia);
        $query = $this->db->update('incidencias_t', $nuevoStatus);
        return $query;
    }

    /*
      Cierra la pausa
     */

    function closePausa($idIncidencia, $iPausa) {
        $this->db->set('tFechaFinal', 'NOW()', FALSE);
        $parametos['idIncidencia'] = $idIncidencia;
        $parametos['iPausa'] = $iPausa;
        $this->db->where($parametos);
        $query = $this->db->update('pausas_t');
        return $query;
    }

    /*
      Cierra la pausa
     */

    function closeIncidencia($idIncidencia) {
        $this->db->set('tFechaCierre', 'NOW()', FALSE);
        $parametos['idIncidencia'] = $idIncidencia;
        $this->db->where($parametos);
        $query = $this->db->update('incidencias_t');
        return $query;
    }

    /*
     * Asigna ticket a un Ingeniero de servicio
     */

    function asignaTicket($idIncidencia, $idUsuario) {
        $this->db->set('tFechaAsignacion', 'NOW()', FALSE);
        $this->db->where('idIncidencia', $idIncidencia);
        $query = $this->db->update('incidencias_t', $idUsuario);
        if ($query) {
            return $this->insAccionBitacora($idIncidencia, $idUsuario['idAtiende'], 2);
        } else {
            return $query;
        }
    }

    /*
     * Ver historial del ticket
     */

    function getVerTicket($idIncidencia) {
        $datos['idIncidencia'] = $idIncidencia;
        $consulta = $this->db->get_where('vw_VerTicket', $datos);
        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        } else {
            return FALSE;
        }
    }

    function getArchivosIncidencia($idIncidencia) {
        $datos['idIncidencia'] = $idIncidencia;
        $consulta = $this->db->get_where('vw_ComentariosArchivos', $datos);
        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        } else {
            return FALSE;
        }
    }

    function getIdIncidenciaporComentario($idComentario) {
        $datos['idComentario'] = $idComentario;
        $consulta = $this->db->get_where('comentarios_t', $datos);
        if ($consulta->num_rows() > 0) {
            return $consulta->row()->idIncidencia;
        } else {
            return FALSE;
        }
    }

    function getDatosIncidencia($idIncidencia) {
        $datos['idIncidencia'] = $idIncidencia;
        $consulta = $this->db->get_where('vw_datosemail', $datos);
        if ($consulta->num_rows() > 0) {
            return $consulta->row();
        } else {
            return FALSE;
        }
    }

    function calificaServicio($datos) {
        return $this->db->insert('Opiniones_T', $datos);
    }

    function getTicketCalificado($idIncidencia) {
        $parametros['idIncidencia'] = $idIncidencia;
        $consulta = $this->db->get_where('opiniones_t', $parametros);
        if ($consulta->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    /*
     * Alertas de nuevos cometarios, Ticket Nuevo, Cierre de Tikect
     */

    function getNotificacion($Parametros) {
        $consulta = $this->db->get_where('vw_Notificaciones', $Parametros);
        if ($consulta->num_rows() > 0) {
            return $consulta;
        }
        else{
            return FALSE;
        }
    }

}
