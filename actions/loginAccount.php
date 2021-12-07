<?php
//start the session
session_start();
//connnect to the controller
include_once (dirname(__FILE__)) . '/../controller/userController.php';


//check if login button was clicked
if (isset($_POST['submit'])) {

	//grab form details
	$email = $_POST['email'];
	$pass = $_POST['password'];

	$login_result = get_login_func($email);

	if (isset($login_result["user_email"])) {
		$confirmed = password_verify($pass, $login_result["user_pass"]);
		if ($confirmed == true) {
			$_SESSION["user_id"] = $login_result["user_id"];
			$_SESSION["user_role"] = $login_result["user_role"];
			echo "<script type='text/javascript'> alert('Successfully Logged in');
			window.location.href = '../index.php';
			</script>";
		} else {
			echo "<script type='text/javascript'> alert('Password Not Matching');window.history.back();</script>";
		}
	} else echo "<script type='text/javascript'> alert('Account Not Created');
	window.location.href = '../view/login.php';
	</script>";;
}
