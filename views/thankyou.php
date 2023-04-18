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

  .chose_btn,.btn{
    border-radius: 100px;
    /* background-color: aquamarine; */
  }

  td, thead{
  text-align:center;
  height:40px;
  line-height:40px;
  }

  </style>
    <title>minnnanopole</title>
</head>

<body>
  <?php
  session_start();
  include "nav.php";
  ?>

  <form action="../views/home.php" method="post">
  <div class="container my-5 pt-5">
    <div class="row">
      <h5 class="text-center mt-5">ご発注ありがとうございます</h5>
      <p class="text-center mb-3">ご注文を承りました。
        配送日程はご登録いただいたメール宛にお送りいたします。</p>
    </div>
  

  <div class="row chose_btn pt-3 pb-5">
    <button class="btn btn-warning btn-lg mt-5 font-weight-bold mx-auto col-4" href="#" role="button">
    TOPページに戻る
    </button>
  </form>
</div>

  </div>

  


  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js" integrity="sha384-Qg00WFl9r0Xr6rUqNLv1ffTSSKEFFCDCKVyHZ+sVt8KuvG99nWw5RNvbhuKgif9z" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

<div class="fixed-bottom">
<?php 
  include "footer.php";

  ?>
</div>
</div>


</html>