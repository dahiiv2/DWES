<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title> Desarrollo web con PHP</title>
    <meta name="description" content="PHP">
    <meta name="author" content="Daniel">
</head>
<body>
    <h1>Tema 1: Actividad 3</h1>
    <?php
        /*funcion que pasandole el nombre de la tabla y un array asociativo te da una cadena
        para insercion SQL*/
        function insert($tabla, $array) {
            //para coger los nombres de los elementos del array utilizamos array_keys y separamos por ,
            return "insert into $tabla (" . implode(",", array_keys($array)) . ") values (" .
                ":" . implode(", :", array_keys($array)) . ")";
        }
        echo insert('alumno', ['nombre' => 'juan', 'apellido' => 'amat']);

        echo "<br>";

        /*funcion donde pasamos la sentencia sql, nombre de la tabla y el array, y devuelve la sentencia
        reemplazando*/
        function insert2(&$cadena, $tabla, $array) {
            //reemplazamos "tabla" con el segundo parametro que pase el usuario
            $cadena = str_replace('tabla', $tabla, $cadena);

            //reemplazamos "campos" con el arraykeys separado por coma
            $cadena = str_replace('campos', implode(",", array_keys($array)), $cadena);

            //reemplazamos "cadena" con el arraykeys separado por coma, tambien empezando por :
            $cadena = str_replace('valores', ":" . implode(", :", array_keys($array)), $cadena);
        }

        //cadena a pasar
        $cadena = "insert into tabla (campos) values (valores)";

        insert2($cadena, 'alumno', ['nombre' => 'juan', 'apellido' => 'amat']);
        echo $cadena;

        echo "<br>";


        /*funcion donde puedes llamarla pasando una funcion para realizar la operacion*/
        function operacion($num1, $sim, $num2, $anonima) {
            //llama a la funcion que pasas como parametro
            $resultado = $anonima($num1, $num2);

            //imprime el resultado
            echo "$num1 $sim $num2 = $resultado <br>";

        }
        
        //uso de la funcion para suma resta multiplicacion y division
        /*llamas al metodo funcion, y creas la funcion en el momento, y con los parametros pasados realiza la operacion
        y en la funcion operacion devuelve el resultado con el echo, de esta manera podemos realizar cualquier
        operacion que queramos*/

        operacion(5, '+', 3, function($a, $b) {
            return $a + $b;
        });

        operacion(10, '-', 4, function($a, $b) {
            return $a - $b;
        });
        
        operacion(2, '*', 3, function($a, $b) {
            return $a * $b;
        });

        operacion(12, '/', 3, function($a, $b) {
            return $a / $b;
        });
    ?>
</body>
</html>