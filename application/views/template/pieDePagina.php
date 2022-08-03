<!-- MDB JAVASCRIPT & POPPER, BOOTSTRAPS, JQUERY -->
<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.5/dist/umd/popper.min.js" integrity="sha384-Xe+8cL9oJa6tN/veChSP7q+mnSPaj5Bcu9mPX5F5xIGE0DVittaqT5lorf0EI7Vk" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/buffer.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/plugins/filetype.min.js" type="text/javascript"></script>
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/fileinput.min.js"></script>
<script src="https://cdn.jsdelivr.net/gh/kartik-v/bootstrap-fileinput@5.5.0/js/locales/es.js"></script>
<script src="<?= base_url('assets/js/ajax.js'); ?>"></script>
<script src="<?= base_url('assets/js/main.js'); ?>"></script>

<script>
    var table = $('#data_table').DataTable({
        pageLength: 20,
        dom: 'Bfrtip',
        buttons: ['excel'],
        processing: false,
        serverSide: true,
        order: [0, 'asc'],
        ajax: {
            url: "http://10.5.225.24/desarrollo_plo/gestorDocumentos/index.php/Tomardatos/tomarDatos",
            type: 'POST',
            dataSrc: ''
        },
        columns: [{
                data: 'tipoDoc'
            },
            {
                data: 'tipoDoc',
                render: function(data, type) {

                    if (data === 'IMPORTANTE') {
                        return '<i class="fa-solid fa-circle-exclamation" style="color: red;"> ' + data + ' <i class="fa-solid fa-circle-exclamation" style="color: red;">';
                    } else if (data === 'PRIVADO') {
                        return '<i class="fa-solid fa-lock text-dark"></i> ' + data;
                    } else if (data === 'ORDINARIO') {
                        return '<i class="fa-regular fa-file-lines text-dark"></i> ' + data;
                    }
                }
            },
            {
                data: 'asunto'
            },
            {
                data: 'comentario',
                render: function(data) {
                    newComment = (data.length > 15) ? data.slice(0, 15 - 1) + '....' : data;
                    return newComment;
                }
            },
            {
                data: 'folio'
            },
            {
                data: '',
                render: function(data, type) {
                    return '<a href="" id="seguimientoDoc" class="fa-regular fa-eye text-decoration-none text-dark"></a>';
                }
            },
        ],
        responsive: true,
        scrollY: '75vh',
        scrollCollapse: true,
        lengthChange: false,
        info: false,
        searching: false,
        language: {
            "processing": "Procesando Datos...",
            "lengthMenu": "Mostrar _MENU_ registros",
            "zeroRecords": "No se encontraron resultados",
            "emptyTable": "Ningún dato disponible en esta tabla",
            "infoFiltered": "(filtrado de un total de _MAX_ registros)",
            "infoThousands": ",",
            "loadingRecords": "Cargando Datos...",

            "paginate": {
                "first": '',
                "last": '',
                "next": '<i class="fa-solid fa-arrow-right-long"></i>',
                "previous": '<i class="fa-solid fa-arrow-left-long"></i>'
            }
        },
    });

 
    $("#file").fileinput({
        language: 'es',
        theme: "bs5",
        uploadUrl: '<?php base_url(); ?>index.php/documentos/tratarDoc',
        uploadAsync: false,
        allowedFileExtensions: ['jpg', 'img', 'gif', 'pdf', 'doc', 'docx'],
        overwriteInitial: false,
        initialPreviewAsData: true,
        maxFileSize: 300000,
        removeFromPreviewOnError: true,
        showClose: false,
        showPreview: true,
        showUpload: false,
        uploadExtraData: function() {
            return {
                retornarId: $('#btnAjax').val()
            };
        }
    });
    $('#filterImportant').click( function() {
       table.column($(this).data('column'))
            .search($(this).val())
            .draw();
    });

    $("#sidebarToggle2").click(() => {
        $('#hidden').hide();
    });

    $("#sidebarToggle").click(() => {
        $('#hidden').show();
    });
</script>
</body>

</html>