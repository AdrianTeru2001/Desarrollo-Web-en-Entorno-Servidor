<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
 <?php
 $directorio="/Mi unidad/xampp/htdocs/Curso 20-21/Ejercicios Adicionales/Tema9/Ficheros de texto";
 $listado=obtenerListadoDeArchivos($directorio);
 echo "<br>Directorio: $directorio /<br><br>";
 echo"<table><tr><td>Fichero</td><td>Tamaño</td><td>Modificado</td></tr>";
 foreach ($listado as $fichero) {
     echo "<tr><td>".$fichero['Nombre']."</td><td>".$fichero['Tamaño']." bytes</td><td>".date("d/m/Y - H:m a",$fichero['Modificado'])."</td></tr>";
 }
function obtenerListadoDeArchivos($directorio){

    // Array en el que obtendremos los resultados
    $res = [];
  
    // Agregamos la barra invertida al final en caso de que no exista
    if(substr($directorio, -1) != "/") $directorio .= "/";
  
    // Creamos un puntero al directorio y obtenemos el listado de archivos
    $dir = @dir($directorio) or die("Error accediendo al directorio $directorio");
    while(($archivo = $dir->read()) !== false) {
        // Obviamos los archivos ocultos y directorios
        if($archivo[0] == "." || is_dir($directorio . $archivo)) continue;
        if (is_readable($directorio . $archivo)) { //si el archivo es legible
            $res[] = [
              "Nombre" => $archivo,
              "Tamaño" => filesize($directorio . $archivo),
              "Modificado" => filemtime($directorio . $archivo)
            ];
        }
    }
    $dir->close();
    return $res;
  }
?>
</table>
</body>
</html>