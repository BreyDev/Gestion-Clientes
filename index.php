<?php  include 'view/header.php' ?>


<?php
  include_once "model/conexion.php";
  $sentencia = $bd->query("select * from cliente");
  $cliente = $sentencia->fetchAll(PDO::FETCH_OBJ);
  // print_r($cliente);
?>

<div class="container mt-5">

  <div class="row justify-content-ceter">
    <div class="col-md-7">

      <!-- Inicio de alerta -->
      <?php
      if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'falta'){
      ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Rellena todos los campos
        <button type= "button" class="btn-close" data-bs-dismiss="alert" aria-label= "Close"></button>
      </div>
      <?php
      }
      ?>

      <?php
      if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'registrado'){
      ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Hecho!</strong> Datos completados con éxito
        <button type= "button" class="btn-close" data-bs-dismiss="alert" aria-label= "Close"></button>
      </div>
      <?php
      } 
      ?>


      <?php
      if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'error'){
      ?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <strong>Error!</strong> Vuelve a intentar.
        <button type= "button" class="btn-close" data-bs-dismiss="alert" aria-label= "Close"></button>
      </div>
      <?php
      } 
      ?>

      <?php
      if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'editado'){
      ?>
      <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>Hecho!</strong> Actualizacion con éxito.
        <button type= "button" class="btn-close" data-bs-dismiss="alert" aria-label= "Close"></button>
      </div>
      <?php
      } 
      ?>

      <?php
      if(isset($_GET['mensaje']) and $_GET['mensaje'] == 'eliminado'){
      ?>
      <div class="alert alert-warning alert-dismissible fade show" role="alert">
        <strong>Hecho!</strong> Han sido eliminado los datos con éxito
        <button type= "button" class="btn-close" data-bs-dismiss="alert" aria-label= "Close"></button>
      </div>
      <?php
      } 
      ?>
      <!-- Fin de alerta -->
      <div class="card">

        <div class="card-header">
          Listas de clientes 
        </div>
        <div class="p-4">
          <table class="table align-middle">
            <thead>
              <tr>
                <th scope="col">N°</th>
                <th scope="col">Nombre</th>
                <th scope="col">Apellido</th>
                <th scope="col">Telefono</th>
                <th scope="col">Direccion</th> 
                <th scope="col" colspan = "2">Opciones</th>
              </tr>
            </thead>
            <tbody>

                <?php
                    foreach($cliente as $dato){
                ?>
              <tr>
                  <td scope="row"><?php echo $dato->Id_cliente;?></td>
                  <td><?php echo $dato->nombre;?></td>
                  <td><?php echo $dato->apellido;?></td>
                  <td><?php echo $dato->telefono;?></td>
                  <td><?php echo $dato->direccion;?></td>
                  <td ><a class="text-success" href="edit.php?Id_cliente=<?php echo $dato->Id_cliente;?>"><i class="bi bi-pencil-square"></i></a></td>
                  <td ><a onclick= "return confirm('Estas seguro de eliminar los datos?');" class="text-danger" href="delete.php?Id_cliente=<?php echo $dato->Id_cliente;?>"><i class="bi bi-trash"></i></a></td>
              </tr>

              <?php
                }
          
                ?>

            </tbody>
          </table>
          
        </div>
      </div>
    </div>
    <div class="col-md-4">
      <div class="card">
              <div class="card-header">
               Ingresar Datos:
              </div>
        <form action="registrer.php" class="p-4" method="POST">
            <div class="mb-3">
                 <label class="form-label">Nombre: </label>
                 <input type="text" class="form-control" name="txtNombre" autofocus>
           </div>
           <div class="mb-3">
                 <label class="form-label">Apellido: </label>
                 <input type="text" class="form-control" name="txtApellido" autofocus>
           </div>
           <div class="mb-3">
                 <label class="form-label">Telefono: </label>
                 <input type="number" class="form-control" name="txtTelefono" autofocus>
           </div>
           <div class="mb-3">
                 <label class="form-label">Direccion: </label>
                 <input type="text" class="form-control" name="txtDireccion" autofocus>
           </div>
           <div class="d-grid">
              <input type="hidden" name="oculto" value="1">
              <input type="submit" class="btn btn-primary" value="Registrar">
           </div>
        </form>
      </div>
    </div>
  </div>
</div>





<?php  include 'view/footer.php' ?>
   

