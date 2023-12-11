<?php
session_start();
include '../data_connection/database.php';

if (!isset($_SESSION['UserID'])) {
    header("Location: ../login.php");
    exit();
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = htmlspecialchars(trim($_POST['Project_Title']));
    $desc = htmlspecialchars(trim($_POST['Descrip_project']));
    $cat_id = htmlspecialchars(trim($_POST['Category_ID']));
    $sub_id = htmlspecialchars(trim($_POST['sub_Category_ID']));
    $tags = htmlspecialchars(trim($_POST["tags"]));

    $userID = $_SESSION['UserID'];

    // Insert data into the projects table
    $insertProjectQuery = "INSERT INTO Projects (Project_Title, Descrip_project, Category_ID, sub_Category_ID, UserID) 
                           VALUES (?, ?, ?, ?, ?)";

    $stmtProject = mysqli_prepare($con, $insertProjectQuery);

    mysqli_stmt_bind_param($stmtProject, "ssssi", $title, $desc, $cat_id, $sub_id, $userID);

    $resProject = mysqli_stmt_execute($stmtProject);

    if ($resProject) {
        // Get the ID of the inserted project
        $projectID = mysqli_insert_id($con);

        // Handle tags
        $tagArray = explode(",", $tags);
        foreach ($tagArray as $tag) {
            $tag = trim($tag);

            // Check if the tag already exists
            $tagExistsQuery = "SELECT tag_id FROM tags WHERE tag_name = ?";
            $stmtTagExists = mysqli_prepare($con, $tagExistsQuery);
            mysqli_stmt_bind_param($stmtTagExists, "s", $tag);
            mysqli_stmt_execute($stmtTagExists);
            $tagResult = mysqli_stmt_get_result($stmtTagExists);

            if ($tagResult && $tagRow = mysqli_fetch_assoc($tagResult)) {
                // Tag already exists, get its ID
                $tagID = $tagRow['tag_id'];
            } else {
                // Tag does not exist, add it to the tags table
                $addTagQuery = "INSERT INTO tags (tag_name) VALUES (?)";
                $stmtAddTag = mysqli_prepare($con, $addTagQuery);
                mysqli_stmt_bind_param($stmtAddTag, "s", $tag);
                mysqli_stmt_execute($stmtAddTag);

                // Get the ID of the newly added tag
                $tagID = mysqli_insert_id($con);
            }

            // Add project-tag relationship
            $addProjectTagQuery = "INSERT INTO project_tags (Project_ID, tag_id) VALUES (?, ?)";
            $stmtAddProjectTag = mysqli_prepare($con, $addProjectTagQuery);
            mysqli_stmt_bind_param($stmtAddProjectTag, "ii", $projectID, $tagID);
            mysqli_stmt_execute($stmtAddProjectTag);
        }

        header("location: ./../projects.php");
    } else {
        echo "Error: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmtProject);
    mysqli_close($con);
}

?>