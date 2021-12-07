<?php
//connect to the wishlist class

include_once (dirname(__FILE__)) . '/../classes/wishlistClass.php';


//Customer logged in: Add to wishlist controller
function add_wishlist_lg_controller($p_id, $c_id, $qty)
{
    //create instance of the wishlist class
    $wishlist_instance = new wishlist();
    //calls method from wishlist class
    return $wishlist_instance->add_wishlist_lg($p_id, $c_id, $qty);
}

//Customer logged in: Check duplicates in wishlist controller
function check_wishlist_lg_controller($p_id, $c_id)
{
    //create instance of the wishlist class
    $wishlist_instance = new wishlist();
    //calls method from wishlist class
    return $wishlist_instance->check_wishlist_lg($p_id, $c_id);
}

//Customer logged in: Updates wishlist controller
function update_wishlist_lg_controller($p_id, $c_id, $qty)
{
    //create instance of the wishlist class
    $wishlist_instance = new wishlist();
    //calls method from wishlist class
    return $wishlist_instance->update_wishlist_lg($p_id, $c_id, $qty);
}


//Customer logged in: Delete from wishlist controller
function delete_wishlist_lg_controller($p_id, $c_id)
{
    //create instance of the wishlist class
    $wishlist_instance = new wishlist();
    //calls method from wishlist class
    return $wishlist_instance->delete_wishlist_lg($p_id, $c_id);
}

//Customer logged in: Count items in wishlist controller
function count_wishlist_lg_controller($c_id)
{
    //create instance of the wishlist class
    $wishlist_instance = new wishlist();
    //calls method from wishlist class
    return $wishlist_instance->count_wishlist_lg($c_id);
}


//Customer logged in: Select all items in wishlist controller
function select_all_wishlist_lg_controller($c_id)
{
    //create instance of the wishlist class
    $wishlist_instance = new wishlist();
    //calls method from wishlist class
    return $wishlist_instance->select_all_wishlist_lg($c_id);
}
