<html>
    <head>
        <meta charset="utf-8">
        <title>Detalle de la Publicacion</title>
        <link rel="icon" type="image/png" href="img/logo.png">
        <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">
    </head>
    <body>
        <div class="container mb-5 py-2">
            <h1>Detalle de Publicacion</h1>
            <?php
            require_once ('php/conexion.php');
            $result = $mysqli->query("select titulo,contenido,imagen, DATE_FORMAT(fecha, '%d/%m/%y') AS fecha from publicaciones where id=" .$_GET["codigo"]);
            $row = $result->fetch_array(MYSQLI_ASSOC)
            ?>
            <div class="row">
                <div class="col-3">
                    <img class="card-img-top" src="imagenes_publicaciones/<?php echo $row['imagen'] ?>">
                </div>
                <div class="col-9 text-primary">
                    <h2>
                        <?php echo $row['titulo'] ?>
                    </h2>
                </div>
                <div class="col-12 text-info">
                    <h3>
                        <?php echo $row['fecha'] ?>
                    </h3>
                </div>
                <div class="col-12">
                    <h3>
                        <?php echo $row['contenido']?>
                    </h3>
                </div>
            </div>
        </div>
    </body>
</html>