<?php
include('server.php');
if(!isset($_SESSION["username"])){
    header('location: login.php');
}
?>
<!DOTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Create Contact</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <style>
            h1{
                color: #590380 !important;
                margin-top: 20px;
                margin-bottom: 30px;
            }
            .contactForm{
                border: 1px solid #ba8af8;
                margin-top: 100px;
                margin-bottom: 80px;
                border-radius: 10px;
            }
            
        </style>
    </head>
    <body>
<?php include('header.php'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-offset-1 col-sm-10 col-lg-offset-2  col-lg-8 contactForm">
		    <h1>Create Contact</h1>
            <form action="create.php" method="post" enctype="multipart/form-data">
<?php
include("error.php");
?>

                <div class="form-group">
                    <label for="name">Name:</label>
                    <input type="text" name="name" id="name" placeholder="Name" class="form-control">
                </div>                
                <div class="form-group">
                    <label for="lastname">Lastname:</label>
                    <input type="text" name="lastname" id="lastname" placeholder="Lastname" class="form-control">
                </div>                
                <div class="form-group">
                    <label for="phonenumber">Phone Number:</label>
                    <input type="number" name="phonenumber" id="phonenumber" placeholder="Phone Number" class="form-control">
                </div>
                <div class="form-group">
                    <label for="type">Type: &nbsp; &nbsp;</label>
                    <label class="radio-inline"><input type="radio" name="type" value="mobile" checked>Mobile</label>
                    <label class="radio-inline"><input type="radio" name="type" value="home">Home</label>
                    <label class="radio-inline"><input type="radio" name="type" value="work">Work</label>
                </div>
                <br>
                <div class="form-group">
                    <label for="postcode">Post Code:</label>
                    <input type="number" name="postcode" id="postcode" placeholder="Post Code" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email:</label>
                    <input type="email" name="coemail" id="coemail" placeholder="Email" class="form-control">
                </div>
                <div class="form-group">
                    <label for="image">Image:</label>
                    <input type="file" name="file" id="image" placeholder="image" class="form-control">
                </div>
                <div class="form-group">
                    <input type="submit" class="btn btn-success btn-lg" name="create" value="Create">
                </div> 
            </form>
        </div>
    </div>
</div>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>