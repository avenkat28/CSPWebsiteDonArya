<?php
$host = "localhost";
$dbname = "csp";
$username = "csp";
$password = "Buzzer#101";

$conn = mysqli_connect(hostname: $host, username: $username, password: $password, database: $dbname);

if ( mysqli_connect_errno()  ) {
  die("Connection error: ". mysqli_connect_error());
}

#echo "Connection successful!";
?>