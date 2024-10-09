<!doctype html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <title> Desarrollo web con PHP</title>
        <meta name="description" content="PHP">
        <meta name="author" content="Daniel">
    </head>
    <body>
        <h1>Tema 1: Actividad 5</h1>

        <form method="post" action="funciones.php">
            <h3>1. Comprueba si una cadena es palindromo</h3>
            <label for="cadena">Introduce una cadena: </label>
            <input type="text" id="cadena" name="cadena" required>
            <br>

            <h3>2. Filtra un array por un límite</h3>
            <label for="array">Introduce un array de números (separados por comas):</label>
            <input type="text" id="array" name="array" required>
            <br>

            <label for="limite">Introduce el límite:</label>
            <input type="number" id="limite" name="limite" required>
            <br>

            <h3>3. Ordenar un array de menor a mayor</h3>
            <label for="arrayOrdenar">Introduce un array de números (separados por comas):</label>
            <input type="text" id="arrayOrdenar" name="arrayOrdenar" required>
            <br>

            <h3>4. Solucionar ecuacion de segundo grado</h3>
            <label for="a">Coeficiente a:</label>
            <input type="number" id="a" name="a" required>

            <label for="b">Coeficiente b:</label>
            <input type="number" id="b" name="b" required>

            <label for="c">Coeficiente c:</label>
            <input type="number" id="c" name="c" required>
            <br>
        <input type="submit" value="Enviar">
    </form>
    </body>
</html>