<?php

print_r($_POST);

if(!isset($_POST['Id_cliente'])){
  header("Location: index.php?mensaje=error");
}

include 'model/conexion.php';

$Id_cliente = $_POST['Id_cliente'];
$nombre = $_POST['txtNombre'];
$apellido = $_POST['txtApellido'];
$telefono = $_POST['txtTelefono'];
$direccion = $_POST['txtDireccion'];

$sentencia = $bd->prepare("UPDATE cliente SET nombre = ?, apellido = ?, telefono = ?, direccion = ? WHERE Id_cliente = ?;");
$resultado = $sentencia->execute([$nombre,$apellido,$telefono,$direccion,$Id_cliente]);

if($resultado === TRUE){

    header("Location: index.php?mensaje=editado");
}else{

  header("Location: index.php?mensaje=error");
  exit();
}


?>