<?php
require_once "header.php";

if($loggedin)
{
  //consulta de members
  $sql = mysqli_query($connection, "SELECT * FROM members WHERE user = '".$user."'");

  //Confirmación y ejecución de sentencia
    $colnum = mysqli_num_rows($sql);

      //Saber que columna está la sentencia sql
    $columna = mysqli_fetch_array($sql);

    $saldo = $columna["money"];
}

  //consulta de productos
  $sql2 = mysqli_query($connection, "SELECT * FROM products") or die(mysqli_error($connection));


echo'
    <div class="container-fluid">';

    if($loggedin)
    {
        echo'<h3 class="animate__animated animate__lightSpeedInLeft animate__fast">Saldo: <span class="money" style="display:inline-block;"><h3>' . $saldo . '</h3></span>$</h3>';
    }

echo'
        <div class="row producto">
    ';

while ($f=mysqli_fetch_array($sql2))
{
    echo'
        <div class="col-12 col-md-3 mb-5 animate__animated animate__flipInX animate__fast">
        <br>
        <div class="card" style="width: 18rem;">
            <img src="images/' . $f['img'] . '" class="card-img-top" width="286px" height="190px" alt="Upps, no se ha encontrado la imágen">
            <div class="card-body animate__animated animate__fadeIn animate__slow">
                <h5 class="card-title">' . $f['name'] . '</h5>
                <p class="card-text">' . $f['description'] . '</p>
                <p style="color: green; name="price">$' . $f['price'] . '</p>
                <a href="detalles.php?id='.$f['code'].'" data-transition="slide" class="btn btn-secondary" style="color: white">Ver más</a>
                <p class="card-text" name="stock">stock:' . $f['stock'] . '</p>
                ';
                if($loggedin){
                    echo'
                    <a href="compra.php?idcompra='.$f['code'].'" type="button" class="btn btn-color">Compra ahora!</a>
                    ';
                }
            echo'
            </div>
        </div>
    </div>
    ';
}

echo'

        </div>
    </div>
</body>
</html>

';

mysqli_close( $connection );

?>