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
    <button type="button" class="btn btn-primary my-2" data-bs-toggle="modal"
        data-bs-target="#modalAdd"> ADD New Category</button>

                <table id="example" class="table table-striped" style="width:100%">
                    <thead>
                        <tr class="table-dark">
                            <th>category</th>
                            <th>img</th>
                            <th ></th>
                        </tr>
                    </thead>
                    <tbody>
                    <?php
                        require './data_connection/database.php';
                        $query = "select * from categories";

                        $res = mysqli_query($con, $query);
                        if (mysqli_num_rows($res) > 0):
                            while ($row = mysqli_fetch_assoc($res)):
                                echo "<tr>";
                                echo "<td>" . $row['CategoryName'] . "</td>";
                                echo "<td>" . $row['category_img'] . "</td>";
                                echo '<td><div style="display:flex;"><button type="button" onclick="delete_category(' . $row['Category_ID'] . ')" class="btn btn-danger mx-2">Delete</button></div></td>';
                                echo "</tr>";
                            endwhile;
                        endif;
                        ?>
                    </tbody>
                </table>
                
            </div>
        </div>
    </div>

    <!-- Modal add -->
    <div class="modal fade modal-lg" id="modalAdd" tabindex="-1" role="dialog"
        aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalCenterTitle">Categorys modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"></span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="add_category_form" action="./categories_CRUD/add_category.php" method="POST">
                        <div class="mb-3">
                            <label for="name" class="col-form-label">category</label>
                            <input type="text" class="form-control" name="name" id="name">
                        </div>
                        <!-- img -->
                        <div class="form-group">
                            <label for="exampleFormControlFile1">add image</label>
                            <input type="file" name="img" class="form-control-file" id="exampleFormControlFile1">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" onclick="add_category()" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <form id="delete_category_form" style="display:none" action="./categories_CRUD/delete_category.php" method="POST" >
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
        function add_category() {
            document.getElementById("add_category_form").submit();
        }
        function delete_category(id) {
            // confirmation deleting
            const confirmed = confirm("Are you sure you want to delete this category?");
        
        if (confirmed) {
            document.getElementById("delete_id").value = id;
            document.getElementById("delete_category_form").submit();
        }
        };
    </script>
</body>

</html>