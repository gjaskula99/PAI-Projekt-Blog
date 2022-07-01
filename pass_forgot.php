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
	<title>Odzyskiwanie hasła</title>
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
			<fieldset><legend>Przypomnieć hasło?</legend>
        <input type="text" name="login" placeholder="Podaj login">
        <div class="g-recaptcha" data-sitekey="6LcxinoUAAAAAKW8NlWtz2GK8jzlcyoqYNP-km8i"></div>
				<input type="submit" name="button" value="Ładnie proszę">
				</fieldset>
			</form>
      <?php
        if((isset($_SESSION["login"])))
        {
          header("location: profile.php");
        }

        if(isset($_POST["login"]))
        {
          require("script/db_conn.php");
          //require("script/captcha.php"); //Wykomentować na LOCALHOST
          $username = mysqli_real_escape_string($mysqli, $_POST["login"]);
          $sql = "SELECT username, email FROM user WHERE username='$username'";
          $result = mysqli_query($mysqli, $sql);

      		if (@mysqli_num_rows($result) > 0)
      		{
      				$row = mysqli_fetch_assoc($result);
              $username = $row["username"];
              $email = $row["email"];
              $pass = generateRandomString();
              //echo $pass;

              //To nie działa, bo CBA odrzuca adres.
              $sql = "UPDATE user SET password=md5('$pass') WHERE username='$username'";
              $result = mysqli_query($mysqli, $sql);

							//ini_set('SMTP', 'mail.CBA.pl');
							//ini_set('smtp_port', 25);
              $subject = 'Resetowanie hasła';
              $message = "Ktoś poprosił o zresetowanie hasła do Twojego konta. Nowe hasło to $pass .";
							$headers = 'From: noreply @ projektzpracowniwitryn.cba.pl';
              @mail($email,$subject,$message,$headers);
              echo "Na twój adres e-mail: $email wysłano wiadomość z nowym hasłem.";
      		}
      		else
      		{
      				echo "Coś się... coś się zepsuło";
      		}
          mysqli_close($mysqli);
        }

        function generateRandomString($length = 10)
        {
          $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
          $charactersLength = strlen($characters);
          $randomString = '';
          for ($i = 0; $i < $length; $i++)
          {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
          }
          return $randomString;
        }
      ?>
		</section>
		<footer>
			<?php include "footer.html"?>
		</footer>
	</div>
</body>
</html>
