<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--LINK CSS,FONT AWESOME-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <title>N°recibidos-usuario</title>
</head>

<body>
    <!--BARRA DE NAVEGACIÓN -->
    <nav class="navbar  bg-primary row p-3">
        <div class="col col-3">
            <a class="navbar-brand text-white p-2" href="#">
                <i class="far fa-folder p-2"></i>
                Seguimiento de Documentación
            </a>
        </div>
        <div class="col col-6">
            <div class="input-group text-white">
                <span class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-magnifying-glass"></i></span>
                <input type="text" class="form-control text-center fs-5" placeholder="Buscar Documentos" aria-label="Buscar Documentos" aria-describedby="addon-wrapping">
                <button class="input-group-text" id="addon-wrapping"><i class="fa-solid fa-bars"></i></button>
            </div>
        </div>
        <div class="col col-3 text-end pt-2">
            <div class="text-white text-center text-uppercase fs-6">Usuario <i class="fa-regular fa-circle-user"></i></div>
            <div class="text-center"> <button class="btn btn-primary bg-danger text-uppercase fs-6 m-1" id="cerrarSession"> Cerrar Session</button></div>

        </div>

    </nav>