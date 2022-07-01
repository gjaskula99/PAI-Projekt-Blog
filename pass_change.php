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
	<title>Zmień hasło</title>
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
		<?php require "script/login.php" ?>
		<section id="content">
      <form method="post">
			<fieldset><legend>Zmień hasło</legend>
        <input type="password" name="passc" placeholder="Podaj aktualne hasło"><br/>
        <input type="password" name="pass1" placeholder="Podaj nowe hasło"><br/>
        <input type="password" name="pass2" placeholder="Powtórz nowe hasło"><br/>
        <div class="g-recaptcha" data-sitekey="6LcxinoUAAAAAKW8NlWtz2GK8jzlcyoqYNP-km8i"></div>
				<input type="submit" name="button" value="Zmień">
				</fieldset>
			</form>
      <?php
      if(isset($_POST["button"]))
      {
          require("script/db_conn.php");
          require("script/captcha.php"); //Wykomentować na LOCALHOST

          @$username = $_SESSION["login"];

          $sql = "SELECT password FROM user WHERE username='$username'";
          if($result = mysqli_query($mysqli, $sql))
          {
            $row = mysqli_fetch_assoc($result);
            $pass_c = $row["password"];
            if($pass_c != md5($_POST["passc"]))
            {
              echo "<p class='error'>Obecne hasło się nie zgadza</p>";
              exit();
            }
            else if($_POST["pass1"]==$_POST["pass2"]) $password = mysqli_real_escape_string($mysqli, $_POST["pass2"]);
            else
            {
              echo "<p class='error'>Podane hasła nie są zgodne</p>";
              exit();
            }

            $sql = "UPDATE user SET password=md5('$password') WHERE username='$username'";
            if(mysqli_query($mysqli, $sql))
            {
              echo "Hasło zostało zmienione.";
            }
            else
            {
              echo "Coś się zepsuło.";
              //echo "<br/>".mysqli_error($mysqli);
            }
          }

          mysqli_close($mysqli);
      }
      ?>
		</section>
		<footer>
			<?php include "footer.html"?>
		</footer>
	</div>
</body>
</html>
