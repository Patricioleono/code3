<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Formulario_modelo extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }
   
    public function formData($datosForm)
    {
        $data = array(
            'comentario' => $datosForm['comentario'],
            'asunto' => $datosForm['asunto'],
            'folio' => $datosForm['folio'],
            'tipoDoc' => $datosForm['tipoDoc']
        );
        $this->db->insert('datosFormulario', $data);
        $retId = $this->db->insert_id(); //retorna el id de tabla datosForm
        return $retId;
    }
 
}
