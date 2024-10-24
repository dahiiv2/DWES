    <?php 
    session_start();

    require 'ContrasenaInvalidaException.php';
    require 'Usuario.php';

    /*el post lo he movido aqui para que cree el usuario y si durante la creación la contraseña da error
    lo pilla mediante el catch*/
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $nombre = $_POST["nombre"];
            $contrasenya = $_POST["contrasenya"];

        //si hay sesion, creamos una cuenta nueva
        if(!isset($_SESSION["usuario"])) {
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nombre = $_POST["nombre"];
                $contrasenya = $_POST["contrasenya"];
                
                //creamos usuario nuevo, lo serializamos y mandamos a panelControl
                try {
                    $usuario = new Usuario($nombre, $contrasenya);
                    $_SESSION["nombre"] = $_POST["nombre"];
                    $_SESSION["contrasenya"] = $_POST["contrasenya"];
                    $_SESSION["usuario"] = serialize($usuario);
                    $_SESSION["login"] = true;
                    header("Location: panelControl.php");
                    //muestra nuestras excepciones
                } catch (ContrasenaInvalidaException $e) {
                    $error = $e->getMessage();
                }   
            }
        //si hay una cuenta, confirmamos que la informacion sea correcta, si lo es avanzamos si no contra incorrecta
        } else {
            $usuario = unserialize($_SESSION["usuario"]);
            if ($nombre === $_SESSION["nombre"] && $contrasenya === $_SESSION["contrasenya"])  {
                $_SESSION["login"] = true;
                header("Location: panelControl.php");
                exit();
            } else {
                $_SESSION["login"] = false;
                echo "Nombre o contraseña incorrectos";
            }
        }
    }

    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
    </head>
    <body>
        <h1>Login</h1>

        <form action="" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required></input>
            <br> <br>
            <label for="contrasenya">Contraseña:</label>
            <input type="text" id="contrasenya" name="contrasenya" required></input>
            <button type="submit">Login</button>
            <br> <br>
            <p>La contraseña debe cumplir las siguientes condiciones:</p>

            <ul>
                <li>Contener al menos 6 carácteres</li>
                <li>Contener menos de 16 carácteres</li>
                <li>Contener al menos 1 letra mayúscula</li>
                <li>Contener al menos 1 letra minúscula</li>
                <li>Contener al menos 1 carácter númerico</li>
            </ul>
            <?php if (isset($error)) { ?>
                <p style="color:red;"><?php echo $error; ?></p>
            <?php } ?>

            <!-- esto lo he añadido porque al hacer tests si me volvia al inicio y no sabia el usuario no podia
            acceder, ya que se supone q en esta actividad no se puede poner si no has iniciado sesion-->
            <a href="CerrarSesion.php">Cerrar sesion (debug)</a>
        </form>
    </body>
    </html>