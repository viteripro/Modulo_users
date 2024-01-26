<?php

session_start();
error_reporting(0);

$validar = $_SESSION['usuario'];

if( $validar == null || $validar = ''){
  header("Location: ../includes/login.php");
  die();
}

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title> </title>
</head>
 
<div>  
  <header>

    <h1 class="title">Modulo de Administración</h1>
    <h2 class="subtitle">Administración de usuarios</h2>
    <h1>Bienvenido Usuario <?php echo $_SESSION['usuario'];?></h1>
    <br>  
    <div>

      <h1>Lista de usuarios</h1>  
      <br>   
      <div> 
       <div class="container_search_module">
         <div class="search_module">
           <select name="" id="" class="departamento" disabled> 
             <option value="" >Seleccione un Departamento</option>
            </select>
            <select name="" id="" class="cargo" disabled>
              <option value="">Seleccione un Cargo</option>
            </select>
         </div>
         <div class="container_new_user">
           <a class="new_user" href="../index.php">Crear nuevo usuario
           <a class="logout" href="../includes/sesion/cerrarsesion.php">Log Out</a>
         </div> 
       </div> 
          
  </header>
  <hr>
  </a>
</div>
  <br>
  
</form>
<main>

 
<table id="table_id">
      <thead>
         <tr>
            <th>Usuario</th>
            <th>Primer Nombre</th>
            <th>Segundo Nombre</th>
            <th>Primer Apellido</th>
            <th>Segundo Apellido</th>
            <th>Acciones</th>
         </tr>
      </thead>
      <tbody>

  <?php
$conexion=mysqli_connect("localhost","root","","prueba");
$SQL="SELECT * FROM users";
$dato = mysqli_query($conexion, $SQL);

if($dato -> num_rows >0) {
    while($fila=mysqli_fetch_array($dato)) {
    
?>
 <tr>
     <td><?php echo $fila['usuario']; ?></td>
     <td><?php echo $fila['primerNombre']; ?></td>
     <td><?php echo $fila['segundoNombre']; ?></td>
     <td><?php echo $fila['primerApellido']; ?></td>
     <td><?php echo $fila['segundoApellido']; ?></td>



  <td>
   
    <a class="btn_editar" href="editar_user.php?id=<?php echo $fila['idCargo']?>">Editar </a>
    
    <a class="btn_eliminar" href="eliminar_user.php?id=<?php echo $fila['idCargo']?>">Eliminar </a> 
  </td>   
 </tr>


 <?php
}
}else{

    ?>
    <tr>
    <td>No existen registros</td>
    </tr>

    <?php
} 

?>
    
</table>
</main>

</body>
</html>  