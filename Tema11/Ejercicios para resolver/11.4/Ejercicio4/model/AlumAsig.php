<!-- Clase Alumno con Asignaturas -->

<?php 

    require_once "EscuelaDB.php";

    class AlumAsig{

        //Atributos
        private $matriculaAlum;
        private $codigoAsig;

        //Constructor
        public function __construct($matriculaAlum, $codigoAsig){
            $this->matriculaAlum = $matriculaAlum;
            $this->codigoAsig = $codigoAsig;
        }

        //Getters y Setters
        public function getMatriculaAlum(){
            return $this->matriculaAlum;
        }
 
        public function setMatriculaAlum($matriculaAlum){
            $this->matriculaAlum = $matriculaAlum;
            return $this;
        }
 
        public function getCodigoAsig(){
            return $this->codigoAsig;
        }

        public function setCodigoAsig($codigoAsig){
            $this->codigoAsig = $codigoAsig;
            return $this;
        }

        //Metodos
        public function insert(){
            $conexion = EscuelaDB::connectDB();
            $insercion = "INSERT INTO alumno_asignatura (matricula_alum, codigo_asig) VALUES ('$this->matriculaAlum', $this->codigoAsig)";
            $conexion->exec($insercion);
        }

        public function delete(){
            $conexion = EscuelaDB::connectDB();
            $borrado = "DELETE FROM alumno_asignatura WHERE matricula_alum ='$this->matriculaAlum' and codigo_asig='$this->codigoAsig'";
            $conexion->exec($borrado);
        }

        //Metodos estaticos
        public static function getAlumAsig(){
            $conexion = EscuelaDB::connectDB();
            $seleccion = "SELECT matricula_alum, codigo_asig FROM alumno_asignatura";
            $consulta = $conexion->query($seleccion);

            $alumAsig = [];

            while ($registro = $consulta->fetchObject()) {
                $alumAsig[] = new AlumAsig($registro->matricula_alum, $registro->codigo_asig);
            }

            return $alumAsig;
        }

        public static function obtenerCod($mat){
            $conexion = EscuelaDB::connectDB();
            $seleccion = "SELECT codigo_asig FROM alumno_asignatura WHERE matricula_alum='$mat'";
            $consulta = $conexion->query($seleccion);

            $codigos = [];

            while ($registro = $consulta->fetchObject()) {
                $codigos[] = $registro->codigo_asig;
            }

            return $codigos;
        }

    }

?>