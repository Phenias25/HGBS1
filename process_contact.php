<?php
if (!empty($_POST)) {

    $my_name = $_POST['my_name'];
    $email = $_POST['email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    $errors['my_name'][] = "";
    $errors['email'][] = "";
    $errors['subject'][] = "";
    $errors['message'][] = "";

    // Check if the first name is not empty
    if (empty($my_name)) {
        $errors['my_name'][] = "<div class='error-wrapper'><span><i class='fas fa-exclamation-circle'></i></span><span class='error-msg'>Name is required</span></div>";
    }
    if (empty($subject)) {
        $errors['subject'][] = "<div class='error-wrapper'><span><i class='fas fa-exclamation-circle'></i></span><span class='error-msg'>Subject is required</span></div>";
    }
    if (empty($message)) {
        $errors['message'][] = "<div class='error-wrapper'><span><i class='fas fa-exclamation-circle'></i></span><span class='error-msg'>Message is required</span></div>";
    }
    if (empty($email)) {
        $errors['email'][] = "<div class='error-wrapper'><span><i class='fas fa-exclamation-circle'></i></span><span class='error-msg'>Email is required</span></div>";
    }

    // Check if the first name contains only letters and spaces
    if (!preg_match("/^[a-zA-Z ]*$/", $my_name)) {
        $errors['my_name'][] = "<div class='error-wrapper'><span><i class='fas fa-exclamation-circle'></i></span><span class='error-msg'>Only letters and white space allowed</span></div>";
    }



    // Check if the length of the first name is between 2 and 50 characters
    if (!empty($my_name) && (strlen($my_name) < 2 || strlen($my_name) > 50)) {
        $errors['my_name'][] = "<div class='error-wrapper'><span><i class='fas fa-exclamation-circle'></i></span><span class='error-msg'> Names must be between 2 and 50 characters</span></div>";
    }

    // Check if the phone number is not empty


    // Remove non-numeric characters from the phone number
    // $phone = preg_replace("/[^0-9]/", "", $phone);

    // Check if the phone number consists of exactly 10 digits
    // if (!empty($phone) && strlen($phone) !== 10) {
    //     $errors['phone'][] = "<div class='error-wrapper'><span><i class='fas fa-exclamation-circle'></i></span><span class='error-msg'>Phone number must be 10 digits</span></div>";
    // }
    // if (!preg_match("/^[0-9]*$/", $phone)) {
    //     $errors['phone'][] = "<div class='error-wrapper'><span><i class='fas fa-exclamation-circle'></i></span><span class='error-msg'>Only digits allowed</span></div>";
    // }

    // if (!empty($phone) && !preg_match("/^07/", $phone)) {
    //     $errors['phone'][] = "<div class='error-wrapper'><span><i class='fas fa-exclamation-circle'></i></span><span class='error-msg'>Phone number must start with 07</span></div>";
    // }
    if (!empty($email) && !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors['email'][] = "<div class='error-wrapper'><span><i class='fas fa-exclamation-circle'></i></span><span class='error-msg'>Invalid email used</span></div>";
    }

    if (count($errors) == 0) {
        echo "no errors found";
    } else {
        echo json_encode($errors);
    }
}
