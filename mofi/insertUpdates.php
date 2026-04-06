<?php
header('Content-Type: application/json'); // Set the content type to JSON

// Database connection
include('connect.php');
// Check connection
if (!$conn) {
    echo json_encode(["status" => "error", "message" => "Connection failed: " . mysqli_connect_error()]);
    exit();
}

$errors = []; // Initialize errors array

// Validate and sanitize inputs
$title = trim($_POST['title']);
if (empty($title)) {
    $errors['title'] = "Title is required.";
} else {
    $title = mysqli_real_escape_string($conn, $title);
}

$category = $_POST['category'];
if (empty($category)) {
    $errors['category'] = "Category is required.";
} else {
    $category = implode(",", $category); // Handling multiple categories
    $category = mysqli_real_escape_string($conn, $category);
}

$content = trim($_POST['content']);
if (empty($content)) {
    $errors['content'] = "Content is required.";
} else {
    $content = mysqli_real_escape_string($conn, $content);
}

$img = '';
if (!empty($_FILES['img']['name'])) {
    $target_dir = "assets/images/updatesImg/";
    $img = $target_dir . basename($_FILES["img"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($img, PATHINFO_EXTENSION));

    // Check if image file is an actual image
    $check = getimagesize($_FILES["img"]["tmp_name"]);
    if ($check === false) {
        $errors['img'] = "File is not an image.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["img"]["size"] > 2000000) { // 2MB limit
        $errors['img'] = "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if (!in_array($imageFileType, ['jpg', 'jpeg', 'png', 'gif'])) {
        $errors['img'] = "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        $errors['img'] = "Sorry, your file was not uploaded.";
    } else {
        if (!move_uploaded_file($_FILES["img"]["tmp_name"], $img)) {
            $errors['img'] = "Sorry, there was an error uploading your file.";
        }
    }
} else {
    $errors['img'] = "Image is required.";
}

// If no errors, proceed to insert data
if (empty($errors)) {
    $img = basename($_FILES['img']['name']);
    $sql = "INSERT INTO updates (category, img, title, content, view) VALUES ('$category', '$img', '$title', '$content', 0)";
    
    if (mysqli_query($conn, $sql)) {
        echo json_encode(["status" => "success", "message" => "New record created successfully"]);
    } else {
        echo json_encode(["status" => "error", "message" => "Error: " . mysqli_error($conn)]);
    }
} else {
    echo json_encode(["status" => "error", "errors" => $errors]);
}

mysqli_close($conn);
exit();
