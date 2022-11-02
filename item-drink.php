<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>add item</title>
</head>
<body>

    <?php
        include_once "header.php";
        if($_SESSION['usertype'] != 'Admin'){
            header("Location: index.php");
                exit();
        }
    ?>
    <div class="container mt-5 mb-4 rounded shadow-sm" style="width:50%;">
      <h1 class="display-4 text-center mb-4">Add new drink</h1>
      <div class="container w-75 mt-5">
        <form method="POST" action="proc/item-drink-proc.php" enctype="multipart/form-data">
            <p>Name of Drink:
            <input type="text" name="name" class="form-control w-75" placeholder="Pepsi...." required autofocus></p><br>
            <p>Size of Drink:</p>
            <input type="radio" id="medium" name="size" value="M">
            <label for="medium">Medium</label><br>
            <input type="radio" id="large" name="size" value="L">
            <label for="large">Large</label><br><br>
            <p>Price of drink in BD:
            <input type="text" name="price" class="form-control w-75" placeholder="0.500......" required autofocus></p><br>
            <p>Add image for the drink:</p>
            <input type="file" name="upImg"><br><br>
            <div class="container text-center">
              <input type="submit" name="submit" class="btn btn-dark border-0 w-25 mb-4" style="background-color: #E60c0c;">
            </div>
        </form>
      </div>
    </div>

    <?php
        //input validation

        if(isset($_GET['error'])){
            if($_GET['error'] == "empty"){
                echo "<p>Fill all fields!</p>";
            }
            elseif($_GET['error'] == "None"){
                echo "<p>drink has been added!</p>";
            }
            elseif($_GET['error'] == "imgsize"){
                echo "<p>image size must not exceed 4 MB!</p>";
            }
            elseif($_GET['error'] == "imgext"){
                echo "<p>file type must be jpg,jpeg,PNG!</p>";
            }
        }
        include_once "footer.php";
    ?>

</body>
</html>
