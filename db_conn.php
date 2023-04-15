<?php

$sname = "localhost";
$unmae = "root";
$pass = "";
$db_name = "test_db";

$conn = mysqli_connect($sname, $unmae, $pass, $db_name);

if(!$conn) {
    echo "Connection failed";
}
?>