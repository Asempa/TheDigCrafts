<?php
    include_once (dirname(__FILE__)) . '/../settings/core.php';
    include_once (dirname(__FILE__)) . '/../controller/productController.php';
    include_once (dirname(__FILE__)) . '/../controller/cartController.php';
    include_once (dirname(__FILE__)) . '/../controller/wishlistController.php';

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

    if (isset($_SESSION['search_result'])) {
        $search_results = $_SESSION['search_result'];
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
    <title>Shop</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<section class="bg-blue text-orange flex justify-between h-12 font-bold">
    <div class="p-4 flex items-center">TheDigCrafts</div>
    <div class="flex flex-row items-center">
        <a href="myWishlist.php"><div class="flex flex-row items-center">
            <img src="../images/icons/Wishlist.png" class="h-6 object-scale-down " alt="">
            <div class="text-base">(<?php echo $wishlist_count['count']; ?>)</div>
        </div></a>

        <a href="cart.php"><div class="flex flex-row items-center">
            <img src="../images/icons/Cart.png" class="h-6 object-scale-down ml-6" alt="">
            <div class="">(<?php echo $cart_count['count']; ?>)</div>
        </div></a>

        <a href="myProfile.php"><img src="../images/icons/Avatar.png" class=" h-6 object-scale-down items-center m-6" alt=""></a>

        <a href="../settings/logout.php"><div class="mr-6">Logout</div></a>

    </div>
</section>

<section>
    <div class="flex flex-row justify-between">
        <div>
        <div class="bg-blue p-3 m-3 w-14 text-white font-semibold"> <a href="../index.php">  Back </a></div>
        </div>
        <div class="flex flex-row items-center justify-between mr-6 text-white font-semibold">
            <div class="mr-10 bg-blue p-2 rounded-md"><a href="../actions/searchResults.php"> All </a></div>
            <div class="mr-10 bg-blue p-2 rounded-md"><a href="../actions/searchResults.php?searchTerm=Adinkrahene"> Adinkrahene </a></div>
            <div class="mr-10 bg-blue p-2 rounded-md"><a href="../actions/searchResults.php?searchTerm=Akoma"> Akoma </a></div>
            <div class="mr-10 bg-blue p-2 rounded-md"><a href="../actions/searchResults.php?searchTerm=Nteasee"> Nteasee </a></div>
            <div class="mr-10 bg-blue p-2 rounded-md"><a href="../actions/searchResults.php?searchTerm=Duafe"> Duafe </a></div>
            <div class="mr-10 bg-blue p-2 rounded-md"><a href="../actions/searchResults.php?searchTerm=Nyansapo"> Nyansapo </a></div>
        </div>
    </div>
</section>

<section>
    <form method="GET" action="../actions/searchResults.php">
        <div class="flex flex-row items-center ml-3 mt-6">
            <input type="text" name="searchTerm" id="" placeholder="Search" class="border-2 border-blue h-8">
            <button name="submit"><img src="../images/icons/Search.png" alt="" class="h-6 ml-2"></button>
        </div>
    </form>
</section>



<section class=" mt-12 min-h-screen">

    <div class="grid grid-cols-4 gap-6 max-w-full m-6  ">

    <?php
    if (!empty($search_results)) {
     foreach ($search_results as $result) {
        ?>
        <div class="bg-blue rounded-xl flex flex-col max-w-full ">
            <img src="<?php echo $result['product_image'] ?> " class= "mx-auto mt-6 h-48 object-scale-down" alt="">
            <a href="singleProduct.php?productID=<?php echo $result['product_id'] ?>"><div class="text-orange font-semibold text-lg pl-6 m-auto"><?php echo $result['product_title'] ?></div></a>
            <div class="flex flex-row items-center justify-between p-6">
                <div class="text-orange font-bold text-xl ">&#8373;<?php echo $result['product_price'] ?></div>
                <a href="../actions/addToWishlist.php?w_id=<?php echo $result['product_id']?> &qty=1"><img src="../images/icons/Wishlist.png" alt="" class="h-6"></a>
                <a href="../actions/addToCart.php?c_id=<?php echo $result['product_id']?> &qty=1"><img src="../images/icons/Cart.png" alt="" class="h-6"></a>
            </div>
        </div>
        <?php
     }
        }
    ?>

    </div>
</section>


<section class="h-64 bg-blue">
    <div class="text-white font-bold flex flex-row justify-between m-12 items-center p-16">
        <div class="flex flex-row justify-center items-center">
        <img src="../images/icons/Copyright.png " class="h-12" alt="">
        <div> Copyright 2021 </div>
        </div>
        <div> TheDigCrafts </div>
        <a href="https://instagram.com/thedigcrafts"> <img src="../images/icons/Instagram.png" class="h-12" alt=""> </a>
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
    <title>Shop</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<section class="bg-blue text-orange flex justify-between h-12 font-bold">
    <div class="p-4 flex items-center">TheDigCrafts</div>
    <div class="flex flex-row items-center">


        <a href="cart.php"><div class="flex flex-row items-center">
            <img src="../images/icons/Cart.png" class="h-6 object-scale-down ml-6" alt="">
            <div class="">(<?php echo $cart_count['count']; ?>)</div>
        </div></a>

        <a href="login.php"><div class="mx-6">Login</div></a>

    </div>
</section>

<section>
    <div class="flex flex-row justify-between">
        <div>
        <div class="bg-blue p-3 m-3 w-14 text-white font-semibold"> <a href="../index.php">  Back </a></div>
        </div>
        <div class="flex flex-row items-center justify-between mr-6 text-white font-semibold">
            <div class="mr-10 bg-blue p-2 rounded-md"><a href="../actions/searchResults.php"> All </a></div>
            <div class="mr-10 bg-blue p-2 rounded-md"><a href="../actions/searchResults.php?searchTerm=Adinkrahene"> Adinkrahene </a></div>
            <div class="mr-10 bg-blue p-2 rounded-md"><a href="../actions/searchResults.php?searchTerm=Akoma"> Akoma </a></div>
            <div class="mr-10 bg-blue p-2 rounded-md"><a href="../actions/searchResults.php?searchTerm=Nteasee"> Nteasee </a></div>
            <div class="mr-10 bg-blue p-2 rounded-md"><a href="../actions/searchResults.php?searchTerm=Duafe"> Duafe </a></div>
            <div class="mr-10 bg-blue p-2 rounded-md"><a href="../actions/searchResults.php?searchTerm=Nyansapo"> Nyansapo </a></div>

        </div>
    </div>
</section>

<section>
    <form method="GET" action="../actions/searchResults.php">
        <div class="flex flex-row items-center ml-3 mt-6">
            <input type="text" name="searchTerm" id="" placeholder="Search" class="border-2 border-blue h-8">
            <button name="submit"><img src="../images/icons/Search.png" alt="" class="h-6 ml-2"></button>
        </div>
    </form>
</section>


<section class=" mt-12 min-h-screen">

    <div class="grid grid-cols-4 gap-6 max-w-full m-6  ">

    <?php
    if (!empty($search_results)) {
    foreach ($search_results as $result) {
        ?>

        <div class="bg-blue rounded-xl flex flex-col max-w-full ">
            <img src="<?php echo $result['product_image'] ?>" class= "mx-auto mt-6 h-48 object-scale-down" alt="">
            <a href="singleProduct.php?productID=<?php echo $result['product_id'] ?>"><div class="text-orange font-semibold text-lg pl-6 m-auto"><?php echo $result['product_title'] ?></div></a>
            <div class="flex flex-row items-center justify-between p-6">
                <div class="text-orange font-bold text-xl ">&#8373;<?php echo $result['product_price'] ?></div>
                <a href="../actions/addToWishlist.php?w_id=<?php echo $result['product_id']?> &qty=1"><img src="../images/icons/Wishlist.png" alt="" class="h-6"></a>
                <a href="../actions/addToCart.php?c_id=<?php echo $result['product_id']?> &qty=1"><img src="../images/icons/Cart.png" alt="" class="h-6"></a>
            </div>
        </div>
        <?php
        }
    }
    ?>

    </div>
</section>


<section class="h-64 bg-blue">
    <div class="text-white font-bold flex flex-row justify-between m-12 items-center p-16">
        <div class="flex flex-row justify-center items-center">
        <img src="../images/icons/Copyright.png " class="h-12" alt="">
        <div> Copyright 2021 </div>
        </div>
        <div> TheDigCrafts </div>
        <a href="https://instagram.com/thedigcrafts"> <img src="../images/icons/Instagram.png" class="h-12" alt=""> </a>
    </div>
</section>

</body>
</html>

<?php
}

?>


