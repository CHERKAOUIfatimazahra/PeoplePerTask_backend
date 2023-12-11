<?php
require 'includes/header.php';
include 'dashboard/data_connection/database.php';

if (!isset($_SESSION['UserID'])) {
    
    header("Location: login.php");
    exit();
}

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

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/MaterialDesign-Webfont/7.2.96/css/materialdesignicons.min.css" integrity="sha512-LX0YV/MWBEn2dwXCYgQHrpa9HJkwB+S+bnBpifSOTO1No27TqNMKYoAn6ff2FBh03THAzAiiCwQ+aPX+/Qt/Ow==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<?php
  require 'dashboard/data_connection/database.php';
  $userId = $_SESSION['UserID'];
  $query = "select * from users 
  where UserID = $userId";
  
  $res = mysqli_query($con, $query);
  if (mysqli_num_rows($res) > 0) :
    while ($row = mysqli_fetch_assoc($res)) :
?>
<div class="container">
<div class="row">
    <div class="col-xl-12">
        <div class="card">
            <div class="card-body pb-0">
                <div class="row align-items-center">
                    <div class="col-md-3">
                        <div class="text-center border-end">
                            <img src="<?php echo $row['user_img']?>" class="img-fluid avatar-xxl rounded-circle" alt="">
                            <h4 class="text-primary font-size-20 mt-3 mb-2"><?php echo $row['UserName']?></h4>
                        </div>
                    </div><!-- end col -->
                    <div class="col-md-9">
                        <div class="ms-3">
                            <div>
                                <h4 class="card-title mb-2"><?php echo $row['role']?></h4>
                            </div>
                            <div class="row my-4">
                                <div class="col-md-12">
                                    <div>
                                        <p class="text-muted mb-2 fw-medium"><i class="mdi mdi-email-outline me-2"></i><?php echo $row['email']?>
                                        </p>
                                        <p class="text-muted fw-medium mb-0"><i class="mdi mdi-phone-in-talk-outline me-2"></i>418-955-4703
                                        </p>
                                    </div>
                                </div><!-- end col -->
                            </div><!-- end row -->
                         
                            <ul class="nav nav-tabs nav-tabs-custom border-bottom-0 mt-3 nav-justfied" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link px-4 active" href="dashboard/projects.php" target="__blank">
                                        <span class="d-block d-sm-none"><i class="fas fa-home"></i></span>
                                        <span class="d-none d-sm-block">Projects</span>
                                    </a>
                                </li><!-- end li -->
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link px-4"  href="dashboard/offers.php" target="__blank" >
                                        <span class="d-block d-sm-none"><i class="mdi mdi-menu-open"></i></span>
                                        <span class="d-none d-sm-block">offers</span>
                                    </a>
                                </li><!-- end li -->
                                <li class="nav-item" role="presentation">
                                    <a class="nav-link px-4 "  href="#" target="__blank" >
                                        <span class="d-block d-sm-none"><i class="mdi mdi-account-group-outline"></i></span>
                                        <span class="d-none d-sm-block">Team</span>
                                    </a>
                                </li><!-- end li -->
                            </ul><!-- end ul -->
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end card body -->
        </div><!-- end card -->
<!-- projects -->

        <div class="card">
            <div class="tab-content p-4">
                <div class="tab-pane active show" id="projects-tab" role="tabpanel">
                    <div class="d-flex align-items-center">
                        <div class="flex-1">
                            <h4 class="card-title mb-4">Projects</h4>
                        </div>
                    </div>

                    <div class="row" id="all-projects">
                        <div class="col-md-6" id="project-items-1">
                            <div class="card">
                                <div class="card-body">
                                    <div class="d-flex mb-3">
                                        <div class="flex-grow-1 align-items-start">
                                            <div>
                                                <h6 class="mb-0 text-muted">
                                                    <i class="mdi mdi-circle-medium text-danger fs-3 align-middle"></i>
                                                    <span class="team-date">21 Jun, 2021</span>
                                                </h6>
                                            </div>
                                        </div>
                                        <div class="dropdown ms-2">
                                            <a href="#" class="dropdown-toggle font-size-16 text-muted" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="mdi mdi-dots-horizontal"></i>
                                            </a>

                                            <div class="dropdown-menu dropdown-menu-end">
                                                <a class="dropdown-item" href="javascript: void(0);" data-bs-toggle="modal" data-bs-target=".bs-example-new-project" onclick="editProjects('project-items-1')">Edit</a>
                                                <a class="dropdown-item" href="javascript: void(0);">Share</a>
                                                <div class="dropdown-divider"></div>
                                                <a class="dropdown-item delete-item" onclick="deleteProjects('project-items-1')" data-id="project-items-1" href="javascript: void(0);">Delete</a>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="mb-4">
                                        <h5 class="mb-1 font-size-17 team-title">Project_Title</h5>
                                        <p class="text-muted mb-0 team-description">Descrip_project</p>
                                    </div>
                                    <div class="d-flex">
                                        <div class="avatar-group float-start flex-grow-1 task-assigne">
                                            <div class="avatar-group-item">
                                                <a href="javascript: void(0);" class="d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" value="member-6" aria-label="Terrell Soto" data-bs-original-title="Terrell Soto">
                                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="rounded-circle avatar-sm">
                                                </a>
                                            </div>
                                            <div class="avatar-group-item">
                                                <a href="javascript: void(0);" class="d-inline-block" data-bs-toggle="tooltip" data-bs-placement="top" value="member-1" aria-label="Ruhi Shah" data-bs-original-title="Ruhi Shah">
                                                    <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="" class="rounded-circle avatar-sm">
                                                </a>
                                            </div>
                                            <div class="avatar-group-item">
                                                <a href="javascript: void(0);" class="d-block" data-bs-toggle="tooltip" data-bs-placement="top" value="member-15" data-bs-original-title="Denny Silva">
                                                    <div class="avatar-sm">
                                                        <div class="avatar-title rounded-circle bg-primary">
                                                            D
                                                        </div>
                                                    </div>
                                                </a>
                                            </div>
                                        </div><!-- end avatar group -->
                                        <div class="align-self-end">
                                            <span class="badge badge-soft-danger p-2 team-status">Pending</span>
                                        </div>
                                    </div>
                                </div><!-- end cardbody -->
                            </div><!-- end card -->
                        </div><!-- end col -->

        <div class="card">
            <div class="card-body">
                <div class="pb-2">
                    <h4 class="card-title mb-3">About</h4>
                    <p class="mb-0 text-muted"><?php echo $row['OtherRelevantInformation']?></p>
                </div>
                <hr>
                <div class="pt-2">
                    <h4 class="card-title mb-4">My Skill</h4>
                    <div class="d-flex gap-2 flex-wrap">
                        <span class="badge badge-soft-secondary p-2">HTML</span>
                        <span class="badge badge-soft-secondary p-2">Bootstrap</span>
                        <span class="badge badge-soft-secondary p-2">Scss</span>
                        <span class="badge badge-soft-secondary p-2">Javascript</span>
                        <span class="badge badge-soft-secondary p-2">React</span>
                        <span class="badge badge-soft-secondary p-2">Angular</span>
                    </div>
                </div>
            </div><!-- end cardbody -->
        </div><!-- end card -->

        <div class="card">
            <div class="card-body">
                <div>
                    <h4 class="card-title mb-4">Personal Details</h4>
                    <div class="table-responsive">
                        <table class="table table-bordered mb-0">
                            <tbody>
                                <tr>
                                    <th scope="row">Name</th>
                                    <td><?php echo $row['UserName']?></td>
                                </tr><!-- end tr -->
                                <tr>
                                    <th scope="row">Location</th>
                                    <td>California, United States</td>
                                </tr><!-- end tr -->
                                <tr>
                                    <th scope="row">Language</th>
                                    <td>English</td>
                                </tr><!-- end tr -->
                                <tr>
                                    <th scope="row">Website</th>
                                    <td>abc12@probic.com</td>
                                </tr><!-- end tr -->
                            </tbody><!-- end tbody -->
                        </table><!-- end table -->
                    </div>
                </div>
            </div><!-- end card body -->
        </div><!-- end card -->

    </div><!-- end col -->
</div>
</div>

<?php endwhile;
endif?>

<!-- footer -->
<?php require 'includes/footer.php';?>