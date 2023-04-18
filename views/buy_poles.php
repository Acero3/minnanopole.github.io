<?php
  session_start();
  include "nav.php";
  include "../classes/product.php";
  $Product = new Product;


  // if (isset($_POST['btn_delete'])){
  //   error_log("test");
  //   $user_id = $_SESSION["user_id"];
  //   $product_id = $_POST['product_id'];
  //   $user_id = $_SESSION["name"];
  //   $poles_recoil_price = $_POST['$poles_recoil_price'];
  //   $poles_recoil_launch = $_POST['$poles_launch_price'];
  //   print_r ($product_id);
  //     for ($i=0; $i<count($sum_price);$i++){
  //       if($sum_price[$i] > 0){
  //       $Product->addCart($user_id, $product_id[$i], $name[$i], $sum_price[$i]);
  //       echo $product_id[$i];
  //       echo $poles_recoil_price[$i];
  //       }
  //     }
  //     header('Location:../views/buy_poles.php');
  //     echo "$user_id $product_id $quantity";
  //   }

  if(isset($_POST['btn_delete_recoil'])){
    $Product->deletePoleRecoil($_POST['btn_delete_recoil']);
    // header("Location: ../views/buy_poles.php");
    // echo "TEST";
  }
  if(isset($_POST['btn_delete_launch'])){
    $Product->deletePoleLaunch($_POST['btn_delete_launch']);
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

    .button {
      border: none;
    }

    </style>
      <title>minnnanopole</title>
  </head>

  <body>
    <!-- <form action="../views/pay.php" method="post"> -->
      <div class="container my-5 pt-5">
        <div class="row">
          <h3 class="text-center my-5">カートには以下商品が入っています</h3>
        </div>

        <div class="row my-5">
          <div class="col-4">
            <img src="../materials/buy_recoil.png" alt="" class="w-100">
          </div>
          <div class="col-8">
            <div class="table-responsive">
              <table class="table table-sm">
                <thead class="table-warning">
                  <tr>
                    <th scope="col-2">長さ（ft.）</th>
                    <th scope="col-2">重さ（lbs.）</th>
                    <th scope="col-2">本数</th>
                    <th scope="col-4">金額</th>
                    <th scope="col-2"></th>
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
                      <td class="col-2">
                        <?=$cart_Recoil['length']?>
                      </td>
                      <td class="col-2">
                        <?=$cart_Recoil['weight']?>
                      </td>
                      <td class="col-2">
                        <?=$cart_Recoil['quantity']?>
                      </td>
                      <td class="col-2" hidden>
                        <?=$cart_Recoil['price']?>
                      </td>
                      <td class="col-2">
                        <?=$poles_recoil_price = $cart_Recoil['price'] * $cart_Recoil['quantity']?>
                        <input name="product_id[]" type="number" value="<?=$pole_recoil['id']?>" hidden>
                      </td>
                      <td class="col-2">
                        <form action="" method="POST">
                          <button name="btn_delete_recoil" class="btn btn-outline-warning btn-sm rounded-circle font-weight-bold mx-auto mt-2" type="submit"  role="button" value="<?=$cart_Recoil['id']?>"><i class="fa-solid fa-xmark"></i></button>
                        </form>
                      </td>
                      <?php
                        // echo "<br>$sum+".$poles_price;
                        $sum_recoil+=$poles_recoil_price;
                        }
                      ?>
                    </tr>
                    <tr>
                      <td>
                        <p class="font-weight-bold mt-2">小計金額</p>
                      </td>
                      <td></td>
                      <td></td>
                      <td>
                        <h4>¥ <?=$sum_recoil?></h4>
                      </td>
                    </tr>
                  </div>
                    <div class="row justify-content-end mb-3">
                      <div class="col-6 text-end">
                        <a class="btn btn-sm mt-5 mx-auto btn-light" href="../views/chose_recoil_pole.php" role="button"> 戻って編集する</a>
                      </div>
                    </div>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <hr>

        <div class="row my-5">
          <div class="col-4">
            <img src="../materials/buy_launch.png" alt="" class="w-100">
          </div>
          <div class="col-8">
            <div class="table-responsive">
              <table class="table table-sm">
                <thead class="table-warning">
                  <tr>
                    <th scope="col-2">長さ（ft.）</th>
                    <th scope="col-2">重さ（lbs.）</th>
                    <th scope="col-2">本数</th>
                    <th scope="col-4">金額</th>
                    <th scope="col-2"></th>
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
                      <td class="col-2">
                        <?=$cart_Launch['length']?>
                      </td>
                      <td class="col-2">
                        <?=$cart_Launch['weight']?>
                      </td>
                      <td class="col-2">
                        <?=$cart_Launch['quantity']?>
                      </td>
                      <td class="col-2" hidden>
                        <?=$cart_Launch['price']?>
                      </td>
                      <td class="col-2">
                        <?=$poles_launch_price = $cart_Launch['price'] * $cart_Launch['quantity']?>
                      </td>
                      <td class="col-2">
                        <form action="" method="POST">
                          <button name="btn_delete_launch" class="btn btn-outline-warning btn-sm rounded-circle font-weight-bold mx-auto mt-2" type="submit"  role="button" value="<?=$cart_Launch['id']?>"><i class="fa-solid fa-xmark"></i></button>
                        </form>
                      </td>
                      <?php
                        // echo "<br>$sum+".$poles_price;
                        $sum_launch+=$poles_launch_price;
                        }
                      ?>
                    </tr>
                    <tr>
                      <td>
                        <p class="font-weight-bold mt-2">小計金額</p>
                      </td>
                      <td></td>
                      <td></td>
                      <td>
                        <h4>¥ <?=$sum_launch?></h4>
                      </td>
                    </tr>
                  </div>
                    <div class="row justify-content-end mb-3">
                      <div class="col-6 text-end">
                        <a class="btn btn-sm mt-5 mx-auto btn-light" href="../views/chose_launch_pole.php" role="button"> 戻って編集する</a>
                      </div>
                    </div>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <hr>

        <div class="row justify-content-end">
          <div class="col-4"></div>
          <div class="col-4"><h3>
          合計
          </h3></div>
          <div class="col-4 text-end "><h2>
          ¥ <?=$poles_sum_price = $sum_recoil + $sum_launch?>
          </h2></div>
        </div>

        <div class="row chose_btn pt-3">
          <!-- <button class="btn btn-warning btn-lg mt-5 font-weight-bold mx-auto col-4" role="button" name="btn_buy">確定する</button> -->
          <a class="btn btn-warning btn-lg mt-5 font-weight-bold mx-auto col-4" role="button" href="pay.php">確定する</a>
        </div>
      </div>
    <!-- </form> -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js" integrity="sha384-Qg00WFl9r0Xr6rUqNLv1ffTSSKEFFCDCKVyHZ+sVt8KuvG99nWw5RNvbhuKgif9z" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </body>
    <?php
      include "footer.php";
      ?>
</html>