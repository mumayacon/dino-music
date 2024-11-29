<?php

    // Aqui abrimos una conexion a nuestra base de datos
    require 'conection.php';

    //para ello requerimos el metodo de conexion de funciones.php
    $conexion = conexion('dino_db', 'root', '');

    if (!$conexion) {

        die();

    }

    //La variable FILES guarda informacion del archivo que se cargo
    if ($_SERVER['REQUEST_METHOD'] == 'POST' && !empty($_FILES)) {

        //la funcion get image size comprueba que realmente el archivo seleccionada sea una imagen
        $check = @getimagesize($_FILES['cover']['tmp_name']);

        if ($check !== false) {

            $carpeta_destino = '../media/img/cover/';
            $archivo_subido = $carpeta_destino . $_FILES['cover']['name'];

            move_uploaded_file($_FILES['cover']['tmp_name'], $archivo_subido);
            
            $statement = $conexion->prepare('

                INSERT INTO tb_albums(title, artist, year, trackq, category, price, cover)
                VALUES (:title, :artist, :year, :trackq, :category, :price, :cover)

            ');

            $statement->execute(array(

                ':title' => $_POST['title'],
                ':artist' => $_POST['artist'],
                ':year' => $_POST['year'],
                ':trackq' => $_POST['trackq'],
                ':category' => $_POST['category'],
                ':price' => $_POST['price'],
                ':cover' => $_FILES['cover']['name']

            ));

            header('Location: upload_0.php');

        } else {

        $error = "El archivo no es una imagen o el archivo es muy pesado";

        }

    }

    require 'upload_1.php';

?>