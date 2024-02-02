<?php
require_once("connect.php");
$car_company = $_POST["car_company"];
$sql_insert = "INSERT INTO car_company (company) VALUES ('$car_company');";
$que = mysqli_query($conn,$sql_insert);
if($que){
    header("Location: ../admin/carcompany.php");
}
?>