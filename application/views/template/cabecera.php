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

<body class="bodyCustom">
    <!--BARRA DE NAVEGACIÓN -->
    <nav class="navbar custom row" style=" height: 55px !important;">
        <div class="col col-2 mb-2">
            <a class="navbar-brand text-white p-5" href="#">
                <i class="far fa-folder p-1"></i>
                Seguimiento de Documentación
            </a>
        </div>
        <!--INPUT BÚSQUEDA -->
        <div class="col col-4  mb-2">
            <div class="input-group text-white fs-6">
                <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-magnifying-glass"></i></span>
                <input type="text" class="form-control text-center fs-6" placeholder="Buscar Documentos" aria-label="Buscar Documentos" aria-describedby="addon-wrapping">

            
                <button class="input-group-text" id="dropDownFiltro" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="fa-solid fa-bars"></i>
                </button>

                <!--MENU DROPDOWN BÚSQUEDA CON FILTROS -->
                <ul class="dropdown-menu col col-12" aria-labelledby="dropDownFiltro">
                    <div class="container">
                        <li class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon3">Emisor/De:</span>
                            <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                        </li>
                        <li class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon3">Receptor/Para:</span>
                            <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                        </li>
                        <li class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon3">Asunto</span>
                            <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                        </li>
                        <select class="form-select mb-3" aria-label="Default select example">
                            <option selected>Seleccione Estado de Documento</option>
                            <option value="1">Recibido</option>
                            <option value="2">Pendiente</option>
                            <option value="3">Aprobado</option>
                        </select>
                        <li>
                        <li class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon3">Buscar Desde</span>
                            <input type="date" class="form-control" id="fecha1" aria-describedby="basic-addon3">
                            <span class="input-group-text" id="basic-addon3">Hasta</span>
                            <input type="date" class="form-control" id="fecha2" aria-describedby="basic-addon3">
                        </li>
                        <hr class="dropdown-divider">
                        </li>
                        <li class="d-grid gap-2 col-3 mx-auto">
                            <button class="btn btn-primary item-end" type="submit">Buscar</button>
                        </li>
                    </div>
                </ul>
            </div>
        </div>
        <div class="col col-2 dropdown">

            <button class="btn btn-outline-light dropdown-toggle text-center fs-6 mb-2" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                Usuario <i class="fa-regular fa-circle-user"></i>
            </button>

            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                <li>
                    <a class="dropdown-item" href="#">
                        Cerrar Session
                        <i class="fa-regular fa-rectangle-xmark ps-1 ms-4"></i>
                    </a>
                </li>
                <li>
                    <a class="dropdown-item" href="http://intranet/">
                        Volver al Intranet
                        <i class="fa-solid fa-arrow-rotate-left ms-2"></i>
                    </a>
                </li>
            </ul>

        </div>

    </nav>


    <nav class="navbar navbar-expand-lg bg-light border border-1 d-flex justify-content-between">

        <button class="ms-5 btn btn-success nav-toggler" data-bs-toggle="offacanvas" data-bs-target="offcanvasScrolling" aria-controls="offcanvasScrolling" id="sidebarToggle">
            <i class="fa-solid fa-bars"></i>
        </button>

        <div class="d-flex d-grid gap-2">
            <i class="fa-solid fa-calendar mt-1"></i>
            <label for="fecha" class="me-4" id="fecha">12 de julio de 2022</label>
        </div>
    </nav>