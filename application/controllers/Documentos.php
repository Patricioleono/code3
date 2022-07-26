<?php defined('BASEPATH') or exit('No direct script access allowed');

class Documentos extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Documentos_modelo');
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
    public function soloAjax(){
       var_dump($_POST);
       var_dump($_FILES);
    }
    public function tratarDatos()
    {
        $archivos = array();
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx';
        $cpt = count($_FILES);
        for ($i = 0; $i < $cpt; $i++) {

            $this->load->library('uploads', $config);
            $this->upload->initialize($config);

            $name_file = $_FILES['archivo']['name'][$i];
            $name_file = preg_replace('/([^.a-z0-9]+)/i', '_', $name_file);
            $_FILES['archivo2'] = array();
            $_FILES['archivo2']['name'] = $name_file;
            $_FILES['archivo2']['type'] = $_FILES['archivo']['type'][$i];
            $_FILES['archivo2']['tmp_name'] = $_FILES['archivo']['tmp_name'][$i];
            $_FILES['archivo2']['error'] = $_FILES['archivo']['error'][$i];
            $_FILES['archivo2']['size'] = $_FILES['archivo']['size'][$i];

            if (!$this->upload->do_upload('archivo2')) {
                $error = array('error' => $this->upload->display_errors());
                $ret['result'] = 0;
                $ret['message'] = $error;
            } else {
                $upload_data = $this->upload->data();
                array_push($archivos, array(
                    "nombre" => $upload_data['file_name'],
                    "tipo" => $upload_data['file_ext']
                ));
            }
            $result =  json_encode($archivos);
        }
        echo $result;
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
