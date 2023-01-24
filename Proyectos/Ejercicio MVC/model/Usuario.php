<?php

    require_once "ProyectoDB.php";

    class Usuario{

        //Atributos//
        private $usuario;
        private $contrasena;

        //Constructor//
        function __construct($usuario="", $contrasena="") {
            $this->usuario = $usuario;
            $this->contrasena = $contrasena;
        }

        //Getters y Setters//
        public function getUsuario(){
            return $this->usuario;
        }

        public function setUsuario($usuario){
            $this->usuario = $usuario;
            return $this;
        }

        public function getContrasena(){
            return $this->contrasena;
        }

        public function setContrasena($contrasena){
            $this->contrasena = $contrasena;
            return $this;
        }

        //Metodos//
        public static function registrarUsuario($usuario, $contrasena) {
            $usuarios = Usuario::getUsuarios();
            $nombresUsuario = [];
            $registro = false;
            for ($i=0; $i < count($usuarios); $i++) { 
                $nombresUsuario[] = $usuarios[$i]->usuario;
            }
            if (!in_array($usuario, $nombresUsuario)) {
                $conexion = ProyectoDB::connectDB();
                $insercion = "INSERT INTO usuario (usuario, contrasena) VALUES (\"".$usuario."\", \"".$contrasena."\")";
                $conexion->exec($insercion);
                $registro = true;
            } else {
                $registro = false;
            }
            return $registro;
        }

        public static function getUsuarios() {
            $conexion = ProyectoDB::connectDB();
            $seleccion = "SELECT usuario, contrasena FROM usuario";
            $consulta = $conexion->query($seleccion);
            $usuarios = [];
            while ($registro = $consulta->fetchObject()) {
                $usuarios[] = new Usuario($registro->usuario, $registro->contrasena);
            }
            return $usuarios;
        }

        public static function comprobarInicioSesion($usuario, $contrasena) {
            $usuarios = Usuario::getUsuarios();
            $inicio = false;
            for ($i=0; $i < count($usuarios); $i++) { 
                if ($usuarios[$i]->usuario == $usuario) {
                    if ($usuarios[$i]->contrasena == $contrasena) {
                        $inicio = true;
                    }
                }
            }
            return $inicio;
        }
    }