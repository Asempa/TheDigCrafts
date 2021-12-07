<?php
include_once (dirname(__FILE__)) . '/../settings/core.php';
include_once (dirname(__FILE__)) . '/../controller/productController.php';
include_once (dirname(__FILE__)) . '/../controller/userController.php';
include_once (dirname(__FILE__)) . '/../controller/cartController.php';


$products = select_all_products_controller();
$categories = select_all_categories_controller();
$brands = select_all_brands_controller();



$productCount = count_products_controller();

if (isset($_SESSION["user_id"]) && isset($_SESSION["user_role"])) {
    if ($_SESSION["user_role"] === '1') {

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Products</title>
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>

<section class="bg-blue text-orange flex justify-between h-12 font-bold">
    <div class="p-4 flex items-center">TheDigCrafts</div>
    <div class="flex flex-row items-center">
        <a href="../settings/logout.php"><div class="mr-6">Logout</div></a>
    </div>
    </div>
</section>

<section class="flex flex-row mt-12">

    <div class="flex flex-col justify-between items-start mx-8  font-bold w-1/6 h-96">
        <div class="flex items-center p-3 rounded-lg bg-blue w-full text-white font-bold">
            <img src="../images/icons/Products.png" alt="" class="h-8 object-scale-down mr-6">
            <div> Products </div>
        </div>

        <a href="adminPayments.php" class="w-full"><div class="flex items-center border-2 border-gray rounded-lg p-3">
            <img src="../images/icons/Payments.png" alt="" class="h-8 object-scale-down mr-6">
            <div> Payments </div>
        </div></a>

        <a href="adminOrders.php" class="w-full"><div class="flex items-center border-2 border-gray rounded-lg p-3">
            <img src="../images/icons/Orders.png" alt="" class="h-8 object-scale-down mr-6">
            <div> Orders </div>
        </div></a>

    </div>


    <div class="w-2/3 mx-auto">
        <div class="flex flex-row justify-between font-bold text-base">
            <div class="flex flex-row bg-blue p-3">
                <div class="text-white mr-3">  Total Products </div>
                <div class="text-orange"><?php echo $productCount['count'] ?></div>
            </div>

            <a href="addBrand.php"><div class="flex flex-row items-center bg-blue p-3 text-white">
                <img src="../images/icons/Brand.png" alt="" class="mr-3 h-6 object-scale-down">
                <div>Add to Brand</div>
            </div></a>

            <a href="addCategory.php" ><div class="flex flex-row items-center bg-blue p-3 text-white">
                <img src="../images/icons/Category.png" alt="" class="mr-3 h-6 object-scale-down">
                <div>Add to Category</div>
            </div></a>

            <a href="addProduct.php" ><div class="flex flex-row items-center bg-blue p-3 text-white">
                <img src="../images/icons/Products.png" alt="" class="mr-3 h-6 object-scale-down">
                <div>Add to Products</div>
            </div></a>

        </div>
        <div class="flex flex-row font-semibold">
            <div class="w-1/2 mt-6 h-72 overflow-y-auto">
                <div>Brands</div>
                <div class="flex flex-row justify-between mr-12 mt-6">
                    <div>ID</div>
                    <div>Name</div>
                    <div>Actions</div>
                </div>

                    <?php
                        foreach($brands as $brand){?>
                        <div class="flex flex-row justify-between mr-12 mt-6">
                            <div> <?php echo "{$brand["brand_id"]}"?></div>
                            <div> <?php echo "{$brand["brand_name"]}"?></div>
                            <div class="flex flex-row">
                                <a href="<?php echo "../admin/updateBrand.php?brand_id=" . $brand['brand_id']; ?>"><img src="../images/icons/Edit.png" alt="" class="h-6 object-scale-down mr-2"></a>
                                <a href="<?php echo "../actions/addBrand.php?id=" . $brand['brand_id']; ?>"><img src="../images/icons/Delete.png" alt="" class="h-6 object-scale-down"></a>
                            </div>
                        </div>
                    <?php
                    }?>

            </div>


            <div class="w-1/2 mt-6 ml-12 h-72 overflow-y-auto">
                <div>Categories</div>
                <div class="flex flex-row justify-between mr-12 mt-6">
                    <div>ID</div>
                    <div>Name</div>
                    <div>Actions</div>
                </div>

                    <?php
                        foreach($categories as $category){?>
                        <div class="flex flex-row justify-between mr-12 mt-6">
                            <div> <?php echo "{$category["cat_id"]}"?></div>
                            <div> <?php echo "{$category["cat_name"]}"?></div>
                            <div class="flex flex-row">
                                <a href="<?php echo "../admin/updateCategory.php?cat_id=" . $category['cat_id']; ?>"><img src="../images/icons/Edit.png" alt="" class="h-6 object-scale-down mr-2"></a>
                                <a href="<?php echo "../actions/addBrand.php?del_id=" . $category['cat_id']; ?>"><img src="../images/icons/Delete.png" alt="" class="h-6 object-scale-down"></a>
                            </div>
                        </div>
                    <?php
                    }?>


            </div>

        </div>
    </div>

</section>

<section>

        <div class="flex flex-row font-semibold w-full mx-auto mt-12 items-center justify-center">
            <div class="w-5/6 mt-6 ml-12 h-72 overflow-y-auto">
                <div class="text-xl text-blue">Products</div>
                <div class="w-full grid grid-cols-8 gap-8 mr-12 mt-6">
                    <div>ID</div>
                    <div>Image</div>
                    <div>Name</div>
                    <div>Price</div>
                    <div>Brand</div>
                    <div>Category</div>
                    <div>Stock</div>
                    <div>Actions</div>
                </div>


            <?php
                foreach($products as $product){?>
                <div class="w-full grid grid-cols-8 gap-8 justify-between items-center mt-6">
                    <div><?php echo "{$product["product_id"]}"?></div>
                    <img src="<?php echo "{$product["product_image"]}"?>" alt="" class="h-6 object-scale-down">
                    <div class=""><?php echo "{$product["product_title"]}"?></div>
                    <div> &#8373; <?php echo "{$product["product_price"]}"?> </div>
                    <div><?php echo "{$product["brand_name"]}"?></div>
                    <div><?php echo "{$product["cat_name"]}"?></div>
                    <div><?php echo "{$product["stock"]}"?></div>
                    <div class="flex flex-row">
                        <a href="<?php echo "../admin/updateProduct.php?product_id=" . $product['product_id']; ?>"><img src="../images/icons/Edit.png" alt="" class="h-6 object-scale-down mr-2"></a>
                        <a href="<?php echo "../actions/addBrand.php?delete_id=" . $product['product_id']; ?>"><img src="../images/icons/Delete.png" alt="" class="h-6 object-scale-down"></a>
                    </div>
                </div>
            <?php
            }?>
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