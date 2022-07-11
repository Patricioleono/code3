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
    <link href="<?= base_url('assets/css/sidebar.css') ?>" rel="stylesheet" type="text/css">
    <title>N°recibidos-usuario</title>
</head>

<body class="bodyCustom">
    <!--BARRA DE NAVEGACIÓN -->
    <nav class="navbar custom row p-1">
        <div class="col col-2">
            <a class="navbar-brand text-white p-5" href="#">
                <i class="far fa-folder p-1"></i>
                Seguimiento de Documentación
            </a>
        </div>
        <!--INPUT BÚSQUEDA -->
        <div class="col col-4">
            <div class="input-group text-white">
                <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-magnifying-glass"></i></span>
                <input type="text" class="form-control text-center fs-5" placeholder="Buscar Documentos" aria-label="Buscar Documentos" aria-describedby="addon-wrapping">

                <!--TRIGGER DROPDOWN-->
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
                            <span class="input-group-text" id="basic-addon3">Recepeptor/Para:</span>
                            <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                        </li>
                        <li class="input-group mb-3">
                            <span class="input-group-text" id="basic-addon3">Asunto</span>
                            <input type="text" class="form-control" id="basic-url" aria-describedby="basic-addon3">
                        </li>
                        <select class="form-select mb-3" aria-label="Default select example">
                            <option selected>Selecciones Estado de Documento</option>
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

        <div class="col col-2 pt-2">
            <div class="text-white text-center text-uppercase fs-6">Usuario <i class="fa-regular fa-circle-user"></i></div>
            <div class="text-center"> <button class="buttonCustom text-uppercase fs-6 m-1" id="cerrarSession"> Cerrar Session</button></div>

        </div>


    </nav>





    <div class="ms-2 col col-12">


    </div>
    </div>

    </div>