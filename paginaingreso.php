<html>
<head>
    <title>Bienvenido</title>
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
</head>
<body>
<div class="container">
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
                echo "<h4>Has sido logueado correctamente " . $_SESSION['s_username'] . "</h4>";
            }
        }
    }

    ?>
    <form>
        <br>
        <a href="select_file.php" class="btn btn-default">Continuar</a>
    </form>
</div>
</body>
</html>