<?php 

class ControlCliente {
    var $objCliente;

	function __construct($objCliente){
	$this->objCliente=$objCliente;

	}

	function guardar(){
		$id=$this->objCliente->getId();
        $fe=$this->objCliente->getFecha();
		$nom=$this->objCliente->getNombre();
        $ape=$this->objCliente->getApellido();
		$codre=$this->objCliente->getCodeRe();
		$objConexion = new ControlConexion();
		$objConexion->abririd19545681_alexis07($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
        $comandoSql="INSERT INTO CLIENTE(ID,FECHA, NOMBRE, APELLIDO, CODRE) VALUES
        '".$id."','".$fe."','".$nom."','".$ape."','".$codre."')"; 
		$objConexion->ejecutarComandoSql($comandoSql);
		$objConexion->cerrarid19545681_alexis07();
	}

	function modificar(){
		$id=$this->objCliente->getId();
        $fe=$this->objCliente->getFecha();
		$nom=$this->objCliente->getNombre();
        $ape=$this->objCliente->getApellido();
		$codre=$this->objCliente->getCodeRe();
		$objConexion = new ControlConexion();
        $objConexion->abririd19545681_alexis07($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
        $comandoSql="INSERT INTO CLIENTE(ID,FECHA, NOMBRE, APELLIDO, CODRE) VALUES
        ('".$id."','".$fe."','".$nom."','".$ape."','".$codre."')";
		$objConexion->ejecutarComandoSql($comandoSql);
		$objConexion->cerrarid19545681_alexis07();
	}

	function borrar(){
		$id=$this->objCliente->getId();
		$objConexion = new ControlConexion();
        $objConexion->abririd19545681_alexis07($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
        $comandoSql="DELETE FROM CLIENTE  WHERE ID='".$id."'";
		$objConexion->ejecutarComandoSql($comandoSql);
		$objConexion->cerrarid19545681_alexis07();
	}
	function consultar(){

		$id=$this->objCliente->getId();
		$objConexion = new ControlConexion();
		$objConexion->abririd19545681_alexis07($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
		$comandoSql="SELECT * FROM CLIENTE  WHERE ID='".$id."'";
		$recordSet=$objConexion->ejecutarSelect($comandoSql);
		$registro = $recordSet->fetch_array(MYSQLI_BOTH);
        $this->objCliente->setNombre($registro["nombre"]);
        $this->objCliente->setId($registro["id"]);
		$objConexion->cerrarid19545681_alexis07();
		return $this->objCliente;
	}
	function listar(){

		$objConexion = new ControlConexion();
		$objConexion->abririd19545681_alexis07($GLOBALS['serv'],$GLOBALS['bdat']);
		$comandoSql="SELECT * FROM CLIENTE";
		$recordSet=$objConexion->ejecutarSelect($comandoSql);
		$i=0;
		$mat=null;
		while ($registro = $recordSet->fetch_array(MYSQLI_BOTH)){
			
			$mat[$i][0]=  $registro['id'];
			$mat[$i][1]=  $registro['fecha'];
			$mat[$i][2]=  $registro['nombre'];
            $mat[$i][3]=  $registro['apellido'];
            $mat[$i][4]=  $registro['codre'];
			$i=$i+1;
		}		

		$objConexion->cerrarid19545681_alexis07();
		return $mat;
	}	
}

?>
