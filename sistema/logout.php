    <?php
        require_once 'header.php';

        if (isset($_SESSION['user']))
        {
            destroySession();
            echo "<br><div class='center'>Usted ha cerrado su sesión. Por favor
                <a data-transition='slide' href='index.php'> haga click aquí </a>
                para recargar la página.</div>";
        }
        else echo "<div class='center'>Usted no puede cerrar sesión
        por que no tiene una sesión activa.</div>"
    ?>
        </div>
    </body>
</html>
