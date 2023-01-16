<?php

    require_once "TiendaDB.php";

    class Producto{

        //Atributos
        private $codigo;
        private $nombre;
        private $precio;
        private $imagen;
        private $stock;

        //Constructor
        function __construct($codigo=0, $nombre="", $precio=0, $imagen="", $stock=0) {
            $this->codigo = $codigo;
            $this->nombre = $nombre;
            $this->precio = $precio;
            $this->imagen = $imagen;
            $this->stock = $stock;
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

        public function getPrecio(){
            return $this->precio;
        }

        public function setPrecio($precio){
            $this->precio = $precio;
            return $this;
        }
 
        public function getImagen(){
            return $this->imagen;
        }

        public function setImagen($imagen){
            $this->imagen = $imagen;
            return $this;
        }

        public function getStock(){
            return $this->stock;
        }

        public function setStock($stock){
            $this->stock = $stock;
            return $this;
        }

        //Metodos
        public static function getProductos() {
            $conexion = TiendaDB::connectDB();
            $seleccion = "SELECT codigo, nombre, precio, imagen, stock, descripcion FROM productos ORDER BY codigo";
            $consulta = $conexion->query($seleccion);
            $productos = [];
            while ($registro = $consulta->fetchObject()) {
                $productos[] = ["codigo"=>$registro->codigo, "nombre"=>$registro->nombre, "precio"=>$registro->precio, "imagen"=>$registro->imagen, "stock"=>$registro->stock, "descripcion"=>$registro->descripcion];
            }
            return $productos;
        }

        public static function getProductosFiltroPrecio($min, $max) {
            $conexion = TiendaDB::connectDB();
            $seleccion = "SELECT codigo, nombre, precio, imagen, stock, descripcion FROM productos WHERE precio >= ".$min." AND precio <=".$max;
            $consulta = $conexion->query($seleccion);
            $productos = [];
            while ($registro = $consulta->fetchObject()) {
                $productos[] = ["codigo"=>$registro->codigo, "nombre"=>$registro->nombre, "precio"=>$registro->precio, "imagen"=>$registro->imagen, "stock"=>$registro->stock, "descripcion"=>$registro->descripcion];
            }
            return $productos;
        }

        public static function getProductosFiltroNombre($cad) {
            $conexion = TiendaDB::connectDB();
            $seleccion = "SELECT codigo, nombre, precio, imagen, stock, descripcion FROM productos WHERE nombre LIKE '%$cad%'";
            $consulta = $conexion->query($seleccion);
            $productos = [];
            while ($registro = $consulta->fetchObject()) {
                $productos[] = ["codigo"=>$registro->codigo, "nombre"=>$registro->nombre, "precio"=>$registro->precio, "imagen"=>$registro->imagen, "stock"=>$registro->stock, "descripcion"=>$registro->descripcion];
            }
            return $productos;
        }

    }