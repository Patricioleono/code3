<!-- MDB JAVASCRIPT & POPPER, BOOTSTRAPS, JQUERY -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="<?= base_url('assets/js/ajax.js'); ?>"></script>
<script src="<?= base_url('assets/js/main.js'); ?>"></script>

<script>
    $(document).ready(() => {
        $('#data_table').DataTable({
            scrollY: '50vh',
            scrollCollapse: true,
            lengthChange: false,
            info: false,
            searching: false,
            language: {
                "processing": "Procesando...",
                "lengthMenu": "Mostrar _MENU_ registros",
                "zeroRecords": "No se encontraron resultados",
                "emptyTable": "Ningún dato disponible en esta tabla",
                "infoFiltered": "(filtrado de un total de _MAX_ registros)",
                "infoThousands": ",",
                "loadingRecords": "Cargando...",

                "paginate": {
                    "first": "Primero",
                    "last": "Último",
                    "next": '<i class="fa-solid fa-arrow-right-long"></i>',
                    "previous": '<i class="fa-solid fa-arrow-left-long"></i>'
                }
            }
        });
        $("#sidebarToggle2").click(() => {
            $('#hidden').hide();
        });

        $("#sidebarToggle").click(() => {
            $('#hidden').show();
        });


        $('input[name=undoc]').click(function() {
            $('#unDocumento').removeClass('d-none');
            $('input[type=radio][name=variosdoc]').prop('checked', false);
            $('#dropFiles').addClass('d-none');
           
        });

        $('input[name=variosdoc]').click(function() {
            $('#dropFiles').removeClass('d-none');
            $('input[type=radio][name=undoc]').prop('checked', false);
            $('#unDocumento').addClass('d-none');
        });

    });
</script>
</body>

</html>