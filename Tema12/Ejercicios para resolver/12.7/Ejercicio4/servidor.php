<?php
    require_once "Alumno.php";
    require_once "Asignatura.php";

    //Código de estado y mensaje por defecto
    $codEstado = 400;
    $mensaje = "Solicitud incorrecta";

    //Funcionamiento
    if (isset($_GET["grupoAl"])) { //Alumnos según el grupo introducido
        $grupo = $_GET["grupo"];
        $alumnos = Alumno::getAlumnosGrupos($grupo);
        if (count($alumnos)==0) {
            $codEstado = 0;
            $mensaje = "No existen alumnos en el curso introducido";
        } else if (count($alumnos)>0) {
            $codEstado = 1;
            $mensaje = "Solicitud correcta";
        }
        $devolver['codEstado'] = $codEstado;
        $devolver['mensaje'] = $mensaje;
        foreach ($alumnos as $alum) {
            $devolver['alumnos'][] = ["matricula"=>$alum["matricula"], "nombre"=>$alum["nombre"], "apellidos"=>$alum["apellidos"], "curso"=>$alum["curso"]];
        }
        echo json_encode($devolver);
    } else if (isset($_GET["cadenaAl"])) { //Alumnos según la cadena introducida
        $cadena = $_GET["cadena"];
        $alumnos = Alumno::getAlumnosCadena($cadena);
        if (count($alumnos)==0) {
            $codEstado = 0;
            $mensaje = "No existen alumnos que contengan la cadena introducida";
        } else if (count($alumnos)>0) {
            $codEstado = 1;
            $mensaje = "Solicitud correcta";
        }
        $devolver['codEstado'] = $codEstado;
        $devolver['mensaje'] = $mensaje;
        foreach ($alumnos as $alum) {
            $devolver['alumnos'][] = ["matricula"=>$alum["matricula"], "nombre"=>$alum["nombre"], "apellidos"=>$alum["apellidos"], "curso"=>$alum["curso"]];
        }
        echo json_encode($devolver);
    } else if (isset($_GET["asigAl"])) { //Asignaturas de un alumno introducido mediante la matricula
        $matricula = $_GET["matricula"];
        $asignaturas = Asignatura::getAsignaturas($matricula);
        if (count($asignaturas)==0) {
            $codEstado = 0;
            $mensaje = "El alumno $matricula no está matriculado en ninguna asignatura o no existe";
        } else if (count($asignaturas)>0) {
            $codEstado = 1;
            $mensaje = "Solicitud correcta";
        }
        $devolver['codEstado'] = $codEstado;
        $devolver['mensaje'] = $mensaje;
        $devolver['asignatura'] = $asignaturas;
        echo json_encode($devolver);
    } else if (isset($_GET["matricular"])) { //Matricular a un alumno en una asignatura
        $matricula = $_GET["matri"];
        $codigo = $_GET["codigo"];
        $cod = AlumnoAsignatura::matricular($matricula, $codigo);
        if ($cod==0) {
            $codEstado = 0;
            $mensaje = "No se ha podido realizar la matriculación";
        } else if ($cod==1) {
            $codEstado = 1;
            $mensaje = "Ingresado correctamente el alumno $matricula en la asignatura con código $codigo";
        } else if ($cod==2){
            $codEstado = 2;
            $mensaje = "La asignatura con código $codigo no existe";
        } else if ($cod==3){
            $codEstado = 3;
            $mensaje = "El alumno $matricula ya está matriculado en la asignatura con código $codigo";
        } else if ($cod==4){
            $codEstado = 4;
            $mensaje = "El alumno $matricula no existe";
        }
        $devolver['codEstado'] = $codEstado;
        $devolver['mensaje'] = $mensaje;
        echo json_encode($devolver);
    } else if (isset($_GET["cambiar"])) { //Cambiar el curso de un alumno
        $matricula = $_GET["matri"];
        $curso = $_GET["curso"];
        $cod = Alumno::cambioGrupo($matricula, $curso);
        if ($cod==0) {
            $codEstado = 0;
            $mensaje = "No se ha podido realizar el cambio de curso ya que el alumno $matricula no existe";
        } else if ($cod==1) {
            $codEstado = 1;
            $mensaje = "Realizado correctamente del cambio de curso del alumno $matricula al curso $curso";
        }
        $devolver['codEstado'] = $codEstado;
        $devolver['mensaje'] = $mensaje;
        echo json_encode($devolver);
    } else if (isset($_GET["borrar"])) { //Borrar a un alumno y sus asignaturas matriculadas
        $matricula = $_GET["matri"];
        $cod = Alumno::borrarAlumno($matricula);
        if ($cod==0) {
            $codEstado = 0;
            $mensaje = "No existe el alumno con la matricula $matricula";
        } else if ($cod==1) {
            $codEstado = 1;
            $mensaje = "Borrado correctamente el alumno con matricula $matricula";
        }
        $devolver['codEstado'] = $codEstado;
        $devolver['mensaje'] = $mensaje;
        echo json_encode($devolver);
    }