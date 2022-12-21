<!-- Clase Usuario -->

<?php

    require_once "HospitalDB.php";
    /* session_start(); */

    if (!isset($_SESSION["inicioS"]) || !$_SESSION["inicioS"] || $_SESSION["inicioS"]=="") {
        header("Location: ../view/inicioSesion.php");
    }

    class Usuario{

        /* Atributos */
        private $id;
        private $nombre;
        private $clave;
        private $perfil;

        /* Constructor */
        public function __construct($id, $nombre, $clave, $perfil){
            $this->id = $id;
            $this->nombre = $nombre;
            $this->clave = $clave;
            $this->perfil = $perfil;
        }

        /* Getters y Setters */
        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
            return $this;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
            return $this;
        }
 
        public function getClave(){
            return $this->clave;
        }

        public function setClave($clave){
            $this->clave = $clave;
            return $this;
        }

        public function getPerfil(){
            return $this->perfil;
        }
 
        public function setPerfil($perfil){
            $this->perfil = $perfil;
            return $this;
        }

        /* Metodos */



        /* Metodos estaticos */
        public static function getMedicos(){
            $conexion = HospitalDB::connectDB();
            $seleccion = "SELECT id, nombre, clave, perfil FROM usuario WHERE perfil='medico'";
            $consulta = $conexion->query($seleccion);

            $medicos = [];

            while ($registro = $consulta->fetchObject()) {
                $medicos[] = new Usuario($registro->id, $registro->nombre, $registro->clave, $registro->perfil);
            }

            return $medicos;
        }

        public static function getUsuarioByLogin($nombre, $clave){
            $conexion = HospitalDB::connectDB();
            $seleccion = "SELECT id, nombre, clave, perfil FROM usuario";
            $consulta = $conexion->query($seleccion);

            $nombres = [];
            $nombresPerfil = [];

            while ($registro = $consulta->fetchObject()) {
                $usuario[$registro->nombre] = $registro->clave;
                $nombres = array_keys($usuario);
                $nombresPerfil[$registro->nombre] = $registro->perfil;
            }

            if (in_array($nombre, $nombres)) {
                if ($clave == $usuario[$nombre]) {
                    if ($nombresPerfil[$nombre] == "paciente") {
                        return $nombre;
                    } else {
                        return "Lo siento, es usted médico y esta web es solo para pacientes";
                    }
                } else {
                    return "No existe ningún paciente con esas credenciales";
                }
            } else {
                return "No existe ningún paciente con esas credenciales";
            }

        }

        public static function idPaciente($nombre){
            $conexion = HospitalDB::connectDB();
            $seleccion = "SELECT id FROM usuario WHERE nombre='$nombre'";
            $consulta = $conexion->query($seleccion);
            $registro = $consulta->fetchObject();

            $idPaciente = $registro->id;

            return $idPaciente;
        }


    }

?>