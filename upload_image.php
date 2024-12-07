<?php
session_start();
include './Admin/connect.php';

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle file upload
    $uploadDir = './assets/images/';
    $originalFileName = basename($_FILES['profile_image_modal']['name']);
    $uploadFile = $uploadDir . $originalFileName;

    // Check if the file with the same name already exists
    $counter = 1;
    while (file_exists($uploadFile)) {
        $fileExtension = pathinfo($originalFileName, PATHINFO_EXTENSION);
        $newFileName = pathinfo($originalFileName, PATHINFO_FILENAME) . "_" . $counter . "." . $fileExtension;
        $uploadFile = $uploadDir . $newFileName;
        $counter++;
    }

    if (move_uploaded_file($_FILES['profile_image_modal']['tmp_name'], $uploadFile)) {
        // File uploaded successfully, now update the SQL database with the file name
        $imageName = $newFileName;

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Update SQL database with the file name
        if($imageName !=NULL){
            $sql = "UPDATE users SET image = './assets/images/$imageName' WHERE username = '" . $_SESSION['username'] . "'";
            $result = $conn->query($sql);
            if ($result) {
                header("location: ./index.php?status=success");
            } else {
                header("location: ./index.php?status=error");
            }
        }else{
             header("location: ./index.php?status=error");
        }


        // Close database connection
        $conn->close();
    } else {
        header("location: ./index.php?status=error");
    }
}
?>