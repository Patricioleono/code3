####################
Gestor de Documentos
####################


El gestor de documentos tiene como fin el poder enviar recepcionar y tener el flujo
de los distintos documentos que se manejan en el hospital, esto con la intención
de tener todo respaldado de manera digital, esto esta apegado a  *[Ley de Transformación Digital](https://digital.gob.cl/transformacion-digital/ley-de-transformacion-digital/).*

*******************
Desarrollo
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
Codigo
*******************

##Vista##

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

