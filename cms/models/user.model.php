<?php

require 'conexion.php';

class UserModel
{
  static public function login($tabla, $item, $valor)
  {
    if($item != null) {

      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");
      $stmt -> bindParam(":".$item, $valor, PDO::PARAM_STR);
      $stmt -> execute();
      return $stmt -> fetch();      

    } else {

      $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");      
      $stmt -> execute();
      return $stmt -> fetchAll();

    }    
    $stmt -> close();
    $stmt -> null;
  }

  static public function activarUser($tabla, $item1, $valor1, $item2, $valor2)
  {
    $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item1 = :$item1 WHERE $item2 = :$item2");   
    $stmt -> bindParam(":".$item1, $valor1, PDO::PARAM_STR);
    $stmt -> bindParam(":".$item2, $valor2, PDO::PARAM_STR);

    if ($stmt -> execute()) {
      return "ok";
    } else {
      return "error";
    }

    $stmt->close();
    $stmt = null;
  }

  static public function createUser($tabla, $datos)
  {
    $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, usuario, password, perfil, foto, estado) VALUE(:nombre, :usuario, :password, :perfil, :foto, 1)");

    $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
    $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
    $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
    $stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
    $stmt->bindParam(":foto", $datos["ruta"], PDO::PARAM_STR);  
    
    if ($stmt -> execute()) {
      return "ok";
    } else {
      return "error";
    }
    $stmt->close();
    $stmt = null;
  }
}