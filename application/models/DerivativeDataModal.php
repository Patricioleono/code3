<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DerivativeDataModal extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('date');
	}

	public function add_DerivativeData($data)
	{
		$ip = $this->input->ip_address();

		if (!empty($data['comentarioDerivarDoc'])) {
			$derivativeData = array(
				'listaUsuarios' => $data['listaUsuarios'],
				'comentarioDerivarDoc' => $data['comentarioDerivarDoc'],
				'estadoDoc' => 2,
				'formKey' => $data['formKey'],
				'fecha' => date('Y-m-d H:i:s'),
				'quienDeriva' => $data['quienDeriva'],
				'codListaUser' => $data['codListaUser'],
				'quienDerivaCod' => $data['quienDerivaCod'],
				'ip' => $ip
			);
			//echo json_encode($derivativeData);
			$this->db->insert('derivarDoc', $derivativeData);

		} else {

			$data['comentarioDerivarDoc'] = "Sin registro";
			$derivativeData = array(
				'listaUsuarios' => $data['listaUsuarios'],
				'comentarioDerivarDoc' => $data['comentarioDerivarDoc'],
				'estadoDoc' => 2,
				'formKey' => $data['formKey'],
				'fecha' => date('Y-m-d H:i:s'),
				'quienDeriva' => $data['quienDeriva'],
				'codListaUser' => $data['codListaUser'],
				'quienDerivaCod' => $data['quienDerivaCod']
			);
			//echo json_encode($derivativeData);
			$this->db->insert('derivarDoc', $derivativeData);
		}
	}

	//second derivative
	public function get_SecondDerivative($id){
		$session = $_SESSION['cabcodigo'];
		//$this->db->distinct();
		$this->db->select('dd.listaUsuarios, dd.fecha, dd.quienDeriva, dd.quienDerivaCod, dd.codListaUser, dd.formKey, dd.id, usa.creadorCod, usa.userCreador, usa.userRecibe, usa.fecha, usa.creadorCod');
		$this->db->from('derivarDoc dd');
		$this->db->join('datosFormulario df', 'df.id = dd.formKey');
		$this->db->join('usuarios usa', 'usa.formKey = dd.formKey');
		//$this->db->where('quienDerivaCod', $session);
		$this->db->where('dd.formKey', $id);
		$this->db->order_by('dd.fecha', 'ASC');
		$data = $this->db->get();
		return $data->result_array();
	}
}
