<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conteact</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body style="font-family: 'Roboto', sans-serif;">
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Roboto:wght@300&display=swap');
    </style>

    <div class="main-body">
    <?php require_once('header.html'); ?>

        <div id="main">
            <div id="content1">

                <div class="tile">
                    Contact
                </div>



                <div id="d-contact">
                    <div id="d-info">
                        <b>Adress:</b> 54 Lê Thanh Nghị, Hà Nội, Việt Nam <br>
                        <b>Phone:</b> 099.9999.999 - 096.6666.666
                        <p><i style="color: red;">* </i>Required</p>
                    </div>


                    <form action="mysql/insert_feedback.php" method="post">

                        Full name <b>*</b> <br>
                        <input class="input" placeholder="Enter full name" required name="fullname" type="text"><br>
                        Email <b>*</b> <br>
                        <input class="input" placeholder="Enter Email" required type="email" name="email" id=""> <br>
                        Phone number <b>*</b> <br>
                        <input class="input" type="text" placeholder="Enter phone number" pattern="[0-9]+" title="Only numbers can be entered" name="phonenumber" required><br>
                        Address <b>*</b><br>
                        <input type="text" class="input" required placeholder="Enter address" name="address"> <br>
                        Content <b>*</b> <br>
                        <textarea placeholder="Enter content" required name="content" cols="30" rows="5" style="width: 100%;"></textarea><br>
                        <input type="submit" value="Sumbit" id="b-submit">
                    </form>
                </div>
            </div>


            <div id="content2">
                <div style="background-color:#FEF1AC;;" class="tile">
                    Road map
                </div>
                <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3724.7295561253027!2d105.84768915060855!3d21.003475285943455!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3135ad58455db2ab%3A0x9b3550bc22fd8bb!2zNTQgUC4gTMOqIFRoYW5oIE5naOG7iywgQsOhY2ggS2hvYSwgSGFpIELDoCBUcsawbmcsIEjDoCBO4buZaSwgVmnhu4d0IE5hbQ!5e0!3m2!1svi!2s!4v1649944536101!5m2!1svi!2s" width="100%" height="500" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>

            </div>



        </div>
        <?php require_once('footer.html'); ?>
    </div>

    <style>
        .input{
            padding:8px;
            display:block;
            border:none;
            border-bottom:1px solid #999;
            width:100%;
            box-sizing: border-box;
            background-color: #f8f8f8 ;

        }
        #d-info {
            border-bottom: 1px dotted #777;
            max-width: 100%;
            margin-bottom: 20px;
        }

        #d-info>p {
            font-size: 14px;
            text-align: right;
        }

        form>b {
            color: red;
        }

        #d-contact {
            border: 1px solid #e7e7e7;
            background: #f8f8f8;
            box-sizing: border-box;
            padding: 20px 50px;
        }

        #content1 {
            width: 65%;
            box-sizing: border-box;
        }

        #main {
            display: flex;
        }

        #content2 {
            width: 35%;
            box-sizing: border-box;
            margin-left: 20px;
            color: #c83d14;
        }

        #b-submit {
            padding: 8px 50px;
            background-color: #028de3;
            color: #ffffff;
            border-radius: 4px;
            font-weight: bolder;
            font-size: 14px;
            border: none;
            display: block;
            margin: 0 auto;
            margin-top: 20px;
        }

        #b-submit:hover{
            opacity: 0.7;
        }
    </style>


</body>

</html>