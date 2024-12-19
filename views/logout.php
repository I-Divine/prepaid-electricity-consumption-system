
<?php
session_start();
require_once("../app/utility.php");
require_once("../app/db_connection.php");
$username = $_SESSION["username"];
updateAccessLog("User with username : $username, Logged out", $conn);
session_destroy();
?>
<?php require_once("./template/login_header.php")?>

<h1 class = "text-3xl ">Logged out, Bye!</h1>
 <?php require_once("./template/footer.php")?>
