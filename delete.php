<?php

if(!isset($_GET['Id_cliente'])){

  header('Location: index.php?mensaje= error');
  exit();
}

include 'model/conexion.php';
$Id_cliente = $_GET['Id_cliente'];

$sentencia = $bd->prepare("DELETE FROM cliente WHERE Id_cliente = ?;");
$resultado = $sentencia->execute([$Id_cliente]);

if ($resultado === TRUE){

    header('Location: index.php?mensaje=eliminado');
} else {

  header('Location: index.php?mensaje=error');
  exit();
};

?>