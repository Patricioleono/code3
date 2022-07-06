<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<br />
<!--BOTONES BUSCAR TRIGGER DEL MODAL & CREAR NUEVO DOCUMENTO-->
<div class="container-sm">
    <div class="row justify-content-center p-4">
        <button id="buscarDocumentos" data-bs-toggle="modal" data-bs-target="#staticModal" class="col col-5 btn btn-primary border border-3 bg-primary rounded-3 text-white">
            <i class="fab fa-searchengin p-2"></i> Buscar Documentos
        </button>

        <!--MODAL-->
        <div class="modal fade" id="staticModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticModalLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        contenido
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Understood</button>
                    </div>
                </div>
            </div>
        </div>

        <button id="crearDocumento" class="col col-5 btn btn-success border border-3 bg-success rounded-3 text-white">
            <i class="fas fa-envelope-open-text p-2"></i> Crear Nuevo Documento
        </button>
    </div>
</div>

<!--BOTONES DE CABECERA DE TABLA QUE CONTIENE DATOS DE BDO -->
<div class="container-sm w-50">
    <div class="row justify-content-center">
        <div class="col">
            <div class="list-group list-group-horizontal" id="list-tab" role="tablist">
                <a class="btn btn-danger btn-lg list-group-item list-group-item-action list-group-item-danger text-center" id="lPendientes" data-bs-toggle="list" href="#list-pendientes">
                    Pendientes
                    <span class="badge bg-danger">
                        6
                    </span>
                </a>
                <a class="btn btn-warning btn-lg list-group-item list-group-item-action list-group-item-warning text-center" id="lRecibidos" data-bs-toggle="list" href="#list-recibidos" role="tab">
                    Recibidos
                    <span class="badge bg-warning">
                        4
                    </span>
                </a>
                <a class="btn btn-success btn-lg list-group-item list-group-item-action list-group-item-success text-center" id="lEnviados" data-bs-toggle="list" href="#list-enviados" role="tab">
                    Enviados
                    <span class="badge bg-success">
                        4
                    </span>
                </a>
                <a class="btn btn-info btn-lg list-group-item list-group-item-action list-group-item-info text-center" id="lRbusqueda" data-bs-toggle="list" href="#list-rbusqueda" role="tab">
                    Resultado Búsqueda
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-info">
                        99+
                    </span>
                </a>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col">
                <div class="tab-content" id="nav-tabContent">
                    <!--DETALLE DOCUMENTOS RECIBIDOS VER DOCUMENTOS SEGÚN RECURSIVIDAD -->
                    <div class="tab-pane fade" id="list-pendientes" role="tabpanel">
                        <br />
                        <table class="text-center table table-striped  border border-4 w-100">
                            <thead>
                                <tr>
                                    <th scope="col">Tipo Doc.</th>
                                    <th scope="col">Confidencialidad</th>
                                    <th scope="col">Titulo Doc.</th>
                                    <th scope="col">Folio</th>
                                    <th scope="col">Enviado</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Seguimiento</th>
                                    <th scope="col">Revisar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">Ordinario</td>
                                    <td>Privado</td>
                                    <td>Permiso Dias</td>
                                    <td>06072022</td>
                                    <td>Nicolas</td>
                                    <td>Enviado</td>
                                    <!--SEGUIMIENTO-->
                                    <td>
                                        <a href="#">
                                            <i class="fa-solid fa-bars-staggered"></i>
                                        </a>
                                    </td>
                                    <!--REVISAR DOCUMENTO-->
                                    <td>
                                        <a href="#">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">Red</td>
                                    <td>Raffaello</td>
                                    <td>Sanzio da Urbino</td>
                                    <td>Raph</td>
                                    <td>Leonardo</td>
                                    <td>da Vinci</td>
                                    <!--SEGUIMIENTO-->
                                    <td>
                                        <a href="#">
                                            <i class="fa-solid fa-bars-staggered"></i>
                                        </a>
                                    </td>
                                    <!--REVISAR DOCUMENTO-->
                                    <td>
                                        <a href="#">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">Purple</td>
                                    <td>Donato</td>
                                    <td>di Niccolò di Betto Bardi</td>
                                    <td>Donnie</td>
                                    <td>Leonardo</td>
                                    <td>da Vinci</td>
                                    <!--SEGUIMIENTO-->
                                    <td>
                                        <a href="#">
                                            <i class="fa-solid fa-bars-staggered"></i>
                                        </a>
                                    </td>
                                    <!--REVISAR DOCUMENTO-->
                                    <td>
                                        <a href="#">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">Orange</td>
                                    <td>Michelangelo</td>
                                    <td>di Lodovico Buonarroti Simoni</td>
                                    <td>Mikey</td>
                                    <td>Leonardo</td>
                                    <td>da Vinci</td>
                                    <!--SEGUIMIENTO-->
                                    <td>
                                        <a href="#">
                                            <i class="fa-solid fa-bars-staggered"></i>
                                        </a>
                                    </td>
                                    <!--REVISAR DOCUMENTO-->
                                    <td>
                                        <a href="#">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!--DETALLE TABLAS DOCUMENTOS RECIBIDOS -->
                    <div class="tab-pane fade" id="list-recibidos" role="tabpanel">
                        <br />
                        <table class="text-center table table-striped  border border-4 w-100">
                            <thead>
                                <tr>
                                    <th scope="col">Tipo Doc.</th>
                                    <th scope="col">Confidencialidad</th>
                                    <th scope="col">Titulo Doc.</th>
                                    <th scope="col">Folio</th>
                                    <th scope="col">Enviado</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Seguimiento</th>
                                    <th scope="col">Revisar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">Ordinario</td>
                                    <td>Privado</td>
                                    <td>Permiso Dias</td>
                                    <td>06072022</td>
                                    <td>Nicolas</td>
                                    <td>Enviado</td>
                                    <!--SEGUIMIENTO-->
                                    <td>
                                        <a href="#">
                                            <i class="fa-solid fa-bars-staggered"></i>
                                        </a>
                                    </td>
                                    <!--REVISAR DOCUMENTO-->
                                    <td>
                                        <a href="#">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">Red</td>
                                    <td>Raffaello</td>
                                    <td>Sanzio da Urbino</td>
                                    <td>Raph</td>
                                    <td>Leonardo</td>
                                    <td>da Vinci</td>
                                    <!--SEGUIMIENTO-->
                                    <td>
                                        <a href="#">
                                            <i class="fa-solid fa-bars-staggered"></i>
                                        </a>
                                    </td>
                                    <!--REVISAR DOCUMENTO-->
                                    <td>
                                        <a href="#">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">Purple</td>
                                    <td>Donato</td>
                                    <td>di Niccolò di Betto Bardi</td>
                                    <td>Donnie</td>
                                    <td>Leonardo</td>
                                    <td>da Vinci</td>
                                    <!--SEGUIMIENTO-->
                                    <td>
                                        <a href="#">
                                            <i class="fa-solid fa-bars-staggered"></i>
                                        </a>
                                    </td>
                                    <!--REVISAR DOCUMENTO-->
                                    <td>
                                        <a href="#">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">Orange</td>
                                    <td>Michelangelo</td>
                                    <td>di Lodovico Buonarroti Simoni</td>
                                    <td>Mikey</td>
                                    <td>Leonardo</td>
                                    <td>da Vinci</td>
                                    <!--SEGUIMIENTO-->
                                    <td>
                                        <a href="#">
                                            <i class="fa-solid fa-bars-staggered"></i>
                                        </a>
                                    </td>
                                    <!--REVISAR DOCUMENTO-->
                                    <td>
                                        <a href="#">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!--DETALLES TABLA DOCUMENTOS ENVIADOS -->
                    <div class="tab-pane fade" id="list-enviados" role="tabpanel">
                        <br />
                        <table class="text-center table table-striped  border border-4 w-100">
                            <thead>
                                <tr>
                                    <th scope="col">Tipo Doc.</th>
                                    <th scope="col">Confidencialidad</th>
                                    <th scope="col">Titulo Doc.</th>
                                    <th scope="col">Folio</th>
                                    <th scope="col">Enviado</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Seguimiento</th>
                                    <th scope="col">Revisar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">Ordinario</td>
                                    <td>Privado</td>
                                    <td>Permiso Dias</td>
                                    <td>06072022</td>
                                    <td>Nicolas</td>
                                    <td>Enviado</td>
                                    <!--SEGUIMIENTO-->
                                    <td>
                                        <a href="#">
                                            <i class="fa-solid fa-bars-staggered"></i>
                                        </a>
                                    </td>
                                    <!--REVISAR DOCUMENTO-->
                                    <td>
                                        <a href="#">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">Red</td>
                                    <td>Raffaello</td>
                                    <td>Sanzio da Urbino</td>
                                    <td>Raph</td>
                                    <td>Leonardo</td>
                                    <td>da Vinci</td>
                                    <!--SEGUIMIENTO-->
                                    <td>
                                        <a href="#">
                                            <i class="fa-solid fa-bars-staggered"></i>
                                        </a>
                                    </td>
                                    <!--REVISAR DOCUMENTO-->
                                    <td>
                                        <a href="#">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">Purple</td>
                                    <td>Donato</td>
                                    <td>di Niccolò di Betto Bardi</td>
                                    <td>Donnie</td>
                                    <td>Leonardo</td>
                                    <td>da Vinci</td>
                                    <!--SEGUIMIENTO-->
                                    <td>
                                        <a href="#">
                                            <i class="fa-solid fa-bars-staggered"></i>
                                        </a>
                                    </td>
                                    <!--REVISAR DOCUMENTO-->
                                    <td>
                                        <a href="#">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">Orange</td>
                                    <td>Michelangelo</td>
                                    <td>di Lodovico Buonarroti Simoni</td>
                                    <td>Mikey</td>
                                    <td>Leonardo</td>
                                    <td>da Vinci</td>
                                    <!--SEGUIMIENTO-->
                                    <td>
                                        <a href="#">
                                            <i class="fa-solid fa-bars-staggered"></i>
                                        </a>
                                    </td>
                                    <!--REVISAR DOCUMENTO-->
                                    <td>
                                        <a href="#">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <!--DETALLE TABLA DOCUMENTOS BUSCADOS -->
                    <div class="tab-pane fade" id="list-rbusqueda" role="tabpanel">
                        <br />
                        <table class="text-center table table-striped  border border-4 w-100">
                            <thead>
                                <tr>
                                    <th scope="col">Tipo Doc.</th>
                                    <th scope="col">Confidencialidad</th>
                                    <th scope="col">Titulo Doc.</th>
                                    <th scope="col">Folio</th>
                                    <th scope="col">Enviado</th>
                                    <th scope="col">Estado</th>
                                    <th scope="col">Seguimiento</th>
                                    <th scope="col">Revisar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td scope="row">Ordinario</td>
                                    <td>Privado</td>
                                    <td>Permiso Dias</td>
                                    <td>06072022</td>
                                    <td>Nicolas</td>
                                    <td>Enviado</td>
                                    <!--SEGUIMIENTO-->
                                    <td>
                                        <a href="#">
                                            <i class="fa-solid fa-bars-staggered"></i>
                                        </a>
                                    </td>
                                    <!--REVISAR DOCUMENTO-->
                                    <td>
                                        <a href="#">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">Red</td>
                                    <td>Raffaello</td>
                                    <td>Sanzio da Urbino</td>
                                    <td>Raph</td>
                                    <td>Leonardo</td>
                                    <td>da Vinci</td>
                                    <!--SEGUIMIENTO-->
                                    <td>
                                        <a href="#">
                                            <i class="fa-solid fa-bars-staggered"></i>
                                        </a>
                                    </td>
                                    <!--REVISAR DOCUMENTO-->
                                    <td>
                                        <a href="#">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">Purple</td>
                                    <td>Donato</td>
                                    <td>di Niccolò di Betto Bardi</td>
                                    <td>Donnie</td>
                                    <td>Leonardo</td>
                                    <td>da Vinci</td>
                                    <!--SEGUIMIENTO-->
                                    <td>
                                        <a href="#">
                                            <i class="fa-solid fa-bars-staggered"></i>
                                        </a>
                                    </td>
                                    <!--REVISAR DOCUMENTO-->
                                    <td>
                                        <a href="#">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                                <tr>
                                    <td scope="row">Orange</td>
                                    <td>Michelangelo</td>
                                    <td>di Lodovico Buonarroti Simoni</td>
                                    <td>Mikey</td>
                                    <td>Leonardo</td>
                                    <td>da Vinci</td>
                                    <!--SEGUIMIENTO-->
                                    <td>
                                        <a href="#">
                                            <i class="fa-solid fa-bars-staggered"></i>
                                        </a>
                                    </td>
                                    <!--REVISAR DOCUMENTO-->
                                    <td>
                                        <a href="#">
                                            <i class="far fa-eye"></i>
                                        </a>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>