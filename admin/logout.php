<?php
require_once("checklogin.php");
$_SESSION['username']="";
header('Location: login.php');
?>