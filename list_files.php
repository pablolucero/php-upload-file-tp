<html>
<head>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
          integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <!-- Optional theme -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css"
          integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Latest compiled and minified JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"
            integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
            crossorigin="anonymous"></script>

    <title>Lista de archivos</title>
</head>
<body>
<div class="container">

    <h2>Archivos subidos</h2>
    <?php

    $target_dir = "uploads/"; // specifies the directory where the files are placed

    clearstatcache();  // Limpia la caché de estado de un archivo

    $archivos = scandir($target_dir);
    foreach ($archivos as $nombre) {
        if ($nombre == '.' || $nombre == '..') {
            continue;
        } else {
            echo "<li><a href=\"$target_dir/$nombre\">$nombre</a></li>"; // Armamos el link para la descarga
        }
    }
    ?>
</div>
</body>
</html>