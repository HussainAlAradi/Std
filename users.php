<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Users</title>
</head>
<body>
  <?php
      include_once "header.php";
      include_once "proc/dbc-proc.php";
  ?>
  <div class="container">
    <div class="container border-bottom px-2 py-3 pt-md-5 pb-md-4 mx-auto ">
      <h1 class="mb-1 font-weight-light">Users</h1>
    </div>

    <div class="container mt-5 mb-5 pt-2 pb-4">
      <?php
          if(!isset($_SESSION['username'])){
              header("Location: index.php");
                  exit();
          }
          if($_SESSION['usertype'] != 'Admin'){
              header("Location: index.php");
                  exit();
          }
      ?>
      <br>
      <?php
          $sql = "SELECT * FROM users";
          $stmt = $conn->query($sql);
              echo "<table class='table'>";
                      echo "<thead>";
                      echo "<tr>";
                      echo    "<th>Type</th>";
                      echo    "<th>Username</th>";
                      echo    "<th>Email</th>";
                      echo    "<th>Phone</th>";
                      echo    "<th>Change type</th>";
                      echo "</tr>";
                      echo "</thead>";
                      echo "<tbody>";
              while($row = $stmt->fetch(PDO::FETCH_ASSOC)){
                  echo "<tr>";
                  echo "<td>".$row['usersType']."</td>";
                  echo "<td>".$row['usersName']."</td>";
                  echo "<td>".$row['usersEmail']."</td>";
                  echo "<td>".$row['usersPhone']."</td>";
                  echo "<td><form method='POST' action='proc/change-proc.php'>
                              <input type='hidden' name='userid' value='".$row['usersID']."'>
                              <button type='submit' name='staff' class='btn btn-dark border-0' style='background-color: #E60c0c;'>Staff</button>
                              <button type='submit' name='admin' class='btn btn-dark border-0' style='background-color: #E60c0c;'>Admin</button>
                            </form></td></tr>";
              }
              echo "</tbody>";
              echo "</table>";


      ?>
    </div>
  </div>
  <?php
    include_once "footer.php";
  ?>
</body>
</html>
