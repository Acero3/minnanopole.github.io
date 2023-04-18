<?php
  session_start();
  include "../classes/user.php";
  $User = new User;

  // ★change below
  if (isset($_POST['btn_resister'])){
    $user_id =  $_SESSION["user_id"];
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $User->updateUser($user_id, $first_name, $last_name, $username, $password);
    header('Location:../views/home.php');
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
<!-- Font Awesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<!-- <link rel="stylesheet" href="../assets/styles/style.css"> -->

  <title>User| Register</title>
  <style>
    /* body {background: black;} */
    .form-control {
    outline: none;
    border: none;
    border-bottom: 1px solid #a5a3a3;
    border-radius: 0;
    letter-spacing: 0.1em;
    }
  </style>
</head>
<body>
  <div class="container mt-5">
    <div class="row">
        <a class="navbar-brand mx-auto" href="../views/home.php"><img class="d-block mx-auto" src="../materials/minnnanopole.png" width="200" alt="logo"></a>
    </div>
    <div class="card w-50 mt-5 mx-auto">
      <div class="card-header">
        <h5 class="card-title text-center mt-1">User Profile   <i class="fa-regular fa-user"></i></h5>
      </div>
      <div class="card-body">
        <?php
          $all_users = $User->getAllUsers($_SESSION["user_id"]);
          while($user = $all_users->fetch_assoc()){
          ?>
        <form action="" method="post">
          <label for="first-name" class="form-label">First Name</label>
          <input type="text" name="first_name" id="first-name" required class="form-control mb-3" value="<?= $user['first_name'] ?>">

          <label for="last-name" class="form-label">Last Name</label>
          <input type="text" name="last_name" id="last-name" required class="form-control mb-3" value="<?= $user['last_name'] ?>">

          <label for="username" class="form-label">Username</label>
          <input type="text" name="username" id="username" required class="form-control mb-3" value="<?= $user['username'] ?>">

          <div class="row">
            <div class="col-6">
              <label for="password" class="form-label">Password</label>
            </div>
            <div class="col-6 text-end">
              <a class="btn btn-sm mx-auto btn-light rounded-pill mb-2" href="../views/change_pw.php" role="button"> 編集する</a>
            </div>
          </div>
          <input type="password" name="password" id="password" required class="form-control mb-3" value="<?= $user['password'] ?>">

          <input type="submit" value="更新する" name="btn_resister" class="btn btn-outline-warning btn-rounded btn-lg mt-5 font-weight-bold w-100 rounded-pill col-4">
        </form>
        <?php
          }
        ?>
        
      </div>
    </div>
  </div>
</body>
</html>