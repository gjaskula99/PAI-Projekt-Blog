<?php

session_start();

require("db_conn.php");


/*-----------------------------------------------------------------*/
if (isset($_POST['button_login']))
{
   $login = mysqli_real_escape_string($mysqli, $_POST['login']);
   $password = mysqli_real_escape_string($mysqli, $_POST['pass']);
   //require("captcha.php"); //Wykomentować na LOCALHOST
   //DB
   if ($stmt = $mysqli->prepare("SELECT password, username, active FROM user WHERE username=?"))
   {
     $stmt->bind_param("s", $login);
     $stmt->execute();
     $stmt->bind_result($pass, $username, $active);
     $stmt->fetch();
     //printf("Password for user %s is %s\n", $username, $pass);
     $stmt->close();
     if(md5($password)==$pass && $login==$username && $active==1)
     {
       $_SESSION['is_logged'] = true;
       $_SESSION['login'] = $login;
       header("Refresh:0");
     }
     else if($active==0 && $login==$username) echo "<p class='error'>Twoje konto nie zostało jeszcze aktywowane.<br/>Sprawdź adres email podany przy rejestracji.</p>";
     else echo "<p class='error'>Błędna nazwa użytkownika lub hasło</p>";
     mysqli_close($mysqli);
    }
   /*if (mysqli_num_rows(mysqli_query($mysqli,"SELECT username, password FROM user WHERE username = '".$login."' AND password = '".md5($password)."';")) > 0)
   {
	//Ustawienia sesji
      $_SESSION['is_logged'] = true;
      $_SESSION['login'] = $login;
   }*/

}


if(isset($_POST['button_logout']))
{
	if(isset($_SESSION['is_logged']))
	{
		unset($_SESSION['is_logged']);
	}
	session_destroy();
  header("Refresh:0");
}


if(@isset($_SESSION['is_logged']))
{
	print '<fieldset><form method="post"><p style="text-align: center;">Zalogowano jako: '.$_SESSION['login']."</p><input type='submit' name='button_logout' value='Wyloguj'></form></fieldset>";
}
else
{
	//echo $_SERVER['PHP_SELF'];
	if($_SERVER['PHP_SELF']=="/PAI_szyper/profile.php")
	{
		echo <<< LOGIN
	<fieldset><legend>Logowanie</legend>
			<form method="POST">
				Login: <input type="text" name="login"><br>
				Hasło:<input type="password" name="pass"><br>
        <div class="g-recaptcha" data-sitekey="6LcxinoUAAAAAKW8NlWtz2GK8jzlcyoqYNP-km8i"></div>
				<input type="submit" value="Zaloguj" name="button_login"><br/>
				<a href="pass_forgot.php">Zapomniałem hasła :(</a><br/>
				<a href="register.php">Zarejestruj się</a>
			</form></fieldset>
LOGIN;
	}
}

?>
