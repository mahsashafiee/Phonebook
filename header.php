<!DOTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Include files</title>
        <link href="css/bootstrap.min.css" rel="stylesheet">
        <style>
            
        </style>
    </head>
    <body>
        <nav role="navigation" class="navbar navbar-inverse navbar-fixed-top">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a href="index.php" class="navbar-brand">Home</a>
                    <button type="button" class="navbar-toggle" data-target="#navbarCollapse" data-toggle="collapse">
                        <span class="sr-only">Toggle navigation</span> 
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                </div>
                <div class="navbar-collapse collapse" id="navbarCollapse">
                    <ul class="nav navbar-nav">
                      <li class="active">
                        <a href="signup.php"><strong>Sign up</strong></a>
                      </li>
<?php if(isset($_SESSION["username"])) { ?>                       
                      <li>
                        <a href="create.php"><strong>Create</strong></a>
                      </li>
                      <li>
                        <a href="view.php"><strong>View</strong></a>
                      </li>
                      <li>
                        <a href="logout.php?logout=1"><strong>Logout</strong></a>
                      </li>
<?php } else { ?>
                      <li>
                        <a href="login.php"><strong>Login</strong></a>
                      </li>
                      
<?php } ?>
                    </ul>
                  </div>
            </div>
        </nav>
        <div class="container-fluid">   
        </div>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
        <script src="js/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
    </body>
</html>