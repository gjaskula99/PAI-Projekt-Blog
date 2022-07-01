<?php
    @session_start();
    require("db_conn.php");

    $id = $_GET["id"];

    $sql = "SELECT username FROM user INNER JOIN post ON user.user_id=post.user_id WHERE post_id=$id";
    $result = mysqli_query($mysqli, $sql);
    $user;
    $login = $_SESSION["login"];

    if (mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
          $user = $row["username"];
          //echo $user;
          //echo $login;
        }
    }



    if (!isset($_SESSION["is_logged"]) || $user != $login)
    {
      echo "Inny właściciel postu";
      header("location: ../profile.php");
      exit();
    }

    mysqli_close($mysqli);
 ?>
