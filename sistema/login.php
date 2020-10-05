<?php
    require_once 'header.php';
    $error = $user = $pass = "";

    if (isset($_POST['user']))
    {
        $user = sanitizeString ($_POST['user']);
        $pass = sanitizeString($_POST['pass']);

        if($user == "" || $pass == "")
            $error = 'Not all fields were entered';
        else
        {
            $result = queryMySQL("SELECT user, pass From members
            WHERE user = '$user' AND pass = '$pass'");

            if ($result->num_rows == 0)
            {
                $error = "Cuenta inválida";
            }
            else
            {
                $_SESSION['user'] = $user;
                $_SESSION['pass'] = $pass;
                die("<div class='center'>Usted ha iniciado sesión exitosamente.
                </div></div><body/></html>");
            }
        }
    }

    echo <<<_END
            <form method= 'post' action='login.php'>
                <div data-role='fieldcontain'>
                    <label></label>
                    <span class = 'error'>$error</span>
                </div>
                <div data-role-'fieldcontain'>
                    <label></label>
                    please enter your details to log in
                </div>
                <div data-role='fieldcontain'>
                    <label>Username</label>
                    <input type='text' maxlength='16' name='user' value='$user'>
                </div>
                <div data-role='fieldcontain'>
                    <label>Password</label>
                    <input type='password' maxlength='16' name='pass'
                </div>
                <br>
                <br>
                <div data-role='fieldcontain'>
                    <label></label>
                    <input data-transition='slide' type='submit' value='Iniciar sesión'>
                </div>
            </form>
        </div>
    </body>
</html>
_END;
?>

