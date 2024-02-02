<?php
require_once("../mysql/connect.php");
session_start();
if ($_SESSION['username'] == 'admin') {
    $id = $_GET["id"];
    if (empty($id)) {
        header('Location: ../admin/accountmanagement.php');
    }
    if ($id != 1) {
        $sql_delete = "DELETE FROM account_admin WHERE id=" . $id;
        $query = mysqli_query($conn, $sql_delete);
        if ($query) {
            header('Location: ../admin/accountmanagement.php');
        }
    } else {
        header('Location: ../admin/accountmanagement.php');
    }
} else {
    header('Location: ../admin/logout.php');
}
