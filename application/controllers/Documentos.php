<?php

use function PHPSTORM_META\map;

defined('BASEPATH') or exit('No direct script access allowed');

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
    public function tratarDatos(){
         //libreria funcionamiento datos
         $estado = "";
         $msg = "";

        $config['upload_path'] = '<?= base_url();?>'+'uploads';
        $config['allowed_types'] = 'gif|jpeg|jpg|rar|zip|doc|docx|pdf|txt';
        $config['max_size'] = 1024 * 5;
        $config['encrypt_name'] = TRUE;
        $this->load->library('upload', $config);

        $data = array(
            'asunto' => $this->input->post('asunto'),
            'folio' => $this->input->post('folio'),
            'tipoDoc' => $this->input->post('tipoDoc'),
            'comentario' => $this->input->post('comentario'),
            'unAdjunto' => $this->input->post('unAdjunto')
        );
        $documento = $data['unAdjunto'];

        if(!$this->upload->do_upload($documento)){
                $status = 'error';
                $msg = $this->upload->display_errors('', '');
        }else {
            $data = $this->upload->data();
            $status = "success";
            $msg = "subido correctamente";
        }
        echo json_encode(array(
            'status' => $status,
            'msg' => $msg
        ));

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
