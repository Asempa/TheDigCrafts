<?php
    include_once (dirname(__FILE__)) . '/../settings/core.php';
    include_once (dirname(__FILE__)) . '/../controller/productController.php';
    include_once (dirname(__FILE__)) . '/../controller/cartController.php';
    include_once (dirname(__FILE__)) . '/../controller/wishlistController.php';


if (isset($_SESSION['user_id'])) { //gets session of customer(logged in)
    $user_id = $_SESSION['user_id'];  //user_id is now session
    $product_cart = select_all_cart_lg_controller($user_id);
    $cart_amount_lg = sum_cart_lg_controller($user_id);
    $cart_count = count_cart_lg_controller($_SESSION['user_id']);
    $wishlist_count = count_wishlist_lg_controller($_SESSION['user_id']);
} else {
    $ipAddress = getIpAddress();
    $product_cart = select_all_cart_gst_controller($ipAddress);
    $cart_amount_gst = sum_cart_gst_controller($ipAddress);
    $ip_Address = getIpAddress();
    $cart_count = count_cart_gst_controller($ip_Address);

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
    <title>Cart</title>
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

        <div class="flex flex-row items-center">
            <img src="../images/icons/Cart.png" class="h-6 object-scale-down ml-6" alt="">
            <div class="">(<?php echo $cart_count['count']; ?>)</div>
        </div>

        <a href="myProfile.php"><img src="../images/icons/Avatar.png" class=" h-6 object-scale-down items-center m-6" alt=""></a>

        <a href="../settings/logout.php"><div class="mr-6">Logout</div></a>

    </div>
</section>

    <div class="bg-blue p-3 m-3 w-14 text-white font-semibold"> <a href="../view/shop.php">  Back </a></div>

    <section class="mt-6">
        <div class="mt-3 font-bold text-blue text-3xl ml-3"> Cart </div>

        <div class="flex flex-row mt-8">

            <div class="flex flex-col w-1/2 mx-6 h-80 overflow-y-auto">

            <?php
                foreach ($product_cart as $product) {
                ?>
                <div class="flex flex-row justify-between h-20">
                    <div class="flex flex-row justify-between  mr-32">
                        <div class="mr-6">
                            <img src="<?php echo $product['product_image']?>" alt="" class="h-16 object-scale-down border-4 border-blue">
                        </div>
                        <div class="flex flex-col font-semibold justify-center h-16">
                            <div> <?php echo $product['product_title']?></div>
                            <div> &#8373 <?php echo $product['product_price']?></div>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="flex flex-row justify-between">
                            <a href="../actions/quantity.php?inc_id=<?php echo $product['p_id'] ?>"><img src="../images/icons/Plus.png" alt="" class="h-8 object-scale-down mr-6"></a>
                            <div> <?php echo $product['quantity']?> </div>
                            <a href="../actions/quantity.php?dec_id=<?php echo $product['p_id'] ?>"><img src="../images/icons/Minus.png" alt="" class="h-8 object-scale-down ml-6"></a>
                            <a href="../actions/removeFromCart.php?product_id=<?php echo $product['p_id'] ?>"><img src="../images/icons/Delete.png" alt="" class="h-8 object-scale-down ml-3"></a>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>

            </div>

            <div class="bg-blue w-1/2 mx-6 text-white font-semibold text-xl  p-3 rounded-md divide-y">
                <div class="mt-3 text-4xl font-bold pl-6"> Cart Total </div>
                <div class="flex flex-row justify-between px-8 mt-8 pt-6 ">
                    <div> Sub total </div>
                    <div> &#8373;<?php echo $cart_amount_lg['result'] ?> </div>
                </div>

                <div class="flex flex-row justify-between px-8 mt-8 pt-6">
                    <div> Total </div>
                    <div> &#8373;<?php echo $cart_amount_lg['result']?> </div>
                </div>

                <div class="mt-12 bg-green p-3 text-center font-bold text-xl w-auto mb-3"><a href="checkout.php"> Proceed To Checkout </a></div>

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
    <title>Cart</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<section class="bg-blue text-orange flex justify-between h-12 font-bold">
    <div class="p-4 flex items-center">TheDigCrafts</div>
    <a href="../view/shop.php"><div class="flex items-center">Shop</div></a>
    <div class="flex flex-row items-center">

        <div class="flex flex-row items-center">
            <img src="../images/icons/Cart.png" class="h-6 object-scale-down ml-6" alt="">
            <div class="">(<?php echo $cart_count['count']; ?>)</div>
        </div>

        <a href="login.php"><div class="mx-6">Login</div></a>

    </div>
</section>

    <div class="bg-blue p-3 m-3 w-14 text-white font-semibold"> <a href="../view/shop.php">  Back </a></div>

    <section class="mt-6">
        <div class="mt-3 font-bold text-blue text-3xl ml-3"> Cart </div>

        <div class="flex flex-row mt-8">
            <div class="flex flex-col w-1/2 mx-6 h-80 overflow-y-auto">

            <?php
                foreach ($product_cart as $product) {
                ?>
                <div class="flex flex-row justify-between h-20">
                    <div class="flex flex-row justify-between  mr-32">
                        <div class="mr-6">
                            <img src="<?php echo $product['product_image']?>" alt="" class="h-16 object-scale-down border-4 border-blue">
                        </div>
                        <div class="flex flex-col font-semibold justify-center h-16">
                            <div> <?php echo $product['product_title']?></div>
                            <div> &#8373 <?php echo $product['product_price']?></div>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="flex flex-row justify-between">
                            <a href="../actions/quantity.php?inc_id=<?php echo $product['p_id'] ?>"><img src="../images/icons/Plus.png" alt="" class="h-8 object-scale-down mr-6"></a>
                            <div> <?php echo $product['quantity']?> </div>
                            <a href="../actions/quantity.php?dec_id=<?php echo $product['p_id'] ?>"><img src="../images/icons/Minus.png" alt="" class="h-8 object-scale-down ml-6"></a>
                            <a href="../actions/removeFromCart.php?product_id=<?php echo $product['p_id'] ?>"><img src="../images/icons/Delete.png" alt="" class="h-8 object-scale-down ml-3"></a>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>

            </div>

            <div class="bg-blue w-1/2 mx-6 text-white font-semibold text-xl  p-3 rounded-md divide-y">
                <div class="mt-3 text-4xl font-bold pl-6"> Cart Total </div>
                <div class="flex flex-row justify-between px-8 mt-8 pt-6 ">
                    <div> Sub total </div>
                    <div>&#8373;<?php echo $cart_amount_gst['result'] ?> </div>
                </div>

                <div class="flex flex-row justify-between px-8 mt-8 pt-6">
                    <div> Total </div>
                    <div>&#8373;<?php echo $cart_amount_gst['result'] ?> </div>
                </div>

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
