<?php
require_once 'BancoDB.php';
class Empleado{

    //Atributos//
    private $dni;
    private $nombre;
    private $cargo;
    private $sueldo;

    //Constructor//
    function __construct($dni = 0, $nombre = "", $cargo="", $sueldo = ""){
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->cargo = $cargo;
        $this->sueldo = $sueldo;
    }

    //Getters y Setters//
    public function getDni(){
        return $this->dni;
    }
    public function setDni($dni){
        $this->dni = $dni;
    }
    public function getNombre(){
        return $this->nombre;
    }
    public function setNombre($nombre){
        $this->nombre = $nombre;
    }
    public function getSueldo(){
        return $this->sueldo;
    }
    public function setSueldo($sueldo){
        $this->sueldo = $sueldo;
    }    
    public function getCargo(){
        return $this->cargo;
    }
    public function setCargo($cargo){
        $this->cargo = $cargo;
    }

    //Métodos//
    public function insert(){
        $conexion = BancoDB::connectDB();
        $insercion = "INSERT INTO empleado VALUES ('$this->dni','$this->nombre','$this->cargo',$this->sueldo)";
        $conexion->exec($insercion);
    }
    public function delete(){
        $conexion = BancoDB::connectDB();
        $borrado = "DELETE FROM empleado WHERE dni='$this->dni'";
        $conexion->exec($borrado);
    }
    public function update(){
        $conexion = BancoDB::connectDB();
        $actualiza = "UPDATE empleado SET nombre='$this->nombre',cargo='$this->cargo',sueldo=$this->sueldo WHERE dni='$this->dni'";
        $conexion->exec($actualiza);
    }
    public static function getEmpleados(){
        $conexion = BancoDB::connectDB();
        $seleccion = "SELECT * FROM empleado";
        $consulta = $conexion->query($seleccion);
        $empleados = [];
        while ($registro = $consulta->fetchObject()) {
            $empleados[] = new Empleado($registro->dni, $registro->nombre, $registro->cargo, $registro->sueldo);
        }
        return $empleados;
    }
    public static function getEmpleadoById($dni){
        $conexion = BancoDB::connectDB();
        $seleccion = "SELECT * FROM empleado WHERE dni='$dni'";
        $consulta = $conexion->query($seleccion);
        if ($consulta->rowCount()>0) {
            $registro = $consulta->fetchObject();
            $empleado = new Empleado($registro->dni, $registro->nombre, $registro->cargo, $registro->sueldo);
            return $empleado;
        } else {
            return false;
        }
    }
}