<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>minnnanopole</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style type="text/css">
    @import url('https://fonts.googleapis.com/css2?family=Oswald:wght@700&family=Raleway&display=swap');
    body {
      background-color: rgb(244, 244, 244);
    }
    h5 {
      font-family: 'Oswald', sans-serif;
    }
    p, li, td, th {
      font-family: 'Raleway', sans-serif;
    }
    body {
      padding-top:54px;
    } 
    .jumbotron {
    background-image: url("../photo/TOP.png");
    background-size: cover;
    background-position: center 0%;
    min-width: 100%;
    height: 32rem;
    }

    .jumbotron_bottom {
    margin-top: 100px;
    background-image: url("../photo/about\ ESSEX.png");
    background-size: cover;
    background-position: center 0%;
    min-width: 100%;
    height: 32rem;
    padding-top: 80px;
    }


    .card, .card .card-body{
      border-radius: 20px;
    }

    .container,.btn{
      border-radius: 100px;
      /* background-color: aquamarine; */
    }

  </style>
    <title>minnnanopole</title>
</head>

<body>
  <?php
  session_start();
  include "nav.php";
  ?>
  <!-- <nav class="navbar navbar-expand-md navbar-light fixed-top bg-white py-0">
    <div class="container">
      <a class="navbar-brand mr-5" href="#"><img src="../materials/minnnanopole.png" width="200" alt="logo"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-header" aria-controls="navbar-header" aria-expanded="false" aria-label="ナビゲーションの切替">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar-header">
        <div class="container-fluid mt-2">
          <a class="nav-link">Welcome "<?= $_SESSION['username'] ?>"</a>
        </div>
        <ul class="navbar-nav mt-2 d-flex align-items-center">
          <li class="nav-item">
          </li>
          <li class="nav-item ml-5">
            <a href="../actions/logout.php" class="nav-link"><i class="fa-solid fa-cart-shopping"></i></a>
          </li>
          <li class="nav-item">
            <a href="../actions/logout.php" class="nav-link"><i class="fa-regular fa-user"></i></a>
          </li>
          <li class="nav-item mt-3 mx-2">
            <p>
              <a href="../actions/logout.php" class="nav-link">Logout</a>
            </p>
          </li>
        </ul>
      </div>
    </div>
  </nav> -->


  <div class="jumbotron jumbotron-fluid">
    <div class="container">
      <h2 class="text-light text-right mt-5 pt-5">最適なポールを、いつもこの手に</h2>
      <div class="row justify-content-end">
        <div class="col-6 text-end">
            <a class="lead text-right text-light text-decoration-none">minnanopole とは</a>
            <br>
          </div>
          <div class="row justify-content-end">
            <div class="col-6 text-end">
              <a class="btn btn-warning btn-lg mt-5 font-weight-bold col-5" href="#poles" role="button">ポールをかりる</a>
            </div>
          </div>
      </div>
    </div>
  </div>
  
  <div class="container marketing" id="poles">
    <h1 class="text-center my-5">ポールをえらぶ</h1>
    <div class="row">
      <div class="col-6">
        <div class="card border-0 pb-5">
          <div class="card-body text-center bg-white">
            <img class="w-100 rounded" src="../materials/recoil_upper_box.png" alt="">
            <p class="mt-3">カーボンポール</p>
            <p>初心者・中級者・上級者・世界トップレベル向けシリーズ</p>
            <p>サイズ展開 : 11.6~16.9ft</p>
            <a class="btn btn-light btn-lg mt-5 shadow" href="../views/chose_recoil_pole.php" role="button">このポールをかりる</a>
          </div>
        </div>
      </div>
      <div class="col-6">
        <div class="card border-0 pb-5">
          <div class="card-body text-center bg-white">
            <img class="w-100 rounded" src="../materials/launch_upper_box.png" alt="">
            <br>
            <p class="mt-3">カーボンポール</p>
            <p>キッズ・初心者シリーズ</p>
            <p>サイズ展開 : 9~16.9ft</p>
            <a class="btn btn-light btn-lg mt-5 shadow" href="../views/chose_launch_pole.php" role="button">このポールをかりる</a>
          </div>
        </div>
      </div>

    </div>

  </div><!-- container -->

  <div class="jumbotron_bottom jumbotron-fluid">
    <div class="container text-center pt-5">
      <a class="lead text-right text-light"> ESSEX ポールとは</a>
    </div>
  </div>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js" integrity="sha384-Qg00WFl9r0Xr6rUqNLv1ffTSSKEFFCDCKVyHZ+sVt8KuvG99nWw5RNvbhuKgif9z" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>


<!-- <div class="footer-social row bg-black p-3">
  <div class="container">
    
  </div>
  <div class="social-widget col-4">
  <p class="text-warning ml-3"># 幸せの黄色いポール</p>
  </div>


  <div class="social-widget col-4 mx-auto">
    <div class="row justify-content-between">
      <div class="col-4">
        <a href="https://www.facebook.com/boutakachannel/" class="text-decoration-none mx-3 text-light ">
          <i class="fa-brands fa-facebook-f"></i>
        </a>
      </div>
      <div class="col-4">
        <a href="https://www.instagram.com" class="text-decoration-none mx-3 text-light">
          <i class="fa-brands fa-instagram"></i>
        </a>
      </div>
      <div class="col-4">
        <a href="https://twitter.com/BoutakaChannel" class="text-decoration-none mx-3 text-light">
          <i class="fa-brands fa-twitter"></i>
        </a>
      </div>
    </div>
</div>

<div class="social-widget col-4 text-light">
        <p class="mb-0">Contact Us</p>
        <p  class="mb-0">info@coffeebean.com</p>
        <p class="mb-0">1-444-123-4559</p>
        <p class="mb-0">Payment Boulevard 224, NewYork</p>
</div> -->

<?php
  include "footer.php";
  ?>

</div>

<!-- <div class="social-widget row text-light bg-black">
<p class="text-center">&copy;2022 minnanopole</p>
</div> -->

</html>