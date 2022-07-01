<?php
if(isset($_SESSION['login']))
{
  require("db_conn.php");

  $login = $_SESSION['login'];
  $sql = "SELECT post_id, title, date, category FROM user INNER JOIN post ON user.user_id=post.user_id INNER JOIN category ON post.category_id=category.category_id WHERE username='".$login."' ORDER BY date DESC";
  $result = mysqli_query($mysqli, $sql);
  echo <<< ADDPOST
  <br/><form method="get" action="post_add.php">
  <fieldset>
    <input type="submit" value="Dodaj post" name="add"><br/>
    <a href='pass_change.php'>Zmień hasło</a>
  </fieldset>
  </form>
ADDPOST;
  echo "<h1>Twoje posty:</h1>";
  if (mysqli_num_rows($result) > 0)
  {
      echo "<table>";
      while($row = mysqli_fetch_assoc($result))
      {
          echo "<tr><td>".$row["post_id"]."</td><td>".$row["title"]."</td><td>".$row["date"]."</td><td>".$row["category"]."</td><td><a href='post_edition.php?id=".$row["post_id"]."'>Edytuj </a><a href='script/delete_post.php?id=".$row["post_id"]."'>Usuń</a></td></tr>";
      }
      echo "</table>";
  }
  else
  {
      echo "Nic nie znaleziono";
  }

  mysqli_close($mysqli);
}

?>
