<?php
//Ejercicio 1
function generarMatriz($numeroVal,$dimensionH,$dimensionV){
    $rango = range(1,$numeroVal);
    $matriz = [];
    $aux = 0;
    for($i = 1; $i <= $dimensionH; $i++){
        array_push($matriz,array_slice($rango,$aux,$dimensionV*$i));
        $aux = $dimensionV*$i;
    }
    return $matriz;
}
//Ejercicio 2
function generarBarajaEspañola(){
    $matriz = [];
    $palos = ["Bastos","Espadas","Copas","Oros"];
    for($i = 0; $i < 4; $i++){
        $matriz[$palos[$i]] = range(1,12);
    }
    return $matriz;
}
function barajarBarajaEspañola($matriz){
    $barajar = [];
    $palos = ["Bastos","Espadas","Copas","Oros"];
    for($j = 0; $j < 4; $j++){
        $xs = [0 => rand(1,12)];
        while(count($xs) < 12){
            $x = rand(1,12);
            if(!in_array($x,$xs)){
                array_push($xs,$x);
            }
        }
        $barajar [$palos[$j]] = $xs;
    }
    return $barajar;
}

function seleccionaCartas($numeroCartas){
    global $barajaEspañola;
    $salida = [];
    for($i = 0; $i < $numeroCartas; $i++){
        array_push($salida,$barajaEspañola[$i]);
    }
}

//Ejercicio 3
function barajar_array($matriz){
    $remover = [];
    $cont = count($matriz);
    for($i = 0; $i < $cont; $i++){
        $key = array_rand($matriz);
        array_push($remover,$matriz[$key]);
        array_splice($matriz,$key,1);        
    }
    $matriz = $remover;
    return $matriz;
}

function pintarDisponibles($matriz){
    echo "<p class = titulo>Estas son las bolas disponibles</p>";
    echo "<table><tr>";
        for ($i=0; $i < count($matriz); $i++) { 
            echo "<td class='disponibles'>$matriz[$i]</td>";
        }
    echo "</tr></table>";
}

function pintarSacadas($matriz){
    echo "<p class = titulo>Bolas sacadas</p>";
    echo "<table><tr>";
        for ($i=0; $i < count($matriz); $i++) { 
            echo "<td class='sacadas'>$matriz[$i]</td>";
        }
    echo "</tr></table>";
}

function sacarBolasAleatorio($bolsa){
    $bolasSacadas = [];
    $cont = count($bolsa);
    echo "<div class='contain'>";
    for ($i=0; $i < $cont; $i++) { 

        pintarDisponibles($bolsa);

        $key = array_rand($bolsa);
        array_push($bolasSacadas,$bolsa[$key]);
        array_splice($bolsa,$key,1);

        pintarSacadas($bolasSacadas);
        
        $bolsa = barajar_array($bolsa);
    }
    echo "</div>";
}

//Ejercicio 4
function tableroAjedrez(){
    //$figuras = ["peon","torre","caballo","alfil","rey","reina"];
    echo "<table>";
    for ($i=0; $i < 8; $i++) { 
        echo "<tr>";
        for ($j=0; $j < 8; $j++) {
            if(($j+$i)%2 !== 0){
                echo "<td class='black'></td>";
            }else{
                echo "<td class='white'></td>";
            }
        }
        echo "</tr>";
    }
    echo "</table>";
}

//Ejercicio 5
setlocale(LC_TIME,"Es");

function reedireccionar($dato,$key){
    echo "<a href='index.php?id=$key&modulo=$dato'>-$dato</a><br>";
}

function cabecera(){
    echo "<tr>";
    echo "<td class='horas'>HORAS</td>";
    for($i = -1; $i < 4; $i++){
        $dia = mktime(0,0,0,0,$i,0);
        echo "<td class='dia'>" .strtoupper(strftime("%A",$dia))."</td>";
    }
    echo "</tr>";
}

function horarios($dato,$key){
    $horas = ["08:30-9:25","09:25-10:20","10:20-11:10",
    "11:10-11:40",
    "11:40-12:35","12:35-13:30","13:30-14:25"];
    $asignaturas = ["Asignatura1","Asignatura2","Asignatura3",
    "Asignatura4","Asignatura5","Asignatura6"];

    echo "<table border = 1>";
    echo "<tr><th colspan='6' class='modulo'>$dato</th></tr>";
    cabecera();
    for($i = 0; $i < 7; $i++){
        echo "<tr><td class='horas'>$horas[$i]</td>";
        for ($j=0; $j < 5; $j++) { 
            if(!strcmp($horas[$i],"11:10-11:40")) echo "<td></td>";
            else echo "<td class='asignaturas'>".$asignaturas[array_rand($asignaturas)]."</td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}

?>