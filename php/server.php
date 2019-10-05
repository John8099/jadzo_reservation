<?php
$host = "localhost";
$user = "root";
$pass = "";
$db = "reservation";

try {
    $conn = mysqli_connect($host,$user,$pass,$db);
}
catch (Exception $e) {
    echo $e->getMessage();
}

?>