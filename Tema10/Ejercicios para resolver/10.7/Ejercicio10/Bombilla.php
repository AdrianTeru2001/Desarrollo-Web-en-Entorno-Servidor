<!-- Clase Bombilla -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bombilla</title>
</head>

<body>

    <?php 
    
        class Bombilla{

            //Atributos
            private $estado;
            private $potenciaC;
            private $ubicacion;
            private static $general = true;

            //Constructor
            public function __construct($potenciaC, $ubicacion){
                $this->estado = "apagada";
                $this->potenciaC = $potenciaC;
                $this->ubicacion = $ubicacion;
            }
 
            //Métodos
            public function estadoBombilla(){
                return $this->estado;
            }

            public static function activarGeneral(){
                if (self::$general) {
                    self::$general = false;
                } else {
                    self::$general = true;
                }
            }
            
            //Getters y Setters
            public function getEstado(){
                return $this->estado;
            }
 
            public function setEstado($estado){
                $this->estado = $estado;
                return $this;
            }

            public function getPotenciaC(){
                return $this->potenciaC;
            }

            public function setPotenciaC($potenciaC){
                $this->potenciaC = $potenciaC;
                return $this;
            }

            public function getUbicacion(){
                return $this->ubicacion;
            }
 
            public function setUbicacion($ubicacion){
                $this->ubicacion = $ubicacion;
                return $this;
            }

            public static function getGeneral(){
                return self::$general;
            }

            public static function setGeneral($general){
                self::$general = $general;
                return self::$general;
            }
        }

    ?>

</body>

</html>