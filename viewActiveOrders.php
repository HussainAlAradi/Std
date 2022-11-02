<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Active Orders</title>


        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="proc/style.css">
  </head>
  <body class="mb-5">

<?php






    include_once "header.php";



    try{

    require('proc/dbc-proc.php');
    if(isset($_SESSION['username'])){
      include_once "proc/functions-proc.php";
      echo "<div class='container border-bottom px-2 py-3 pt-md-5 pb-md-4 mx-auto'>";
      echo "<h1 class='mb-1 font-weight-light'>Active Orders</h1>";
      echo "</div>";
      echo "<div class='container mt-5 mb-5 pb-5'>";
      echo"<form  method='post'>";
        echo"<table class='table table-striped text-center border-bottom'>";
        echo"  <thead>";
          echo"  <tr>";
              echo"<th>Order ID </th>";
                echo"<th> Order placed date</th>";
                  echo"<th>Total Price</th>";
                echo "<th>Order status</th>";
                echo"  <th>Customer ID </th>";
                echo "<th> Update order status</th>";

            echo"</tr>";
          echo"</thead>";
          echo"<tbody>";
          echo "</form>";
          $rr=$conn->query("select * from orders where status='Received'");
          $ra=$conn->query("select * from orders where status='Acknowledged'");
          $ri=$conn->query("select * from orders where status='In process'");


          while($row = $rr->fetch())
          {

          echo "<tr>";
          echo"<td>".$row['id']."</td>";
          echo"<td>".$row['oPlacedDate']."</td>";
          echo"<td>".$row['total']." BD"."</td>";
          echo"<td>".$row['status']."</td>";
          echo"<td>".$row['usersID']."</td>";
          echo "<td><form method='POST' action='proc/updateStatus-proc.php'>
                      <input type='hidden' name='orderID' value='".$row['0']."'>
                      <button type='submit' name='Acknowledged' class='btn btn-dark border-0' style='background-color: #E60c0c;'>Acknowledged</button>
                      <button type='submit' name='InProcess' class='btn btn-dark border-0' style='background-color: #E60c0c;'>In process</button>
                      <button type='submit' name='Completed' class='btn btn-dark border-0' style='background-color: #E60c0c;'>Completed</button>


                    </form></td>";

          }
          while($row = $ra->fetch())
          {

          echo "<tr>";
          echo"<td>".$row['id']."</td>";
          echo"<td>".$row['oPlacedDate']."</td>";
          echo"<td>".$row['total']." BD"."</td>";
          echo"<td>".$row['status']."</td>";
          echo"<td>".$row['usersID']."</td>";
          echo "<td><form method='POST' action='proc/updateStatus-proc.php'>
                      <input type='hidden' name='orderID' value='".$row['0']."'>
                      <button type='submit' name='InProcess' class='btn btn-dark border-0' style='background-color: #E60c0c;'>In process</button>
                      <button type='submit' name='Completed' class='btn btn-dark border-0' style='background-color: #E60c0c;'>Completed</button>


                    </form></td>";


          }
          while($row = $ri->fetch())
          {

          echo "<tr>";
          echo"<td>".$row['id']."</td>";
          echo"<td>".$row['oPlacedDate']."</td>";
          echo"<td>".$row['total']." BD"."</td>";
          echo"<td>".$row['status']."</td>";
          echo"<td>".$row['usersID']."</td>";
          echo "<td><form method='POST' action='proc/updateStatus-proc.php'>
                      <input type='hidden' name='orderID' value='".$row['0']."'>
                      <button type='submit' name='Completed' class='btn btn-dark border-0' style='background-color: #E60c0c;'>Completed</button>


                    </form></td>";


          }
          echo "</tr>";
          echo "</tbody>";
          echo "</table>";
          echo "</div>";

            $conn =null;

          }
        }


          catch (PDOException $ex){
            die("Error Message". $ex->getMessage());
          }

?>
<div class="mt-5">
<?php
 include_once "footer.php";
?>
</div>



</body>
</html>
