$(document).ready(function () {
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

    var tipoDoc = $('#select').val();
    var asunto = $('#asunto').val();
    var folio = $('#folio').val();
    var comentario = $('#comentario').val();
    var validarInput = $('input#archivo').val();

    if (validarInput == "") {
      alert('no hay datos cargados');
    } else {
      let formData = new FormData();
      let files = $('input[name=archivo]')[0].files;

      formData.append('archivos', files);
      formData.append('tipoDoc', tipoDoc);
      formData.append('asunto', asunto);
      formData.append('folio', folio);
      formData.append('comentario', comentario);

      $.ajax({
        url: 'http://10.5.225.24/desarrollo_plo/gestorDocumentos/index.php/documentos/soloAjax',
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

    }

  });
});