<?php

class ControlConexion
{
	
	var $conn;
	function __construct(){
		$this->conn=null;
	}
    function abririd19545681_alexis07($servidor, $root,$pass, $bdat){
    	try	{
			$this->conn = new mysqli($servidor, $id19545681_alexis07, $mg_L0lh4yKiN, $id19545681_renaultmark);
		}
      	catch (Exception $e){
          	echo "ERROR AL CONECTARSE AL SERVIDOR ".$e->getMessage()."\n";
      	}

    }

    function cerrarrenaultmark() {
		try{
       $this->conn->close();
		}
      	catch (Exception $e){
          	echo "ERROR AL CONECTARSE AL SERVIDOR ".$e->getMessage()."\n";
      	}		
    }

    function ejecutarComandoSql($sql) {//$sql debe ser insert into, update, delete  
    	$msg="ok";
    	try	{
			$this->conn->query($sql);
			}
		catch (Exception $e) {
				echo " NO SE AFECTARON LOS REGISTROS: ". $e->getMessage()."\n";
				$msg=$e->getMessage();
		  }	
		  return $msg;
		}

	function ejecutarSelect($sql) {
			try	{
				$recordSet=$this->conn->query($sql);
				}
	
			catch (Exception $e) {
					echo " ERROR: ". $e->getMessage()."\n";
			  }	
		return $recordSet;// es una variable que apunta al encabezado de la tabla resultado de la consulta
			}   
			
 function findAllClientes(){
		$sql = "SELECT * FROM `clientes`";
		$filasClientes = $this->consultar($sql);

		return $filasClientes;
	}

	
}
?>