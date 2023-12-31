<?php
require 'includes/header.php';
?>
  <!-- hero section -->
  <section class="hero">
    <div class="container ">
      <div class="row d-flex align-items-center">
        <div class="col-lg-6 col-md-12 col-sm-12 align-items-center">
          <div class="text-content">
            <div class="text-label">
              <h3 class="text-dark">discover your perfect</h3>
            </div>
            <div class="text-hero-bold">
              <h1 class="display-1 fw-bold mb-3">free<span class="text-half-orange-effect">lancer</span></h1>
            </div>
            <div class="text-hero-p ">
              <p class="pe-lg-10 mb-5">"Welcome to people per task, the premier destination for connecting talented
                freelancers with exciting projects and opportunities. Whether you're a skilled professional seeking your
                next gig or a business in need of top-tier expertise, we've got you covered. Our platform empowers you
                to work with the best and achieve your goals."</p>
            </div>
            <div class="hero-button">
              <a class="btn btn-primary primary-btn-orange" href="#">Get started</a>
            </div>
          </div>
        </div>
        <div class="col-lg-6 col-md-12 col-sm-12 d-flex justify-content-center py-3">
          <div class="position-relative hero-img-container ">
            <img src="./images/heroimg.svg" alt="hero svg" id="hero-img-animation" class="mx-auto scale-hero-img" style="width: 40vw;">
            <img src="./images/flowerxl.svg" alt="flower" id="flower-img-animation" class=" position-absolute end-0 bottom-0 " style="width: 8vw;">
            <img src="./images/flowerm.svg" alt="icon" id="flower-small-animation" class=" position-absolute bottom-0  " style="width: 4vw;" >
            <img src="./images/flowerxl.svg" alt="flower" id="flowerxl-img-animation" class=" position-absolute  bottom-0 end-100 " style="width: 8vw;">
            <img src="./images/Vectorsetting.svg" id="setting-icon-animation" alt="setting" class=" position-absolute  top-0 end-100  " style="width: 4vw;">
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- category section -->
  <section class="category my-4 py-4">
      <div class="container ">
        <div class="row">
          <div class="col-12">
            <div class="row text-center justify-content-center">
              <h2 class="display-5 fw-bold mb-3">Browse talent <span class="text-half-orange-effect">by category</span>
              </h2>
              <div class="text-hero-p col-10 ">
                <p class="pe-lg-10 mb-5">your gateway to a diverse community of skilled freelancers ready to bring your
                  projects to life. We've organized our talent pool into various categories to help you find the perfect
                  match for your unique needs.Our team members are experts in all facets of the design industry including:
                  print design, illustration, branding, identity and more.</p>
              </div>
            </div>
          </div>
        </div>
<!-- affichage categorises -->
<?php
  require 'dashboard/data_connection/database.php';
    $query = "select * from categories;";
        $res = mysqli_query($con, $query);
          if (mysqli_num_rows($res) > 0) :
?>
              <div class="row">
             <?php while ($row = mysqli_fetch_assoc($res)) :?>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-12">
                        <div class="card category-card-style my-2">
                            <div class="d-flex justify-content-center">
                                <img src="<?php echo $row['category_img']; ?>" alt="category">
                            </div>
                            <div class="card-body text-center">
                                <h5 class="card-title fw-semibold"><?php echo $row['CategoryName']; ?></h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                            </div>
                        </div>
                    </div>
              <?php endwhile;?>
              </div>
          <?php
            endif;
          ?>    
  </section>
    <!-- famous freelancers -->
  <section class="section-famous-freelancers my-4 py-4">
  <?php
  require 'dashboard/data_connection/database.php';
    $query = "select * from users;";
        $res = mysqli_query($con, $query);
          if (mysqli_num_rows($res) > 0) :
?>
    <div class="container position-relative" >
      <img src="./images/Circle2.svg"  id="circles-animation1" alt="flower" class=" position-absolute end-0 bottom-0 ">
      <img src="./images/Circle2.svg" id="circles-animation2" alt="flower" class=" position-absolute end-0 bottom-10 ">
      <img src="./images/Circle4.svg" id="circles-animation3" alt="flower" class=" position-absolute end-0 top-10 ">
      <img src="./images/Circle4.svg" id="circles-animation4" alt="flower" class=" position-absolute end-100 top-10 ">
        <div class="row z-index-modifier">
          <div class="col-12">
            <div class="row text-center justify-content-center" >
              <h2 class="display-5 fw-bold mb-3 z-index-modifier">Expert free<span class="text-half-orange-effect z-index-modifier">lancers</span>
              </h2>
              <div class="text-hero-p col-10 z-index-modifier">
              <p class="pe-lg-10 mb-5">Search and contact freelancers directly with no obligation </p>
              </div>
            </div>
          </div>
        </div>
        <div class="row z-index-modifier">
        <?php while ($row = mysqli_fetch_assoc($res)) :?>
          <div class=" col-lg-4 col-md-6 col-12 my-4 d-flex flex-column align-items-center ">
            <div class="card" style="max-width: 23rem;">
              <img class="my-2 " src="<?php echo $row['user_img']; ?>" alt="user_img" style="height: 9rem; ">
                <div class="card-body " >
                  <div class="card-head">
                    <h5 class="card-title fw-semibold text-center"><?php echo $row['UserName']; ?></h5>
                  </div>
                  <p class="text-center ">full-Stack Developer</p> 
                  <div class="d-flex align-items-center justify-content-center">
                    <img src="images/Star_light.svg" alt="star for reviews">
                    <img src="images/Star_light.svg" alt="star for reviews">
                    <img src="images/Star_light.svg" alt="star for reviews">
                    <img src="images/Star_light.svg" alt="star for reviews">
                    <img src="images/Star_lightimpty.svg" alt="">
                  </div>
                  <p class="card-text text-center"><?php echo $row['OtherRelevantInformation']; ?></p>
                  <p class="card-text text-center">your gateway to a diverse community of skilled freelancers ready to bring your
                projects to life.</p>
                  <div class="hero-button d-flex justify-content-center my-2">
                    <a class="btn btn-primary primary-btn-orange" href="regester.php">Get started</a>
                  </div>
                </div>
            </div> 
          </div>
          <?php endwhile;?>
        </div>
          
        <div  class="row">
          <div class="col-12 d-flex justify-content-center">
            <button id="loadmore" class="btn btn-primary primary-btn-orange">Load More</button>
          </div>
        </div>
      </div>
      <?php
            endif;
          ?> 
    </section>
  <!-- Testimonials section -->
  <section id="testimonials-key" class="Testimonials my-4 py-4">
    <div class="container position-relative">
    <div style="z-index: -1;">
  <img src="images/orangeCircle.svg" alt="flower" id="testimontial-animation1"  class="position-absolute ">
  <img src="images/Circle4.svg" alt="flower" id="testimontial-animation2" class=" position-absolute">
    </div>
      <div class="row ">
        <div class="col-12 z-index-modifier">
          <div class="row text-center justify-content-center">
            <h2 class="display-5 fw-bold mb-3 ">Test<span class="text-half-orange-effect">imonials</span>
            </h2>
            <div class="text-hero-p col-10 ">
              <p class="pe-lg-10 mb-5 ">your gateway to a diverse community of skilled freelancers ready to bring your
                projects to life. We've organized our talent pool into various categories to help you find the perfect
                match for your unique needs.Our team members are experts in all facets of the design industry including:
                print design, illustration, branding, identity and more.</p>
            </div>
          </div>
        </div>
      </div>
<!-- testimenial -->
<?php
  require 'dashboard/data_connection/database.php';
  $query = "select u.UserName,t.Comment from testimonials t
  inner join users u 
  on t.UserID = u.UserID;";
  
  $res = mysqli_query($con, $query);
  if (mysqli_num_rows($res) > 0) :
  ?>
      <div class="row ">
      <?php while ($row = mysqli_fetch_assoc($res)) :?>
        <div id="carouselExample" class="carousel slide">
          <div class="carousel-inner">
            <div class="carousel-item active">
              <div class="col-lg-6 col-md-6 col-12 mx-auto ">
                <div class="card category-card-style  my-4">
                  <div class="card-body m-4 " >
                    <div class="d-flex card-flex justify-content-between">
                      <div class="d-flex align-items-center m-3">
                          <img src="images/dizzy.svg" alt="" class="rounded-circle avatar-xl mb-3 mb-lg-0 ">
                      </div>
                      <div class="">
                        <h4 class="mb-0"><?php echo $row['UserName']; ?></h4>
                        <i class="fa-solid fa-quote-left fa-xl" style="color: #ff7300;"></i>
                        <p><?php echo $row['Comment']; ?></p>
                        <i class="fa-solid fa-quote-left fa-rotate-180 fa-xl" style="color: #ff7300;"></i>
                      </div>
                    </div>
                  </div>
                </div>
             </div>
            </div>
  <?php endwhile;
    endif; ?>
<!-- fin testimenial -->
          </div>
          <a class="carousel-control-prev " href="#carouselExampleCaptions" role="button" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleCaptions" role="button" data-bs-slide="next">
            <i class="fa-solid fa-angles-right fa-2xl" style="color: #ff6600;"></i>
          </a>
          <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
            <i class="fa-solid fa-angles-left fa-2xl" style="color: #ff6600;"></i>
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
          </button>
        </div>
      </div>
  </section>
  <!-- trusted company -->
  <section class="trusted-company">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="row text-center justify-content-center">
            <h2 class="display-5 fw-bold mb-3">Browse talent <span class="text-half-orange-effect">by category</span>
            </h2>
            <div class="text-hero-p col-10 ">
              <p class="pe-lg-10 mb-5">your gateway to a diverse community of skilled freelancers ready to bring your
                projects to life. We've organized our talent pool into various categories to help you find the perfect
                match for your unique needs.Our team members are experts in all facets of the design industry including:
                print design, illustration, branding, identity and more.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="row">
        
        <div class="col-lg-2 col-md-4 col-6">
          <div class="mb-4 text-center align-middle">
            <a href="https://www.rolls-roycemotorcars.com/en_GB/home.html" target="_blank">
              <img src="images/lg4.svg" alt="company logo" style="width: 10vw;">
            </a> 
          </div>
        </div>
          
        <div class="col-lg-2 col-md-4 col-6">
          <div class="mb-4 d-flex justify-content-between">
            <a href="https://www.bmw.com/en/index.html" target="_blank">
              <img src="images/lg1.svg" alt="company logo" style="width: 10vw;">
            </a> 
          </div>
        </div>
          
        <div class="col-lg-2 col-md-4 col-6">
          <div class="mb-4 d-flex justify-content-between">
            <a href="https://www.starbucks.com/"  target="_blank">
              <img src="images/lg2.svg" alt="company logo" style="width: 10vw;">
            </a>
          </div>
        </div>
          
        <div class="col-lg-2 col-md-4 col-6">
          <div class="mb-4 d-flex justify-content-between">
            <a href="https://www.binance.com/en" target="_blank">
              <img src="images/binance.svg" alt="binance" style="width: 10vw;">
            </a>
          </div>
        </div>
          
        <div class="col-lg-2 col-md-4 col-6">
          <div class="mb-4 d-flex justify-content-between">
            <a href="https://titan.email/" target="_blank"> 
              <img src="images/lg3.svg" alt="company logo" style="width: 10vw;">
            </a>
          </div>
        </div>
        <div class="col-lg-2 col-md-4 col-6">
          <div class="mb-4 d-flex justify-content-between">
            <a href="https://en.dragon-ball-official.com/" target="_blank">
              <img src="images/namek.svg" alt="company logo" style="width: 10vw;">
            </a>
          </div>
        </div>
       </div>
    </div>
  </section>
<!-- footer -->
<?php require 'includes/footer.php';?>