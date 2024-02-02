<?php

require_once("../mysql/connect.php");
require_once("checklogin.php");
$sql_get = "SELECT * FROM feedback";
$query_get = mysqli_query($conn, $sql_get);
$data = "";
$del = '';
while ($row = mysqli_fetch_assoc($query_get)) {
    $data .= "<tr>";

    $data .= "<td>";
    $data .= $row["user_id"];
    $data .= "</td>";

    $data .= "<td>";
    $data .= $row["user_fullname"];
    $data .= "</td>";

    $data .= "<td>";
    $data .= $row["user_email"];
    $data .= "</td>";

    $data .= "<td>";
    $data .= $row["user_phonenumber"];
    $data .= "</td>";

    $data .= "<td>";
    $data .= $row["user_address"];
    $data .= "</td>";

    $data .= "<td>";
    $data .= $row["content"];
    $data .= "</td>";

    $data .= "<td>";
    $data .= $row["time_log"];
    $data .= "</td>";

    $data .= "<td>";
    // $data .= "<a href=delete.php?id='" . $row["user_id"] . "'>" . '<i id="b-delete" class="glyphicon glyphicon-remove"></i>' . "</a>";
    $data .= '<i onclick="del(' . $row["user_id"] . ')" style="font-size: 25px;" id="b-delete" class="glyphicon glyphicon-remove"></i>';
    $data .= "</td>";

    $data .= "</tr>";
    $del .= '<div id="id' . $row["user_id"] . '"class="ask-delete">
    <div>' .
        'Are you sure you want to delete ' . $row["user_id"] . '? <br>
        <center>
        ' . "<a href=delete.php?id='" . $row["user_id"] . "'>" . '
        <button class="b-cancal">Yes</button></a>
        <button class="b-cancal" onclick="cancel1(' . $row["user_id"] . ')">No</button>
        </center>
    </div>
    </div>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User feedback</title>
    <link rel="stylesheet" href="css/css_admin.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <script src="js/function.js"></script>
</head>

<body>
    <div id="d-body">
        <div class="menu">
            <nav>
                <ul>
                    <li><a href="index.php">User feedback</a></li>
                    <!-- <li><a href="addproduct.php"> Add product</a></li> -->
                    <li><a href="carcompany.php">Car company</a></li>
                    <li><a href="manage.php">Product management</a></li>
                    <?php
                    if ($_SESSION['username'] == 'admin') {
                        echo '<li><a href="accountmanagement.php">Account management</a></li>';
                    }
                    ?>
                    <li><a href="logout.php">Logout</a></li>


                </ul>
            </nav>
        </div>
        <div class="content">
            <h1>User feedback</h1>
            <?php echo $del ?>
            <div class="table">

                <div id="d-table">
                    <table>
                        <tr>
                            <th style="width: 20px;">ID</th>
                            <th>Full name</th>
                            <th>Email</th>
                            <th>Phone number</th>
                            <th>Address</th>
                            <th style="width: 300px;">Content</th>
                            <th>Time</th>
                            <th>Delete</th>
                            <!-- <th>Edit</th> -->
                        </tr>

                        <?= $data ?>


                    </table>
                </div>
            </div>
        </div>
    </div>
    <style>
        #d-table {
            width: 97%;
            margin: 0 auto;
        }
    </style>
</body>

</html>