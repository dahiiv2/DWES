<?php
    // 1. Escribe una función que reciba una cadena y comprueba si es un palíndromo.

    function palindromo($cadena) {
        //todo a minusculas y quitamos espacios
        $cadena = strtolower(str_replace(' ', '', $cadena));

        //reemplazamos caracteres acentuados por sus equivalentes sin acento
        $acentos = array('á', 'é', 'í', 'ó', 'ú', 'ä', 'ë', 'ï', 'ö', 'ü');
        $sinAcentos = array('a', 'e', 'i', 'o', 'u', 'a', 'e', 'i', 'o', 'u');
        $cadena = str_replace($acentos, $sinAcentos, $cadena);


        //invertimos la cadena
        $cadenaInvertida = strrev($cadena);

        //comparamos la cadena con su inversa
        return $cadena === $cadenaInvertida;
    }

    /* 2. Escribe una función que reciba un array de números, y un número, el límite. La función
    tiene que devolver un nuevo array que contenga solo los elementos del array original
    menores que el límite.*/

    function limite($array, $limite) {
        $arrayNuevo = [];
        //por cada array
        foreach($array as $num) {
            //si el numero es menor que el limite, lo añadimos al nuevo array
            if ($num < $limite) {
                array_push($arrayNuevo, $num);
            }
        }
        return $arrayNuevo;
    }

    // 3. Escribe una función que reciba un array de números y los ordene de mayor a menor.

    function ordenar($array) {
        //ordena el array en orden ascendiente
        sort($array);
        return $array;
    }

    /* 4. Crea una función para resolver una ecuación de segundo grado (ax2
    +bx+c=0). Esta función recibe los coeficientes de la ecuación y devuelve un array con las soluciones. Si
    no hay soluciones reales, devuelve FALSE. */

    function ecuacion($a, $b, $c) {
        $discriminante = $b * $b - 4 * $a * $c;
    
        //si el discriminante es negativo, no hay soluciones reales
        if ($discriminante < 0) {
            return false;
        }
    
        //calculamos las dos soluciones
        $x1 = (-$b + sqrt($discriminante)) / (2 * $a);
        $x2 = (-$b - sqrt($discriminante)) / (2 * $a);
    
        return array($x1, $x2);
    }
    
    
    
    
    
    


    //cogemos la cadena mediante el post
    $cadena = $_POST['cadena'];

    //miramos si la cadena es palindroma llamando a la funcion
    if (palindromo($cadena)) {
        echo "<h3>Resultado 1: </h3>";
        echo "La cadena '$cadena' es un palíndromo. <br>";
    } else {
        echo "<h3>Resultado 1: </h3>";
        echo "La cadena '$cadena' no es un palíndromo. <br>";
    }   
        
    //explode es para coger el string pasado y pasarlo a array separando por ,
    $array = explode(',', $_POST['array']);
    $limite = $_POST['limite'];

    echo "<h3>Resultado 2: </h3>";
    echo "Array antes de filtrar: " . implode(", ", $array) . "<br>";
    $arrayLimitado = limite($array, $limite);
    echo "Array después de filtrar por el límite de $limite: " . implode(", ", $arrayLimitado) . "<br>";
  
    //explode es para coger el string pasado y pasarlo a array separando por ,
    $arrayOrdenar = explode(',', $_POST['arrayOrdenar']);

    echo "<h3>Resultado 3: </h3>";
    echo "Array antes de ordenar: " . implode(", ", $arrayOrdenar) . "<br>";
    $arrayOrdenado = ordenar($arrayOrdenar);
    echo "Array después de ordenar: " . implode(", ", $arrayOrdenado) . "<br>";

    //cogemos los coeficientes mediante el post
    $a = $_POST['a'];
    $b = $_POST['b'];
    $c = $_POST['c'];

    echo "<h3>Resultado 4: </h3>";
    $resultado = ecuacion($a, $b, $c);
    //si devuelve falso mostramos que no hay soluciones
    if ($resultado === false) {
        echo "La ecuación no tiene soluciones reales.<br>";
    } else {
        echo "Las soluciones de la ecuación son: " . implode(", ", $resultado) . "<br>";
    }
?>