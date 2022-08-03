$(document).ready(() => {

  $('#btnAjax').click((event) => {
    event.preventDefault();

    const selector = document.querySelector('selector-webcomponent');
    var lista = selector.getList();

    // console.log(userDatos[0][0]);
    var asunto = $("#asunto").val();
    var folio = $("#folio").val();
    var tipoDoc = $("#select").val();
    var comentario = $("#comentario").val();
    $.ajax({
      url: "http://10.5.225.24/desarrollo_plo/gestorDocumentos/index.php/documentos/formAjax",
      type: 'post',
      data: {
        asunto: asunto,
        folio: folio,
        tipoDoc: tipoDoc,
        comentario: comentario
      },
      dataType: 'json'
    }).done(function (data) {
      console.log(data);
      $('#btnAjax').val(data);
      $.ajax({
        url: "http://10.5.225.24/desarrollo_plo/gestorDocumentos/index.php/documentos/tratarPersonas",
        type: 'POST',
        data: {
          usuario: lista,
          btn: $('#btnAjax').val()
        },
        dataType: 'json'
      }).done(function (data2) {
        console.log(data2);
        $('#btnAjax').val(data2);

      });
      if (data > 0) {
        $('#file').fileinput('upload');

        $('#asunto').val('');
        $('#folio').val('');
        $('#select').val('');
        $('#comentario').val('');
        $('#file').fileinput('clear');
        selector.clearList();
        $('#crearModal').modal('hide');
        $('#data_table').DataTable().ajax.reload();

      }
    });

  });
  //fin btnAjax

});
