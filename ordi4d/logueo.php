<?php 
// Initialize site configuration
require_once('includes/config.inc.php');

$correo= $_POST["email"];
$password=$_POST["password"];

$usrExiste=Usuario::checaUsuario($correo,$password);
if(count($usrExiste)>0){
    session_start();
    $_SESSION["nombre"]=$usrExiste[0]->nombre;
    $_SESSION["id"]=$usrExiste[0]->id;
    redirect_to("indexPost.php");
}

else{
    
    echo'<script type="text/javascript">
    alert("Parámetros de inicio de sesión incorrectos.\n
            Favor de verificarlos.);
    </script>';
    redirect_to('login.php');
    
}

//print_r($_POST);

?>