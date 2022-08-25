<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Index extends CI_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('FormModel');
		$this->load->model('DataFileModel');
		$this->load->model('DataFormUser');
		$this->load->model('KeyDataForm');
		$this->load->model('DerivativeDataModal');
	}

	public function index()
	{
		$user = $_SESSION['cabcodigo'];
		self::validateUser($user);
	}

//validate session data
	public function validateUser($userSession)
	{
		$userSession;
		if ($userSession) {
			if (empty($userSession)) {
				$this->load->view('logout');
			} else {
				$revisedDocument = count($this->FormModel->get_RevisedDoc());
				$sendDocument = count($this->DataFormUser->get_SendData($userSession));
				$importantDoc = count($this->FormModel->get_Important());
				$docRecive = count($this->DataFormUser->get_RecibeData($userSession));
				$token = array(
					'token' => self::get_ApiToken($userSession),
					'docRecive' => $docRecive,
					'importantDoc' => $importantDoc,
					'sendDoc' => $sendDocument,
					'revisedDocument' => $revisedDocument
				);
				$this->load->view('index', $token);
			}
		} else {
			$this->load->view('logout');
		}
	}

	public function add_DerivativeData()
	{
		$idQuery = $this->input->post('idQuery');
		$idForm = $this->FormModel->get_IdForm($idQuery);
		$derivativeUser = $this->input->post('derivateUser');
		$derivativeComment = $this->input->post('derivatedComment');
		$completeName = $_SESSION['cabnombre'] . " " . $_SESSION['cabapellido'];
		$sessionCode = $_SESSION['cabcodigo'];
		//echo json_encode($idForm);
		$this->derivativeDataProcessing($derivativeUser, $completeName, $sessionCode, $idForm, $derivativeComment);

	}
	public function add_DerivativeDoc (){
		$derivativeId = $this->input->post('derivateId');
		if(!empty($_FILES)){
			$result = $this->add_DocumentAndStatus($derivativeId);
			echo json_encode($result);
		}else{
			echo 'SinDoc';
		}

	}
	protected function add_DocumentAndStatus($idUser)
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|jpeg|pdf|doc|docx';
		//$data = array('result' => 1);

		if(count($_FILES['file']['name']) == 0){
			$error = 'Sin doc para Subir';
			return $error;
		}else{
			$countItem = count($_FILES['file']['name']);
			for ($i = 0; $i < $countItem; $i++) {
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				$fileName = $_FILES['file']['name'][$i];
				$fileName = preg_replace('/([^.a-z0-9]+)/i', '_', $fileName);
				$_FILES['file2'] = array();
				$_FILES['file2']['name'] = $fileName;
				$_FILES['file2']['type'] = $_FILES['file']['type'][$i];
				$_FILES['file2']['tmp_name'] = $_FILES['file']['tmp_name'][$i];
				$_FILES['file2']['error'] = $_FILES['file']['error'][$i];
				$_FILES['file2']['size'] = $_FILES['file']['size'][$i];

				if (!$this->upload->do_upload('file2')) {
					$error = array(
						'error' => $this->upload->display_errors()
					);
					$data['result'] = 0;
					$data['message'] = $error;
				} else {
					$uploadData = $this->upload->data();
					$result = array(
						'file' => $uploadData['file_name'],
						'extension' => strtolower(pathinfo($uploadData['file_name'], PATHINFO_EXTENSION)),
						'id' => $idUser,
						'estado' => 2
					);
					$idDocInsert = $this->DataFileModel->add_DocStats($result);
					echo json_encode($idDocInsert);
				}
			}
		}


	}

	public function derivativeDataProcessing($user, $sendUser, $derivativeCod, $idForm, $comment)
	{
		if (empty($user)) {
			echo 'No hay Destinatarios Seleccionados';
		} else {
			for ($i = 0; $i < count($user); $i++) {

				foreach ($idForm as $key) {

					$newListId = $user[$i]['value'];
					$newListName = $user[$i]['label'];
					$derivativeData = array(
						'listaUsuarios' => $newListName,
						'codListaUser' => $newListId,
						'comentarioDerivarDoc' => $comment,
						'formKey' => $key['formKey'],
						'quienDeriva' => $sendUser,
						'quienDerivaCod' => $derivativeCod
					);
					$this->DerivativeDataModal->add_DerivativeData($derivativeData);
					echo json_encode($derivativeData);
				}
			}
		}
	}

	//update
	public function update_DocStatus()
	{
		$status = 1;
		$idForm = $this->input->post('idForm');
		self::update_DocumentStatus($status, $idForm);
	}

	protected function update_DocumentStatus($status, $id)
	{
		$this->DataFileModel->update_StatusDoc($status, $id);
		//echo json_encode($idForm);
	}

	//data from form
	public function dataFormInsert()
	{
		$userList = $this->input->post('listUser');
		$dataForm = array(
			'affair' => $this->input->post('asunto'),
			'invoice' => $this->input->post('folio'),
			'docType' => strtoupper($this->input->post('tipoDoc')),
			'comment' => $this->input->post('comentario')
		);
		$idForm = $this->FormModel->add_DataForm($dataForm);
		self::insertDataUser($userList, $idForm);
		echo json_encode($idForm);
	}

	public function insertDataUser($list, $key)
	{
		$completeName = $_SESSION['cabnombre'] . " " . $_SESSION['cabapellido'];
		$sessionCode = $_SESSION['cabcodigo'];
		if (empty($list)) {
			echo 'No hay Destinatarios Seleccionados';
		} else {
			for ($i = 0; $i < count($list); $i++) {
				$newListId = $list[$i]['value'];
				$newListName = $list[$i]['label'];
				$newlistData = array(
					'completeName' => $completeName,
					'loginCod' => $sessionCode,
					'userRecibe' => $newListName,
					'recibeCod' => $newListId,
					'formKey' => $key
				);
				if (isset($sessionCode)) {
					$this->DataFormUser->add_DataFormUser($newlistData);

				} else {
					echo 'no esta logeado';
					//$this->DataFormUser->add_DataFormUser($newlisData);
				}
			}
		}
	}
//tracing data main nodo
public function get_FirstNodo(){
		$id = $_SESSION['cabcodigo'];
		$data = $this->FormModel->get_MainNode($id);
		echo json_encode($data);
	}
//Get data form from model
	public function get_DataFormAll()
	{
		$data = $this->FormModel->get_AllData();
		echo json_encode($data);
	}

	//upload Files
	public function uploadFiles()
	{
		$status = 1;
		$dataBtn = $this->input->post('idQuery');
		//var_dump($dataBtn[0]);
		$this->add_Document($dataBtn, $status);

	}

	//update doc
	protected function add_Document($idUser, $status)
	{
		$config['upload_path'] = './uploads/';
		$config['allowed_types'] = 'gif|jpg|jpeg|pdf|doc|docx';
		//$data = array('result' => 1);

		if(count($_FILES['file']['name']) == 0){
			$error = 'Sin doc para Subir';
			return $error;
		}else{
			$countItem = count($_FILES['file']['name']);
			for ($i = 0; $i < $countItem; $i++) {
				$this->load->library('upload', $config);
				$this->upload->initialize($config);

				$fileName = $_FILES['file']['name'][$i];
				$fileName = preg_replace('/([^.a-z0-9]+)/i', '_', $fileName);
				$_FILES['file2'] = array();
				$_FILES['file2']['name'] = $fileName;
				$_FILES['file2']['type'] = $_FILES['file']['type'][$i];
				$_FILES['file2']['tmp_name'] = $_FILES['file']['tmp_name'][$i];
				$_FILES['file2']['error'] = $_FILES['file']['error'][$i];
				$_FILES['file2']['size'] = $_FILES['file']['size'][$i];

				if (!$this->upload->do_upload('file2')) {
					$error = array(
						'error' => $this->upload->display_errors()
					);
					$data['result'] = 0;
					$data['message'] = $error;
				} else {
					$uploadData = $this->upload->data();
					$result = array(
						'file' => $uploadData['file_name'],
						'extension' => strtolower(pathinfo($uploadData['file_name'], PATHINFO_EXTENSION)),
						'id' => $idUser,
						'estado' => $status
					);
					$idDocInsert = $this->DataFileModel->add_Document($result);
					echo json_encode($idDocInsert);
				}
			}
		}


	}

	//processing data and get token API
	private static function get_ApiToken($userLogin)
	{
		$url = 'http://10.5.225.24/api/index.php/auth/generarTokenUsuario/' . $userLogin;
		//call function with private static
		$result = json_decode(self::get_ApiData($url));
		$onlyToken = $result->token;
		return $onlyToken;
	}

	private static function get_ApiData($url)
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


	//editData modal
	public function editReSend()
	{
		$idFromForm = $this->input->post('idQuery');
		//echo $idFromForm;
		$allDataJoined = $this->FormModel->get_EditData($idFromForm);
		echo json_encode($allDataJoined);
		//var_dump($allDataJoined);
	}

	//editDoc
	public function get_EditDoc()
	{
		$id = $this->input->post('idQuery');
		$editDoc = $this->DataFileModel->get_EditDoc($id);
		echo json_encode($editDoc);

	}

	public function update_Edit()
	{
		$id = $this->input->post('idQuery');

		$data = array(
			'editComentario' => $this->input->post('editComentario'),
			'editAsunto' => $this->input->post('editAsunto'),
			'editFolio' => $this->input->post('editFolio'),
			'editType' => $this->input->post('editType')
		);
		$this->FormModel->update_DataEdit($data, $id);
		$result = $id;
		echo json_encode($result);

	}
	public function update_EditDoc(){
		$id = $this->input->post('updateId');
		$status = 3;
		//add id key from form to insertUpdated Document
		$error = $this->add_Document($id);
		echo json_encode($error);
	}

	//reSend
	public function allDataJoin()
	{
		$idFromForm = $this->input->post('idQuery');

		$allDataJoined = $this->FormModel->get_AllDataFromTables($idFromForm);
		echo json_encode($allDataJoined);
		//var_dump($allDataJoined);
	}

	//only user
	public function get_User()
	{
		$key = $this->input->post('idQuery');
		$onlyUser = $this->FormModel->get_userData($key);
		echo json_encode($onlyUser);
	}

	public function get_DataDocSend()
	{
		$idquery = $this->input->post('idQuery');
		$data = $this->DataFileModel->get_DocDataSend($idquery);
		echo json_encode($data);
	}


	public function get_DataTracingClick()
	{//form data comentary etc
		$idTracing = $this->input->post('idDoc');
		$main = $this->DataFileModel->get_TracingData($idTracing);
		echo json_encode($main);
	}
	public function get_DataDoc(){
		//get document data for review data on click tracing
		$id = $this->input->post('idDoc');
		$data = $this->DataFileModel->get_DocDataTracing($id);
		echo json_encode($data);
	}
	public function get_UserDataTracing(){
		//get user and document where id = user id
		$id = $this->input->post('idDoc');
		$data = $this->FormModel->get_UserDate($id);
		$this->get_second($id);
		//echo json_encode($data);
	}
	public function get_Second($id){
		$data = $this->DerivativeDataModal->get_SecondDerivative($id);
		echo json_encode($data);
	}
	public function get_saveArchivedDoc(){
		$id = $this->input->post('id');

	}

}
