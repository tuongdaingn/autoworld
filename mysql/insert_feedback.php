<?php
require_once("connect.php");
$fullname_user = $_POST["fullname"];
$email_user = $_POST["email"];
$phonenumber_user = $_POST["phonenumber"];
$address_user = $_POST["address"];
$content_user = $_POST["content"];
$sql_insert = "INSERT INTO feedback (user_fullname,user_email,user_phonenumber,user_address,content) VALUES ('$fullname_user','$email_user','$phonenumber_user','$address_user','$content_user');";
$que = mysqli_query($conn,$sql_insert);
if($que){
    header("Location: ..");
}
?>