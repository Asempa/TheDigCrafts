<?php
include_once (dirname(__FILE__)) . '/../settings/core.php';
include_once (dirname(__FILE__)) . '/../controller/cartController.php';

$orderCount = count_orders_controller();
$adminOrders = select_orderDetails_admin_controller();

if (isset($_SESSION["user_id"]) && isset($_SESSION["user_role"])) {
    if ($_SESSION["user_role"] === '1') {

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Orders</title>
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>

<section class="bg-blue text-orange flex justify-between h-12 font-bold">
    <div class="p-4 flex items-center">TheDigCrafts</div>
    <div class="flex flex-row items-center">
        <a href="../settings/logout.php"><div class="mr-6">Logout</div></a>
    </div>
</section>


<section class="flex flex-row mt-12">

        <div class="flex flex-col justify-between items-start mx-8  font-bold w-1/6 h-96">
            <a href="adminProducts.php" class="w-full"><div class="flex items-center p-3 rounded-lg border-2 border-gray w-full text-blue font-bold">
            <img src="../images/icons/Products 2.png" alt="" class="h-8 object-scale-down mr-6">
            <div> Products </div>
        </div></a>

        <a href="adminPayments.php" class="w-full"><div class="flex items-center border-2 border-gray text-blue rounded-lg w-full p-3">
            <img src="../images/icons/Payments.png" alt="" class="h-8 object-scale-down mr-6">
            <div> Payments </div>
        </div></a>

        <div class="flex items-center bg-blue text-orange w-full rounded-lg p-3">
            <img src="../images/icons/Orders 2.png" alt="" class="h-8 object-scale-down mr-6">
            <div> Orders </div>
        </div>


    </div>


    <div class="w-2/3 mx-auto">
        <div class="flex flex-row justify-between font-bold text-base">
            <div class="flex flex-row bg-blue p-3">
                <div class="text-white mr-3">  Total Orders </div>
                <div class="text-orange"><?php echo $orderCount['count']?></div>
            </div>
        </div>

        <div class="flex flex-row font-semibold w-full mx-auto mt-12 items-center justify-center">
            <div class="w-full mt-6 ml-6 h-72 overflow-y-auto">
                <div class="text-xl text-blue">Orders</div>
                <div class="w-full grid grid-cols-5 gap-8 justify-items-center mr-12 mt-6">
                    <div>Order ID</div>
                    <div>Name</div>
                    <div>Amount</div>
                    <div>Status</div>
                    <div>Payment Date</div>
                </div>

                <?php
                foreach ($adminOrders as $orders) {
                ?>
                <div class="w-full grid grid-cols-5 gap-8 justify-items-center items-center mt-6">
                    <div><?php echo $orders['invoice_no'] ?></div>
                    <div class=""><?php echo $orders['product_title'] ?></div>
                    <div>&#8373 <?php echo $orders['product_price'] ?> </div>
                    <div><?php echo $orders['order_status'] ?></div>
                    <div class="mr-2"><?php echo $orders['order_date'] ?></div>
                </div>
                <?php
                }
                ?>

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
        alert('Administrator not logged in');
        document.location.href='../index.php';
        </script>

        ";
}