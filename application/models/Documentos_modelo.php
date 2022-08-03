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
            'extensionDoc' => $result['extension'],
            'formularioId' => $result['id']
        );
        $this->db->insert('documentoAdjunto', $data);
        $id = $this->db->insert_id();
        return $id;
    }
}
