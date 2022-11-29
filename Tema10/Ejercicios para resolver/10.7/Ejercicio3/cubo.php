<!-- Clase Cubo -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cubo</title>
</head>

<body>

    <?php

        class cubo{

            //Atributos
            private $capacidad;
            private $contenido;

            //Constructores
            public function __construct($capacidad, $contenido){
                if ($contenido>$capacidad) {
                    $this->capacidad = $capacidad;
                    $this->contenido = $capacidad;
                } else {
                    $this->capacidad = $capacidad;
                    $this->contenido = $contenido;
                }
                
            }

            //Metodos
            public function mostrar(){
                echo "Capacidad -> ",$this->capacidad," litros y contenido -> ",$this->contenido," litros<br>";
            }

            public function verter($cubo2){
                if ($this->contenido+$cubo2->contenido <= $cubo2->capacidad) {
                    $cubo2->contenido += $this->contenido;
                    $this->contenido = 0;
                } else {
                    $this->contenido = ($cubo2->contenido+$this->contenido)-($cubo2->capacidad);
                    $cubo2->contenido = $cubo2->capacidad;
                    if ($this->contenido<0) {
                        $this->contenido = 0;
                    }
                }
            }

            //Setter y Getters
            public function getCapacidad(){
                return $this->capacidad;
            }

            public function setCapacidad($capacidad){
                $this->capacidad = $capacidad;
                return $this;
            }

            public function getContenido(){
                return $this->contenido;
            }

            public function setContenido($contenido){
                $this->contenido = $contenido;
                return $this;
            }
        }

    ?>

</body>

</html>