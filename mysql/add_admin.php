<?php
require_once("connect.php");
$user = $_POST["user"];
$password = sha1($_POST["password"]);
$sql_insert = "INSERT INTO account_admin (`user`,`password`) VALUES ('$user','$password');";
$que = mysqli_query($conn,$sql_insert);
if($que){
    header("Location: ../admin/accountmanagement.php");
}
?>