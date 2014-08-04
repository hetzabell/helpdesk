<?php

if (!defined('BASEPATH'))
    exit('No direct script access allowed');

if (!function_exists('GetIP')) {

    function GetIp() {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if (getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if (getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if (getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if (getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if (getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }

}

if (!function_exists('nombre_mes')) {

    function nombre_mes($num) {
        $nomb_mes = "";
        $num = intval($num);
        switch ($num) {
            case 1:
                $nomb_mes = "Enero";
                break;
            case 2:
                $nomb_mes = "Febrero";
                break;
            case 3:
                $nomb_mes = "Marzo";
                break;
            case 4:
                $nomb_mes = "Abril";
                break;
            case 5:
                $nomb_mes = "Mayo";
                break;
            case 6:
                $nomb_mes = "Junio";
                break;
            case 7:
                $nomb_mes = "Julio";
                break;
            case 8:
                $nomb_mes = "Agosto";
                break;
            case 9:
                $nomb_mes = "Septiembre";
                break;
            case 10:
                $nomb_mes = "Octubre";
                break;
            case 11:
                $nomb_mes = "Noviembre";
                break;
            case 12:
                $nomb_mes = "Diciembre";
                break;
        }
        return $nomb_mes;
    }

//function	
}//la funcion existe

if (!function_exists('validaDominio')) {

    function dominioValido($email) {
        $dominio = strstr($email, '@');
        if (!($dominio == '@hircasa.com') && !($dominio == 'sucursaleshircasa.com')) {
            return FALSE;
        }
        return TRUE;
    }

}

//Funcion para presentar notificaciones solo a los tipos usuario indicados

if (!function_exists('muestraNotificaciones')) {

    function muestraNotificaciones($jsExtra, $tipoUsuario) {
        switch ($tipoUsuario) {
            case 2:
            case 3:
                $jsExtra['notifica'] = 'notificaciones';
                break;
            default:
                break;
        }
        return $jsExtra;
    }

}

if (!function_exists('sanear_string')) {

    /**
     * Reemplaza todos los acentos por sus equivalentes sin ellos
     *
     * @param $string
     *  string la cadena a sanear
     *
     * @return $string
     *  string saneada
     */
    function sanear_string($string) {

        $string = trim($string);

        $string = str_replace(
                array('á', 'à', 'ä', 'â', 'ª', 'Á', 'À', 'Â', 'Ä'), array('a', 'a', 'a', 'a', 'a', 'A', 'A', 'A', 'A'), $string
        );

        $string = str_replace(
                array('é', 'è', 'ë', 'ê', 'É', 'È', 'Ê', 'Ë'), array('e', 'e', 'e', 'e', 'E', 'E', 'E', 'E'), $string
        );

        $string = str_replace(
                array('í', 'ì', 'ï', 'î', 'Í', 'Ì', 'Ï', 'Î'), array('i', 'i', 'i', 'i', 'I', 'I', 'I', 'I'), $string
        );

        $string = str_replace(
                array('ó', 'ò', 'ö', 'ô', 'Ó', 'Ò', 'Ö', 'Ô'), array('o', 'o', 'o', 'o', 'O', 'O', 'O', 'O'), $string
        );

        $string = str_replace(
                array('ú', 'ù', 'ü', 'û', 'Ú', 'Ù', 'Û', 'Ü'), array('u', 'u', 'u', 'u', 'U', 'U', 'U', 'U'), $string
        );

        $string = str_replace(
                array('ñ', 'Ñ', 'ç', 'Ç'), array('ni', 'NI', 'c', 'C',), $string
        );

        //Esta parte se encarga de eliminar cualquier caracter extraño
        $string = str_replace(
                array("\\", "¨", "º", "-", "~",
            "#", "@", "|", "!", "\"",
            "·", "$", "%", "&", "/",
            "(", ")", "?", "'", "¡",
            "¿", "[", "^", "`", "]",
            "+", "}", "{", "¨", "´",
            ">", "< ", ";", ",", ":"), '', $string
        );


        return $string;
    }

}