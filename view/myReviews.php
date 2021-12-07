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
    <title>My Reviews</title>
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

        <a href="../settings/logout.php"><div class="mx-6">Logout</div></a>

    </div>
</section>

<section class="flex flex-row mt-12">
    <div class="flex flex-col justify-between items-start mx-8 font-bold w-1/6">
        <a href="../view/myProfile.php" class="w-full mb-6"><div class="flex items-center p-3 rounded-lg border-2 border-gray w-full text-blue font-bold">
            <img src="../images/icons/Avatar 2.png" alt="" class="h-8 object-scale-down mr-6">
            <div> Profile </div>
        </div></a>

        <a href="../view/myOrders.php" class="w-full"><div class="flex items-center mb-6  w-full rounded-lg border-2 border-gray text-blue p-3">
            <img src="../images/icons/Orders.png" alt="" class="h-8 object-scale-down mr-6">
            <div> My Orders </div>
        </div></a>

        <a href="../view/myWishlist.php" class="w-full"><div class="flex items-center  rounded-lg p-3 w-full mb-6 border-2 border-gray text-blue">
            <img src="../images/icons/Wishlist 3.png" alt="" class="h-8 object-scale-down mr-6">
            <div> Wishlist </div>
        </div></a>


        <div class="flex items-center  rounded-lg p-3 w-full bg-blue text-orange">
            <img src="../images/icons/Review 2.png" alt="" class="h-8 object-scale-down mr-6">
            <div> Review </div>
        </div>

    </div>

            <div class="flex flex-col w-2/3 mx-6 h-80 overflow-y-auto">
                <div class="flex flex-row justify-between h-20 mb-6">
                    <div class="flex flex-row justify-between  mr-32">
                        <div class="mr-6">
                            <img src="../images/icons/Resin Background 2.png" alt="" class="h-16 object-scale-down border-4 border-blue">
                        </div>
                        <div class="flex flex-col font-semibold justify-center h-16">
                            <div> Nyansapo Coloured Pendant </div>
                            <div> GHC 13 </div>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <a href=""><div class="flex flex-row justify-between mr-6 p-3 bg-blue text-white font-semibold">
                            <div> Write Review </div>
                        </div>
                    </div></a>
                </div>

                <div class="flex flex-row justify-between h-20 mb-6">
                    <div class="flex flex-row justify-between  mr-32">
                        <div class="mr-6">
                            <img src="../images/icons/Resin Background 2.png" alt="" class="h-16 object-scale-down border-4 border-blue">
                        </div>
                        <div class="flex flex-col font-semibold justify-center h-16">
                            <div> Nyansapo Coloured Pendant </div>
                            <div> GHC 13 </div>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="flex flex-row justify-between mr-6 p-3 bg-blue text-white font-semibold">
                            <div> Write Review </div>
                        </div>
                    </div>
                </div>


                <div class="flex flex-row justify-between h-20 mb-6">
                    <div class="flex flex-row justify-between  mr-32">
                        <div class="mr-6">
                            <img src="../images/icons/Resin Background 2.png" alt="" class="h-16 object-scale-down border-4 border-blue">
                        </div>
                        <div class="flex flex-col font-semibold justify-center h-16">
                            <div> Nyansapo Coloured Pendant </div>
                            <div> GHC 13 </div>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="flex flex-row justify-between mr-6 p-3 bg-blue text-white font-semibold">
                            <div> Write Review </div>
                        </div>
                    </div>
                </div>


                <div class="flex flex-row justify-between h-20 mb-6">
                    <div class="flex flex-row justify-between  mr-32">
                        <div class="mr-6">
                            <img src="../images/icons/Resin Background 2.png" alt="" class="h-16 object-scale-down border-4 border-blue">
                        </div>
                        <div class="flex flex-col font-semibold justify-center h-16">
                            <div> Nyansapo Coloured Pendant </div>
                            <div> GHC 13 </div>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="flex flex-row justify-between mr-6 p-3 bg-blue text-white font-semibold">
                            <div> Write Review </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-row justify-between h-20 mb-6">
                    <div class="flex flex-row justify-between  mr-32">
                        <div class="mr-6">
                            <img src="../images/icons/Resin Background 2.png" alt="" class="h-16 object-scale-down border-4 border-blue">
                        </div>
                        <div class="flex flex-col font-semibold justify-center h-16">
                            <div> Nyansapo Coloured Pendant </div>
                            <div> GHC 13 </div>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="flex flex-row justify-between mr-6 p-3 bg-blue text-white font-semibold">
                            <div> Write Review </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-row justify-between h-20 mb-6">
                    <div class="flex flex-row justify-between  mr-32">
                        <div class="mr-6">
                            <img src="../images/icons/Resin Background 2.png" alt="" class="h-16 object-scale-down border-4 border-blue">
                        </div>
                        <div class="flex flex-col font-semibold justify-center h-16">
                            <div> Nyansapo Coloured Pendant </div>
                            <div> GHC 13 </div>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="flex flex-row justify-between mr-6 p-3 bg-blue text-white font-semibold">
                            <div> Write Review </div>
                        </div>
                    </div>
                </div>
                <div class="flex flex-row justify-between h-20 mb-6">
                    <div class="flex flex-row justify-between  mr-32">
                        <div class="mr-6">
                            <img src="../images/icons/Resin Background 2.png" alt="" class="h-16 object-scale-down border-4 border-blue">
                        </div>
                        <div class="flex flex-col font-semibold justify-center h-16">
                            <div> Nyansapo Coloured Pendant </div>
                            <div> GHC 13 </div>
                        </div>
                    </div>
                    <div class="flex justify-between items-center">
                        <div class="flex flex-row justify-between mr-6 p-3 bg-blue text-white font-semibold">
                            <div> Write Review </div>
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
} else {
    echo "
        <script>
        alert('User not logged in');
        document.location.href='../index.php';
        </script>

        ";
}