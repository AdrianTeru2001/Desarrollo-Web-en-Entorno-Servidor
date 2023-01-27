<?php
require_once 'BancoDB.php';
class Cliente{

    //Atributos//
    private $dni;
    private $nombre;
    private $direccion;
    private $telefono;
    private $gestor;

    //Constructor//
    function __construct($dni = 0, $nombre = "", $direccion="", $telefono = "", $gestor = ""){
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->direccion = $direccion;
        $this->telefono = $telefono;
        $this->gestor = $gestor;
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
    public function getTelefono(){
        return $this->telefono;
    }
    public function setTelefono($telefono){
        $this->telefono = $telefono;
    }
    public function getGestor(){
        return $this->gestor;
    }
    public function setGestor($gestor){
        $this->gestor = $gestor;
    }
    public function getDireccion(){
        return $this->direccion;
    }
    public function setDireccion($direccion){
        $this->direccion = $direccion;
    }

    //Métodos//
    public function insert(){
        $conexion = BancoDB::connectDB();
        $insercion = "INSERT INTO cliente VALUES ('$this->dni','$this->nombre','$this->direccion','$this->telefono','$this->gestor')";
        $conexion->exec($insercion);
    }
    public function delete(){
        $conexion = BancoDB::connectDB();
        $borrado = "DELETE FROM cliente WHERE dni='$this->dni'";
        $conexion->exec($borrado);
    }
    public function update(){
        $conexion = BancoDB::connectDB();
        $actualiza = "UPDATE cliente SET nombre='$this->nombre',direccion='$this->direccion',telefono='$this->telefono', gestor='$this->gestor' WHERE dni='$this->dni'";
        $conexion->exec($actualiza);
    }
    public static function getClientes(){
        $conexion = BancoDB::connectDB();
        $seleccion = "SELECT * FROM cliente";
        $consulta = $conexion->query($seleccion);
        $clientes = [];
        while ($registro = $consulta->fetchObject()) {
            $clientes[] = new Cliente($registro->dni, $registro->nombre, $registro->direccion, $registro->telefono, $registro->gestor);
        }
        return $clientes;
    }
    public static function getClientesByEmpleado($dni){
        $conexion = BancoDB::connectDB();
        $seleccion = "SELECT * FROM cliente WHERE gestor='$dni'";
        $consulta = $conexion->query($seleccion);
        $clientes = [];
        while ($registro = $consulta->fetchObject()) {
            $clientes[] = new Cliente($registro->dni, $registro->nombre, $registro->direccion, $registro->telefono, $registro->gestor);
        }
        return $clientes;
    }
    public static function getClienteById($dni){
        $conexion = BancoDB::connectDB();
        $seleccion = "SELECT * FROM cliente WHERE dni='$dni'";
        $consulta = $conexion->query($seleccion);
        if ($consulta->rowCount()>0) {
            $registro = $consulta->fetchObject();
            $cliente = new Cliente($registro->dni, $registro->nombre, $registro->direccion, $registro->telefono, $registro->gestor);
            return $cliente;
        } else {
            return false;
        }
    }
    public static function existeClienteGestor($gestor){
        $conexion = BancoDB::connectDB();
        $seleccion = "SELECT * FROM cliente WHERE gestor='$gestor'";
        $consulta = $conexion->query($seleccion);
        if ($consulta->rowCount()>0) {
            return true;
        } else {
            return false;
        }
    }
}