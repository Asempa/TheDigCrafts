<?php

    include_once (dirname(__FILE__)) . '/./settings/core.php';
    include_once (dirname(__FILE__)) . '/./controller/productController.php';
    include_once (dirname(__FILE__)) . '/./controller/cartController.php';
    include_once (dirname(__FILE__)) . '/./controller/wishlistController.php';


    $best_sellers = get_best_controller();
    $featured_products = featured_products_controller();
    $img = "./images/products/";

    if (isset($_SESSION['user_id'])) {
        $cart_count = count_cart_lg_controller($_SESSION['user_id']);
    } else {
        $ip_Address = getIpAddress();
        $cart_count = count_cart_gst_controller($ip_Address);
    }

    if (isset($_SESSION['user_id'])) {
        $wishlist_count = count_wishlist_lg_controller($_SESSION['user_id']);
    }

    if (isset($_SESSION["user_id"]) && ($_SESSION["user_role"])) {

        if ($_SESSION["user_role"] === '1') {
            echo "<script type='text/javascript'>window.location.href = 'admin/adminProducts.php';</script>";
        } else {?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TheDigCrafts</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<section class="bg-blue text-orange flex justify-between h-12 font-bold">
    <div class="p-4 flex items-center">TheDigCrafts</div>
    <a href="view/shop.php"><div class="flex items-center p-2 justify-center ">Shop</div></a>
    <div class="flex flex-row items-center">
        <a href=""><div class="flex flex-row items-center">
            <img src="images/icons/Wishlist.png" class="h-6 object-scale-down " alt="">
            <div class="text-base">(<?php echo $wishlist_count['count']; ?>)</div>
        </div></a>

        <a href="./view/cart.php"><div class="flex flex-row items-center">
            <img src="images/icons/Cart.png" class="h-6 object-scale-down ml-6" alt="">
            <div class="">(<?php echo $cart_count['count']; ?>)</div>
        </div></a>

        <a href="./view/myProfile.php"><img src="images/icons/Avatar.png" class=" h-6 object-scale-down items-center m-6" alt=""></a>

        <a href="settings/logout.php"><div class="mr-6">Logout</div></a>

    </div>


</section>

<section class="bg-blue flex flex-row text-white">
    <div class=" w-1/2">
        <div class="p-24 text-3xl font-semibold leading-tight">Purchase your resin based products including keyholders, pendants, necklace and picture frames at affordable prices.</div>
        <div class="pl-24 p-8 text-xl"> <button class="bg-green p-3 font-bold"><a href="view/shop.php"> Shop now</a></button> </div>
    </div>

    <div class="flex items-center mx-48">
        <img src="images/icons/Resin Background 2.png" class="h-72 object-scale-down mx-12 " alt="">
    </div>
</section>

<section class="m-0">
    <div class="p-4 my-12">
        <div class="text-xl font-bold"> Nyansapo </div>
    </div>

    <div class="grid grid-cols-4 gap-6 max-w-full m-12  ">

    <?php foreach ($featured_products as $featured) {
        ?>
        <div class="bg-blue rounded-xl flex flex-col max-w-full ">
            <img src="<?php echo $img . basename($featured['product_image'])?> " class= "mx-auto mt-6 h-48 object-scale-down" alt="">
            <a href="./view/singleProduct.php?productID=<?php echo $featured['product_id'] ?>"><div class="text-orange font-semibold text-lg pl-6 m-auto"><?php echo $featured['product_title'] ?></div></a>
            <div class="flex flex-row items-center justify-between p-6">
                <div class="text-orange font-bold text-xl ">&#8373;<?php echo $featured['product_price'] ?></div>
                <a href="./actions/addToWishlist.php?w_id=<?php echo $featured['product_id']?> &qty=1"><img src="images/icons/Wishlist.png" alt="" class="h-6"></a>
                <a href="./actions/addToCart.php?c_id=<?php echo $featured['product_id']?> &qty=1"><img src="images/icons/Cart.png" alt="" class="h-6"></a>
            </div>
        </div>

        <?php
        }
    ?>

    </div>
</section>

<section class="h-64 bg-blue">
    <div class="text-white font-bold flex flex-row justify-between m-12 items-center p-16">
        <div class="flex flex-row justify-center items-center">
        <img src="images/icons/Copyright.png " class="h-12" alt="">
        <div> Copyright 2021 </div>
        </div>
        <div> TheDigCrafts </div>
        <a href="https://instagram.com/thedigcrafts"> <img src="images/icons/Instagram.png" class="h-12" alt=""> </a>
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
    <title>TheDigCrafts</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>

<section class="bg-blue text-orange flex justify-between h-12 font-bold">
    <div class="p-4 flex items-center">TheDigCrafts</div>
    <a href="view/shop.php"><div class="flex items-center p-2 justify-center ">Shop</div></a>
    <div class="flex flex-row items-center">
        <a href="./view/cart.php"><div class="flex flex-row items-center">
            <img src="images/icons/Cart.png" class="h-6 object-scale-down ml-6" alt="">
            <div class="">(<?php echo $cart_count['count']; ?>)</div>
        </div></a>

        <a href="view/login.php"><div class="mx-6">Login</div></a>

    </div>


</section>

<section class="bg-blue flex flex-row text-white">
    <div class=" w-1/2">
        <div class="p-24 text-3xl font-semibold leading-tight">Purchase your resin based products including keyholders, pendants, necklace and picture frames at affordable prices.</div>
        <div class="pl-24 p-8 text-xl"> <button class="bg-green p-3 font-bold"><a href="view/shop.php"> Shop now</a></button> </div>
    </div>

    <div class="flex items-center mx-48">
        <img src="images/icons/Resin Background 2.png" class="h-72 object-scale-down mx-12 " alt="">
    </div>
</section>

<section class="m-0">
    <div class="p-4 my-12">
        <div class="text-xl font-bold"> Nyansapo </div>
    </div>

    <div class="grid grid-cols-4 gap-6 max-w-full m-12  ">
    <?php foreach ($featured_products as $featured) {
        ?>
        <div class="bg-blue rounded-xl flex flex-col max-w-full ">
            <img src="<?php echo $img . basename($featured['product_image'])?> " class= "mx-auto mt-6 h-48 object-scale-down" alt="">
            <a href="./view/singleProduct.php?productID=<?php echo $featured['product_id'] ?>"><div class="text-orange font-semibold text-lg pl-6 m-auto"><?php echo $featured['product_title'] ?></div></a>
            <div class="flex flex-row items-center justify-between p-6">
                <div class="text-orange font-bold text-xl ">&#8373;<?php echo $featured['product_price'] ?></div>
                <a href="./actions/addToWishlist.php?w_id=<?php echo $featured['product_id']?> &qty=1"><img src="images/icons/Wishlist.png" alt="" class="h-6"></a>
                <a href="./actions/addToCart.php?c_id=<?php echo $featured['product_id']?> &qty=1"><img src="images/icons/Cart.png" alt="" class="h-6"></a>
            </div>
        </div>

        <?php
        }
    ?>

    </div>
</section>

<section class="h-64 bg-blue">
    <div class="text-white font-bold flex flex-row justify-between m-12 items-center p-16">
        <div class="flex flex-row justify-center items-center">
        <img src="images/icons/Copyright.png " class="h-12" alt="">
        <div> Copyright 2021 </div>
        </div>
        <div> TheDigCrafts </div>
        <a href="https://instagram.com/thedigcrafts"> <img src="images/icons/Instagram.png" class="h-12" alt=""> </a>
    </div>
</section>

</body>
</html>
<?php
    }

?>

