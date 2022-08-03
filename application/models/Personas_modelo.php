<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Personas_modelo extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function userDatosForm($data)
    {

        $user = array(
            'userCreador' => $data['nombreUser'],
            'creadorCod' => $data['creadorCod'],
            'userRecibe' => $data['userRecibe'],
            'recibeCod' => $data['recibeCod']
        );
        $this->db->insert('usuarios', $user);
    }
}
