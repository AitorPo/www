<?php
//numeros pares del 1 al 100
for($i = 1; $i <= 100; $i++){
    if($i%2 == 0){
        echo $i." - ";
    }
}
echo "<br/>";
echo "<br/>";
?>

<?php
//cuadrados de los primeros 40 num
$contador = 0;
while($contador <= 40){
    $cuadrado = $contador * $contador;
    echo $cuadrado." - ";
    $contador++;
}
?>

<?php
//recoger dos nums por URL y hacer las operaciones básicas con ellos
echo "<br/>";
echo "<br/>";

if(isset( $_GET['n']) && isset($_GET['num'])){

    $numero1 = $_GET['n'];
    $numero2 = $_GET['num'];

    $suma = $numero1 + $numero2;
    $resta = $numero1 - $numero2;
    $multiplicacion = $numero1 * $numero2;
    $division = $numero1 / $numero2;

    echo "La suma es: ".$suma;
    echo "<br/>";
    echo "La resta es: ".$resta;
    echo "<br/>";
    echo "La multiplicación es: ".$multiplicacion;
    echo "<br/>";
    echo "La división es: ".$division;
}else{
    echo "<h1>Introduce números en la URL para operar</h1>";
}
?>

<?php
//mostrar todos los numeros entre dos numeros que nos lleguen por la URL
echo "<br/>";
echo "<br/>";

if(isset($_GET['n']) && isset($_GET['num'])){

    $numero1 = $_GET['n'];
    $numero2 = $_GET['num'];
        
    for ($i = $numero1; $i <= $numero2 ; $i++) { 
        echo $i." ";
    }
}else{
    echo "<h1>Introduce números en la URL para mostrar</h1>";
}
?>

<?php
//mostrar tabla de HTML con las tablas de multiplicar del 1 al 100

//creamos la tabla con su etiqueta y su borde
echo "<table border = '1'> <tr>";
//inicio fila 1 de celdas
echo "<tr>";
    for ($cabecera = 1; $cabecera <= 10 ; $cabecera++) { 
       echo "<td>Tabla del $cabecera</td>";
    }
//fin fila 1 de celdas
echo "</tr>";
//inicio fila 2 de celdas
echo "<tr>";
    for ($i = 1; $i <= 10 ; $i++) { 
        echo "<td>";
           for ($x = 1; $x <= 10 ; $x++) { 
               echo "$i * $x = ".$i*$x."<br/>";
           }
        echo "</td>";
    }
//fin fila 2 de celdas
echo "</tr>";
echo "</table>";
?>

<?php
//mostrar numeros impares entre dos numeros recogidos por URL
echo "<br/>";
echo "<br/>";

if(isset($_GET['n']) && isset($_GET['num'])){
    $numero1 = $_GET['n'];
    $numero2 = $_GET['num'];
    
    if ($numero1 < $numero2) {
        for ($i = $numero1; $i <= $numero2 ; $i++) { 
            if ($i%2  != 0) {
                echo $i." ";
            }
        }
    }else{
        echo "<h3>Cambia el orden de los números para poder mostrrar sus impares</h3>";
    }
    
}else{
    echo "<h3>Introduce números en la URL para mostrar sus impares</h3>";
}
?>