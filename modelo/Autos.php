<?php
class Autos{
    var $CodRe;
    var $NombreCar;
    var $Planta;
    var $Modelo;
    var $Fecha;
    var $Ciudad;
    function __construct($codre,$nombrecar,$planta,$modelo,$fecha,$ciudad)
    {
        $this->CodRe=$codre;
        $this->NombreCar=$nombrecar;
        $this->Planta=$planta;
        $this->Modelo=$modelo;
        $this->Fecha=$fecha;
        $this->Ciudad=$ciudad;
    }
    function setCodRe($codre) { $this->CodRe = $codre; }
    function getCodRe() { return $this->CodRe; }

    function setNombreCar($nombrecar) { $this->NombreCar = $nombrecar; }
    function getNombreCar() { return $this->NombreCar; }

    function setPlanta($planta) { $this->Planta = $planta; }
    function getPlanta() { return $this->Planta; }

    function setModelo($modelo) { $this->Modelo = $modelo; }
    function getModelo() { return $this->Modelo; }

    function setFecha($fecha) { $this->Fecha = $fecha; }
    function getFecha() { return $this->Fecha; }

    function setCiudad($ciudad) { $this->Ciudad = $ciudad; }
    function getCiudad() { return $this->Ciudad; }
}
?>