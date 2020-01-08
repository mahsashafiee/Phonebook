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
                background-color: rgba( 175, 157, 225, 0.05 );
            }

            .content {
                width: 15%;
                margin: 0px auto;
            }

            .btn
            {
                margin: 2px;
            }
            a
            {
                color: white !important;
            }
            
        </style>
    </head>
    <body>
<?php include('header.php'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12  col-lg-12 contactForm">
		    <h1>All Contacts</h1>
            
<?php
include("error.php");
$connect_query = "SELECT * FROM `contact`";
$result = $db->query($connect_query);
?>
            <!-- On rows -->
            <table class="table table-bordered">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Name</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">Phone Number</th>
                  <th scope="col">Type</th>
                  <th scope="col">Post Code</th>
                  <th scope="col">Email</th>
                  <th scope="col">Image</th>
                  <th scope="col">Operations</th>
                </tr>
              </thead>
              <tbody>
<?php if($result->num_rows >0){
while($row = $result->fetch_assoc()){ 
    $id = $row["ID"];
                  ?>
                <tr>
<!--                  <th scope="row">1</th>-->
                  <td><?= $row["ID"] ?></td>
                  <td><?= $row["name"] ?></td>
                  <td><?= $row["lastname"] ?></td>
                  <td><?= $row["phonenumber"] ?></td>
                  <td><?= $row["type"] ?></td>
                  <td><?= $row["postcode"] ?></td>
                  <td><?= $row["email"] ?></td>
                  <td>
                      <div class="content">
                         <img src="uploads/<?=$row["image_name"] ?>" style="width:100%">
                      </div>
                  </td>
                  <td>
                      <div class="btn-group" role="group" aria-label="Basic example">
                      <button type="button" class="btn btn-sm btn-success"><a href="view.php?id=<?=$id ?>">view</a></button>
                      <button type="button" class="btn btn-sm btn-success"><a href="update.php?id=<?=$id ?>">update</a></button>
                      <button name="delete" type="button" class="btn btn-sm btn-success"><a href="delete.php?id=<?=$id ?>">delete</a></button>
                      </div>   
                  </td>     
                </tr>
<?php } 
} ?>
              </tbody>
            </table>

               
        </div>
    </div>
</div>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>