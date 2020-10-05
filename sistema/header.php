<?php
require "vendor/autoload.php";

session_start();
echo <<<_INIT
<!DOCTYPE html>
<html>
    <head>
        <meta charset='utf-8'>
        <meta name='viewport' content='width=device-width,
        initial-scale=1'>
        <link rel='stylesheet' href='styleweb.css' type='text/css'>

        <!-- style.css -->
        <link rel="stylesheet" href="shopstyle.css">

        <script src='javascript.js'></script>

        <script src='node_modules/jquery/dist/jquery.min.js'></script>
        <script src='node_modules/jquery-mobile/js/jquery.mobile.js'></script>
        <script type="text/javascript" src="vendor/twbs/bootstrap/dist/js/bootstrap.min.js"></script>
        <link href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
        <link rel='stylesheet' href='styles.css' type='text/css'>
        <script src='javascript.js'></script>
_INIT;
    require_once 'functions.php';
    $userstr = 'Welcome Guest';
    if (isset($_SESSION['user'])) {
        $user     = $_SESSION['user'];
        $loggedin = TRUE;
        $userstr  = "Sesión: $user";
    }
    else $loggedin = FALSE;

echo <<<_MAIN
        <title>Tienda. $userstr</title>
    </head>
    <body>
        <div data-role='page'>
            <div data-role='header'>
                <div id='logo' class='center' style='background-color: sienna;'>
                Tienda de Atigüedades</div>
                <div class= 'username'>$userstr</div>
            </div>
            <div data-role='content'>
_MAIN;
    if ($loggedin) {
echo <<<_LOGGEDIN
        <nav class='navbar navbar-expand-lg navbar-dark bg-dark'>
            <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbarSupportedContent' aria-controls='navbarSupportedContent' aria-expanded='false' aria-label='Toggle navigation'>
                <span class='navbar-toggler-icon'></span>
            </button>
            <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                <ul class='navbar-nav mr-auto'>
                    <li class='nav-item'>
                        <a class='nav-link' data-transition='slide' href='Shop.php'>Tienda</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' data-transition='slide' href='members.php?view=$user'>Perfil</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' data-transition='slide' href='logout.php'>Salir</a>
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
            <div class='collapse navbar-collapse' id='navbarSupportedContent'>
                <ul class='navbar-nav mr-auto'>
                    <li class='nav-item'>
                        <a class='nav-link' data-transition='slide' href='Shop.php'>Inicio</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' data-transition='slide' href='login.php'>Iniciar sesión</a>
                    </li>
                    <li class='nav-item'>
                        <a class='nav-link' data-transition='slide' href='signup.php'>Regístrate</a>
                    </li>
                </ul>
            </div>
        </nav>
        <p class='info'>(Debes tener una cuenta para usar esta app)</p>
    _GUEST;
      }
    ?>