<?php
require_once("../mysql/connect.php");
$id = $_GET["id"];
$sql_delete = "DELETE FROM car_company WHERE id_company=".$id;
$query = mysqli_query($conn, $sql_delete);
if($query){
    header('Location: carcompany.php');
}
?>