<?php
require_once("../mysql/connect.php");
$id = $_GET["id"];
$sql_delete = "DELETE FROM product WHERE id_product=".$id;
$query = mysqli_query($conn, $sql_delete);
if($query){
    header('Location: ../admin/manage.php');
}
?>