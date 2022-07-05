<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class inicioSession_model extends CI_Model {

    public function __construct()
    {
        $this->load->database();
    }

    //CONEXIÓN PHP_SAM
    public function conectarOdbc(){
        $odbc = "PHP_SAM";
        $user = "ssmsa";
        $pass = "sambops00";
        
        return odbc_pconnect($odbc, $user, $pass);
    }
}