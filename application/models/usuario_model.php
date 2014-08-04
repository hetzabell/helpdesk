<?php

if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Usuario_model extends CI_Model {

    protected $table;
    protected $id;

    function __construct() {
        parent::__construct();
        $this->table = 'usuarios_t';
        $this->id = 'idUsuario';
    }

    function getUsuarioLogin($email = '') {
        //Parametros de la consulta
        $parametros = array(
            'sEmail' => $email,
            'bActivo' => 1);

        //Ejecutamos la consulta y guardamos el resultado en la variable consulta
        $consulta = $this->db->get_where($this->table, $parametros);

        //Verificamos que exista registros con los parametros proporcionados
        //Si es asi retornamos la fila con el usuario
        //De lo contrario retornamos FALSE
        if ($consulta->num_rows() > 0) {
            return $consulta->row();
        } else {
            return FALSE;
        }
    }

    function getUsuarios($parametros = '') {
        $parametros['bActivo'] = 1;
        $consulta = $this->db->get_where($this->table, $parametros);

        if ($consulta->num_rows() > 0) {
            return $consulta->row();
        } else {
            return FALSE;
        }
    }

    function ExisteEmail($email = 'gir@hircasa.com') {
        $parametros = array('sEmail' => $email);
        $consulta = $this->db->get_where($this->table, $parametros);

        if ($consulta->num_rows() > 0) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    function getIngenierosActivos($parametros = '') {
        if(!$parametros == ''){
            $consulta = $this->db->get_where('vw_ingenierosservicio', $parametros);
        }  else {
            $consulta = $this->db->get('vw_ingenierosservicio');
        }
        
        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        } else {
            return FALSE;
        }
    }

    function altaUsuario($datos) {
        if ($this->db->insert('Usuarios_T', $datos)) {
            return $datos['sActivacion'];
        } else {
            return FALSE;
        }
    }

    function activaUsuario($llave) {
        $filtro['sActivacion'] = $llave;
        $filtro['bActivo'] = 0;
        $consulta = $this->db->get_where('usuarios_t', $filtro);
        if ($consulta->num_rows() > 0) {
            $idUsuario = $consulta->row()->idUsuario;
            $this->db->set('tFechaActivacion', 'NOW()', FALSE);
            $activar['bActivo'] = 1;
            $parametos['idUsuario'] = $idUsuario;
            $this->db->where($parametos);
            if ($this->db->update('usuarios_t', $activar)) {
                return $idUsuario;
            } else {
                return 'Error';
            }
        } else {
            return FALSE;
        }
    }

    function getUsuariosCombo($idUsuario = 1) {
        $param = array(1, $idUsuario);
        $this->db->where_not_in($this->id, $param);
        $consulta = $this->db->get($this->table);
        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        } else {
            return FALSE;
        }
    }

    function getSucursales() {
        $parametros['bActivo'] = 1;
        $this->db->order_by('idSucursal', 'asc');

        $consulta = $this->db->get_where('sucursales_t', $parametros);

        //Verificamos que exista registros con los parametros proporcionados
        //Si es asi retornamos la fila con el usuario
        //De lo contrario retornamos FALSE
        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        } else {
            return FALSE;
        }
    }

    function getAreas($parametros) {
        $parametros['bActivo'] = 1;
        $this->db->order_by('sNombreArea', 'asc');
        $consulta = $this->db->get_where('areas_t', $parametros);
        if ($consulta->num_rows() > 0) {
            return $consulta->result();
        } else {
            return FALSE;
        }
    }

    function upUsuario($parametros, $id) {
        $this->db->where('idUsuario', $id);
        $query = $this->db->update('usuarios_t', $parametros);
        return $query;
    }

}
