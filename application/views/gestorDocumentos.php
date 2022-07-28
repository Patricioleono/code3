<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
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


    <!--CONTENIDO-->
    <div class="w-100">
        <!--CONTENIDO DE LA TABLA-->


        <div class="container-fluid">
            <br />
            <p class="ps-4" id="hidden">
                <button class="btn btn-primary lateral" id="sidebarToggle2" style="display:none;">
                    <i class="fa-solid fa-arrow-right-to-bracket"></i>
                    Desplegar Menu
                </button>
            </p>
            <div class="container-fluid">
                <div class="tab-content tab-pane show w-100" id="list-recibidos" role="tabpanel" aria-labelledby="list-recibidos-list">
                    <table class="table border border-1 text-start display" id="data_table" style="width: 100%;">
                        <thead class="col col-auto">
                            <tr class="col col-auto">
                                <th scope="col" class="">Prioridad Doc.</th>
                                <th scope="col">Asunto Doc.</th>
                                <th scope="col">Comentario Doc.</th>
                                <th scope="col">N° de Folio.</th>
                                <th scope="col">Estado del Doc.</th>
                                <th scope="col">Seguimiento Doc.</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>Importante <i class="fa-solid fa-circle-exclamation" style="color: red;"></i></td>
                                <th>Gestión Horas</th>
                                <td>Gestionar Horas Extras..</td>
                                <td>2022-001</td>
                                <td></td>
                                <td>
                                    <a href="" class="fa-regular fa-eye text-decoration-none text-dark">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Importante <i class="fa-solid fa-circle-exclamation" style="color: red;"></i></td>
                                <th>Gestion Horas</th>
                                <td>Gestionar Horas Extras..</td>
                                <td>2022-001</td>
                                <td>Pendiente</td>
                                <td>
                                    <a href="" class="fa-regular fa-eye text-decoration-none text-dark">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Ordinario <i class="fa-solid fa-envelope ps-2"></i></td>
                                <th>Gestion Horas</th>
                                <td>Gestionar Horas Extras..</td>
                                <td>2022-001</td>
                                <td>Pendiente</td>
                                <td>
                                    <a href="" class="fa-regular fa-eye text-decoration-none text-dark">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Privado <i class="fa-solid fa-lock ps-4"></i></td>
                                <th>Gestion Horas</th>
                                <td>Gestionar Horas Extras..</td>
                                <td>2022-001</td>
                                <td>Pendiente</td>
                                <td>
                                    <a href="" class="fa-regular fa-eye text-decoration-none text-dark">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Importante <i class="fa-solid fa-circle-exclamation" style="color: red;"></i></td>
                                <th>Gestion Horas</th>
                                <td>Gestionar Horas Extras..</td>
                                <td>2022-001</td>
                                <td>Pendiente</td>
                                <td>
                                    <a href="" class="fa-regular fa-eye text-decoration-none text-dark">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Importante <i class="fa-solid fa-circle-exclamation" style="color: red;"></i></td>
                                <th>Gestion Horas</th>
                                <td>Gestionar Horas Extras..</td>
                                <td>2022-001</td>
                                <td>Pendiente</td>
                                <td>
                                    <a href="" class="fa-regular fa-eye text-decoration-none text-dark">
                                    </a>
                                </td>
                            </tr>
                            <tr>
                                <td>Importante <i class="fa-solid fa-circle-exclamation" style="color: red;"></i></td>
                                <th>Gestion Horas</th>
                                <td>Gestionar Horas Extras..</td>
                                <td>2022-001</td>
                                <td>Pendiente</td>
                                <td>
                                    <a href="" class="fa-regular fa-eye text-decoration-none text-dark">
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>


    <!--MODAL -->
    <div class="modal fade" id="crearModal" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-scrollable modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title w-100 text-center" id="exampleModalLabel">Crear Documento</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">

                    <form class="row g-3 d-flex justify-content-center" method="post" enctype="multipart/form-data" id="formAjax">
                        <div class="col-10">
                            <div class="input-group mb-3">
                                <selectorprestaciones-component class="w-100">
                                    <div class="text-center mb-1">Dirigido a: <i class="fa-solid fa-user-plus"></i></div>
                                    <selector-webcomponent name="selectorpersonas" url="http://10.5.225.24/api/index.php/SelectorWebComponent/lists" cat="personas" list="true" token="<?= $usuario; ?>" confirmDelete="true" allowDuplicates="false" placeholder="Agregar Usuarios.." id="selectorUser">


                                    </selector-webcomponent>
                                </selectorprestaciones-component>
                            </div>
                        </div>
                        <hr class="border border-1" />
                        <div class="col-5">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">Asunto</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Ej: Horas extras.." id="asunto" name="asunto">
                            </div>
                        </div>
                        <div class="col-5">
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="inputGroup-sizing-default">N° Folio</span>
                                <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Ej: 2022-001..." id="folio" name="folio">
                            </div>
                        </div>
                        <div class="col-12 d-flex justify-content-center">
                            <div class="col-10">
                                <select id="select" class="form-select" aria-label="Default select example">
                                    <option selected>Tipo de Documento</option>
                                    <option value="privado">Privado</option>
                                    <option value="ordinario">Ordinario</option>
                                    <option value="importante">Importante</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-10">
                            <div class="input-group">
                                <span class="input-group-text">Comentario</span>
                                <textarea class="form-control" aria-label="With textarea" id="comentario" name="comentario"></textarea>
                            </div>
                        </div>

                        <hr class="border border-1" />
                        <div class="col-md-10">
                            <div class="file-loading">
                                <input id="file" name="file[]" type="file" multiple>
                            </div>
                        </div>

                    </form>

                </div>
                <div class="modal-footer d-flex justify-content-center">
                    <button type="submit" id="btnAjax" class="btn btn-primary">Guardar y Enviar</button>
                </div>
            </div>
        </div>
    </div>