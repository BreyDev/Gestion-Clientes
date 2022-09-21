<?php


$contraseña = "";
$usuario = "root";
$nombre_bd = "crud_php_mysql";

try{
    $bd = new 
    PDO(
        'mysql:host=localhost;
        dbname=crud_php_mysql',
        $usuario,
        $contraseña,
    );
} catch (Exception $e){

  echo "Problemas con la conexion: ".$e->getMessage();
}
?>