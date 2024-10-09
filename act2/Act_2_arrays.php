<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<title> Desarrollo web con PHP</title>
<meta name="description" content="PHP">
<meta name="author" content="Daniel">
<style>
table, tr, td, th{
border: 1px solid black;
}
</style>
</head>
<body>
<h1>Tema 1: Actividad 2</h1>
<?php
    echo "• Crea un array llamado nombres que contenga varios nombres. <br>";
    //creación del array
    $nombres = ["Daniel", "Raul", "John", "Astolfo"];
    print_r($nombres);
    echo "<br> <br>";

    //guardamos esto para ejercico de despues
    $nombresOriginales = $nombres;

    echo "• Muestra el número de elementos que tiene el array (función count). <br>";
    //mostrar el número de elementos del array
    echo count($nombres) . "<br> <br>";   

    echo "• Crea una cadena que contenga los nombres de los alumnos existentes en el array 
    separados por un espacio y muéstrala (función de strings implode). <br>";
    //imprimir cadena con nombres separados por un espacio
    echo implode(" ", $nombres);
    echo "<br> <br>";  
    
    echo "• Muestra el array ordenado alfabéticamente (función asort). <br>";
    //ordenar el array
    asort($nombres);
    //imprimimos mediante implode
    echo implode(" ", $nombres);
    echo "<br> <br>";

    //restauramos los nombres despues del asort
    $nombres = $nombresOriginales;

    echo "• Muestra el array en el orden inverso al que se creó (función array_reverse). <br>";
    //invertimos el array y asignamos
    $nombresInversos = array_reverse($nombresOriginales);
    //imprimimos mediante implode
    echo implode(" ", $nombresInversos);
    echo "<br> <br>";

    echo "• Muestra la posición que tiene tu nombre en el array (función array_search). <br>";
    //posicion devuelve el numero de la posicion de lo que buscamos
    $posicion = array_search("Daniel", $nombres);
    print_r($nombres);
    //imprimimos
    echo "<br> Daniel está en la posición " . $posicion . "<br> <br>";

    echo "• Crea un array de alumnos donde cada elemento sea otro array que contenga el id,
    nombre y edad del alumno. <br>";
    //creamos alumnos2 donde cada elemento es un propio array con el id nombre y edad de cada persona
    $alumnos2 = [
        [
            "id" => 1,
            "nombre" => "Juan",
            "edad" => 20
        ],
        [
            "id" => 2,
            "nombre" => "Tut",
            "edad" => 22
        ],
        [
            "id" => 3,
            "nombre" => "Miguel",
            "edad" => 28
        ]
    ];
    print_r($alumnos2);
    echo "<br> <br>";

    echo "• Crea una tabla html en la que se muestren todos los datos de los alumnos. <br>";
?>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Edad</th>
        </tr>
        <!-- foreach recorre cada alumno y por cada recorrida de bucle creamos una celda con
        la información de cada alumno -->
        <?php foreach($alumnos2 as $alumno):?>
            <tr>
                <td><?php echo $alumno['id'];?></td>
                <td><?php echo $alumno['nombre'];?></td>
                <td><?php echo $alumno['edad'];?></td>
            </tr>
        <?php endforeach;?>
    </table>
    <br>    
<?php
    echo "• Utiliza la función array_column para obtener un array indexado que contenga 
    únicamente los nombres de los alumnos y muéstralo por pantalla. <br>";
    //array_column devuelve un array con los valores de la columna especificada
    $nombres = array_column($alumnos2, 'nombre');
    print_r($nombres);
    echo "<br> <br>";

    echo "• Crea un array con 10 números y utiliza la función array_sum para obtener la suma de  
    los 10 números. <br>";
    //creamos el array con 10 numeros
    $numeros = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10];
    //imprimimos
    echo implode(", ", $numeros);
    //utilizamos array_sum que devuelve la suma de todos los numeros
    echo "<br> La suma de los numeros es: " . array_sum($numeros);

?>

</body>
</html>