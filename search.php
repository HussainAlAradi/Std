<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Search</title>

    <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

</head>
<body>

    <?php
        include_once "header.php";
    ?>
    <?php

    if(isset($_POST['submit'])){

        require_once "proc/dbc-proc.php";
        require_once "proc/functions-proc.php";

        //fetch user input and store into variables
        $search = $_POST['search'];

        if(empty($search)){
            header("location: index.php?error=empty");
            exit();
        }

        try {
            echo "<div class='container mt-5'>";
            echo "<h4 class='pl-5 ml-5'>Meals</h4>";
            // prepare sql and bind parameters
            $sql = "SELECT * FROM mealfood WHERE mfName like '%$search%';";
            $stmt = $conn->query($sql);
            if($fetch = $stmt->fetch(PDO::FETCH_ASSOC)){
                $sql = "SELECT * FROM mealfood WHERE mfName like '%$search%';";
                $stmtm = $conn->query($sql);
                echo "<div class='container d-flex flex-wrap justify-content-between text-center'>";
                while($row = $stmtm->fetch(PDO::FETCH_ASSOC)){
                  echo "<div class='container mb-5' style='width: 18rem;'>";
                  echo "<p class='text-center'><img src='proc/images/".$row['imgM']."' style='width:180px;height:160px; alt='Not Found' onerror=this.src='proc/images/noimage.jpg'></p>";
                  echo "<p class='text-center'>".$row['mfName']."</p>";
                  echo "<p class='text-center text-muted mb-3'>".$row['mfType']."</p>";
                  echo "<p class=' text-center'>".$row['mfPrice']."</p>";
                  echo "</div>";
                }
                echo "</div>";

            } else {
                echo "<p class='lead mt-3 text-center'>No Meals Found</p>";
                echo "</div>";
            }


        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        echo "<br><br><br>";

        try {
            echo "<div class='container'>";
            echo "<h4 class='pl-5 ml-5'>Sandwiches</h4>";
            // prepare sql and bind parameters
            $sql = "SELECT * FROM singlefood WHERE sfName like '%$search%';";
            $stmt = $conn->query($sql);
            if($fetch = $stmt->fetch(PDO::FETCH_ASSOC)){
                $sql = "SELECT * FROM singlefood WHERE sfName like '%$search%';";
                $stmt1 = $conn->query($sql);
                echo "<div class='container d-flex flex-wrap justify-content-between'>";
                while($row = $stmt1->fetch(PDO::FETCH_ASSOC)){
                  echo "<div class='container mb-5' style='width: 18rem;'>";
                  echo "<p class='text-center'><img src='proc/images/".$row['imgS']."' style='width:180px;height:160px; alt='Not Found' onerror=this.src='proc/images/noimage.jpg'></p>";
                  echo "<p class='text-center'>".$row['sfName']."</p>";
                  echo "<p class='text-center text-muted mb-3'>".$row['sfType']."</p>";
                  echo "<p class=' text-center'>".$row['sfPrice']."</p>";
                  echo "</div>";
              }
              echo "</div>";

            } else {
                echo "<p class='lead mt-3 text-center'>No Sandwiches Found</p>";
                echo "</div>";
            }

        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

        echo "<br><br><br>";

        try {
            echo "<div class='container'>";
            echo "<h4 class='pl-5 ml-5'>Drinks</h4>";
            // prepare sql and bind parameters
            $sql = "SELECT * FROM drink WHERE drinkName like '%$search%';";
            $stmt = $conn->query($sql);
            if($fetch = $stmt->fetch(PDO::FETCH_ASSOC)){
                $sql = "SELECT * FROM drink WHERE drinkName like '%$search%';";
                $stmtd = $conn->query($sql);
                echo "<div class='container d-flex flex-wrap justify-content-between'>";
                while($row = $stmtd->fetch(PDO::FETCH_ASSOC)){
                  echo "<div class='container mb-5' style='width: 18rem;'>";
                  echo "<p class='text-center'><img src='proc/images/".$row['imgD']."' style='width:180px;height:160px; alt='Not Found' onerror=this.src='proc/images/noimage.jpg'></p>";
                  echo "<p class='text-center'>".$row['drinkName']."</p>";
                  echo "<p class='text-center text-muted mb-3'>".$row['drinkSize']."</p>";
                  echo "<p class=' text-center'>".$row['drinkPrice']."</p>";
                  echo "</div>";
                }
                echo "</div>";

            } else {
                echo "<p class='lead mt-3 mb-5 text-center'>No Drinks Found</p>";
                echo "</div>";
            }

        } catch(PDOException $e) {
            echo "Error: " . $e->getMessage();
        }

    } else {
        header("location: index.php?error=didNotSubmit");
        exit();
    }

    include_once "footer.php";
    ?>
</body>
</html>
