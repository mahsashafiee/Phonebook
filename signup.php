<?php
include('server.php');
?>
<!DOTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Sign up</title>
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
		    <h1>Sign up</h1>
            <form action="signup.php" method="post">
<?php
include("error.php");
?>

                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="email" id="email" placeholder="Email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">Password:</label>
                    <input type="password" name="password_1" id="password_1" placeholder="Password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="confirm-password">Confirm Password:</label>
                    <input type="password" name="confirm_password" id="confirm-password" placeholder="Confirm Password" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success btn-lg" name="register" value="Sing up">
                </div>
                <p>
                    Already a member? <a href="login.php">Sign in</a>
                </p>
                
            </form>
        </div>
    </div>
</div>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>