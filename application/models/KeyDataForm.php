<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class KeyDataForm extends CI_Model {
	public function __construct() {
		parent::__construct();
		$this->load->database();
		$this->load->helper('date');
	}

	public function add_UserFormKey($userKey){
		$data = array(
			'creadorCod' => $userKey['creadorCod'],
			'formularioKey' => $userKey['formularioKey'],
			'fecha' => date('Y-m-d H:i:s')
		);
		$this->db->insert('puenteDatosForm_DocAdjunto', $data);
	}
}
