<?php
$servername = "localhost"; 
$username = "root"; 
$password = ""; 
$database = "prepaid_electricity"; 

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    throw new Exception("Error connecting to database", 1);
    ;
}

?>
