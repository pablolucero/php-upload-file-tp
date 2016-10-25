<html>
<head>
    <title>Bienvenido</title>
</head>
<body>
<?php
session_start();
error_reporting(E_ALL & ~(E_NOTICE | E_WARNING));
$link = mysqli_connect("localhost", "root", "", "usuarios") or die("Problemas en la conexion");

if (!$_POST['nombre']) {
    echo "no ingreso nombre";
    header("Location: ./usuarioInvalido.php");
}
if (!$_POST['password']) {
    echo "no ingreso password";
    header("Location: ./usuarioInvalido.php");
}

if ($_POST['nombre']) {
    //Comprobacion del envio del nombre de usuario y password
    $username = $_POST['nombre'];
    $password = $_POST['password'];


    if ($password == NULL) {
        // echo "La password no fue enviada";
    } else {
        $query = mysqli_query($link, "SELECT nombre, password FROM users WHERE nombre = '$username'") or die(mysqli_error($link));
        $data = mysqli_fetch_array($query);

        if ($data['nombre'] != $username) {
            header("Location: ./usuarioIncorrecto.php");
        } else if ($data['password'] != $password) {
            header("Location: ./passwordIncorrecto.php");
        } else {
            $query = mysqli_query($link, "SELECT nombre, password FROM users WHERE nombre = '$username'") or die(mysqli_error($link));
            $row = mysqli_fetch_array($query);
            $_SESSION["s_username"] = $row['nombre'];
            echo "Has sido logueado correctamente " . $_SESSION['s_username'];
        }
    }
}

?>
<form>
    <br>
    <a href="tp/subirarchivo.php">Continuar</a>
</form>
</body>
</html>