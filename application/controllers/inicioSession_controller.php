<?php
defined('BASEPATH') or exit('No direct script access allowed');

class inicioSession_controller extends CI_Controller
{

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */

	public function index()
	{
	/*
		$conn = $this->conectarOdbc();
		$query = "SELECT nombres, nombre2, apellpat, apellmat FROM sabst030 WHERE estado=1";
		$result = odbc_exec($conn, $query);
	while ($row = odbc_fetch_object($result)) {

			$row->nombreape = $row->nombres." " .$row->apellpat;
		}
	*/
	//	return $result;

	
		
		$this->load->view('template/cabecera');
    	$this->load->view('gestorDocumentos');
		$this->load->view('template/pieDePagina');
	}

	
}
