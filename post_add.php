<!--
Grzegorz Jaskuła 4E
Materiały stworzone w ramach projektu na przemdiot "Pracownia Aplikacji Internetowych".
Wszelkie zawarte tu materiały stworzono lub pozyskano w celach edukacyjnych.
Kopiowanie, powielanie i udostępnianie bez zgody pisemnej zabronione.
Do wglądu tylko przez osoby sprawdzajace.
!-->
<!DOCTYPE html>
<html>
<head>
	<title>Edycja postu</title>
	<meta charset="utf-8">
	<meta name="author" content="Grzegorz Jaskuła">
	<meta name="description" content="Strona stworzona w ramach porjekut na przedmiot 'Pracownia Aplikacji Internetowych'. Wszelkie zawarte tu treśc umieszczone zostały w celach edukacyjnych.">
	<meta name="keywords" content="PAI">
	<link rel="icon" href="photo/oberkommando_logo.png">
	<link rel="stylesheet" href="style/main.css">
</head>
<body>
	<div id="container">
		<?php include "header.html" ?>
		<?php require "script/login.php" ?>
		<section id="content">
			<form method="post">
			<fieldset><legend>Dane postu</legend>
				<input type="text" name="title" placeholder="Tytuł"><br/>
        <textarea name="content" rows="8" cols="80" placeholder="Treść"></textarea>
				<select name="category">
					<?php include "script/generate_cats.php" ?>
				</select><br/>
				<input type="submit" name="enter" value="Zatwierdź">
				</fieldset>
        <?php
        if(isset($_POST["enter"]))
        {
          if(isset($_GET["add"]))
          {
            require("script/db_conn.php");

            $title = mysqli_real_escape_string($mysqli, htmlspecialchars($_POST["title"]));
            $content = mysqli_real_escape_string($mysqli, htmlspecialchars($_POST["content"]));
            $category = mysqli_real_escape_string($mysqli, htmlspecialchars($_POST["category"]));
            @$login = $_SESSION["login"];
            $user_id;

            $sql = "SELECT user_id FROM user WHERE username='$login'";
            @$result = mysqli_query($mysqli, $sql);

            if (mysqli_num_rows($result) > 0)
            {
                while($row = mysqli_fetch_assoc($result))
                {
                  $user_id = $row["user_id"];
                }
            }

            /*echo $title;
            echo $content;
            echo $category;
            echo $user_id;*/

            @$sql = "INSERT INTO post (title, content, category_id, user_id) VALUES ('$title', '$content', $category, $user_id)";
            if (mysqli_query($mysqli, $sql))
            {
                echo "Dodano post";
            } else {
                echo "Wystąpił błąd";
            }

            mysqli_close($mysqli);
						header("location: profile.php");
          }
        }
         ?>
			</form>
		</section>
		<footer>
			<?php include "footer.html"?>
		</footer>
	</div>
</body>
</html>
