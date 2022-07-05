<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<br />
<!--BOTONES BUSCAR & CREAR NUEVO DOCUMENTO-->
<div class="container-sm">
    <div class="row justify-content-center p-4">
        <button id="buscarDocumentos" class="col col-5 btn btn-primary border border-3 bg-primary rounded-3 text-white" style="--bs-bg-opacity: .80;">
            <i class="fab fa-searchengin p-2"></i> Buscar Documentos
        </button>
       
        <button id="crearDocumento" class="col col-5 btn btn-success border border-3 bg-success rounded-3 text-white" style="--bs-bg-opacity: .80;">
            <i class="fas fa-envelope-open-text p-2"></i> Crear Nuevo Documento
        </button>
    </div>
</div>

<!--TABLA QUE CONTIENE DATOS DE BDO -->
<div class="container-sm w-50">
    <div class="row justify-content-center">
        <div class="col">
            <div class="list-group list-group-horizontal" id="list-tab" role="tablist">
                <a class="list-group-item list-group-item-action border border-2" id="lPendientes" data-bs-toggle="list" href="#list-pendientes">Pendientes</a>
                <a class="list-group-item list-group-item-action border border-2" id="lRecibidos" data-bs-toggle="list" href="#list-recibidos" role="tab">Recibidos</a>
                <a class="list-group-item list-group-item-action border border-2" id="lEnviados" data-bs-toggle="list" href="#list-enviados" role="tab">Enviados</a>
                <a class="list-group-item list-group-item-action border border-2" id="lRbusqueda" data-bs-toggle="list" href="#list-rbusqueda" role="tab">Resultado Búsqueda</a>
            </div>
        </div>
        
        <div class="row justify-content-center">
            <div class="col">
                <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade" id="list-pendientes" role="tabpanel">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Color</th>
                                <th scope="col">First</th>
                                <th scope="col">Last</th>
                                <th scope="col">Turtle</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">Blue</th>
                                <td>Leonardo</td>
                                <td>da Vinci</td>
                                <td>Leo</td>
                            </tr>
                            <tr>
                                <th scope="row">Red</th>
                                <td>Raffaello</td>
                                <td>Sanzio da Urbino</td>
                                <td>Raph</td>
                            </tr>
                            <tr>
                                <th scope="row">Purple</th>
                                <td>Donato</td>
                                <td>di Niccolò di Betto Bardi</td>
                                <td>Donnie</td>
                            </tr>
                            <tr>
                                <th scope="row">Orange</th>
                                <td>Michelangelo</td>
                                <td>di Lodovico Buonarroti Simoni</td>
                                <td>Mikey</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
                    <div class="tab-pane fade" id="list-recibidos" role="tabpanel">recibidos</div>
                    <div class="tab-pane fade" id="list-enviados" role="tabpanel">enviados</div>
                    <div class="tab-pane fade" id="list-rbusqueda" role="tabpanel">resultado de la busqueda</div>
                </div>
            </div>
        </div>
    </div>
</div>

