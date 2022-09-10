<?php
/*
// Desactivar toda notificación de error
error_reporting(0);
 
// Notificar solamente errores de ejecución
error_reporting(E_ERROR | E_WARNING | E_PARSE);
 
// Notificar E_NOTICE también puede ser bueno (para informar de variables
// no inicializadas o capturar errores en nombres de variables ...)
error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);
 
// Notificar todos los errores excepto E_NOTICE
// Este es el valor predeterminado establecido en php.ini
error_reporting(E_ALL ^ E_NOTICE);
 
// Notificar todos los errores de PHP (ver el registro de cambios)
error_reporting(E_ALL);
 
// Notificar todos los errores de PHP
error_reporting(-1);
 
https://www.lawebdelprogramador.com/foros/PHP/1395996-solucionado-Como-desactivar-los-warning-notice-y-error-de-PHP.html#i1395996
// Lo mismo que error_reporting(E_ALL);
ini_set('error_reporting', E_ALL);
php_flag display_startup_errors off
php_flag display_errors off
php_flag html_errors off

http://php.net/manual/es/configuration.changes.php
*/
error_reporting(E_ALL ^ E_NOTICE);

include("control/configBd.php");
include("modelo/Usuario.php");
include("control/ControlUsuario.php");
include("control/ControlConexion.php");

try{
    $ca=$_POST["txtVistaAutos"];
    $vc=$_POST["txtVistaClientes"];
    $bot=$_POST["btn"];
 
    if($bot=="Ingresar"){
    $objAutos=new Autos($ca,$vc);
    $objCtrAutos =new ControlAutos($objAutos);
        if($objCtrAutos->validarIngreso()){
			$_SESSION['ca']=  $ca;
            //$_SESSION['Con']=  $con;
            header('Location: Carros/vista/VistaAutos.php');
            header('Location: Carros/vista/VistaCliente.php');
        }
        else{
            echo "<script>alert('');</script>";
        }
    }
}
catch (Exception $objExp) {
    echo 'Se presentó una excepción: ',  $objExp->getMessage(), "\n";
}
echo "
<!DOCTYPE html>
<html>
<head>
<meta charset='UTF-8'>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 70%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: center;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
</style>
</head>
    <body>
        <form method='post' action='vista/VistaAutos.php'>
            <table>
                <tr>
                <td colspan='2' >Ingresar</td>
                </tr>
                <tr>
                <td><input type='submit' name='btn' value='IngresarAutos'></td>
                
                </tr>
                </body>
                <body>
        <form method='post' action='vista/VistaCliente.php'>
            <table>
                <tr>
                <td><input type='submit' name='btn' value='IngresarCliente'></td>
            </table>
        </form>
    </body>
</html>
";
?>