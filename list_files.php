<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>

    <title>Lista de archivos</title>
</head>
<body>
<div class="container">

    <h2>Archivos subidos</h2>
    <?php

    $target_dir = "uploads/"; // specifies the directory where the files are placed

    clearstatcache();  // Limpia la caché de estado de un archivo

    $archivos = scandir($target_dir);

    // chequeo si hay al menos 3 porque los primeros 2 items del array son el . y el ..
    if (count($archivos) < 3) {
        echo "<br>";
        echo "<h4>No hay archivos subidos</h4>";
    } else {
        foreach ($archivos as $nombre) {
            if ($nombre == '.' || $nombre == '..') {
                continue;
            } else {
                echo "<li><a href=\"$target_dir/$nombre\">$nombre</a></li>"; // Armamos el link para la descarga
            }
        }
    }

    ?>
    <br>
    <a href="select_file.php" class="btn btn-default">Subir archivo</a>
</div>
</body>
</html>