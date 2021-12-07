<?php
include_once (dirname(__FILE__)) . '/../settings/core.php';
include_once (dirname(__FILE__)) . '/../controller/wishlistController.php';


//get product id and quantity count
$p_id = $_GET['w_id'];
$quantity = $_GET['qty'];

//get customers IP address
$ipAddress = getIpAddress();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];


    //check duplicate cart for customer logged in
    $check_lg = check_wishlist_lg_controller($p_id, $user_id);

    if ($check_lg) {
        echo "<script>alert('Product already in Wishlist.'); window.history.back();</script>";
    } else {
        //add to cart for customer logged in
        $add_lg = add_wishlist_lg_controller($p_id, $user_id, $quantity);

        if ($add_lg) {
            echo "<script>alert('Product added to wishlist'); window.history.back();</script>";
        } else {
            echo "<script>alert('Product not added to Wishlist'); window.history.back();</script>";
        }
    }
} else {

    echo "<script>alert('Create an account to add to wishlist'); window.history.back();</script>";
}
