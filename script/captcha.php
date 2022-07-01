<?php
//CAPTCHA
$secretkey = "2137";
$responekey = $_POST["g-recaptcha-response"];
$ip = $_SERVER["REMOTE_ADDR"];

$url = "https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$responekey&remoteip=$ip";
$response = file_get_contents($url);
//echo $response;
$response = json_decode($response);

if($response->success)
{
  echo "Gratulacje. Nie jesteś robotem<br/>";
 }
else
{
  echo "Potwierdź, że nie jesteś robotem!<br/>";
  exit();
}
  ?>
