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
      echo'<h3>Saldo:' . $saldo . '$</h3>';
    }

echo'
  <div class="row">
  ';

while ($f=mysqli_fetch_array($sql2))
{
  echo'
      <div class="producto col-12 col-md-3 offset-md-1">
        <br>
        <div class="card" style="width: 18rem;">
          <img src="images/' . $f['img'] . '" class="card-img-top" width="286px" height="190px" alt="Upps, no se ha encontrado la imágen">
          <div class="card-body">
            <h5 class="card-title">' . $f['name'] . '</h5>
            <p class="card-text">' . $f['description'] . '</p>
            <p style="color: green; name="price">$' . $f['price'] . '</p>
            <a href="detalles.php?id='.$f['code'].'" data-transition="slide" class="btn btn-secondary" style="color: white">Ver más</a>
            <p class="card-text" name="stock">stock:' . $f['stock'] . '</p>
            ';
            if($loggedin){
              echo'
              <input type="number" name="cantidad" placeholder="Cantidad">'
              .$f["button"].'
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
    
  <!-- js bootstrap and jquery -->
  <script src="../js/jquery-3.4.1.js"></script>
  <script src="../js/popper.js"></script>
  <script src="../js/bootstrap.js"></script>

</body>
</html>

';

mysqli_close( $connection );

?>