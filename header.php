<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>header</title>


    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="proc/style.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-white py-0 px-md-4 mb-3 border-bottom shadow-sm sticky-top">
        <a class="navbar-brand ml-2 mr-3" href="index.php">
          <img src="proc/images/lf.jpg" width="70" class="img-fluid" alt="Jasmis Resturant Logo">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <ul class="navbar-nav mr-auto">
            <li class="nav-item active ml-5">
              <a class="nav-link active" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item ml-2">
              <a class="nav-link text-dark active" href="aboutus.php">About us</a>
            </li>

            <?php
            if(isset($_SESSION['username'])){
              include_once "proc/functions-proc.php";
              if($_SESSION['usertype'] == "Admin"){
                echo "<li class='nav-item active'><a class='nav-link ml-2' href='items.php'>Add items</a><li>";
                echo "<li class='nav-item active'><a class='nav-link ml-2' href='deleteitems.php'>Delete items</a></li>";
                echo "<li class='nav-item active'><a class='nav-link ml-2' href='users.php'>List of users</a></li>";
              }
              if($_SESSION['usertype'] == "Admin" || $_SESSION['usertype'] == "Staff" ){
                echo "<li class='nav-item active'><a class='nav-link ml-2' href='viewOrders.php'>Orders record</a></li>";
                echo "<li class='nav-item active'><a class='nav-link ml-2' href='viewActiveOrders.php'>Active orders</a></li>";
              }
              else if ($_SESSION['usertype'] == "user") {
                echo"<li class='nav-item active ml-2'><a class='nav-link active' href='menu.php'>Menu</a></li>";
                echo '<li class="nav-item active"><a class="nav-link ml-2" href="basket.php">Basket</a></li>';
                echo "<li class='nav-item active'><a class='nav-link ml-2' href='viewOrders.php'>My orders</a></li>";
              }

              echo "</ul>";
              echo "<a class='nav-link btn mr-0 ml-0 active mr-3' href='profile.php?id=".$_SESSION['userid']."'>Profile</a>";
              echo "<a class='nav-link btn btn-outline-primary active' href='proc/logout-proc.php'>Log out</a>";
            }
            else{
              echo "</ul>";
              echo "<a class='nav-link btn btn-outline-primary mr-3' href='signup.php'>Register</a>";
              echo "<a class='nav-link btn btn-outline-primary' <a href='login.php'>Log in</a>";
            }
            ?>
          </div>
      </nav>


    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

</body>
</html>
