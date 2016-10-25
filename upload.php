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


    // si ya existe un archivo con el mismo nombre le agrego un numero al final
    $i = 1;
    while (file_exists($target_dir . $actual_name . "." . $extension)) {
        $actual_name = (string)$original_name . '(' . $i . ')';
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