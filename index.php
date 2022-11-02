<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Jasmis</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="proc/style.css">

    <style>
      input[type=text]:focus{
        outline: none;
      }
    </style>

</head>
<body>
    <?php
        include_once "header.php";
    ?>
    <div class="container mt-3">
      <form action="search.php" method="POST" class="form-inline d-flex md-form form-sm">
          <input class="ml-3 border-top-0 border-left-0 border-right-0 rounded-0 mr-1" type="text" name="search" placeholder="Search for menu......">
          <button type="submit" name="submit" class="btn px-0 pl-0 pr-0 mx-0 pt-0"><svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="mx-3" role="img" viewBox="0 0 24 24" focusable="false"><title>Search</title><circle cx="10.5" cy="10.5" r="7.5"></circle><path d="M21 21l-5.2-5.2"></path></svg></button>
      </form>
    </div>

    <?php
        if(isset($_GET['error'])){
            if($_GET['error'] == "empty"){
                echo "<p>Fill the field!</p>";
            }
        }
    ?>

    <div class="container mt-4 mb-2">
      <div id="carouselExampleControls" class="carousel slide w-100 shadow-sm" data-ride="carousel">
            <div class="carousel-inner">
              <div class="carousel-item active">
                <img src="proc/images/c1.webp" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="proc/images/c2.webp" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="proc/images/c3.webp" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="proc/images/c4.webp" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="proc/images/c5.webp" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="proc/images/c6.webp" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="proc/images/c7.webp" class="d-block w-100" alt="...">
              </div>
              <div class="carousel-item">
                <img src="proc/images/c8.webp" class="d-block w-100" alt="...">
              </div>
            </div>
            <button class="carousel-control-prev" type="button" data-target="#carouselExampleControls" data-slide="prev">
              <span class="carousel-control-prev-icon" aria-hidden="true"></span>
              <span class="sr-only">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-target="#carouselExampleControls" data-slide="next">
              <span class="carousel-control-next-icon" aria-hidden="true"></span>
              <span class="sr-only">Next</span>
            </button>
      </div>
      <div class="jumbotron justify-content-center text-center rounded-0 mt-5 w-100 bg-light bg-gradient-success shadow-sm mb-5">
        <h1 class="display-4 px-5">Our story begins in a small town</h1>
        <p class="lead px-5">In 1986, upon his return to Bahrain from the UK, a fresh university graduate, Jassim Al Ameen, noticed a growing need for food service industries in the country. Thus, he decided to start a family restaurant business, and coined from his own name, founded Jasmi’s.</p>
        <p class="lead px-5">In 1990, his younger brother Adnan Al Ameen, also a university graduate, returned from the USA and helped his brother lead Jasmi’s, acting today as the Vice President. The partnership between the two brothers strengthened the success of Jasmi’s Corporation and they spent years experimenting with food and understanding the market of Bahrain in order to create value for customers and address their needs.</p>
      </div>

        <div class="container text-center mb-0">
          <div class="row d-flex justify-content-center justify-content-between">
            <div class="card rounded-0 shadow-sm mystyle" style="width: 48%;">
              <div class="card-body">
                <h3 class="card-title">About Us</h3>
                <p class="card-text pt-4">As a restaurant, we’re proud to say we’re always committed to driving the best quality of both food and service to our customers. Without you, there would be no us. Therefore, we make it our mission to be the Jasmi’s you want. We are always dedicated to the innovation of preparing quality food and the quality of ingredients used in the process. We are constantly in research of building upon and improving our quality offered, and understanding what is good for you and your family as a family-oriented fast food chain.This is why our food philosophy is this—Because Quality Matters.™</p>
                <div class="container text-right pr-5 pt-3">
                  <p class="card-text"><a href="aboutus.php" class="btn btn-secondary rounded-pill border-0" style="background-color: #E60c0c;">Learn more</a></p>
                </div>
              </div>
            </div>


            <div class="card rounded-0 shadow-sm mystyle pb-4" style="width: 48%;">
              <div class="card-body">
                <h4 class="card-title lead" style="font-size: 25px;">Explore Our</h4>
                <h3 class="card-title" style="letter-spacing: 6px;">NUTRITION FACTS</h3>
                <div class="container text-right pr-5">
                  <p class="card-text"><a href="nutritionfacts.php" class="btn btn-dark rounded-pill border-0" style="background-color: #E60c0c;">Learn more</a></p>
                </div>
                <img src="proc/images/nutrition facts.webp" class="img-fluid w-50 h-75">
              </div>
            </div>
          </div>
        </div>
    </div>


    <?php
    include_once "backtotop.php";
    include_once "footer.php";
    ?>

</body>
</html>
