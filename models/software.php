<?php

require_once "Conexion.php";

class Software extends Conexion{

  private $accesoBD;

  public function __CONSTRUCT(){
    $this->accesoBD = parent::getConexion();
  }

  public function listarSoftware(){
    try{
      $consulta = $this->accesoBD->prepare("CALL spu_software_listar()");
      $consulta->execute();

      return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }
    catch(Exception $e){
      die($e->getMessage());
    }
  }
  
}
?>