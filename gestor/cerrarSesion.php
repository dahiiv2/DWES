<?php

//empezamos y destruimos la sesión
session_start();

session_destroy();

//empezamos otra, y pasamos al index
session_start();

$_SESSION['error'] = "Sesión cerrada.";

header('Location: index.php');
exit();