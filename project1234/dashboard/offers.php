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
                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr class="table-dark">
                            <th>Project Title</th>
                            <th>freelancer</th>
                            <th>Amount</th>
                            <th>deadline</th>
                            <th>message</th>
                            <th>status</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                       require './data_connection/database.php';
                       $userId = $_SESSION['UserID'];
                       
                       $query = "SELECT o.Project_ID, o.UserID, o.Amount, o.Deadline, o.message, r.status 
                                 FROM offres o
                                 JOIN projects p ON p.Project_ID = o.Project_ID
                                 JOIN users u ON u.UserID = o.UserID
                                 JOIN request r ON r.Offre_ID = o.Offre_ID
                                 WHERE p.UserID = $userId";
                       
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
                       ?>
                    </tbody>
                </table>
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