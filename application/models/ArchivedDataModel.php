<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ArchivedDataModel extends CI_Model
{
	public function __construct(){
		parent::__construct();
		$this->load->database();
	}

	public function get_JoinData($id){
		$this->db->select('df.id, df.comentario, df.asunto, df.folio, df.tipoDoc, dd.comentarioDerivarDoc, dd.fecha');

		$this->db->from('datosFormulario df');
		$this->db->join('derivarDoc dd', 'dd.formKey = df.id');
		
		$this->db->where('df.id', $id);
		$this->db->where('dd.formKey', $id);
		$this->db->order_by('dd.id');
		$data = $this->db->get();
		return $data->result_array();
	}
}
