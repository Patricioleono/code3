<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Documentos_modelo extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function get_datos()
    {
        $result = array();

       $this->db->select('estado, tipo, folio, generadoFecha');
       $q = $this->db->get('docs');
       $result = $q->result_array();

       return $result;
    }
}
