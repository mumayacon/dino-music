<?php

    session_start();

    include 'conection.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $username = $_POST['username'] ?? '';
        $contrasena = $_POST['contrasena'] ?? '';

        if (!empty($username) && !empty($contrasena)) {

            $sql = "SELECT * FROM tb_usuarios WHERE username = ?";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("s", $username);
            $stmt->execute();
            $result = $stmt->get_result();

            if ($result->num_rows > 0) {

                $row = $result->fetch_assoc();

                if (password_verify($contrasena, $row['contrasena'])) {

                    $_SESSION['id_usuario'] = $row['id_usuario'];
                    $_SESSION['username'] = $row['username'];
                    
                    $user_data = [

                        'id_usuario' => $row['id_usuario'],
                        'nombre' => $row['nombre'],
                        'username' => $row['username'],
                        'fecha_nacimiento' => $row['fecha_nacimiento'],
                        'nacionalidad' => $row['nacionalidad'],
                        'genero' => $row['genero'],
                        'correo' => $row['correo'],
                        'celular' => $row['celular'],
                        'fecha_registro' => $row['fecha_registro']

                    ];

                    echo "<script>

                        localStorage.setItem('userData', JSON.stringify(".json_encode($user_data)."));
                        window.location.href = '../html/index.html';

                    </script>";

                } else {

                    echo "Usuario o contraseña incorrectos.";

                }

            } else {

                echo "Usuario o contraseña incorrectos.";

            }

            $stmt->close();

        } else {

            echo "Por favor, complete todos los campos.";

        }

        $conn->close();

    } else {

        echo "Método de solicitud no válido.";

    }

?>