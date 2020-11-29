<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <?php
         
       
            $modulos = ["Educación infantil", "ASIR","DAM","DAW","SMR","Turismo","Hosteleria","Gestion administrativa"];
            include("../funciones_matrices.php");
            array_walk($modulos,'reedireccionar');
            if (isset($_GET['modulo']) || isset($_GET['id'])){
                horarios($_GET['modulo'],$_GET['id']);
            }
        ?>
        
    </body>
</html>