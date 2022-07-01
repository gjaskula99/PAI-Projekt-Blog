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
			<?php
			require("script/post_check_owner.php");
			require("script/get_post_data.php");
			echo <<< FORM
			<form method="post">
			<fieldset><legend>Dane postu</legend>
				<input type="text" name="title" placeholder="Tytuł" value="$title"><br/>
				<textarea name="content" rows="8" cols="80" placeholder="Treść">$content</textarea>
				<select name="category">
FORM;
		require("script/db_conn.php");

		$sql = "SELECT category_id, category FROM category ORDER BY category_id";
		$result = mysqli_query($mysqli, $sql);

		if (mysqli_num_rows($result) > 0)
		{
				while($row = mysqli_fetch_assoc($result))
				{
					if($category==$row["category_id"]) echo "<option selected value=".$row["category_id"].">".$row['category']."</option>";
					else echo "<option value=".$row["category_id"].">".$row['category']."</option>";
				}
		}
		else
		{
				echo "Nic nie znaleziono";
		}

		mysqli_close($mysqli);
		echo <<< FORM_END
		</select><br/>
		<input type="submit" name="enter" value="Zatwierdź">
		</fieldset>
	</form>
FORM_END;

			if(isset($_POST["enter"]))
			{
				require("script/db_conn.php");

				$title = mysqli_real_escape_string($mysqli, htmlspecialchars($_POST["title"]));
				$content = mysqli_real_escape_string($mysqli, htmlspecialchars($_POST["content"]));
				$category_id = mysqli_real_escape_string($mysqli, htmlspecialchars($_POST["category"]));
				//echo $_POST["category"];

				$sql = "UPDATE post SET title='$title', content='$content', category_id=$category_id WHERE post_id=$id";
				if (mysqli_query($mysqli, $sql)) {
				    echo "Zaktualizowano post";
				} else {
				    echo "Wystąpił błąd";
				}

				mysqli_close($mysqli);

				header("location: profile.php");
			}
			 ?>

		</section>
		<footer>
			<?php include "footer.html"?>
		</footer>
	</div>
</body>
</html>
