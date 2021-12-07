<?php
include_once (dirname(__FILE__)) . '/../controller/userController.php';

if (isset($_POST['submit'])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $pass = $_POST['password'];
    $pass1 = $_POST['confirmpassword'];


    $password = password_hash($pass, PASSWORD_DEFAULT);
    //check if email exists
    $verify_email = verify_email($email);

    if ($verify_email) {
        echo "<script type='text/javascript'> alert('Email already exists');
        window.history.back();
        </script>";
    } else {
        //add new user
        $addCustomer = add_user_function($fname, $lname, $email, $password, $phone);
        if ($addCustomer) {
            echo "<script type='text/javascript'> alert('Successfully Registered');
            window.location.href = '../view/login.php';
            </script>";
        } else {
            echo "Failed";
        }
    }
}
