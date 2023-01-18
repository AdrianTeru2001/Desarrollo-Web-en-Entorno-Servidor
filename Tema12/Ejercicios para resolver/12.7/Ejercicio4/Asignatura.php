<?php

    require_once "EscuelaDB.php";
    require_once "AlumnoAsignatura.php";

    class Asignatura {

        //Atributos//
        private $codigo;
        private $nombre;

        //Constructor//
        function __construct($codigo="", $nombre=""){
            $this->codigo = $codigo;
            $this->nombre = $nombre;
        }

        //Getters y Setters// 
        public function getCodigo(){
            return $this->codigo;
        }

        public function setCodigo($codigo){
            $this->codigo = $codigo;
            return $this;
        }
 
        public function getNombre(){
            return $this->nombre;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
            return $this;
        }

        //Métodos//
        //Método para obtener las asignaturas de un alumno
        public static function getAsignaturas($matricula){
            $codigos = AlumnoAsignatura::getCodigosAsignaturasbyMatricula($matricula);
            $conexion = EscuelaDB::connectDB();
            $asignaturas = [];
            foreach ($codigos as $cod) {
                $seleccion = "SELECT nombre FROM asignatura WHERE codigo = $cod";
                $consulta = $conexion->query($seleccion);
                $registro = $consulta->fetchObject();
                $asig = $registro->nombre;
                if (!in_array($asig, $asignaturas)) {
                    $asignaturas[] = $registro->nombre;
                }
            }
            return $asignaturas;
        }

    }