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
        <div class="main">
            <div class="container my-4 py-4">
  <!-- Primary Button -->
  <button type="button" class="btn btn-primary my-2" data-bs-toggle="modal"
                               data-bs-target="#exampleModalCenter1"> ADD freelancer</button>
<button style="display:none;" type="button" id="open_modal_button" class="btn btn-success" data-bs-toggle="modal"
data-bs-target="#exampleModalCenter"></button> 
                <table id="example" class="table table-striped table-info" style="width:100%">
                    <thead>
                        <tr class="table-dark">
                            <th>ID</th>
                            <th>Freelancer</th>
                            <th>SKILL</th>
                            <th>Email</th>
                            <th>OtherRelevantInformation</th>
                            <th ></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                            require './data_connection/database.php';
                            $query = "select f.Freelance_ID,f.NameFreelancer,f.SKILLS,u.email , u.OtherRelevantInformation from Freelancers f
                            inner join users u 
                            on f.UserID = u.UserID;";

                            $res = mysqli_query($con, $query);
                            if (mysqli_num_rows($res) > 0) :
                                while ($row = mysqli_fetch_assoc($res)) :
                                    echo "<tr>";
                                    echo "<td>" . $row['Freelance_ID'] . "</td>";
                                    echo "<td>" . $row['NameFreelancer'] . "</td>";
                                    echo "<td>" . $row['SKILLS'] . "</td>";
                                    echo "<td>" . $row['email'] . "</td>";
                                    echo "<td>" . $row['OtherRelevantInformation'] . "</td>";
                                    echo '<td><div style="display:flex;"><button type="button" class="btn btn-success" onclick="updateFreelancer(' . $row['Freelance_ID'] . ' , \'' . $row['NameFreelancer'] . '\' , \'' . $row['SKILLS'] .'\' , \'' . $row['email'] .'\' , \''. $row['OtherRelevantInformation'] .'\')" >Modify</button> 
                                    <button type="button" onclick="delete_freelancer(' . $row['Freelance_ID'] . ')" class="btn btn-danger mx-2">Delete</button></div></td>';
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
                <form id="update_freelancer_form" action="./freelancers_CRUD/update_freelancer.php" method="POST">
                        <div class="mb-3">
                            <label for="update_name" class="col-form-label">Freelancer name:</label>
                            <input type="text" class="form-control" name="update_name" id="update_name">
                        </div>
                        <div class="mb-3">
                            <label for="message-text" class="col-form-label">Skills:</label>
                            <textarea class="form-control" name="update_skills" id="update_skills"></textarea>
                        </div>
                        <input type="text" name="update_id" id="update_id" style="display:none;">
                        <div class="mb-3">
                            <label for="update_email" class="col-form-label">Email</label>
                            <input type="text" class="update_email" name="update_email" id="update_email">
                        </div>
                        <div class="mb-3">
                            <label for="update_info" class="col-form-label">Other Relevant Information</label>
                            <textarea class="form-control" name="update_info" id="update_info"></textarea>
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
                    <h5 class="modal-title" id="exampleModalCenterTitle">Freelancer modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add_freelancer_form" action="./freelancers_CRUD/add_freelancer.php" method="POST">
                    <div class="mb-3">
                            <label for="name" class="col-form-label">Freelancer name</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <div class="mb-3">
                            <label for="skills" class="col-form-label">SKILL</label>
                            <input type="text" class="form-control" name="skills" id="skills">
                        </div>
                        <div class="mb-3">
                            <label for="email" class="col-form-label">Email</label>
                            <input type="text" class="form-control" name="email" id="email">
                        </div>
                        <div class="mb-3">
                            <label for="relevant_info" class="col-form-label">Other Relevant Information</label>
                            <textarea class="form-control" name="relevant_info" id="relevant_info"></textarea>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="add_freelancer()" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <form id="delete_freelancer_form" style="display:none" action="./freelancers_CRUD/delete_freelancer.php" method="POST" >
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
        function add_freelancer() {
            document.getElementById("add_freelancer_form").submit();
        };

        function submitUpdate() {
            document.getElementById("update_freelancer_form").submit();
        }

        function updateFreelancer(id , NameFreelancer , SKILLS ,email ,OtherRelevantInformation) {
            document.getElementById("update_id").value = id;
            document.getElementById("update_name").value = NameFreelancer;
            document.getElementById("update_skills").value = SKILLS;
            document.getElementById("update_email").value = email;
            document.getElementById("update_info").value = OtherRelevantInformation;

            document.getElementById('open_modal_button').click();
        };
        function delete_freelancer(id) {
        // confirmation deleting
        const confirmed = confirm("Are you sure you want to delete this freelancer?");
        
        if (confirmed) {
            document.getElementById("delete_id").value = id;
            document.getElementById("delete_freelancer_form").submit();
        }
    }
    </script>
</body>

</html>