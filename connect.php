<?php
$servername = "localhost";
$username = "root";
$password = "";
$basename = "bazaclanaka";
// Create connection
$dbc = mysqli_connect($servername, $username, $password, $basename) or die('Error
connecting to MySQL server.'.mysqli_error($dbc));
mysqli_set_charset($dbc, "utf8");
// Check connection
if ($dbc) {}
?>