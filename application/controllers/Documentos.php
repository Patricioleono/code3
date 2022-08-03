<?php defined('BASEPATH') or exit('No direct script access allowed');

class Documentos extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->database();
        $this->load->model('Documentos_modelo');
        $this->load->model('Formulario_modelo');
        $this->load->model('Personas_modelo');
        $this->load->model('PuenteDatos_modelo');
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
    public function formAjax()
    {
        
        $asunto = $this->input->post('asunto');
        $folio = $this->input->post('folio');
        $tipoDoc = $this->input->post('tipoDoc');
        $comentario = $this->input->post('comentario');
        $datosForm = array(
            'asunto' => $asunto,
            'folio' =>  $folio,
            'tipoDoc' => strtoupper($tipoDoc),
            'comentario' => $comentario
        );
        $formularioKey = $this->Formulario_modelo->formData($datosForm);
        echo json_encode($formularioKey);


    }

    public function tratarDoc()
    {

        $recuperarId = $this->input->post('retornarId');

        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'gif|jpg|png|pdf|doc|docx';
        $cpt = count($_FILES);
        for ($i = 0; $i < $cpt; $i++) {

            $this->load->library('upload', $config);
            $this->upload->initialize($config);

            $name_file = $_FILES['file']['name'][$i];
            $name_file = preg_replace('/([^.a-z0-9]+)/i', '_', $name_file);
            $_FILES['file2'] = array();
            $_FILES['file2']['name'] = $name_file;
            $_FILES['file2']['type'] = $_FILES['file']['type'][$i];
            $_FILES['file2']['tmp_name'] = $_FILES['file']['tmp_name'][$i];
            $_FILES['file2']['error'] = $_FILES['file']['error'][$i];
            $_FILES['file2']['size'] = $_FILES['file']['size'][$i];

            if (!$this->upload->do_upload('file2')) {
                $error = array('error' => $this->upload->display_errors());
                $ret['result'] = 0;
                $ret['message'] = $error;
            } else {
                $upload_data = $this->upload->data();
                $result = array(
                    'archivo' => strtoupper($upload_data['file_name']),
                    'extension' => strtoupper(pathinfo($upload_data['file_name'], PATHINFO_EXTENSION)),
                    'id' => $recuperarId
                );
                $returnId = $this->Documentos_modelo->insertDocument($result);
                echo json_encode($returnId);
            }
        }
    }
    public function tratarPersonas()
    {
        $retornarId = $this->input->post('btn');
        var_dump($retornarId);


        $nombreUsuario = $_SESSION['cabnombre'] . " " . $_SESSION['cabapellido'];
        $cabecera = $_SESSION['cabcodigo'];
        // $formularioId = $this->Documentos_modelo->documentoId();

        //RECORRER Y RETORNAR IDS
        $userDatos = $this->input->post('usuario');
        //   echo json_encode($formularioId);

        for ($i = 0; $i < count($userDatos); $i++) {
            $idLista = $userDatos[$i]['value'];
            $nombreLista = $userDatos[$i]['label'];
            if ($userDatos > 0) {
                $datosUsuarios = array(
                    'nombreUser' => $nombreUsuario,
                    'creadorCod' => $cabecera,
                    'userRecibe' => $nombreLista,
                    'recibeCod' => $idLista
                );
                $this->Personas_modelo->userDatosForm($datosUsuarios);

                $puenteUserDoc = array(
                    'creadorCod' => $cabecera,
                    'recibeCod' => $idLista,
                    'formularioKey' =>  $retornarId
                );
                $this->PuenteDatos_modelo->userPuenteForm($puenteUserDoc);
                //insertar ids en puenteDatos
            } else {
                echo "NO EXISTE LISTA DE USUARIOS PARA ENVIAR DOCUMENTOS";
            }
            //  echo json_encode($idUserDatos);
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
