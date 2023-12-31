<?php
session_start();
include 'dashboard/data_connection/database.php';

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>People per task</title>

  <!-- style links -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="./css/style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
  <link rel="stylesheet" href="./css/about.css">
  <link rel="stylesheet" href="./css/signup.css">
  <link rel="stylesheet" href="./css/marketplace.css">
  <link rel="stylesheet" href="./css/project_clinet.css">
  <link rel="stylesheet" href="./css/single_page.css">
  <!-- animation links -->
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  <!-- link for icons -->
  <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>

  <!-- Navbar -->
 <nav class="navbar navbar-expand-lg bg-body-tertiary navbar-postion">
    <div class="container">
      <a class="navbar-brand" href="#"><img src="images/M.png" alt="logo"></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link active"  href="index.php">Home</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="about.php">about</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="pack.html">Pricing</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
              category
            </a>
<?php
  require 'dashboard/data_connection/database.php';
  $query = "select CategoryName from categories";
  
  $res = mysqli_query($con, $query);
  if (mysqli_num_rows($res) > 0) :
  ?>
            <ul class="dropdown-menu">
              <li><?php while ($row = mysqli_fetch_assoc($res)) :?><a class="dropdown-item" href="recherch.php"><?php echo $row['CategoryName'];?></a><?php endwhile;?></li>
            </ul>
          </li>
          <?php endif;?>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">Contact</a>
          </li>
        </ul>
        <!--  -->
        <form class="d-flex input-group w-auto">
          <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
            aria-describedby="search-addon" />
          <span class="input-group-text border-0" id="search-addon">
            <img src="images/searchicon.svg" alt="">
          </span>
        </form>
<?php if (isset($_SESSION['UserID'])):?>
  <a href="#" class="nav-icon pe-md-0 position-relative" data-bs-toggle="dropdown">
                                <!-- user img -->
                                <svg xmlns="http://www.w3.org/2000/svg" height="16" width="20" viewBox="0 0 640 512"><!--!Font Awesome Free 6.5.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2023 Fonticons, Inc.--><path fill="#ff8000" d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM609.3 512H471.4c5.4-9.4 8.6-20.3 8.6-32v-8c0-60.7-27.1-115.2-69.8-151.8c2.4-.1 4.7-.2 7.1-.2h61.4C567.8 320 640 392.2 640 481.3c0 17-13.8 30.7-30.7 30.7zM432 256c-31 0-59-12.6-79.3-32.9C372.4 196.5 384 163.6 384 128c0-26.8-6.6-52.1-18.3-74.3C384.3 40.1 407.2 32 432 32c61.9 0 112 50.1 112 112s-50.1 112-112 112z"/></svg>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end position-absolute">
                                <a class="dropdown-item" href="index.php">Home</a>
                                <a class="dropdown-item" href="profil.php">Profile</a>
                                <a class="dropdown-item" href="dashboard/projects.php">dashboard</a>
                                <a class="dropdown-item" href="project_client.php">Add project</a>
                                <a class="dropdown-item" href="logout.php">Log out</a>
                            </div>  
<?php else: ?>
      <a class="btn btn-primary me-2 sign-style-color" href="regester.php" role="button">Sign up</a>
      <a class="btn btn-primary me-2 sign-style-color" href="login.php" role="button">Sign in</a>
<?php endif;?>   
      </div>
    </div>
  </nav>
    
