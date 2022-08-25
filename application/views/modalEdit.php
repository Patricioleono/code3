<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="modalEdit" aria-hidden="true">
	<div class="modal-dialog modal-xl">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="modalEdit">Editar Documento</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
			</div>
			<div class="modal-body">
				<form class="row g-3 d-flex justify-content-center" method="post" enctype="multipart/form-data"
					  id="">
					<div class="col-6">
						<div class="input-group mb-3">

							<span class="input-group-text" id="inputGroup-sizing-default">Asunto</span>
							<input type="text" class="form-control" aria-label="Sizing example input"
								   aria-describedby="inputGroup-sizing-default" placeholder="Ej: Horas extras.."
								   id="editAsunto" name="editAsunto">
						</div>
					</div>
					<div class="col-6">
						<div class="input-group mb-3">
							<span class="input-group-text" id="inputGroup-sizing-default">N° Folio</span>
							<input type="text" class="form-control" aria-label="Sizing example input"
								   aria-describedby="inputGroup-sizing-default" placeholder="Ej: 2022-001..."
								   id="editFolio" name="editFolio">
						</div>
					</div>
					<div class="col-12 d-flex justify-content-center">
						<div class="col-12">
							<select id="editType" class="form-select" aria-label="Default select example">
								<option selected id="editSelected">Tipo de Documento</option>
								<option value="privado">Privado</option>
								<option value="ordinario">Ordinario</option>
								<option value="importante">Importante</option>
							</select>
						</div>
					</div>

					<div class="col-12">
						<div class="input-group">
							<span class="input-group-text">Comentario</span>
							<textarea class="form-control" aria-label="With textarea" id="editComentario"
									  name="editComentario"></textarea>
						</div>
					</div>

					<hr class="border border-1"/>

					<div class="accordion col-12" id="accordionFlush">
						<div class="accordion-item">
							<h2 class="accordion-header" id="flush-headingTwo">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
										data-bs-target="#flush-collapseTwo" aria-expanded="false"
										aria-controls="flush-collapseTwo">
									Ver Documentos
								</button>
							</h2>
							<div id="flush-collapseTwo" class="accordion-collapse collapse"
								 aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlush">
								<div class="accordion-body">
									<div class="col-md-12 d-flex justify-content-start container-fluid"
										 id="previewDoc">

									</div>
								</div>
							</div>
						</div>
					</div>


					<div class="accordion col-12" id="accordionFlushExample">
						<div class="accordion-item">
							<h2 class="accordion-header" id="flush-headingOne">
								<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
										data-bs-target="#flush-collapseOne" aria-expanded="false"
										aria-controls="flush-collapseOne">
									Adjuntar Documento
								</button>
							</h2>
							<div id="flush-collapseOne" class="accordion-collapse collapse"
								 aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
								<div class="accordion-body">
									<div class="file-loading">
										<input id="updateFile" name="file[]" type="file" data-preview-file-type="text"
											   multiple>
									</div>
								</div>
							</div>
						</div>
					</div>


				</form>
			</div>
			<div class="modal-footer">
				<div class="d-grid gap-2 col-2 mx-auto">
					<button class="btn btn-primary" type="button" id="updateDataEdit">Actualizar</button>
				</div>
			</div>
		</div>
	</div>
</div>
