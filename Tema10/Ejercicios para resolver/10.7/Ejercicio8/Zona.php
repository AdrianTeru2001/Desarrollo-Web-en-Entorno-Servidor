<!-- Clase Zona -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Zona</title>
</head>

<body>

    <?php 

        abstract class Zona {

            //Atributos
            private $entradas;

            //Constructor
            public function __construct($entradas){
                $this->entradas = $entradas;
            }

            //Metodos
            public function vender($entradas){
                if ($entradas>$this->entradas) {
                    return false;
                } else {
                    $this->entradas -= $entradas;
                    return true;
                }
            }

            //ToString
            public function __toString(){
                return $this->entradas;
            }

        }
    
    ?>

</body>

</html>