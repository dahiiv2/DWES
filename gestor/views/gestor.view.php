<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/general.css"></link>
    <link rel="stylesheet" href="css/gestor.css"></link>
    <title>Document</title>
</head>
<body>
    <div id="encabezado">
        <h1>Gestor de Tareas</h1>
        <h1>Bienvenido, <span class="bienvenido"><?php echo $_SESSION["nombre"] ?></span></h1>

        <!-- boton para cerrar sesion -->
        <form action="cerrarSesion.php" method="post" id="cerrarSesion">
            <button type="submit" id="cerrarBoton" name="cerrar">Cerrar Sesion</button>
        </form>

        <!-- boton para volver al index sin cerrar sesion -->
        <form action="index.php" method="post" id="volverIndex">
            <button type="submit" id="indexBoton" name="cerrar">
            <img src="img/casa.png" alt="casa" id="casa">
            </button>
        </form>
    </div>

    <div class="contenedor">

        <div id="crearTarea">
        <h1 id="subtitulo">Añadir Tarea</h1>

            <!-- formulario para crear una tarea -->
            <form action="" method="post" id="formTarea">
            <label for="nombre">Tarea </label>
            <input type="text" name="nombre" id="nombre" required>

            <label for="desc">Descripcion </label>
            <input type="text" name="desc" id="desc" required>

            <label for="prioridad">Prioridad </label>
            <select name="prioridad" id="prioridad" required>
                <option value="alta">Alta</option>
                <option value="media">Media</option>
                <option value="baja">Baja</option>
            </select>

            <label for="fecha">Fecha de Finalización </label>
            <input type="date" name="fecha" id="fecha" required>

            <input type="submit" value="Crear Tarea" id="crear">
            </form>
        </div>

        <div id="tareas">
            <h2>Lista de Tareas</h2>
            <!-- si hay tareas -->
            <?php if (!empty($tareas)): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Prioridad</th>
                            <th>Fecha de Finalización</th>
                            <th>Modificar nombre</th>
                            <th>Borrar tarea</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- recrremos por cada tarea, ej: 1 => Examen, 2 => Futbol, etc-->
                        <?php foreach ($tareas as $index => $tarea): ?>
                            <tr>
                                <td><?php echo $tarea->getNombre(); ?></td>
                                <td><?php echo $tarea->getPrio(); ?></td>
                                <td><?php echo ($tarea->getFecha()); ?></td>
                                <td>
                                    <!-- formulario para modificar el nombre de la tarea, pasamos a gestor.php -->
                                    <form method="post" action="">
                                        <!-- pasamos la accion que vamos a hacer (modificar) y el numero de tarea (index)-->
                                        <input type="hidden" name="action" value="modificar">
                                        <input type="hidden" name="index" value="<?php echo $index; ?>">
                                        <input type="text" name="nuevo_nombre" value="<?php echo $tarea->getNombre(); ?>">
                                        <input type="submit" value="Modificar">
                                    </form>
                                </td>
                                <td>
                                     <!-- formulario para borrar la tarea, pasamos a gestor.php -->
                                    <form method="post" action="">
                                        <!-- pasamos la accion que vamos a hacer (borrar) y el numero de tarea (index)-->
                                        <input type="hidden" name="action" value="borrar">
                                        <input type="hidden" name="index" value="<?php echo $index; ?>">
                                        <input type="submit" value="Borrar tarea">
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <!-- si no hay tareas -->
            <?php else: ?>
                <p>No hay tareas creadas.</p>
            <?php endif; ?>
        </div>
    </div>

</body>
</html>