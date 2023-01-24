<?php

    require_once "ProyectoDB.php";

    class Comentario{

        //Atributos//
        private $usuario;
        private $pelicula;
        private $puntuacion;
        private $comentario;

        //Constructor//
        function __construct($usuario="", $pelicula="", $puntuacion=0, $comentario="") {
            $this->usuario = $usuario;
            $this->pelicula = $pelicula;
            $this->puntuacion = $puntuacion;
            $this->comentario = $comentario;
        }

        //Getters y Setters//
        public function getUsuario(){
            return $this->usuario;
        }

        public function setUsuario($usuario){
            $this->usuario = $usuario;
            return $this;
        }

        public function getPelicula(){
            return $this->pelicula;
        }

        public function setPelicula($pelicula){
            $this->pelicula = $pelicula;
            return $this;
        }

        public function getPuntuacion(){
            return $this->puntuacion;
        }

        public function setPuntuacion($puntuacion){
            $this->puntuacion = $puntuacion;
            return $this;
        }
 
        public function getComentario(){
            return $this->comentario;
        }

        public function setComentario($comentario){
            $this->comentario = $comentario;
            return $this;
        }

        //Metodos//
        public static function getComentarios($pelicula) {
            $conexion = ProyectoDB::connectDB();
            $seleccion = "SELECT usuario, pelicula, puntuacion, comentario FROM comentarios WHERE pelicula='$pelicula'";
            $consulta = $conexion->query($seleccion);
            $comentarios = [];
            while ($registro = $consulta->fetchObject()) {
                $comentarios[] = ["usuario"=>$registro->usuario, "pelicula"=>$registro->pelicula, "puntuacion"=>$registro->puntuacion, "comentario"=>$registro->comentario];
            }
            return $comentarios;
        }

        public static function borrarComentario($usuario, $pelicula){
            $conexion = ProyectoDB::connectDB();
            $borrar = "DELETE FROM comentarios WHERE usuario='$usuario' and pelicula='$pelicula'";
            $conexion->exec($borrar);
        }

        public static function anadirComentario($usuario, $pelicula, $puntuacion, $comentario){
            $conexion = ProyectoDB::connectDB();
            $insercion = "INSERT INTO comentarios VALUES ('$usuario', '$pelicula', $puntuacion, '$comentario')";
            $conexion->exec($insercion);
        }

        public static function editarComentario($usuario, $pelicula, $puntuacion, $comentario){
            $conexion = ProyectoDB::connectDB();
            $actualiza = "UPDATE comentarios SET puntuacion='$puntuacion', comentario='$comentario' WHERE usuario='$usuario' and pelicula='$pelicula'";
            $conexion->exec($actualiza);
        }

    }