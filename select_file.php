<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>

    <title>Archivos</title>
</head>
<body>
<div class="container">

    <form action="upload.php" method="post" enctype="multipart/form-data">
        <br>
        <div class="form-group">
            <label for="fileToUpload">Seleccione el archivo a subir:</label>
            <input type="file" name="fileToUpload" id="fileToUpload">
        </div>
        <br>
        <input type="submit" name="submit" value="Subir" class="btn btn-default">
    </form>
</div>
</body>
</html>