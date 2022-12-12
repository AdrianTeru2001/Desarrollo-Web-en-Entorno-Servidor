<!-- Clase Articulo -->

<?php

    require_once "BlogDB.php";

    class Articulo{

        //Atributos
        private $id;
        private $titulo;
        private $fecha;
        private $contenido;

        //Constructor
        public function __construct($id, $titulo, $fecha, $contenido){
            $this->id = $id;
            $this->titulo = $titulo;
            $this->fecha = $fecha;
            $this->contenido = $contenido;
        }

        //Getters y Setters
        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
            return $this;
        }

        public function getTitulo(){
            return $this->titulo;
        }
 
        public function setTitulo($titulo){
            $this->titulo = $titulo;
            return $this;
        }

        public function getFecha(){
            return $this->fecha;
        }

        public function setFecha($fecha){
            $this->fecha = $fecha;
            return $this;
        }

        public function getContenido(){
            return $this->contenido;
        }
 
        public function setContenido($contenido){
            $this->contenido = $contenido;
            return $this;
        }

        //Metodos
        public function insert(){
            $conexion = BlogDB::connectDB();
            $insercion = "INSERT INTO articulos (titulo, fecha, contenido) VALUES (\"".$this->titulo."\", \"".$this->fecha."\", \"".$this->contenido."\")";
            $conexion->exec($insercion);
        }

        public function delete(){
            $conexion = BlogDB::connectDB();
            $borrado = "DELETE FROM articulos WHERE id=\"".$this->id."\"";
            $conexion->exec($borrado);
        }

        public function modify(){
            $conexion = BlogDB::connectDB();
            $seleccion = "SELECT id, titulo, fecha, contenido FROM articulos";
            $consulta = $conexion->query($seleccion);
            $articulos = [];
            while ($registro = $consulta->fetchObject()) {
                $articulos[] = new Articulo($registro->id, $registro->titulo, $registro->fecha, $registro->contenido);
            }
            for ($i=0; $i < count($articulos); $i++) { 
                if ($articulos[$i]->{"id"} == $this->id) {
                    $tituloAnterior =  $articulos[$i]->{"titulo"};
                    $contenidoAnterior =  $articulos[$i]->{"contenido"};
                }
            }

            if ($this->titulo == "") {
                $titulo = $tituloAnterior;
                echo $titulo," (anteriorT)<br>";
            } else {
                $titulo = $this->titulo;
                echo $titulo," (nuevoT)<br>";
            }
            if (trim($this->contenido) == "") {
                $contenido = $contenidoAnterior;
                echo $contenido," (anteriorC)<br>";
            } else {
                $contenido = $this->contenido;
                echo $contenido," (nuevoC)<br>";
            }

            $conexion = BlogDB::connectDB();
            $update= "UPDATE articulos SET titulo=\"".$titulo."\", contenido=\"".$contenido."\" WHERE id=\"".$this->id."\"";
            $conexion->exec($update);
        }

        public static function getArticulos(){
            $conexion = BlogDB::connectDB();
            $seleccion = "SELECT id, titulo, fecha, contenido FROM articulos";
            $consulta = $conexion->query($seleccion);

            $articulos = [];

            while ($registro = $consulta->fetchObject()) {
                $articulos[] = new Articulo($registro->id, $registro->titulo, $registro->fecha, $registro->contenido);
            }

            return $articulos;
        }
 
    }