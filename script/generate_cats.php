<?php
  require("db_conn.php");

  $sql = "SELECT category_id, category FROM category ORDER BY category_id";
  $result = mysqli_query($mysqli, $sql);

  if (mysqli_num_rows($result) > 0)
  {
      while($row = mysqli_fetch_assoc($result))
      {
        echo "<option value=".$row["category_id"].">".$row['category']."</option>";
      }
  }
  else
  {
      echo "Nic nie znaleziono";
  }

  mysqli_close($mysqli);
 ?>
