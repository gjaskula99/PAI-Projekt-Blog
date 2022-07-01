<?php
  require("db_conn.php");

  $id = $_GET["id"];

  $title;
  $content;
  $category;

  $sql = "SELECT post_id, title, content, user_id, category_id FROM post WHERE post_id=".$id;
  $result = mysqli_query($mysqli, $sql);

  if (mysqli_num_rows($result) > 0)
  {
      while($row = mysqli_fetch_assoc($result))
      {
        $title = $row["title"];
        $content = $row["content"];
        $category = $row["category_id"];
      }
      //echo $title;
      //echo $content;
      //echo $category;
  }
  else
  {
      echo "Błąd";
  }

  mysqli_close($mysqli);
 ?>
