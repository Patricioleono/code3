<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inicio extends CI_Controller
{
	public function __construct()
	{

		parent::__construct();
		$this->load->model('Documentos_modelo');
		$this->load->database();

	}


	public function index()
	{
		$validar = false;
		$validar = $this->validar_usuario();
		

		if ($validar) {
			$user = $_SESSION['cabcodigo'];

			$data = array(
				"usuario" => $this->generarTokenUsuario($user),
				"prueba" => $this->Documentos_modelo->get_datos()
			);

			$this->load->view('template/cabecera', $data);
			$this->load->view('gestorDocumentos');
			$this->load->view('template/pieDePagina');
		} else {
			$this->salir();
		}
	}
	public function salir()
	{
		$this->load->view('salir');
	}

	public function validar_usuario()
	{
		if (isset($_SESSION['cabcodigo'])) {
			return true;
		} else {
			return false;
		}
	}

	//GENERAR TOKEN SEGÚN USER ID INICIADO SESSION
	private function generarTokenUsuario($idUsuario)
	{
		$url = 'http://10.5.225.24/api/index.php/auth/generarTokenUsuario/' . $idUsuario;
		$result = json_decode($this->restApi($url));

		$idToken = $result->token;

		return $idToken;
	}

	//MÉTODO CURL PARA USAR API REST
	public function restApi($url)
	{
		$curl = curl_init();
		curl_setopt($curl, CURLOPT_URL, $url);
		curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
		curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);

		$result = curl_exec($curl);
		curl_close($curl);

		return $result;
	}


	//private function generarTokenUsuario(){
	//$id_usuario = $_SESSION['cabcodigo'];
	//	return "344324234324325345";		
	//	}

	/*
		$conn = $this->conectarOdbc();
		$query = "SELECT nombres, nombre2, apellpat, apellmat FROM sabst030 WHERE estado=1";
		$result = odbc_exec($conn, $query);
	while ($row = odbc_fetch_object($result)) {

			$row->nombreape = $row->nombres." " .$row->apellpat;
		}
	*/
	//	return $result;


	//$data = array(
	//	"tokenusuario" => $this->generarTokenUsuario()
	//);

}
