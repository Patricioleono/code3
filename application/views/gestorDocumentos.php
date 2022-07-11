<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!--CONTENEDOR SIDEBAR & DATA-TABLE -->
<div class="d-flex" id="wrapper">
    <div class="bg-white border border-1" id="sidebar-wrapper">
        <div class="sidebar-heading">
            <button class="btn btn-outline-primary">
                <i class="fa-solid fa-square-plus"></i>
                Crear Documento
            </button>
        </div>

        <div class="list-group list-group-flush">

            <a class="list-group-item" data-bs-toggle="list" href="#list-recibidos">
                <i class="fa-solid fa-inbox"></i>
                Recibidos
                <span class="badge text-bg-info position-absolute end-0 me-5">4</span>
            </a>

            <a class="list-group-item text-star" id="list-pendientes-list" data-bs-toggle="list" href="#list-pendientes" role="tab" aria-controls="list-pendientes">
                <i class="fa-solid fa-clock-rotate-left"></i>
                Pendientes
                <span class="badge colorYellow text-dark position-absolute end-0 me-5">4</span>
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



    <div class="justify-content-start pt-2 ps-2">
            <button class=" btn btn-success lateral" id="sidebarToggle"><i class="fa-solid fa-bars"></i></button>
        </div>
    <div id="page-content-wrapper" class="container">
        
        <div class="">
            <div class="col col-12 tab-content" id="nav-tabContent">
                <table class="tab-pane fade show table border border-3 text-center" id="list-recibidos" role="tabpanel" aria-labelledby="list-recibidos-list">
                    <thead>
                        <tr>
                            <th scope="col">Prioridad Doc.</th>
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
                            <td>Ordinario <i class="fa-solid fa-envelope"></i></td>
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
                            <td>Privado <i class="fa-solid fa-lock"></i></td>
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

                <table class="tab-pane fade show table w-100 border border-3" id="list-pendientes" role="tabpanel" aria-labelledby="list-pendientes-list">
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

                <table class="tab-pane fade show table w-100 border border-3" id="list-enviados" role="tabpanel" aria-labelledby="list-enviados-list">
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

                <table class="tab-pane fade show table w-100 border border-3" id="list-aprobados" role="tabpanel" aria-labelledby="list-aprobados-list">
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

                <table class="tab-pane fade show table w-100 border border-3" id="list-importantes" role="tabpanel" aria-labelledby="list-importantes-list">
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
        </div>

    </div>
</div>







<!--DATA TABLE CENTRO DINÁMICO-->