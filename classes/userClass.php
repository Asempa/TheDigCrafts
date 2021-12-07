<?php

include_once (dirname(__FILE__)) . '/../Settings/databaseClass.php';

// inherit the methods from Connection
class user_class extends Connection
{


	function add_user($fname, $lname, $email, $password, $contact)
	{
		// return true or false
		return $this->query("insert into users(user_fname,user_lname, user_email, user_pass, user_contact)
		 values('$fname','$lname', '$email', '$password', '$contact')");
	}

	function delete_one_user($id)
	{
		// return true or false
		return $this->query("delete from users where user_id = '$id'");
	}

	function update_one_user($id, $fname, $lname, $email, $contact)
	{
		// return true or false
		return $this->query("update users set user_fname='$fname', user_lname ='$lname',user_email='$email',
		  user_contact='$contact' where user_id = '$id'");
	}

	function select_all_users()
	{
		// return array or false
		return $this->fetch("select * from users");
	}

	function select_one_user($id)
	{
		// return associative array or false
		return $this->fetchOne("select * from users where user_id='$id'");
	}

	function verify_email($email)
	{
		return $this->fetchOne("select user_email from users WHERE user_email = '$email'");
	}

	function verify_login($email)
	{
		return $this->fetchOne("select * from users WHERE user_email = '$email' ");
	}


	//Count Number of Customers
	function count_users()
	{
		return $this->fetchOne("select count(*) as count from users");
	}
}
