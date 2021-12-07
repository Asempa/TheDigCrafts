<?php
    include_once (dirname(__FILE__)) . '/../settings/core.php';
    include_once (dirname(__FILE__)) . '/../controller/productController.php';
    include_once (dirname(__FILE__)) . '/../controller/cartController.php';
    include_once (dirname(__FILE__)) . '/../controller/wishlistController.php';
    include_once (dirname(__FILE__)) . '/../controller/userController.php';

    $best_sellers = get_best_controller();
    $featured_products = featured_products_controller();

    if (isset($_SESSION['user_id'])) {
        $cart_count = count_cart_lg_controller($_SESSION['user_id']);
        $c_id = $_SESSION["user_id"];
        $user = select_one_user_controller($c_id);
        $wishlist_count = count_wishlist_lg_controller($_SESSION['user_id']);

    } else {
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
    <title>My Profile</title>
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

        <a href="../settings/logout.php"><div class="mx-6">Logout</div></a>

    </div>
</section>


<section class="flex flex-row mt-12">
    <div class="flex flex-col justify-between items-start mx-8  font-bold w-1/6">
        <div class="flex items-center p-3 rounded-lg bg-blue w-full text-white font-bold">
            <img src="../images/icons/Avatar.png" alt="" class="h-8 object-scale-down mr-6">
            <div> Profile </div>
        </div>

        <a href="../view/myOrders.php" class="w-full"><div class="flex items-center border-2 border-gray rounded-lg p-3">
            <img src="../images/icons/Orders.png" alt="" class="h-8 object-scale-down mr-6">
            <div> My Orders </div>
        </div></a>

        <a href="../view/myWishlist.php" class="w-full"><div class="flex items-center border-2 border-gray rounded-lg p-3">
            <img src="../images/icons/Wishlist 3.png" alt="" class="h-8 object-scale-down mr-6">
            <div> Wishlist </div>
        </div></a>


    </div>

    <div class=" flex items-center mx-auto">
        <form action="../actions/profileUpdate.php" method = "POST" class="bg-blue p-12 grid grid-cols-2 gap-6 rounded-md font-bold">
            <div class="">
                <p class="text-white">First Name</p>
                <input type="text" name="firstname" value="<?php echo $user['user_fname'] ?>" id="" required class="mt-3 h-9">
            </div>
            <div class="">
                <p class="text-white">Last Name</p>
                <input type="text" name="lastname" value="<?php echo $user['user_lname'] ?>" id="" required class="mt-3 h-9">
            </div>

            <div class="">
                <p class="text-white">Phone Number</p>
                <input type="text" name="phone" id="" value="<?php echo $user['user_contact'] ?>" required class="mt-3 h-9">
            </div>
            <div class="">
                <p class="text-white">Email</p>
                <input type="text" name="email" value="<?php echo $user['user_email'] ?>" id="" required class="mt-3 h-9">
            </div>

            <button type="submit" name="submit" class="bg-green text-white font-bold text-2xl p-2 mt-6 rounded-md"> Update </button>

        </form>
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