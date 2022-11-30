<!-- Clase Bicicleta -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bicicleta</title>
</head>

<body>
    
    <?php 
    
        //Incluimos la clase padre
        include_once "Vehiculo.php";

        class Bicicleta extends Vehiculo {

            //Atributos
            private $caballitos;

            //Constructor
            public function __construct(){
                parent::__construct();
                $this->caballitos = 0;
            }

            //Metodos
            public function andaBici(){
                Vehiculo::setKmRecorridos(5);
                Vehiculo::setKmTotales(5);
                echo "Andando 5 km con la bicicleta";
            }

            public function caballitoBici(){
                if ($this->caballitos < 4) {
                    $this->caballitos++;
                    echo "Haciendo caballito";
                } else {
                    $this->caballitos = 0;
                    echo "(Te has caido de la bicicleta)";
                }
            }

            public function verKmBici(){
                echo "Kilometros recorridos en bicicleta -> ",Vehiculo::getKmRecorridos()," km";
            }

        }

    ?>

</body>

</html>