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

<!-- <style type="text/css">
  .container, .card, .card-body, .btn{
    boarder-radius: 100px;
  }
  </style> -->

  <title>User| Register</title>
</head>
<body>
  <div class="container mt-5">
    <div class="row">
        <a class="navbar-brand mx-auto" href="../views/home.php"><img class="d-block mx-auto" src="../materials/minnnanopole.png" width="200" alt="logo"></a>
    </div>
    <div class="card w-50 mt-5 mx-auto">
      <div class="card-header">
        <h5 class="card-title text-center mt-1">Create an account   <i class="fa-regular fa-user"></i></h5>
      </div>
      <div class="card-body">
        <form action="../actions/register.php" method="post">
          <label for="first-name" class="form-label">First Name</label>
          <input type="text" name="first_name" id="first-name" required class="form-control mb-3">

          <label for="last-name" class="form-label">Last Name</label>
          <input type="text" name="last_name" id="last-name" required class="form-control mb-3">

          <label for="username" class="form-label">Username</label>
          <input type="text" name="username" id="username" required class="form-control mb-3">

          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" id="password" required class="form-control mb-3" >

          <input type="submit" value="Register" name="btn_resister" class="btn btn-warning rounded-pill btn-lg mt-3 font-weight-bold w-100">
        </form>
        
      </div>
    </div>
  </div>
</body>
</html>