<?php include_once 'resource/session.php' ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="./css/custom.css">
    <link rel="stylesheet" href="./css/sweetalert.css">
    <script src="js/sweetalert.min.js"></script>
    <title><?php if(isset($page_title))  echo $page_title; ?></title>
</head>

<body>

<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#" style="font-style: 'cursive';">Expense Tracker</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
      <ul class="navbar-nav me-auto mb-2 mb-md-0">
        <li class="nav-item active">
          <a class="nav-link active" aria-current="page" href="index.php">Home</a>
        </li>

        <?php if(isset($_SESSION['username'])): ?>
          <li class="nav-item">
          <a class="nav-link" href="profile.php">My Profile</a>
          <li> <a class="nav-link" href="logout.php">Logout</a> </li>
        </li>
        <?php else: ?>
        <li class="nav-item"> <a class="nav-link" href="">About</a></li>
        <li class="nav-item"> <a class="nav-link" href="Login.php">Login</a> </li>
        <li class="nav-item"> <a class="nav-link" href="Signup.php">Sign up</a> </li>
        <li class="nav-item"> <a class="nav-link" href="">Contact</a>  </li>
    
        <?php endif ?>

      </ul>
      
    </div>
  </div>
</nav>

</body>
</html>