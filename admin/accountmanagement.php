<?php
require_once("../mysql/connect.php");
require_once("checklogin.php");
if ($_SESSION['username'] != 'admin') {
    header('Location: index.php');
}
$sql = "SELECT * FROM account_admin";
$query = mysqli_query($conn, $sql);
$data = "";
$del = '';
while ($row = mysqli_fetch_assoc($query)) {

    $data .= "<tr>";

    $data .= "<td>";
    $data .= $row["id"];
    $data .= "</td>";

    $data .= "<td>";
    $data .= $row["user"];
    $data .= "</td>";

    $data  .= "<td>";
    $data .= $row["password"];
    $data .= "</td>";
    $data .= "</td>";
    $data .= "<td>";
    $data .= '<a href=../mysql/edit_admin.php?id=' . $row["id"] . '>' . '<i style="font-size: 25px; margin: 0 auto;" class="fa-solid fa-pen-to-square"></i>';
    $data .= "</td>";
    if ($row["user"] != 'admin') {
        $data .= "<td>";
        $data .= '<i onclick="del(' . $row["id"] . ')" style="font-size: 25px;" id="b-delete" class="glyphicon glyphicon-remove"></i>';
        $data .= "</td>";
    }
    if ($row["user"] == 'admin') {
        $data .= "<td>";
        $data .= " ";
        $data .= "</td>";
    }
    $del .= '<div id="id' . $row["id"] . '"class="ask-delete">
    <div>' .
        'Are you sure you want to delete ' . $row["user"] . '? <br>
        <center>
        ' . "<a href=../mysql/del_admin.php?id='" . $row["id"] . "'>" . '
        <button class="b-cancal">Yes</button></a>
        <button class="b-cancal" onclick="cancel1(' . $row["id"] . ')">No</button>
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            <h1>Account management</h1>
            <?php echo $del ?>
            <div id="d-table-car">
                <div id="addacc">
                    <h1>Add account</h1>
                    <form action="../mysql/add_admin.php" method="post">
                        <div><label for="">Username</label></div>
                        <div><input name="user" pattern="[0-9a-z]+" required type="text"></div>
                        <div><label for="">Password</label></div>
                        <div><input name="password" required type="text"></div>
                        <center>
                            <button class="b-add" type="submit">Add account</button>
                            <input class="b-add" type="button" onclick="cancel()" value="Cancel">
                        </center>
                    </form>

                </div>
                <button id="b-add" onclick="add()" class="b-add"><i class="fa-solid fa-plus"></i> Add account</button>
                <table>
                    <tr>
                        <th style="width: 20px;">ID</th>
                        <th style="width: 200px;">User</th>
                        <th style="width: 200px;">Password (encrypted)</th>
                        <th style="width: 30px;">Edit</th>
                        <th style="width: 30px;">Delete</th>

                        <!-- <th>Edit</th> -->
                    </tr>
                    <?php echo $data ?>

                </table>
            </div>

        </div>

        <style>
            #d-table-car {
                width: 600px;
                margin: 0 auto;
            }

            #addacc {
                width: 100%;
                margin: 0 auto;
                margin: 10px 0;
                border: 1px solid #000;
                box-sizing: border-box;
                padding: 20px;
            }

            #addacc div {
                margin: 5px 0;
            }

            #addacc>form>div>input {
                width: 100%;
                height: 30px;
            }

            .b-add {
                background-color: #4CAF50;
                border: 1px solid #4CAF50;
                color: white;
                padding: 5px 10px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 10px 2px;
                transition-duration: 0.4s;
                cursor: pointer;

            }

            .b-add:hover {
                background-color: white;
                color: #4CAF50;
            }

            #b-submit {
                margin-top: 20px;
            }

            #addacc {
                display: none;
            }
        </style>
        <script>
            function add() {
                document.getElementById('addacc').style.display = "block";
                document.getElementById('b-add').style.display = "none";
            }

            function cancel() {
                document.getElementById('addacc').style.display = "none";
                document.getElementById('b-add').style.display = "block";
            }
        </script>
</body>

</html>