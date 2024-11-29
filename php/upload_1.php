<!DOCTYPE html>
<html lang="en">

    <head> <meta charset="UTF-8">
    <title>Proyecto</title>
    <link rel="stylesheet" href="../styles/upload.css">
    </head>

    <body>

        <header>

        <div class="contenedor">

            <h1 class="titulo">Subir Imagen al Sitio</h1>

        </div>

        </header>

        <div class="contenedor">

            <form class="formulario" method="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">

            <label for="foto">Selecciona tu Imagen</label>
            <input type="file" id="cover" name="cover">

            <br>

            <label for="titulo">Titulo del Album</label>
            <input type="text" id="title" name="title">

            <br>

            <label for="titulo">Artista</label>
            <input type="text" id="artist" name="artist">

            <br>

            <label for="titulo">Año</label>
            <input type="number" id="year" name="year">

            <br>

            <label for="titulo">Cantidad de canciones</label>
            <input type="number" id="trackq" name="trackq">

            <br>

            <label for="category">Categoria</label>
            <select id="category" name="category">

                <option value=""></option>
                <option value="Clasico">Clasico</option>
                <option value="Corridos">Corridos</option>
                <option value="Urbano Latino">Urbano Latino</option>
                <option value="Hip-Hop">Hip-Hop</option>
                <option value="R&B">R&B</option>
                <option value="Baladas/Boleros">Baladas/Boleros</option>
                <option value="Folk">Folk</option>

            </select>

            <br>

            <label for="titulo">Precio</label>
            <input type="number" id="price" name="price">

            <br>

            <?php if (isset($error)): ?>

                <p class="error"><?php echo $error; ?></p>

            <?php endif ?>

            <input type="submit" class="submit" value="Subir Foto">

            </form>

        </div>

        <header>

        <div class="contenedor">

            <h1 class="titulo"></h1>

        </div>

        </header>

        <div class="contenedor">

            <div class="fotos">

                <a href="../html/index.html" class="regresar"> Regregar</a>

            </div>

        </div>

    </body>

</html>