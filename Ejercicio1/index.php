<html>
    <head>
        <title>Ejercicio 1</title>
    </head>
    <body>
    <?php
        include("../funciones_matrices.php");
        echo "<h3>Este es el array 20*20</h3>";
        $matriz = generarMatriz(400,20,20);
        echo "<table>";
        for($i = 0; $i < 20; $i++){
            echo "<tr>";
            for($j = 0; $j < 20; $j++){
                echo "<td>" .$matriz[$i][$j] . "</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    ?>
    </body>
</html>