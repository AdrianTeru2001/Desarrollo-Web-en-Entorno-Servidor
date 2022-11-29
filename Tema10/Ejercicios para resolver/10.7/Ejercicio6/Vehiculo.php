<!-- Clase Vehículo -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehículo</title>
</head>

<body>

    <?php 

        abstract class Vehiculo {

            //Atributos
            private static $vehiculosCreados;
            private static $kmTotales;
            private $kmRecorridos;

            //Constructor
            public function __construct(){
                self::$vehiculosCreados += 1;
                self::$kmTotales;
                $this->kmRecorridos = 0;
            }

            //Metodos
            public function verKmTotal(){
                echo "Kilometros recorridos en total en todos los vehiculos -> ",Vehiculo::$kmTotales," km";
            }

            public function verVehiculosCreados(){
                echo "Se han creado un total de ",Vehiculo::$vehiculosCreados," vehiculos";
            }

            //Getters y Setters 
            public static function getVehiculosCreados(){
                return Vehiculo::$vehiculosCreados;
            }

            public static function setVehiculosCreados($vehiculosCreados){
                Vehiculo::$vehiculosCreados = $vehiculosCreados;
                return Vehiculo::$vehiculosCreados;
            }

            public static function getKmTotales(){
                return Vehiculo::$kmTotales;
            }

            public static function setKmTotales($kmTotales){
                Vehiculo::$kmTotales += $kmTotales;
                return Vehiculo::$kmTotales;
            }

            public function getKmRecorridos(){
                return $this->kmRecorridos;
            }

            public function setKmRecorridos($kmRecorridos){
                $this->kmRecorridos += $kmRecorridos;
                return $this;
            }
        }
    
    ?>

</body>

</html>