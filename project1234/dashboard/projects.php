<?php
session_start();
include 'data_connection/database.php';

if (!isset($_SESSION['UserID'])) {
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
        <div class="main">
            <div class="container my-4 py-4">
                <!-- Primary Button -->
        <?php if( $_SESSION['role'] == 'Client'):?>
                <button type="button" class="btn btn-primary my-2" data-bs-toggle="modal"
                    data-bs-target="#exampleModalCenter"> ADD New PROJECT</button>
                <button style="display:none;" type="button" id="open_modal_button" class="btn btn-success" data-bs-toggle="modal"
                    data-bs-target="#exampleModalCenter3"></button> 
<?php endif;?>
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr class="table-dark">
                            <th>Project Title</th>
                            <th>Description</th>
                            <th>category</th>
                            <th>sub category</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        require './data_connection/database.php';
                        if ($_SESSION['role'] == 'Admin'){
                            $userId = $_SESSION['UserID'];
                            $query = "SELECT p.Project_ID, p.Project_Title, p.Descrip_project, c.CategoryName, c.Category_ID, sc.sub_Category_ID, sc.sub_category_Name
                            FROM Projects p
                            JOIN categories c ON c.Category_ID = p.Category_ID
                            JOIN sub_Categories sc ON sc.sub_Category_ID = p.sub_Category_ID"; 
                        }
                        else{
                        $userId = $_SESSION['UserID'];
                        
                        $query = "SELECT p.Project_ID, p.Project_Title, p.Descrip_project, c.CategoryName, c.Category_ID, sc.sub_Category_ID, sc.sub_category_Name 
                            FROM Projects p
                            JOIN categories c ON c.Category_ID = p.Category_ID
                            JOIN sub_Categories sc ON sc.sub_Category_ID = p.sub_Category_ID
                            WHERE p.UserID = $userId";
                        }
                        $res = mysqli_query($con, $query);
                        
                        if (mysqli_num_rows($res) > 0) :
                            while ($row = mysqli_fetch_assoc($res)) :
                                echo "<tr>";
                                echo "<td>" . $row['Project_Title'] . "</td>";
                                echo "<td>" . $row['Descrip_project'] . "</td>";
                                echo "<td>" . $row['CategoryName'] . "</td>";
                                echo "<td>" . $row['sub_category_Name'] . "</td>";

                            if ( $_SESSION['role'] == 'Client'){
                                echo '<td><div style="display:flex;"><button type="button" class="btn btn-success" onclick="updateProject(' . $row['Project_ID'] . ' , \''. $row['Project_Title'] .'\' , \''. $row['Descrip_project'] .'\' , '. $row['Category_ID'] .' , '. $row['sub_Category_ID'] .')" >Modify</button>'; 
                            }
                            if ( $_SESSION['role'] == 'Client' || $_SESSION['role'] == 'Admin'){    
                                echo '<td><div style="display:flex;"><button type="button" onclick="delete_project(' . $row['Project_ID'] . ')" class="btn btn-danger mx-2">Delete</button>';
                            }
                                echo "</tr>";
                            endwhile;
                        endif;
                    ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal update -->
    <div class="modal fade modal-lg" id="exampleModalCenter" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">New Project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
        <!-- add project -->
                <div class="modal-body">
                <form id="add_project_form" action="./projects_CRUD/add_project.php" method="POST">
                        <div class="mb-3">
                            <label for="Project_Title" class="col-form-label">Project Title</label>
                            <input type="text" class="form-control" name="Project_Title" id="Project_Title">
                        </div>
                        <div class="mb-3">
                            <label for="Descrip_project" class="col-form-label">Description</label>
                            <textarea class="form-control" id="Descrip_project" name="Descrip_project"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="Category_ID" class="col-form-label">Category: </label>
                            <select class="py-2 px-1 m-3 w-100 bg-gray-200 text-gray-500 rounded-md" name="Category_ID" id="Category_ID">
                            <?php
                                require './data_connection/database.php';
                                $query = "select c.Category_ID , c.CategoryName  from categories c";

                                $res = mysqli_query($con, $query);
                                if (mysqli_num_rows($res) > 0) :
                                    while ($row = mysqli_fetch_assoc($res)) :
                                        echo '<option class="text-gray-500" value="' . $row['Category_ID'] . '">'. $row['CategoryName']  .'</option>';
                                    endwhile;
                                endif;
                            ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="Category_ID" class="col-form-label">Sub_Category: </label>
                            <select class="py-2 px-1 m-3 w-100 bg-gray-200 text-gray-500 rounded-md" name="sub_Category_ID" id="sub_Category_ID">
                            <?php
                                require './data_connection/database.php';
                                $query = "select sc.sub_Category_ID , sc.sub_category_Name  from sub_Categories sc";

                                $res = mysqli_query($con, $query);
                                if (mysqli_num_rows($res) > 0) :
                                    while ($row = mysqli_fetch_assoc($res)) :
                                        echo '<option class="text-gray-500" value="' . $row['sub_Category_ID'] . '">'. $row['sub_category_Name']  .'</option>';
                                    endwhile;
                                endif;
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Enter your tags</label>
                            <input type="text" name="tags" id="tags" class="form-control" />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="add_project()" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade modal-lg" id="exampleModalCenter3" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">New Project</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                <form id="update_project_form" action="./projects_CRUD/update_project.php" method="POST">
                        <div class="mb-3">
                            <label for="update_Project_Title" class="col-form-label">Project Title</label>
                            <input type="text" class="form-control" name="update_Project_Title" id="update_Project_Title">
                        </div>
                        <input type="text" name="update_id" id="update_id" style="display:none;">
                        <div class="mb-3">
                            <label for="update_Descrip_project" class="col-form-label">Description</label>
                            <textarea class="form-control" id="update_Descrip_project" name="update_Descrip_project"></textarea>
                        </div>
                        <div class="mb-3">
                            <select class="py-2 px-1 m-3 w-100 bg-gray-200 text-gray-500 rounded-md" name="update_Category_ID" id="update_Category_ID">
                            <?php
                                require './data_connection/database.php';
                                $query = "select c.Category_ID , c.CategoryName  from categories c";

                                $res = mysqli_query($con, $query);
                                if (mysqli_num_rows($res) > 0) :
                                    while ($row = mysqli_fetch_assoc($res)) :
                                        echo '<option class="text-gray-500" value="' . $row['Category_ID'] . '">'. $row['CategoryName']  .'</option>';
                                    endwhile;
                                endif;
                            ?>
                            </select>
                        </div>
                            <div class="mb-3">
                            <select class="py-2 px-1 m-3 w-100 bg-gray-200 text-gray-500 rounded-md" name="update_sub_Category_ID" id="update_sub_Category_ID">
                            <?php
                                require './data_connection/database.php';
                                $query = "select sc.sub_Category_ID , sc.sub_category_Name  from sub_Categories sc";

                                $res = mysqli_query($con, $query);
                                if (mysqli_num_rows($res) > 0) :
                                    while ($row = mysqli_fetch_assoc($res)) :
                                        echo '<option class="text-gray-500" value="' . $row['sub_Category_ID'] . '">'. $row['sub_category_Name']  .'</option>';
                                    endwhile;
                                endif;
                            ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Enter your tags</label>
                            <input type="text" name="update_tags" id="update_tags" class="form-control" />
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="submitUpdate()" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <form id="delete_project_form" style="display:none" action="./projects_CRUD/delete_project.php" method="POST" >
        <input type="text" name="delete_id" id="delete_id">
    </form>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="js_fill/dashboard.js"></script>
    <script src="js_fill/script.js"></script>
    <script>
        function add_project() {
            document.getElementById("add_project_form").submit();
        };

        function submitUpdate() {
            document.getElementById("update_project_form").submit();
        }

        function updateProject(id , project_title , project_desc , cat_id , sub_cat_id,tags_name) {
            document.getElementById("update_id").value = id;
            document.getElementById("update_Project_Title").value = project_title;
            document.getElementById("update_Descrip_project").value = project_desc;
            document.getElementById("update_Category_ID").value = cat_id;
            document.getElementById("update_sub_Category_ID").value = sub_cat_id;
            document.getElementById("update_tags").value = tags_name;

            document.getElementById('open_modal_button').click();
        };

        function delete_project(id) {
           // confirmation deleting
        const confirmed = confirm("Are you sure you want to delete this projet?");
        
        if (confirmed) {
            document.getElementById("delete_id").value = id;
            document.getElementById("delete_project_form").submit();
        }
        };
    </script>
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
<!-- add tags -->

</script>
</body>

</html>