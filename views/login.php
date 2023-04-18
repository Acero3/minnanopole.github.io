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
  <title>Sales</title>
</head>
<body>
  <div class="container" style="height:100vh">
  <div class="container mt-5">
    <div class="row">
        <a class="navbar-brand mx-auto" href="../views/home.php"><img class="d-block mx-auto" src="../materials/minnnanopole.png" width="200" alt="logo"></a>
    </div>
    <div class="card w-25 m-auto mt-5">
      <div class="card-header">
        <h5 class="card-title text-center">Login</h5>
    </div>

      <div class="card-body">
        <form action="../actions/login.php" method="post">
          <label for="username" class="form-label">Username</label>
          <input type="text" name="username" id="username" class="form-control mb-3" required>
          <label for="password" class="form-label">Password</label>
          <input type="password" name="password" id="password" class="form-control mb-3" required>
          <input type="submit" value="Login" class="w-100 btn btn-warning btn-rounded my-3" name="btn_login">
          </form>
          <a href="../views/register.php" type="submit" class="btn btn-outline-warning rounded-pill w-100">Create an account</a>
      </div>
    </div>
  </div>
</body>
</html>