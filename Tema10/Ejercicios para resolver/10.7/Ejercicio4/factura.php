<!-- Clase Factura -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Factura</title>
</head>

<body>
    
    <?php 
    
        class factura{

            //Atributos
            private static $IVA = 0.21;
            private $importeBase;
            private $fecha;
            private $estado;
            private $productos;

            //Constructor
            public function __construct(){
                $this->importeBase = 0;
                $this->fecha = date("d-m-Y, H:i:s");
                $this->estado = "pendiente";
                $this->productos = [];
            }
            
            //Metodos
            public function AnadeProducto($nombre, $precio, $cantidad){
                $this->productos[] = [$nombre, $precio, $cantidad];
                $this->importeBase += $precio*$cantidad;
            }

            public function ImprimeFactura(){
                $this->importeBase += ($this->importeBase*self::$IVA);
                $this->estado = "pagada";
                echo "<br>&nbsp;--------------- <br>";
                echo "| FACTURA |";
                echo "<br>&nbsp;--------------- <br>";
                echo "<br>Fecha: ",$this->fecha,"<br>";
                echo "<br>Productos: <br>";
                for ($i=0; $i < count($this->productos); $i++) { 
                    for ($j=0; $j < 3; $j++) { 
                        if ($j==0) {
                            echo "Nombre -> ",$this->productos[$i][$j],"&nbsp;&nbsp;&nbsp;&nbsp;";
                        } else if ($j==1) {
                            echo "Precio -> ",$this->productos[$i][$j],"€&nbsp;&nbsp;&nbsp;&nbsp;";
                        } else {
                            echo "Cantidad -> ",$this->productos[$i][$j];
                        }
                    }
                    /* echo var_dump($this->productos[$i]); */
                    echo "<br>";
                }
                echo "<br>";
                echo "Importe Base: ",round($this->importeBase, 2),"€<br><br>";
                echo "Estado: ",$this->estado,"<br>";
            }

            //Getters y Setters
            public function getImporteBase(){
                return $this->importeBase;
            }

            public function getFecha(){
                return $this->fecha;
            }

            public function setFecha($fecha){
                $this->fecha = $fecha;
                return $this;
            }

            public function getEstado(){
                return $this->estado;
            }

            public function setEstado($estado){
                $this->estado = $estado;
                return $this;
            }

            //ToString
            public function __toString(){
                return "Factura: <br>IVA -> ".self::$IVA."<br>Importe Base -> ".$this->importeBase."<br>Fecha -> ".$this->fecha."<br>Estado -> ".$this->estado."<br>Productos -> Vacio";
            }
            
        }

    ?>

</body>

</html>