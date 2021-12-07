<?php
    include_once (dirname(__FILE__)) . '/../settings/core.php';
    include_once (dirname(__FILE__)) . '/../controller/productController.php';
    include_once (dirname(__FILE__)) . '/../controller/cartController.php';
    include_once (dirname(__FILE__)) . '/../controller/wishlistController.php';


if (isset($_SESSION['user_id'])) { //gets session of customer(logged in)
    $user_id = $_SESSION['user_id'];  //user_id is now session
    $product_cart = select_all_cart_lg_controller($user_id);
    $cart_amount_lg = sum_cart_lg_controller($user_id);
    $total_checkout = total_checkout_lg_controller($user_id);
} else {
    $ipAddress = getIpAddress();
    $product_cart = select_all_cart_gst_controller($ipAddress);
    $cart_amount_gst = sum_cart_gst_controller($ipAddress);
}


if (isset($_SESSION["user_id"]) && isset($_SESSION["user_role"])) {
    if ($_SESSION["user_role"] === '2') {?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Checkout</title>
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>

<section class="bg-blue text-orange flex justify-between h-12 font-bold">
    <div class="p-4 flex items-center">TheDigCrafts</div>
    <a href="../view/shop.php"><div class="flex items-center">Shop</div></a>
    <div class="flex flex-row items-center">

        <a href="myProfile.php"><img src="../images/icons/Avatar.png" class=" h-6 object-scale-down items-center m-6" alt=""></a>

        <a href="../settings/logout.php"><div class="mr-6">Logout</div></a>

    </div>
</section>

    <div class="bg-blue p-3 m-3 w-14 text-white font-semibold"> <a href="../view/cart.php">  Back </a></div>

    <section class="flex flex-row">
        <div class="w-1/2 ">
            <div class="flex items-center justify-center font-bold text-3xl text-orange"> Billing Details</div>
            <form action="" class="flex flex-col items-center mt-12 font-semibold text-lg border-2 border-gray mx-20">
                <div class="mt-6"> Email Address </div>
                <input type="email" id="email" class="border-2 border-gray">

                <div class=" mt-6"> Phone Number </div>
                <input type="text" id="phone" class="border-2 border-gray mb-12">

                <button type="button" id="amount" onclick="payWithPaystack()" value="<?php echo $cart_amount_lg['result'] ?>" class="bg-green text-white p-3 mb-3"> Pay &#8373;<?php echo $cart_amount_lg['result'] ?> Now </button>
            </form>
        </div>
        <div class="w-1/2 bg-blue text-white font-bold p-3 mx-6 h-96 overflow-y-auto">
            <div>My Order</div>
            <?php
            foreach ($product_cart as $products) {
            ?>
            <div class="flex flex-row items-center justify-between mt-6 ">
                <img src="<?php echo $products['product_image'] ?>" alt="" class="h-12 object-scale-down">
                <div><?php echo $products['product_title'] ?></div>
                <div class="mr-6">&#8373;<?php echo $products['product_price'] * $products['quantity'] ?></div>
            </div>
            <?php
            }
            ?>

        </div>
    </section>

            <script src="https://js.paystack.co/v1/inline.js"></script>

            <script>
                const paymentForm = document.getElementById('paymentForm');
                paymentForm.addEventListener("submit", payWithPaystack, false);

                // PAYMENT FUNCTION
                function payWithPaystack() {

                    let handler = PaystackPop.setup({
                        key: 'pk_test_b53a16de99dae0c83ca9a7ba2b5baf67228373de', // Replace with your public key
                        // key: 'pk_test_b28f7685fbbab527a165b02f5d271541fa8e95fa', // Replace with your public key
                        //pk_live_bd5356607a881f3a0d6843b75d3172b74b9675cd
                        email: document.getElementById("email").value,
                        phone: document.getElementById("phone").value,
                        amount: document.getElementById("amount").value * 100,
                        currency: 'GHS',
                        onClose: function() {
                            // window.location = "http://localhost/CodeX/index.php?transaction=cancel"
                            alert('Transaction Cancelled.');
                        },
                        callback: function(response) {

                            let message = "Payment Successful! Reference: " + response.reference;
                            alert(message);
                            // window.location = "http://codexx.ukwest.cloudapp.azure.com/Actions/processPayment.php?reference=" + response.reference;
                            // window.location = "http://localhost/CodeX/Actions/processPayment.php?reference=" + response.reference;
                            window.location = "../actions/processPayment.php?reference=" + response.reference;

                        }
                    });
                    handler.openIframe();
                }
            </script>


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
    alert('User not logged in!');
    document.location.href='../index.php';
    </script>

    ";
}
