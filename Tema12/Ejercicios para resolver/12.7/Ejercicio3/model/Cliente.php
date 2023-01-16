<?php

    require_once "TiendaDB.php";

    class Cliente{

        //Atributos
        private $nombre;
        private $token;
        private $peticiones;

        //Constructor
        function __construct($nombre="", $token=0, $peticiones=0) {
            $this->nombre = $nombre;
            $this->token = $token;
            $this->peticiones = $peticiones;
        }

        //Getters y Setters 
        public function getNombre(){
            return $this->nombre;
        }
 
        public function setNombre($nombre){
            $this->nombre = $nombre;
            return $this;
        }

        public function getToken(){
            return $this->token;
        }
 
        public function setToken($token){
            $this->token = $token;
            return $this;
        }

        public function getPeticiones(){
            return $this->peticiones;
        }

        public function setPeticiones($peticiones){
            $this->peticiones = $peticiones;
            return $this;
        }

        //Metodos
        public static function insertUsuario($usuario, $token) {
            $conexion = TiendaDB::connectDB();
            $insercion = "INSERT INTO clientes (nombre, token, peticiones) VALUES (\"".$usuario."\", \"".$token."\", \"0\")";
            $conexion->exec($insercion);
        }

        public static function getClientes() {
            $conexion = TiendaDB::connectDB();
            $seleccion = "SELECT nombre, token, peticiones FROM clientes";
            $consulta = $conexion->query($seleccion);
            $clientes = [];
            while ($registro = $consulta->fetchObject()) {
                $clientes[] = new Cliente($registro->nombre, $registro->token, $registro->peticiones);
            }
            return $clientes;
        }

        public static function generarToken(){
            $clientes = Cliente::getClientes();
            $tokens = [];
            foreach ($clientes as $cl) {
                $tokens[] = $cl->token;
            }
            $bandera = false;
            while (!$bandera) {
                $tok = "";
                for ($i=0; $i < 3; $i++) { 
                    $ale = rand(1,3);
                    $tok = $tok.$ale;
                }
                for ($i=0; $i < 3; $i++) { 
                    $ale = rand(1,3);
                    switch ($ale) {
                        case 1:
                            $tok = $tok."a";
                            break;
                        case 2:
                            $tok = $tok."b";
                            break;
                        case 3:
                            $tok = $tok."c";
                            break;
                    }
                }
                if (!in_array($tok, $tokens)) {
                    $bandera = true;
                }
            }
            return $tok;
        }

        public static function compUsuario($usuario){
            $clientes = Cliente::getClientes();
            $nombres = [];
            foreach ($clientes as $cl) {
                $nombres[] = $cl->nombre;
            }
            $bandera = false;
            if (!in_array($usuario, $nombres)) {
                $bandera = true;
            }
            return $bandera;
        }

        public static function compInicioSesion($usuario, $token){
            $clientes = Cliente::getClientes();
            $nombres = [];
            foreach ($clientes as $cl) {
                $nombres[] = $cl->nombre;
            }
            $bandera = false;
            if (in_array($usuario, $nombres)) {
                $bandera = true;
            }
            if ($bandera) {
                foreach ($clientes as $cl) {
                    if ($cl->nombre==$usuario) {
                        if ($cl->token==$token) {
                            $bandera = true;
                        } else {
                            $bandera = false;
                        }
                    }
                }
            }
            return $bandera;
        }

        public static function sumarPeticion($usuario){
            $conexion = TiendaDB::connectDB();
            $seleccion = "SELECT peticiones FROM clientes where nombre LIKE \"".$usuario."\"";
            $consulta = $conexion->query($seleccion);
            $registro = $consulta->fetchObject();
            $petis = $registro->peticiones;
            $petis++;
            $actualiza = "UPDATE clientes SET peticiones=\"".$petis."\" where nombre LIKE \"".$usuario."\"";
            $conexion->exec($actualiza);
        }
    }