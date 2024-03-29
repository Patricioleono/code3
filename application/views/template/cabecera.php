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
    <script type="text/javascript" src="/componentes/selector-webcomponent/v1/selector-webcomponent.bundle.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
    <link href="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/css/fileinput.min.css" media="all" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.3/css/all.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="text/javascript" src="/componentes/navbar-webcomponent/v1/navbar-webcomponent.js"></script>


    <title>N°recibidos <?= $_SESSION['cabnombre'] . " " . $_SESSION['cabapellido']; ?></title>
</head>

<body>

  <!-- 
<pre>
<?php
var_dump($_SESSION);
?>
</pre>

-->
    <nav class="navbar navbar-expand-md text-white custom border-bottom">
        <div class="container-fluid">

            <div class="collapse navbar-collapse row" id="navbarSupportedContent">
                <ul class="navbar-nav mt-2">
                    <li class="nav-item col">
                        <a class="navbar-brand text-white" href="#">
                            <i class="far fa-folder p-1"></i>
                            Seguimiento de Documentación
                        </a>
                    </li>

                   
                    <li class="nav-item dropdown input-group col">
                        <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-magnifying-glass"></i></span>
                        <input type="text" class="form-control text-center" placeholder="Buscar Documentos" aria-label="Buscar Documentos" aria-describedby="addon-wrapping">
                        <button class="input-group-text" id="dropDownFiltro" data-bs-toggle="dropdown" aria-expanded="false">
                            <i class="fa-solid fa-bars"></i>
                        </button>

                        <div class="dropdown-menu dropdown-menu col-12" aria-labelledby="navbarDropdown">
                            <div class="input-group mb-3 ps-2 pe-2">
                                <span class="input-group-text" id="basic-addon3">Emisor/De:</span>
                                <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                            </div>
                            <div class="input-group mb-3 ps-2 pe-2">
                                <span class="input-group-text" id="basic-addon3">Receptor/Para:</span>
                                <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                            </div>
                            <div class="input-group mb-3 ps-2 pe-2">
                                <span class="input-group-text" id="basic-addon3">Asunto</span>
                                <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                            </div>
                            <div class="pe-2 ps-2">
                                <select class="form-select mb-3 text-center" aria-label="Default select example">
                                    <option selected>Seleccione Estado de Documento</option>
                                    <option value="1">Recibido</option>
                                    <option value="2">Pendiente</option>
                                    <option value="3">Aprobado</option>
                                </select>

                            </div>
                            <div class="input-group mb-3 ps-2 pe-2">
                                <span class="input-group-text" id="basic-addon3">Buscar Desde</span>
                                <input type="date" class="form-control" id="fecha1" aria-describedby="basic-addon3">
                                <span class="input-group-text" id="basic-addon3">Hasta</span>
                                <input type="date" class="form-control" id="fecha2" aria-describedby="basic-addon3">
                            </div>
                            <hr class="dropdown-divider">
                            <div class="d-grid gap-2">
                                <button class="btn btn-primary" type="submit">Buscar</button>
                            </div>

                        </div>
                    </li>

                  
                    <li class="nav-item dropdown text-end col">

                        <a class="btn btn-outline-light dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <?= $_SESSION['cabnombre']  . " " . $_SESSION['cabapellido']; ?> <i class="fa-regular fa-circle-user"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="<?= site_url(); ?>">
                                Cerrar Session
                                <i class="fa-regular fa-rectangle-xmark ps-1 ms-4"></i>
                            </a>
                            <a class="dropdown-item" href="http://intranet/">
                                Volver al Intranet
                                <i class="fa-solid fa-arrow-rotate-left ms-2"></i>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>


        </div>
    </nav>

<!--
<navbar-webcomponent
        titulo="Gestor Documentos"
        nombreUsuario="<?= $_SESSION['cabnombre']  . " " . $_SESSION['cabapellido']; ?>"
        urlIntranet="http://10.5.225.24"
        urlInicio="http://10.5.225.24/desarrollo_plo/gestorDocumentos"
        urlAvatar="https://png.pngtree.com/png-clipart/20190924/original/pngtree-user-vector-avatar-png-image_4830521.jpg"   
        tema="navbar-dark"    
        color="#3a76aa"
      ></navbar-webcomponent> -->

