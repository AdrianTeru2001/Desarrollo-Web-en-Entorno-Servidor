<?php
require_once 'BlogDB.php';

class Cuentas
{
    private $nombre;
    private $estado;
    private $token;
    private $consultas;

    function __construct($nombre = "", $estado = "", $token="", $consultas = "")
    {
        $this->nombre = $nombre;
        $this->estado = $estado;
        $this->token = $token;
        $this->consultas = $consultas;
    }    
    public function insert()
    {
        $conexion = BlogDB::connectDB();
        $tokens = self::getTokens();
        $this->setToken();
        while(in_array($this->getToken(), $tokens)){
            $this->setToken();
        }
        $this->setEstado("activa");
        $this->setConsultas(5);

        $cuentas = self::getCuentas();
        $bandera = true;
        foreach ($cuentas as $item) {
            if(strtolower($item->getNombre()) == strtolower($this->nombre)){
                $bandera = false;
            }
        }

        if($bandera){
            $insercion = "INSERT INTO cuentas (nombre, estado, token, consultas) VALUES ('$this->nombre','$this->estado','$this->token','$this->consultas')";
            $conexion->exec($insercion);
            return true;
        }
        else{
            return false;
        }

    }
    public function delete()
    {
        $conexion = BlogDB::connectDB();
        $borrado = "DELETE FROM cuentass WHERE nombre=$this->nombre";
        $conexion->exec($borrado);
    }
    public function update()
    {
        $conexion = BlogDB::connectDB();
        $actualiza = "UPDATE cuentas SET estado='$this->estado', token='$this->token', consultas='$this->consultas' WHERE nombre='$this->nombre'";
        $conexion->exec($actualiza);
    }
    public static function getCuentas()
    {
        $conexion = BlogDB::connectDB();
        $seleccion = "SELECT * FROM cuentas";
        $consulta = $conexion->query($seleccion);
        $cuentas = [];
        while ($registro = $consulta->fetchObject()) {
            $cuentas[] = new Cuentas($registro->nombre, $registro->estado, $registro->token, $registro->consultas);
        }
        return $cuentas;
    }

    public static function getTokens()
    {
        $conexion = BlogDB::connectDB();
        $seleccion = "SELECT token FROM cuentas";
        $consulta = $conexion->query($seleccion);
        $tokens = [];
        while ($registro = $consulta->fetchObject()) {
            $tokens[] = $registro->token;
        }
        return $tokens;
    }
    public static function getCuentaByToken($token)
    {
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

    public static function activarCuenta($token){
        $conexion = BlogDB::connectDB();
        $cuenta = self::getCuentaByToken($token);
        if($cuenta->getEstado() == "bloqueada"){
            $actualiza = "UPDATE cuentas SET estado='activa', consultas=5 WHERE token='$token'";
            $conexion->exec($actualiza);
            return true;
        }
        else{
            return false;
        }

    }

    public function getNombre()
    {
        return $this->nombre;
    }
    public function getEstado()
    {
        return $this->estado;
    }
    public function getToken()
    {
        return $this->token;
    }
    public function getConsultas()
    {
        return $this->consultas;
    }

    public function setConsultas($consultas)
    {
        $this->consultas = $consultas;
        if($this->consultas == 0){
            $this->setEstado("bloqueada");
        }
    }

    public function setEstado($estado)
    {
        $this->estado = $estado;
    }


    public function setToken()
    {
        $token = "";
        for ($i=0; $i < 10; $i++) { 
            $numRandom = rand(0,9);
            $token .= $numRandom;
        }
        $random = rand(65, 90);
        $token .= chr($random);

        $this->token = $token;
    }
}
