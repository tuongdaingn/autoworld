<?php
require_once("../mysql/connect.php");
$id = $_GET["id"];
$sql_delete = "DELETE FROM feedback WHERE user_id=".$id;
$query = mysqli_query($conn, $sql_delete);
if($query){
    header('Location: index.php');
}
?>