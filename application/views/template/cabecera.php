<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--LINK CSS,FONT AWESOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link href="<?= base_url('assets/css/style.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/css/sidebarBoton.css') ?>" rel="stylesheet" type="text/css">
    <link href="<?= base_url('assets/css/sidebar.css') ?>" rel="stylesheet" type="text/css">
    <title>N°recibidos-usuario</title>
</head>

<body>
    <!--CONTENEDOR SIDEBAR & DATA-TABLE -->

    <div class="d-flex w-100" id="wrapper">
        <!--SIDEBAR-->
        <div class="border-end bg-white" id="sidebar-wrapper">
            <div class="sidebar-heading border-bottom bg-light">
                <!--DISPARADOR MODAL-->
                <button type="button" class="btn btn-outline-dark" data-bs-toggle="modal" data-bs-target="#crearModal">
                    <i class="fa-solid fa-file-circle-plus"></i>
                    Crear Documento
                </button>

                <button type="button" class="btn-close position-absolute start-10 buttonX" id="sidebarToggle" aria-label="Close"></button>
            </div>
            <!--ITEM-->
            <div class="list-group list-group-flush" id="list-tab" role="tablist">
                <a class="list-group-item" data-bs-toggle="list" href="#list-recibidos">
                    <i class="fa-solid fa-inbox"></i>
                    Recibidos
                    <span class="badge text-bg-info position-absolute end-0 me-5">4</span>
                </a>
                <a class="list-group-item text-star" id="list-enviados-list" data-bs-toggle="list" href="#list-enviados" role="tab" aria-controls="list-enviados">
                    <i class="fa-regular fa-paper-plane"></i>
                    Enviados
                    <span class="badge colorGreen text-dark position-absolute end-0 me-5">4</span>
                </a>

                <a class="list-group-item text-star" id="list-aprobados-list" data-bs-toggle="list" href="#list-aprobados" role="tab" aria-controls="list-aprobados">
                    <i class="fa-solid fa-envelope-circle-check"></i>
                    Aprobados
                    <span class="badge colorBlue text-dark position-absolute end-0 me-5">4</span>
                </a>

                <a class="list-group-item text-star" id="list-importantes-list" data-bs-toggle="list" href="#list-importantes" role="tab" aria-controls="list-importantes">
                    <i class="fa-solid fa-circle-exclamation"></i>
                    Importantes
                    <span class="badge colorRed text-dark position-absolute end-0 me-5">4</span>
                </a>
            </div>
        </div>