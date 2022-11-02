<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Profile</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="proc/style.css">

</head>
<body>

    <?php
        include_once "header.php";
        include_once "proc/dbc-proc.php";
    ?>
    <div class="container justify-content-center border-bottom mt-5">
      <h5 class="text-drak font-weight-normal mb-4">My Profile</h5>

    </div>
    <div class="container text-center w-75 shadow-sm">
      <?php
      if(isset($_SESSION['username'])){
      if($_GET['id'] >= 1){
        //display user information
        $getid = $_GET['id'];
        $sql = "SELECT * FROM users where usersID = '$getid';";
        $stmt = $conn->query($sql);
        echo "<div class='container text-center mt-5'>";
        echo "<div class='container text-center mt-5 pt-5'><h1 class='display-4'>Profile information</h1></div>";
        while ($row = $stmt->fetch()) {
          $tmpuid = $row['usersID'];
          echo "<div class='container text-left pl-5 mt-5' style='width:25rem'>";;
          echo "<h6 class='lead font-weight-bold'>Name &nbsp <span class='lead'>".$row['usersName']."</span></h6><br>"."<h6 class='lead font-weight-bold'>Email &nbsp <span class='lead'>".$row['usersEmail']."</span></h6><br>".
          "<h6 class='lead font-weight-bold'>Phone &nbsp <span class='lead'>".$row['usersPhone']."</span></h6><br>";
          echo "</div>";
          echo "</div>";
        }
        if($_SESSION['userid'] == $tmpuid){
          // edit profile
          echo "<div class='container mt-5 mb-5'>";
          echo "<div class='container mb-4'><h1 class='display-4'>Edit Profile</h1></div>";
          echo "<div class='container text-center' style='width: 40%;'>";
          echo '<form method="POST" action="proc/editProfile-proc.php">';
          echo    '<input type="hidden" name="cidd" value="'.$tmpuid.'"';
          echo    '<br>';
          echo    '<input type="text" name="cname" placeholder="change name...." class="form-control">';
          echo    '<br>';
          echo    '<input type="text" name="cemail" placeholder="change email...." class="form-control">';
          echo    '<br>';
          echo    '<input type="text" name="cphone" placeholder="change phone...." class="form-control">';
          echo    '<br>';
          echo    '<input type="password" name="cpwd" placeholder="change password...." class="form-control">';
          echo    '<br>';
          echo    '<input type="password" name="cpwdrepeat" placeholder="repeat password...." class="form-control">';
          echo    '<br>';
          echo    '<input type="submit" name="submitchange" value="submit" class="btn btn-dark border-0 w-25 mb-5" style="background-color: #E60c0c;">';
          echo    '<br>';

          // input validation
          if(isset($_GET['err'])){
            if($_GET['err'] == "None"){
              echo "<p>information has been updated!</p>";
            }
            elseif($_GET['err'] == "invalidCharUser"){
              echo "<p>invalid input!</p>";
            }
            elseif($_GET['err'] == "empty"){
              echo "<p>empty fields!</p>";
            }
          }
          echo    '</form>';
          echo    "</div>";
          echo    "</div>";
        }
        else {
          header("Location: profile.php?id=".$_SESSION['userid']);
          exit();
        }
      }
      else {
        header("Location: index.php");
        exit();
      }
    }
    else {
      header("Location: index.php?des=forbidden");
      exit();
    }
    ?>
  </div>

  <?php
      include_once "footer.php";
  ?>
</body>
</html>
