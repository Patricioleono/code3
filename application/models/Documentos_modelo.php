<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Documentos_modelo extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
    }

    public function insertDocument($result)
    {
        $data = array(
            'nombreDoc' => $result['archivo'],
            'fechaCreado' => date('Y-m-d H:i:s'),
            'extension' => $result['extension']
           
        );
  
        $this->db->insert('documentos', $data);
    }

   
    public function formData($datosForm)
    {
        $data = array(
            'asunto' => $datosForm['asunto'],
            'numeroFolio' => $datosForm['folio'],
            'tipoDoc' => $datosForm['tipoDoc'],
            'comentario' => $datosForm['comentario']
        );
        $this->db->insert('documentos', $data);
    }
}
