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
            <div class="container my-4 py-4">
  <!-- Primary Button -->
  <button type="button" class="btn btn-primary my-2" data-bs-toggle="modal"
                               data-bs-target="#exampleModalCenter1"> ADD user</button>
<button style="display:none;" type="button" id="open_modal_button" class="btn btn-success" data-bs-toggle="modal"
data-bs-target="#exampleModalCenter"></button> 
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr class="table-dark">
                            <th>User</th>
                            <th>Email</th>
                            <th>img</th>
                            <th>OtherRelevantInformation</th>
                            <th>Role</th>
                            <th ></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                            require './data_connection/database.php';
                            $query = "select * from users;";

                            $res = mysqli_query($con, $query);
                            if (mysqli_num_rows($res) > 0) :
                                while ($row = mysqli_fetch_assoc($res)) :
                                    echo "<tr>";
                                    echo "<td>" . $row['UserName'] . "</td>";
                                    echo "<td>" . $row['email'] . "</td>";
                                    echo "<td>" . $row['user_img'] . "</td>";
                                    echo "<td>" . $row['OtherRelevantInformation'] . "</td>";
                                    echo "<td>" . $row['role'] . "</td>";
                                    // modefy delet
                                    echo '<td><div style="display:flex;"><button type="button" class="btn btn-success" onclick="updateUser(' . $row['UserID'] . ' , \'' . $row['UserName'] . '\' , \'' . $row['Password'] .'\' , \'' . $row['email'] .'\' ,\'' . $row['user_img'] .'\', \''. $row['OtherRelevantInformation'] .'\', \''. $row['role'] .'\')" >Modify</button> 
                                    <button type="button" onclick="delete_user(' . $row['UserID'] . ')" class="btn btn-danger mx-2">Delete</button></div></td>';
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
                    <h5 class="modal-title" id="exampleModalCenterTitle">Modify Profile</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                <form id="update_user_form" action="./User_CRUD/update_user.php" method="POST">
                        <div class="mb-3">
                            <label for="update_name" class="col-form-label">User name:</label>
                            <input type="text" class="form-control" name="update_name" id="update_name">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Password:</label>
                            <input class="form-control" name="update_password" id="update_password">
                            </input>
                        </div>
                        <input type="text" name="update_id" id="update_id" style="display:none;">
                        <div class="mb-3">
                            <label for="update_email" class="col-form-label">Email</label>
                            <input type="text" class="update_email" name="update_email" id="update_email">
                        </div>
                        <!-- img -->
                        <form>
                            <div class="form-group">
                                <label for="exampleFormControlFile1">add your image</label>
                                <input type="file" name="update_img" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                        </form>
                        <div class="mb-3">
                            <label for="update_info" class="col-form-label">Other Relevant Information</label>
                            <textarea class="form-control" name="update_info" id="update_info"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="update_role" class="col-form-label">Role</label>
                            <select class="form-control" name="update_role" id="update_role"><?php
                                require './data_connection/database.php';
                                $query = "select role from users";

                                $res = mysqli_query($con, $query);
                                if (mysqli_num_rows($res) > 0) :
                                    while ($row = mysqli_fetch_assoc($res)) :
                                        echo '<option class="text-gray-500" value="' . $row['role'] . ';"></option>';
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
    <div class="modal fade modal-lg" id="exampleModalCenter1" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Users modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add_user_form" action="./User_CRUD/add_user.php" method="POST">
                    <div class="mb-3">
                            <label for="name" class="col-form-label">User name</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="mb-3">
                            <label for="password" class="col-form-label">Password</label>
                            <input type="text" class="form-control" name="password" id="password">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="col-form-label">Email</label>
                            <input type="text" class="form-control" name="email" id="email">
                        </div>
                        <!-- img -->
                            <div class="form-group">
                                <label for="exampleFormControlFile1">add your image</label>
                                <input type="file" name="img" class="form-control-file" id="exampleFormControlFile1">
                            </div>
                        <div class="mb-3">
                            <label for="relevant_info" class="col-form-label">Other Relevant Information</label>
                            <textarea class="form-control" name="relevant_info" id="relevant_info"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="role" class="col-form-label">Role</label>
                            <textarea class="form-control" name="role" id="role"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="add_user()" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <form id="delete_user_form" style="display:none" action="./User_CRUD/delete_user.php" method="POST" >
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
        function add_user() {
            document.getElementById("add_user_form").submit();
        };

        function submitUpdate() {
            document.getElementById("update_user_form").submit();
        }

        function updateUser(id , UserName , Password, email , user_img, OtherRelevantInformation) {
            document.getElementById("update_id").value = id;
            document.getElementById("update_name").value = UserName;
            document.getElementById("update_password").value = Password;
            document.getElementById("update_email").value = email;
            document.getElementById("update_img").value = user_img;
            document.getElementById("update_info").value = OtherRelevantInformation;

            document.getElementById('open_modal_button').click();
        };

        function delete_user(id) {
        // confirmation deleting
        const confirmed = confirm("Are you sure you want to delete this user?");
        
        if (confirmed) {
            document.getElementById("delete_id").value = id;
            document.getElementById("delete_user_form").submit();
        }
    };
    </script>
</body>

</html>