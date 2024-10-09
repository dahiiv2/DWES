<?php


// si el array de alumnos existe en la sesión, se recupera, si no, se crea un array vacío.
$alumnos = isset($_SESSION['alumnos']) ? $_SESSION['alumnos'] : [];

//guardamos los datos en variables por si hay error
$nombre = isset($_POST['nombre']) ? htmlspecialchars($_POST['nombre']) : '';
$apellido = isset($_POST['apellido']) ? htmlspecialchars($_POST['apellido']) : '';
$email = isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '';
$fecha = isset($_POST['fecha']) ? htmlspecialchars($_POST['fecha']) : '';

$alumnos = isset($alumnos) ? $alumnos : [];

?>


<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Desarrollo web con PHP</title>
    <style>
        label, input
        {
        display: block;
        }
    </style>
    <meta name="description" content="PHP">
    <meta name="author" content="Daniel">
</head>
<body>
    <!-- action cambiado a el archivo en views, ya que el php no esta en este archivo -->
    <form action="" method="post">

        <label for="nombre">Nombre *</label>
        <input type="text" name="nombre" value="<?php echo $nombre;?>" required>

        <label for="apellido">Apellido</label>
        <input type="text" name="apellido" value="<?php echo $apellido;?>">

        <label for="email">Correo electrónico *</label>
        <input type="text" name="email" value="<?php echo $email;?>" required>

        <label for="fecha">Fecha nacimiento *</label>
        <input type="text" name="fecha" value="<?php echo $fecha;?>" required>
        
        <input type="submit" value="Enviar">
    </form>
    <table border = "2">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Apellido</th>
                <th>Correo electrónico</th>
                <th>Fecha nacimiento</th>
            </tr>
        </thead>
        <tbody>
            <?php
            //por cada alumno que hay creamos una fila
            foreach ($alumnos as $alumno) {
                echo "<tr>";
                echo "<td>" . htmlspecialchars($alumno['nombre']) . "</td>";
                echo "<td>" . htmlspecialchars($alumno['apellido']) . "</td>";
                echo "<td>" . htmlspecialchars($alumno['email']) . "</td>";
                echo "<td>" . htmlspecialchars($alumno['fecha']) . "</td>";
                echo "</tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>