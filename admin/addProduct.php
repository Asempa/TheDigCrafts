<?php
include_once (dirname(__FILE__)) . '/../settings/core.php';
include_once (dirname(__FILE__)) . '/../controller/productController.php';

$allproducts = select_all_products_controller();
$categories = select_all_categories_controller();
$brands = select_all_brands_controller();

if (isset($_SESSION["user_id"]) && isset($_SESSION["user_role"])) {
    if ($_SESSION["user_role"] === '1') {

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add To Products</title>
    <link rel="stylesheet" href="../css/style.css">

</head>
<body>

<section class="bg-blue text-orange flex justify-between h-12 font-bold">
    <div class="p-4 flex items-center">TheDigCrafts</div>
    <div class="flex flex-row items-center">
        <a href="../settings/logout.php"><div class="mr-6">Logout</div></a>

    </div>
</section>

    <div class="bg-blue p-3 m-3 w-14 text-white font-semibold"> <a href="adminProducts.php">  Back </a></div>

<section class="mb-24">
    <div class="flex items-center justify-center font-bold text-3xl mt-12 text-blue"> Add to Product</div>


    <form action="../actions/addProduct.php" enctype="multipart/form-data" method="POST" class="bg-blue text-white grid grid-rows-3 mt-12 w-1/2 mx-auto border-2 border-gray rounded-xl p-3">
        <div class="">
            <div class="my-3 text-base font-bold ">Brand</div>
            <select name="brand" id="brand" class="w-full border-2 text-blue border-orange">
                <?php
                    foreach($brands as $brand){?>
                    <option value="<?php echo "{$brand["brand_id"]}"?>"> <?php echo " {$brand["brand_name"]} "?> </option><?php
                }?>
            </select>
            <small class="text-red"></small>
        </div>

        <div class="">
            <div class="my-3 text-base font-bold">Category</div>
            <select name="category" id="category" class="w-full border-2 text-blue border-orange">
                <?php
                    foreach($categories as $category){?>
                    <option value="<?php echo "{$category["cat_id"]}"?>"> <?php echo " {$category["cat_name"]} "?> </option><?php
                }?>
            </select>
            <small class="text-red"></small>
        </div>

        <div class="">
            <div class="my-3 text-base font-bold">Title</div>
            <input type="text" name="title" id="title" class="border-2 border-blue w-full">
            <small class="text-red"></small>
        </div>

        <div class="">
            <div class="my-3 text-base font-bold">Price</div>
            <input type="text" name="price" id="price" class="border-2 border-blue w-full">
            <small class="text-red"></small>
        </div>

        <div class="">
            <div class="my-3 text-base font-bold ">Description</div>
            <input type="text" name="description" id="description" class="border-2 border-blue w-full">
            <small class="text-red"></small>
        </div>

        <div class="">
            <div class="my-3 text-base font-bold">Image</div>
            <input type="file" name="image" id="image" accept="image/*" class="w-full">
            <small class="text-red"></small>
        </div>

        <div class="">
            <div class="my-3 text-base font-bold ">Keyword</div>
            <input type="text" name="keyword" id="keyword" class="border-2 border-blue w-full">
            <small class="text-red"></small>
        </div>


        <div class="">
            <div class="my-3 text-base font-bold ">Stock</div>
            <input type="text" name="stock" id="stock" class="border-2 border-blue w-full">
            <small class="text-red"></small>
        </div>

        <button type="submit" id="addProduct" name="addProduct" class="btn btn-primary my-12 mx-3 p-2 mr-3 bg-green text-white font-bold ">Add Product</button>
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

    <script src="../js/product.js"></script>

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