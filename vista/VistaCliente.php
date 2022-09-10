<?php
error_reporting(E_ALL ^ E_NOTICE);

include("../control/configBd.php");
include("../modelo/Cliente.php");
include("../control/ControlCliente.php");
include("../control/ControlConexion.php");
try{

    $id=$_POST["txtId"];
    $fe=$_POST["txtFecha"];
    $nom=$_POST["txtNombre"];
    $ape=$_POST["txtApellido"];
    $codre=$_POST["txtCodeRe"];
    $bot=$_POST["btn"];

switch ($bot) {
    case "Guardar":
        $objCliente= new Cliente($id,$fe,$nom,$ape,$codre);
        $objControlCliente= new ControlCliente($objCliente); 
        $objCliente=$objControlCliente->guardar();
        break;
    case "Consultar":
        $objCliente= new Cliente($id,"",0);
        $objControlCliente= new ControlCliente($objCliente);
        $objCliente=$objControlCliente->consultar();
        $nom=$objCliente->getNombre();
		$nomc=$objCliente->getNombreCar();
        //echo phpinfo();
        break;
    case "Modificar":
        $objCliente= new Cliente($id,$nom,$ape,$fe);
        $objControlCliente= new ControlCliente($objCliente);
        $objCliente=$objControlCliente->modificar();
        break;
    case "Borrar":
        $objCliente= new Cliente($id,"",0);
        $objControlCliente= new ControlCliente($objCliente);
        $objCliente=$objControlCliente->borrar();
        break;  
    case "Listar":
        $objCliente= new Cliente("","",0);
        $objControlCliente= new ControlCliente($objCliente);
        $mat=$objControlCliente->listar();
        break;            
} 
}
catch (Exception $objExp) {
    echo 'Se presentó una excepción: ',  $objExp->getMessage(), "\n";
}
echo"
<!DOCTYPE html>
<html>
<head>
<meta charset='UTF-8'>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
}

td, th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
{
    text-align: center; 
    vertical-align: middle;
}
</style>
</head>
    <body>
        <form method='post' action='VistaCliente.php'>
            <table>
                <tr>
                <td colspan='2'>Clientes</td>
                </tr>
                <tr>
                <td>Id</td><td><input type='text' name='txtId' value='".$id."'></td>
                </tr>
                <tr>
                <td>Fecha</td><td><input type='date' name='txtFecha' value='".$fe."'></td>
                </tr>
                <tr>
                <td>Nombre</td><td><input type='text' name='txtNombre' value='".$nom."'></td>
                </tr>
                <tr>
                <td>Apellid</td><td><input type='text' name='txtApellido' value='".$ape."'></td>
                </tr>
                <tr>
                <td>Codigo Carro</td><td><input type='text' name='txtCodeRe' value='".$codre."'></td>
                </tr>
            </table>
            <table>
            <tr>
                <td><input type='submit' name='btn' value='Guardar'></td>
                <td><input type='submit' name='btn' value='Consultar'></td>
                <td><input type='submit' name='btn' value='Modificar'></td>
                <td><input type='submit' name='btn' value='Borrar'></td>
                <td><input type='submit' name='btn' value='Listar'></td>
            </tr>
            </table>";
        echo "<table>";
            for($i=0;$i<sizeof($mat);$i++) {
                echo "<tr>
                    <td>".$mat[$i][0]."</td><td>".$mat[$i][1]."</td><td>".$mat[$i][2]."</td>
                    <td>".$mat[$i][3]."</td><td>".$mat[$i][4]."</td>
                    </tr>";
         }
        echo "</table>";
            
        echo "</form>
    </body>
</html>
";
?>