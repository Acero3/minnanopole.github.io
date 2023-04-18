<?php
  session_start();
  include "nav.php";
  include "../classes/product.php";
  $Product = new Product;

  if (isset($_POST['btn_pay'])){
    $user_id = $_SESSION["user_id"];
    $Product->buyPoles($user_id);
    header('Location:../views/thankyou.php');
  }

  $sum_launch = 0;
  $all_cart_Launch = $Product->getCartLaunch($_SESSION["user_id"]);
  
  while($cart_Launch = $all_cart_Launch->fetch_assoc()){
    $poles_launch_price = $cart_Launch['price'] * $cart_Launch['quantity'];
    $sum_launch+=$poles_launch_price;
  }
  
  $sum_recoil = 0;
  $all_cart_Recoil = $Product->getCartRecoil($_SESSION["user_id"]);
  while($cart_Recoil = $all_cart_Recoil->fetch_assoc()){
    $poles_recoil_price = $cart_Recoil['price'] * $cart_Recoil['quantity'];
    $sum_recoil+=$poles_recoil_price;
  }
?>

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
  <form action="" method="post">
    <div class="container my-5 pt-5">
      <div class="row">
        <h5 class="text-center my-5">支払いを行いますか？</h5>
      </div>
    
      <div class="row">
        <div class="col-2"></div>
        <div class="col-4 text-center"><h3>合計</h3></div>
        <div class="col-4 text-center"><h2>
          <?=
          $poles_sum_price = $sum_recoil + $sum_launch
          ?>
        </h2></div>
        <div class="col-2"></div>
      </div>
      <div class="row">
        <div class="col-8 mx-auto"><hr></div>
        <div class="col-8 mx-auto">
        <div class="text-center mt-5"><h3>Recoil pole</h3></div>
          <table class="table table-sm">
            <thead class="table-warning">
              <tr>
                <th scope="col-2">長さ（ft.）</th>
                <th scope="col-2">重さ（lbs.）</th>
                <th scope="col-2">本数</th>
                <!-- <th scope="col-2">単価</th> -->
                <th scope="col-4">金額</th>
              </tr>
            </thead>
            
            <tbody>
            <div class="row">
                    <?php
                    $sum_recoil = 0;
                    $all_cart_Recoil = $Product->getCartRecoil($_SESSION["user_id"]);
                    while($cart_Recoil = $all_cart_Recoil->fetch_assoc()){
                    ?>
                    <tr>
                      <?php
                      // die(print_r($cart_Recoil));
                      ?>
                      <td class="col-3">
                        <?=$cart_Recoil['length']?>
                      </td>
                      <td class="col-3">
                        <?=$cart_Recoil['weight']?>
                      </td>
                      <td class="col-3">
                        <?=$cart_Recoil['quantity']?>
                      </td>
                      <td class="col-3" hidden>
                        <?=$cart_Recoil['price']?>
                      </td>
                      <td class="col-3" hidden>
                        <?=$cart_Recoil['id']?>
                      </td>
                      <td class="col-3">
                        <?=$poles_recoil_price = $cart_Recoil['price'] * $cart_Recoil['quantity']?>
                      </td>
                      <?php
                        // echo "<br>$sum+".$poles_price;
                        $sum_recoil+=$poles_recoil_price;
                        }
                      ?>
                    </tr>
                  </div>
            </tbody>
          </table>

        <div class="text-center mt-5"><h3>Launch pole</h3></div>
          <table class="table table-sm">
            <thead class="table-warning">
              <tr>
                <th scope="col-2">長さ（ft.）</th>
                <th scope="col-2">重さ（lbs.）</th>
                <th scope="col-2">本数</th>
                <!-- <th scope="col-2">単価</th> -->
                <th scope="col-4">金額</th>
              </tr>
            </thead>
            <tbody>
              <div class="row">
                <?php
                $sum_launch = 0;
                $all_cart_Launch = $Product->getCartLaunch($_SESSION["user_id"]);
                while($cart_Launch = $all_cart_Launch->fetch_assoc()){
                ?>
                <tr>
                  <?php
                  // die(print_r($cart_Recoil));
                  ?>
                  <td class="col-3">
                    <?=$cart_Launch['length']?>
                  </td>
                  <td class="col-3">
                    <?=$cart_Launch['weight']?>
                  </td>
                  <td class="col-3">
                    <?=$cart_Launch['quantity']?>
                  </td>
                  <td class="col-3" hidden>
                    <?=$cart_Launch['id']?>
                  </td>
                  </td>
                  <td class="col-3" hidden>
                    <?=$cart_Launch['price']?>
                  </td>
                  <td class="col-3">
                    <?=$poles_launch_price = $cart_Launch['price'] * $cart_Launch['quantity']?>
                  </td>
                  <?php
                    // echo "<br>$sum+".$poles_price;
                    $sum_launch+=$poles_launch_price;
                    }
                  ?>
                </tr>
              </div>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <div class="row chose_btn pt-3 pb-5">
      <a class="btn btn-outline-warning btn-sm mt-5 font-weight-bold mx-auto col-4" href="../views/buy_poles.php" role="button"><span style="display: flex;
      justify-content: center;
      align-items: center;">戻る</span></a>
      <button class="btn btn-warning btn-lg mt-5 font-weight-bold mx-auto col-4" href="" name="btn_pay" role="button">
        支払う
      </button>
    </div>
  </form>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js" integrity="sha384-Qg00WFl9r0Xr6rUqNLv1ffTSSKEFFCDCKVyHZ+sVt8KuvG99nWw5RNvbhuKgif9z" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
</body>

<?php
  include "footer.php";
  ?>

</html>