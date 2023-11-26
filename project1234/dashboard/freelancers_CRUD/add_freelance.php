<?php 
    include 'database.php';
    if(isset($_POST['submit'])){
        $first_name = $_POST['first_name'];
        $email = $_POST['exampleInputEmail1'];
        $password = $_POST['password'];
        $job = $_POST['job'];
        $salary = $_POST['salary'];
    };
    $sql = "INSERT INTO users (freelancer_name, email, password, job, salary) 
    VALUES ('$first_name', '$email', '$password', '$job', '$salary')";
?>
<?php 
require './connexion.php';
?>
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

<body class="bg-gray-800 p-5 w-100">
<header class="py-lg-14 py-8">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-6 col-md-12 col-12">
            <h1 class="display-4 fw-bold text text-center">Welcome to <span class="text-half-orange-effect">P</span>eople<span class="text-half-orange-effect">P</span>er<span class="text-half-orange-effect">T</span>ask 
            </h1>
            <p class="text-black-50 mb-2 lead text text-center">
                We love working here. We think you will too.
            </p>
        </div>
      </div>
    </div>
</header>
    <!-- <form method = "post">
    <div class="form-group">
        <label for="exampleInputEmail1">Freelancer Name</label>
        <input class="py-2 px-1 m-3 w-100 bg-gray-200 rounded-md form-control" type="text" name="first_name" id="first_name" placeholder="Your name">
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" class="py-2 px-1 m-3 w-100 bg-gray-200 text-gray-500 rounded-md form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
        <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Password</label>
        <input class="py-2 px-1 m-3 w-100 bg-gray-200 rounded-md form-control" type="text" name="password" id="password" placeholder="Enter your password">
    </div>
    <div class="form-group">
        <select class="py-2 px-1 m-3 w-100 bg-gray-200 text-gray-500 rounded-md form-control" name="job" id="job">
                        <option class="text-gray-500" disabled selected value="">Select Job</option>
        </select>
    </div>
    <input class="py-2 px-1 m-3 w-100 bg-gray-200 rounded-md form-control" type="number" name="salary" id="salary" placeholder="Salary">
    <div class="form-group form-check">
        <input type="checkbox" class="form-check-input" id="exampleCheck1">
        <label class="form-check-label" for="exampleCheck1">Check me out</label>
    </div> -->

    <form class="flex flex-col flex-grow w-100" action="add_freelancer.php" method="POST">
            <input class="py-2 px-1 m-3 w-100 bg-gray-200 rounded-md" type="text" name="first_name" id="first_name" placeholder="First Name">
            <input class="py-2 px-1 m-3 w-100 bg-gray-200 rounded-md" type="text" name="last_name" id="last_name" placeholder="Last Name">
            <input class="py-2 px-1 m-3 w-100 bg-gray-200 rounded-md" type="email" name="email" id="email" placeholder="Email">

            <select class="py-2 px-1 m-3 w-100 bg-gray-200 text-gray-500 rounded-md" name="job" id="job">
                <option class="text-gray-500" disabled selected value="">Select Job</option>
                <?php
                echo "test";
                $sql = "select * from jobs;";
                $res = mysqli_query($conn, $sql);
                if (mysqli_num_rows($res) > 0) :
                    print_r($res);
                    while ($row = mysqli_fetch_assoc($res)) :
                        echo "<option value=" . $row['job_id'] . ">" . $row['job_title'] . "</option>";
                    endwhile;
                endif;

                ?>
            </select>
            <input class="py-2 px-1 m-3 w-100 bg-gray-200 rounded-md" type="number" name="salary" id="salary" placeholder="Salary">
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
</form>


<?php 
    require 'database.php'; // Include file for database connection

    if(isset($_POST['submit'])){
        $first_name = $_POST['first_name'];
        $email = $_POST['email'];
        $password = $_POST['password']; // Ensure you're hashing passwords for security
        $job = $_POST['job'];
        $salary = $_POST['salary'];

        // Establish a database connection (assuming $conn is your connection variable)
        // Perform necessary sanitization/validations on user inputs

        // Prepare the SQL statement using a prepared statement to prevent SQL injection
        $stmt = $conn->prepare("INSERT INTO users (freelancer_name, email, password, job, salary) VALUES (?, ?, ?, ?, ?)");
        
        // Bind parameters to the statement
        $stmt->bind_param("sssss", $first_name, $email, $password, $job, $salary);

        // Execute the statement
        $stmt->execute();

        // Close the statement and database connection
        $stmt->close();
        $conn->close();
    }
?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.7/js/dataTables.bootstrap5.min.js"></script>
    <script src="dashboard.js"></script>
    <script src="js/script.js"></script>
</body>

</html>