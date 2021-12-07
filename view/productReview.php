<?php
    include_once (dirname(__FILE__)) . '/../settings/core.php';
    include_once (dirname(__FILE__)) . '/../controller/productController.php';
    include_once (dirname(__FILE__)) . '/../controller/cartController.php';
    include_once (dirname(__FILE__)) . '/../controller/wishlistController.php';


    $best_sellers = get_best_controller();
    $featured_products = featured_products_controller();
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
    <title>Product Review</title>
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>

<section class="bg-blue text-orange flex justify-between h-12 font-bold">
    <div class="p-4 flex items-center">TheDigCrafts</div>
    <div class="flex items-center">Shop</div>
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

    <div class="bg-blue p-3 m-3 w-14 text-white font-semibold"> <a href="">  Back </a></div>

<section>
    <div class="flex items-center justify-center font-bold text-3xl mt-12 text-blue"> Product Review</div>


    <form action="" class="flex flex-col items-center justify-center mt-12 w-auto">
        <textarea name="" id="" cols="30" rows="10" class=" w-1/2 border-2 border-blue"></textarea>

        <button type="submit" class="btn btn-primary mt-12 p-3 bg-blue text-white font-bold">Submit Review</button>
    </form>
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
    <title>Product Review</title>
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>

<section class="bg-blue text-orange flex justify-between h-12 font-bold">
    <div class="p-4 flex items-center">TheDigCrafts</div>
    <div class="flex items-center">Shop</div>
    <div class="flex flex-row items-center">
        <div class="flex flex-row items-center">
            <img src="../images/icons/Cart.png" class="h-6 object-scale-down ml-6" alt="">
            <div class="">(<?php echo $cart_count['count']; ?>)</div>
        </div>

        <a href="view/login.php"><div class="mx-6">Login</div></a>

    </div>
</section>

    <div class="bg-blue p-3 m-3 w-14 text-white font-semibold"> <a href="">  Back </a></div>

<section>
    <div class="flex items-center justify-center font-bold text-3xl mt-12 text-blue"> Product Review</div>


    <form action="" class="flex flex-col items-center justify-center mt-12 w-auto">
        <textarea name="" id="" cols="30" rows="10" class=" w-1/2 border-2 border-blue"></textarea>

        <button type="submit" class="btn btn-primary mt-12 p-3 bg-blue text-white font-bold">Submit Review</button>
    </form>
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


