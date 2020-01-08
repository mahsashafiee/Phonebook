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
                background-color: rgba( 175, 157, 225, 0.05 );
            }
            .content {
                width: 30%;
                margin: 0px auto;
                background: white;
                margin-bottom: 20px;
                padding: 10px;
            }
            .btn
            {
                margin: 5px auto;
                padding-left: 10px !important;
            }
            a
            {
                color: white !important;
            }
            img{
                padding-left: -10px !important;
            }
            
        </style>
    </head>
    <body>
<?php include('header.php'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="=col-sm-12  col-lg-12 contactForm">
            <h1>View in Detail</h1>
<?php
include("error.php");

if(!isset($_GET["id"]))
{
    $connect_query = "SELECT * FROM `contact` order by ID desc limit 1 "; 
} else {
    $connect_query = "SELECT * FROM `contact` where ID =".$_GET["id"];
}
$result = $db->query($connect_query);
?>
            <div class="row">
                <div class="col-sm-6 col-lg-6">
                    <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">First</th>
                  <th scope="col">Last</th>
                  <th scope="col">Phone</th>
                  <th scope="col">Post Code</th>
                  <th scope="col">Email</th>
                  
                </tr>
              </thead>
              <tbody>
<?php if($result->num_rows >0){
while($row = $result->fetch_assoc()){ ?>
                <tr>
                  <td><?= $row["name"] ?></td>
                  <td><?= $row["lastname"] ?></td>
                  <td><?= $row["phonenumber"] ?></td>
                  <td><?= $row["postcode"] ?></td>
                  <td><?= $row["email"] ?></td>
                </tr>
              </tbody>
            </table>
                </div>
                <div class="col-sm-6 col-lg-6">
                    <div class="content">
                        <img src="uploads/<?=$row["image_name"] ?>" style="width:100%">
                      <div class="btn-group">
                      <button type="button" class="btn btn-lg btn-success"><a href="update.php?id=<?= $row["ID"] ?>">update</a></button>
                      <button name="delete" type="button" class="btn btn-lg btn-success"><a href="delete.php?id=<?= $row["ID"] ?>">delete</a></button>
                      </div>
                    </div> 
<?php } 
} ?>
                </div>
            </div>

        </div>
    </div>
</div>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>