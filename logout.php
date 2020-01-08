<?php
include('server.php');
if(!isset($_SESSION["username"])){
    header('location: login.php');
}
if(isset($_GET["logout"])){
    if($_GET["logout"] == 1){
        unset($_SESSION["username"]);
        header('location: login.php');
    }
}
?>
<!DOTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Home</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <style>
             h1{
                color: #590380 !important;
                margin-top: 20px;
                margin-bottom: 20px;
            }
            .contactForm{
                border: 1px solid #ba8af8;
                margin-top: 100px;
                border-radius: 10px;
            }
            .msg{
                margin-top: 20px;
            }
        </style>
    </head>
    <body>
<?php include('header.php'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-offset-1 col-sm-10 col-lg-offset-2  col-lg-8 contactForm">
            <p><strong><a style="color:red" href="logout.php?logout=1">Logout</a></strong></p>
        </div>
    </div>
</div>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>