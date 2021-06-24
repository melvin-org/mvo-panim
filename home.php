<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Poggo</title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <script src="https://kit.fontawesome.com/3434f10350.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="scss/syles.css">
  <link rel="stylesheet" href="style.css" type="text/css">
</head>

<body>
  <!--Navigation bar-->
  <!-- <nav class="navbar navbar-expand-lg navbar-light bg-light py-3 fixed-top">
        <img src="img/logo1.png" alt="" height="45px">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
      
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">

            <li class="nav-item">
              <a class="nav-link" href="#">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Mystery Sale</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#">Apparel</a>
              </li>

              <li class="nav-item">
                <a class="nav-link" href="#">Collection</a>
              </li>

              <li class="nav-item">
                <i class="fas fa-user"></i>
                <i class="fas fa-shopping-cart"></i>
              </li>
          </div>
      </nav>  -->

  <?php
  include 'header.php';
  ?>

  <div class="page-wrapper">

    <section id="home">
      <div class="container">
        <h1><span>Poggo Cat</span></h1>
        <p>Browse our new merchandise arrivals!</p>
        <button>Shop Now</button>
      </div>
    </section>
    <br>
    <section id="featured" class="w-100">
      <div class="row p-0 m-0">
        <div class="f1 col-lg-4 col-md-12 col-12 p-0">
          <img class="img-fluid" src="img/shirt.png" alt="">
          <div class="details">
            <h2>Pocket Poggo T-Shirt</h2>
            <button class="text-uppercase">Shop Now</button>
          </div>
        </div>
        <div class="f1 col-lg-4 col-md-12 col-12 p-0">
          <img class="img-fluid" src="img/bag.png" alt="">
          <div class="details">
            <h2>Pocket Drawstring Bag</h2>
            <button class="text-uppercase">Shop Now</button>
          </div>
        </div>
        <div class="f1 col-lg-4 col-md-12 col-12 p-0">
          <img class="img-fluid" src="img/pouch.png" alt="">
          <div class="details">
            <h2>Pocket Pouches</h2>
            <button class="text-uppercase">Shop Now</button>
          </div>
        </div>
      </div>
    </section>

    <section id="new" class="my-5 pb-5">
      <div class="container text-center mt-5 py-5">
        <h3>New Arrivals</h3>
        <hr class="mx-auto">
        <p>Get the latest and exclusive Poggo merchandise release.</p>
      </div>
      <div class="row mx-auto container-fluid">
        <div class="product text-center col-lg-3 col-md-4 col-12">
          <img class="img-fluid mb-3" src="img/product1.png" alt="">
          <h5 class="name">POGGO Patches</h5>
          <h4 class="price">RM 6.00</h4>
          <button class="addtoCart">Add to cart</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-12">
          <img class="img-fluid mb-3" src="img/product1.png" alt="">
          <h5 class="name">POGGO Patches 1</h5>
          <h4 class="price">RM 8.00</h4>
          <button class="addtoCart">Add to cart</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-12">
          <img class="img-fluid mb-3" src="img/product1.png" alt="">
          <h5 class="name">POGGO Patches 2</h5>
          <h4 class="price">RM 10.00</h4>
          <button class="addtoCart">Add to cart</button>
        </div>
        <div class="product text-center col-lg-3 col-md-4 col-12">
          <img class="img-fluid mb-3" src="img/product1.png" alt="">
          <h5 class="name">POGGO Patches 3</h5>
          <h4 class="price">RM 12.00</h4>
          <button class="addtoCart">Add to cart</button>
        </div>
      </div>
    </section>


  </div>

  <?php
  include 'footer.php';
  ?>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>

</html>