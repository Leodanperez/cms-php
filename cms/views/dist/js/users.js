//Activar y desactivar usuarios
$(document).on('click', ".btnActivar", function() {

  let idUser = $(this).attr("idUser");
  let estadoUser = $(this).attr("estadoUser");

  let datos = new FormData();
  datos.append("activarId", idUser);
  datos.append("activarUsuario", estadoUser);

  $.ajax({
    url: 'ajax/users.ajax.php',
    method: 'POST',
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function(respuesta) {
      if (respuesta == "ok") {
        Swal.fire({
          icon: 'success',
          title: 'El usuario ha sido activado!'
        }).then((result) => {
          if (result.value) {
            window.location = 'users';
          }
        })
      }
    }
  })

})