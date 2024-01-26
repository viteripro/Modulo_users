<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>INICIO DE SESION</title>
</head>
<body>
    
     <form action="functions.php" method="POST">
        <div class="container_login">
               <br>
                <h1 class="text-center">Iniciar Sesion</h1>
             <div class="container_form-group">

              <div class="form-group">
                 <label for="usuario">Usuario</label><br>
                <input type="text" name="usuario" id="usuario">
              </div>

              <div class="form-group">
                  <label for="primerNombre">Primer Nombre</label><br>
                  <input type="text" name="primerNombre" >
                 <input type="hidden" name="accion" value="acceso_user">
             </div>
                        
                <input type="submit" class="btn_ingresar" value="Ingresar">          
            </div>
        </div>
    </form>
    
</body>
</html>