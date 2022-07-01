<?php
$mysqli = @mysqli_connect('127.0.0.1', 'root', '2137');

if (mysqli_connect_errno()) {
    printf("<p class='error'>Błąd logowania </p>");
    exit();
}

mysqli_set_charset ($mysqli, "utf8mb4");
mysqli_select_db($mysqli, "pai_db");
 ?>
