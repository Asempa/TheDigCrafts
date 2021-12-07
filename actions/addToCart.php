<?php
include_once (dirname(__FILE__)) . '/../settings/core.php';
include_once (dirname(__FILE__)) . '/../controller/cartController.php';


//get product id and quantity count
$p_id = $_GET['c_id'];
$quantity = $_GET['qty'];

//get customers IP address
$ipAddress = getIpAddress();

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];

    //check duplicate cart for customer logged in
    $check_lg = check_cart_lg_controller($p_id, $user_id);

    if ($check_lg) {
        echo "<script>alert('Product already in Cart. Go to Cart and increase quantity'); window.history.back();</script>";
    } else {
        //add to cart for customer logged in
        $add_lg = add_cart_lg_controller($p_id, $user_id, $quantity);

        if ($add_lg) {
            echo "<script>alert('Product has been added to Cart'); window.history.back();</script>";
        } else {
            echo "<script>alert('Product has not been added to Cart'); window.history.back();</script>";
        }
    }
} else {

    //check duplicate cart for guest customer
    $check_gst = check_cart_gst_controller($p_id, $ipAddress);

    if ($check_gst) {
        echo "<script>alert('Product already in Cart. Go to Cart and increase quantity'); window.history.back();</script>";
    } else {

        //add to cart for guest customer
        $add_gst = add_cart_gst_controller($p_id, $ipAddress, $quantity);

        if ($add_gst) {
            echo "<script>alert('Product has been added to Cart'); window.history.back();</script>";
        } else {
            echo "<script>alert('Product has not been added to Cart'); window.history.back();</script>";
        }
    }
}
