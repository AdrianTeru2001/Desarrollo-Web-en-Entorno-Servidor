<?php
    function dameTarjeta($perfil){ //Función para obtener la matriz
        $matriz = []; //Declaramos la matriz
        if ($perfil=="admin") { //Si es perfil de administrador hacemos la matriz del administrador
            for ($i=1; $i <= 5; $i++) { //Con un bucle anidado vamos introduciendo en la matriz los valores correspondientes
                for ($j=1; $j <= 5; $j++) { 
                    switch ($j) {
                        case 1:
                            $matriz[$i-1][$j-1]="A$i";
                            break;
                        case 2:
                            $matriz[$i-1][$j-1]="B$i";
                            break;
                        case 3:
                            $matriz[$i-1][$j-1]="C$i";
                            break;
                        case 4:
                            $matriz[$i-1][$j-1]="D$i";
                            break;
                        case 5:
                            $matriz[$i-1][$j-1]="E$i";
                            break;
                        
                        default:
                            break;
                    }
                }
            }
        } else if ($perfil=="usuario") { //Si es perfil de usuario hacemos la matriz del usuario
            for ($i=1; $i <= 5; $i++) { //Con un bucle anidado vamos introduciendo en la matriz los valores correspondientes
                for ($j=1; $j <= 5; $j++) { 
                    switch ($i) {
                        case 1:
                            $matriz[$i-1][$j-1]="$j/A";
                            break;
                        case 2:
                            $matriz[$i-1][$j-1]="$j/B";
                            break;
                        case 3:
                            $matriz[$i-1][$j-1]="$j/C";
                            break;
                        case 4:
                            $matriz[$i-1][$j-1]="$j/D";
                            break;
                        case 5:
                            $matriz[$i-1][$j-1]="$j/E";
                            break;
                        
                        default:
                            break;
                    }
                    $matriz[$i-1][$j-1] = str_replace("/", "",$matriz[$i-1][$j-1]); //Le hacemos un str_replace() para poder obtener los valores de la matriz correctos
                }
            }
        }
        return $matriz; //Retornamos la matriz
    }
    function compruebaClave($matriz, $fila, $numColumna, $valor){ //Función para comprobar la clave
        $bandera = false; //Inicializamos la bandera a falso
        if (strtoupper($matriz[$fila-1][$numColumna-1])==strtoupper($valor)) { //Si el valor aleatorio de la matriz y el introducido son iguales
            $bandera = true; //La bandera se pasa a verdadero
        }
        return $bandera; //Retornamos la bandera
    }
    function imprimeTarjeta(){ //Función para crear las tablas de las coordenadasº
        ?>
        <table> <!-- Tabla donde metemos las dos tablas  -->
            <tr>
                <td>
                    <table> <!-- Tabla Administrador  -->
                        <tr>
                            <td colspan="6">Administrador</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><strong>A</strong></td>
                            <td><strong>B</strong></td>
                            <td><strong>C</strong></td>
                            <td><strong>D</strong></td>
                            <td><strong>E</strong></td>
                        </tr>
        <?php
        $matriz = dameTarjeta("admin");
        for ($i=0; $i < 5; $i++) { 
            echo "<tr>";
            for ($j=0; $j < 5; $j++) { 
                if ($j==0) {
                    echo "<td><strong>",($i+1),"</strong></td>";
                }
                echo "<td>",$matriz[$i][$j],"</td>";
            }
            echo "</tr>";
        }?>
                    </table>
                </td>
                <td> 
                    <table> <!-- Tabla Usuario Estándar -->
                        <tr>
                            <td colspan="6">Usuario estándar</td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><strong>A</strong></td>
                            <td><strong>B</strong></td>
                            <td><strong>C</strong></td>
                            <td><strong>D</strong></td>
                            <td><strong>E</strong></td>
                        </tr>
        <?php
        $matriz = dameTarjeta("usuario");
        for ($i=0; $i < 5; $i++) { 
            echo "<tr>";
            for ($j=0; $j < 5; $j++) { 
                if ($j==0) {
                    echo "<td><strong>",($i+1),"</strong></td>";
                }
                echo "<td>",$matriz[$i][$j],"</td>";
            }
            echo "</tr>";
        }?>
                    </table>
                </td>
            </tr>
        </table>
        <?php
    }
?>