<!-- Clase Coche -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coche</title>
</head>

<body>

    <?php 
    
        class Coche{

            //Atributos
            private $matricula;
            private $modelo;
            private $precio;
            private static $modeloCaro = "";
            private static $precioCaro = 0;

            //Constructor
            public function __construct($matricula, $modelo, $precio){
                $this->matricula = $matricula;
                $this->modelo = $modelo;
                $this->precio = $precio;
                if ($precio>self::$precioCaro) {
                    self::$precioCaro = $precio;
                    self::$modeloCaro = $modelo;
                }
            }

            //Metodos
            public function masCaro(){
                return "El coche mas caro es : Modelo -> ".self::$modeloCaro." y Precio -> ".self::$precioCaro." €";
            }


            //Getters y Setters
            public function getMatricula(){
                return $this->matricula;
            }
 
            public function setMatricula($matricula){
                $this->matricula = $matricula;
                return $this;
            }

            public function getModelo(){
                return $this->modelo;
            }

            public function setModelo($modelo){
                $this->modelo = $modelo;
                return $this;
            }
 
            public function getPrecio(){
                return $this->precio;
            }

            public function setPrecio($precio){
                $this->precio = $precio;
                return $this;
            }

            public static function getModeloCaro(){
                return Coche::$modeloCaro;
            }
 
            public function setModeloCaro($modeloCaro){
                Coche::$modeloCaro = $modeloCaro;
                return Coche::$modeloCaro;
            }

            public function getPrecioCaro(){
                return Coche::$precioCaro;
            }

            public function setPrecioCaro($precioCaro){
                Coche::$precioCaro = $precioCaro;
                return Coche::$precioCaro;
            }

            //ToString
            public function __toString(){
                return "<td>$this->matricula</td><td>$this->modelo</td><td>$this->precio €</td>";
            }

        }

    ?>

</body>

</html>