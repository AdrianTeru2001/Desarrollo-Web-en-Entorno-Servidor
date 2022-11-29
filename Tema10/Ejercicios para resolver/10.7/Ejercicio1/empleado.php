<!-- Clase Empleado -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Empleado</title>
</head>

<body>
    
    <?php 
    
        class empleado{
            
            //Atributos
            private $nombre;
            private $sueldo;
 
            //Constructores
            public function __construct($nombre, $sueldo){
                $this->nombre = $nombre;
                $this->sueldo = $sueldo;
            }

            //Getters y Setters
            public function getNombre(){
                return $this->nombre;
            }

            public function setNombre($nombre){
                $this->nombre = $nombre;
                return $this;
            }

            public function getSueldo(){
                return $this->sueldo;
            }

            public function setSueldo($sueldo){
                $this->sueldo = $sueldo;
                return $this;
            }

            //Metodos
            public function asigna($nombre, $sueldo){
                if ($this->nombre==$nombre) {
                    $this->sueldo = $sueldo;
                } else {
                    $this->nombre = $nombre;
                    $this->sueldo = $sueldo;
                }
            }

            public function muestra(){
                echo $this->nombre;
                if ($this->sueldo>3000) {
                    echo " Debes pagar impuestos<br>";
                } else {
                    echo " No debes pagar impuestos<br>";
                }
            }

            //ToString
            public function __toString(){
                return "Nombre -> ".$this->nombre." y sueldo ".$this->sueldo."€";
            }

        }
    
    ?>

</body>

</html>