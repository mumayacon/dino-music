<?php

    function conexion($db, $usuario, $pass) {

        try {

            $conexion = new PDO("mysql:host=localhost;dbname=$db", $usuario, $pass);
            return $conexion;

        } catch (PDOException $e) {

            return false;
            
        }
    }

    // Datos de conexión a la base de datos

    $servername = "localhost"; // Cambia esto si tu servidor MySQL está en otro lugar
    $username = "root"; // Usuario de MySQL
    $password = ""; // Contraseña de MySQL
    $database = "dino_db"; // Nombre de la base de datos

    // Crear conexión
    $conn = new mysqli($servername, $username, $password, $database);

    // Verificar la conexión
    if ($conn->connect_error) {

        die("Conexión fallida: " . $conn->connect_error);
        
    }

?>