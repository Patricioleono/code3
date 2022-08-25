<div class="modal fade" id="modalReSend" tabindex="-1" aria-labelledby="modalReSend" aria-hidden="true">
	<div class="modal-dialog modal-xl modal-dialog-scrollable">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title align-center" id="modalReSend">Revision Documento</h5>
				<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"
						id="closeSend"></button>
			</div>
			<div class="modal-body">
				<form method="post" enctype="multipart/form-data">
					<div class="card">
						<div class="card-header">
							<div class="row">
								<div class="text-start col-6" id="sendAsunto"></div>
								<div class="text-start col-6" id="sendFolio"></div>
							</div>
						</div>
						<div class="card-body row">
							<!--image or div with doc data view-->
							<div class="col-6">

								<div class="row" id="leftColumn">
									<p class="card-text p-3" id="docDestiny">
										<!--ajax send data to show-->
									</p>

									<blockquote class="blockquote mb-0 ">
										<h5 class="card-title"></h5>
										<p id="sendComentario"></p>
										<footer class="blockquote-footer mt-2">
											Fecha:
											<cite title="Source Title" id="sendFecha">

											</cite>
										</footer>
									</blockquote>
									<div class="col-12 mt-3 d-none" id="derivateFile">
										<div class="accordion col-12" id="accordionFlushExample">
											<div class="accordion-item" id="derivateDocAdd">
												<h2 class="accordion-header" id="flush-headingOne">
													<button class="accordion-button collapsed" type="button"
															data-bs-toggle="collapse"
															data-bs-target="#flush-collapseOne" aria-expanded="false"
															aria-controls="flush-collapseOne">
														Adjuntar Documento
													</button>
												</h2>
												<div id="flush-collapseOne" class="accordion-collapse collapse"
													 aria-labelledby="flush-headingOne"
													 data-bs-parent="#accordionFlushExample">
													<div class="accordion-body">
														<div class="file-loading">
															<input id="addDerivateFile" name="file[]" type="file"
																   data-preview-file-type="text"
																   multiple>
														</div>
													</div>
												</div>
											</div>
										</div>
									</div>
								</div>

							</div>
							<div class="col-6">
								<div class="row" id="docData">


								</div>
							</div>
						</div>

					</div>
				</form>
			</div>
			<div class="modal-footer">
				<div class="row">
					<div class="col-12" id="footerHide">
						<button type="button" class="btn btn-outline-secondary m-1" id="derivationBtn"
						">
						<i class="fa-solid fa-person-walking-arrow-right"></i>
						<br/>
						Derivar
						</button>

						<button type="button" class="btn btn-outline-success m-1" id="archivedBtn" value="">
							<i class="fa-solid fa-sd-card"></i>
							<br/>
							Archivar
						</button>
					</div>

					<button type="button" class="btn btn-outline-primary d-none" id="derivationBtnSend">
						<i class="fa-solid fa-person-walking-arrow-right"></i>
						<br/>
						Derivar
					</button>
					<input type="hidden" name="formValue" id="formValue">

				</div>
			</div>
		</div>
	</div>
</div>
