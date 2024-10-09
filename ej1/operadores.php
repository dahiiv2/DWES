<?php

/*
comparar numeros
*/

//declaramos dos numeros
$num1 = 3;
$num2 = 8;

//comparamos los numeros y mostramos el mayor y menor
if ($num1 > $num2) {
    echo "$num1 es mas grande que $num2";
} elseif ($num2 > $num1) {
    echo "$num2 es mas grande que $num1";
} else {
    echo "$num1 y $num2 son iguales";
}

echo "<br>";
/*
encontrar numeros primos
*/

//creamos dos rangos
$rango1 = -500;
$rango2 = 100;

//bucle de todos los numeros en el rango
for ($i = $rango1; $i < $rango2; $i++) {

    //por defecto ponemos primo a true
    $primo = true;

    //por defecto ponemos el primer numero primo si el rango empieza antes
    if ($i < 2) {
        $i = 2;
    }

    //por cada numero miramos si es divisible por la mitad de los numeros entre 2 y el mismo (la mitad para ser mas eficiente)
    for ($j = 2; $j < $i; $j++) {
        if ($i % $j == 0) {
            //si es divisible, no es primo y salimos del bucle
            $primo = false;
            break;
        }
    }

    //si el numero es primo, lo mostramos
    if ($primo == true) {
        echo $i . "<br>";
    }


}



?>