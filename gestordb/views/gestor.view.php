<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/general.css">
    <link rel="stylesheet" href="css/gestor.css">
    <title>Gestor de Tareas</title>
</head>
<body>
    <div id="encabezado">
        <h1>Gestor de Tareas</h1>
        <h1>Bienvenido, <span class="bienvenido"><?php echo $_SESSION["nombre"]; ?></span></h1>

        <form action="cerrarSesion.php" method="post" id="cerrarSesion">
            <button type="submit" id="cerrarBoton" name="cerrar">Cerrar Sesión</button>
        </form>

        <form action="index.php" method="post" id="volverIndex">
            <button type="submit" id="indexBoton" name="cerrar">
                <img src="img/casa.png" alt="Inicio" id="casa">
            </button>
        </form>
    </div>

    <div class="contenedor">
        <div id="crearTarea">
            <h1 id="subtitulo">Añadir Tarea</h1>
            <form action="" method="post" id="formTarea">
                <label for="nombre">Tarea</label>
                <input type="text" name="nombre" id="nombre" required>

                <label for="desc">Descripción</label>
                <input type="text" name="desc" id="desc" required>

                <label for="prioridad">Prioridad</label>
                <select name="prioridad" id="prioridad" required>
                    <option value="alta">Alta</option>
                    <option value="media">Media</option>
                    <option value="baja">Baja</option>
                </select>

                <label for="fecha">Fecha de Finalización</label>
                <input type="date" name="fecha" id="fecha" required>

                <input type="submit" value="Crear Tarea" id="crear">
            </form>
        </div>

        <div id="tareas">
            <h2>Lista de Tareas</h2>
            <?php if (!empty($tareas)): ?>
                <table>
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Prioridad</th>
                            <th>Fecha de Finalización</th>
                            <th>Modificar Nombre</th>
                            <th>Borrar Tarea</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($tareas as $tarea): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($tarea->nombre); ?></td>
                                <td><?php echo $tarea->prioridad; ?></td>
                                <td><?php echo htmlspecialchars($tarea->fecha); ?></td>
                                <td>
                                    <form method="post" action="">
                                        <input type="hidden" name="action" value="modificar">
                                        <input type="hidden" name="index" value="<?php echo htmlspecialchars($tarea->id); ?>">
                                        <input type="text" name="nuevo_nombre" value="<?php echo htmlspecialchars($tarea->nombre); ?>">
                                        <input type="submit" value="Modificar">
                                    </form>
                                </td>
                                <td>
                                    <form method="post" action="">
                                        <input type="hidden" name="action" value="borrar">
                                        <input type="hidden" name="index" value="<?php echo htmlspecialchars($tarea->id); ?>">
                                        <input type="submit" value="Borrar Tarea">
                                    </form>
                                </td>
                            </tr>
                            <tr>
                                <td colspan="5">
                                    <em>Descripción: <?php echo htmlspecialchars($tarea->descripcion); ?></em>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            <?php else: ?>
                <p>No hay tareas creadas.</p>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
