<?php
$host = "localhost";
$dbname = "csp";
$username = "csp";
$password = "csp3";

$conn = mysqli_connect(hostname: $host, username: $username, password: $password, database: $dbname);

if ( mysqli_connect_errno()  ) {
  die("Connection error: ". mysqli_connect_error());
}

#echo "Connection successful!";
?>