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
        
        //Incluimos la clase padre
        include_once "Vehiculo.php";

        class Coche extends Vehiculo {

            //Atributos
            private $quemarRueda;

            //Constructor
            public function __construct(){
                parent::__construct();
                $this->quemarRueda = 0;
            }

            //Metodos
            public function andaCoche(){
                Vehiculo::setKmRecorridos(20);
                Vehiculo::setKmTotales(20);
                echo "Andando 20 km con el coche";
            }

            public function quemarRuedaCoche(){
                if ($this->quemarRueda < 5) {
                    $this->quemarRueda++;
                    echo "Quemando rueda";
                } else {
                    $this->quemarRueda = 0;
                    echo "(La rueda ha reventado)";
                }
            }

            public function verKmCoche(){
                echo "Kilometros recorridos en coche -> ",Vehiculo::getKmRecorridos()," km";
            }

        }

    ?>

</body>

</html>