<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Menu</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <!-- CSS -->
    <link rel="stylesheet" href="proc/style.css">

</head>
<body>
    <?php
        include_once "header.php";
        include_once "proc/dbc-proc.php";
    ?>
    <div class="container pt-3 justify-content-center">
      <div class='container border-bottom px-2 py-3 pt-md-5 pb-md-4 mx-auto'>
        <h1 class='mb-1 font-weight-light'>Menu</h1>
      </div>
      <div class="container shadow-sm pb-2 mt-3" style="background-color: #Ffffff;">
        <nav id="navbar-example2" class="navbar navbar-light rounded">
          <ul class="nav nav-pills">
            <li class="nav-item">
              <a class="nav-link text-info mr-3" href="#list-item-1">Sandwiches</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-info mr-3" href="#list-item-2">Meals</a>
            </li>
            <li class="nav-item">
              <a class="nav-link text-info mr-3" href="#list-item-3">Drinks and Desserts</a>
            </li>
          </ul>
        </nav>
      </div>
      <div class="container">
        <div data-spy="scroll" data-target="#list-example" data-offset="0" class="scrollspy-example">
          <div class="container w-75 pt-5 pb-5">
            <p><?php
              if(isset($_GET['error'])) {
                echo $_GET['error'] === '0'? 'Food has been added to basket.' : 'Something went wrong!';
              }
            ?></p>
            <h4 id="list-item-1">Sandwiches</h4>
            <p class="mb-5">
              <?php
                  $sql = "SELECT * FROM singlefood";
                  $stmt = $conn->query($sql);
                  echo "<div class='container d-flex flex-wrap justify-content-between'>";
                  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                      echo "<div class='container mb-5' style='width: 18rem;'>";
                      echo "<p class='text-center'><img src='proc/images/".$row['imgS']."' style='width:180px;height:160px; alt='Not Found' onerror=this.src='proc/images/noimage.jpg'></p>";
                      echo "<p class='text-center'>".$row['sfName']."</p>";
                      echo "<p class='text-center text-muted mb-3'>".$row['sfType']."</p>";
                      echo "<p class='text-center'>BD ".$row['sfPrice']."</p>";
                      if(isset($_SESSION['username'])){
                        echo "<p class='text-center'><form class='text-center' method='POST' action='proc/additemtobasket-proc.php'>
                                <input type='hidden' name='userID' value='".$_SESSION['userid']."'>
                                <input type='hidden' name='itemType' value='2'>
                                <input type='hidden' name='itemID' value='".$row['sfID']."'>
                                <button name='submit' type='submit' class='btn btn-dark border-0' style='background-color: #E60c0c;'>Add to basket</button>
                            </form></p>";
                        }
                        else {
                          echo "<p class='text-center'><a href=\"login.php\" class='btn btn-dark border-0' style='background-color: #E60c0c;'>Add to basket</a></p>";
                        }
                        echo "</div>";
                  }
                  echo "</div>";

              ?>
            </p>
            <h4 id="list-item-2" class="mt-3">Meals</h4>
            <p class="mb-5">
              <?php
                  $sql = "SELECT * FROM mealfood";
                  $stmt = $conn->query($sql);
                  echo "<div class='container d-flex flex-wrap justify-content-between'>";
                  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    echo "<div class='container mb-5' style='width: 18rem;'>";
                    echo "<p class='text-center'><img src='proc/images/".$row['imgM']."' style='width:180px;height:160px; alt='Not Found' onerror=this.src='proc/images/noimage.jpg'></p>";
                    echo "<p class='text-center'>".$row['mfName']."</p>";
                    echo "<p class='text-center text-muted mb-3'>".$row['mfType']."</p>";
                    echo "<p class=' text-center'>BD ".$row['mfPrice']."</p>";
                    if(isset($_SESSION['username'])){
                      echo "<p><form class='text-center' method='POST' action='proc/additemtobasket-proc.php'>
                              <input type='hidden' name='userID' value='".$_SESSION['userid']."'>
                              <input type='hidden' name='itemType' value='1'>
                              <input type='hidden' name='itemID' value='".$row['mfID']."'>
                              <button name='submit' type='submit' class='btn btn-dark border-0' style='background-color: #E60c0c;'>Add to basket</button>
                          </form></p>";
                      }
                      else {
                        echo "<p class='text-center'><a href=\"login.php\" class='btn btn-dark border-0' style='background-color: #E60c0c;'>Add to basket</a></p>";
                      }
                    echo "</div>";
                  }
                  echo "</div>";
              ?>
            </p>
            <h4 id="list-item-3" class="mt-3">Drinks and Desserts</h4>
            <p class="mb-5">
              <?php
                  $sql = "SELECT * FROM drinkanddesserts";
                  $stmt = $conn->query($sql);
                  echo "<div class='container d-flex flex-wrap justify-content-between'>";
                  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    echo "<div class='container mb-5' style='width: 18rem;'>";
                      echo "<p class='text-center'><img src='proc/images/".$row['imgD']."' style='width:120px;height:160px; alt='Not Found' onerror=this.src='proc/images/noimage.jpg'></p>";
                      echo "<p class='text-center'>".$row['dName']."</p>";
                      echo "<p class='text-center text-muted mb-3'>".$row['dSize']."</p>";
                      echo "<p class=' text-center'>BD ".$row['dPrice']."</p>";
                      if(isset($_SESSION['username'])){
                      echo "<p><form  class=' text-center'method='POST' action='proc/additemtobasket-proc.php'>
                              <input type='hidden' name='userID' value='".$_SESSION['userid']."'>
                              <input type='hidden' name='itemType' value='0'>
                              <input type='hidden' name='itemID' value='".$row['dID']."'>
                              <button name='submit' type='submit' class='btn btn-dark border-0' style='background-color: #E60c0c;'>Add to basket</button>
                          </form></p>";
                      }
                      else {
                        echo "<p class='text-center'><a href=\"login.php\" class='btn btn-dark border-0' style='background-color: #E60c0c;'>Add to basket</a></p>";
                      }
                    echo "</div>";
                  }
                  echo "</div>";
              ?>
            </p>
          </div>
        </div>
      </div>
    </div>



    <!-- Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  -->
</body>
</html>

