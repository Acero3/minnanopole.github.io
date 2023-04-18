<?php
session_start();
include "../classes/user.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Blogen: Change Password</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">    <link rel="stylesheet" href="css/main-style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- <link rel="stylesheet" href="css/main-style.css"> -->
</head>
<body>
  <div class="container mt-5">
    <div class="row">
      <a class="navbar-brand mx-auto mb-5" href="../views/home.php"><img class="d-block mx-auto" src="../materials/minnnanopole.png" width="200" alt="logo"></a>
    </div>
    <div class="row justify-content-center">
      <div class="col-6">
        <a href="profile.php" class="text-secondary text-decoration-none mb-3 d-block"><i class="fa-solid fa-chevron-left me-2"></i>Back to Profile</a>
        <div class="card">
          <div class="card-header bg-warning bg-gradient text-dark">
            <h2 class="text-white">Change Password</h2>
          </div>
          <div class="card-body">
            <?php
            if (isset($_POST['update_password'])) {
              $User = new User;
              $user_id =$_SESSION['user_id'];
              $current_password=$_POST['current_password'];
              $new_password=$_POST['new_password'];
              $conf_new=$_POST['conf_new'];
              $User->changePassword($user_id, $current_password, $new_password, $conf_new);
            }

            ?>
            <form method="post">               
                <div class="mb-5">
                    <label for="current-password">Current Password</label>
                    <input type="password" name="current_password" id="current-password" class="form-control" autofocus required>
                </div>                
                <div class="mb-2">
                    <label for="new-password">New Password</label>
                    <input type="password" name="new_password" id="new-password" class="form-control" minlength="4" required>
                </div>
                <div class="mb-4">
                    <label for="conf-new">Confirm New Password</label>
                    <input type="password" name="conf_new" id="conf-new" class="form-control" minlength="4" required>
                </div>

                <button type="submit" name="update_password" class="btn btn-warning text-white float-end rounded-pill">Update Password</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>

</html>