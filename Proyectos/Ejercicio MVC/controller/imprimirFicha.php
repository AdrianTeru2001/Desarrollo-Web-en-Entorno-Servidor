<?php

    $nombrePelicula = urlencode($_POST["pelicula"]);

    $datos = file_get_contents("https://www.omdbapi.com/?apikey=84abac87&t=$nombrePelicula");
    $pelicula = json_decode($datos);

    $nombrePel = urlencode($pelicula->Title);

    //Creamos un fichero con todos los datos de la película
    $file = "fichas/".$nombrePel.".txt";
    $fp = fopen($file, "w");
    fwrite($fp, "Imagen -> ".$pelicula->Poster.PHP_EOL);
    fwrite($fp, "Titulo -> ".$pelicula->Title.PHP_EOL);
    fwrite($fp, "Fecha -> ".$pelicula->Released.PHP_EOL);
    fwrite($fp, "Duracion -> ".$pelicula->Runtime.PHP_EOL);
    fwrite($fp, "Genero -> ".$pelicula->Genre.PHP_EOL);
    fwrite($fp, "Director -> ".$pelicula->Director.PHP_EOL);
    fwrite($fp, "Actores -> ".$pelicula->Actors.PHP_EOL);
    fwrite($fp, "Lenguaje -> ".$pelicula->Language.PHP_EOL);
    fwrite($fp, "País -> ".$pelicula->Country.PHP_EOL);
    fwrite($fp, "Premios -> ".$pelicula->Awards.PHP_EOL);
    fwrite($fp, "Taquilla -> ".$pelicula->BoxOffice);
    fclose($fp);

    header("Location: index.php?pelicula=$pelicula->Title&ficha=0");