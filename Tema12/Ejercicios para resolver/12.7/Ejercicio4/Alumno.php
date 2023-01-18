<?php

    require_once "EscuelaDB.php";
    require_once "AlumnoAsignatura.php";

    class Alumno {

        //Atributos//
        private $matricula;
        private $nombre;
        private $apellidos;
        private $curso;

        //Constructor//
        function __construct($matricula="", $nombre="", $apellidos="", $curso=""){
            $this->matricula = $matricula;
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->curso = $curso;
        }

        //Getters y Setters//
        public function getMatricula(){
            return $this->matricula;
        }

        public function setMatricula($matricula){
            $this->matricula = $matricula;
            return $this;
        }
 
        public function getNombre(){
            return $this->nombre;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
            return $this;
        }
 
        public function getApellidos(){
            return $this->apellidos;
        }

        public function setApellidos($apellidos){
            $this->apellidos = $apellidos;
            return $this;
        }

        public function getCurso(){
            return $this->curso;
        }

        public function setCurso($curso){
            $this->curso = $curso;
            return $this;
        }

        //Métodos//
        //Método para obtener los alumnos según su grupo
        public static function getAlumnosGrupos($grupo){
            $conexion = EscuelaDB::connectDB();
            $seleccion = "SELECT matricula, nombre, apellidos, curso FROM alumno WHERE curso = '$grupo'";
            $consulta = $conexion->query($seleccion);
            $alumnosGrupos = [];
            while ($registro = $consulta->fetchObject()){
                $alumnosGrupos[] = ["matricula"=>$registro->matricula, "nombre"=>$registro->nombre, "apellidos"=>$registro->apellidos, "curso"=>$registro->curso];
            }
            return $alumnosGrupos;
        }

        //Método para obtener los alumnos que aparece en su nombre una cadena introducida
        public static function getAlumnosCadena($cadena){
            $conexion = EscuelaDB::connectDB();
            $seleccion = "SELECT matricula, nombre, apellidos, curso FROM alumno WHERE nombre LIKE '%$cadena%'";
            $consulta = $conexion->query($seleccion);
            $alumnosCadena = [];
            while ($registro = $consulta->fetchObject()){
                $alumnosCadena[] = ["matricula"=>$registro->matricula, "nombre"=>$registro->nombre, "apellidos"=>$registro->apellidos, "curso"=>$registro->curso];
            }
            return $alumnosCadena;
        }

        //Método para obtener los alumnos según su matricula
        public static function getAlumnosbyMatricula($matricula){
            $conexion = EscuelaDB::connectDB();
            $seleccion = "SELECT matricula, nombre, apellidos, curso FROM alumno WHERE matricula = '$matricula'";
            $consulta = $conexion->query($seleccion);
            $alumnos = [] ;
            while ($registro = $consulta->fetchObject()){
                $alumnos[] = ["matricula"=>$registro->matricula, "nombre"=>$registro->nombre, "apellidos"=>$registro->apellidos, "curso"=>$registro->curso];
            }
            return $alumnos;
        }

        //Método para cambiar de grupo a un alumno
        public static function cambioGrupo($matricula, $curso){
            $alumnos = Alumno::getAlumnosbyMatricula($matricula);
            if (count($alumnos)>0) {
                $conexion = EscuelaDB::connectDB();
                $actualiza = "UPDATE alumno SET curso='$curso' WHERE matricula = '$matricula'";
                $conexion->exec($actualiza);
                $cod = 1;
            } else {
                $cod = 0;
            }
            return $cod;
        }

        //Método para borrar a un alumno
        public static function borrarAlumno($matricula){
            $alumnos = Alumno::getAlumnosbyMatricula($matricula);
            AlumnoAsignatura::borrarAlumnoAsignatura($matricula);
            if (count($alumnos)>0) {
                $conexion = EscuelaDB::connectDB();
                $borrar = "DELETE FROM alumno WHERE matricula = '$matricula'";
                $conexion->exec($borrar);
                $cod = 1;
            } else {
                $cod = 0;
            }
            return $cod;
        }
    }