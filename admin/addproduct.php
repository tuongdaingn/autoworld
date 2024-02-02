<?php
require_once("../mysql/connect.php");
require_once("checklogin.php");
$sql_company = "SELECT * FROM car_company";
$query_company = mysqli_query($conn, $sql_company);
$company = "";
while ($row_company = mysqli_fetch_assoc($query_company)) {
    $company .= '<option value="' . $row_company["company"] . '">' . $row_company["company"] . '</option>';
}
$stt = "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $name_product = $_POST["name_product"];
    $info_product = $_POST["info_product"];
    $price_product = $_POST["price_product"];
    $company_product = $_POST["company_product"];
    // $image_file_name = $_POST["image_file_name"];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        $image_file_name = htmlspecialchars(basename($_FILES["fileToUpload"]["name"]));
    }
    $sql_add_product = "INSERT INTO product (name_product,information_product,price_product,company_product,img_product) 
    VALUES ('$name_product','$info_product','$price_product','$company_product','$image_file_name');";
    $inser_product = mysqli_query($conn, $sql_add_product);
    if ($inser_product) {
        header('Location: manage.php');
        $stt = "Add data successfully";
    } else {
        $stt = "Add data failed";
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add product</title>
    <link rel="stylesheet" href="css/css_admin.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            border: 1px solid #028de3;
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
    </style>
</head>

<body>
    <div id="d-body">
        <div class="menu">
            <nav>
                <ul>
                    <li><a href="index.php"> User feedback</a></li>
                    <!-- <li><a href="addproduct.php"> Add product</a></li> -->
                    <li><a href="carcompany.php">Car company</a></li>
                    <li><a href="manage.php">Product management</a></li>
                    <?php
                    if ($_SESSION['username'] == 'admin') {
                        echo '<li><a href="accountmanagement.php">Account management</a></li>';
                    }
                    ?>
                    <li><a href="logout.php"> Logout</a></li>

                </ul>
            </nav>
        </div>
        <div class="content">
            <h1>Add product</h1>
            <h1 style="color:blue;"><?php echo $stt ?></h1>
            <div id="d-form">
                <a class="button-a" href="manage.php"><i class="fa-solid fa-arrow-left-long"></i> Back</a>
                <form action="" method="post" enctype="multipart/form-data">
                    <div><label>Name</label></div>
                    <div><input required class="i-product" type="text" name="name_product"></div>
                    <div><label>Product information </label></div>
                    <div><input required type="text" name="info_product" class="i-product"></div>
                    <div><label>Price</label></div>
                    <div><input required type="number" name="price_product" class="i-product"></div>
                    <div><label>Image</label>
                    <div></div><input type="file" name="fileToUpload" id="fileToUpload"></div>
                    <div><label for="">Car company</label>
                        <select name="company_product" id="">
                            <?php echo $company; ?>
                        </select><br>
                    </div>
                    <button type="submit">Add</button>
                </form>

            </div>
        </div>
    </div>
</body>

</html>