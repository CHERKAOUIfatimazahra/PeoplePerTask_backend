<?php
require 'includes/header.php';

require 'dashboard/data_connection/database.php';

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $email = htmlspecialchars(trim($_POST['email']));
    $password = $_POST['password'];

    if (!empty($email) && !empty($password)) {

        $query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
        $res = mysqli_query($con, $query);

        if ($res && mysqli_num_rows($res) > 0) {

            $user_data = mysqli_fetch_assoc($res);
            $stored_hashed_password = $user_data['Password'];

            if (password_verify($password, $stored_hashed_password)) {

                // Admin role
                if ($user_data['role'] == 'Admin') {
                    $_SESSION['UserID'] = $user_data['UserID'];
                    $_SESSION['role'] = $user_data['role'];
                    header("Location: dashboard/users.php");
                    die;
                }
                // Freelancer role
                else if ($user_data['role'] == 'Freelancer') {
                    $_SESSION['UserID'] = $user_data['UserID'];
                    $_SESSION['role'] = $user_data['role'];
                    header("Location: dashboard/offers.php");
                    die;
                }
                // Client role
                else if ($user_data['role'] == 'Client') {
                    $_SESSION['UserID'] = $user_data['UserID'];
                    $_SESSION['role'] = $user_data['role'];
                    header("Location: dashboard/projects.php");
                    die;
                } 
            } else {
                echo "Wrong username or password!";
            }
        } else {
            echo "Wrong username or password!";
        }
    } else {
        echo "Please provide both email and password!";
    }
}

?>


    <section class="vh-100 bg-image"
    style="background-image: url('https://mdbcdn.b-cdn.net/img/Photos/new-templates/search-box/img4.webp');">
    <div class="mask d-flex align-items-center h-100 gradient-custom-3">
      <div class="container h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
          <div class="col-12 col-md-9 col-lg-7 col-xl-6">
            <div class="card" style="border-radius: 15px;">
              <div class="card-body p-5">
                <h2 class="text-uppercase text-center mb-5">login </h2>
  
                <form action="login.php" method="POST" id="login-form">
  
                  <div class="form-outline mb-4">
                    <label class="form-label" for="form3Example3cg">Your Email</label>
                    <input type="text" id="login-mail_inp" name="email" class="form-control form-control-lg" required/>
                  </div>
  
                  <div class="form-outline mb-4 ">
                    <label class="form-label" for="form3Example4cg">Password</label>
                    <input type="password" id="login-password_inp" name="password" class="form-control form-control-lg" required/>
                      <div class="text-center mrgntop">
                        <span id="login-mail_reg_err" class="text text-danger"></span>
                      </div>
                  </div>

                  <div>
                    <a href="regester.php" class="ca">Create an account</a>
                  </div>

                  <button type="submit" class="mrgntop btn btn-primary primary-btn-orange">login</button>

                </form>
  
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>

<!-- footer -->
<?php require 'includes/footer.php';?>