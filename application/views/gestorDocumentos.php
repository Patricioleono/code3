<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>



<!--CONTENIDO-->
<div class="w-100">
    <!--CONTENIDO DE LA TABLA-->
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

                    <!--BÚSQUEDA-->
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

                    <!--USUARIO-->
                    <li class="nav-item dropdown text-end col">
                        <i class="fa-regular fa-calendar fs-6"></i>
                        <span class="me-3"> 13-07-2022 </span>

                        <a class="btn btn-outline-light dropdown-toggle" id="navbarDropdown" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Usuario <i class="fa-regular fa-circle-user"></i>
                        </a>

                        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="#!">
                                Cerrar Session
                                <i class="fa-regular fa-rectangle-xmark ps-1 ms-4"></i>
                            </a>
                            <a class="dropdown-item" href="#!">
                                Volver al Intranet
                                <i class="fa-solid fa-arrow-rotate-left ms-2"></i>
                            </a>
                        </div>
                    </li>
                </ul>
            </div>


        </div>
    </nav>

    <div class="container-fluid">
        <br />
        <p class="ps-4" id="hidden">
            <button class="btn btn-primary lateral" id="sidebarToggle2" style="display:none;">
                <i class="fa-solid fa-arrow-right-to-bracket"></i>
                Desplegar Menu
            </button>
        </p>
        <div class="container-fluid">
            <div class="tab-content tab-pane show active w-100" id="list-recibidos" role="tabpanel" aria-labelledby="list-recibidos-list">
                <table class="table border border-3 text-start">
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
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title w-100 text-center" id="exampleModalLabel">Crear Documento</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <form class="row g-3 d-flex justify-content-center">
                    <div class="col-10">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Dirigido a:</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Buscar Usuarios...">
                        </div>
                        <!--INSERTAR WEB COMPONENT -->
                    </div>
                    <hr class="border border-1" />

                    <div class="col-5">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">Asunto</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Ej: Horas extras..">
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="input-group mb-3">
                            <span class="input-group-text" id="inputGroup-sizing-default">N° Folio</span>
                            <input type="text" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-default" placeholder="Ej: 2022-001...">
                        </div>
                    </div>
                    <div class="col-12 d-flex justify-content-center">
                        <div class="col-10">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>Tipo de Documento</option>
                                <option value="1">Privado</option>
                                <option value="2">Ordinario</option>
                                <option value="3">Importante</option>
                            </select>
                        </div>
                    </div>


                    <div class="col-10">
                        <div class="input-group">
                            <span class="input-group-text">Comentario</span>
                            <textarea class="form-control" aria-label="With textarea"></textarea>
                        </div>
                    </div>
                    <hr class="border border-1" />
                    <div class="col-md-10">
                        <div class="mb-3">
                            <input class="form-control" type="file" id="formFile">
                            <br />
                            <p class="text-center">
                                <i class="fa-solid fa-arrow-up"></i>
                                Seleccione Documentos para Agregar
                                <i class="fa-solid fa-arrow-up"></i>
                            </p>
                        </div>
                    </div>

                    <div class="col-12 d-flex justify-content-center">
                        <div class="col-10 mb-5">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>
                                            Nombre Adjunto
                                        </th>
                                        <th class="text-start">
                                            Acción
                                        </th>
                                    </tr>

                                </thead>
                                <tbody>
                                    <tr>
                                        <th>archivo.txt</th>
                                        <td class="text-start">
                                            <a href="" class="text-decoration-none nav-item text-black">
                                                <i class="fa-solid fa-ban"></i>
                                            </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </form>

            </div>
            <div class="modal-footer d-flex justify-content-center">
                <button type="submit" class="btn btn-primary">Guardar y Enviar</button>
            </div>
        </div>
    </div>
</div>