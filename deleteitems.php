<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>delete item</title>

</head>
<body>
  <?php
    include_once "header.php";
    include_once "proc/dbc-proc.php";
    if($_SESSION['usertype'] != 'Admin'){
      header("Location: index.php");
      exit();
    }
  ?>
  <div class="container">
    <div class="container border-bottom px-2 py-3 pt-md-5 pb-md-4 mx-auto ">
      <h1 class="mb-1 font-weight-light">Delete Items</h1>
    </div>

    <div class="container mt-5 mb-5 pt-2">
      <h2 class="font-weight-light mb-4 pl-3">Single items</h3>
    </div>
    <div class="container mt-5 d-flex flex-wrap justify-content-center justify-content-between mystyle">
      <form>
        <?php
          $sql = "SELECT * FROM singlefood";
          $stmt = $conn->query($sql);
          while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            echo "<div class='card-deck mb-3 text-center cstyle'>";
            echo "<div class='card' style='min-width: 15rem;'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>".$row['sfName']."</h5>";
            echo "<h6 class='card-subtitle mb-2 text-muted'>".$row['sfType']."</h6>";
            echo "<p class='card-text'><ul class='list-unstyled'>";
            echo "<li>".$row['sfCategory']."</li>";
            echo "<li>".$row['sfPrice']." BD</li>";
            echo "</ul></p>";
            echo "<p><form method='POST' action='proc/deleteitems-proc.php'>
                          <input type='hidden' name='itemID' value='".$row['sfID']."'>
                          <button type='submit' class='btn btn-dark border-0' name='deleteS' style='background-color: #E60c0c;'>Delete</button>
                  </form></p>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
          }
        ?>
      </form>
    </div>


    <div class="container mt-5 mb-5 pt-2 w-100">
      <h2 class="font-weight-light mb-4 pl-3">Meal items</h3>
    </div>
    <div class="container mt-5 d-flex flex-wrap justify-content-center justify-content-between mystyle">
      <form>
        <?php
          $sql = "SELECT * FROM mealfood";
          $stmt = $conn->query($sql);
          while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            echo "<div class='card-deck mb-3 text-center cstyle'>";
            echo "<div class='card' style='min-width: 15rem;'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>".$row['mfName']."</h5>";
            echo "<h6 class='card-subtitle mb-2 text-muted'>".$row['mfType']."</h6>";
            echo "<p class='card-text'><ul class='list-unstyled'>";
            echo "<li>".$row['mfCategory']."</li>";
            echo "<li>".$row['mfPrice']." BD</li>";
            echo "</ul></p>";
            echo "<p><form method='POST' action='proc/deleteitems-proc.php'>
                          <input type='hidden' name='itemID' value='".$row['mfID']."'>
                          <button type='submit' class='btn btn-dark border-0' name='deleteM' style='background-color: #E60c0c;'>Delete</button>
                  </form></p>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
          }
        ?>
      </form>
    </div>


    <div class="container mt-5 mb-5 pt-2">
      <h2 class="font-weight-light mb-4 pl-3">Drink items</h3>
    </div>
    <div class="container mt-5 d-flex flex-wrap justify-content-center justify-content-between mystyle">
      <form>
        <?php
          $sql = "SELECT * FROM drinkanddesserts";
          $stmt = $conn->query($sql);
          while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
            echo "<div class='card-deck mb-3 text-center cstyle'>";
            echo "<div class='card' style='min-width: 15rem'>";
            echo "<div class='card-body'>";
            echo "<h5 class='card-title'>".$row['dName']."</h5>";
            echo "<h6 class='card-subtitle mb-2 text-muted'>".$row['dSize']."</h6>";
            echo "<p class='card-text'><ul class='list-unstyled'>";
            echo "<li>".$row['dPrice']." BD</li>";
            echo "</ul></p>";
            echo "<p><form method='POST' action='proc/deleteitems-proc.php'>
                          <input type='hidden' name='itemID' value='".$row['dID']."'>
                          <button type='submit' class='btn btn-dark border-0' name='deleteD' style='background-color: #E60c0c;'>Delete</button>
                  </form></p>";
            echo "</div>";
            echo "</div>";
            echo "</div>";
          }
        ?>
      </form>
    </div>
  </div>

  <?php
    include_once "footer.php";
  ?>
</body>
</html>
