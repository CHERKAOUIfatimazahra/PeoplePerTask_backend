<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="dashboard.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">


    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/dataTables.bootstrap5.min.css">

    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

</head>

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
                <div class="navbar  gap-4">
                    <div class="">
                        <input type="search" class="search " placeholder="Search">
                        <img class="search_icon" src="img/search.svg" alt="iconicon">
                    </div>
                    <!-- <img src="img/search.svg" alt="icon"> -->
                    <img class="notification" src="img/new.svg" alt="icon">
                    <div class="card new w-auto">
                        <div class="list-group list-group-light">
                            <div class="list-group-item px-3 d-flex justify-content-between align-items-center ">
                                <p class="mt-auto">Notification</p><a href="#"><img src="img/settingsno.svg"
                                        alt="icon"></a>
                            </div>
                            <div class="list-group-item px-3 d-flex"><img src="img/notif.svg" alt="iconimage">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text mb-3">Some quick example text to build on the card title and
                                        make up
                                        the bulk of the card's content.</p>
                                    <small class="card-text">1 day ago</small>
                                </div>
                            </div>
                            <div class="list-group-item px-3 d-flex"><img src="img/notif.svg" alt="iconimage">
                                <div class="card-body">
                                    <h5 class="card-title">Card title</h5>
                                    <p class="card-text mb-3">Some quick example text to build on the card title and
                                        make up
                                        the bulk of the card's content.</p>
                                    <small class="card-text">1 day ago</small>
                                </div>
                            </div>
                            <div class="list-group-item px-3 text-center"><a href="#">View all notifications</a></div>
                        </div>
                    </div>
                    <div class="inline"></div>
                    <div class="name">lahcen Admin</div>
                    <ul class="navbar-nav">
                        <li class="nav-item dropdown">
                            <a href="#" class="nav-icon pe-md-0 position-relative" data-bs-toggle="dropdown">
                                <img src="img/photo_admin.svg" alt="icon">
                            </a>
                            <div class="dropdown-menu dropdown-menu-end position-absolute">
                                <a class="dropdown-item" href="#">Profile</a>
                                <a class="dropdown-item" href="#">Account Setting</a>
                                <a class="dropdown-item" href="index.php">Log out</a>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
            <div class="container my-4 py-4">
                <!-- Primary Button -->
                <button type="button" class="btn btn-primary my-2" data-bs-toggle="modal"
                    data-bs-target="#exampleModalCenter"> ADD New PROJECT</button>
                    <button style="display:none;" type="button" id="open_modal_button" class="btn btn-success" data-bs-toggle="modal"
data-bs-target="#exampleModalCenter3"></button> 

                <table id="example" class="table table-striped  " style="width:100%">
                    <thead>
                        <tr class="table-dark">
                            <th>ID</th>
                            <th>Project Title</title></th>
                            <th>Description</th>
                            <th>category</th>
                            <th>sub category</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                            require './data_connection/database.php';
                            $query = "select p.Project_ID ,  p.Project_Title,p.Descrip_project,c.CategoryName , c.Category_ID, sc.sub_Category_ID,sc.sub_category_Name  from Projects p
                            join categories c on c.Category_ID = p.Category_ID
                            join sub_Categories sc on sc.sub_Category_ID = p.sub_Category_ID ";

                            $res = mysqli_query($con, $query);
                            if (mysqli_num_rows($res) > 0) :
                                while ($row = mysqli_fetch_assoc($res)) :
                                    echo "<tr>";
                                    echo "<td>" . $row['Project_ID'] . "</td>";
                                    echo "<td>" . $row['Project_Title'] . "</td>";
                                    echo "<td>" . $row['Descrip_project'] . "</td>";
                                    echo "<td>" . $row['CategoryName'] . "</td>";
                                    echo "<td>" . $row['sub_category_Name'] . "</td>";
                                    echo '<td><div style="display:flex;"><button type="button" class="btn btn-success" onclick="updateProject(' . $row['Project_ID'] . ' , \''. $row['Project_Title'] .'\' , \''. $row['Descrip_project'] .'\' , '. $row['Category_ID'] .' , '. $row['sub_Category_ID'] .')" >Modify</button> 
                                    <button type="button" onclick="delete_project(' . $row['Project_ID'] . ')" class="btn btn-danger mx-2">Delete</button></div></td>';
                                    echo "</tr>";
                                endwhile;
                            endif;
                        ?>
                    </tbody>
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

        function updateProject(id , project_title , project_desc , cat_id , sub_cat_id) {
            document.getElementById("update_id").value = id;
            document.getElementById("update_Project_Title").value = project_title;
            document.getElementById("update_Descrip_project").value = project_desc;
            document.getElementById("update_Category_ID").value = cat_id;
            document.getElementById("update_sub_Category_ID").value = sub_cat_id;

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
</body>

</html>