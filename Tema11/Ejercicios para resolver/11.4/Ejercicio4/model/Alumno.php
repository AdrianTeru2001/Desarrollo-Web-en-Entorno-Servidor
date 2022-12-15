<!-- Clase Alumno -->

<?php 

    require_once "EscuelaDB.php";

    class Alumno{

        //Atributos
        private $matricula;
        private $nombre;
        private $apellidos;
        private $curso;

        //Constructor
        public function __construct($matricula, $nombre, $apellidos, $curso){
            $this->matricula = $matricula;
            $this->nombre = $nombre;
            $this->apellidos = $apellidos;
            $this->curso = $curso;
        }

        //Getters y Setters
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

        //Metodos
        public function insert(){
            $conexion = EscuelaDB::connectDB();
            $insercion = "INSERT INTO alumno (matricula, nombre, apellidos, curso) VALUES (\"".$this->matricula."\", \"".$this->nombre."\", \"".$this->apellidos."\", \"".$this->curso."\")";
            $conexion->exec($insercion);
        }

        public function delete(){
            $conexion = EscuelaDB::connectDB();
            $borrado = "DELETE FROM alumno WHERE matricula ='$this->matricula'";
            $conexion->exec($borrado);
        }

        //Metodos estaticos
        public static function getAlumnos(){
            $conexion = EscuelaDB::connectDB();
            $seleccion = "SELECT matricula, nombre, apellidos, curso FROM alumno";
            $consulta = $conexion->query($seleccion);

            $alumnos = [];

            while ($registro = $consulta->fetchObject()) {
                $alumnos[] = new Alumno($registro->matricula, $registro->nombre, $registro->apellidos, $registro->curso);
            }

            return $alumnos;
        }

    }

?>