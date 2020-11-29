<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
            include("../funciones_matrices.php");
            $bolsa = [2,4,5,6,235,352,63,34,43,54];

            if(!isset($_POST['sacarBolas'])){
            pintarDisponibles($bolsa);

            echo "<form action='#' method='POST'>
            <input type='submit' name='sacarBolas' value='Sacar bolas'/>
            </form>";
            }else{
                sacarBolasAleatorio($bolsa);
            }
        ?>
    </body>
</html>