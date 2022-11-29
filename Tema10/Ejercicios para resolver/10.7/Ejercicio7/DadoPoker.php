<!-- Clase Dado Poker -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dado Poker</title>
</head>

<body>

    <?php 
    
        class DadoPoker{

            //Atributos
            private static $tiradasTotales = 0;
            private $cara;

            //Constructor
            public function __construct(){

            }

            //Metodos
            public function tira(){
                $numAle = rand(1, 6);
                switch ($numAle) {
                    case "1":
                        $this->cara = "As";
                        break;
                    case "2":
                        $this->cara = "K";
                        break;
                    case "3":
                        $this->cara = "Q";
                        break;
                    case "4":
                        $this->cara = "J";
                        break;
                    case "5":
                        $this->cara = "7";
                        break;
                    case "6":
                        $this->cara = "8";
                        break;
                }
                DadoPoker::$tiradasTotales++;
            }

            public function nombreFigura(){
                echo "Figura -> ",$this->cara;
            }

            //Getters y Setters
            public static function getTiradasTotales(){
                return DadoPoker::$tiradasTotales;
            }

            public static function setTiradasTotales($tiradasTotales){
                DadoPoker::$tiradasTotales = $tiradasTotales;
                return DadoPoker::$tiradasTotales;
            }

            public function getCara(){
                return $this->cara;
            }

            public function setCara($cara){
                $this->cara = $cara;
                return $this;
            }
        }

    ?>

</body>

</html>