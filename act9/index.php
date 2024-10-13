<?php
    require_once('CabeceraPagina.php');
    require_once('Menu.php');
    require_once('Tabla_Base.php');
    require_once('Tabla.php');
?>

<html>
<head>
    <title>ClasesHTML</title>
</head>
<body>
    <?php
        echo 'Ejercicio 1<br>';
        $cabecera=new CabeceraPagina('El blog del programador','center','#FF1A00','#CDEB8B');
        $cabecera->graficar();
        echo '<br>';


        echo 'Ejercicio 2<br>';
        $menu1=new Menu();
        $menu1->cargarOpcion('http://www.lanacion.com.ar','La Nación');
        $menu1->cargarOpcion('http://www.clarin.com.ar','El Clarín');
        $menu1->cargarOpcion('http://www.lavoz.com.ar','La Voz del Interior');
        $menu1->mostrar("horizontal");
        echo '<br>';
        $menu2=new Menu();
        $menu2->cargarOpcion('http://www.google.com','Google');
        $menu2->cargarOpcion('http://www.yahoo.com','Yhahoo');
        $menu2->cargarOpcion('http://www.msn.com','MSN');
        $menu2->mostrar("vertical");
        echo '<br>';


        echo 'Ejercicio 3<br>';
        $tablaBase=new Tabla_Base(10,3);
        $tablaBase->cargar(1,1,"titulo 1","#356AA0","#FFFF88");
        $tablaBase->cargar(1,2,"titulo 2","#356AA0","#FFFF88");
        $tablaBase->cargar(1,3,"titulo 3","#356AA0","#FFFF88");
        for($f=2;$f<=10;$f++)
        {
            $tablaBase->cargar($f,1,"x","#0000ff","#EEEEEE");
            $tablaBase->cargar($f,2,"x","#0000ff","#EEEEEE");
            $tablaBase->cargar($f,3,"x","#0000ff","#EEEEEE");
        }
        $tablaBase->graficar();
        echo '<br>';


        echo 'Ejercicio 4<br>';
        $tabla1=new Tabla(10,3);
        $tabla1->cargar(1,1,"titulo 1","#356AA0","#FFFF88");
        $tabla1->cargar(1,2,"titulo 2","#356AA0","#FFFF88");
        $tabla1->cargar(1,3,"titulo 3","#356AA0","#FFFF88");
        for($f=2;$f<=10;$f++)
        {
            $tabla1->cargar($f,1,"x","#0000ff","#EEEEEE");
            $tabla1->cargar($f,2,"x","#0000ff","#EEEEEE");
            $tabla1->cargar($f,3,"x","#0000ff","#EEEEEE");
        }
        $tabla1->graficar();
        echo '<br>';

        echo 'Ejercicio 5<br>';
        $tabla2=new Tabla(10,2);
        $celda=new Celda('titulo 1','#356AA0','#FFFF88');
        $tabla2->insertar($celda,1,1);
        $celda=new Celda('titulo 2','#356AA0','#FFFF88');
        $tabla2->insertar($celda,1,2);
        for($f=2;$f<=10;$f++)
        {
            $celda=new Celda('x','#0000ff','#eeeeee');
            $tabla2->insertar($celda,$f,1);
            $celda=new Celda('y','#0000ff','#eeeeee');
            $tabla2->insertar($celda,$f,2);
        }
        $tabla2->graficar();

    ?>
</body>
</html>