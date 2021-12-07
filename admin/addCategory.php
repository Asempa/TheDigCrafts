<?php
include_once (dirname(__FILE__)) . '/../settings/core.php';
if (isset($_SESSION["user_id"]) && isset($_SESSION["user_role"])) {
    if ($_SESSION["user_role"] === '1') {

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add To Category</title>
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

<section>
    <div class="flex items-center justify-center font-bold text-3xl mt-12 text-blue"> Add to Category</div>


    <form action="../actions/addCategory.php" method="POST" id="form" class="flex flex-col items-center justify-center mt-12 w-1/2 mx-auto border-2 border-gray rounded-xl">
        <div class="my-6 text-base font-bold text-blue">Category</div>
        <input type="text" name="name" id="" required class="border-2 border-blue">
        <button type="submit" name="addCategory" class="btn btn-primary my-12 p-3 bg-green text-white font-bold">Add Category</button>
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
    echo "
        <script>
        alert('Administrator not logged in');
        document.location.href='../index.php';
        </script>

        ";
}