
# Gestor de Documentos



El gestor de documentos tiene como fin el poder enviar recepcionar y tener el flujo
de los distintos documentos que se manejan en el hospital, esto con la intención
de tener todo respaldado de manera digital, esto esta apegado a  *[Ley de Transformación Digital](https://digital.gob.cl/transformacion-digital/ley-de-transformacion-digital/).*

*******************
## Desarrollo
*******************

El Gestor de Documentos esta desarrollado con las siguientes tecnologias y Plugins.

- *[Codeigniter 3](https://www.codeigniter.com/userguide3/index.html).*
- *[PHP 7](https://www.php.net/manual/es/).*
- *[Jquery 3.5.1](https://api.jquery.com/category/version/3.5/).*
- *[Ajax](https://developer.mozilla.org/es/docs/Web/Guide/AJAX).*
- *[Bootstrap 5.0](https://getbootstrap.com/docs/5.2/getting-started/introduction/).*
- *[DataTables](https://datatables.net/).*
- *[File Input Krajee](https://plugins.krajee.com/file-input#usage).*
- *[Selector WebComponents Componente Local realizado Por Cristian Valenzuela](http://10.5.225.61:8929/cristian.valenzuela/selector-webcomponent/-/tree/main/).*
- *[Navbar WebComponents Componente Local realizado Por Cristian Valenzuela](http://10.5.225.61:8929/cristian.valenzuela/navbar-webcomponent).*
- *[Font Awesome Icons](https://fontawesome.com/v6/search?m=free).*
- *[AutoSize.js by Jack Moore](https://www.jacklmoore.com/autosize/).*
- *[Sweet Alert](https://sweetalert.js.org/).*

*******************
# Codigo
*******************

## Vista (MVC)


```php
	<?php $this->load->view('asidebar'); ?>
	<?php $this->load->view('navbar'); ?>
	<?php $this->load->view('searchingNav'); ?>
```

De esta manera realizamos la llamada a las diferentes vistas, en este caso llamamos a asidebar, navbar,
searchingNav, los cuales estan divididos en sus respectivos archivos en la vista, tambien tenamos la
llamada a los diferentes modal que usamos, esto lo realizamos para que el codigo sea mas facil de interpretar,
los modal se llaman a la vista principal, para poder tener interaccion con ellos.

```php
	<?php $this->load->view('modalSend'); ?>
	<?php $this->load->view('modalCreateNewDoc'); ?>
	<?php $this->load->view('modalTracing'); ?>
	<?php $this->load->view('modalTracingClick'); ?>
	<?php $this->load->view('modalEdit'); ?>
```

Al final de la vista principal tenemos un script, com todo lo relacionado con javascript, para uso del
proyecto

```javascript
	autosize(document.querySelectorAll('textarea'));
```

Con este llamado estamos solicitando todos los campos de tipo *textarea*, para inicializar en estos
el plugin autosize el cual al momento de escribir este se va agrandando asi no se pierde el text escrito.

```javascript
	
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
```

esta es la llamada al datatable para poder desplegarlo en pantalla esto lo utilizamos mediante ajax,
se realiza la llamada a datatable, se inicializan los valores ***que están más arriba en la documentation***,
posterior a configurar el datatable se llama a ***$.ajax({});*** para realizar la solicitud a la url, la que
tiene como direction ***base del proyecto/controlador/funcion*** se procesan los datos pedidos, mediante el
parametro ***column*** podemos ordenar nuestro datatable, para poder generar funciones ocupamos la funcion ***render:***
que nos permite retornar un valor procesado, en el caso de ***data: 'comentario'*** la function recorta el nombre
con el fin de tener una estructura en la la tabla a mostrar, en el caso de ***data: 'tipoDoc'*** es una condicional
que nos permite identificar que tipo de documento se envio, esto para poder adjuntar un icono segun el tipo, parte importante
del data table es el ultimo item ***'orderable'***, ya que este crea de manera dinamica 3 botones, ***reSend, docEdit, eyeTracing***
los cuales manejamos de forma dinamica con ajax y jquery, estos botones quedan con un valor ***'value'*** que corresponde al formulario.


```javascript
	$('#btnImportant').click(() => {
	datatable.column()
		.search('IMPORTANTE')
		.draw();
```

esta funcion esta realizada con Jquery se llama a Jquery con el Simbolo ***'$'***, esta funcion se dispara al hacer
***'click'*** en el boton con el ***Identificador (ID) 'btnImportant'***, al lanzarse la funcion realiza un filtro al
datatable, para dejar solo los documentos que son de tipo ***IMPORTANTE***.

```javascript
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
```

Esta funcion es para desplegar el modal de Re-envio o Derivacion, se desplega al hacer click en el boton que tiene 
el ***Identificador (ID) 'reSend'*** al hacer click desplega el modal, al hacer click se genera la variable ***'valBtn'***,
esta tomal el valor que viene en el boton, este valor lo agregamos a ***'derivationBtnSend, archivedBtn'***, y agregamos
una clase con la funcion ***'addClass', al identificador 'derivativeFile'***, siguiente de eso lanzamos ajax, con una peticion
al backend, donde ***'url' corresponde a la ruta, 'method', corresponde al tipo enviado 'POST'/'GET', 'data', son variables 
que enviamos desde ajax a nuestro backend, y el 'dataType' corresponde a un JSON,(Formato de Trabajo)***, con la funcion de ajax
 *done*, recibimos lo que nos envian desde el backend(respuesta), y lo procesamos, en este primer ajax limpiamos el indentificador
***'docDestiny'*** con la funcion de ajax ***'.empty'***, con la funcion ***'$each'*** recorremos el ***'data'(respuesta del servidor)***,
y sobre el mismo identificador ocupamos la funcion ***'.append'*** para poder agregar un trozo de codigo con informacion, podemos
ver que se agrega ***```opt.userCreador + '<i class="fa-solid fa-file-export me-1 ms-1"></i>' + opt.userRecibe + '<br><br>'```*** 
el cual tiene como informacion que nos llega del backend *opt*(indice)*.userCreador* asi se llama el cambo en la tabla de
base de datos.


para el segundo ajax al terminar de realizar la peticion limpia los campos con la funcion ***'.empty'`***, ```$('#sendAsunto').empty();``` luego de tener
los espacios sin valores recorremos los datos enviados desde el backend, con la funcion ***'$.each'***, ```$.each(data, function (idx, opt){}``` cada data lo 
insertamos en un campo con un identificador por medio de la funcion ***'.append'***, ```$('#sendAsunto').append('Asunto: ', opt.asunto);```.

Antes de cerrar la funcion ***'done'*** de ajax, realizamos una nueva llamad a ajax, para solicitar informacion al backend,
al recibir esta solicitud, la recorremos mediante la funcion ***'$.each'***, tambien realizamos validaion mediante condicional
*if* verificamos si data(respuesta del backend), viene vacio ```if (data.length > 0)```, si tiene datos, preguntamos,
si la extension del documento es igual a *pdf, docx, doc, jpeg* si es asi, igualamos a la imagen respectiva(esta se mostrara mas adelante),
se realiza un append, en conjunto con la extension, el nombre del documento y la ruta del servidor(carpeta donde se sube el documento).
```javascript
	$('#docData').append(
	'<div class="col-md-3">' +
	'<div class="card m-1 p-2" style="width: 7rem;">'
	+ opt.extensionDoc +
	'<div class="card-body">' +
	'<a href="<?= base_url('uploads/'); ?>' + opt.nombreDoc + '" target="_blank" class="card-text text-decoration-none" title="' + opt.nombreDoc + '" id="documentStatus">' + newName + '</a>' +
	'</div>' +
	'</div>' +
	'</div>');
```
esto nos mostrara el enlace del documento y podremos vizualisar una imagen el tipo de document, al hacer click en el enlace que nos deja
podremos ir directamente al documento(en caso de ser tipo Doc, Docx), este se *desacarga de manera automatica.*

para finalizar esta pate dejamos el valor del formulario en un input ```$('#formValue').val(opt.formularioId);```
y desplegamos el modal con lo anterior ya cargado ```$('#modalReSend').modal('toggle');```

*******************

al hacer click en el boton de derivacion(dentro del modal de re-envio / derivacion), este esconde al footer del modal,
y el lado izquerdo del modal, al esconer estas partes mediante un append le asignamos codigo para obtener un selector de
personas, un campo de comentario opcional, y un campo para adjuntar un documento ese proceso lo realizamos mediante Jquery,
con estos campos en pantalla podemos ver que queda solo el boton de derivar.

```javascript
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
```

al enviar la derivacion, tenemos dos casos, el primero, si se envia el documento sin destinatario esta mostrara una alerta,
ya que al derivar tiene que ir dirigido a al menos una persona, lanzamos una peticion por ajax, por la cual enviaremos los datos
del formulario de derivacion, el retornar los datos desde el backend, subimos el documento, recargamos el data table, mostramos un mensaje
mediante sweetalert, y cerramos el modal.

```javascript
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
```
### Funcion no Terminada

al hacer click en el boton seguimiento(boton con icono de un ojo), se deplega un modal, con el seguimiento del Documento,
se limpia el campo donde trbajaremos mediante empty ```$('#tracingData').empty();``` se toma el valor del boton ```let eyeTracing = $(this).val();```
este se envia con la peticion realizada por Ajax, obtenemos la respuesta de backend mediante la variable ***dataUser***
la recorremos con un *for*, revisando si la cantidad de datos es menor a 0, validamos con un *if* si creadorCod es = a quienDerivaCod
se realiza un append del documento Principal, luego validamos si el creador es diferente del user logeado, si es correcto,
realizamos un append de los datos e iconos, de lo contrario saltamos al bloque que sigue, el cual realiza un append, del documento
derivado, ***este append lo realiza al ul con el id correspondiente***

```javascript
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
```


*******************

al hacer click en el boton Crear Documento, nos desplegara un modal, con un ***selector de personas, asunto, n°folio, tipo de Documento,
comentario, y un campo donde se puede agregar documentos, todos de tipo inputs*** si alguno de estos campos viene vacio, al enviar, nos
arroja un sweetalert, diciendo que faltan campos por llenar, de lo contrario enviamos una solicitud con Ajax, y enviamos las variables
que se refieren a los input del formulario, al recibir los datos desde el backend, le agregamos al boton con ID ***'btnSendForm'***, y
validamos si, los datos enviados son mayor a 0 y si los archivos adjuntados son mayor a 0(esto quiere decir que se completo el formulario)
entonces limpiamos las variables, recargamos el data table con los nuevos documentos ingresados para finalizar mostramos un sweetalert con 
el envio de documento exitoso.

```javascript
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
```
c

