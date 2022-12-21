<!-- Clase Cita -->

<?php

    require_once "HospitalDB.php";
    /* session_start(); */

    if (!isset($_SESSION["inicioS"]) || !$_SESSION["inicioS"] || $_SESSION["inicioS"]=="") {
        header("Location: ../view/inicioSesion.php");
    }

    class Cita{

        /* Atributos */
        private $paciente;
        private $medico;
        private $fecha;
        private $hora;

        /* Constructor */
        public function __construct($paciente, $medico, $fecha, $hora){
            $this->paciente = $paciente;
            $this->medico = $medico;
            $this->fecha = $fecha;
            $this->hora = $hora;
        }

        /* Getters y Setters */
        public function getPaciente(){
            return $this->paciente;
        }
 
        public function setPaciente($paciente){
            $this->paciente = $paciente;
            return $this;
        }

        public function getMedico(){
            return $this->medico;
        }

        public function setMedico($medico){
            $this->medico = $medico;
            return $this;
        }

        public function getFecha(){
            return $this->fecha;
        }

        public function setFecha($fecha){
            $this->fecha = $fecha;
            return $this;
        }
 
        public function getHora(){
            return $this->hora;
        }

        public function setHora($hora){
            $this->hora = $hora;
            return $this;
        }

        /* Metodos */
        public function insert(){
            $conexion = HospitalDB::connectDB();
            $insercion = "INSERT INTO cita (paciente, medico, fecha, hora) VALUES ('$this->paciente', '$this->medico', '$this->fecha', '$this->hora')";
            $conexion->exec($insercion);
        }


        /* Metodos estaticos */
        public static function getCitaById($paciente, $medico, $fecha){
            $conexion = HospitalDB::connectDB();
            $seleccion = "SELECT paciente, medico, fecha, hora FROM cita WHERE paciente=$paciente and medico=$medico and fecha='$fecha'";
            $consulta = $conexion->query($seleccion);

            $registro = $consulta->fetchObject();

            if ($registro == "") {
                return false;
            } else{
                $citaId = new Cita($registro->paciente, $registro->medico, $registro->fecha, $registro->hora);
                return $citaId;
            }

            /* $citaId = new Cita($registro->paciente, $registro->medico, $registro->fecha, $registro->hora); */

            /* echo var_dump($citaId); */

            /* return $citaId; */
        }

        public static function getCitaOcupada($medico, $fecha, $hora){
            $conexion = HospitalDB::connectDB();
            $seleccion = "SELECT paciente, medico, fecha, hora FROM cita WHERE  medico=$medico and fecha='$fecha' and hora=$hora";
            $consulta = $conexion->query($seleccion);

            $registro = $consulta->fetchObject();

            if ($registro == "") {
                return false;
            } else{
                return true;
            }
        }

        public static function getCitasByPaciente($paciente, $fecha){
            $conexion = HospitalDB::connectDB();
            $seleccion = "SELECT paciente, medico, fecha, hora FROM cita WHERE  paciente=$paciente and fecha=$fecha";
            $consulta = $conexion->query($seleccion);

            if ($registro = $consulta->fetchObject() == "") {
                return false;
            } else{
                $citasPaciente = [];

                while ($registro = $consulta->fetchObject()) {
                    $citasPaciente[] = new Cita($registro->paciente, $registro->medico, $registro->fecha, $registro->hora);
                }

                return $citasPaciente;
            }

            
        }

    }

?>