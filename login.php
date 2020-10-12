<?php
require_once 'header.php';

$error = "";

if(!$loggedin)
{

    if (isset($_POST['user']))
    {
        $user = sanitizeString ($_POST['user']);
        $pass = sanitizeString($_POST['pass']);

        if($user == "" || $pass == "")
            $error = 'Falta algún dato';
        else
        {
            $result = queryMySQL("SELECT user, pass from members
            WHERE user = '$user' AND pass = '$pass'");

            if ($result->num_rows == 0)
            {
                $error = "cuenta y/o contraseña inválida";
            }
            else
            {
                $_SESSION['user'] = $user;
                $_SESSION['pass'] = $pass;
                die("
                <div class='check'>
                    <meta http-equiv='Refresh' content='3;url=index.php'>
                    <h1 class='animate__animated animate__zoomIn animate__faster'>Haz iniciado sesión correctamente, serás redirigido en breve, sino<h1>
                    <a href='shop.php' class='linkC'><h1 class='animate__animated animate__zoomIn animate__faster'>haz click aquí</h1</a>
                </div>
                </div></body></html>");
            }
            mysqli_free_result($result);
        }
    }

echo<<<_login
<div class="container-fluid">

    <div class="row accessform-container">
        <div class="col-12 col-md-4 mb-5 accessform animate__animated animate__zoomIn animate__faster">
            <h3 class="accessform-title">INICIA SESIÓN </h3>
            <h4 class="error animate__animated animate__shakeX animate__fast">$error</h4>
            <form action="login.php" method="POST">
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label class="ml-1" for="usuario">Usuario</label>
                        <input type="text" class="form-control" name="user" id="usuario" aria-describedby="usuario"
                            placeholder="Usuario" required>
                    </div>
                    <div class="form-group col-md-12">
                        <label class="ml-1" for="contraseña">Contraseña</label>
                        <input type="password" class="form-control" name="pass" id="contraseña" placeholder="Contraseña"
                            required>
                    </div>
                </div>
                <button type="submit" class="btn btn-color">Iniciar sesión</button>
            </form>
        </div>
    </div>

</div>

</body>
_login;

}

?>

</html>