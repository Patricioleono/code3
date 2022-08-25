<?php
defined('BASEPATH') or exit('No direct script access allowed');


class FormModel extends CI_model
{

	public function __construct()
	{
		parent::__construct();
		$this->load->database();
	}
	public function get_OnlyId($id){
		$this->db->select('id');
		$this->db->where('id', $id);
		$this->db->from('datosFormulario');
		$result = $this->db->get();
		return $result->result_array();

	}
	public function get_RevisedDoc(){
		$this->db->select('*');
		$this->db->from('datosFormulario f');
		$this->db->join('documentoAdjunto a', 'a.formularioId = f.id');
		$this->db->where('a.estado = 1');
		$result = $this->db->get();
		return $result->result_array();

	}
	public function get_MainNode($id){

		$this->db->distinct();
		$this->db->select('form.id, tipoDoc, asunto, comentario, folio, doc.nombreDoc, doc.extensionDoc, users.fecha');
		$this->db->from('datosFormulario form');
		$this->db->join('documentoAdjunto doc', 'doc.formularioId = form.id');
		$this->db->join('usuarios users','doc.formularioId = users.formKey');
		$this->db->where('users.creadorCod = ', $id);
		//$this->db->where('doc.estado = 1');
		$result = $this->db->get();
		return $result->result_array();
	}
	public function get_AllData()
	{
		$this->db->distinct();
		$this->db->select('form.id, tipoDoc, asunto, comentario, folio, doc.nombreDoc');
		$this->db->from('datosFormulario form');
		$this->db->join('documentoAdjunto doc', 'doc.formularioId = form.id');
		$this->db->where('doc.estado = 1');
		$result = $this->db->get();
		return $result->result_array();
	}
	//edit data
	public function get_EditData($data){
		return $allData = self::get_AllDataFromTables($data);
	}
//all data
	public function get_AllDataFromTables($dataId)
	{
		$this->db->distinct();
		$this->db->select('u.fecha, u.userCreador, u.creadorCod, u.recibeCod, df.comentario, df.asunto, df.folio, df.tipoDoc, da.nombreDoc, da.extensionDoc');
		$this->db->from('usuarios u');
		$this->db->join('datosFormulario df', 'df.id = u.formKey');
		$this->db->join('documentoAdjunto da', 'da.formularioId = u.formKey');
		$this->db->where('df.id', $dataId);
		$this->db->limit(1);
		$result = $this->db->get();
		return $result->result_array();
	}
	//only user
	public function get_UserData($key){
		$this->db->distinct();
		$this->db->select('userCreador, creadorCod, userRecibe, recibeCod,');
		$this->db->from('usuarios');
		$this->db->where('formKey', $key);
		//$this->db->limit(1);
		$result = $this->db->get();
		return $result->result_array();
	}
	public function get_IdForm($key){
		$this->db->select('formKey');
		$this->db->from('usuarios');
		$this->db->where('formKey', $key);
		$result = $this->db->get();
		return $result->result_array();
	}


	//call only important doc
	public function get_Important()
	{
		$this->db->select('tipoDoc');
		$this->db->from('datosFormulario');
		$this->db->where('tipoDoc', 'IMPORTANTE');
		$result = $this->db->get();

		return $result->result_array();
	}

	//call all doc
	public function get_AllDocuments($user)
	{
		$this->db->select('*');
		$this->db->from('datosFormulario datos');
		$this->db->join('usuarios use', 'use.formKey = datos.id');
		$this->db->where('use.creadorCod', $user);
		$result = $this->db->get();

		return $result->result_array();
	}

	public function add_DataForm($form)
	{
		if(empty($form)){
			return $data = 'Error, Sin Datos';
		}else{
			$data = array(
				'comentario' => $form['comment'],
				'asunto' => $form['affair'],
				'folio' => $form['invoice'],
				'tipoDoc' => $form['docType']
			);
			$this->db->insert('datosFormulario', $data);
			$idForm = $this->db->insert_id();
			return $idForm;
		}

	}

	//update data from form
	public function update_DataEdit($data, $id){
		if(empty($data)){
			echo 'Error, Sin Datos';
		}else{
			$data = array(
				'comentario' => $data['editComentario'],
				'asunto' => $data['editAsunto'],
				'folio' => $data['editFolio'],
				'tipoDoc' => strtoupper($data['editType'])
			);
			$this->db->set($data);
			$this->db->where('id', $id);
			$this->db->update('datosFormulario');
		}
	}

	public function get_UserDate($idDoc){
		$this->db->distinct();
		$this->db->select('usa.userCreador, usa.userRecibe, usa.fecha, usa.creadorCod, data.id');
		$this->db->from('usuarios usa');
		$this->db->join('datosFormulario data', 'data.id = usa.formKey');
		//$this->db->join('derivarDoc dd','dd.formKey = usa.formKey');
		$this->db->where('usa.formKey =', $idDoc);
		//$this->db->limit(1);
		$data = $this->db->get();
		return $data->result_array();
	}
}
