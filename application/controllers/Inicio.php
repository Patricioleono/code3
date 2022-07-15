<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Inicio extends CI_Controller
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
		
		if($validar){
			$usuario = $_SESSION['cabcodigo'];
		//	$this->generarTokenUsuario($usuario);
			$this->load->view('template/cabecera', $usuario);
		}else{
			$usuario = null;
			$this->load->view('template/cabecera', $usuario);
		}

		$this->load->view('gestorDocumentos');
		$this->load->view('template/pieDePagina');
	}

	public function validar_usuario()
	{
		if(isset($_SESSION['cabcodigo'])){
			return true;
		}else{
			return false;
		}
	}



	//GENERAR TOKEN SEGÚN USER ID INICIADO SESSION
	public function generarTokenUsuario($idUsuario)
	{
		$idUsuario = $_SESSION['cabcodigo'];
		$url = 'http://10.5.225.24/api/index.php/auth/generarTokenUsuario/' . $idUsuario;
		$idToken = json_decode($this->restApi($url));

		$vista = array(
			"inicio" => $this->load->view('inicio', $idToken, true)
		);
	}


	public function cerrar()
	{
		$this->load->helper('url');
		//direccion vista salir
	}
	public function salir()
	{
		$this->load->helper('url');
		//direccion vista salir
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
