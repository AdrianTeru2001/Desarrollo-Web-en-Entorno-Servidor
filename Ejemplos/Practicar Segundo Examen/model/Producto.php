<!-- Clase Producto -->

<?php

    require_once "CarritoPracticaDB.php";
    /* session_start(); */

    class Producto{

        /* Atributos */
        private $codigo;
        private $nombre;
        private $precio;
        private $stock;

        /* Constructor */
        public function __construct($codigo, $nombre, $precio, $stock){
            $this->codigo = $codigo;
            $this->nombre = $nombre;
            $this->precio = $precio;
            $this->stock = $stock;
        }

        /* Getters y Setters */ 
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

        public function getPrecio(){
            return $this->precio;
        }

        public function setPrecio($precio){
            $this->precio = $precio;
            return $this;
        }

        public function getStock(){
            return $this->stock;
        }

        public function setStock($stock){
            $this->stock = $stock;
            return $this;
        }

        /* Metodos */
        public function insert(){
            $conexion = CarritoPracticaDB::connectDB();
            $insercion = "INSERT INTO productos (nombre, precio, stock) VALUES ('$this->nombre', '$this->precio', '$this->stock')";
            $conexion->exec($insercion);
        }

        public function borrar($cod){
            $conexion = CarritoPracticaDB::connectDB();
            $delete = "DELETE FROM productos WHERE codigo=$cod";
            $conexion->exec($delete);
        }

        public function reponer($stock, $cant, $cod){
            $cantidadTotal = $stock+$cant;
            $conexion = CarritoPracticaDB::connectDB();
            $reponer = "UPDATE productos SET stock=$cantidadTotal WHERE codigo=$cod";
            $conexion->exec($reponer);
        }

        /* Metodos Estáticos */
        public static function getProductos(){
            $conexion = CarritoPracticaDB::connectDB();
            $seleccion = "SELECT codigo, nombre, precio, stock FROM productos";
            $consulta = $conexion->query($seleccion);

            $productos = [];

            while ($registro = $consulta->fetchObject()) {
                $productos[] = new Producto($registro->codigo, $registro->nombre, $registro->precio, $registro->stock);
            }

            return $productos;
        }

        public static function getStockProd(){
            $conexion = CarritoPracticaDB::connectDB();
            $seleccion = "SELECT codigo, stock FROM productos";
            $consulta = $conexion->query($seleccion);

            $stockProd = [];

            while ($registro = $consulta->fetchObject()) {
                $stockProd[$registro->codigo] = $registro->stock;
            }

            return $stockProd;
        }

        public static function vender($stockProd){
            $conexion = CarritoPracticaDB::connectDB();
            if (isset($_SESSION["carrito"])) {
                $carr = $_SESSION["carrito"];
                $claves = array_keys($carr);
                echo var_dump($carr),"<br><br>";
                echo var_dump($claves),"<br><br>";
                echo var_dump(count($carr)),"<br><br>";

                for ($i=0; $i < count($carr); $i++) { 
                    $stockTotal = $stockProd[$claves[$i]]-$carr[$claves[$i]]; 
                    $vender = "UPDATE productos SET stock=$stockTotal WHERE codigo=".$claves[$i];
                    $conexion->exec($vender);
                    unset($carr[$claves[$i]]);
                }
                $_SESSION["carrito"] = $carr;
            }
        }

    }

?>