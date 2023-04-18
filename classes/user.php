<?php
require 'database.php';
class User extends Database {
  public function createUser($first_name, $last_name, $username, $password)
  {
    $encrypted_password = password_hash($password, PASSWORD_DEFAULT);
    $sql = "INSERT INTO users(first_name, last_name, username, password) VALUES ('$first_name', '$last_name', '$username', '$encrypted_password')";

    if($this->conn->query($sql)){
      header('Location:../views/login.php');
      exit;
    }else{
      die ("Error creating user: ".$this->conn>error);
    }
  }


  public function login($username, $password){
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $this->conn->query($sql);

    if($result->num_rows == 1){
      $user_details = $result->fetch_assoc();
      $is_password_correct = password_verify($password, $user_details["password"]);
      if($is_password_correct){
        session_start();
        $_SESSION["user_id"]=$user_details["id"];
        $_SESSION["username"]=$user_details["username"];

        header ("Location:../views/home.php");
        exit;
      }else{
        die ("password is incorrect.");
      }
    }else{
      die("Username doesn't exist.");
    }
  }



  public function getAllUsers($user_id){
    $sql = "SELECT * FROM users WHERE id = $user_id";
    $result =$this->conn->query($sql);
    if($result){
      return $result;
    }else{
      die ("Error retrieving all users:".$this->conn->error);
    }
  }


  public function updateUser($user_id, $first_name, $last_name, $username, $password){
  $sql = "UPDATE `users` SET `first_name`='$first_name',`last_name`='$last_name',`username`='$username',`password`='$password' WHERE id = $user_id";
  $result =$this->conn->query($sql);
  if($result){
    return $result;
  }else{
    die ("Error retrieving all users:".$this->conn->error);
  }
  }



public function changePassword($user_id, $current_password, $new_password, $conf_password){
  $sql = "SELECT `password` FROM users WHERE id = $user_id";
  $result =$this->conn->query($sql);
  $password_array = $result->fetch_assoc();
  $db_password = $password_array['password'];
  // ★how to get value or result from sql statement using fetch assoc.

  if (password_verify($current_password, $db_password)) {
    if($new_password == $conf_password){
      $new_password = password_hash($new_password, PASSWORD_DEFAULT);
      $sql2 = "UPDATE `users` SET `password`='$new_password' WHERE id = $user_id";
      if($this->conn->query($sql2)){
        header("location: profile.php");
                    exit;
      }else{
        die ("Error Updating the password:".$this->conn->error);
      }
    }else{
      die ("Error new Passwords are not same:".$this->conn->error);
    }
  }else{
    die ("Error Incorrect Password");
  }
}


// trial
// function updatePhoto($user_id, $photo_name, $photo_tmp){
//   $conn = connection();
//   $sql = "UPDATE users SET photo = '$photo_name' where id = $user_id";

//   if($conn -> query($sql)){
//     $destination = "img/$photo_name";
//     move_uploaded_file($photo_tmp, $destination);
//     // move_uploaded_file();->buil-in function

//     // $photo_tmp = stored to where, new file such as img.
//     // $destination = stored from where, old 

//     header("refresh: 0");}
//     else{
//       die("Error uploading photo: ".$conn -> error);
//     }

//   }


  // if(isset($_POST['btn_upload_photo'])){
  //   $user_id = $_SESSION['user_id'];
  //   $photo_name = $_FILES['photo']['name'];
  //   $photo_tmp = $_FILES['photo']['tmp_name'];


  //   updatePhoto($user_id, $photo_name, $photo_tmp);
  // }

}
?>