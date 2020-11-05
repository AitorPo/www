<?php
//while() en PHP es exactamente igual que en Java o JS
$numero = 1;

//'n' representa al parámetro que podemos pasar por URL para cambiar el nº de la tabla de multiplicar
//NO es necesario pasar parámetro pero si queremos ponerlo solo detectará este y ningún otro
if(isset($_GET['n'])) {
    $numero = (int) $_GET['n'];
}else{
    $numero = 1;
}

echo "<h1>Tabla de multiplicar del número $numero</h1>";

$contador = 1;

while($contador <= 10){
    echo "$numero x $contador = ".($numero*$contador)."<br/>";
    $contador++;
}
//DO-WHILE() es exactamente igual en PHP que en JS o Java

echo "<hr />";
$resultado = 0;
for ($i=0; $i <= 100 ; $i++) { 
    $resultado += $i;
    //echo "<p>$resultado</p>";
}
echo "<h1>El resultado es: $resultado</h1>";

echo "<hr/>";
//tabla de multiplicar con FOR
if(isset($_GET['n'])) {
    //igualamos la variable $numero con el parámetro opcional de la URL 'n'
    $numero = (int) $_GET['n'];
}else{
    $numero = 1;
}
echo "<h1>Tabla de multiplicar del número $numero</h1>";


for ($i=1; $i <= 10 ; $i++) { 
    if ($numero == 45) {
        echo "No se pueden mostrar estas operaciones";
        break;
    }
    echo "$numero x $i = ".($numero*$i)."<br/>";
    //el incremento de i (contador) no es necesario en el for porque este ya crece, o decrece, al declarar el bucle
    //$i++;
}
?>