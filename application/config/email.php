<?php 
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
$config['protocol'] = 'smtp';
$config['smtp_host'] = 'mail.dipimedia.com.mx';
$config['smtp_user'] = 'tester@dipimedia.com.mx';
$config['smtp_pass'] = 'H1r3m4iL';
//$config['smtp_host'] = 'mail.hircasa.com';
//$config['smtp_user'] = 'cmartinez@hircasa.com';
//$config['smtp_pass'] = 'Cm123!';
$config['smtp_port'] = 587;
$config['smtp_timeout'] = '60';
$config['charset']    = 'utf-8';
$config['newline']    = "\r\n";
$config['mailtype'] = 'html'; // or html
$config['validation'] = TRUE; // bool whether to validate email or not