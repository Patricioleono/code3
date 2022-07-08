<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!--CONTENEDOR SIDEBAR & DATA-TABLE -->

<div class="row">
    <div class="col col-3 mb-1 pt-1 ms-1 position-fixed" id="sticky-sidebar">
        <div class="row">
            <nav class="navbar navbar-expand-lg">
                <div class="container row ms-2 col-12">
                    <button class="btn buttonCustomCrear col col-9"> <i class="fa-solid fa-square-plus"></i> Crear Documento</button>
                </div>
            </nav>

            <div class="ms-2 col col-9">
                <div class="list-group" id="list-tab" role="tablist">
                    <a class="list-group-item list-group-item-action text-center" id="list-recibidos-list" data-bs-toggle="list" href="#list-recibidos" role="tab" aria-controls="list-recibidos">
                        Recibidos 
                        <span class="badge text-bg-info">4</span>
                    </a>
                    <a class="list-group-item list-group-item-action text-center" id="list-pendientes-list" data-bs-toggle="list" href="#list-pendientes" role="tab" aria-controls="list-pendientes">
                        Pendientes 
                        <span class="badge colorYellow text-dark">4</span>
                    </a>
                    <a class="list-group-item list-group-item-action text-center" id="list-enviados-list" data-bs-toggle="list" href="#list-enviados" role="tab" aria-controls="list-enviados">
                        Enviados 
                        <span class="badge colorGreen text-dark">4</span>
                    </a>
                    <a class="list-group-item list-group-item-action text-center" id="list-aprobados-list" data-bs-toggle="list" href="#list-aprobados" role="tab" aria-controls="list-aprobados">
                        Aprobados 
                        <span class="badge colorBlue text-dark">4</span>
                    </a>
                    <a class="list-group-item list-group-item-active text-center" id="list-importantes-list" data-bs-toggle="list" href="#list-importantes" role="tab" aria-controls="list-importantes">
                        Importantes 
                        <span class="badge colorRed text-dark">4</span>
                    </a>
                </div>

            </div>
        </div>


    </div>
    <div class="row">
        <!--DATA TABLE CENTRO DINÁMICO-->
        <div class="row">
            <div class="container col offset-3 pt-1 tab-content" id="nav-tabContent">
                <table class="tab-pane fade show table w-100 border border-3" id="list-recibidos" role="tabpanel" aria-labelledby="list-recibidos-list">
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