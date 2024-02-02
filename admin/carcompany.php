<?php
require_once("../mysql/connect.php");
require_once("checklogin.php");
$sql_car_company_1 = "SELECT * FROM car_company";
$query_company_1 = mysqli_query($conn, $sql_car_company_1);
$data_compay = "";
$del = "";
while ($row_company = mysqli_fetch_assoc($query_company_1)) {

    $data_compay .= "<tr>";

    $data_compay .= "<td>";
    $data_compay .= $row_company["id_company"];
    $data_compay .= "</td>";

    $data_compay .= "<td>";
    $data_compay .= $row_company["company"];
    $data_compay .= "</td>";
    $data_compay .= "</td>";
    $data_compay .= "<td>";
    $data_compay .= '<i onclick="del(' . $row_company["id_company"] . ')" style="font-size: 25px;" id="b-delete" class="glyphicon glyphicon-remove"></i>';
    $data_compay .= "</td>";
    $data_compay .= "<td>";
    $data_compay .= '<a href=../mysql/edit_company.php?id=' . $row_company["id_company"] . '>' . '<i style="font-size: 25px; margin: 0 auto;" class="fa-solid fa-pen-to-square"></i>';
    $data_compay .= "</td>";

    $del .= '<div id="id' . $row_company["id_company"] . '"class="ask-delete">
    <div>' .
        'Are you sure you want to delete ' . $row_company["company"] . '? <br>
        <center>
        '."<a href=delete_company.php?id='" . $row_company["id_company"] . "'>".'
        <button class="b-cancal">Yes</button></a>
        <button class="b-cancal" onclick="cancel1(' . $row_company["id_company"] . ')">No</button>
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
    <title>Add car company</title>
    <link rel="stylesheet" href="css/css_admin.css">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
            <h1>Car company</h1>
            <?php echo $del ?>
            <div id="form-company">

                <h1>Add car company</h1>

                <form action="../mysql/addcarcompany.php" method="post">
                    <Label>Car company</Label>
                    <br>
                    <input type="text" required name="car_company">
                    <center>
                        <button type="submit">Add</button> <input class="b-cancal" type="reset" onclick="cancel()" value="Cancel">
                    </center>
                </form>

            </div>

            <!-- <div class="ask-delete">
                <div>
                    
                    ok
                    <button onclick="document.getElementById('id1').style.display = 'none'">sad</button>
                </div>
            </div> -->
            <div id="d-table-car">
                <button onclick="addcompany()"><i class="fa-solid fa-plus"></i> Add Company</a></button>
                <table>
                    <tr>
                        <th style="width: 20px;">ID</th>
                        <th style="width: 200px;">Car company</th>
                        <th style="width: 30px;">Delete</th>
                        <th style="width: 30px;">Edit</th>
                        <!-- <th>Edit</th> -->
                    </tr>
                    <?php echo $data_compay ?>



                </table>

            </div>



        </div>

        <style>
            #d-table-car>button {
                margin: 10px 0;
                background-color: #4CAF50;
                border: 1px solid #4CAF50;
                color: white;
                padding: 5px 10px;
                text-align: center;
                text-decoration: none;
                display: inline-block;
                font-size: 16px;
                margin: 4px 2px;
                transition-duration: 0.4s;
                cursor: pointer;
            }

            #d-table-car>button:hover {
                background-color: white;
                color: #4CAF50;
            }

            #d-table-car {
                width: 600px;
                margin: 0 auto;
            }

            #form-company {
                width: 600px;
                margin: 0 auto;
            }

            #form-company>form>input {
                width: 100%;
                height: 35px;
            }

            #form-company>form button,
            .b-cancal {
                margin: 0 10px;
                margin-top: 30px;
                width: 150px;
                padding: 10px 0;
                border: 1px solid #028de3;
                background-color: #028de3;
                color: #ffffff;
            }

            #form-company>form button:hover,
            .b-cancal:hover {
                background-color: #ffffff;
                color: #028de3;
                border: 1px solid #777;
            }

            #form-company {
                display: none;
            }
        </style>
        <script>
            function addcompany() {
                document.getElementById("form-company").style.display = "block";
            }

            function cancel() {
                document.getElementById("form-company").style.display = "none";
            }

            function cancel1(x) {
                document.getElementById('id' + x).style.display = 'none';
            }

            function del(x) {
                document.getElementById('id' + x).style.display = 'block';
            }
        </script>
</body>

</html>