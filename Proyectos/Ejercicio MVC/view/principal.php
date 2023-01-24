<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../view/css/bootstrap.css" type="text/css">
    <link rel="stylesheet" href="../view/css/fondoGradiente.css" type="text/css">
    <style>
        a {
            text-decoration: none;
            color: black;
        }
    </style>
    <title>Pagina Principal</title>
</head>

<body class="gradient-bg-animation">
    
    <?php

        if (!isset($inicio)) {
            session_start();
            if (!isset($_SESSION["inicioS"]) || $_SESSION["inicioS"]=="") {
                header("Location: ../view/login.php");
            }
        }

    ?>

    <div class="container text-center">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <!-- Titulo y bienvenida -->
                <a href="../controller/index.php"><h1 class='text-center my-3 bg-dark-subtle rounded-3' style='font-family: Courier New, Courier, monospace;'>BIBLIOTECA DE PELÍCULAS</h1></a>
                <h2 class='text-center'>Bienvenid@ <?php echo $_SESSION['inicioS']['usuario'] ?></h2>

                <!-- Botón para cerrar sesion -->
                <form action="../controller/cerrarSesion.php" method="post">
                    <button type="submit" class="btn btn-danger mt-1">Cerrar Sesion</button>
                </form>

                <br>

                <!-- Formulario para buscar una película -->
                <form action="../controller/index.php" method="get">
                    <div>
                        <div class="col my-3">
                            <label for="pelicula" class="form-label"><h3>Busca una película</h3></label>
                            <input type="text" class="form-control" id="pelicula" name="pelicula" required>
                        </div>
                        <button type="submit" class="btn btn-secondary">Buscar Película</button>
                    </div>
                </form>
                <?php 
                    if (isset($_GET["ficha"])) {
                        echo "<h3 class='text-center mt-3'>Ficha técnica guardada correctamente</h3>";
                    }
                ?>
            </div>
        </div>

        <div class="row justify-content-center">
            <?php
                if (isset($_GET["pelicula"])) {
                    /* Mostrar datos de la película */
                    echo "<div class='col-md-6'>";
                        $nombrePelicula = urlencode($_GET["pelicula"]);
                        $datos = file_get_contents("https://www.omdbapi.com/?apikey=84abac87&t=$nombrePelicula");
                        $pelicula = json_decode($datos);
                        echo "<br>";
                        if ($pelicula->Response == "False") {
                            $tituloPelicula = "";
                        } else {
                            if ($pelicula->Poster!="N/A") {
                                echo "<img class='rounded' src='".$pelicula->Poster."' alt='".$pelicula->Title."'><br>";
                            }
                            echo "<h3 class='mt-1'>".$pelicula->Title."</h3>";
                            echo "<h6>Fecha: ".$pelicula->Released."</h6>";
                            echo "<h6>Duración: ".$pelicula->Runtime."</h6>";
                            echo "<h6>Genero: ".$pelicula->Genre."</h6>";
                            echo "<h6>Director: ".$pelicula->Director."</h6>";
                            echo "<h6>Actores: ".$pelicula->Actors."</h6>"; ?>
                            <form action="../controller/imprimirFicha.php" method="post">
                                <div>
                                    <input type="hidden" name="pelicula" value="<?php echo $_GET["pelicula"] ?>">
                                    <button type="submit" class="btn btn-outline-dark my-3">Guardar ficha técnica</button>
                                </div>
                            </form>
                            <?php $tituloPelicula = urlencode($pelicula->Title);
                        }
                    echo "</div>";

                    echo "<br><br>";

                    /* Mostrar comentarios sobre la película */
                    echo "<div class='col-md-6 mt-3'>";
                        if ($pelicula->Response != "False") {
                            $datosCom = file_get_contents("http://localhost/PHP/Desarrollo-Web-en-Entorno-Servidor/Proyectos/Ejercicio%20MVC/controller/comentarios.php?titulo=$tituloPelicula&mostrarCom=0");
                            $comentarios = json_decode($datosCom);
                            echo "<h2>Comentarios</h2>";
                            if ($comentarios->codEstado == 1) {
                                $contComentarios = 0;
                                foreach ($comentarios->comentarios as $com) {
                                    if ($com->usuario == $_SESSION['inicioS']['usuario']) {
                                        $contComentarios++;
                                    }
                                }
                                if ($contComentarios==0) { ?>
                                    <form action="../view/escribirComentario.php" method="get">
                                        <div>
                                            <input type="hidden" name="titulo" value="<?php echo $pelicula->Title ?>">
                                            <button type="submit" class="btn btn-outline-dark my-3">Añadir Comentario</button>
                                        </div>
                                    </form>
                                <?php }
                                echo "<hr>";
                                foreach ($comentarios->comentarios as $com) {
                                    echo "<h4>".$com->usuario."</h4>";
                                    echo "<h5>Nota: ".$com->puntuacion."</h5>";
                                    echo "<h5>".$com->comentario."</h5>";
                                    if ($com->usuario == $_SESSION['inicioS']['usuario']) { ?>
                                        <form action="../view/editarComentario.php" method="get">
                                            <div>
                                                <input type="hidden" name="titulo" value="<?php echo $pelicula->Title ?>">
                                                <input type="hidden" name="puntuacion" value="<?php echo $com->puntuacion ?>">
                                                <input type="hidden" name="comentario" value="<?php echo $com->comentario ?>">
                                                <button type="submit" class="btn btn-outline-secondary mt-3">Editar Comentario</button>
                                            </div>
                                        </form>
                                        <form action="../controller/comentarios.php" method="get">
                                            <div>
                                                <input type="hidden" name="borrarCom" value=0>
                                                <input type="hidden" name="usuario" value="<?php echo $_SESSION['inicioS']['usuario'] ?>">
                                                <input type="hidden" name="titulo" value="<?php echo $pelicula->Title ?>">
                                                <button type="submit" class="btn btn-outline-danger mt-3">Borrar Comentario</button>
                                            </div>
                                        </form>
                                    <?php }
                                    echo "<hr>";
                                } 
                            } else if ($comentarios->codEstado == 0) { ?>
                                <form action="../view/escribirComentario.php" method="get">
                                    <div>
                                        <input type="hidden" name="anadirCom" value=0>
                                        <input type="hidden" name="titulo" value="<?php echo $pelicula->Title ?>">
                                        <button type="submit" class="btn btn-outline-dark my-3">Añadir Comentario</button>
                                    </div>
                                </form>
                            <?php }
                        }
                    echo "</div>";
                } 
            ?>
                
        </div>  
        
        <!-- Si no se encuentran películas, se muestre este comentario -->
        <?php if (isset($_GET["pelicula"])) {
                if ($pelicula->Response == "False"){ ?>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <h2>No se ha encontrado la película introducida</h2>
                        </div>
                    </div>
        <?php   }
            } ?>
        
    </div>

    <script src="../view/js/bootstrap.bundle.js"></script>
</body>

</html>