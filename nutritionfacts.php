<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>Nutrition facts</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">

  </head>
  <body>
    <?php
        include_once "header.php";
    ?>

    <div class="container mt-4">
      <div id="carouselExampleControls" class="carousel slide shadow-sm pt-2" data-ride="carousel" style="width: 40%; margin: auto;">
        <div class="carousel-inner">
          <div class="carousel-item active">
            <img src="proc/images/nfrc.webp" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="proc/images/nfsc.webp" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="proc/images/nfrm.webp" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="proc/images/nfsm.webp" class="d-block w-100" alt="...">
          </div>
          <div class="carousel-item">
            <img src="proc/images/nfff.webp" class="d-block w-100" alt="...">
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
    </div>

    <?php
      include_once "footer.php";
    ?>

  </body>
</html>
