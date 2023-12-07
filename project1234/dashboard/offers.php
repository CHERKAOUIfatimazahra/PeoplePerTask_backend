<?php
session_start();
include 'data_connection/database.php';
// Check if the user is logged in
if (!isset($_SESSION['UserID'])) {
    // Redirect to the login page if not logged in
    header("Location: ../login.php");
    exit();
}
?>
<body>
    <div class="wrapper">
            <?php
            require "sidebar.php";
            ?>
        <div class="main">
        <?php
            require 'navbar_dash.php';
            ?> 
  <div class="container my-4 py-4">
  <!-- Primary Button -->
<div class="modal-body">
<div class="col-sm-6 col-lg-4 mb-4">
  <div class="row">
    <div class="col-1 text-center">
      <img src="https://mdbootstrap.com/img/Photos/Avatars/img%20(1).webp" alt="IMG of Avatars"
        class="img-fluid z-depth-1-half rounded-circle">
      <div style="height: 10px"></div>
      <p class="title mb-0">Jane</p>
      <p class="text-muted " style="font-size: 13px">Consultant</p>
    </div>
    <div class="col-9">
      <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Fuga, molestiae provident temporibus
        sunt earum.</p>
      <p class="card-text"><strong>Lorem ipsum dolor sit amet, consectetur adipisicing elit.</strong></p>
    </div>
  </div>
  </div>
  <!--Footer-->
  <div class="modal-footer justify-content-center">
  <a type="button" class="btn btn-warning">Get it now <i class="far fa-gem ml-1 white-text"></i></a>
  <a type="button" class="btn btn-outline-warning waves-effect" data-dismiss="modal">No, thanks</a>
  </div>
  </div>
  <!--Body-->
  </div>
  </div>
</div>
</body>

</html>