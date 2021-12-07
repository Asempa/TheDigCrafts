<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Log In</title>
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>

<section class="bg-blue text-orange flex justify-around h-12 font-bold">
    <div class="p-4 flex items-center">TheDigCrafts</div>
    <div class="flex items-center">Shop</div>
</section>

<section class=" bg-white">
    <div class="bg-blue p-3 m-3 w-14 text-white font-semibold"> <a href="../index.php">  Back </a></div>

    <div class="flex items-center justify-center m-16 text-3xl font-bold text-blue "> Log In </div>

    <div class="flex items-center justify-center">
        <form id="form" method="POST" action="../actions/loginAccount.php" class="bg-blue w-6/12 p-12 grid grid-rows-2 gap-6 rounded-md font-bold">
            <div class="">
                <p class="text-white">Email</p>
                <input type="email" name="email" id="email" class="mt-3 w-full h-10">
                <small class="text-red"></small>
            </div>
            <div class="">
                <p class="text-white">Password</p>
                <input type="password" name="password" id="password" class="mt-3 w-full h-10">
                <small class="text-red"></small>
            </div>

            <button type="submit" id="submit" name="submit" class="bg-green text-white font-bold text-2xl p-2 mt-6 rounded-md"> Login </button>

        </form>
    </div>

    <a href="signup.php" class="flex items-center justify-center my-8 w-1/6 mx-auto text-xl font-bold text-white  bg-blue p-2"><div class=""> Sign Up </div></a>

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

    <script src="../js/login.js"></script>

</body>
</html>