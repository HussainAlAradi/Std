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
        if($_SESSION['usertype'] != 'user'){
          header("Location: index.php");
          exit();
        }
    ?>
    <div class="container pt-3 justify-content-center">
      <div class='container border-bottom px-2 py-3 pt-md-5 pb-md-4 mx-auto'>
        <h1 class='mb-1 font-weight-light'>Basket</h1>
      </div>
      <div class="container">
        <div class="container w-75 pt-5 pb-2">
          <p><?php
              if(isset($_GET['c'])) {
                if($_GET['c'] === '0') {
                  if(@$_GET['error'] === '0') echo 'Failed to change quantity.';
                  else echo 'Quantity has been updated.';
                }
                elseif($_GET['c'] === '1') {
                  if(@$_GET['error'] === '0') echo 'Failed to remove food.';
                  else echo 'Food has been removed.';
                }
                elseif($_GET['c'] === '2') {
                  if(@$_GET['error'] === '0') echo 'Failed placing order.';
                  else echo 'Order has been placed.';
                }
              }
            ?></p>
          <p class="mb-5">
            <?php
                  $total_price = 0;
                  $sql = "SELECT basket.sfID, basket.qty, singlefood.imgS, singlefood.sfName, singlefood.sfPrice, singlefood.sfType FROM basket INNER JOIN singlefood ON basket.sfID = singlefood.sfID WHERE basket.usersID = $_SESSION[userid] AND basket.`type` = 2";
                  $stmt = $conn->query($sql);
                  echo "<div class='container d-flex flex-wrap justify-content-between'>";
                  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                      $basket_has_items = true;
                      $total_price += $row['sfPrice'] * $row['qty'];
                      echo "<div class='container mb-5' style='width: 15rem;'>";
                      echo "<p class='text-center'><img src='proc/images/".$row['imgS']."' style='width:180px;height:160px; alt='Not Found' onerror=this.src='proc/images/noimage.jpg'></p>";
                      echo "<p class='text-center'>".$row['sfName']."</p>";
                      echo "<p class='text-center text-muted mb-3'>".$row['sfType']."</p>";
                      echo "<p class=' text-center'>BD ".$row['sfPrice']."</p>";
                      echo "<p class=' text-center'><div class='input-group'>";
                      echo "<div class='input-group-btn'>
                              <form action='proc/additemqty-proc.php' method='POST'>
                                <input type='hidden' name='userID' value='".$_SESSION['userid']."'>
                                <input type='hidden' name='itemType' value='2'>
                                <input type='hidden' name='itemID' value='".$row['sfID']."'>
                                <input type='hidden' name='qty' value='-1'>
                                <button name='submit' class='btn btn-light'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-dash' viewBox='0 0 16 16'> <path d='M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z'/></svg></button>
                              </form>
                            </div>";
                      echo "<input type='text' class='form-control text-center qty' value='".$row['qty']."'>";
                      echo "<div class='input-group-btn'>
                              <form action='proc/additemqty-proc.php' method='POST'>
                                <input type='hidden' name='userID' value='".$_SESSION['userid']."'>
                                <input type='hidden' name='itemType' value='2'>
                                <input type='hidden' name='itemID' value='".$row['sfID']."'>
                                <input type='hidden' name='qty' value='1'>
                                <button name='submit' class='btn btn-light'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-plus' viewBox='0 0 16 16'><path d='M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z'/></svg></button>
                              </form>
                            </div>";
                      echo "</div><p></p>";
                      echo "<form class='text-center' action='proc/setitemqty-proc.php' method='POST' onsubmit='this.querySelector(\"[name=qty]\").value = this.parentNode.querySelector(\".qty\").value; return true;'>
                              <input type='hidden' name='userID' value='".$_SESSION['userid']."'>
                              <input type='hidden' name='itemType' value='2'>
                              <input type='hidden' name='itemID' value='".$row['sfID']."'>
                              <input type='hidden' name='qty'>
                              <button name='submit' type='submit' class='btn btn-warning btn-block'>Update</button>
                            </form>";
                      echo "<p></p><form class='text-center' action='proc/setitemqty-proc.php' method='POST'>
                              <input type='hidden' name='userID' value='".$_SESSION['userid']."'>
                              <input type='hidden' name='itemType' value='2'>
                              <input type='hidden' name='itemID' value='".$row['sfID']."'>
                              <input type='hidden' name='qty' value='0'>
                              <input type='hidden' name='remove' value='1'>
                              <button name='submit' type='submit' class='btn btn-danger btn-block'>Remove</button>
                            </form>";
                      echo "</div>";
                  }
                  echo "</div>";

              ?>
            </p>
            <p class="mb-5">
              <?php
                  $sql = "SELECT basket.mfID, basket.qty, mealfood.imgM, mealfood.mfName, mealfood.mfPrice, mealfood.mfType FROM basket INNER JOIN mealfood ON basket.mfID = mealfood.mfID WHERE basket.usersID = $_SESSION[userid] AND basket.`type` = 1";
                  $stmt = $conn->query($sql);
                  echo "<div class='container d-flex flex-wrap justify-content-between'>";
                  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $basket_has_items = true;
                    $total_price += $row['mfPrice'] * $row['qty'];
                    echo "<div class='container mb-5' style='width: 15rem;'>";
                    echo "<p class='text-center'><img src='proc/images/".$row['imgM']."' style='width:180px;height:160px; alt='Not Found' onerror=this.src='proc/images/noimage.jpg'></p>";
                    echo "<p class='text-center'>".$row['mfName']."</p>";
                    echo "<p class='text-center text-muted mb-3'>".$row['mfType']."</p>";
                    echo "<p class=' text-center'>BD ".$row['mfPrice']."</p>";
                    echo "<p class=' text-center'><div class='input-group'>";
                    echo "<div class='input-group-btn'>
                            <form action='proc/additemqty-proc.php' method='POST'>
                              <input type='hidden' name='userID' value='".$_SESSION['userid']."'>
                              <input type='hidden' name='itemType' value='1'>
                              <input type='hidden' name='itemID' value='".$row['mfID']."'>
                              <input type='hidden' name='qty' value='-1'>
                              <button name='submit' class='btn btn-light'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-dash' viewBox='0 0 16 16'> <path d='M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z'/></svg></button>
                            </form>
                          </div>";
                    echo "<input type='text' class='form-control text-center qty' value='".$row['qty']."'>";
                    echo "<div class='input-group-btn'>
                            <form action='proc/additemqty-proc.php' method='POST'>
                              <input type='hidden' name='userID' value='".$_SESSION['userid']."'>
                              <input type='hidden' name='itemType' value='1'>
                              <input type='hidden' name='itemID' value='".$row['mfID']."'>
                              <input type='hidden' name='qty' value='1'>
                              <button name='submit' class='btn btn-light'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-plus' viewBox='0 0 16 16'><path d='M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z'/></svg></button>
                            </form>
                          </div>";
                    echo "</div><p></p>";
                    echo "<form class='text-center' action='proc/setitemqty-proc.php' method='POST' onsubmit='this.querySelector(\"[name=qty]\").value = this.parentNode.querySelector(\".qty\").value; return true;'>
                            <input type='hidden' name='userID' value='".$_SESSION['userid']."'>
                            <input type='hidden' name='itemType' value='1'>
                            <input type='hidden' name='itemID' value='".$row['mfID']."'>
                            <input type='hidden' name='qty'>
                            <button name='submit' type='submit' class='btn btn-warning btn-block'>Update</button>
                          </form>";
                    echo "<p></p><form class='text-center' action='proc/setitemqty-proc.php' method='POST'>
                            <input type='hidden' name='userID' value='".$_SESSION['userid']."'>
                            <input type='hidden' name='itemType' value='1'>
                            <input type='hidden' name='itemID' value='".$row['mfID']."'>
                            <input type='hidden' name='qty' value='0'>
                            <input type='hidden' name='remove' value='1'>
                            <button name='submit' type='submit' class='btn btn-danger btn-block'>Remove</button>
                          </form>";
                    echo "</div>";
                  }
                  echo "</div>";
              ?>
            </p>
            <p class="mb-3">
              <?php
                  $sql = "SELECT basket.dID, basket.qty, drinkanddesserts.imgD, drinkanddesserts.dName, drinkanddesserts.dPrice, drinkanddesserts.dSize FROM basket INNER JOIN drinkanddesserts ON basket.dID = drinkanddesserts.dID WHERE basket.usersID = $_SESSION[userid] AND basket.`type` = 0";
                  $stmt = $conn->query($sql);
                  echo "<div class='container d-flex flex-wrap justify-content-between'>";
                  while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                    $basket_has_items = true;
                    $total_price += $row['dPrice'] * $row['qty'];
                    echo "<div class='container mb-5' style='width: 18rem;'>";
                    echo "<p class='text-center'><img src='proc/images/".$row['imgD']."' style='width:180px;height:160px; alt='Not Found' onerror=this.src='proc/images/noimage.jpg'></p>";
                    echo "<p class='text-center'>".$row['dName']."</p>";
                    echo "<p class='text-center text-muted mb-3'>".$row['dSize']."</p>";
                    echo "<p class=' text-center'>BD ".$row['dPrice']."</p>";
                    echo "<p class=' text-center'><div class='input-group'>";
                    echo "<div class='input-group-btn'>
                            <form action='proc/additemqty-proc.php' method='POST'>
                              <input type='hidden' name='userID' value='".$_SESSION['userid']."'>
                              <input type='hidden' name='itemType' value='0'>
                              <input type='hidden' name='itemID' value='".$row['dID']."'>
                              <input type='hidden' name='qty' value='-1'>
                              <button name='submit' class='btn btn-light'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-dash' viewBox='0 0 16 16'> <path d='M4 8a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 0 1h-7A.5.5 0 0 1 4 8z'/></svg></button>
                            </form>
                          </div>";
                    echo "<input type='text' class='form-control text-center qty' value='".$row['qty']."'>";
                    echo "<div class='input-group-btn'>
                            <form action='proc/additemqty-proc.php' method='POST'>
                              <input type='hidden' name='userID' value='".$_SESSION['userid']."'>
                              <input type='hidden' name='itemType' value='0'>
                              <input type='hidden' name='itemID' value='".$row['dID']."'>
                              <input type='hidden' name='qty' value='1'>
                              <button name='submit' class='btn btn-light'><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-plus' viewBox='0 0 16 16'><path d='M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z'/></svg></button>
                            </form>
                          </div>";
                    echo "</div><p></p>";
                    echo "<form class='text-center' action='proc/setitemqty-proc.php' method='POST' onsubmit='this.querySelector(\"[name=qty]\").value = this.parentNode.querySelector(\".qty\").value; return true;'>
                            <input type='hidden' name='userID' value='".$_SESSION['userid']."'>
                            <input type='hidden' name='itemType' value='0'>
                            <input type='hidden' name='itemID' value='".$row['dID']."'>
                            <input type='hidden' name='qty'>
                            <button name='submit' type='submit' class='btn btn-warning btn-block'>Update</button>
                          </form>";
                    echo "<p></p><form class='text-center' action='proc/setitemqty-proc.php' method='POST'>
                            <input type='hidden' name='userID' value='".$_SESSION['userid']."'>
                            <input type='hidden' name='itemType' value='0'>
                            <input type='hidden' name='itemID' value='".$row['dID']."'>
                            <input type='hidden' name='qty' value='0'>
                            <input type='hidden' name='remove' value='1'>
                            <button name='submit' type='submit' class='btn btn-danger btn-block'>Remove</button>
                          </form>";
                    echo "</div>";
                  }
                  echo "</div>";
              ?>
            </p>
          </div>
        </div><?php
          if(@$basket_has_items) {
        ?><div class="container">
          <div class="container w-50 border-top d-flex justify-content-between text-center px-5 py-5 mb-5">
            <div class="lead ml-5">Total Amount</div>
            <div class="lead mr-5">
              <span>BD</span>
              <span><?php echo number_format($total_price, 3, '.', ''); ?></span>
            </div>

          </div>
        </div>

      <div align="center" class="pt-5">
				<form action="proc/placeorder-proc.php" method="post">
					<p class="text-center"><button type="submit" name="userID" value="<?php echo $_SESSION['userid']; ?>" class="btn btn-success">Place Order</button></p>
				</form>
		</div><?php
          }
  ?></div>


    <?php
    include_once "backtotop.php";
      include_once "footer.php";
    ?>
    <!-- Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>
  -->
</body>
</html>
