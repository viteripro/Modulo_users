<?php
$conexion = mysqli_connect("localhost", "root", "", "prueba");

if(isset($_POST['registrar'])) {
    
    if(strlen($_POST['usuario']) >=1 && strlen($_POST['primerNombre']) >=1 && strlen($_POST['segundoNombre']) 
    >=1 && strlen($_POST['primerApellido']) >=1 && strlen($_POST['segundoApellido']) >=1 ){

     $usuario = trim($_POST['usuario']);
     $primerNombre = trim($_POST['primerNombre']);
     $segundoNombre = trim($_POST['segundoNombre']);
     $primerApellido = trim($_POST['primerApellido']);
     $segundoApellido = trim($_POST['segundoApellido']);

     $consulta = "INSERT INTO users (usuario, primerNombre, segundoNombre, primerApellido, segundoApellido)
     VALUES ('$usuario', '$primerNombre', '$segundoNombre', '$primerApellido', '$segundoApellido ')";

     mysqli_query($conexion, $consulta);
     mysqli_close($conexion);
     
     header('Location: ../views/user.php');
}
}

?>