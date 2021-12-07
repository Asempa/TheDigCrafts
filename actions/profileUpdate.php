<?php
include_once (dirname(__FILE__)) . '/../controller/userController.php';
include_once (dirname(__FILE__)) . '/../settings/core.php';

if (isset($_SESSION["user_id"])){
    $c_id = $_SESSION["user_id"];
    $customers = select_one_user_controller($c_id);
}

if (isset($_POST['submit'])) {
    $user_id = $_SESSION['user_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];



    $update_user = update_user_controller($user_id, $firstname, $lastname, $email, $phone);
    if($update_user){
            echo "<script type='text/javascript'> alert('Information Updated.');
            window.location.href = '../view/myProfile.php';
            </script>";
    }else{
            echo "<script type='text/javascript'> alert('Updation failed');
            window.history.back();
            </script>";
        }

}



?>