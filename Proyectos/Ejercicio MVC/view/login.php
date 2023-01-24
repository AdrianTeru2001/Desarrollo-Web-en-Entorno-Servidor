<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="css/fondoGradiente.css" type="text/css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <style>
        a {
            text-decoration: none;
            color: black;
        }
    </style>
    <title>Inicio de Sesion</title>
</head>

<body class="gradient-bg-animation">
    
    <?php 

        session_start();

        if (isset($_SESSION["inicioS"])) {
            header("Location: ../index.php");
        }

        if (isset($_GET["fallo"])) {
            echo "<h3 class='text-center'>Error al introducir el usuario o contraseña</h3>";
        } else if (isset($_GET["correcto"])) {
            echo "<h3 class='text-center'>Usuario registrado correctamente</h3>";
        }
    
    ?>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <a href="../index.php"><h1 class="text-center my-3 bg-dark-subtle rounded-3" style="font-family: 'Courier New', Courier, monospace;">BIBLIOTECA DE PELÍCULAS</h1></a>
                <h3 class="text-center mt-5">INICIO DE SESION</h3>
                <!-- Formulario para iniciar sesion -->
                <form action="../controller/comprobarInicioSesion.php" method="post" class="needs-validation" novalidate>
                    <div class="col mb-3 form-floating">
                        <input type="text" class="form-control" id="usuario" name="usuario" placeholder=" " required>
                        <label for="usuario" class="form-label">Usuario</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Introduce un nombre de usuario</div>
                    </div>
                    <div class="col mb-3 form-floating">
                        <input type="password" class="form-control" id="contrasena" name="contrasena" placeholder=" " required>
                        <label for="contrasena" class="form-label">Contraseña</label>
                        <div class="valid-feedback"></div>
                        <div class="invalid-feedback">Introduce una contraseña</div>
                    </div>
                    <button type="submit" class="btn btn-primary">Iniciar Sesion <i class="bi bi-arrow-up-right-square"></i></button>
                </form>
                <form action="registro.php" method="post">
                    <button type="submit" class="btn btn-danger mt-3">Registrarse <i class="bi bi-arrow-return-right"></i></button>
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