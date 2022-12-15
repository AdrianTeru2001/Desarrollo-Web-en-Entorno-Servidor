<!-- Clase Asignatura -->

<?php 

    require_once "EscuelaDB.php";

    class Asignatura{

        //Atributos
        private $codigo;
        private $nombre;

        //Constructor
        public function __construct($codigo, $nombre){
            $this->codigo = $codigo;
            $this->nombre = $nombre;
        }

        //Getters y Setters
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

        //Metodos
        public function insert(){
            $conexion = EscuelaDB::connectDB();
            $insercion = "INSERT INTO asignatura (nombre) VALUES (\"".$this->nombre."\")";
            $conexion->exec($insercion);
        }

        public function delete(){
            $conexion = EscuelaDB::connectDB();
            $borrado = "DELETE FROM asignatura WHERE codigo ='$this->codigo'";
            $conexion->exec($borrado);
        }

        //Metodos estaticos
        public static function getAsignaturas(){
            $conexion = EscuelaDB::connectDB();
            $seleccion = "SELECT codigo, nombre FROM asignatura";
            $consulta = $conexion->query($seleccion);

            $asignaturas = [];

            while ($registro = $consulta->fetchObject()) {
                $asignaturas[] = new Asignatura($registro->codigo, $registro->nombre);
            }

            return $asignaturas;
        }

        public static function cogerAsig($codigos){
            $conexion = EscuelaDB::connectDB();
            $nomAsig = [];
            foreach ($codigos as $item) { 
                $seleccion = "SELECT nombre FROM asignatura WHERE codigo=$item";
                $consulta = $conexion->query($seleccion);
                $registro = $consulta->fetchObject();
                $nomAsig[] = $registro->nombre;
            }
            return $nomAsig;
        }

    }

?>