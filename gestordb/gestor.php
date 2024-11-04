<?php
    session_start();
    
    require 'Tarea.php';
    require 'ManagerTareas.php';

    if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["nombre"])) {
        $nombre = $_POST["nombre"];
        $contrasenya = $_POST["contrasenya"];
    
        $hostDB = "localhost";
        $nombreDB = "dwes";
        $userDB = "root";
        $passDB = "";
    
        $dsn = "mysql:host=$hostDB;dbname=$nombreDB;";

        $pdo = new PDO($dsn, $userDB, $passDB);
    
        try {
            $pdo = new PDO($dsn, $userDB, $passDB);
    
            $select = $pdo->prepare("SELECT * FROM tareas WHERE usuario_id = :usuario);
            $select->bindParam(':usuario', $nombre);
            $select->bindParam(':contrasenya', $contrasenya);

            $select->execute();
        
            $resultados = $select->fetch();

    //esto fue un gran problema, pero hay que poner lo al final para que renderize todo DESPUES de el codigo de arriba
    require 'views/gestor.view.php';