<?php
require_once("../mysql/connect.php");
require_once("checklogin.php");
$sql_get = "SELECT * FROM product";
$query_get = mysqli_query($conn, $sql_get);
$data = "";
$del = "";
while ($row = mysqli_fetch_assoc($query_get)) {
    $data .= "<tr>";

    $data .= "<td>";
    $data .= $row["id_product"];
    $data .= "</td>";

    $data .= "<td>";
    $data .= $row["name_product"];
    $data .= "</td>";

    $data .= "<td>";
    $data .= '<img class="img_product" src="uploads/'.$row["img_product"].'" alt="">';
    $data .= "</td>";

    $data .= "<td>";
    $data .= $row["information_product"];
    $data .= "</td>";

    $data .= "<td>";
    $data .= $row["price_product"];
    $data .= "</td>";

    $data .= "<td>";
    $data .= $row["company_product"];
    $data .= "</td>";


    $data .= "<td>";
    $data .= $row["log_time_product"];
    $data .= "</td>";

    $data .= "<td>";
    // $data .= "<a href=../mysql/delete_product.php?id='" . $row["id_product"] . "'>" . '<i style="font-size: 25px;" id="b-delete" class="glyphicon glyphicon-remove"></i>' . "</a>";
    $data .= '<i onclick="del(' . $row["id_product"] . ')" style="font-size: 25px;" id="b-delete" class="glyphicon glyphicon-remove"></i>';

    $data .= "</td>";


    $data .= "<td>";
    $data .= '<a href=../mysql/edit_product.php?id='.$row["id_product"].'>' .'<i style="font-size: 25px; margin: 0 auto;" class="fa-solid fa-pen-to-square"></i>';
    $data .= "</td>";


    $data .= "</tr>";

    $del .= '<div id="id' . $row["id_product"] . '"class="ask-delete">
    <div>' .
        'Are you sure you want to delete ' . $row["name_product"] . '? <br>
        <center>
        '."<a href=../mysql/delete_product.php?id='" . $row["id_product"] . "'>".'
        <button class="b-cancal">Yes</button></a>
        <button class="b-cancal" onclick="cancel1(' . $row["id_product"] . ')">No</button>
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
    <title>Product management</title>
    <script src="js/function.js"></script>
    <link rel="stylesheet" href="css/css_admin.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<style>
    .img_product{
        max-width: 150px;
    }
    
</style>
<body>
    <div id="d-body"> <img src="" alt="">
        <div class="menu">
            <nav>
                <ul>
                    <li><a href="index.php"> User feedback</a></li>
                    <!-- <li><a href="addproduct.php"> Add product</a></li> -->
                    <li><a href="carcompany.php">Car company</a></li>
                    <li><a href="manage.php">Product management</a></li>
                    <?php 
                    if ($_SESSION['username'] =='admin'){
                        echo '<li><a href="accountmanagement.php">Account management</a></li>';
                    }
                    ?>
                    <li><a href="logout.php"> Logout</a></li>

                </ul>
            </nav>
        </div>
        <div class="content">
            <h1>Product management</h1>
            <?php echo $del ?>
            <div id="d-table">
            <a class="button-a" href="addproduct.php"><i class="fa-solid fa-plus"></i> Add product</a>
                <table>
                    <tr>
                        <th style="width: 20px;">ID</th>
                        <th>Name priduct</th>
                        <th>Image</th>
                        <th>Information</th>
                        <th>Price</th>
                        <th>Company</th>
                        <th>Time</th>
                        <th>Delete</th>
                        <th>Edit</th>
                    </tr>

                    <?= $data ?>


                </table>
            </div>

        </div>
</body>

</html>