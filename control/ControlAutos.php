<?php 

class ControlAutos {
    var $objAutos;

	function __construct($objAutos){
	$this->objAutos=$objAutos;

	}

	function guardar(){
		$codre=$this->objAutos->getCodRe();
        $nomc=$this->objAutos->getNombreCar();
        $plan=$this->objAutos->getPlanta();
        $mode=$this->objAutos->getModelo();
        $fech=$this->objAutos->getFecha();
		$ciu=$this->objAutos->getCiudad();
		$objConexion = new ControlConexion();
		$objConexion->abririd19545681_alexis07($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
        $comandoSql="INSERT INTO AUTOS(codre, nombrecar, planta, fecha, modelo, ciudad) VALUES
        ('".$codre."','".$nomc."','".$plan."','".$mode."','".$fech."','".$ciu."')"; //echo $comandoSql;
		$objConexion->ejecutarComandoSql($comandoSql);
		$objConexion->cerrarrenaultmark();
	}

	function modificar(){
		$codre=$this->objAutos->getCodRe();
        $nomc=$this->objAutos->getNombreCar();
        $plan=$this->objAutos->getPlanta();
        $mode=$this->objAutos->getModelo();
        $fech=$this->objAutos->getFecha();
		$ciu=$this->objAutos->getCiudad();
		$objConexion = new ControlConexion();
		$objConexion->abririd19545681_alexis07($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
        $comandoSql="UPDATE AUTOS SET MODELO='".$mode."',FECHA='".$fech."' WHERE CODERE='".$codre."'";
		$objConexion->ejecutarComandoSql($comandoSql);
		$objConexion->cerrarid19545681_alexis07();
	}

	function borrar(){
		$codre=$this->objAutos->getCodRe();
		$objConexion = new ControlConexion();
		$objConexion->abririd19545681_alexis07($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
        $comandoSql="DELETE FROM AUTOS  WHERE CODERE='".$codre."'";
		$objConexion->ejecutarComandoSql($comandoSql);
		$objConexion->cerrarid19545681_alexis07();
	}
	function consultar(){

		$codre=$this->objAutos->getCodRe();
		$objConexion = new ControlConexion();
		$objConexion->abririd19545681_alexis07($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
		$comandoSql="SELECT * FROM AUTOS  WHERE CODERE='".$cod."'";
		$recordSet=$objConexion->ejecutarSelect($comandoSql);
		$registro = $recordSet->fetch_array(MYSQLI_BOTH);
        $this->objAutos->setNombreCar($registro["nombrecar"]);
        $this->objAutos->setCodRe($registro["codre"]);
		$objConexion->cerrarid19545681_alexis07();
		return $this->objAutos;
	}
	function listar(){

		$objConexion = new ControlConexion();
		$objConexion->abririd19545681_alexis07($GLOBALS['serv'],$GLOBALS['usua'],$GLOBALS['pass'],$GLOBALS['bdat']);
		$comandoSql="SELECT * FROM AUTOS";
		$recordSet=$objConexion->ejecutarSelect($comandoSql);
		$i=0;
		$mat=null;
		while ($registro = $recordSet->fetch_array(MYSQLI_BOTH)){
			
			$mat[$i][0]=  $registro['codre'];
			$mat[$i][1]=  $registro['nombrecar'];
			$mat[$i][2]=  $registro['planta'];
            $mat[$i][3]=  $registro['fecha'];
            $mat[$i][4]=  $registro['modelo'];
            $mat[$i][5]=  $registro['ciudad'];
			$i=$i+1;
		}		

		$objConexion->cerrarid19545681_alexis07();
		return $mat;
	}	
}
?>