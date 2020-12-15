<?php

session_destroy();
echo "<script>
        let timerInterval
        Swal.fire({
          title: 'Cerrando sesion',
          html: 'Estamos saliendo del sistema por favor espere',
          timer: 2000,
          timerProgressBar: true,          
        }).then((result) => {
          window.location = 'ingreso';
        })        
    </script>";