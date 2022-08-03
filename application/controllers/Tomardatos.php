<?php
defined('BASEPATH') or exit('No direct script access allowed');


class Tomardatos extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->helper('date');
        $this->load->model('TomarDatos_modelo');
    }

    public function tomarDatos(){
        $datos = $this->TomarDatos_modelo->obtenerTodo();
        echo json_encode($datos);
    }
}