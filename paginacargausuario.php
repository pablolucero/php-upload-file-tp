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

    <title>Alta de usuario</title>
</head>
<body>
<div class="container">

    <?php
    $conexion = mysqli_connect("localhost", "root", "", "usuarios")
    or die("Problemas en la conexion");


    $nombre = $_REQUEST['nombre'];
    $password = $_REQUEST['password'];


    mysqli_query($conexion, "insert into users(nombre, password) values ('$nombre','$password')")
    or die("Problemas en el select" . mysqli_error($conexion));
    mysqli_close($conexion);
    echo "<h3>El usuario fue dado de alta.</h3><br>";
    ?>
    <a href="login.php" class="btn btn-default">Login</a>
    <a href="alta_usuario.php" class="btn btn-default">Alta de usuarios</a>
</div>
</body>
</html>