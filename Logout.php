<?php
session_start();
unset($_SESSION["Session"]);
session_destroy();
header("location:LoginPage.php");
?>