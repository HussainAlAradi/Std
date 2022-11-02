<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>


        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

        <link rel="stylesheet" type="text/css" href="proc/style.css">

  </head>
  <body>

  <?php






      include_once "header.php";



      try{
      require('proc/dbc-proc.php');

        $sql="select * from orders";
    if(isset($_SESSION['username'])){
      include_once "proc/functions-proc.php";
      if ($_SESSION['usertype'] == "user") {
        $userID=$_SESSION['userid'];
          echo "<div class='container border-bottom px-2 py-3 pt-md-5 pb-md-4 mx-auto'>";
          echo "<h1 class='mb-1 font-weight-light'>My orders</h1>";
          echo "</div>";
          echo "<div class='container mt-5'>";
          echo"<form  method='post'>";
            echo"<table class='table table-striped text-center border-bottom'>";
            echo"  <thead>";
              echo"  <tr>";
                  echo"<th>Order ID </th>";
                    echo"<th> Order placed date</th>";
                      echo"<th>Total Price</th>";
                    echo "<th>Order status</th>";
                    echo "<th></th>";
                echo"</tr>";
              echo"</thead>";
              echo"<tbody>";
              echo "</form>";
          $rs=$conn->query("select * from orders where usersID=".$_SESSION['userid']);
          $conn=NULL;
          while($row = $rs->fetch())
          {

            echo "<tr>";
            echo"<td class='py-4'>".$row['id']."</td>";
            echo"<td class='py-4'>".$row['oPlacedDate']."</td>";
            echo"<td class='py-4'>".$row['total']." BD"."</td>";
            echo"<td class='py-4'>".$row['status']."</td>";

            if($row['status']=='Completed'){
            echo "<td class='py-4'>";
            echo "<p><form class='text-center' method='POST' action='proc/reorder-proc.php'>
                    <input type='hidden' name='userID' value='".$_SESSION['userid']."'>
                    <input type='hidden' name='orderID' value='".$row['id']."'>
                    <button name='submit' type='submit' onClick='basket.php' class='btn btn-dark border-0' style='background-color: #E60c0c;'>Order Again </button>
                </form></p></td>";
            }


          else{
            echo "<td class='py-4'></td>";
          }
        }

        echo "</tr>";
        echo "</tbody>";
        echo "</table>";
        echo "</div>";

}


          if($_SESSION['usertype'] == "Admin" || $_SESSION['usertype'] == "Staff" ){
            echo "<div class='container border-bottom px-2 py-3 pt-md-5 pb-md-4 mx-auto'>";
            echo "<h1 class='mb-1 font-weight-light'>Orders Record</h1>";
            echo "</div>";
            echo "<div class='container mt-5'>";
            echo"<form  method='post'>";
              echo"<table class='table table-striped text-center border-bottom'>";
              echo"  <thead>";
                echo"  <tr>";
                    echo"<th>Order ID </th>";
                      echo"<th> Order placed date</th>";
                        echo"<th>Total Price</th>";
                      echo "<th>Order status</th>";
                      echo"  <th>Customer ID </th>";

                  echo"</tr>";
                echo"</thead>";
                echo"<tbody>";
                echo "</form>";
          $rw=$conn->query($sql);
          while($row = $rw->fetch())
          {

            echo "<tr>";
            echo"<td class='py-4'>$row[id]</td>";
            echo"<td class='py-4'>".$row['oPlacedDate']."</td>";
            echo"<td class='py-4'>".$row['total']." BD"."</td>";
            echo"<td class='py-4'>".$row['status']."</td>";
            echo"<td class='py-4'>".$row['usersID']."</td>";

        }
        echo "</tr>";
        echo "</tbody>";
        echo "</table>";
        echo "</div>";
      }




      $conn =null;
}

}


catch (PDOException $ex){
  die("Error Message". $ex->getMessage());
}

include_once "footer.php";
?>




</body>
</html>
