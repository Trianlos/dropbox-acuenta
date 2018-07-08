    <?php
    error_reporting(0);
    session_start();
    $con = new mysqli("localhost", "root", "", "testeando");
    if ($con->connect_errno)
    {
        echo "Fallo al conectar a MySQL: (" . $con->connect_errno . ") " . $con->connect_error;
        exit();
    }
    //Valida que los campos de usuario y contraseña tengan datos para su validacion
    @mysqli_query($con, "SET NAMES 'utf8'");
    $user = strtolower(mysqli_real_escape_string($con, $_POST['user']));
    $pass = mysqli_real_escape_string($con, $_POST['pass']);
    if ($user == null || $pass == null)
    {
        echo '<span>Por favor complete todos los campos.</span>';
    }
    else
    {
        $consulta = mysqli_query($con, "SELECT name, pass FROM users WHERE name = '$user' AND pass = '$pass'");
        if (mysqli_num_rows($consulta) > 0)
        {
            $_SESSION["user"] = $user;
            echo '<script>location.href = "panel.php"</script>';
        }
        else
        {
            echo '<span>El usuario y/o clave son incorrectas, vuelva a intentarlo.</span>';
        }
    }   
    ?>