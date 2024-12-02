
<?php
session_start();
session_destroy();
?>
<?php require_once("./template/login_header.php")?>

<h1 class = "text-3xl ">Logged out, Bye!</h1>
 <?php require_once("./template/footer.php")?>
