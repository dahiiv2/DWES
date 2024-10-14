<!doctype html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title> Desarrollo web con PHP</title>
    <meta name="description" content="PHP">
    <meta name="author" content="TU NOMBRE">
</head>
<body>
    <h1>Tema 2: Actividad 10</h1>
    <?php
        require "Vehículo.php";
        require "Cuatro_ruedas.php";
        require "Dos_ruedas.php";
        require "Coche.php";
        require "Camion.php";

        echo "• Crea un vehículo negro de 1500 kg. Haz que circule. Añade una persona de 70 kg y
        muestra el nuevo peso del vehículo. <br>";
        //ahora tiene que ser coche ya que Vehiculo es abstracto
        $veh1 = new Coche("negro", 1500, 0, 0);
        echo $veh1->circular();
        echo "Peso del vehículo: " . $veh1->getPeso() . "kg <br>";
        $veh1->añadir_persona(70);
        echo "Peso del vehículo despues de añadir persona de 70kg: " . $veh1->getPeso() . "kg <br>";

        echo "<br>";

        echo "• Crea un coche verde de 1400 kg. Añade dos personas de 65 kg cada una. Muestra su
        color y su nuevo peso. <br>";
        $veh2 = new Coche("verde", 1400, 4, 0);
        echo "Peso del vehículo: " . $veh2->getPeso() . "kg <br>";
        $veh2->añadir_persona(65);
        $veh2->añadir_persona(65);
        echo "Color del vehículo: ". $veh2->getColor(). "<br>";
        echo "Peso del vehículo despues de añadir 2 personas de 65kg: " . $veh2->getPeso(). "kg <br>";

        echo "<br>";

        echo "• Cambia el color del coche verde a rojo y añade dos cadenas para la nieve. <br>";
        $veh2->setColor("rojo");
        $veh2->añadir_cadenas_nieve(2);
        echo "• Muestra su color y su número de cadenas para la nieve. <br>";
        echo "Color del vehículo: ". $veh2->getColor(). "<br>";
        echo "Número de cadenas para la nieve: ". $veh2->getNumeroCadenasNieve(). "<br>";

        echo "<br>";
        
        echo "• Crea un objeto Dos_ruedas negro de 120 kg y cilindrada de 125. Añade una persona de
        80 kg. Ponle 20 litros de gasolina. <br>";
        $veh3 = new Dos_ruedas("negro", 120, 125);
        $veh3->añadir_persona(80);
        $veh3->poner_gasolina(20);
        echo "• Muestra el color y el peso de dos ruedas. <br>";
        echo "Color de dos_ruedas: ". $veh3->getColor(). "<br>";
        echo "Peso de dos_ruedas: ". $veh3->getPeso(). "kg <br>";

        echo "<br>";

        echo "• Crea un camión azul de 10000 kg y de 10 metros de longitud con 2 puertas. Añade un
        remolque de 5 metros y una persona de 80 kg <br>";
        $veh4 = new Camion("azul", 10000, 2, 10);
        $veh4->añadir_remolque(5);
        echo "• Muestra su color, su peso, su longitud y su número de puertas. <br>";
        echo "Color del vehículo: ". $veh4->getColor(). "<br>";
        echo "Peso del camión: ". $veh4->getPeso(). "kg <br>";
        echo "Longitud del camión: ". $veh4->getLongitud(). "m <br>";
        echo "Número de puertas: ". $veh4->getNumeroPuertas(). "<br>";

        echo "<br>";

        echo "• Crea un dos ruedas rojo de 150 kg y una cilindrada de 1000. Añade una persona de 70 kg. <br>";
        $veh5 = new Dos_ruedas("rojo", 150, 1000);
        $veh5->añadir_persona(70);
        echo "• Muestra todos los valores de los atributos del dos ruedas con la función ver_atributo. <br>";
        //llamamos el metodo estático
        Vehículo::ver_atributo($veh5);

        echo "<br>";

        echo "• Crea un camión blanco de 6000 kg 12 metros de longitud con 2 puertas. Añade una
        persona de 84 kg. Vuelve a pintarlo, en color azul. <br>";
        $veh6 = new Camion("blanco", 6000, 2, 12);
        //al añadir persona se sale de 2100 usando el get y lo pone a 2100
        $veh6->añadir_persona(84);
        $veh6->setColor("azul");
        echo "• Muestra todos los valores de los atributos del camión con la función ver_atributo. <br>";
        Vehículo::ver_atributo($veh6);

        echo "<br>";

        echo "• Crea un coche verde de 2100 kg con 4 puertas en la página. Añade 2 cadenas para la
        nieve y una persona de 80 kg. Cambia el color del coche a azul. Quita 4 cadenas. Vuelva
        a pintar el coche en color negro. <br>";
        $veh7 = new Coche("verde", 2100, 4, 0);
        $veh7->añadir_cadenas_nieve(2);
        $veh7->añadir_persona(80);
        $veh7->setColor("azul");
        $veh7->quitar_cadenas_nieve(4);
        $veh7->setColor("negro");
        echo "• Muestre todos los atributos del coche y el número de veces que se cambia el
        color con el método ver_atributo(objeto). <br>";
        Vehículo::ver_atributo($veh7);

    ?>
</body>
</html>