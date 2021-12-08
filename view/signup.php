<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<section class="bg-blue text-orange flex justify-around h-12 font-bold">
    <div class="p-4 flex items-center">TheDigCrafts</div>
    <div class="flex items-center">Shop</div>
</section>

<section class=" bg-white mb-12">

    <div class="bg-blue p-3 m-3 w-14 text-white font-semibold"> <a href="../view/login.php">  Back </a></div>
    <div class="flex items-center justify-center m-16 text-3xl font-bold text-blue "> Sign Up </div>

    <div class="flex items-center justify-center">
        <form id="form" method="POST" action="../actions/registerAccount.php" class="bg-blue w-1/2 p-6 grid grid-rows-2 gap-6 rounded-md font-bold">
            <div class="">
                <p class="text-white">First Name</p>
                <input type="text" name="fname" id="fname" class=" w-full h-9">
                <small class="text-red"></small>
            </div>
            <div class="">
                <p class="text-white">Last Name</p>
                <input type="text" name="lname" id="lname" class=" w-full h-9">
                <small class="text-red"></small>
            </div>

            <div class="">
                <p class="text-white">Phone Number</p>
                <input type="text" name="phone" id="phone" class=" w-full h-9">
                <small class="text-red"></small>
            </div>
            <div class="">
                <p class="text-white">Email</p>
                <input type="email" name="email" id="email" class="w-full h-9">
                <small class="text-red"></small>
            </div>
            <div class="">
                <p class="text-white">Password</p>
                <input type="password" name="password" id="password" class="w-full h-9">
                <small class="text-red"></small>
            </div>
            <div class="">
                <p class="text-white">Confirm Password</p>
                <input type="password" name="confirmpassword" id="confirmpassword" class="w-full h-9">
                <small class="text-red"></small>
            </div>

            <button type="submit" id="submit" name="submit" class="bg-green text-white font-bold text-2xl p-2 mt-6 rounded-md"> Create account </button>

        </form>
    </div>

    <div class="flex items-center justify-center my-8 mx-auto text-xl font-bold text-blue p-2 "> Already have an account? <a class="ml-3 text-orange" href="login.php"> Login Here </a ></div>

</section>

<section class="h-64 bg-blue mt-32">
    <div class="text-white font-bold flex flex-row justify-between m-12 items-center p-16">
        <div class="flex flex-row justify-center items-center">
        <img src="../images/icons/Copyright.png " class="h-12" alt="">
        <div> Copyright 2021 </div>
        </div>
        <div> TheDigCrafts </div>
        <a href=""> <img src="../images/icons/Instagram.png" class="h-12" alt=""> </a>
    </div>
</section>

    <script src="../js/register.js"></script>

</body>
</html>