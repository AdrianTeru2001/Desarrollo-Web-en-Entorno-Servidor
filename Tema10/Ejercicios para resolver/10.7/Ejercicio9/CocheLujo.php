<!-- Clase CocheLujo -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coche Lujo</title>
</head>

<body>
    
    <?php 
    
        include_once "Coche.php";

        class CocheLujo extends Coche{

            //Atributos
            private $suplemento;

            //Constructor
            public function __construct($matricula, $modelo, $precio, $suplemento){
                parent::__construct($matricula, $modelo, $precio);
                $this->suplemento = $suplemento;
            }

            //Getters y Setters
            public function getSuplemento(){
                return $this->suplemento;
            }

            public function setSuplemento($suplemento){
                $this->suplemento = $suplemento;
                return $this;
            }

            //getPrecio para devolver el precio del coche sumandole el suplemento
            public function getPrecio(){
                $precioTotal = parent::getPrecio()+$this->suplemento;
                return "Precio del coche de lujo -> ".$precioTotal." €";
            }

            //ToString
            public function __toString(){
                return parent::__toString()."</td><td>$this->suplemento €</td>";
            }

        }

    ?>

</body>

</html>