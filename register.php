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
	<title>Rejestracja</title>
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
		<?php require "script/function.php" ?>
		<section id="content">
      <form method="post">
			<fieldset><legend>Rejestracja</legend>
        <input type="text" name="login" placeholder="Podaj login"><br/>
        <input type="password" name="pass1" placeholder="Podaj hasło"><br/>
        <input type="password" name="pass2" placeholder="Powtórz hasło"><br/>
        <input type="email" name="email" placeholder="Podaj adres e-mail"><br/>
        <label for="rodo">Zgadzam się na RODO</label><input type="checkbox" name="rodo" required><a href="rodo.html" target="_blank">A co to jest RODO?</a><br/>
        <div class="g-recaptcha" data-sitekey="6LcxinoUAAAAAKW8NlWtz2GK8jzlcyoqYNP-km8i"></div>
				<input type="submit" name="button" value="Zarejestruj się">
				</fieldset>
			</form>
      <?php
      if(isset($_POST["button"]))
      {
        if(!isset($_POST["rodo"]))
        {
          echo "<p class='error'>Nie zgodziłeś się na RODO. Unia Europejska nie pozwala Ci kontynuować. Możesz wnieść skargę do Brukseli lub zaznaczyć ten fajny kwadracik pozwalający nam sprzedawać Twoje dane amerykańskiemu wywiadowi, Google'owi i innym zachodnim imperialistom.</p>";
        }
        else
        {
          require("script/db_conn.php");
          //require("script/captcha.php"); //Wykomentować na LOCALHOST

          $username = mysqli_real_escape_string($mysqli, $_POST["login"]);
					$username = filter($username);
          if($_POST["pass1"]==$_POST["pass2"]) $password = mysqli_real_escape_string($mysqli, $_POST["pass2"]);
          else
          {
            echo "<p class='error'>Podane hasła nie są zgodne</p>";
            exit();
          }
          $email = mysqli_real_escape_string($mysqli, $_POST["email"]);
					$email = filter($email);
					if(!FILTER_VAR($email, FILTER_VALIDATE_EMAIL))
					{
						echo "<p class='error'>Podany email jest nieprawidłowy</p>";
						exit();
					}
					$password = filter($password);

          $sql = "INSERT INTO user (username, password, email, active) VALUES ('$username', md5('$password'), '$email', 0)";
          if(mysqli_query($mysqli, $sql))
          {
						$sql = "SELECT user_id FROM user WHERE username='$username'";
						$result = mysqli_query($mysqli, $sql);
						$row = mysqli_fetch_assoc($result);
						$id = $row["user_id"];
						//ini_set('SMTP', 'mail.CBA.pl');
						//ini_set('smtp_port', 25);
						$subject = 'Aktywacja konta';
						$message = "Aby aktywować konto przejdź na http://projektzpracowniwitryn.cba.pl/activate.php?id=$id";
						$headers = 'From: noreply @ projektzpracowniwitryn.cba.pl';
						@mail($email,$subject,$message,$headers);
            echo "Hura. Udało Ci się! Na twój adres $email wysłaliśmy link aktywacyjny do konta.";
          }
          else
          {
            echo "Coś się zepsuło. Spróbuj ponownie później. W tym czasie możesz np. przeczytać RODO.";
            //echo "<br/>".mysqli_error($mysqli);
          }

          mysqli_close($mysqli);
        }
      }
      ?>
		</section>
		<footer>
			<?php include "footer.html"?>
		</footer>
	</div>
</body>
</html>
