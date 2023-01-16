<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
</head>
<style>
    div {
        text-align: center;
        padding: 20px;
        font-size: 1.3rem;
    }

    a {
        font-size: 2rem;
    }
</style>

<body>
    <?php

    if (isset($_POST["numero"])) {
        for ($i = $_POST["numero"]; $i <= $_POST["numero2"]; $i++) {
            echo "<div>";
            $peticion = file_get_contents("https://pokeapi.co/api/v2/pokemon/$i/");
            $decode = json_decode($peticion);
            $nombre = $decode->forms[0]->name;
            echo "Pokedex Nº --> " . ($i) . " | Pokemon --> " . strtoupper($nombre) . "<br>";
            echo "Tipos --> ";
            $tipos = "";
            $count = count($decode->types) - 1;
            $cont = 0;
            foreach ($decode->types as $item) {
                if ($cont == $count) {
                    $tipos .= (string)$item->type->name;
                } else {
                    $tipos .= (string)$item->type->name . " | ";
                }

                $cont++;
            }
            echo $tipos . "<br>";
            $img = $decode->sprites->front_default;
            echo "<img src='$img'><br>";
            echo "</div>";
            echo "<hr>";
        }
        echo "<a href=''>Volver</a>";
    } else if (isset($_POST["nombre"])) {
        $nom = strtolower($_POST["nombre"]);
        error_reporting(E_ALL ^ E_WARNING);
        $data = file_get_contents("https://pokeapi.co/api/v2/pokemon/$nom");
        $decode = json_decode($data);
        $nombre = $decode->forms[0]->name;
        $id = $decode->game_indices[3]->game_index;
        echo "Pokedex Nº --> " . ($id) . " | Pokemon --> " . strtoupper($nombre) . "<br>";
        echo "Tipos --> ";
        $tipos = "";
        $count = count($decode->types) - 1;
        $cont = 0;
        foreach ($decode->types as $item) {
            if ($cont == $count) {
                $tipos .= (string)$item->type->name;
            } else {
                $tipos .= (string)$item->type->name . " | ";
            }

            $cont++;
        }
        echo $tipos . "<br>";
        $img = $decode->sprites->front_default;
        echo "<img src='$img'><br>";
        echo "</div>";
    } else {

    ?>
        <h1>¿Introduce hasta que número de la pokedex quieres llegar?</h1>
        <form action="" method="POST">
            <input type="number" name="numero" placeholder="Desde" min='1' max='905'>
            <input type="number" name="numero2" placeholder="Hasta" min='2' max='905'>
            <input type="submit" name="Enviar">
        </form>
        <h1>Busqueda por nombre</h1>
        <form action="" method="POST">
            <input type="text" name="nombre">
            <input type="submit" value="Buscar">
        </form>
    <?php
    }
    ?>
</body>

</html>