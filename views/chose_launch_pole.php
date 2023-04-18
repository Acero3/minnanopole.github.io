<?php
  session_start();
  include "nav.php";
  include "../classes/product.php";
  $Product = new Product;

    // ★change below
    if (isset($_POST['btn_add_launch'])){
      // echo "TEST!";
      $user_id = $_SESSION["user_id"];
      $product_id = $_POST['product_id'];
      $quantity = $_POST['quantity'];
      print_r ($product_id);
      print_r ($quantity);
        for ($i=0; $i<count($quantity);$i++){
          if($quantity[$i] > 0){
          $Product->addCartLaunch($user_id, $product_id[$i], $quantity[$i]);
          echo $product_id[$i];
          echo $quantity[$i];
          }
        }
        header('Location:../views/buy_poles.php');
       // echo "$user_id $product_id $quantity";
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

      .form-control {
        outline: none;
        border: none;
        border-bottom: 1px solid #a5a3a3;
        border-radius: 0;
        letter-spacing: 0.1em;
      }
  </style>

    </style>
      <title>minnnanopole</title>
  </head>


  <body>
    <form  method="post"> 
      <div class="container my-5 pt-5">
        <img class="img-fluid bg-black" src="../materials/chose_launch.png" alt="">

        <div class="table-responsive mt-5">
          <table class="table table-sm">
            <thead class="table-warning">
              <tr>
                <th scope="col">長さ（ft.）</th>
                <th scope="col">重さ（lbs.）</th>
                <th scope="col">単価</th>
                <th scope="col">在庫</th>
                <th scope="col">本数</th>
                <th scope="col"></th>
              </tr>
            </thead>
            <form action="../views/buy_poles.php" method="post">
            <tbody>
              <div class="row">
                <?php
                $all_poles_launch = $Product->getProductsLaunch();
                while($pole_launch = $all_poles_launch->fetch_assoc() ){
                ?>
                <tr>
                  <td class="col-2">
                    <?=$pole_launch['length']?>
                  </td>
                  <td class="col-2" >
                    <?=$pole_launch['weight']?>
                  </td>
                  <td class="boader-bottom-1 col-2">
                  ¥ <?=intval($pole_launch['price'])?>
                  </td>
                  </td>
                  <td class="boader-bottom-1 col-2">
                    <?=$pole_launch['stocks']?>
                  </td>
                  <td class="boader-bottom-1 col-4">
                    <input name="product_id[]" type="number" value="<?=$pole_launch['id']?>" hidden>
                    <input 
                    <?php
                    if($pole_launch['stocks'] <= 0){
                      echo "disabled ";
                    }
                    $max_qty_launch = $pole_launch['stocks'];
                    echo "max = '$max_qty_launch'";
                    ?>
                    name="quantity[]" min=0 class="form-control" type="number" placeholder="How many?" aria-label="Houw many?">
                  </td>
                    <?php
                    }
                    ?>
                </tr>
              </div>
            </tbody>
          </table>
        </div>
        <div class="row chose_btn">
          <button name="btn_add_launch" class="btn btn-warning btn-lg mt-5 font-weight-bold mx-auto col-4" type="submit"  role="button"><i class="fa-solid fa-cart-shopping"></i>   カートに入れる</button>
        </div>
      </div>
    </form>

    <script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.slim.min.js" integrity="sha384-Qg00WFl9r0Xr6rUqNLv1ffTSSKEFFCDCKVyHZ+sVt8KuvG99nWw5RNvbhuKgif9z" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
  </body>
    <?php
      include "footer.php";
      ?>
</html>