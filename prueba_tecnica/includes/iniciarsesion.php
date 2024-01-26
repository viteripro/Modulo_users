<?php
   session_start();
  include('_db.php');

if(isset($_POST['usuario']) && isset($_POST['primerNombre'])) {

  function validate($data){
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
  }

  $usuario = validate($_POST['usuario']);
  $primerNombre = validate($_POST['primerNombre']);

  if (empty($usuario)) {
      header("Location: login.php?error=El usuario es requerido");
      exit();
  }elseif (empty($primerNombre)) {
      header("Location: login.php?error=La clave es requerida");
      exit();
  }else{
    $primerNombre = md5($primerNombre);
    $sql = "SELECT * FROM users WHERE usuario = '$usuario' AND primerNombre='$primerNombre'";
    $result = mysqli_query($conexion, $sql);
   
    if (mysqli_num_rows($result) === 1) {
      $row = mysqli_fetch_assoc($result);
      if ($row['usuario'] === $usuario && $row['primerNombre'] === $primerNombre) {
         $_SESSION['usuario'] = $row['usuario'];
         
          
         header("Location: ../views/user.php");
         exit();
      }else{
         header("Location: login.php?error=El usuario o la clave son incorrectos");
         exit();
      }
    }else{
      header("Location: login.php?error=El usuario o la clave son incorrectos");
      exit();
   
    }
   }
  
}  else{
  header("Location: login.php");
  exit();
}

?>