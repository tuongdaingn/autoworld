<?php
$search = $_GET['search'];
require_once('mysql/connect.php');
$sql_get = "SELECT * FROM product WHERE company_product LIKE ". '"'.$search.'"';
$query_get = mysqli_query($conn, $sql_get);
$data = "";
while ($row = mysqli_fetch_assoc($query_get)) {
    $data .= '<li class="c-li">';
    $data .= '<div class="d-product">';
    $data .= '<div class="product-top">';
    $data .= '<img class="img-product" src="admin/uploads/' . $row['img_product'] . '" alt="">';
    $data .= '</div>';
    $data .= '<div class="product-info">';
    $data .= '<div class="product-name">';
    $data .= '<b class="b-name">' . $row['name_product'] . '</b>';
    $data .= '</div>';
    $data .= '<div class="product-price">';
    $data .= '<b>' . '$ ' . $row['price_product'] . '</b>';
    $data .= '</div>';
    $data .= '<a href="details.php?id=' . $row["id_product"] . '">';
    $data .= '<button class="button-product">' . 'See details' . '</button>';
    $data .= '</a>';
    $data .= '</div>';
    $data .= '</div>';
    $data .= '</li>';
}
if(empty($data)){
    $data = "<b>No result</b>";
}
$sql_car_company_1 = "SELECT * FROM car_company";
$query_company_1 = mysqli_query($conn, $sql_car_company_1);
$data_compay = "";
while ($row_company = mysqli_fetch_assoc($query_company_1)) {
    $data_compay.= '<li><a href="filter.php?search='.$row_company['company'].'">'.$row_company['company'].'</a></li>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car is on sale</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="css/style.css">
    <style>
        .c-product {
            display: flex;
            flex-wrap: wrap;
            text-align: center;
        }

        .product-name {
            height: 40px;
        }

        .product-price {
            color: red;
            margin-top: 10px;

        }

        .b-name {
            font-size: 18px;

        }

        .b-name:hover {
            color: blue;
        }

        .d-product {
            padding-bottom: 20px;
        }


        .button-product {
            background-color: white;
            color: black;
            border: 2px solid #008CBA;
            margin-top: 10px;
            padding: 10px 0;
            width: 60%;

        }

        .button-product:hover {
            background-color: #008CBA;
            color: white;

        }

        .c-li {
            flex-basis: 25%;
            list-style: none;
            padding-left: 10px;
            padding-right: 10px;
            box-sizing: border-box;
            margin-bottom: 30px;
            background: #f8f8f8;
        }

        .product-info {
            margin-top: 10px;
        }

        .img-product {
            max-width: 100%;
            height: auto;
            max-height: 150px;
        }

        #tile {
            margin: 0;
            padding: 0;
            /* padding: px 10px; */
            box-sizing: border-box;
        }

        #tile>ul {
            display: flex;
            list-style: none;
        }

        #tile>ul>li {
            padding-left: 5px;
        }

        #tile>ul>li>a {
            text-decoration: none;
            color: black;
        }

        .sub-menu {
            position: absolute;
            background: #f8f8f8;
            padding: 15px 5px;
            list-style: none;
            width: 200px;
            display: none;
        }

        #tile li {
            position: relative;
            
        }

        #tile li:hover .sub-menu {
            display: block;
        }

        .sub-menu a {
            text-decoration: none;
            padding: 10px 0;
            color:black;
        }
        .sub-menu li{
            padding: 5px 0;
        }
        .sub-menu a:hover{
            color: blue;
        }

        .company-c::after {
            font-family: "Font Awesome 5 Free";
            font-weight: 900;
            content: "\f107";
        }
    </style>
</head>

<body style="font-family: 'Roboto', sans-serif;">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');
    </style>
    <div class="main-body">
        <?php require_once('header.html'); ?>

        <div class="tile">
            Car is on sale
        </div>
        <div id="tile" class="tile">
            <ul>
                <li>Filter products:</li>
                <li class="company-c"><a href="#"><?=$search?></a>
                    <ul class="sub-menu">
                        <!-- <li><a href="">1</a></li> -->
                        <?php echo  $data_compay; ?>
                        <li><a href="car_is_on_sale.php">All car</a></li>
                    </ul>
                </li>
            </ul>

        </div>
        <div id="main_product">
            <ul class="c-product">
         <?php echo $data ?>
            </ul>
        </div>

        <?php require_once('footer.html'); ?>
    </div>

</body>

</html>