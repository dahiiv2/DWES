<?php

session_start();

session_destroy();

session_start();

$_SESSION['error'] = "Sesión cerrada.";

header('Location: index.php');
exit();