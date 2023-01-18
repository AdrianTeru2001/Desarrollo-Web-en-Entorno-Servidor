<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Alumnos</title>
</head>

<body>
    
    <?php

        //Funciones
        function mostrarAlumnos($resultado){ //Función para mostrar los datos de los alumnos
            echo "<h2>Alumnos:</h2>";
            foreach ($resultado->alumnos as $alum) {
                echo "Matricula -> ".$alum->matricula."<br>";
                echo "Nombre -> ".$alum->nombre."<br>";
                echo "Apellidos -> ".$alum->apellidos."<br>";
                echo "Curso -> ".$alum->curso."<br><hr>";
            }
        }

        function mostrarAsignaturas($asignaturas, $matricula){ //Función para mostrar las asignaturas de un alumno
            echo "<h2>Asignaturas de $matricula :</h2>";
            foreach ($asignaturas->asignatura as $asig) {
                echo $asig."<br>";
            }
            echo "<br>";
        }

        //Funcionamiento
        if (isset($_GET["grupoAl"])) { //Alumnos según el grupo introducido
            $grupo = $_GET["grupo"];
            $grupoCorrecto = urlencode($grupo);
            $data = file_get_contents("http://localhost/PHP/Desarrollo-Web-en-Entorno-Servidor/Tema12/Ejercicios%20para%20resolver/12.7/Ejercicio4/servidor.php?grupo=".$grupoCorrecto."&grupoAl=0");
            $resultado = json_decode($data);
            if ($resultado->codEstado==1) {
                mostrarAlumnos($resultado);
            } else {
                echo "<h4>Codigo de Estado -> ".$resultado->codEstado."</h4>";
                echo "<h4>Mensaje -> ".$resultado->mensaje."</h4>";
            }
        } else if (isset($_GET["cadenaAl"])) { //Alumnos según la cadena introducida
            $cadena = $_GET["cadena"];
            $cadenaCorrecta = urlencode($cadena);
            $data = file_get_contents("http://localhost/PHP/Desarrollo-Web-en-Entorno-Servidor/Tema12/Ejercicios%20para%20resolver/12.7/Ejercicio4/servidor.php?cadena=".$cadenaCorrecta."&cadenaAl=0");
            $resultado = json_decode($data);
            if ($resultado->codEstado==1) {
                mostrarAlumnos($resultado);
            } else {
                echo "<h4>Codigo de Estado -> ".$resultado->codEstado."</h4>";
                echo "<h4>Mensaje -> ".$resultado->mensaje."</h4>";
            }
        } else if (isset($_GET["asigAl"])) { //Asignaturas de un alumno introducido mediante la matricula
            $matricula = $_GET["matricula"];
            $matriculaCorrecta = urlencode($matricula);
            $data = file_get_contents("http://localhost/PHP/Desarrollo-Web-en-Entorno-Servidor/Tema12/Ejercicios%20para%20resolver/12.7/Ejercicio4/servidor.php?matricula=".$matriculaCorrecta."&asigAl=0");
            $resultado = json_decode($data);
            if ($resultado->codEstado==1) {
                mostrarAsignaturas($resultado, $matricula);
            } else {
                echo "<h4>Codigo de Estado -> ".$resultado->codEstado."</h4>";
                echo "<h4>Mensaje -> ".$resultado->mensaje."</h4>";
            }
        } else if (isset($_GET["matricular"])) { //Matricular a un alumno en una asignatura
            $matricula = $_GET["matri"];
            $codigo = $_GET["codigo"];
            $matriculaCorrecta = urlencode($matricula);
            $codigoCorrecto = urlencode($codigo);
            $data = file_get_contents("http://localhost/PHP/Desarrollo-Web-en-Entorno-Servidor/Tema12/Ejercicios%20para%20resolver/12.7/Ejercicio4/servidor.php?matri=".$matriculaCorrecta."&codigo=".$codigoCorrecto."&matricular=0");
            $resultado = json_decode($data);
            if ($resultado->codEstado==1) {
                echo "<h2>".$resultado->mensaje."</h2>";
            } else {
                echo "<h4>Codigo de Estado -> ".$resultado->codEstado."</h4>";
                echo "<h4>Mensaje -> ".$resultado->mensaje."</h4>";
            }
        } else if (isset($_GET["cambiar"])) { //Cambiar el curso de un alumno
            $matricula = $_GET["matri"];
            $curso = $_GET["curso"];
            $matriculaCorrecta = urlencode($matricula);
            $cursoCorrecto = urlencode($curso);
            $data = file_get_contents("http://localhost/PHP/Desarrollo-Web-en-Entorno-Servidor/Tema12/Ejercicios%20para%20resolver/12.7/Ejercicio4/servidor.php?matri=".$matriculaCorrecta."&curso=".$cursoCorrecto."&cambiar=0");
            $resultado = json_decode($data);
            if ($resultado->codEstado==1) {
                echo "<h2>".$resultado->mensaje."</h2>";
            } else {
                echo "<h4>Codigo de Estado -> ".$resultado->codEstado."</h4>";
                echo "<h4>Mensaje -> ".$resultado->mensaje."</h4>";
            }
        } else if (isset($_GET["borrar"])) { //Borrar a un alumno y sus asignaturas matriculadas
            $matricula = $_GET["matri"];
            $matriculaCorrecta = urlencode($matricula);
            $data = file_get_contents("http://localhost/PHP/Desarrollo-Web-en-Entorno-Servidor/Tema12/Ejercicios%20para%20resolver/12.7/Ejercicio4/servidor.php?matri=".$matriculaCorrecta."&borrar=0");
            $resultado = json_decode($data);
            if ($resultado->codEstado==1) {
                echo "<h2>".$resultado->mensaje."</h2>";
            } else {
                echo "<h4>Codigo de Estado -> ".$resultado->codEstado."</h4>";
                echo "<h4>Mensaje -> ".$resultado->mensaje."</h4>";
            }
        }

    ?>

    <!-- Botón para volver a la pagina principal -->
    <form action="cliente.php" method="get">
        <input type="submit" value="Volver a la Pagina Principal">
    </form>

</body>

</html>