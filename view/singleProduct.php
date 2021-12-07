<?php
    include_once (dirname(__FILE__)) . '/../settings/core.php';
    include_once (dirname(__FILE__)) . '/../controller/productController.php';
    include_once (dirname(__FILE__)) . '/../controller/cartController.php';
    include_once (dirname(__FILE__)) . '/../controller/wishlistController.php';


    $selected_product = select_a_product_controller($_GET['productID']);
    $allproducts = select_all_products_controller();
    $img = "../images/products/";

    if (isset($_SESSION['user_id'])) {
        $cart_count = count_cart_lg_controller($_SESSION['user_id']);
    } else {
        $ip_Address = getIpAddress();
        $cart_count = count_cart_gst_controller($ip_Address);
    }

    if (isset($_SESSION['user_id'])) {
        $wishlist_count = count_wishlist_lg_controller($_SESSION['user_id']);
    }

if (isset($_SESSION["user_id"]) && isset($_SESSION["user_role"])) {
    if ($_SESSION["user_role"] === '2') {
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single Product</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<section class="bg-blue text-orange flex justify-between h-12 font-bold">
    <div class="p-4 flex items-center">TheDigCrafts</div>
    <a href="../view/shop.php"><div class="flex items-center">Shop</div></a>
    <div class="flex flex-row items-center">
        <div class="flex flex-row items-center">
            <img src="../images/icons/Wishlist.png" class="h-6 object-scale-down " alt="">
            <div class="text-base">(<?php echo $wishlist_count['count']; ?>)</div>
        </div>

        <a href="cart.php"><div class="flex flex-row items-center">
            <img src="../images/icons/Cart.png" class="h-6 object-scale-down ml-6" alt="">
            <div class="">(<?php echo $cart_count['count']; ?>)</div>
        </div></a>

        <a href="myProfile.php"><img src="../images/icons/Avatar.png" class=" h-6 object-scale-down items-center m-6" alt=""></a>

        <a href="../settings/logout.php"><div class="mr-6">Logout</div></a>

    </div>
</section>

    <div class="bg-blue p-3 m-3 w-14 text-white font-semibold"> <a href="../view/shop.php">  Back </a></div>

<section>
    <div class="flex flex-row mt-12">
        <div class="flex flex-row w-1/2 items-center justify-center">
            <div><img src="<?php echo $selected_product['product_image'] ?>" alt="" class="h-64 object-scale-down border-8 border-blue"></div>
        </div>

        <div class="flex flex-col justify-between m-8 font-semibold text-2xl text-blue">
            <div><?php echo $selected_product['product_title'] ?></div>
            <a href="../actions/addToWishlist.php?w_id=<?php echo $selected_product['product_id']?> &qty=1" ><img src="../images/icons/Wishlist 3.png" alt="" class="h-10 object-scale-down"></a>
            <a href="../actions/addToCart.php?c_id=<?php echo $selected_product['product_id']?> &qty=1"><img src="../images/icons/Cart 3.png" alt="" class="h-10 object-scale-down"></a>
        </div>
    </div>




</section>

<section class="h-64 bg-blue">
    <div class="text-white font-bold flex flex-row justify-between m-12 items-center p-16">
        <div class="flex flex-row justify-center items-center">
        <img src="../images/icons/Copyright.png " class="h-12" alt="">
        <div> Copyright 2021 </div>
        </div>
        <div> TheDigCrafts </div>
        <a href=""> <img src="../images/icons/Instagram.png" class="h-12" alt=""> </a>
    </div>
</section>
</body>
</html>
<?php
    }
} else {
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Single Product</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<section class="bg-blue text-orange flex justify-between h-12 font-bold">
    <div class="p-4 flex items-center">TheDigCrafts</div>
    <a href="../view/shop.php"><div class="flex items-center">Shop</div></a>
    <div class="flex flex-row items-center">

        <a href="cart.php"><div class="flex flex-row items-center">
            <img src="../images/icons/Cart.png" class="h-6 object-scale-down ml-6" alt="">
            <div class="">(<?php echo $cart_count['count']; ?>)</div>
        </div></a>

        <a href="login.php"><div class="mx-6">Login</div></a>

    </div>
</section>

    <div class="bg-blue p-3 m-3 w-14 text-white font-semibold"> <a href="../view/shop.php">  Back </a></div>

<section>
    <div class="flex flex-row mt-12">
        <div class="flex flex-row w-1/2 items-center justify-center">
            <div><img src="<?php echo $selected_product['product_image'] ?>" alt="" class="h-64 object-scale-down border-8 border-blue"></div>
        </div>

        <div class="flex flex-col justify-between m-8 font-semibold text-2xl text-blue">
            <div><?php echo $selected_product['product_title'] ?></div>
            <a href="../actions/addToWishlist.php?w_id=<?php echo $selected_product['product_id']?> &qty=1" ><img src="../images/icons/Wishlist 3.png" alt="" class="h-10 object-scale-down"></a>
            <a href="../actions/addToCart.php?c_id=<?php echo $selected_product['product_id']?> &qty=1"><img src="../images/icons/Cart 3.png" alt="" class="h-10 object-scale-down"></a>
        </div>
    </div>

</section>

<section class="h-64 bg-blue">
    <div class="text-white font-bold flex flex-row justify-between m-12 items-center p-16">
        <div class="flex flex-row justify-center items-center">
        <img src="../images/icons/Copyright.png " class="h-12" alt="">
        <div> Copyright 2021 </div>
        </div>
        <div> TheDigCrafts </div>
        <a href=""> <img src="../images/icons/Instagram.png" class="h-12" alt=""> </a>
    </div>
</section>
</body>
</html>

<?php
}

?>


