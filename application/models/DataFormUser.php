<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataFormUser extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();
		$this->load->helper('date');
	}

	public function add_DataFormUser($user)
	{
		if (empty($user)) {
			return $data = 'sin datos verificar';
		} else {
			$data = array(
				'userCreador' => $user['completeName'],
				'creadorCod' => $user['loginCod'],
				'userRecibe' => $user['userRecibe'],
				'recibeCod' => $user['recibeCod'],
				'formKey' => $user['formKey'],
				'fecha' => date('Y-m-d H:i:s')
			);
			$this->db->insert('usuarios', $data);
		}

	}

	public function get_SendData($codSession)
	{
		$this->db->distinct();
		$this->db->select('df.id');
		$this->db->from('datosFormulario df');
		$this->db->join('usuarios u', 'df.id = u.formKey');
		$this->db->where('u.creadorCod', $codSession);
		$result = $this->db->get();

		return $result->result_array();
	}
	public function get_RecibeData($codSession){
		$this->db->distinct();
		$this->db->select('df.id');
		$this->db->from('datosFormulario df');
		$this->db->join('usuarios u', 'df.id = u.formKey');
		$this->db->where('u.creadorCod !=', $codSession);
		$result = $this->db->get();

		return $result->result_array();
	}

}
