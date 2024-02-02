<?php
require_once("connect.php");
session_start();
if ($_SESSION['username'] == 'admin') {
    $id = $_GET["id"];
    if (empty($id)) {
        header('Location: ../admin/accountmanagement.php');
    }
    $sql = "SELECT * FROM `account_admin` WHERE `id` = " . $id;
    $query = mysqli_query($conn, $sql);
    $row = mysqli_fetch_assoc($query);
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $user = $_POST["user"];
        $password = sha1($_POST['password']);
        if ($row['user'] != 'admin') {
            $sql = 'UPDATE account_admin SET user = ' . '"' . $user . '"' . ', password = ' . '"' . $password . '"'
            . ' WHERE id = ' . $id;
        }else{
            $sql = 'UPDATE account_admin SET `password` = ' . '"' . $password . '"'
            . ' WHERE id = ' . $id;
        }
        echo $sql;
        $que = mysqli_query($conn, $sql);
        if ($que) {
            header('Location: ../admin/accountmanagement.php');
        }
    }
} else {
    header('Location: ../admin/logout.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit company</title>
    <link rel="stylesheet" href="../admin/css/css_admin.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<style>
    .form-edit {
        width: 500px;
        margin: 0 auto;
        margin-top: 50px;
    }

    button {

        display: block;
        margin: 0 auto;
        margin-top: 30px;
        width: 150px;
        padding: 10px 0;
        border: none;
        background-color: #028de3;
        color: #ffffff;
    }

    button:hover {
        background-color: #ffffff;
        color: #028de3;
        border: 1px solid #777;
    }

    input {
        width: 100%;
        height: 35px;
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
                    if ($_SESSION['username'] == 'admin') {
                        echo '<li><a href="../admin/accountmanagement.php">Account management</a></li>';
                    }
                    ?>
                    <li><a href="../admin/logout.php"> Logout</a></li>

                </ul>
            </nav>
        </div>
        <div class="content">
            <h1>Edit admin id = <?php echo $id ?></h1>
            <div class="form-edit">
                <a class="button-a" href="../admin/accountmanagement.php"><i class="fa-solid fa-arrow-left-long"></i> Back</a>
                <form action="" method="post">
                    <?php
                    if ($row['user'] != 'admin') {
                        echo '                    
                        <div>
                            <Label>User</Label>
                        </div>
                        <div>
                            <input value="' . $row['user'] . '" type="text" name="user">
                        </div>';
                    } else {
                        echo '                    <div>
                            <Label>User</Label>
                        </div>
                        <div>
                            <input disabled value="' . $row['user'] . '" type="text" name="user">
                        </div>';
                    }
                    ?>

                    <div>
                        <Label>New Password</Label>
                    </div>
                    <div>
                        <input type="text" name="password">
                    </div>
                    <button type="submit">Edit</button>
                </form>
            </div>

        </div>


</body>

</html>