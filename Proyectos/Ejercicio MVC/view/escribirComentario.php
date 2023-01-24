<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="css/fondoGradiente.css" type="text/css">
    <style>
        a {
            text-decoration: none;
            color: black;
        }
    </style>
    <title>Escribir Comentario</title>
</head>

<body class="gradient-bg-animation">
    
    <?php 

        session_start();

        if (!isset($_SESSION["inicioS"])) {
            header("Location: ../index.php");
        }
    
    ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <a href="../controller/index.php"><h1 class='text-center my-3 bg-dark-subtle rounded-3' style='font-family: Courier New, Courier, monospace;'>BIBLIOTECA DE PELÍCULAS</h1></a>
                <h3 class="text-center mt-5">Escribir Comentario</h3>
                <!-- Formulario para escribir un comentario -->
                <form action="../controller/comentarios.php" method="get" class="needs-validation" novalidate>
                    <div class="col mb-3 form-floating">
                        <input type="text" class="form-control" id="usuario" name="usuario" value="<?php echo $_SESSION['inicioS']['usuario'] ?>" placeholder=" " readonly>
                        <label for="usuario" class="form-label">Nombre de Usuario: </label>
                    </div>
                    <div class="col mb-3 form-floating">
                        <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $_GET["titulo"] ?>" placeholder=" " readonly>
                        <label for="titulo" class="form-label">Titulo de la Pelicula: </label>
                    </div>
                    <div class="col-6 mb-3 form-floating">
                        <input type="number" class="form-control" id="puntos" name="puntuacion" min=0 max=10 placeholder=" " required>
                        <label for="puntos" class="form-label">Puntuacion (1/10): </label>
                    </div>
                    <div class="col mb-3 form-floating">
                        <textarea class="form-control" id="comentario" name="comentario" rows="10" cols="50" placeholder=" "></textarea>
                        <label for="comentario" class="form-label">Comentario: </label>
                    </div>
                    <input type="hidden" name="anadirCom" value=0>
                    <button type="submit" class="btn btn-primary">Añadir Comentario</button>
                </form>
                <form action="../controller/index.php" method="get">
                    <input type="hidden" name="pelicula" value="<?php echo $_GET["titulo"] ?>">
                    <button type="submit" class="btn btn-danger mt-3">Volver a la página principal</button>
                </form>  
            </div>
        </div>
    </div>
    
    <script>
        // Example starter JavaScript for disabling form submissions if there are invalid fields
        (() => {
        'use strict'

        // Fetch all the forms we want to apply custom Bootstrap validation styles to
        const forms = document.querySelectorAll('.needs-validation')

        // Loop over them and prevent submission
        Array.from(forms).forEach(form => {
            form.addEventListener('submit', event => {
            if (!form.checkValidity()) {
                event.preventDefault()
                event.stopPropagation()
            }

            form.classList.add('was-validated')
            }, false)
        })
        })()
    </script>
    <script src="js/bootstrap.bundle.js"></script>
</body>

</html>