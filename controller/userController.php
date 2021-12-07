<?php
//connect to the user class

include_once (dirname(__FILE__)) . '/../classes/userClass.php';

/**
 *add new user function
 *takes the first name, last name,email, password, and contact
 */
function add_user_function($fname, $lname, $email, $password, $contact)
{
    // create an instance of the user class
    $user_instance = new user_class();
    // call the method from the class
    return $user_instance->add_user($fname, $lname, $email, $password, $contact);
}

/**
 *edit a user function
 *takes the id, first name, last name,email, password, and contact
 */
function update_user_controller($id, $fname, $lname, $email,  $contact)
{
    // create an instance of the user class
    $user_instance = new user_class();
    // call the method from the class
    return $user_instance->update_one_user($id, $fname, $lname, $email,  $contact);
}

/**
 *delete a user function
 *takes the id
 */
function delete_user_function($id)
{
    // create an instance of the user class
    $user_instance = new user_class();
    // call the method from the class
    return $user_instance->delete_one_user($id);
}

/**
 *select all users function
 *
 */
function select_all_users_controller()
{
    // create an instance of the user class
    $user_instance = new user_class();
    // call the method from the class
    return $user_instance->select_all_users();
}
/**
 *select a user function
 *takes the id
 */
function select_one_user_controller($id)
{
    // create an instance of the user class
    $user_instance = new user_class();
    // call the method from the class
    return $user_instance->select_one_user($id);
}

/**
 *check if mail exists function
 *takes the email
 */
function verify_email($email)
{
    //create an instance of the user class
    $user_instance = new user_class();
    return $user_instance->verify_email($email);
}

/**
 *get login information function
 *takes the mail
 */
function get_login_func($email)
{
    $user_instance = new user_class();
    return $user_instance->verify_login($email);
}

function count_users_func()
{
    $user_instance = new user_class();
    return $user_instance->count_users();
}
