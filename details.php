<?php
require_once('mysql/connect.php');
$id = $_GET['id'];
if (empty($id)) {
    header('Location: car_is_on_sale.php');
}
$sql = "SELECT * FROM `product` WHERE `id_product` = " . $id;
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Details</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body style="font-family: 'Roboto', sans-serif;">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');

        .main {
            width: 100%;
            box-sizing: border-box;
            display: flex;
            background: #f8f8f8;
        }

        .d1 {
            width: 50%;
            margin-right: 10px;
            margin-top: 10px;
        }

        .d2 {
            width: 50%;

            margin-left: 10px;
            margin-top: 10px;
        }

        .img-product {
            width: 100%;
            /* padding: 10px; */
        }

        .name-product {
            font-size: 25px;
            border-bottom: 1px solid #bfbbbb;
            padding: 20px;
            background: #f8f8f8;

        }

        .price-product {
            font-size: 30px;
            color: #cb1c22;
        }

        .info-p {
            line-height: 20px;
            padding-top: 20px;
        }

        .ct {
            border: 1px solid #f5e082;
            width: 100%;
            min-height: 120px;
            height: auto;
            background: #ffffe5;
            box-sizing: border-box;
            padding: 10px 10px;
            margin-top: 50px;
        }

        .b1 {
            color: blue;
        }

        .b2 {
            color: #c60;
        }
        .company{
            margin-top: 5px;
            font-size: 15px;
        }
    </style>
    <div class="main-body">
        <?php require_once('header.html'); ?>



        <div class="tile">
            Details product
        </div>

        <div class="name-product">
            <b><?= $row['name_product']; ?></b>
        </div>

        <div class="main">

            <div class="d1">
                <img class="img-product" src="admin/uploads/<?= $row['img_product']; ?>" alt="">
            </div>

            <div class="d2">
                <div class="price-product">

                    <b>$ <?= $row['price_product']; ?></b>
                </div>
                <div class="company">
                    <b>Car company: <?= $row['company_product']; ?> </b>
                </div>
                <div class="info-p">
                    <?= $row['information_product']; ?>
                </div>
                <div class="ct">
                    <b class="b1">Contact seller</b>
                    <br>
                    <b class="b2">Group 1</b>
                    <br>
                    Phone: <b class="b3">099.9999.999 - 096.6666.666</b>
                    <br>
                    Address: 54 Lê Thanh Nghị, Hà Nội, Việt Nam
                </div>
            </div>

        </div>
        <?php require_once('footer.html'); ?>
    </div>

</body>

</html>