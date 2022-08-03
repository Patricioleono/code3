<?php
defined('BASEPATH') or exit('No direct script access allowed');


class PuenteDatos_modelo extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
    }
    public function userPuenteForm($data)
    {

        $dInsert = array(
            'creadorCod' => $data['creadorCod'],
            'formularioKey' => $data['formularioKey'],
            'fecha' => date('Y-m-d H:m:s')
        );
        $this->db->insert('puenteDatosForm_DocAdjunto', $dInsert);
    }
   
}
