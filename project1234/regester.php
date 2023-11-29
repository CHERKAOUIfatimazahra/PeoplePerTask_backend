<?php
session_start();
require 'dashboard/data_connection/database.php';
if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = password_hash(mysqli_real_escape_string($con, $_POST['password']),PASSWORD_DEFAULT);

        if(!empty($name) && !empty($email) && !empty($password))
        {
            $query = "INSERT into users (UserName, email, Password) values 
            ('$name','$email','$password');";

            mysqli_query($con, $query);

            header("Location: regester.php");
            die;
        }else
        {
            echo "Please enter some valid information!";
        }
    }

?>;
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>signup</title>

    <!-- style links -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
    />
    <link rel="stylesheet" href="css/style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    />
    <!-- animation links -->
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <!-- link for icons -->
    <link
      href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css"
      rel="stylesheet"
    />
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
              <a class="nav-link active"  href="index.html">Home</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="about.html">about</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="pack.html">Pricing</a>
            </li>
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                category
              </a>
              <ul class="dropdown-menu">
                <li><a class="dropdown-item" href="recherch.html">Ui/Ux</a></li>
                <li><a class="dropdown-item" href="recherch.html">content writing</a></li>
                <li><a class="dropdown-item" href="recherch.html">video editing</a></li>
                <li><a class="dropdown-item" href="recherch.html">Ui/Ux</a></li>
                <li><a class="dropdown-item" href="recherch.html">content writing</a></li>
                <li><a class="dropdown-item" href="recherch.html">video editing</a></li>
              </ul>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="dashboard">dashboard</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="index.html#testimonials-key" >Testimonials</a>
            </li>
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
  
  
          <a class="btn btn-primary me-2 sign-style-color" href="regester.html" role="button">Sign up</a>
          <a class="btn btn-primary me-2 sign-style-color" href="login.html" role="button">Sign in</a>
        </div>
      </div>
    </nav>
    <!-- fin Navbar -->
<section
      class="vh-100 bg-image"
      style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
      <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-9 col-lg-7 col-xl-6">
              <div class="card" style="border-radius: 15px">
                <div class="card-body p-4">
                  <h2 class="text-uppercase text-center mb-5">
                    Create an account
                  </h2>

<!-- forme d'enregistrement -->
                  <form id="regester-form" action="regester.php" method="POST">

                    <div class="form-outline mb-4">
                      <label class="form-label" for="form3Example1cg">Your Name</label>
                      <input type="text" id="name_inp" name="name" class="form-control form-control-lg"/>
                      <span id="name_reg_err" class="text text-danger"></span>
                    </div>

                    <div class="form-outline mb-4">
                      <label class="form-label" for="form3Example3cg">Your Email</label>
                      <input type="text" id="mail_inp" name="email" class="form-control form-control-lg"/>
                      <span id="email_reg_err" class="text text-danger"></span>
                    </div>

                    <div class="form-outline mb-4"><label class="form-label" for="form3Example4cg">Password</label>
                      <input type="password" id="password_inp" name="password" class="form-control form-control-lg"/>
                      <span id="password_reg_err" class="text text-danger"></span>
                    </div>

                    <div class="form-outline mb-4"><label name="password" class="form-label" for="form3Example4cdg">Repeat your password</label>
                      <input type="password" id="password_rep_inp" class="form-control form-control-lg"/>
                      <span id="password_rep_err" class="text text-danger"></span>
                    </div>

                    <button type="submit" class="mrgntop btn btn-primary primary-btn-orange">
                      Register
                    </button>

                    <p class="text-center text-muted mt-5 mb-0">
                      Have already an account?
                      <a href="login.html" class="fw-bold text-body">Login here</a>
                    </p>

                  </form>
<!-- fin de forme d'enregistrement -->

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

<!-- footer -->
    <footer class="pt-lg-10 pt-5 footer footer-color">
      <div class="container">
        <div class="row">
          <div class="col-lg-4 col-md-6 col-12">
            <!-- about company -->
            <div class="mb-4">
              <img src="images/M.png" alt="" class="logo-inverse" />
              <div class="mt-4 text-light">
                <p>
                  Youssofia, youcode school. 691 South El aamala Blvd. Morocco,
                  CA 155
                </p>
                <!-- social media -->
                <div class="fs-2">
                  <i class="fa-brands fa-linkedin" style="color: #ffff"></i>
                  <i class="fa-brands fa-instagram" style="color: #ffff"></i>
                  <i class="fa-brands fa-facebook" style="color: #ffff"></i>
                </div>
              </div>
            </div>
          </div>
          <div class="offset-lg-1 col-lg-2 col-md-3 col-6">
            <div class="mb-4">
              <!-- list -->
              <h3 class="fw-semibold text-light mb-3">Company</h3>
              <ul class="list-unstyled nav nav-footer flex-column nav-x-0">
                <li><a href="#" class="nav-link text-light">About</a></li>
                <li><a href="#" class="nav-link text-light">Pricing</a></li>
                <li><a href="#" class="nav-link text-light">Blog</a></li>
                <li><a href="#" class="nav-link text-light">Careers</a></li>
                <li><a href="#" class="nav-link text-light">Contact</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-2 col-md-3 col-6">
            <div class="mb-4">
              <h3 class="fw-semibold text-light mb-3">Resources</h3>
              <ul class="list-unstyled nav nav-footer flex-column nav-x-0">
                <li>
                  <a href="#" class="nav-link text-light">Success Stories </a>
                </li>
                <li>
                  <a href="#" class="nav-link text-light">Become Freelancer</a>
                </li>
                <li><a href="#" class="nav-link text-light">Get the app</a></li>
                <li>
                  <a href="about.html" class="nav-link text-light">FAQ’s</a>
                </li>
                <li><a href="#" class="nav-link text-light">Tutorial</a></li>
              </ul>
            </div>
          </div>
          <div class="col-lg-2 col-md-3 col-6">
            <div class="mb-4">
              <h3 class="fw-semibold text-light mb-3">Information</h3>
              <ul class="list-unstyled nav nav-footer flex-column nav-x-0">
                <li><a href="#" class="nav-link text-light">Careers </a></li>
                <li><a href="#" class="nav-link text-light">FAQ</a></li>
                <li>
                  <a href="#" class="nav-link text-light">Privacy Policy </a>
                </li>
                <li>
                  <a href="about.html" class="nav-link text-light">FAQ’s</a>
                </li>
                <li><a href="#" class="nav-link text-light">Information</a></li>
              </ul>
            </div>
          </div>
        </div>
        <div class="row align-items-center g-0 border-top py-2 mt-6">
          <!-- Desc -->
          <div class="col-lg-4 col-md-5 col-12">
            <span class="text-light">
              ©
              <span id="copyright" class="text-light">
                <script>
                  document
                    .getElementById("copyright")
                    .appendChild(
                      document.createTextNode(new Date().getFullYear())
                    );
                </script>
                <span class="text-light">By Goch tavn and Per Task Team</span>
              </span>
            </span>
          </div>
        </div>
      </div>
    </footer>
<!-- fin footer -->
    <script src="javascript/valid.js"></script>
  </body>
</html>