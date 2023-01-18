<!-- Ejercicio 4
Crea un servicio web que proporcione información sobre las matriculaciones de los alumnos en asignaturas del ejercicio 4 de la unidad anterior
y permita realizar algunas operaciones en los datos.
Se podrán realizar peticiones sobre las siguientes consultas:
- Los alumnos de un grupo pasado por parámetro
- Alumnos cuyo nombre contenga la cadena pasada por parámetro
- Asignaturas de un alumno pasado por parámetro.
El servicio también permitirá realizar las siguientes acciones:
- Matriculación de un alumno en una asignatura.
- Cambio de grupo de un alumno
- Borrar un alumno
Devolver el código de estado de la petición y el mensaje asociado a dicho código, junto con los datos. Probar y guardar todas 
las peticiones posibles en la aplicación Postman.
Como segunda parte del ejercicio, realiza una página que actúe como alumnos realizando peticiones al servidor, a través de formularios. -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio 4</title>
</head>

<body>
    
    <h1>Consultas de Alumnos</h1>

    <hr><hr>

    <!-- Formularios donde pedimos que se va a hacer y los propios datos -->

    <!-- Consultas de Alumnos -->
    <h3>Alumnos según el <strong>grupo</strong>:</h3>
    <form action="alumnos.php" method="get">
        Grupo: <input type="text" name="grupo" required>
        <input type="hidden" name="grupoAl" value="0">
        <input type="submit" value="Mostrar Alumnos">
    </form>
    <br>
    <h3>Alumnos según <strong>cadena</strong>:</h3>
    <form action="alumnos.php" method="get">
        Cadena: <input type="text" name="cadena" required>
        <input type="hidden" name="cadenaAl" value="0">
        <input type="submit" value="Mostrar Alumnos">
    </form>
    <br>
    <h3>Asignaturas según <strong>matrícula</strong>:</h3>
    <form action="alumnos.php" method="get">
        Matrícula: <input type="text" name="matricula" required>
        <input type="hidden" name="asigAl" value="0">
        <input type="submit" value="Mostrar Alumnos">
    </form>

    <br><hr>

    <!-- Acciones sobre Alumnos -->
    <h3><strong>Matriculación</strong> de un Alumno en una asignatura:</h3>
    <form action="alumnos.php" method="get">
        Matricula: <input type="text" name="matri" required>
        Código de Asignatura: <input type="number" name="codigo" required>
        <input type="hidden" name="matricular" value="0">
        <input type="submit" value="Matricular Alumno">
    </form>
    <br>
    <h3><strong>Cambio de curso</strong> de un alumno:</h3>
    <form action="alumnos.php" method="get">
        Matricula: <input type="text" name="matri" required>
        Curso: <input type="text" name="curso" required>
        <input type="hidden" name="cambiar" value="0">
        <input type="submit" value="Cambiar curso Alumno">
    </form>
    <br>
    <h3><strong>Borrar</strong> un alumno:</h3>
    <form action="alumnos.php" method="get">
        Matricula: <input type="text" name="matri" required>
        <input type="hidden" name="borrar" value="0">
        <input type="submit" value="Borrar Alumno">
    </form>

</body>

</html>