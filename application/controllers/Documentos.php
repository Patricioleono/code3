<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Documentos extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
       
    }

    public function index()
    {
        $validar = false;
        $validar = $this->validar_usuario();

        if ($validar) {

           

            $this->load->view('template/cabecera');
            $this->load->view('gestorDocumentos');
            $this->load->view('template/pieDePagina');
        } else {
            $this->salir();
        }
    }


    public function validar_usuario()
    {
        if (isset($_SESSION['cabcodigo'])) {
            return true;
        } else {
            return false;
        }
    }

    public function salir()
    {
        $this->load->view('salir');
    }
}
