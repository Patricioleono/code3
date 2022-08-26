<div class="offcanvas offcanvas-start nav-pills" style="z-index: 100 !important;" data-bs-scroll="true"
	 data-bs-backdrop="false" tabindex="-1" id="offcanvasScrolling" aria-labelledby="offcanvasScrollingLabel">
	<div class="offcanvas-title d-grid gap-2 p-2">
		<button type="button" class="btn btn-outline-primary mt-1" data-bs-toggle="modal" data-bs-target="#modalCreateDoc"
				id="btnCreateDoc">
			<i class="fa-solid fa-file-circle-plus"></i>
			Crear Documento
		</button>

	</div>
	<hr class="border-1">
	<div class="nav nav-pills flex-column mb-auto">
		<div class="nav-item d-grid gap-2 p-2" id="menu">
			<div class="list-group list-group-flush" id="list-tab" role="tablist">
				<!--RECIBIDOS-->
				<a class="list-group-item" type="button" data-column="0" value="" id="btnRecived">
					<i class="fa-solid fa-inbox"></i>
					Recibidos
					<span class="badge text-light bg-info position-absolute end-0 me-5"
						  id="allDocument"><?= $docRecive; ?></span>
				</a>
				<!--ENVIADOS-->
				<a class="list-group-item text-star" type="button">
					<i class="fa-regular fa-paper-plane"></i>
					Enviados
					<span class="badge bg-primary text-light position-absolute end-0 me-5"><?= $sendDoc; ?></span>
				</a>
				<!--Visualizados-->
				<a class="list-group-item text-star" type="button" id="btnSeeDoc">
					<i class="fa-solid fa-check-double"></i>
					Revisados
					<span class="badge bg-dark text-light position-absolute end-0 me-5"><?= $revisedDocument; ?></span>
				</a>
				<!--IMPORTANTES-->
				<a class="list-group-item text-star" type="button" data-column="0" value="IMPORTANTE" id="btnImportant">
					<i class="fa-solid fa-circle-exclamation"></i>
					Importantes
					<span class="badge bg-danger text-light position-absolute end-0 me-5"
						  id="importantDoc"><?= $importantDoc; ?></span>
				</a>
				<!--ARCHIVADOS-->
				<a class="list-group-item text-star" type="button" data-column="0" value="ARCHIVADOS" id="btnArchivados">
					<i class="fa-solid fa-envelope-circle-check"></i>
					Archivados
					<span class="badge bg-success text-light position-absolute end-0 me-5" id="archDoc"><?= $docArchived; ?></span>
				</a>
			</div>
		</div>
	</div>
</div>

