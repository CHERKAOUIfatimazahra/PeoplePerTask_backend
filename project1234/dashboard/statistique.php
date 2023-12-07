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
<?php
require 'navbar_dash.php';
?> 
  <body>
    <div class="wrapper">
    <?php
            require "sidebar.php";
            ?>
      <div class="main">
        <nav class="navbar justify-content-space-between pe-4 ps-2">
          <button class="btn open">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="navbar gap-4">
            <div class="">
              <input type="search" class="search" placeholder="Search" />
              <img class="search_icon" src="img/search.svg" alt="iconicon" />
            </div>
            <!-- <img src="img/search.svg" alt="icon"> -->
            <img class="notification" src="img/new.svg" alt="icon" />
            <div class="card new w-auto">
              <div class="list-group list-group-light">
                <div
                  class="list-group-item px-3 d-flex justify-content-between align-items-center"
                >
                  <p class="mt-auto">Notification</p>
                  <a href="#"><img src="img/settingsno.svg" alt="icon" /></a>
                </div>
                <div class="list-group-item px-3 d-flex">
                  <img src="img/notif.svg" alt="iconimage" />
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text mb-3">
                      Some quick example text to build on the card title and
                      make up the bulk of the card's content.
                    </p>
                    <small class="card-text">1 day ago</small>
                  </div>
                </div>
                <div class="list-group-item px-3 d-flex">
                  <img src="img/notif.svg" alt="iconimage" />
                  <div class="card-body">
                    <h5 class="card-title">Card title</h5>
                    <p class="card-text mb-3">
                      Some quick example text to build on the card title and
                      make up the bulk of the card's content.
                    </p>
                    <small class="card-text">1 day ago</small>
                  </div>
                </div>
                <div class="list-group-item px-3 text-center">
                  <a href="#">View all notifications</a>
                </div>
              </div>
            </div>
            <div class="inline"></div>
            <div class="name">lahcen Admin</div>
            <ul class="navbar-nav">
              <li class="nav-item dropdown">
                <a
                  href="#"
                  class="nav-icon pe-md-0 position-relative"
                  data-bs-toggle="dropdown"
                >
                  <img src="img/photo_admin.svg" alt="icon" />
                </a>
                <div class="dropdown-menu dropdown-menu-end position-absolute">
                  <a class="dropdown-item" href="#">Profile</a>
                  <a class="dropdown-item" href="#">Account Setting</a>
                  <a
                    class="dropdown-item"
                    href="index.php"
                    >Log out</a
                  >
                </div>
              </li>
            </ul>
          </div>
        </nav>
<!-- statistique -->
        <section class="overview">
          <div class="row p-4">
            <div class="col-xl-4 col-sm-6 col-12 mb-4">
              <div class="card">
                <div class="card-body p-4">
                  <div class="d-flex justify-content-between px-md-1">
                    <div>
                      <h4 class="mb-0">Projects</h4>
                      <div class="mt-4">
                        <h3><strong>18</strong></h3>
                        <p><strong>2</strong> Completed</p>
                      </div>
                    </div>
                    <div class="cursor">
                      <img src="img/project-icon-1.svg" alt="icon" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-sm-6 col-12 mb-4">
              <div class="card">
                <div class="card-body p-4">
                  <div class="d-flex justify-content-between px-md-1">
                    <div>
                      <h4 class="mb-0">Freelancers</h4>
                      <div class="mt-4">
                        <h3><strong>132</strong></h3>
                        <p><strong>32</strong> </p>
                      </div>
                    </div>
                    <div class="">
                      <img src="img/project-icon-2.svg" alt="icon" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-sm-6 col-12 mb-4">
              <div class="card">
                <div class="card-body p-4">
                  <div class="d-flex justify-content-between px-md-1">
                    <div>
                      <h4 class="mb-0">Testimenial</h4>
                      <div class="mt-4">
                        <h3><strong>76%</strong></h3>
                        <p><strong>6</strong> valide</p>
                      </div>
                    </div>
                    <div class="">
                      <img src="img/project-icon-4.svg" alt="icon" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="row p-4">
            <div class="col-xl-4 col-sm-6 col-12 mb-4">
              <div class="card">
                <div class="card-body p-4">
                  <div class="d-flex justify-content-between px-md-1">
                    <div>
                      <h4 class="mb-0">Projects</h4>
                      <div class="mt-4">
                        <h3><strong>18</strong></h3>
                        <p><strong>2</strong> Completed</p>
                      </div>
                    </div>
                    <div class="cursor">
                      <img src="img/project-icon-1.svg" alt="icon" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-sm-6 col-12 mb-4">
              <div class="card">
                <div class="card-body p-4">
                  <div class="d-flex justify-content-between px-md-1">
                    <div>
                      <h4 class="mb-0">Freelancers</h4>
                      <div class="mt-4">
                        <h3><strong>132</strong></h3>
                        <p><strong>32</strong> </p>
                      </div>
                    </div>
                    <div class="">
                      <img src="img/project-icon-2.svg" alt="icon" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-xl-4 col-sm-6 col-12 mb-4">
              <div class="card">
                <div class="card-body p-4">
                  <div class="d-flex justify-content-between px-md-1">
                    <div>
                      <h4 class="mb-0">Testimenial</h4>
                      <div class="mt-4">
                        <h3><strong>76%</strong></h3>
                        <p><strong>6</strong> valide</p>
                      </div>
                    </div>
                    <div class="">
                      <img src="img/project-icon-4.svg" alt="icon" />
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
        crossorigin="anonymous"></script>
    <script src="js_fill/dashboard.js"></script>
    <script src="js_fill/script.js"></script>
</body>

</html>