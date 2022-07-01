<?php
if(isset($_GET["button"]))
{
  if(empty($_GET["word"]))
  {
    echo "<p class='error'>Najpierw podaj czego szukasz</p>";
  }
  else
  {
    require("db_conn.php");

    $keyword =  mysqli_real_escape_string($mysqli, $_GET["word"]);
    $category =  mysqli_real_escape_string($mysqli, $_GET["category"]);

    $sql = "SELECT title, content, date, username, category FROM user INNER JOIN post ON user.user_id=post.user_id INNER JOIN category ON post.category_id=category.category_id WHERE title LIKE '%". $keyword ."%' AND category.category_id=". $category ." ORDER BY date DESC";
    $result = mysqli_query($mysqli, $sql);

    if (mysqli_num_rows($result) > 0)
    {
        while($row = mysqli_fetch_assoc($result))
        {
            //echo "Tytuł: " . $row["title"]. " - Treść: " . $row["content"]. " " . $row["date"]." ". $row["username"]. " ". $row["category"]. "<br>";
            echo "<article class='post'><h1>" . $row["title"]. "</h1><p>" . $row["content"]. "</p><p class='author'>" . $row["date"].", ". $row["username"]. ", ". $row["category"]. "</article>";
        }
    }
    else
    {
        echo "Nic nie znaleziono";
    }

    mysqli_close($mysqli);
  }
}
?>
