<?php
session_start();
include 'data_connection/database.php';

if (!isset($_SESSION['UserID'])) {
    header("Location: ../login.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $projectId = $_POST['project_id'];
    $newStatus = $_POST['new_status'];

    // Validate and sanitize user inputs as needed

    // Update the status in the database
    $updateQuery = "UPDATE offres SET status = '$newStatus' WHERE Project_ID = $projectId";
    mysqli_query($con, $updateQuery);
}

?>
<body>
    <div class="wrapper">
        <?php require "sidebar.php"; ?>
        <div class="main">
            <?php require 'navbar_dash.php'; ?> 
            <div class="main">
                <div class="container my-4 py-4">
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                        <?php if ($_SESSION['role'] == 'Client'):?>
                                <tr class="table-dark">
                            <tr class="table-dark">
                                <th>Project Title</th>
                                <th>freelancer</th>
                                <th>Amount</th>
                                <th>deadline</th>
                                <th>message</th>
                                <th>status</th>
                                <th></th>
                            </tr>
                            <?php endif;?>
                            <?php if ($_SESSION['role'] == 'Freelancer'):?>
                                <tr class="table-dark">
                                <th>Project Title</th>
                                <th>Amount</th>
                                <th>deadline</th>
                                <th>message</th>
                                <th>status</th>
                                <th></th>
                            </tr>
                            <?php endif;?>
                        </thead>
                        <tbody>
                            <?php
                        if ($_SESSION['role'] == 'Freelancer'){
                            $userId = $_SESSION['UserID'];

                            $query = "SELECT p.Project_Title, o.Amount, o.Deadline, o.message, o.status, o.Project_ID 
                                      FROM offres o
                                      JOIN projects p ON p.Project_ID = o.Project_ID
                                      WHERE o.UserID = $userId";

                            $res = mysqli_query($con, $query);

                            if (mysqli_num_rows($res) > 0) :
                                while ($row = mysqli_fetch_assoc($res)) :
                                    echo "<tr>";
                                    echo "<td>" . $row['Project_Title'] . "</td>";
                                    echo "<td>" . $row['Amount'] . "</td>";
                                    echo "<td>" . $row['Deadline'] . "</td>";
                                    echo "<td>" . $row['message'] . "</td>";
                                    echo "<td>" . $row['status'] . "</td>";
                                    echo "</tr>";
                                endwhile;
                            endif;
                        }if ($_SESSION['role'] == 'Client'){
                            $userId = $_SESSION['UserID'];

                            $query = "SELECT p.Project_Title, u.UserName, o.Amount, o.Deadline, o.message, o.status, o.Project_ID 
                                      FROM offres o
                                      JOIN projects p ON p.Project_ID = o.Project_ID
                                      JOIN users u ON u.UserID = o.UserID";

                            $res = mysqli_query($con, $query);

                            if (mysqli_num_rows($res) > 0) :
                                while ($row = mysqli_fetch_assoc($res)) :
                                    echo "<tr>";
                                    echo "<td>" . $row['Project_Title'] . "</td>";
                                    echo "<td>" . $row['UserName'] . "</td>";
                                    echo "<td>" . $row['Amount'] . "</td>";
                                    echo "<td>" . $row['Deadline'] . "</td>";
                                    echo "<td>" . $row['message'] . "</td>";
                                    echo '<td>
                                            <form method="post" action="">
                                                <input type="hidden" name="project_id" value="' . $row['Project_ID'] . '' . $row['UserID'] . '">
                                                <select name="new_status" onchange="this.form.submit()">
                                                    <option value="Pending" ' . ($row['status'] == 'Pending' ? 'selected' : '') . '>Pending</option>
                                                    <option value="Approved" ' . ($row['status'] == 'Approved' ? 'selected' : '') . '>Approved</option>
                                                    <option value="Rejected" ' . ($row['status'] == 'Rejected' ? 'selected' : '') . '>Rejected</option>
                                                </select>
                                            </form>
                                          </td>';
                                    echo "<td></td>";
                                    echo "</tr>";
                                endwhile;
                            endif;
                        }
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <form id="delete_project_form" style="display:none" action="./projects_CRUD/delete_project.php" method="POST">
            <input type="text" name="delete_id" id="delete_id">
        </form>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
                integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
        <script src="js_fill/dashboard.js"></script>
        <script src="js_fill/script.js"></script>
        <script>
            function delete_project(id) {
                // confirmation deleting
                const confirmed = confirm("Are you sure you want to delete this project?");
                if (confirmed) {
                    document.getElementById("delete_id").value = id;
                    document.getElementById("delete_project_form").submit();
                }
            }
        </script>
    </div>
</body>
</html>