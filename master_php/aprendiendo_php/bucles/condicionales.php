<?php
$color = "rojo";
//$color = "verde";

if($color == "rojo"){
    echo "El color es rojo";
}else{
    echo "El color NO es rojo";
}
echo "<br/>";

$year = 2020;

if($year == 2020){
    echo "Estamos en 2020";
}else{
    echo "NO estamos en 2020";
}

echo "<br/>";

$dia = 3;
if($dia == 1){
    echo "Es lunes";
}elseif ($dia == 2) {
    echo "Es martes";
}elseif ($dia == 3) {
    echo "Es miércoles";
}elseif ($dia == 4) {
    echo "Es jueves";
}
echo "<br/>";


//el switch() en PHP es exactamente igual que en Java o JS
//los operadores de comparación (==, >, <, >=, <=...) en PHP son exactamente iguales que en Java o JS 
//los opreadores lógicos (&&, ||, !) en PHP son exactamente iguales que en Java o JS

//GOTO
goto marca;
echo "<h3>Instrucción 1</h3>";
echo "<h3>Instrucción 2</h3>";
echo "<h3>Instrucción 3</h3>";
echo "<h3>Instrucción 4</h3>";

//destino del GOTO
marca:
echo "<h1>Me he saltado 4 echos</h1>"; 
?>