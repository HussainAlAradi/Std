<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Add item</title>

    <style>
    html {
      font-size: 14px;
    }
    @media (min-width: 768px) {
      html {
        font-size: 16px;
      }
    }

    .items-header {
      max-width: 700px;
    }

    .container {
      max-width: 960px;
    }

    .cstyle .card{
      min-width: 220px;
    }

    .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }

    </style>
</head>
<body>

    <?php
        include_once "header.php";
        if($_SESSION['usertype'] != 'Admin'){
            header("Location: index.php");
                exit();
        }
    ?>
    <div class="items-header pt-md-5 pb-md-4 mx-auto text-center">
      <h1 class="display-4">Add new item</h1>
      <p class="lead mb-5">add new items to the menu.</p>
    </div>


    <div class="container w-75 pb-4">
      <h4 class="text-left font-weight-normal lead mb-4 mt-4">* Select type of item to add</h4>
      <div class="card-deck mb-3 text-center">
        <div class="card shadow-sm cstyle mb-5">
          <div class="card-header">
            <button type="button" name="single" class="btn btn-block btn-light btn-lg py-0"><a href="item-single.php" class="text-decoration-none text-dark"><h4 class="my-0 font-weight-normal">Single item</h4></a></button>
          </div>
        </div>

        <div class="card shadow-sm cstyle mb-5">
          <div class="card-header">
            <button type="button" class="btn btn-light btn-lg btn-block py-0"><a href="item-meal.php" class="text-decoration-none text-dark"><h4 class="my-0 font-weight-normal">Meal item</h4></a></button>
          </div>
        </div>

        <div class="card shadow-sm cstyle mb-5">
          <div class="card-header">
            <button type="button" class="btn btn-light btn-lg btn-block py-0"><a href="item-drink.php" class="text-decoration-none text-dark"><h4 class="my-0 font-weight-normal">Drink item</h4></a></button>
          </div>
        </div>

      </div>
    </div>


    <?php
      include_once "footer.php";
    ?>

</body>
</html>
