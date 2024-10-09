<?php
    $minombre = "Daniel";
    $miprefijo = "Prefijo";
    $url = 'http://username:password@hostname:9090/path?arg=value';
    // guardamos la url parseada en una variable
    $urlParseada = parse_url($url);

?>

<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title> Desarrollo web con PHP</title>
    <meta name="description" content="PHP">
    <meta name="author" content="Daniel">
</head>
<body>
    <h1>Tema 1: Actividad 1</h1>

    • Muestra el valor de un parámetro llamado nombre recibido por querystring eliminando
    los caracteres '/' del principio y el final si los hubiera (función trim). Si no se pasa un
    parámetro nombre se utilizará tu nombre de pila
    <br>
    <!-- si pasas por la url usa eso, si no la variable creada por mi -->
    <?= "Hola " . $nombre = $_GET['nombre'] ?? $minombre ?>
    <br>
    <br>

    • Muestra la longitud del parámetro nombre (función strlen).
    <br>
    <?= strlen($nombre); ?>
    <br>
    <br>

    • Muestra el nombre en mayúsculas (función strtoupper).
    <br>
    <?= strtoupper($nombre); ?>
    <br>
    <br>

    • Muestra el nombre en minúsculas (función strtolower).
    <br>
    <?= strtolower($nombre);?>
    <br>
    <br>

    • Pasa un segundo parámetro por querystring llamado prefijo (para pasar más de un
    parámetro por la querystring debes separarlos utilizando el carácter &). Después indica
    si el nombre comienza por el prefijo pasado o no (función strpos), se distinguirá entre
    mayúsculas y minúsculas. Si no se pasa el prefijo no se realizará esta operación.   
    <br>
    <!-- guardamos y imprimimos el prefijo, por defecto usa $miprefijo -->
    <?= "Prefijo: " . $prefijo = $_GET['prefijo'] ?? $miprefijo ?>
    <br>
    <?php
        // si el prefijo existe en el nombre, lo imprimimos con la posicion, nose xq pero solo funcionaba
        //si empezaba el if con un false
        $pos1 = strpos($nombre, $prefijo);
        if ($pos1 === false) {
            echo "No se ha encontrado el prefijo en el nombre";
        } else {
            echo "El prefijo se ha encontrado en la posición $pos1";        
        }
    ?>

    <br>
    <br>

    • Muestra el número de veces que aparece la letra a (mayúscula o minúscula) en el
    parámetro nombre (funciones substr_count + (strtoupper o strtolower)).
    <br>
    <!-- pasamos $nombre a minusculas y usamos substr_count para contar las a's -->
    <?= substr_count(strtolower($nombre), 'a');?>
    <br>
    <br>

    • Muestra la posición de la primera a existente en el nombre (sea mayúscula o minúscula).
    Si no hay ninguna mostrará un texto indicándolo (función stripos).
    <br>
    <!-- con el stripos encontramos la primera letra, aunque sea minuscula o mayuscula. hay que tener en
     cuenta que las posiciones empiezan por 0 -->
    <?php
        $pos2 = stripos($nombre, "a");
        if ($pos2 === false) {
            echo "No hay ninguna 'a' en el nombre";
        } else {
            echo "La primera 'a' en el nombre está en la posición $pos2 (las posiciones empiezan desde 0)";
        }
    ?>
    <br>
    <br>


    • Muestra el nombre sustituyendo las letras ‘o’ por el número cero (sea mayúscula o
    minúscula) (función str_ireplace).
    <br>
    <?= $nombreR = str_ireplace("o", "0", $nombre)?>
    <br>
    <br>

    • El protocolo utilizado (en el ejemplo http).
    <br>
    <!-- llamamos a la url parseada con la parte de la variable que queremos -->
    <?= $urlParseada['scheme']; ?>
    <br>
    <br>

    • El nombre de usuario (en el ejemplo username).
    <br>
    <?= $urlParseada['user']; ?>
    <br>
    <br>

    • El path de la url (en el ejemplo /path).
    <br>
    <?= $urlParseada['path']; ?>
    <br>
    <br>

    • El querystring de la url (en el ejemplo arg=value).
    <br>
    <?= $urlParseada['query']; ?>
    <br>
    <br>

</body>
</html>