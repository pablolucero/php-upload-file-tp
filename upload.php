<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>

    <title>Confirmacion subida</title>
</head>
<body>
<div class="container">

    <?php
    error_reporting(E_ALL & ~(E_NOTICE | E_WARNING));

    $name = basename($_FILES["fileToUpload"]["name"]);

    $actual_name = pathinfo($name, PATHINFO_FILENAME);
    $original_name = $actual_name;
    $extension = pathinfo($name, PATHINFO_EXTENSION);

    $target_dir = "uploads/"; // specifies the directory where the file is going to be placed

    $uploadOk = 1;
    $fileType = pathinfo($target_file, PATHINFO_EXTENSION); // holds the file extension of the file


    // si ya existe un archivo con el mismo username le agrego un numero al final
    $i = 1;
    while (file_exists($target_dir . $actual_name . "." . $extension)) {
        $actual_name = (string)$original_name . ' (' . $i . ')';
        $name = $actual_name . "." . $extension;
        $i++;
    }

    $target_file = $target_dir . $name; // specifies the path of the file to be uploaded


    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "<h2>Error. El archivo no fue subido.</h2>";
        // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "<h2>El archivo " . $name . " ha sido subido.</h2>";
        } else {
            echo "<h2>Disculpas, hubo un error subiendo el archivo.</h2>";
        }
    }

    ?>
    <br>
    <button onclick="history.back()" class="btn btn-default"> Volver</button>
    <a href="list_files.php" class="btn btn-default">Ver archivos subidos</a>
</div>
</body>
</html>