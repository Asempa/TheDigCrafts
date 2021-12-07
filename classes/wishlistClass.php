<?php
include_once (dirname(__FILE__)) . '/../Settings/databaseClass.php';

class Wishlist extends Connection
{

    //Customer logged in: Add to wishlist
    function add_wishlist_lg($p_id, $c_id, $quantity)
    {
        return $this->query("insert into wishlist(p_id, ip_add, c_id, quantity) values ('$p_id', ' ', '$c_id','$quantity')");
    }

    //Customer logged in: Check duplicates in wishlist
    function check_wishlist_lg($p_id, $c_id)
    {
        return $this->fetch("select p_id, c_id from wishlist where p_id='$p_id' and c_id='$c_id'");
    }

    //Customer logged in: Updates wishlist
    function update_wishlist_lg($p_id, $c_id, $quantity)
    {
        return $this->query("update wishlist set c_id='$c_id', quantity='$quantity' where p_id='$p_id'");
    }


    //Customer logged in: Delete from wishlist
    function delete_wishlist_lg($p_id, $c_id)
    {
        return $this->query("delete from wishlist where c_id = '$c_id'and p_id = '$p_id'");
    }


    //Customer logged in: Count items in wishlist
    function count_wishlist_lg($c_id)
    {
        return $this->fetchOne("select count(c_id) as count from wishlist where c_id = '$c_id'");
    }


    //Customer logged in: Select all items in wishlist
    function select_all_wishlist_lg($c_id)
    {
        return $this->fetch("select products.product_id, products.product_title, products.product_price, products.product_image, wishlist.p_id, wishlist.c_id, wishlist.quantity from wishlist join products on (products.product_id = wishlist.p_id) where wishlist.c_id = '$c_id'");
    }
}
