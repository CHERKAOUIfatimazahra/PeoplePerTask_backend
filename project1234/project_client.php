<?php
require 'includes/header.php';
include 'dashboard/data_connection/database.php';

if (!isset($_SESSION['UserID'])) {
    
    header("Location: login.php");
    exit();
}
?>

<!-- add project -->

<link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://select2.github.io/dist/css/select2.min.css" rel="stylesheet">
<script src="https://select2.github.io/dist/js/select2.full.js"></script>

<section class="project_client.php" >
<div class="container-fluid">

<div class="container">
  <!-- Title -->
  <div class="d-flex justify-content-between align-items-lg-center py-3 flex-column flex-lg-row">
    <h2 class="h5 mb-3 mb-lg-0"><a href="../../pages/admin/customers.html" class="text-muted"><i class="bi bi-arrow-left-square me-2"></i></a> Create new Project</h2>
    <div class="hstack gap-3">
      <button class="btn btn-light btn-sm btn-icon-text"><i class="bi bi-x"></i> <span class="text">Cancel</span></button>
      <button class="btn btn-primary btn-sm btn-icon-text"><i class="bi bi-save"></i> <span class="text">Save</span></button>
    </div>
  </div>

  <!-- Main content -->
  <div class="row">
    <!-- Left side -->
    <div class="col-lg-8">
      <!-- Basic information -->
      <div class="card mb-4">
        <div class="card-body">
          <div class="row">
            <div class="col-lg-12">
              <div class="mb-6">
                <label class="form-label">Title</label>
                <input type="text" class="form-control">
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Address -->
      <div class="card mb-4">
        <div class="card-body">
          <h3 class="h6 mb-4">Description</h3>
          <div class="mb-3">
            <label class="form-label">Address Line 1</label>
            <textarea type="text" class="form-control" name="Descrip_project"></textarea>
          </div>
        </div>
      </div>
    </div>
    <!-- Right side -->
    <div class="col-lg-4">
      <!-- Status -->
      <div class="card mb-4">
        <div class="card-body">
          <h3 class="h6">categorie</h3>
          
          <select class="form-select">
          <?php
  require 'dashboard/data_connection/database.php';
  $query = "select CategoryName from categories";
  
  $res = mysqli_query($con, $query);
  if (mysqli_num_rows($res) > 0) :
  ?>
          <?php while ($row = mysqli_fetch_assoc($res)) :?><a class="dropdown-item" href="recherch.php"><?php echo $row['CategoryName'];?></a>
            <option value="active"><?php echo $row['CategoryName'];?></a></option>
            <?php endwhile;?>
            <?php endif;?>
          </select>
        </div>
      </div>
      <!-- Avatar -->
      <div class="card mb-4">
        <div class="card-body">
          <h3 class="h6">Image</h3>
          <input class="form-control" type="file">
        </div>
      </div>
      <!-- Notes -->
      <div class="card mb-4">
        <div class="card-body">
          <h3 class="h6">Tags</h3>
          <input class="form-control" rows="3"></input>
        </div>
      </div>
      <div class="card mb-4">
        <div class="card-body">
          <h3 class="h6">skills</h3>
          <input type="text" class="form-control" rows="3">
        </div>
      </div>
      <!-- Notification settings -->
    </div>
  </div>
</div>

  </div>
</section>
<script src="https://cdn.tiny.cloud/1/tlgymkq3md5bwov6ep75enssajkvpyx2c8jtciik5vlkx4yr/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>

<!-- Place the following <script> and <textarea> tags your HTML's <body> -->
<script>
  tinymce.init({
    selector: 'textarea',
    plugins: 'ai tinycomments mentions anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed permanentpen footnotes advtemplate advtable advcode editimage tableofcontents mergetags powerpaste tinymcespellchecker autocorrect a11ychecker typography inlinecss',
    toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | align lineheight | tinycomments | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
    tinycomments_mode: 'embedded',
    tinycomments_author: 'Author name',
    mergetags_list: [
      { value: 'First.Name', title: 'First Name' },
      { value: 'Email', title: 'Email' },
    ],
    ai_request: (request, respondWith) => respondWith.string(() => Promise.reject("See docs to implement AI Assistant")),
  });
</script>
</div>

 <?php
require 'includes/footer.php';
?>