<?php 
    //! Prueba de fechas
    $fecha = date("d/m/Y", strtotime("01/15/2010"));
    $fecha2 = date("d-m-Y", strtotime(date("01/15/2010")."+ 1 days")); //! se usa tambien el sumar una cantidad a los dias sepuede hacer con los meses y con los años tambien
    $fecha3 = date("H:i:s A", strtotime("15:30:15"));
    $fecha4 = date("w", strtotime("01/15/2010")); //! te indica el dia de la semana del 0 al 6 siendo el 0 el domingo
    $fecha5 = date("z", strtotime("01/15/2010")); //! te indica el dia del año del 0 al 365
    $fecha6 = date("t", strtotime("01/15/2010")); //! te indica cuantos diaas tiene el mes de la fecha
    $fecha7 = date("L", strtotime("01/15/2010")); //! te indica 1 si el año es bisiesto o 0 si no lo es
    echo "<h1>Formas de representar fechas y horas</h1><br>";
    echo "<h2>Formato fecha con guiones - ------> ".$fecha."</h2><br>";
    echo "<h2>Formato fecha con barras / -------> ".$fecha2."</h2><br>";
    echo "<h2>Formato hora -------> ".$fecha3."</h2><br>";
    echo "<h2>Dia de la semana de la fecha 15/01/2010 -------> ".$fecha4."</h2><br>";
    echo "<h2>Dia del año de la fecha 15/01/2010 -------> ".$fecha5."</h2><br>";
    echo "<h2>Dias que tiene el mes actual de la fecha 15/01/2010 -------> ".$fecha6."</h2><br>";
    echo "<h2>Indica si el año es bisiesto 15/01/2010 -------> ".$fecha7."</h2><br>";
?>