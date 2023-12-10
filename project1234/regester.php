<?php
session_start();
require 'dashboard/data_connection/database.php';
if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $name = htmlspecialchars(trim($_POST['name']));
        $email = htmlspecialchars(trim($_POST['email']));
        $password = password_hash(mysqli_real_escape_string($con, $_POST['password']),PASSWORD_DEFAULT);
        $conf_password = $_POST['cpassword'];
        $img = $_POST['user_img'];

        if(!empty($name) && !empty($email) && !empty($password)&& !empty($conf_password)){

          if($_POST['password'] == $conf_password){

            $sql = "INSERT into users (UserName, email, Password, user_img) values 
            ('$name','$email','$password','$img');";

              mysqli_query($con, $sql);
            
              header("Location: login.php");
              exit();
            }else{
            echo "Please enter some valid information!";
            }
            mysqli_close($con);
      }
  }
?>;
<?php
require 'includes/header.php';
?>
<section class="py-lg-14 py-3">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-12 col-12">
            <h2 class="display-6 fw-bold text text-center">Welcome to <span class="text-half-orange-effect">P</span>eople<span class="text-half-orange-effect">P</span>er<span class="text-half-orange-effect">T</span>ask 
            </h2>
            <p class="text-black-50 mb-2 lead text text-center">
                We love working here. We think you will too.
            </p>
        </div>
      </div>
    </div>
</section>
<section
      class="vh-100 bg-image"
      style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
      <div class="mask d-flex align-items-center h-100 gradient-custom-3">
        <div class="container h-100">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-9 col-lg-7 col-xl-6">
              <div class="card" style="border-radius: 15px">
                <div class="card-body p-4">
                  <h2 class="text-uppercase fw-bold text-center mb-9">
                  Create your account
                  </h2>

<!-- forme d'enregistrement -->
                  <form id="regester-form" action="regester.php" method="POST">
                    <div class="form-outline mb-3">
                      <label class="form-label" for="form3Example1cg">Your Name</label>
                      <input type="text" id="name_inp" name="name" class="form-control form-control-lg"/>
                      <span id="name_reg_err" class="text text-danger"></span>
                    </div>

                    <div class="form-outline mb-3">
                      <label class="form-label" for="form3Example3cg">Your Email</label>
                      <input type="text" id="mail_inp" name="email" class="form-control form-control-lg"/>
                      <span id="email_reg_err" class="text text-danger"></span>
                    </div>

                    <div class="form-outline mb-3"><label class="form-label" for="form3Example4cg">Password</label>
                      <input type="password" id="password_inp" name="password" class="form-control form-control-lg"/>
                      <span id="password_reg_err" class="text text-danger"></span>
                    </div>

                    <div class="form-outline mb-3"><label class="form-label" for="form3Example4cdg">Confirm Password</label>
                      <input type="password" id="password_rep_inp" name="cpassword" class="form-control form-control-lg"/>
                      <span id="password_rep_err" class="text text-danger"></span>
                    </div>

                    <!-- img -->

                      <div class="form-group">
                        <label for="update_img">Add your image</label>
                        <input type="file" name="user_img" class="form-control-file" id="user_img">
                      </div>
                   

                    <button type="submit" class="mrgntop btn btn-primary primary-btn-orange">
                      Register
                    </button>

                    <p class="text-center text-muted mt-5 mb-0">
                      Have already an account?
                      <a href="login.php" class="fw-bold text-body">Login here</a>
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
<?php require 'includes/footer.php';?>