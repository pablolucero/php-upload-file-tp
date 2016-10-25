<html>
<head>
    <title>Alta de usuario</title>
</head>
<body>
<?php
$conexion = mysqli_connect("localhost", "root", "", "usuarios")
or die("Problemas en la conexion");


$nombre = $_REQUEST['nombre'];
$password = $_REQUEST['password'];


mysqli_query($conexion, "insert into users(nombre, password) values ('$nombre','$password')")
            or die("Problemas en el select" . mysqli_error($conexion));
mysqli_close($conexion);
echo "El usuario fue dado de alta.";
?>
</body>
</html>