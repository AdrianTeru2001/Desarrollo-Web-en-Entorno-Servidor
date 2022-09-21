<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Nueva Pagina Editada</title>
</head>

<body>
    <?php 
        $color = $_GET["color"];
        $tipo = $_GET["tipo"];
        $alineado = $_GET["alineado"];
        $imagen = $_GET["imagen"];
        echo "<img src='$imagen' alt='imagen' width='600px' height='400px' >";
        echo "<style> *{ background-color: $color; } p{ font-family: $tipo; text-align: $alineado; }</style>";
    ?>
    <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt autem, suscipit
        eos ratione tempora magni ut tenetur provident voluptatibus quibusdam, a, facilis
        nisi quisquam. Amet adipisci, veritatis similique suscipit pariatur culpa in
        voluptas autem maiores molestias quis, repellendus repudiandae esse quas perspiciatis
        beatae veniam nisi nulla voluptatibus voluptates ex doloribus?
    </p>
    <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt autem, suscipit
        eos ratione tempora magni ut tenetur provident voluptatibus quibusdam, a, facilis
        nisi quisquam. Amet adipisci, veritatis similique suscipit pariatur culpa in
        voluptas autem maiores molestias quis, repellendus repudiandae esse quas perspiciatis
        beatae veniam nisi nulla voluptatibus voluptates ex doloribus?
    </p>
    <p>
        Lorem ipsum dolor sit amet consectetur adipisicing elit. Sunt autem, suscipit
        eos ratione tempora magni ut tenetur provident voluptatibus quibusdam, a, facilis
        nisi quisquam. Amet adipisci, veritatis similique suscipit pariatur culpa in
        voluptas autem maiores molestias quis, repellendus repudiandae esse quas perspiciatis
        beatae veniam nisi nulla voluptatibus voluptates ex doloribus?
    </p>
</body>

</html>