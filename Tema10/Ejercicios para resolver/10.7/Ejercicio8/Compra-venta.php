<!-- Zona Compra-Venta -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Compra-Venta</title>
</head>

<body>

    <?php 

        //Incluimos la clase padre Zona y la extendemos a esta
        include_once "Zona.php";

        class Compra_Venta extends Zona{

            //Constructor
            public function __construct(){
                parent::__construct(200);
            }

        }
    
    ?>

</body>

</html>