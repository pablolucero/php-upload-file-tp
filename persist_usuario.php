<html>
<head>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.min.js"></script>

    <title>Alta de usuario</title>
</head>
<body>
<div class="container">

    <?php
    $conexion = mysqli_connect("localhost", "root", "", "usuarios")
    or die("Problemas en la conexion");

    $username = $_REQUEST['username'];
    $password = $_REQUEST['password'];
    $nombre = $_REQUEST['nombre'];
    $apellido = $_REQUEST['apellido'];

    if ($resultado = mysqli_query($conexion, "SELECT username FROM users WHERE username='$username'")) {
        if (mysqli_num_rows($resultado) > 0) {
            echo "<br>";
            echo "<h3>ERROR</h3>";
            echo "<h4>Ya existe un usuario con ese username.</h4>";
            mysqli_free_result($resultado);
        } else {
            mysqli_query($conexion, "INSERT INTO users(nombre, apellido, username, password) VALUES ('$nombre','$apellido','$username','$password')")
            or die("Problemas en el select" . mysqli_error($conexion));
            echo "<h3>El usuario fue dado de alta.</h3><br>";
        }
    };

    mysqli_close($conexion);

    ?>
    <a href="index.php" class="btn btn-default">Login</a>
    <a href="alta_usuario.php" class="btn btn-default">Alta de usuarios</a>

</div>
</body>
</html>