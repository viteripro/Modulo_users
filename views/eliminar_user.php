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
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar usuarios</title>
    <link rel="stylesheet" href="../includes/styles.css">
</head>
<body>
    <div class="container_login">
                 <div class="alert-message">
                   <p >¿Desea cpmfirmar la eliminacion del registro de forma permanente?</p>
                </div>

               <form action="../includes/functions.php" method="POST">
                 <input type="hidden" name="accion" value="eliminar_registro">
                 <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
                 <input type="submit" name="" value="Eliminar" class="btn_ingresar">
                 <a href="user.php" ></a>
                 <a href="user.php" class="btn_cancelar">Cancelar</a>
             </form>
 
     </div>
    
</body>
</html>