
    <script>
        function add_testimonial() {
            document.getElementById("add_testimonial_form").submit();
        }

        function submitUpdate() {
            document.getElementById("update_testimonial_form").submit();
        }

        function updateTestimonial(id , comment , userId) {
            document.getElementById("update_id").value = id;
            document.getElementById("update_Comment").value = comment;
            document.getElementById("update_UserID").value = userId;

            document.getElementById('open_modal_button').click();
        }

        function delete_testimonial(id) {
            document.getElementById("delete_id").value = id;
            document.getElementById("delete_testimonial_form").submit();
        }
    </script>

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
                    data-bs-target="#modalAdd"> ADD New Testimonial</button>

                <button style="display:none;" type="button" id="open_modal_button" class="btn btn-success"
                    data-bs-toggle="modal" data-bs-target="#modalUpdate"></button>
                <table id="example" class="table table-striped table-info" style="width:100%">
                    <thead>
                        <tr class="table-dark">
                            <th>ID</th>
                            <th>Comment</th>
                            <th>User name</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        require './data_connection/database.php';
                        $query = "select t.ID_Temoignage , t.Comment, u.UserName , u.UserID from Testimonials t
                                inner join users u on u.UserID = t.UserID";

                        $res = mysqli_query($con, $query);
                        if (mysqli_num_rows($res) > 0):
                            while ($row = mysqli_fetch_assoc($res)):
                                echo "<tr>";
                                echo "<td>" . $row['ID_Temoignage'] . "</td>";
                                echo "<td>" . $row['Comment'] . "</td>";
                                echo "<td>" . $row['UserName'] . "</td>";
                                echo '<td><div style="display:flex;"><button type="button" class="btn btn-success" onclick="updateTestimonial(' . $row['ID_Temoignage'] . ' , \''. $row['Comment'] .'\' , '. $row['UserID'] .')" >Modify</button> 
                                <button type="button" onclick="delete_testimonial(' . $row['ID_Temoignage'] . ')" class="btn btn-danger mx-2">Delete</button></div></td>';
                                echo "</tr>";
                            endwhile;
                        endif;
                        ?>
                    </tbody>
                </table>

                <div class="modal fade modal-lg" id="modalAdd" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Freelancer modal</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"></span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="add_testimonial_form" action="./testimonials_CRUD/add_testimonials.php"
                                    method="POST">
                                    <div class="mb-3">
                                        <label for="Comment" class="col-form-label">Comment</label>
                                        <textarea type="text" class="form-control" name="Comment" id="Comment"></textarea>
                                    </div>
                                    <div class="mb-3">
                                        <label for="UserID" class="col-form-label">User: </label>
                                        <select class="py-2 px-1 m-3 w-100 bg-gray-200 text-gray-500 rounded-md" name="UserID" id="UserID">
                                            <?php
                                            require './data_connection/database.php';
                                            $query = "select u.UserID , u.UserName  from users u";

                                            $res = mysqli_query($con, $query);
                                            if (mysqli_num_rows($res) > 0):
                                                while ($row = mysqli_fetch_assoc($res)):
                                                    echo '<option class="text-gray-500" value="' . $row['UserID'] . '">' . $row['UserName'] . '</option>';
                                                endwhile;
                                            endif;
                                            ?>
                                        </select>
                                    </div>
                                </form>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="button" onclick="add_testimonial()" class="btn btn-primary">Save changes</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- UPDATE  -->
                <div class="modal fade modal-lg" id="modalUpdate" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle">Testimonial modal</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true"></span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <form id="update_testimonial_form" action="./testimonials_CRUD/update_testimonials.php" method="POST">
                                    <div class="mb-3">
                                            <label for="update_Comment" class="col-form-label">Comment</label>
                                            <textarea type="text" class="form-control" name="update_Comment" id="update_Comment"></textarea>
                                    </div>
                                    <input type="text" name="update_id" id="update_id" style="display:none;">
                                    <div class="mb-3">
                                        <label for="update_UserID" class="col-form-label">User: </label>
                                        <select class="py-2 px-1 m-3 w-100 bg-gray-200 text-gray-500 rounded-md" name="update_UserID" id="update_UserID">
                                        <?php
                                        require './data_connection/database.php';
                                        $query = "select u.UserID , u.UserName  from users u";

                                        $res = mysqli_query($con, $query);
                                        if (mysqli_num_rows($res) > 0):
                                            while ($row = mysqli_fetch_assoc($res)):
                                                echo '<option class="text-gray-500" value="' . $row['UserID'] . '">' . $row['UserName'] . '</option>';
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
                
                <form id="delete_testimonial_form" style="display:none" action="./testimonials_CRUD/delete_testimonials.php" method="POST" >
                        <input type="text" name="delete_id" id="delete_id">
                </form>
            </div>
        </div>
    </div>

<script>

    function delete_testimonial(id) {
        // confirmation deleting
        const confirmed = confirm("Are you sure you want to delete this testimonial?");
        
        if (confirmed) {
            document.getElementById("delete_id").value = id;
            document.getElementById("delete_testimonial_form").submit();
        }
    }
</script>        
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
        </script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="js_fill/dashboard.js"></script>
    <script src="js_fill/script.js"></script>
</body>

</html>