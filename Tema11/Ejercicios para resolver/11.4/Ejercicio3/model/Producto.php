<!-- Clase Producto -->

<?php 

    require_once "CarritoDB.php";

    class Producto{

        //Atributos
        private $id;
        private $nombre;
        private $precio;
        private $stock;

        //Constructor
        public function __construct($id, $nombre, $precio, $stock){
            $this->id = $id;
            $this->nombre = $nombre;
            $this->precio = $precio;
            $this->stock = $stock;
        }

        //Getters y Setters
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

        //Metodos
        public function vender(){
            $productos = $this->getProductos();
            $prodCarrito = $this->getProductosCarr();
            $precioTotal = 0;

            $file = "../Factura.txt";
            $fp = fopen($file, "w");
            fwrite($fp, "Factura".PHP_EOL);
            fwrite($fp, "-------".PHP_EOL);
            for ($i=0; $i < count($productos); $i++) { 
                for ($j=0; $j < count($prodCarrito); $j++) { 
                    if ($productos[$i]->{"id"} == $prodCarrito[$j]->{"id"}) {

                        fwrite($fp, $prodCarrito[$j]->{"nombre"}.PHP_EOL);
                        fwrite($fp, "Cantidad -> ".$prodCarrito[$j]->{"stock"}.PHP_EOL);
                        fwrite($fp, "-------".PHP_EOL);

                        $precioTotal += $prodCarrito[$j]->{"stock"}*$productos[$i]->{"precio"};

                        $stockActual = $productos[$i]->{"stock"} - $prodCarrito[$j]->{"stock"};

                        $conexion = CarritoDB::connectDB();
                        $modificarStock = "UPDATE productos SET stock=$stockActual WHERE id=\"".$productos[$i]->{"id"}."\"";
                        $conexion->exec($modificarStock);

                        $conexion = CarritoDB::connectDB();
                        $borraCarrito = "DELETE FROM carrito WHERE id=\"".$prodCarrito[$j]->{'id'}."\"";
                        $conexion->exec($borraCarrito);
                    }
                }
            }
            fwrite($fp, "Total -> ".$precioTotal."€");
            fclose($fp);
        }

        public function insert(){
            $conexion = CarritoDB::connectDB();
            $insercion = "INSERT INTO productos (nombre, precio, stock) VALUES (\"".$this->nombre."\", \"".$this->precio."\", \"".$this->stock."\")";
            $conexion->exec($insercion);
        }

        public function delete(){
            $bandera = "no";
            $prodCarrito = $this->getProductosCarr();
            for ($i=0; $i < count($prodCarrito); $i++) { 
                if ($prodCarrito[$i]->{"id"} == $this->id) {
                    $bandera = "si";
                }
            }

            if ($bandera=="si"){
                $conexion = CarritoDB::connectDB();
                $borrado = "DELETE FROM carrito WHERE id ='$this->id'";
                $conexion->exec($borrado);
            }

            $conexion = CarritoDB::connectDB();
            $borrado = "DELETE FROM productos WHERE id ='$this->id'";
            $conexion->exec($borrado);
        }

        public function deleteCarrito(){
            $conexion = CarritoDB::connectDB();
            $borrado = "DELETE FROM carrito WHERE id ='$this->id'";
            $conexion->exec($borrado);
        }

        public function reponer(){
            $productos = $this->getProductos();
            for ($i=0; $i < count($productos); $i++) { 
                if ($productos[$i]->{"id"} == $this->id) {
                    $stockAnterior =  $productos[$i]->{"stock"};
                }
            }
            $stockTotal = $stockAnterior + $this->stock;

            $conexion = CarritoDB::connectDB();
            $reponer = "UPDATE productos SET stock=$stockTotal WHERE id=\"".$this->id."\"";
            $conexion->exec($reponer);
        }

        public function anadirCarrito(){
            $bandera = "no";
            $prodCarrito = $this->getProductosCarr();
            $cantidadAnterior = 0;
            for ($i=0; $i < count($prodCarrito); $i++) { 
                if ($prodCarrito[$i]->{"id"} == $this->id) {
                    $cantidadAnterior =  $prodCarrito[$i]->{"stock"};
                    $bandera = "si";
                }
            }
            $cantidadTotal = $cantidadAnterior + $this->precio;

            if ($cantidadTotal<=$this->stock && $this->stock!=0) {
                if ($bandera=="no") {
                    $conexion = CarritoDB::connectDB();
                    $insercion = "INSERT INTO carrito (id, nombre, cantidad) VALUES (\"".$this->id."\", \"".$this->nombre."\", $cantidadTotal)";
                    $conexion->exec($insercion);
                } else if ($bandera=="si"){
                    $conexion = CarritoDB::connectDB();
                    $update = "UPDATE carrito SET cantidad=$cantidadTotal WHERE id=\"".$this->id."\"";
                    $conexion->exec($update);
                }
            }
            
        }

        //Metodos estaticos
        public static function getProductos(){
            $conexion = CarritoDB::connectDB();
            $seleccion = "SELECT id, nombre, precio, stock FROM productos";
            $consulta = $conexion->query($seleccion);

            $productos = [];

            while ($registro = $consulta->fetchObject()) {
                $productos[] = new Producto($registro->id, $registro->nombre, $registro->precio, $registro->stock);
            }

            return $productos;
        }

        public static function getProductosCarr(){
            $conexion = CarritoDB::connectDB();
            $seleccion = "SELECT id, nombre, cantidad FROM carrito";
            $consulta = $conexion->query($seleccion);

            $prodCarrito = [];

            while ($registro = $consulta->fetchObject()) {
                $prodCarrito[] = new Producto($registro->id, $registro->nombre, "", $registro->cantidad);
            }

            return $prodCarrito;
        }


    }

?>