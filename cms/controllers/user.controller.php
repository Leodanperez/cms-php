<?php

class UserController
{
  static public function login()
  {
    if (isset($_POST["inUsername"])) {

      if(preg_match('/^[a-zA-Z0-9]+$/', $_POST["inUsername"]) && preg_match('/^[a-zA-Z0-9]+$/', $_POST["inPassword"])) {

        $tabla = "usuarios";

        $item = "usuario";
        $valor = $_POST["inUsername"];

        $respuesta = UserModel::login($tabla, $item, $valor);

        if ($respuesta["usuario"] == $_POST["inUsername"] && $respuesta["password"] == $_POST["inPassword"]) {

          if ($respuesta["estado"] == 1) {

            $_SESSION["iniciarSesion"] = "ok";
  
            echo "<script>
                let timerInterval
                Swal.fire({
                  title: 'Cargando...',
                  html: 'Ingresando al sistema',
                  timer: 2000,
                  timerProgressBar: true,          
                }).then((result) => {
                  window.location = 'inicio';
                })        
            </script>";
  
          } else {
            echo "<script>
                    Swal.fire({
                      icon: 'warning',
                      title: 'El usuario aun no esta activado'
                    })
                  </script>";
          }
        } else {
          echo "<script>
                  Swal.fire({
                    icon: 'error',
                    title: 'Usuario y/o contraseña son incorrectos'
                  })
              </script>";
        }        
      }
    }
  }

  static public function showUser($item, $valor)
  {
    $tabla = "usuarios";
    $resp = UserModel::login($tabla,$item,$valor);
    return $resp;
  }

  static public function createUser()
  {
    if (isset($_POST["newName"])) {
      if (preg_match('/^[a-zA-z0-9ñÑáéíóúÁÉÍÓÚ ]+$/', $_POST["newName"]) && preg_match('/^[a-zA-z0-9]+$/', $_POST["newUser"]) && preg_match('/^[a-zA-z0-9]+$/', $_POST["newPassword"])) {

        //Validar
        $ruta = "";

        if (isset($_FILES["nuevaFoto"]["tmp_name"])) {

          list($ancho, $alto) = getimagesize($_FILES["nuevaFoto"]["tmp_name"]);

          $nuevoAncho = 500;
          $nuevoAlto = 500;

          //Crear el directorio guardar las fotos
          $directories = "views/dist/img/usuarios/".$_POST["newUser"];

          mkdir($directories, 0755);

          //De acuerdo al tipo de imagen aplicamos las funciones
          if ($_FILES["nuevaFoto"]["type"] == "image/jpeg") {
            //Guardamos la imagen en un directorio
            $aleatorio = mt_rand(100,999);
            $ruta = "views/dist/img/usuarios/".$_POST["newUser"]."/".$aleatorio.".jpg";
            $origen = imagecreatefromjpeg($_FILES["nuevaFoto"]["tmp_name"]);
            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
            imagejpeg($destino, $ruta);
          }

          if ($_FILES["nuevaFoto"]["type"] == "image/png"){
            //Guardamos la imagen en un directorio
            $aleatorio = mt_rand(100,999);
            $ruta = "views/dist/img/usuarios/".$_POST["newUser"]."/".$aleatorio.".png";
            $origen = imagecreatefrompng($_FILES["nuevaFoto"]["tmp_name"]);
            $destino = imagecreatetruecolor($nuevoAncho, $nuevoAlto);
            imagecopyresized($destino, $origen, 0, 0, 0, 0, $nuevoAncho, $nuevoAlto, $ancho, $alto);
            imagepng($destino, $ruta);
          }
        }

        //Enviar datos a la tabla
        $tabla = "usuarios";
        $datos = array("nombre"=> $_POST["newName"],
                      "usuario"=> $_POST["newUser"],
                      "password"=> $_POST["newPassword"],
                      "perfil"=> $_POST["newPerfil"],
                      "ruta"=> $ruta);

        $resp = UserModel::createUser($tabla, $datos);                      

      }
    }
  }
}