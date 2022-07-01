<?php
require("post_check_owner.php");

require("db_conn.php");

$id = $_GET["id"];
echo $id;

$sql = "DELETE FROM post WHERE post_id=".$id;
if (mysqli_query($mysqli, $sql)) {
    echo "Usunięto post";
} else {
    echo "Wystąpił błąd";
}

mysqli_close($mysqli);

header("location: ../profile.php");

 ?>
