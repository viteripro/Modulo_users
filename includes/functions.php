<?php

require_once ("_db.php");



if (isset($_POST['accion'])){
    switch ($_POST['accion']){

        case 'editar_registro';
            editar_registro(); 
            break;

        case 'eliminar_registro';
           eliminar_registro(); 
           break;

        case 'acceso_user';
            acceso_user(); 
            break;
        
    }
}


function editar_registro(){
    $conexion=mysqli_connect("localhost","root","","prueba");
    extract($_POST);
    $consulta=" UPDATE users SET usuario = '$usuario', primerNombre = '$primerNombre', segundoNombre = '$segundoNombre',
    primerApellido = '$primerApellido', segundoApellido = '$segundoApellido' WHERE idCargo = '$idCargo'";

    mysqli_query($conexion, $consulta);

    header('Location: ../views/user.php');
}



function eliminar_registro(){
    $conexion=mysqli_connect("localhost","root","","prueba");
    extract($_POST);
    $idCargo=$_POST['id'];
    $consulta="DELETE FROM users WHERE idCargo = $idCargo";

    mysqli_query($conexion, $consulta);

    header('Location: ../views/user.php');
}





function acceso_user(){
    $usuario=$_POST['usuario'];
    $primerNombre=$_POST['primerNombre'];
    session_start();
    $_SESSION['usuario']=$usuario;
    $_SESSION['primerNombre']=$primerNombre;


    $conexion=mysqli_connect("localhost","root","","prueba");
    $consulta="SELECT * FROM users WHERE usuario = '$usuario' AND primerNombre='$primerNombre'";
    $resultado=mysqli_query($conexion, $consulta);
    $filas=mysqli_num_rows($resultado);

    if($filas){
 
        header('Location: ../views/user.php');
        
    }else{
        
        header('Location: login.php');
        session_destroy();

    }

    // mysqli_query($conexion, $consulta);

    // header('Location: ../views/user.php');
}
 