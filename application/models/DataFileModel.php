<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataFileModel extends CI_Model
{
	public function __construct()
	{
		parent::__construct();
		$this->load->database();

	}

	public function update_StatusDoc($status, $idForm)
	{
		$this->db->set('estado', $status);
		$this->db->where('formularioId', $idForm);
		$this->db->update('documentoAdjunto');

	}

	public function add_Document($doc)
	{
		$data = array(
			'nombreDoc' => $doc['file'],
			'extensionDoc' => $doc['extension'],
			'formularioId' => $doc['id'],
			'estado' => $doc['estado']
		);
		$this->db->insert('documentoAdjunto', $data);
		$retId = $this->db->insert_id();
		return $retId;
	}
	public function add_DocStats($doc)
	{
		$data = array(
			'nombreDoc' => $doc['file'],
			'extensionDoc' => $doc['extension'],
			'formularioId' => $doc['id'],
			'estado' => $doc['estado']
		);
		$this->db->insert('documentoAdjunto', $data);
		$retId = $this->db->insert_id();
		return $retId;
	}
	public function add_Condition(){
		$this->db->set('estado');
		$this->db->where('formularioId');
		$this->db->update('documentoAdjunto');
	}
	public function get_EditDoc($id){
		$this->db->select('nombreDoc, formularioId, extensionDoc');
		$this->db->from('documentoAdjunto');
		$this->db->where('formularioId', $id);
		$data = $this->db->get();
		return $data->result_array();
	}

	public function get_DocDataSend($fId)
	{
		$this->db->distinct();
		$this->db->select('da.nombreDoc, da.extensionDoc, da.formularioId');
		$this->db->from('documentoAdjunto da');
		$this->db->join('usuarios u', 'da.formularioId = u.formKey');
		$this->db->where('da.formularioId', $fId);
		$ret = $this->db->get();
		return $ret->result_array();
	}

	public function get_TracingData($id){
		$this->db->distinct();
		$this->db->select('comentario, asunto, folio, tipoDoc, id');
		$this->db->from('datosFormulario');
		$this->db->where('id', $id);

		//$this->db->where();
		$ret = $this->db->get();
		return $ret->result_array();

	}
	public function get_DocDataTracing($id){
		return $data = $this->get_EditDoc($id);
	}

}
