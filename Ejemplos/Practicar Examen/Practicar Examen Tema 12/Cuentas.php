<?php
require_once 'BlogDB.php';
class Cuentas{

    //Atributos//
    private $nombre;
    private $estado;
    private $token;
    private $consultas;


    //Constructor//
    function __construct($nombre = "", $estado = "", $token="", $consultas = ""){
        $this->nombre = $nombre;
        $this->estado = $estado;
        $this->token = $token;
        $this->consultas = $consultas;
    }    


    //Getters y Setters//
    public function getNombre(){
        return $this->nombre;
    }
    public function getEstado(){
        return $this->estado;
    }
    public function getToken(){
        return $this->token;
    }
    public function getConsultas(){
        return $this->consultas;
    }


    //Metodos//
    public function insert(){
        $conexion = BlogDB::connectDB();
        $insercion = "INSERT INTO cuentas (nombre, estado, token, consultas) VALUES ('$this->nombre','$this->estado','$this->token','$this->consultas')";
        $conexion->exec($insercion);
    }

    public static function crearCuenta($nombre){
        $conexion = BlogDB::connectDB();
        $tokens = Cuentas::getTokens();
        $cuentaNombre = Cuentas::getCuentaByNombre($nombre);
        $abecedario = ["A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z"];
        if (!$cuentaNombre) {
            $bandera = false;
            while ($bandera==false) {
                $token = "";
                for ($i=0; $i < 10; $i++) { 
                    $numAle = rand(0, 9);
                    $token = $token.$numAle;
                }
                $numAle = rand(0, count($abecedario)-1);
                $token = $token.$abecedario[$numAle];
                if (!in_array($token, $tokens)) {
                    $bandera = true;
                }   
            }
            $insercion = "INSERT INTO cuentas (nombre, token, estado, consultas) VALUES ('$nombre', '$token', 'activa', 5)";
            $conexion->exec($insercion);
            return $token;
        } else {
            return "existeCuenta";
        }
    }

    public function delete(){
        $conexion = BlogDB::connectDB();
        $borrado = "DELETE FROM cuentass WHERE nombre=$this->nombre";
        $conexion->exec($borrado);
    }

    public function update(){
        $conexion = BlogDB::connectDB();
        $actualiza = "UPDATE cuentas SET estado='$this->estado', token='$this->token', consultas='$this->consultas' WHERE nombre='$this->nombre'";
        $conexion->exec($actualiza);
    }

    public function restarUno(){
        $conexion = BlogDB::connectDB();
        $actualiza = "UPDATE cuentas SET consultas='".($this->consultas-1)."' WHERE nombre='$this->nombre'";
        $conexion->exec($actualiza);
    }

    public function bloquearCuenta(){
        $conexion = BlogDB::connectDB();
        $actualiza = "UPDATE cuentas SET estado='bloqueada' WHERE nombre='$this->nombre'";
        $conexion->exec($actualiza);
    }

    public static function activarCuenta($token){
        $conexion = BlogDB::connectDB();
        $cuenta = Cuentas::getCuentaByToken($token);
        if ($cuenta==false) {
            return "noExiste";
        } else {
            if ($cuenta->getEstado()=="activa") {
                return "yaActiva";
            } else if ($cuenta->getEstado()=="bloqueada") {
                $actualiza = "UPDATE cuentas SET estado='activa', consultas=5 WHERE nombre='$cuenta->nombre'";
                $conexion->exec($actualiza);
                return "cuentaActivada";
            }
        }
    }

    public static function getCuentas(){
        $conexion = BlogDB::connectDB();
        $seleccion = "SELECT * FROM cuentas";
        $consulta = $conexion->query($seleccion);
        $cuentas = [];
        while ($registro = $consulta->fetchObject()) {
            $cuentas[] = new Cuentas($registro->nombre, $registro->estado, $registro->token, $registro->consultas);
        }
        return $cuentas;
    }

    public static function getTokens(){
        $conexion = BlogDB::connectDB();
        $seleccion = "SELECT token FROM cuentas";
        $consulta = $conexion->query($seleccion);
        $tokens = [];
        while ($registro = $consulta->fetchObject()) {
            $tokens[] = $registro->token;
        }
        return $tokens;
    }

    public static function getCuentaByToken($token){
        $conexion = BlogDB::connectDB();
        $seleccion = "SELECT * FROM cuentas WHERE token='$token'";
        $consulta = $conexion->query($seleccion);
        if ($consulta->rowCount()>0) {
            $registro = $consulta->fetchObject();
            $cuenta = new Cuentas($registro->nombre, $registro->estado, $registro->token, $registro->consultas);
            return $cuenta;
        }else {
            return false;
        }
    }

    public static function getCuentaByNombre($nombre){
        $conexion = BlogDB::connectDB();
        $seleccion = "SELECT * FROM cuentas WHERE nombre='$nombre'";
        $consulta = $conexion->query($seleccion);
        if ($consulta->rowCount()>0) {
            $registro = $consulta->fetchObject();
            $cuenta = new Cuentas($registro->nombre, $registro->estado, $registro->token, $registro->consultas);
            return $cuenta;
        }else {
            return false;
        }
    }
}
