<?php
//error_reporting(0);

include("../control/configBd.php");
include("../modelo/Autos.php");
include("../control/ControlAutos.php");
include("../control/ControlConexion.php");
try{

    $codre=$_POST["txtCodRe"]; 
    $nomc=$_POST["txtNombreCar"];
    $plan=$_POST["txtPlatna"];
    $fech=$_POST["txtFecha"];
    $mode=$_POST["txtModelo"];
    $ciu=$_POST["txtCiudad"];
    $bot=$_POST["btn"];
 switch ($bot) {
    case "Guardar":
        $objAutos= new Autos($codre,$nomc,$plan,$fech,$mode,$ciu);
        $objControlAutos= new ControlAutos($objAutos);
        $objAutos=$objControlAutos->guardar();
        break;
    case "Consultar":
        $objAutos= new Autos($codre,"",0);
        $objControlAutos= new ControlAutos($objAutos);
        $objAutos=$objControlAutos->consultar();
        $codre=$objAutos->getCodRe();
		$nomc=$objAutos->getNombreCar();
        //echo phpinfo();
        break;
    case "Modificar":
        $objAutos= new Autos($codre,$nomc,$plan,$fech,$mode,$ciu);
        $objControlAutos= new ControlAutos($objAutos);
        $objAutos=$objControlAutos->modificar();
        break;
    case "Borrar":
        $objAutos= new Autos($codre,"",0);
        $objControlAutos= new ControlAutos($objAutos);
        $objAutos=$objControlAutos->borrar();
        break;  
    case "Listar":
        $objAutos= new Autos("","",0);
        $objControlAutos= new ControlAutos($objAutos);
        $mat=$objControlAutos->listar();
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
td 
{
    text-align: center; 
    vertical-align: middle;
}
</style>
</head>
    <body>
        <form method='post' action='VistaAutos.php'>
            <table>
                <tr>
                <td colspan='2'><b>Autos</b></td>
                </tr>
                <tr>
                <td>Código</td><td><input type='text' name='txtCodRe' value='".$codre."'></td>
                </tr>,
                <tr>
                <td>Nombre</td><td><input type='text' name='txtNombreCar' value='".$nomc."'></td>
                </tr>
                <tr>
                <td>Planta</td><td><input type='text' name='txtPlatna' value='".$plan."'></td>
                </tr>
                <tr>
                <td>Fecha</td><td><input type='date' name='txtFecha' value='".$fech."'></td>
                </tr>
                <tr>
                <td>Modelo</td><td><input type='text' name='txtModelo' value='".$mode."'></td>
                </tr>
                <tr>
                <td>Ciudad</td><td><input type='text' name='txtCiudad' value='".$ciu."'></td>
                </tr>
            </table>
            <table>
            <tr>
                <td ><input type='submit' name='btn' value='Guardar'></td>
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
                    <td>".$mat[$i][3]."</td><td>".$mat[$i][4]."</td><td>".$mat[$i][5]."</td>
                    </tr>";
         }
        echo "</table>";
            
        echo "</form>
    </body>
</html>
";
?>