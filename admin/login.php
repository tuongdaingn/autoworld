<?php
require_once('../mysql/connect.php');
$stt="";
session_start();
if($_SERVER['REQUEST_METHOD']=="POST"){
    $sql_get = "SELECT * FROM account_admin";
    $q_get = mysqli_query($conn,$sql_get);
    while($row=mysqli_fetch_assoc($q_get)){
        if($_POST["usesrname"]==$row["user"]&& sha1($_POST["pwd"])==$row["password"]){
            $_SESSION['username'] = $row["user"];
            header('Location: index.php');
        }else{
            $stt ="Incorrect account or password";
        }
    }


}



?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <div>
        <form action="" method="post">
            <h2>Login</h2>
            <h3 style="color:red;"> <?php echo $stt ?></h3>
            <!-- <p><b>Username</b></p> -->
            <input type="text" name="usesrname" placeholder="Username" required class="ip"><br>
            <!-- <p><b>Passworld</b></p> -->
            <input type="password" name="pwd" placeholder="Password" required class="ip"><br>
            <input id="b-sm" type="submit" value="Login ">
        </form>
    </div>
    <style>
        div {
            max-width: 500px;
            border: 1px solid #000;
            background-color: #f8f8f8;
            margin: 0 auto;
            box-sizing: border-box;
            padding: 30px 30px;
            margin-top: 40px;
        }

        h2 {
            text-align: center;
        }

        .ip {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            box-sizing: border-box;

        }

        #b-sm {
            width: 100%;
            margin-top: 25px;
            background-color: #04AA6D;
            color: white;
            padding: 14px 20px;
            border: none;
            cursor: pointer;
        }

        #b-sm:hover {
            opacity: 0.8;
        }
    </style>
</body>

</html>