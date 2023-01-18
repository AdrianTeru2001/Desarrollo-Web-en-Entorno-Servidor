<?php

    require_once "EscuelaDB.php";
    require_once "Alumno.php";

    class AlumnoAsignatura {

        //Atributos//
        private $matricula;
        private $codigo;

        //Constructor//
        function __construct($matricula="", $codigo=""){
            $this->matricula = $matricula;
            $this->codigo = $codigo;
        }

        //Getters y Setters//
        public function getMatricula(){
            return $this->matricula;
        }

        public function setMatricula($matricula){
            $this->matricula = $matricula;
            return $this;
        }

        public function getCodigo(){
            return $this->codigo;
        }

        public function setCodigo($codigo){
            $this->codigo = $codigo;
            return $this;
        }

        //Métodos//
        //Método para obtener los código de las asignaturas que está matriculado un alumno
        public static function getCodigosAsignaturasbyMatricula($matricula){
            $conexion = EscuelaDB::connectDB();
            $seleccion = "SELECT codigo FROM alumnoasignatura WHERE matricula = '$matricula'";
            $consulta = $conexion->query($seleccion);
            $codigosAsignatura = [];
            while ($registro = $consulta->fetchObject()){
                $codigo = $registro->codigo;
                if (!in_array($codigo, $codigosAsignatura)) {
                    $codigosAsignatura[] = $codigo;
                }
            }
            return $codigosAsignatura;
        }

        //Método para obtener los códigos de las asignaturas
        public static function getCodigosAsignaturas(){
            $conexion = EscuelaDB::connectDB();
            $seleccion = "SELECT codigo FROM alumnoasignatura";
            $consulta = $conexion->query($seleccion);
            $codigosAsignatura = [];
            while ($registro = $consulta->fetchObject()){
                $codigo = $registro->codigo;
                if (!in_array($codigo, $codigosAsignatura)) {
                    $codigosAsignatura[] = $codigo;
                }
            }
            return $codigosAsignatura;
        }

        //Método para matricular a un alumno en una asignatura
        public static function matricular($matricula, $codigo){
            $codigos = AlumnoAsignatura::getCodigosAsignaturas();
            $codigosMatri = AlumnoAsignatura::getCodigosAsignaturasbyMatricula($matricula);
            $alumnos = Alumno::getAlumnosbyMatricula($matricula);
            if (!in_array($codigo, $codigosMatri) && in_array($codigo, $codigos) && count($alumnos)>0) {
                $conexion = EscuelaDB::connectDB();
                $insercion = "INSERT INTO alumnoasignatura(matricula, codigo) VALUES ('$matricula', '$codigo')";
                $conexion->exec($insercion);
                $cod = 1;
            } else if (!in_array($codigo, $codigos)) {
                $cod = 2;
            } else if (in_array($codigo, $codigosMatri)) {
                $cod = 3;
            } else if (count($alumnos)==0) {
                $cod = 4;
            } else {
                $cod = 0;
            }
            return $cod;
        }

        //Método para borrar la matriculación de un alumno de las asignaturas
        public static function borrarAlumnoAsignatura($matricula){
            $conexion = EscuelaDB::connectDB();
            $borrar = "DELETE FROM alumnoasignatura WHERE matricula = '$matricula'";
            $conexion->exec($borrar);
        }

    }