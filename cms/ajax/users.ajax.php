<?php

require_once '../controllers/user.controller.php';
require_once '../models/user.model.php';

class AjaxUsers
{
  public $activarId;
  public $activarUsuario;
  public function ajaxActivarUsuario()
  {
    $tabla = "usuarios";
    $item1 = "estado";
    $valor1 = $this->activarUsuario;
    $item2 = "id";
    $valor2 = $this->activarId;

    $resp = UserModel::activarUser($tabla, $item1, $valor1, $item2, $valor2);
    echo $resp;
  }
}

if (isset($_POST["activarUsuario"])){
  $activarUser = new AjaxUsers();
  $activarUser -> activarUsuario = $_POST["activarUsuario"];
  $activarUser -> activarId = $_POST["activarId"];
  $activarUser -> ajaxActivarUsuario();
}