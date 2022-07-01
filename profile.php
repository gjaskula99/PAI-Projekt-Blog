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
	<title>Profil</title>
	<meta charset="utf-8">
	<meta name="author" content="Grzegorz Jaskuła">
	<meta name="description" content="Strona stworzona w ramach porjekut na przedmiot 'Pracownia Aplikacji Internetowych'. Wszelkie zawarte tu treśc umieszczone zostały w celach edukacyjnych.">
	<meta name="keywords" content="PAI">
	<link rel="icon" href="photo/oberkommando_logo.png">
	<link rel="stylesheet" href="style/main.css">
	<script src='https://www.google.com/recaptcha/api.js'></script>
</head>
<body>
	<div id="container">
		<?php include "header.html" ?>
		<section id="content">
			<?php require "script/login.php" ?>
			<?php include "script/login_postlist.php" ?>
		</section>
		<footer>
			<?php include "footer.html"?>
		</footer>
	</div>
</body>
</html>
