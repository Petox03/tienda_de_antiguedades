<?php
require_once 'header.php';
if (!$loggedin) die("</div></body></html>");
echo "<h3>Your Profile</h3>";

showProfile($user);

echo <<<_END
      <form data-ajax='false' method='post'
        action='saldo.php' enctype='multipart/form-data'>
      <h3>Ingresa la cantidad a añadir</h3>
      <input name="dinero" value="0" type="number" required><br>
      <input type='submit' value='Save Profile'>
      </form>
    </div><br>
    </body>
</html>
_END;

if(isset($_POST['dinero']))
{
    $sql = mysqli_query($connection, "SELECT * FROM members WHERE user = '$user'");
    $f = mysqli_fetch_array($sql);

    $saldo = $f['money'];

    $saldo += $_POST['dinero'];
    $sql2 = mysqli_query($connection, "UPDATE members SET money = '$saldo' WHERE user = '$user'") or die("Upps, parece que algo ha ido mal <br>Intente más tarde");

    echo'
        <center>
            <h2>
                Saldo añadido correctamente.
                <br>
                Saldo agregado:'.$_POST['dinero'].'
                <br>
                Su saldo actual es: '.$saldo.'
            </h2>
        </center>
    ';
}

mysqli_close( $connection );

?>