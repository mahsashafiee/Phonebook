<?php
include('server.php');
//if(isset($_SESSION["username"])){
//    header('location: main.php');
//}
?>
<!DOTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Login</title>
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
            
        </style>
    </head>
    <body>
<?php include('header.php'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-offset-1 col-sm-10 col-lg-offset-2  col-lg-8 contactForm">
            <h1>Login</h1>
<?php
include("error.php");
?>
            <form action="login.php" method="post">
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" placeholder="Email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password" id="password" placeholder="Password" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success btn-lg" name="login" value="Login">
                </div>
                <p>
                    Not a memeber? <a href="signup.php">Sign up</a>
                </p>
                
            </form>
        </div>
    </div>
</div>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>