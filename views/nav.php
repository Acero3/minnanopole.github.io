<nav class="navbar navbar-expand-md navbar-light fixed-top bg-white py-0">
    <div class="container">
      <a class="navbar-brand mr-5" href="../views/home.php"><img src="../materials/minnnanopole.png" width="200" alt="logo"></a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar-header" aria-controls="navbar-header" aria-expanded="false" aria-label="ナビゲーションの切替">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbar-header">
        <div class="container-fluid mt-2 justify-content-center">
          <a class="nav-link">Welcome <?= $_SESSION['username'] ?></a>
        </div>
        <ul class="navbar-nav mt-2 d-flex align-items-center">
          <li class="nav-item">
          </li>
          <li class="nav-item ml-5">
            <a href="../views/buy_poles.php" class="nav-link"><i class="fa-solid fa-cart-shopping"></i></a>
          </li>
          <li class="nav-item">
            <a href="../views/profile.php" class="nav-link"><i class="fa-regular fa-user"></i></a>
          </li>
          <li class="nav-item mt-3 mx-2">
            <p>
              <a href="../actions/logout.php" class="nav-link">Logout</a>
            </p>
          </li>
        </ul>
      </div>
    </div>
  </nav>