$(document).ready(() => {

  $("#dropFiles").on('dragenter', function (ev) {
    //area del drop
    $("#dropFiles").addClass("highlightDropArea");
  });

  $("#dropFiles").on('dragleave', function (ev) {
    //al salir del area
    $("#dropFiles").removeClass("highlightDropArea");
  });

  $("#dropFiles").on('drop', function (ev) {
    //al dejar archivos
    ev.preventDefault();
    ev.stopPropagation();
    if (ev.originalEvent.dataTransfer) {
      if (ev.originalEvent.dataTransfer.files.length) {
        var droppedFiles = ev.originalEvent.dataTransfer.files;
        for (var i = 0; i < droppedFiles.length; i++) {
          console.log(droppedFiles[i]);

          $('#nombreDoc').append('<tr><td>' + droppedFiles[i].name + '</td><td><a class="delete text-dark"><i class="fa-regular fa-circle-xmark"></i></a></td> </tr>');
          $('.delete').off().click(function (e) {

            $(this).parent('td').parent('tr').remove();
          });
          //ajax para subir al servidor
        }
      }
    }
    $("#dropFiles").removeClass("#highlightDropArea");
    return false;
  });
  $("#dropFiles").on('dragover', function (ev) {
    ev.preventDefault();
  });

  $('input[name=fileinput]').change(function () {
    $('#nombreDoc').empty();
    var ruta = $('input[name=fileinput]').val();
    var nomDoc = ruta.split('\\').pop();
    $('#nombreDoc').append('<tr><td>' + nomDoc + '</td><td><a class="delete text-dark"><i class="fa-regular fa-circle-xmark"></i></a></td> </tr>');
    $('.delete').off().click(function (e) {
      $(this).parent('td').parent('tr').remove();
    });
  });

  $('#btnAjax').click(() => {

    const selector = document.querySelector('selector-webcomponent');
    var datos = selector.getList();
    //console.log(datos);

    //OBTENER DATOS LISTA DE USUARIOS SOLO ID Y NOMBRE
    let userDatos = datos.map((datos) => {
      let imprimir = [];
      let valor = datos.value;
      let label = datos.label;

      imprimir.push(valor, label);

      return imprimir;
    });
    var asunto = $("#asunto").val();
    var folio = $("#folio").val();
    var tipoDoc = $("#select").val();
    var comentario = $("#comentario").val();


    var formData = new FormData();
    var archivos = $('#archivo').fileinput('getFileList');

    formData.append('archivos', archivos.files);
    formData.append('asunto', asunto);
    formData.append('folio', folio);
    formData.append('tipoDoc', tipoDoc);
    formData.append('comentario', comentario);
    formData.append('userDatos', userDatos);

    fetch( 'http://10.5.225.24/desarrollo_plo/gestorDocumentos/index.php/documentos/soloAjax', {
      method: 'POST',
      body: formData
    })
    .then( function(response) {
      if(response.ok){
        return response.text();
      }else{
        throw "error en la llamada";
      }
    })
    .then( function (texto) {
      console.log(texto);
    })
    .catch(function (err) {
      console.log(err);
    });


    /*
    $.ajax({
      url: "http://10.5.225.24/desarrollo_plo/gestorDocumentos/index.php/documentos/soloAjax",
      type: 'post',
      data: formData,
      contentType: false,
      precessData: false
    }).done(function (res) {
      console.log(res);
    }).fail(function (e) {
      if (e.responseJSON.descrip !== undefined) {
        alert(e.responseJSON.descrip);
      }
    });




    var datos = [];
    datos.push(asunto, folio, tipoDoc, comentario, imprimirDatos, unAdjunto);
    console.log(datos);*/
  });

});