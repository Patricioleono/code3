<?php
defined('BASEPATH') OR exit('No direct script access allowed');


class inicio_modelo extends CI_Model {

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    
    //CONEXIÓN INFORMIX
    public function conectarOdbc(){
        $odbc = "PHP_SAM";
        $user = "ssmsa";
        $pass = "sambops00";
        
        return odbc_pconnect($odbc, $user, $pass);
    }

}