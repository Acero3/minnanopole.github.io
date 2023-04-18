<?php
require 'database.php';
class Product extends Database {

  
  
  public function getProductsRecoil(){
    $sql = "SELECT * FROM `products_recoil`";
    if($result = $this->conn->query($sql)){
      return $result;
    }else{
      die("Error deleting product".$this->conn->error);
    }
  }
  
  public function getProductsLaunch(){
    $sql = "SELECT * FROM `products_launch`";
    if($result = $this->conn->query($sql)){
      return $result;
    }else{
      die("Error deleting product".$this->conn->error);
    }
  }
  
  public function getCartRecoil($user_id){
    $sql = "SELECT cart_recoil.id AS id,weight ,length, quantity, price FROM `cart_recoil` INNER JOIN `products_recoil` ON cart_recoil.product_id = products_recoil.id WHERE user_id=$user_id AND status='pending'";
    if($result = $this->conn->query($sql)){
      return $result;
    }else{
      die("Error deleting product".$this->conn->error);
    }
  }

  public function getCartLaunch($user_id){
    $sql = "SELECT cart_launch.id AS id,weight ,length, quantity, price FROM `cart_launch` INNER JOIN `products_launch` ON cart_launch.product_id = products_launch.id WHERE user_id=$user_id AND status='pending'";
    if($result = $this->conn->query($sql)){
      return $result;
    }else{
      die("Error deleting product".$this->conn->error);
    }
  }

  // public function getCart($user_id){
  //   $sql = "SELECT * FROM `cart_launch` INNER JOIN `products_launch` ON cart_launch.product_id = products_launch.id WHERE user_id=$user_id AND status='pending'";
  //   if($result = $this->conn->query($sql)){
  //     return $result;
  //   }else{
  //     die("Error deleting product".$this->conn->error);
  //   }
  // }

  public function addCartRecoil($user_id, $product_id, $quantity){
    $sql = "INSERT INTO cart_recoil(user_id, product_id, quantity) VALUES ($user_id, $product_id, $quantity)";
    if(!$this->conn->query($sql)){
      die("Error add product: ".$this->conn->error);
    }
  }

  public function addCartLaunch($user_id, $product_id, $quantity){
    $sql = "INSERT INTO cart_launch(user_id, product_id, quantity) VALUES ($user_id, $product_id, $quantity)";
    if(!$this->conn->query($sql)){
      die("Error add product: ".$this->conn->error);
    }
  }
  
  
  public function buyPoles($user_id){
    $this->updateStocks($user_id);
    $sql_recoil = "UPDATE `cart_recoil` SET `status`='bought' WHERE user_id=$user_id";
    $sql_launch = "UPDATE `cart_launch` SET `status`='bought' WHERE user_id=$user_id";
    if($this->conn->query($sql_recoil) && $this->conn->query($sql_launch)){
      header("Location: ../views/thankyou.php");
    }else{
      die("Error buying poles".$this->conn->error);
    }
  }

  public function updateStocks($user_id){
    $sql_cart_recoil = "SELECT * FROM `cart_recoil` WHERE user_id=$user_id AND status='pending'";
    // $sql_launch = "SELECT * FROM `cart_launch` WHERE user_id=$user_id";
    
    $result_cart_recoil = $this->conn->query($sql_cart_recoil);

    while($cart_recoil = $result_cart_recoil->fetch_assoc()){
      $product_id = $cart_recoil['product_id'];
      $quantity = $cart_recoil['quantity'];

      # Get the stocks from products recoil
      $sql_stocks_recoil =  "SELECT stocks FROM `products_recoil` WHERE id=$product_id";
      $result_recoil = $this->conn->query($sql_stocks_recoil);
      $recoil= $result_recoil->fetch_assoc();
      $new_stocks = $recoil['stocks']-$quantity;

      # Update the products recoil stocks
      $sql_update_recoil = "UPDATE products_recoil SET stocks = $new_stocks WHERE id = $product_id";

      $this->conn->query($sql_update_recoil);
      // header("Location: ../views/thankyou.php");
    }

    $sql_cart_launch = "SELECT * FROM `cart_launch` WHERE user_id=$user_id AND status='pending'";
    // $sql_launch = "SELECT * FROM `cart_launch` WHERE user_id=$user_id";
    
    $result_cart_launch = $this->conn->query($sql_cart_launch);

    while($cart_launch = $result_cart_launch->fetch_assoc()){
      $product_id = $cart_launch['product_id'];
      $quantity = $cart_launch['quantity'];

      # Get the stocks from products recoil
      $sql_stocks_launch =  "SELECT stocks FROM `products_launch` WHERE id=$product_id";
      $result_launch = $this->conn->query($sql_stocks_launch);
      $launch= $result_launch->fetch_assoc();
      $new_stocks = $launch['stocks']-$quantity;

      # Update the products recoil stocks
      $sql_update_launch = "UPDATE products_launch SET stocks = $new_stocks WHERE id = $product_id";

      $this->conn->query($sql_update_launch);
      // header("Location: ../views/thankyou.php");
    }
    // $result = $this->conn->query($sql_launch);
    // if($this->conn->query($sql)){
    //   header("Location: ../views/dashboard.php");
    // }else{
    //   die("Error buying product".$this->conn->error);
    // }
  }

  public function deletePoleRecoil($id){
      // echo "delete pole";
      $sql = "DELETE FROM cart_recoil WHERE id= $id";
      if($this->conn->query($sql)){
        header("refresh: 0");
      }else{
        die("Error deleting pole".$this->conn->error);
      }
    }
  public function deletePoleLaunch($id){
      $sql = "DELETE FROM cart_launch WHERE id= $id";
      if($this->conn->query($sql)){
        header("refresh: 0");
      }else{
        die("Error deleting pole".$this->conn->error);
      }
    }
  // $sql = "UPDATE products_launch SET stocks = quantity-$stock WHERE id = $id";

  // public function deleteProduct($id){
  //   $sql = "DELETE FROM products WHERE id= $id";
  //   if($this->conn->query($sql)){
  //     header("Location: ../views/dashboard.php");
  //   }else{
  //     die("Error deleting product".$this->conn->error);
  //   }
  // }



  // public function getProductDetails($product_id){
  //   $sql = "SELECT * FROM products WHERE id = $product_id";

  //   if($result = $this->conn->query($sql)){
  //     return $result->fetch_assoc(); //fetch_assoc() = Will return the data row into an associative array
  //   }else{
  //     die("Error in retrieving product details: " . $this->conn->error);
  //   }
  // }

  // public function updateProduct($id, $product_name, $price, $quantity){
  //   $sql= "UPDATE products SET product_name='$product_name', price=$price, quantity=$quantity WHERE id = $id";
    
  //   if($this->conn->query($sql)){
  //     header("Location: ../views/dashboard.php");
  //   }else{
  //     die("Error in updating product details".$this->conn->error);
  //   }
  // }

  // public function buyProduct($id, $stock){
  //   $sql = "UPDATE products SET quantity=quantity-$stock WHERE id = $id";
  //   if($this->conn->query($sql)){
  //     header("Location: ../views/dashboard.php");
  //   }else{
  //     die("Error buying product".$this->conn->error);
  //   }
  // }

}