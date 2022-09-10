<?php
    require_once("../control/ControlConexion.php");
    $query = $conn->query("SELECT * FROM cliente
        LEFT JOIN
            autos
        ON
            cliente.autos_id_codre 

");



?>

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

td.th {
  border: 1px solid #dddddd;
  text-align: left;
  padding: 8px;
}

tr:nth-child(even) {
  background-color: #dddddd;
}
<th>
{
    text-align: center; 
    vertical-align: middle;
}
</style>
</head>
    <body>
            <table>
                
                <th colspan='2'><b>Datos</b></th>
                <th>Código</td><td><input type='text' name='txtCodRe' value='".$codre."'></th>
                <th>Nombre</td><td><input type='text' name='txtNombreCar' value='".$nomc."'></th>
                <th>Planta</td><td><input type='text' name='txtPlatna' value='".$plan."'></th>
                <th>Fecha</td><td><input type='date' name='txtFecha' value='".$fech."'></th>
                <th>Modelo</td><td><input type='text' name='txtModelo' value='".$mode."'></th>
                <th>Ciudad</td><td><input type='text' name='txtCiudad' value='".$ciu."'></th>
                <th>ID</td><td><input type='date' name='txtId' value='".$id."'></th>
                <th>FEcha</td><td><input type='text' name='txtFecha' value='".$fe."'></th>
                <th>Nombre</td><td><input type='text' name='txtNombre' value='".$nom."'></th>
                <th>Apellido</td><td><input type='text' name='txtNApellid' value='".$ape."'></th>

            </table>
            <table>
            <tr>
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
    </body>
</html>