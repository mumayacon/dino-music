<?php

    // Incluir el archivo de conexión
    include 'conection.php';

    // Verificar si el formulario ha sido enviado
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // Obtener los datos del formulario
        $nombre = $_POST['nombre'] ?? '';
        $username = $_POST['username'] ?? '';
        $contrasena = isset($_POST['contrasena']) ? password_hash($_POST['contrasena'], PASSWORD_DEFAULT) : '';
        $genero = $_POST['genero'] ?? '';
        $nacionalidad = $_POST['nacionalidad'] ?? '';
        $fecha_nacimiento = $_POST['fecha_nacimiento'] ?? '';
        $correo = $_POST['correo'] ?? '';
        $celular = $_POST['celular'] ?? '';
        $fecha_registro = date('Y-m-d');

        // Verificar que los campos obligatorios no estén vacíos
        if (!empty($nombre) && !empty($username) && !empty($contrasena) && !empty($celular)) {

            // Insertar los datos en la base de datos
            $sql = "INSERT INTO tb_usuarios (nombre, username, contrasena, genero, nacionalidad, fecha_nacimiento, fecha_registro, correo, celular, calificacionPagina) 
                    VALUES ('$nombre', '$username', '$contrasena', '$genero', '$nacionalidad', '$fecha_nacimiento', '$fecha_registro', '$correo', '$celular', 0)";

            if ($conn->query($sql) === TRUE) {

            echo "<!DOCTYPE html>
                <html lang='es'>
                <head>
                    <meta charset='UTF-8'>
                    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
                    <title>Registro Exitoso</title>
                </head>
                <body>
                    <h1>¡Registro Exitoso!</h1>
                    <p>Tu registro se ha completado con éxito. Serás redirigido en unos momentos...</p>
                    <script>
                        setTimeout(function() {
                            window.location.href = '../html/index.html';
                        }, 3000); // 3000 milisegundos = 3 segundos
                    </script>
                </body>
                </html>";

                exit();

            } else {

                echo "Error: " . $sql . "<br>" . $conn->error;

            }

        } else {

            echo "Por favor, completa todos los campos obligatorios.";

        }

        // Cerrar conexión
        $conn->close();

    } else {

        echo "Método de solicitud no válido.";
        
    }
    
?>