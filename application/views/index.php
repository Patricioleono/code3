<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>

<!doctype html>
<html lang="es">
<head>
	<meta charset="UTF-88">
	<meta name="viewport"
		  content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title>Gestor de Documentos - <?= $_SESSION['cabnombre']; ?> </title>
	<!--link rel="stylesheet" href="https://unpkg.com/treeflex/dist/css/treeflex.css"-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
		  integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script type="text/javascript" src="/componentes/selector-webcomponent/v1/selector-webcomponent.bundle.js"></script>
	<script type="text/javascript" src="/componentes/navbar-webcomponent/v1/navbar-webcomponent.js"></script>
	<link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/css/fileinput.min.css" media="all"
		  rel="stylesheet" type="text/css"/>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
		  integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
		  crossorigin="anonymous" referrerpolicy="no-referrer"/>
	<link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/style.css'); ?>">


	<script src="<?= base_url('assets/js/jquery-3.5.1.min.js'); ?>"></script>
	<script src="<?= base_url('assets/js/jquery.dataTables.min.js'); ?>"></script>
	<script src="<?= base_url('assets/js/dataTables.bootstrap5.min.js'); ?>"></script>


	<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/fileinput.min.js"></script>
	<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/locales/es.js"></script>
	<script src="<?= base_url('assets/js/autosize.js'); ?>"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
			integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
			crossorigin="anonymous"></script>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body>

<div class="d-flex">
	<!--Aside bar call-->
	<?php $this->load->view('asidebar'); ?>
	<div class="w-100">
		<!-- Navbar call-->
		<?php $this->load->view('navbar'); ?>

		<main>
			<div class="m-4">
				<div class="fw-bolder d-flex justify-content-center mb-2 ">
					<!--SEARCHING CUSTOM-->
					<i id="btnMenuResponsive" class="fa-solid fa-angles-right fs-5 text-start align-start" data-bs-toggle="offcanvas" href="#offcanvasScrolling" role="button" aria-controls="offcanvasExample"></i>
					<?php $this->load->view('searchingNav'); ?>

				</div>
				<div id="indexDataTable" class="border-1">
					<table class="table" id="data_table">
						<thead class="col col-auto">
						<tr class="col col-auto border-1">
							<th scope="col">Prioridad Doc.</th>
							<th scope="col">Asunto Doc.</th>
							<th scope="col">Comentario Doc.</th>
							<th scope="col">N° de Folio.</th>
							<th scope="col">Acciones</th>
						</tr>
						</thead>
						<tbody class="border-1 ">

						</tbody>
					</table>
				</div>


			</div>
		</main>
	</div>
</div>
<!--Modal send document and files-->
<!--Modal on click show data of datatables-->


<?php $this->load->view('modalSend'); ?>
<?php $this->load->view('modalCreateNewDoc'); ?>
<?php $this->load->view('modalTracing'); ?>
<?php $this->load->view('modalTracingClick'); ?>
<?php $this->load->view('modalEdit'); ?>
<!--?php $this->load->view('modalTracingOptional');? -->


<!--Modal not working see the fileinput plugins this can be the last-->


<script>
	$(document).ready(() => {
		autosize(document.querySelectorAll('textarea'));
		$('#archivedBtn').on('click', function (e) {
			$('#modalReSend').modal('toggle');
			let id = $(this).val();
			$.ajax({
				url: '<?= base_url(); ?>index.php/index/get_saveArchivedDoc',
				method: 'post',
				data: {
					id: id,
				},
				dataType: 'json',
			}).done((allJoin) => {
				//console.log(allJoin);
				swal({
					title: "Documentos Archivados!",
					icon: "success",
					button: "Ok"
				});
			});
		});


		//Datatable data
		var datatable = $('#data_table').DataTable({
			"pageLength": 10,
			"order": [
				[3]
			],
			"responsive": true,
			"scrollY": '68vh',
			"scrollCollapse": true,
			"lengthChange": false,
			"dom": 'Blftrip',
			"search": true,
			"buttons": ['excel'],
			"pagingType": 'full_numbers',
			"language": {
				"decimal": ".",
				"emptyTable": "No hay datos para mostrar",
				"info": "del _START_ al _END_ (_TOTAL_ total)",
				"infoEmpty": "del 0 al 0 (0 total)",
				"infoFiltered": "(filtrado de todas las _MAX_ entradas)",
				"infoPostFix": "",
				"thousands": "'",
				"lengthMenu": "Mostrar _MENU_ entradas",
				"loadingRecords": "Cargando...",
				"processing": "Procesando...",
				"search": "Buscar:",
				"zeroRecords": "No hay resultados",
				"paginate": {
					"first": '',
					"last": '',
					"next": '<i class="fa-solid fa-arrow-right-long"></i>',
					"previous": '<i class="fa-solid fa-arrow-left-long"></i>'
				},
				"aria": {
					"sortAscending": ": ordenar de manera Ascendente",
					"sortDescending": ": ordenar de manera Descendente ",
				}
			},
			'ajax': {
				"url": '<?= base_url(); ?>index.php/index/get_DataFormAll',
				"type": "POST",
				dataSrc: ''
			},
			'columns': [{
				data: 'tipoDoc',
				render: function (data) {
					if (data === 'IMPORTANTE') {
						return '<i class="fa-solid fa-circle-exclamation" style="color: red;"> ' + data;
					} else if (data === 'PRIVADO') {
						return '<i class="fa-solid fa-lock text-dark"></i> ' + data;
					} else if (data === 'ORDINARIO') {
						return '<i class="fa-regular fa-file-lines text-dark"></i> ' + data;
					}
				}
			},
				{
					data: 'asunto'
				},
				{
					data: 'comentario',
					render: function (data) {
						newComment = (data.length > 15) ? data.slice(0, 15 - 1) + '....' : data;
						return newComment;
					}
				},
				{
					data: 'folio'
				},
				{
					'orderable': true,
					className: 'text-center',
					render: function (data, type, row) {
						return '<button type="button" id="eyeTracing"  value="' + row.id + '" class="btn btn-dark me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Seguimiento"><i class="fa-solid fa-eye"></i></button>' +
							'<button type="button" id="docEdit" value="' + row.id + '" class="btn btn-primary me-1" data-bs-toggle="tooltip" data-bs-placement="top" title="Editar Documento"><i class="fa-solid fa-file-pen"></i></button>' +
							'<button type="button" id="reSend" value="' + row.id + '" class="btn btn-success" data-bs-toggle="tooltip" data-bs-placement="top" title="Re envio de Documentos"><i class="fa-solid fa-envelopes-bulk"></i></button>';
					}
				},
			],
		});
		//end datatable and ajax res data

		//filter datatable
		$('#btnImportant').click(() => {
			datatable.column()
				.search('IMPORTANTE')
				.draw();
		});
		$('#btnRecived').click(() => {
			datatable.column()
				.search('')
				.draw();
		});
		$('#btnArchivados').click(() => {
			datatable.column()
				.search('')
				.draw();
		});
		//end filters

		//resend
		$('#data_table').on('click', '#reSend', function () {
			//console.log($(this).val());
			let valBtn = $(this).val();
			$('#derivationBtnSend').val(valBtn);
			$('#archivedBtn').val(valBtn);
			$('#derivateFile').addClass('d-none');
			//	console.log(valBtn);
			$.ajax({
				url: '<?= base_url();?>index.php/index/get_User',
				method: 'post',
				data: {idQuery: $(this).val()},
				dataType: 'json'
			}).done((data) => {
				//console.log(data);
				$('#docDestiny').empty();
				$.each(data, function (idx, opt) {
					$('#docDestiny').append(
						opt.userCreador + '<i class="fa-solid fa-file-export me-1 ms-1"></i>' + opt.userRecibe + '<br><br>');
				});
			});

			$.ajax({
				url: '<?= base_url(); ?>index.php/index/allDataJoin',
				method: 'post',
				data: {idQuery: $(this).val()},
				dataType: 'json',
			}).done(function (data, type, row) {
				$('#sendAsunto').empty();
				$('#sendFolio').empty();
				$('#sendComentario').empty();
				$('#sendFecha').empty();
				$('#docData').empty();

				$.each(data, function (idx, opt) {

					$('#sendAsunto').append('Asunto: ', opt.asunto);
					$('#sendFolio').append('Folio: ', opt.folio);
					$('#sendComentario').append(opt.comentario);
					$('#sendFecha').append(opt.fecha);
				});

				$.ajax({
					url: '<?= base_url(); ?>index.php/index/get_DataDocSend',
					method: 'post',
					data: {idQuery: valBtn},
					dataType: 'json',
				}).done((data) => {
					//console.log(data);
					$.each(data, function (idx, opt) {
						let newName = (opt.nombreDoc.length > 10) ? opt.nombreDoc.slice(0, 10 - 1) + '....' : opt.nombreDoc;
						if (data.length > 0) {
							if (opt.extensionDoc == 'pdf' || opt.extensionDoc == 'PDF') {
								//PDF
								opt.extensionDoc = '<img src="https://img.icons8.com/clouds/100/000000/pdf-2.png"/>';
							} else if (opt.extensionDoc == 'doc' || opt.extensionDoc == 'docx' || opt.extensionDoc == 'DOC' || opt.extensionDoc == 'DOCX') {
								//WORD
								opt.extensionDoc = '<img src="https://img.icons8.com/clouds/100/000000/microsoft-word-2019.png"/>';
							} else if (opt.extensionDoc == 'jpg' || opt.extensionDoc == 'jpeg' || opt.extensionDoc == 'JPG' || opt.extensionDoc == 'JPEG') {
								//JPG
								opt.extensionDoc = '<img src="https://img.icons8.com/clouds/100/000000/jpg.png"/>';

							} else if (opt.extensionDoc == 'xls' || opt.extensionDoc == 'xlsx' || opt.extensionDoc == 'XLS' || opt.extensionDoc == 'XLSX') {
								//XLS
								opt.extensionDoc = '<img src="https://img.icons8.com/clouds/100/000000/microsoft-excel-2019.png"/>';

							} else if (opt.extensionDoc == 'txt' || opt.extensionDoc == 'TXT') {
								//TXT
								opt.extensionDoc = '<img src="https://img.icons8.com/external-flatart-icons-lineal-color-flatarticons/64/000000/external-txt-file-online-learning-flatart-icons-lineal-color-flatarticons.png"/>';
							}
							$('#docData').append(
								'<div class="col-md-3">' +
								'<div class="card m-1 p-2" style="width: 7rem;">'
								+ opt.extensionDoc +
								'<div class="card-body">' +
								'<a href="<?= base_url('uploads/'); ?>' + opt.nombreDoc + '" target="_blank" class="card-text text-decoration-none" title="' + opt.nombreDoc + '" id="documentStatus">' + newName + '</a>' +
								'</div>' +
								'</div>' +
								'</div>'
							);
						}
						//append input
						$('#formValue').val(opt.formularioId);
					});
				});
			});
			$('#modalReSend').modal('toggle');
		});

		//send form with ajax click
		$('#btnSendForm').on('click', (e) => {
			e.preventDefault();
			const select = document.querySelector('selector-webcomponent');
			let listUser = select.getList();
			let asunto = $('#asunto').val();
			let folio = $('#folio').val();
			let tipoDoc = $('#chooseType').val();
			let comentario = $('#comentario').val();
			let filesCount = $('#file').fileinput('getFilesCount');

			if (listUser == 0 || asunto == 0 || filesCount == 0 || folio == 0 || tipoDoc == 0 || comentario == 0) {
				swal({
					title: "Error!",
					text: "Faltan Campos Por Llenar!",
					icon: "error",
					button: "Volver"
				});
			} else {
				$.ajax({
					url: '<?= base_url();?>index.php/index/dataFormInsert',
					type: 'post',
					data: {
						asunto: asunto,
						folio: folio,
						tipoDoc: tipoDoc,
						comentario: comentario,
						listUser: listUser
					},
					dataType: 'json'
				}).done((data) => {
					//console.log(data);
					//add value to return from datFormInsert id
					$('#btnSendForm').val(data);
					//console.log(data);
					//clean field form
					if (data > 0 && filesCount > 0) {
						$('#file').fileinput('upload');
						$('#asunto').val('');
						$('#folio').val('');
						$('#chooseType').val('');
						$('#comentario').val('');
						$('#file').fileinput('clear');
						select.clearList();
						$('#modalCreateDoc').modal('hide');
						$('#data_table').DataTable().draw();
						$('#data_table').DataTable().ajax.reload();
					} else {
						console.log('Revise datos');
					}

				});

				swal({
					title: "Enviado Con Exito!",
					icon: "success",
					button: "Ok"
				});


			}

		});

		//file from create new doc
		$("#file").fileinput({
			language: 'es',
			theme: "bs5",
			uploadUrl: '<?= base_url();?>index.php/index/uploadFiles',
			uploadAsync: false,
			allowedFileExtensions: ['jpg', 'jpeg', 'img', 'gif', 'pdf', 'doc', 'docx', 'txt', 'TXT'],
			overwriteInitial: false,
			initialPreviewAsData: true,
			maxFileSize: 300000,
			removeFromPreviewOnError: true,
			showClose: false,
			showPreview: true,
			showUpload: false,
			showRemove: false,
			uploadExtraData: function () {
				return {
					idQuery: $('#btnSendForm').val()
				};
			}
		});
		$('#closeTracing').on('click', () => {
			$('#modalTracing').modal('show');
		});
		//click on mainNode

		//tracing document
		$('#data_table').on('click', '#eyeTracing', function () {
			$('#tracingData').empty();
			let eyeTracing = $(this).val();
			//console.log(eyeTracing);
			$('#modalTracing').modal('toggle');

			$.ajax({
				url: '<?php echo base_url();?>index.php/index/get_UserDataTracing',
				method: 'post',
				data: {idDoc: eyeTracing},
				dataType: 'json',
			}).done((dataUser) => {
				//console.log(dataUser);
				for (let i = 0; i < dataUser.length; i++) {
					if (dataUser[i].creadorCod == dataUser[i].quienDerivaCod) {
						$(
							"<li class='list-group-item bg-secondary'>"
							+ dataUser[i].userCreador + "<span class='badge badge-info'> " +
							" Documento " + dataUser[i].fecha + "</span> " +
							"</li><ul id='" + dataUser[i].formKey + "'></ul>").appendTo('#tracingData');

						if (dataUser[i].creadorCod != <?= $_SESSION['cabcodigo']?>) {

							$("<li class='list-group-item bg-secondary'>"
								+ dataUser[i].userCreador + "<span class='badge badge-info'> " +
								" Documento " + dataUser[i].fecha + "</span> " +
								"</li><ul id='" + dataUser[i].formKey + "'></ul>").appendTo('#tracingData');
						}

					} else {

						$(
							"<li class='list-group-item'>" +
							"<span class='text-dark'> " +
							" Creo el Documento Con Fecha " + dataUser[i].fecha + "</span> "
							+ dataUser[i].quienDeriva + " <span class='fa fa-arrow-circle-right'></span> " + dataUser[i].listaUsuarios +
							"</li><ul id='" + dataUser[i].formKey + "'></ul>").appendTo('#tracingData #' + dataUser[i].formKey + '');
					}
				}


			});
		});


		//derivation options
		$('#derivationBtn').on('click', () => {
			$('#footerHide').hide();
			$('#derivationBtnSend').removeClass('d-none');
			$('#derivateFile').removeClass('d-none');

			$('#sendComentario').empty();
			$('#docDestiny').empty();

			$('#docDestiny').append(
				'<selectorprestaciones-component class="w-100">' +
				'<div class="text-center mb-1">Derivado a: <i class="fa-solid fa-file-import"></i>' +
				'</div>' +
				'<selector-webcomponent name="selectorpersonas"' +
				'url="http://10.5.225.24/api/index.php/SelectorWebComponent/lists"' +
				'cat="personas" list="true"' +
				'token="<?= $token;?>"' +
				'confirmDelete="true" allowDuplicates="false"' +
				'label="Agregar Usuarios.." id="derivationUser">' +
				'</selector-webcomponent>' +
				'</selectorprestaciones-component>'
			);
			$('#sendComentario').append(
				'<div class="input-group">' +
				'<span class="input-group-text">Comentario</span>' +
				'<textarea class="form-control" aria-label="With textarea" id="derivatedComment"' +
				'name="derivatedComment"></textarea>' +
				'</div>'
			);

		});


		//file send derivate case
		$("#fileReSend").fileinput({
			language: 'es',
			theme: "bs5",
			uploadUrl: '<?= base_url();?>index.php/index/uploadFiles',
			uploadAsync: false,
			allowedFileExtensions: ['jpg', 'img', 'gif', 'pdf', 'doc', 'docx'],
			overwriteInitial: false,
			initialPreviewAsData: true,
			maxFileSize: 300000,
			removeFromPreviewOnError: true,
			showClose: false,
			showPreview: true,
			showUpload: false,
			uploadExtraData: function () {
				return {
					dataBtn: $('#btnSendForm').val()
				};
			}
		});

		//edit document
		$('#data_table').on('click', '#docEdit', function () {
			$('#updateFile').fileinput('clear');
			let idBtn = $(this).val();
			//console.log(idBtn);
			$('#updateDataEdit').val(idBtn);
			$.ajax({
				url: '<?= base_url();?>index.php/index/editReSend',
				method: 'post',
				data: {idQuery: idBtn},
				dataType: 'json',
			}).done(function (data, type, row) {
				$('#editAsunto').empty();
				$('#editFolio').empty();
				$('#editSelected').empty();
				$('#editComentario').empty();
				$('#previewDoc').empty();

				$.ajax({
					url: '<?= base_url();?>index.php/index/get_EditDoc',
					method: 'post',
					data: {idQuery: idBtn},
					dataType: 'json',
				}).done((data) => {
					$.each(data, (idx, opt) => {
						let newName = (opt.nombreDoc.length > 10) ? opt.nombreDoc.slice(0, 10 - 1) + '....' : opt.nombreDoc;
						if (data.length > 0) {
							if (opt.extensionDoc == 'pdf' || opt.extensionDoc == 'PDF') {
								//PDF
								opt.extensionDoc = '<img src="https://img.icons8.com/clouds/100/000000/pdf-2.png" class="card-img-top"/>';
							} else if (opt.extensionDoc == 'doc' || opt.extensionDoc == 'docx' || opt.extensionDoc == 'DOC' || opt.extensionDoc == 'DOCX') {
								//WORD
								opt.extensionDoc = '<img src="https://img.icons8.com/clouds/100/000000/microsoft-word-2019.png" class="card-img-top"/>';
							} else if (opt.extensionDoc == 'jpg' || opt.extensionDoc == 'jpeg' || opt.extensionDoc == 'JPG' || opt.extensionDoc == 'JPEG') {
								//JPG
								opt.extensionDoc = '<img src="https://img.icons8.com/clouds/100/000000/jpg.png" class="card-img-top"/>';

							} else if (opt.extensionDoc == 'xls' || opt.extensionDoc == 'xlsx' || opt.extensionDoc == 'XLS' || opt.extensionDoc == 'XLSX') {
								//XLS
								opt.extensionDoc = '<img src="https://img.icons8.com/clouds/100/000000/microsoft-excel-2019.png" class="card-img-top"/>';

							} else if (opt.extensionDoc == 'txt' || opt.extensionDoc == 'TXT') {
								//TXT
								opt.extensionDoc = '<img src="https://img.icons8.com/external-flatart-icons-lineal-color-flatarticons/64/000000/external-txt-file-online-learning-flatart-icons-lineal-color-flatarticons.png"/>';
							}
							$('#previewDoc').append(
								'<div class="card m-1 p-1" style="width: 8rem;">'
								+ opt.extensionDoc +
								'<div class="card-body">' +
								'<a href="<?= base_url('uploads/'); ?>' + opt.nombreDoc + '" target="_blank" class="card-text text-decoration-none text-dark" title="' + opt.nombreDoc + '" id="documentStatus">' + newName + '</a>' +
								'</div>' +
								'</div>'
							);
						}
					});

				});
				$.each(data, function (idx, opt) {
					$('#editAsunto').attr('value', opt.asunto);
					$('#editFolio').attr('value', opt.folio);
					$('#editSelected').append(opt.tipoDoc);
					$('#editComentario').append(opt.comentario);

				});
			});
			$('#modalEdit').modal('toggle');//open modal

			$('#updateDataEdit').on('click', () => {

				let editAsunto = $('#editAsunto').val();
				let editFolio = $('#editFolio').val();
				let editType = $('#editType').val();
				let editComentario = $('#editComentario').val();
				let idButton = $(this).val();

				//console.log(editComentario, editType, editFolio, editAdjunto);
				$.ajax({
					method: 'post',
					url: '<?= base_url();?>index.php/index/update_Edit',
					data: {
						idQuery: idButton,
						editAsunto: editAsunto,
						editFolio: editFolio,
						editType: editType,
						editComentario: editComentario
					},
					dataType: 'json',
				}).done((data) => {
					//console.log(data);

					if ($('#updateFile').fileinput('getFilesCount', true) == 0) {
						swal({
							title: "Actualizado Sin Documento Adjunto!",
							icon: "success",
							button: "Ok"
						});
						$('#modalEdit').modal('toggle');//close modal
						$('#editAsunto').empty();
						$('#editFolio').empty();
						$('#editComentario').empty();
						$('#updateFile').fileinput('clear');

						$('#data_table').DataTable().ajax.reload();
					} else {
						$('#updateFile').fileinput('upload');
						$('#updateDataEdit').val(data);

						swal({
							title: "Campos Actualizados y Documento Agregado!",
							icon: "success",
							button: "Ok"
						});
						$('#editAsunto').empty();
						$('#editFolio').empty();
						$('#editComentario').empty();
						$('#updateFile').fileinput('clear');
						$('#modalEdit').modal('toggle');//close modal

						$('#data_table').DataTable().ajax.reload();
					}


				});//end ajax
			});
		});

		//Edit Doc
		$("#updateFile").fileinput({
			language: 'es',
			theme: "bs5",
			uploadUrl: '<?= base_url();?>index.php/index/update_EditDoc',
			uploadAsync: false,
			allowedFileExtensions: ['jpg', 'jpeg', 'img', 'gif', 'pdf', 'doc', 'docx'],
			overwriteInitial: false,
			initialPreviewAsData: true,
			maxFileSize: 300000,
			removeFromPreviewOnError: true,
			showClose: false,
			showPreview: true,
			showUpload: false,
			uploadExtraData: function () {
				return {
					updateId: $('#updateDataEdit').val()
				};
			}
		});

		//statusDocument
		$('body').on('click', '#documentStatus', () => {
			let idForm = $('#formValue').val();
			$.ajax({
				url: '<?= base_url();?>index.php/index/update_DocStatus',
				method: 'post',
				data: {
					idForm: idForm
				},
				dataType: 'json',
			}).done((data) => {
				//console.log(data);
			});
		});

		//derivation document
		$('#derivationBtnSend').on('click', (e) => {

			let idBtn = $('#derivationBtnSend').val();
			const derivateSelect = document.querySelector('#derivationUser');
			let derivateUser = derivateSelect.getList();
			let derivatedComment = $('#derivatedComment').val();
			//console.log(idBtn);
			if (derivateUser < 1) {
				swal({
					title: "Error!",
					text: "Seleccione a quien Derivar!",
					icon: "error",
					button: "Volver"
				});
			} else {
				$.ajax({
					url: '<?= base_url();?>index.php/index/add_DerivativeData',
					method: 'post',
					data: {
						derivateUser: derivateUser,
						derivatedComment: derivatedComment,
						idQuery: idBtn
					},
					dataType: 'json',
				}).done((data) => {
					//console.log(data);
					$('#modalReSend').modal('toggle');
					$('#addDerivateFile').fileinput('upload');
					$('#data_table').DataTable().draw();
					$('#data_table').DataTable().ajax.reload();
					swal({
						title: "Derivado Con Exito!!",
						icon: "success",
						button: "Ok"
					});
				});
			}

		});
		//file input derivation data
		$("#addDerivateFile").fileinput({
			language: 'es',
			theme: "bs5",
			uploadUrl: '<?= base_url();?>index.php/index/add_DerivativeDoc',
			uploadAsync: false,
			allowedFileExtensions: ['jpg', 'jpeg', 'img', 'gif', 'pdf', 'doc', 'docx'],
			overwriteInitial: false,
			initialPreviewAsData: true,
			maxFileSize: 300000,
			removeFromPreviewOnError: true,
			showClose: false,
			showPreview: true,
			showUpload: false,
			uploadExtraData: function () {
				return {
					derivateId: $('#derivationBtnSend').val()
				};
			}
		});


		$('#closeSend').on('click', () => {
			$('#derivationBtnSend').addClass('d-none');
			$('#footerHide').show();
		});
		$('#searchingData').on('keyup', function () {
			datatable.search(this.value).draw();
		});
		$('#btnMenuResponsive').click( () => {
			$('#searchData').removeClass('col-11');
			$('#responsiveCol').removeClass('col-1');
			$('#responsiveCol').removeClass('text-center');
			$('#responsiveCol').removeClass('align-center');
			$('#iconArrow').removeClass('d-none');
			$('#responsiveCol').addClass('mt-1');
			$('#searchData').addClass('col-9');
			$('#responsiveCol').addClass('col-3');
			$('#responsiveCol').addClass('text-end');
			$('#responsiveCol').addClass('align-end');
			$('#iconSearch').addClass('d-none');

		});
		$('#iconArrow').click( () => {
			$('#searchData').addClass('col-11');
			$('#responsiveCol').addClass('col-1');
			$('#responsiveCol').addClass('text-center');
			$('#responsiveCol').addClass('align-center');

			$('#iconArrow').addClass('d-none');
			$('#searchData').removeClass('col-9');
			$('#responsiveCol').removeClass('col-3');
			$('#responsiveCol').removeClass('text-end');
			$('#responsiveCol').removeClass('align-end');
			$('#iconSearch').removeClass('d-none');
		});

	});
</script>
</body>
</html>

