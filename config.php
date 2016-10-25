<?//
////archivo de configuracion, inicializacion de conexion a BD y funciones comunes a todo el sistema
//$link = mysqli_connect("localhost", "root", "", "usuarios") or die("No se puede conectar");
//
////inicializamos la sesion
//session_start();
//
////limpia el valor para que pueda ser ingresado de manera segura en la BD
////acepta arrays
//function str_mysql_in($value)
//{
//    if (is_array($value)) {
//        foreach ($value as $k => $v) {
//            $value[$k] = str_mysql_in($v);
//        }
//    } else {
//        $value = trim($value);
//        $value = stripslashes($value);
//        $value = htmlentities($value, ENT_QUOTES, 'ISO-8859-1');
//        $value = str_replace(
//            array("|", "^", "%", '--', '$', '*'), array("&#124;", "&#94;", "&#37;", '&#45;&#45;', '&#36;', '&#42;'), $value);
//
//        if (!is_numeric($value))
//            $value = mysqli::real_escape_string($value);
//    }
//
//    return $value;
//}

