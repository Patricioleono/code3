<!--MODAL -->
<div class="modal fade" id="modalCreateDoc" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
	 aria-labelledby="staticBackdropLabel" aria-hidden="true">
	<div class="modal-dialog modal-dialog-scrollable modal-lg">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title w-100 text-center" id="exampleModalLabel">Crear Documento</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">

				<form class="row g-3 d-flex justify-content-center" method="post" enctype="multipart/form-data"
					  id="formAjax">
					<div class="col-10">
						<div class="input-group mb-3">
							<selectorprestaciones-component class="w-100">
								<div class="text-center mb-1">Dirigido a: <i class="fa-solid fa-user-plus"></i>
								</div>
								<selector-webcomponent name="selectorpersonas"
													   url="http://10.5.225.24/api/index.php/SelectorWebComponent/lists"
													   cat="personas" subcat="responsables_documentos" list="true"
													   token="<?= $token;?>"
													   confirmDelete="true" allowDuplicates="false"
													   label="Agregar Usuarios.." id="selectorUser">

								</selector-webcomponent>
							</selectorprestaciones-component>
						</div>
					</div>
					<hr class="border border-1"/>
					<div class="col-5">
						<div class="input-group mb-3">
							<span class="input-group-text" id="inputGroup-sizing-default">Asunto</span>
							<input type="text" class="form-control" aria-label="Sizing example input"
								   aria-describedby="inputGroup-sizing-default" placeholder="Ej: Horas extras.."
								   id="asunto" name="asunto">
						</div>
					</div>
					<div class="col-5">
						<div class="input-group mb-3">
							<span class="input-group-text" id="inputGroup-sizing-default">N° Folio</span>
							<input type="text" class="form-control" aria-label="Sizing example input"
								   aria-describedby="inputGroup-sizing-default" placeholder="Ej: 2022-001..."
								   id="folio" name="folio">
						</div>
					</div>
					<div class="col-12 d-flex justify-content-center">
						<div class="col-10">
							<select id="chooseType" class="form-select" aria-label="Default select example">
								<option selected>Tipo de Documento</option>
								<option value="privado">Privado</option>
								<option value="ordinario">Ordinario</option>
								<option value="importante">Importante</option>
							</select>
						</div>
					</div>

					<div class="col-10">
						<div class="input-group">
							<span class="input-group-text">Comentario</span>
							<textarea class="form-control" aria-label="With textarea" id="comentario"
									  name="comentario"></textarea>
						</div>
					</div>

					<hr class="border border-1"/>
					<div class="col-md-10">
						<div class="file-loading">
							<input id="file" name="file[]" type="file" data-preview-file-type="text" multiple>
						</div>
					</div>

				</form>

			</div>
			<div class="modal-footer d-flex justify-content-center">
				<button type="submit" id="btnSendForm" class="btn btn-primary">Guardar y Enviar</button>
			</div>
		</div>
	</div>
</div>
