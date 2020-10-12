<?php
require "vendor/autoload.php";

session_start();

require_once 'functions.php';
$userstr = 'Welcome Guest';
if (isset($_SESSION['user'])) {
    $user     = $_SESSION['user'];
    $loggedin = TRUE;
    $userstr  = "Sesión: $user";
    $sql = queryMysql("SELECT * FROM members WHERE user='$user'");
    $f = mysqli_fetch_array($sql);
    $id = $f['idaccess'];
}
else $loggedin = FALSE;

echo <<<_INIT
<!DOCTYPE html>
<html>
    <head>
        <link rel='shortcut icon' href='images/logo.png'>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width,
        initial-scale=1'>
        <script src='node_modules/jquery/dist/jquery.min.js'></script>
        <script type="text/javascript" src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="js/javascript.js"></script>
        <link href="node_modules/normalize.css/normalize.css" rel="stylesheet">
        <link href="node_modules/animate.css/animate.min.css" rel="stylesheet">
        <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel='stylesheet' href='css/styles.css' type='text/css'>
        <title>Tienda. $userstr</title>
    </head>
    <body>
_INIT;

if ($loggedin) {
echo <<<_LOGGEDIN
        <nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
            <img src='images/logo.png' id='icon'>
            <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
            </button>
            <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                <ul class='navbar-nav mr-auto'>
                    <li class='nav-item'>
                        <a class='nav-link a' href='shop.php'>Tienda</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link a' href='members.php?view=$user'>Perfil</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link a' href='logout.php'>Salir</a>
                    </li>
                </ul>
            </div>
        </nav>
    _LOGGEDIN;
    }
else {
echo <<<_GUEST
        <nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
            <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
            </button>
            <img src='images/logo.png' id='icon'>
            <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                <ul class='navbar-nav mr-auto'>
                    <li class='nav-item'>
                        <a class='nav-link a' href='Shop.php'>Inicio</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link a' href='login.php'>Iniciar sesión</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link a' href='singup.php'>Regístrate</a>
                    </li>
                </ul>
            </div>
        </nav>
    _GUEST;
}
echo <<<_MAIN
        <div data-role='page' class='mb-3'>
            <div data-role='header'>
                <div class= 'username'>$userstr</div>
            </div>
        </div>
    _MAIN;
if(!$loggedin)
{
    echo"
    <p class='info'>(Debes tener una cuenta para usar esta app)</p>
    ";
}

?>