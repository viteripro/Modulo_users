<?php

session_start();
error_reporting(0);

$validar = $_SESSION['usuario'];

if( $validar == null || $validar = ''){  
   header("Location: ../includes/login.php");
   die();
}



$idCargo= $_GET['id'];
$conexion=mysqli_connect("localhost", "root", "", "prueba");
$consulta= "SELECT * FROM users WHERE idCargo = $idCargo";
$resultado = mysqli_query($conexion, $consulta);
$usuario = mysqli_fetch_assoc($resultado);

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registros</title>
    <link rel="stylesheet" href="../includes/styles.css">
</head>
<body>

<form action="../includes/functions.php" method="POST">
      <div class="container_login">
         <br>
                   <h3 class="text-center">Editar usuario</h3>
             <div class="container_form-group">

                
                <div class="form-group">
                     <label for="usuario" class="form-label">Usuario</label>
                     <input type="text" id="usuario" name="usuario" class="form-control" required 
                     value="<?php echo $usuario['usuario'];?>">
                  </div>
                  <div class="form-group">
                     <label for="primerNombre" class="form-label">Primer Nombre:</label><br>
                     <input type="text" id="primerNombre" name="primerNombre" class="form-control"
                     placeholder="" value="<?php echo $usuario['primerNombre'];?>">
                  </div>
                  <div class="form-group">
                     <label for="segundoNombre" class="form-label">Segundo Nombre:</label><br>
                     <input type="text" id="segundoNombre" name="segundoNombre" class="form-control" 
                     required value="<?php echo $usuario['segundoNombre'];?>">
                  </div>
                  <div class="form-group">
                     <label for="primerApellido" class="form-label">Primer Apellido:</label><br>
                     <input type="text" id="primerApellido" name="primerApellido" class="form-control" 
                     required value="<?php echo $usuario['primerApellido'];?>">
                  </div>
                  <div class="form-group">
                     <label for="segundoApellido" class="form-label">Segundo Apellido:</label><br>
                     <input type="text" id="segundoApellido" name="segundoApellido" class="form-control"
                     required value="<?php echo $usuario['segundoApellido'];?>">
                     <input type="hidden" name="accion" value="editar_registro">
                     <input type="hidden" name="idCargo" value="<?php echo $idCargo;?>">
                  </div>
                  
                  
                  
                  <br>
                  
                  <div class="mb-3">
                     <input type="submit" value="Guardar" class="btn_ingresar" name="registrar">
                     <a href="user.php" class="btn_cancelar">Cancelar</a>
                  </div>
               </div>
               
            </div>
</form>

</body>
</html>