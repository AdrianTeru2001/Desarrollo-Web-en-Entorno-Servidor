<!-- Clase Menu -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menu</title>
</head>

<body>
    
    <?php 
    
        class menu{

            //Atributos
            private $titulo;
            private $enlace;

            //Constructores
            public function __construct(){
                $this->titulo = [];
                $this->enlace = [];
            }

            //Metodos
            public function anadir($titulo, $enlace){
                $this->titulo[]=$titulo;
                $this->enlace[]=$enlace;
            }

            public function mostrarHor(){
                echo "<h1>Menú Horizontal</h1>";
                for ($i=0; $i < count($this->titulo); $i++) { 
                    if ($i<count($this->titulo)-1) {
                        echo $this->titulo[$i]," -> ",$this->enlace[$i]," | ";
                    } else if ($i==count($this->titulo)-1) {
                        echo $this->titulo[$i]," -> ",$this->enlace[$i];
                    }
                    
                }
            }

            public function mostrarVer(){
                echo "<h1>Menú Vertical</h1>";
                for ($i=0; $i < count($this->titulo); $i++) { 
                    echo $this->titulo[$i]," -> ",$this->enlace[$i],"<br>";
                }
            }

        }

    ?>

</body>

</html>