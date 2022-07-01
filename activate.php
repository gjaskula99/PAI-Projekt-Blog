<?php
  if (isset($_GET["id"])) {
    $id = $_GET["id"];

    require("script/db_conn.php");
    $sql = "UPDATE user SET active=1 WHERE user_id=$id";
    if (mysqli_query($mysqli, $sql))
    {
      echo "Aktywacja powiodła się<br/>";
      echo "<a href='profile.php'>Zaloguj się</a>";
    }
    else
    {
      echo "Aktywacja nie powiodła się";
    }

    mysqli_close($mysqli);
  }
  else header("location: index.php");
 ?>
