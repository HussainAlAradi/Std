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
      <h1 class="display-4 text-center mb-4">Add new meal item</h1>
      <div class="container w-75 mt-5">
        <form method="POST" action="proc/item-meal-proc.php" enctype="multipart/form-data">
            <p>Name of Meal:<input type="text" name="name" class="form-control w-75" placeholder="Mighty Chicken Meal...."  required autofocus> </p><br>
            <p>Type of Food:</p>
            <input type="radio" id="regular" name="type" value="regular">
            <label for="regular">Regular</label><br>
            <input type="radio" id="spicy" name="type" value="spicy">
            <label for="spicy">Spicy</label><br><br>
            <p>Price of Food in BD:
            <input type="text" name="price" class="form-control w-75" placeholder="1.500......"  required autofocus></p><br>
            <p>Category of Food:</p>
            <input type="radio" id="chicken" name="category" value="chicken">
            <label for="chicken">Chicken</label><br>
            <input type="radio" id="beef" name="category" value="beef">
            <label for="beef">Beef</label><br><br>
            <p>Add image for the meal:</p>
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
                echo "<p>item has been added!</p>";
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
