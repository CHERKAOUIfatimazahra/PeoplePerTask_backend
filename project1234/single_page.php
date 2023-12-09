<?php 
session_start();
  require 'dashboard/data_connection/database.php';
?> 
<?php
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $amount = htmlspecialchars(trim($_POST['amount']));
    $deadline = $_POST['deadline'];
    $message = htmlspecialchars(trim($_POST['message']));
    $Project_ID = $_GET['id'];	
    $Freelance_ID = $_SESSION['UserID'];
    
    if (!empty($amount) && !empty($deadline)&& !empty($message)) {

        $sql = "INSERT into offres (Amount, Deadline, message, Project_ID, UserID) values ('$amount','$deadline','$message','$Project_ID','$Freelance_ID')";
        mysqli_query($con, $sql);

        header("Location: recherch.php");
        exit();
    } else {
        echo "Please enter some valid information!";
    }
    mysqli_close($con);
}
?>
<?php
require 'includes/header.php';
?>
<?php 
 if(isset($_GET['id'])){
    $id_project=$_GET['id']; 
     $query = "select * from projects WHERE Project_ID = $id_project;";
        $res = mysqli_query($con, $query);
          if (mysqli_num_rows($res) > 0) :
?>
    <div class="blog-single gray-bg">
<?php if ($row = mysqli_fetch_assoc($res)) :?>
        <div class="container">
            <div class="row align-items-start">
                <div class="col-lg-8 m-15px-tb">
                    <article class="article">
                        <div class="article-img">
                            <!-- image project -->
                            <img src="https://www.bootdey.com/image/800x350/87CEFA/000000" title="" alt="">
                        </div>
                        <div class="article-title">
                            <h2><?php echo $row['Project_Title'];?></h2>
                        </div>
                        <!-- description project -->
                        <div class="article-content">
                            <?php echo $row['Descrip_project'];?> 
                        </div>
        
                        <!-- Tags -->
                        <div class="nav tag-cloud">
                            <a href="#">Design</a>
                            <a href="#">Development</a>
                            <a href="#">Travel</a>
                            <a href="#">Web Design</a>
                            <a href="#">Marketing</a>
                            <a href="#">Research</a>
                            <a href="#">Managment</a>
                        </div>
                    </article>
<!-- button for offers -->

<button type="button" class="btn btn-primary me-2 sign-style-color" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">Tack to Project</button>

<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Offer</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">

        <form id="add_offer_form" action="single_page.php?id=<?=$id_project?>" method="POST">
          <div class="mb-3">
            <div class="input-group mb-3">
                <div class="input-group">
                    <input type="text" class="form-control" name="amount" aria-label="Amount (to the nearest dollar)">
                    <div class="input-group-append" id="amount">
                        <span class="input-group-text">$</span>
                    </div>
                </div>
            </div>    
            </div>
            <div class="mb-3">
                <label for="message-text" class="col-form-label">Deadline</label>
                <input type="date" class="date form-control" id="deadline" name="deadline" />
            </div>
          <div class="mb-3">
            <label for="message-text" class="col-form-label" name="message">Message</label>
            <textarea class="text" id="message" name="message"></textarea>
          </div>
        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" onclick="add_offer()" class="btn btn-primary me-2 sign-style-color">add offer</button>
        </form>
      </div>
      <div class="modal-footer">

      </div>
    </div>
  </div>
</div>
<!-- end button for offers -->
</div>

        <!-- clinet information -->
                <div class="col-lg-4 m-15px-tb blog-aside">
                    <!-- Author -->
                    <div class="widget widget-author">
                        <div class="widget-title">
                            <h3>Author</h3>
                        </div>
                        <div class="widget-body">
                            <div class="media align-items-center">
                                <div class="avatar">
                                    <img src="https://bootdey.com/img/Content/avatar/avatar6.png" title="" alt="">
                                </div>
                                <div class="media-body">
                                    <h6>Hello, I'm<br> Rachel Roth</h6>
                                </div>
                            </div>
                            <p>I design and develop services for customers of all sizes, specializing in creating stylish, modern websites, web services and online stores</p>
                        </div>
                    </div>
                    <!-- End Author -->
                    
                    <!-- Latest Post -->
                    <div class="widget widget-latest-post">
                        <div class="widget-title">
                            <h3>Latest Post</h3>
                        </div>
                        <div class="widget-body">
                            <div class="latest-post-aside media">
                                <div class="lpa-left media-body">
                                    <div class="lpa-title">
                                        <h5><a href="#">Prevent 75% of visitors from google analytics</a></h5>
                                    </div>
                                    <div class="lpa-meta">
                                        <a class="name" href="#">
                                            Rachel Roth
                                        </a>
                                        <a class="date" href="#">
                                            26 FEB 2020
                                        </a>
                                    </div>
                                </div>
                                <div class="lpa-right">
                                    <a href="#">
                                        <img src="https://www.bootdey.com/image/400x200/FFB6C1/000000" title="" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="latest-post-aside media">
                                <div class="lpa-left media-body">
                                    <div class="lpa-title">
                                        <h5><a href="#">Prevent 75% of visitors from google analytics</a></h5>
                                    </div>
                                    <div class="lpa-meta">
                                        <a class="name" href="#">
                                            Rachel Roth
                                        </a>
                                        <a class="date" href="#">
                                            26 FEB 2020
                                        </a>
                                    </div>
                                </div>
                                <div class="lpa-right">
                                    <a href="#">
                                        <img src="https://www.bootdey.com/image/400x200/FFB6C1/000000" title="" alt="">
                                    </a>
                                </div>
                            </div>
                            <div class="latest-post-aside media">
                                <div class="lpa-left media-body">
                                    <div class="lpa-title">
                                        <h5><a href="#">Prevent 75% of visitors from google analytics</a></h5>
                                    </div>
                                    <div class="lpa-meta">
                                        <a class="name" href="#">
                                            Rachel Roth
                                        </a>
                                        <a class="date" href="#">
                                            26 FEB 2020
                                        </a>
                                    </div>
                                </div>
                                <div class="lpa-right">
                                    <a href="#">
                                        <img src="https://www.bootdey.com/image/400x200/FFB6C1/000000" title="" alt="">
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Latest Post -->
                    <!-- widget Tags -->
                    <div class="widget widget-tags">
                        <div class="widget-title">
                            <h3>Latest Tags</h3>
                        </div>
                        <div class="widget-body">
                            <div class="nav tag-cloud">
                                <a href="#">Design</a>
                                <a href="#">Development</a>
                                <a href="#">Travel</a>
                                <a href="#">Web Design</a>
                                <a href="#">Marketing</a>
                                <a href="#">Research</a>
                                <a href="#">Managment</a>
                            </div>
                        </div>
                    </div>
                    <!-- End widget Tags -->
                </div>
            </div>
        </div>
        <?php endif;?>
        <?php endif;}?> 
    </div>
<?php
function add_offer() {
    document.getElementById("add_offer_form").submit();
}
require 'includes/footer.php';
?>