<?php
$db_host = "localhost";
$db_user = "root";
$db_passworld = "";
$db_name = "autoworld";
$conn = mysqli_connect($db_host,$db_user,$db_passworld,$db_name);
if(!$conn){
    die("Connection failed: " . mysqli_connect_error());
}