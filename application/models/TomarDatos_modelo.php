<?php
defined('BASEPATH') or exit('No direct script access allowed');


class TomarDatos_modelo extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
    public function obtenerTodo()
    {
        $this->db->select('tipoDoc, asunto, comentario, folio');
        $this->db->from('datosFormulario');
        $result = $this->db->get();

     
        return $result->result_array();
    }
}
