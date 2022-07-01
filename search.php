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
	<title>Wyszukaj</title>
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
			<form method="get">
			<fieldset><legend>Wyszukiwanie</legend>
				<input type="text" name="word"><br/>
				<select name="category">
					<?php include "script/generate_cats.php" ?>
				</select><br/>
				<input type="submit" name="button" value="Szukaj">
				</fieldset>
			</form>
			<?php include "script/post_search.php" ?>
		</section>
		<footer>
			<?php include "footer.html"?>
		</footer>
	</div>
</body>
</html>
