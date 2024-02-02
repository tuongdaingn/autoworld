<?php
$id = $_GET['id'];
require_once("connect.php");
session_start();
if (($_SESSION['username']) == "") {
    header('Location: ../admin/login.php');
}
if (empty($id)) {
    header('Location: ../admin/manage.php');
}


$sql = "SELECT * FROM `product` WHERE `id_product` = " . $id;
$query = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($query);

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name_product = $_POST["name_product"];
    $price_product = $_POST["price_product"];
    $info_product = $_POST["info_product"];
    $company_product = $_POST["company_product"];

    $sql_update_company = 'UPDATE product 
    SET name_product = '.'"'.$name_product.'"'. ',' . 'information_product = '.'"'.$info_product.'"'. ',' . 'price_product = '.'"'.$price_product.'"'. ',' .'company_product = '.'"'.$company_product.'"'.
    'WHERE id_product = ' . $id;
    echo $sql_update_company;
    $que = mysqli_query($conn, $sql_update_company);
    if ($que) {
        header('Location: ../admin/manage.php');
    }
}

$sql_company = "SELECT * FROM car_company";
$query_company = mysqli_query($conn, $sql_company);
$company = "";
while ($row_company = mysqli_fetch_assoc($query_company)) {
    $company .= '<option value="' . $row_company["company"] . '">' . $row_company["company"] . '</option>';
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit product</title>
    <link rel="stylesheet" href="../admin/css/css_admin.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    #d-form {
        padding: 20px 20px;
        width: 70%;
        box-sizing: border-box;
        margin: 0 auto;
    }

    .i-product {
        width: 100%;
        height: 35px
    }

    #d-form>form>label {
        padding: 10px 0;
    }

    #d-form>form>button {
        display: block;
        margin: 0 auto;
        width: 150px;
        padding: 10px 0;
        border: none;
        background-color: #028de3;
        color: #ffffff;
    }

    #d-form>form>button:hover {
        background-color: #ffffff;
        color: #028de3;
        border: 1px solid #777;
    }

    #product_image img {
        width: 200px;
    }

    #d-form>form>div {
        padding: 5px 0;
    }
    textarea{
        width: 100%;
    }
    .button-a {
        /* border: 1px solid #000; */
        padding: 5px 10px;
        background: rgb(189, 195, 201);
        display: block;
        margin: 10px 0;
        width: 120px;
        text-align: center;
    }

    .button-a:hover {
        background: rgb(147, 151, 155);
        text-decoration: none;
    }
</style>

<body>
    <div id="d-body">
        <div class="menu">
            <nav>
                <ul>
                    <li><a href="../admin/index.php"> User feedback</a></li>
                    <!-- <li><a href="../admin/addproduct.php"> Add product</a></li> -->
                    <li><a href="../admin/carcompany.php">Car company</a></li>
                    <li><a href="../admin/manage.php">Product management</a></li>
                    <?php 
                    if ($_SESSION['username'] =='admin'){
                        echo '<li><a href="../admin/accountmanagement.php">Account management</a></li>';
                    }
                    ?>
                    <li><a href="../admin/logout.php"> Logout</a></li>

                </ul>
            </nav>
        </div>
        <div class="content">
            <h1>Edit product id = <?php echo $id ?></h1>
            <div id="d-form">
            <a class="button-a" href="../admin/manage.php"><i class="fa-solid fa-arrow-left-long"></i> Back</a>
                <form action="" method="post">
                    <div><label>Name</label></div>
                    <div><input required class="i-product" value="<?=$row['name_product']?>" type="text" name="name_product"></div>
                    
                    <div><label>Price</label></div>
                    <div><input required type="number" value="<?=$row['price_product']?>" name="price_product" class="i-product"></div>
                    <div><label for="">Car company</label>
                        <select name="company_product" id="">
                            <option value="<?=$row['company_product']?>"><?=$row['company_product']?></option>
                            <?php echo $company; ?>
                        </select><br>
                    </div>
                    <div><label>Product information </label></div>
                    <textarea name="info_product"  id="" cols="30" rows="10"><?=$row['information_product']?></textarea>
                    <button type="submit">Edit</button>
                </form>


            </div>

        </div>


</body>

</html>