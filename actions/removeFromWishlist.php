<?php

//connect to the cart controller
include_once (dirname(__FILE__)) . '/../controller/wishlistController.php';
include_once (dirname(__FILE__)) . '/../settings/core.php';

if (isset($_GET['w_id'])) {

    $pid = $_GET['w_id'];
    $ipadd = getIpAddress();

    if (isset($_SESSION['user_id'])) {
        $cid = $_SESSION['user_id'];
        $delete = delete_wishlist_lg_controller($pid, $cid);
        if ($delete) {
            echo "<script type='text/javascript'> alert('Successfully deleted from wishlist');
            document.location.href='../view/myWishlist.php';
            </script>";
        } else {
            echo "An error occurred.";
        }
    }
} else {
    header("location: ../index.php");
}
