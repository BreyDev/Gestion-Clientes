<?php
  // print_r($_POST);
    if(empty($_POST["oculto"]) || empty($_POST["txtNombre"]) || empty($_POST["txtApellido"]) || empty($_POST["txtTelefono"]) || empty($_POST["txtDireccion"])){

      header('location: index.php?mensaje=falta');
      exit();
}

include_once 'model/conexion.php';
$nombre = $_POST["txtNombre"];
$apellido = $_POST["txtApellido"];
$telefono = $_POST["txtTelefono"];
$direccion = $_POST["txtDireccion"];

    $sentencia = $bd->prepare("INSERT INTO cliente(nombre,apellido,telefono,direccion) VALUES (?,?,?,?);");
    $resultado = $sentencia ->execute([$nombre,$apellido,$telefono,$direccion]);


    if($resultado === TRUE){
        header("location:index.php?mensaje=registrado");
    }else{
      header("location:index.php?mensaje=error");
      exit();
    }
?>