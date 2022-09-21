<?php  include 'view/header.php' ?>

<?php

  if(!isset($_GET['Id_cliente'])){
      header("location: index.php?mensaje=error");
      exit();
  }

    include_once 'model/conexion.php';

    $Id_cliente = $_GET['Id_cliente'];

    $sentencia = $bd->prepare("SELECT * FROM cliente WHERE Id_cliente = ?;");
    $sentencia ->execute([$Id_cliente]);
    $cliente = $sentencia->fetch(PDO::FETCH_OBJ);
    // print_r($cliente); 
?>

<div class="container mt-5">
  <div class="row justify-content-center">
    <div class="col-md-4">
      <div class="card">
              <div class="card-header">
               Ingresar Datos:
              </div>
        <form action="editarProceso.php" class="p-4" method="POST">
            <div class="mb-3">
                 <label class="form-label">Nombre: </label>
                 <input type="text" class="form-control" name="txtNombre" 
                  value="<?php echo $cliente->nombre;?>">
           </div>
           <div class="mb-3">
                 <label class="form-label">Apellido: </label>
                 <input type="text" class="form-control" name="txtApellido" autofocus
                  value="<?php echo $cliente->apellido;?>">
           </div>
           <div class="mb-3">
                 <label class="form-label">Telefono: </label>
                 <input type="number" class="form-control" name="txtTelefono" autofocus
                 value="<?php echo $cliente->telefono;?>">
           </div>
           <div class="mb-3">
                 <label class="form-label">Direccion: </label>
                 <input type="text" class="form-control" name="txtDireccion" autofocus
                 value="<?php echo $cliente->direccion;?>">
           </div>
           <div class="d-grid">
              <input type="hidden" name="Id_cliente" value="<?php echo $cliente->Id_cliente;?>">
              <input type="submit" class="btn btn-primary" value="Editar">
           </div>
        </form>
      </div>
    </div>
  </div>
</div>


<?php  include 'view/footer.php' ?>


