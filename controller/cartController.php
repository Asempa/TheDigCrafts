<?php
//connect to the Cart class

include_once (dirname(__FILE__)) . '/../classes/cartClass.php';


//Customer logged in: Add to cart controller
function add_cart_lg_controller($p_id, $c_id, $qty)
{
    //create instance of the cart class
    $cart_instance = new Cart();
    //calls method from Cart class
    return $cart_instance->add_cart_lg($p_id, $c_id, $qty);
}

//Guest: Add to cart controller
function add_cart_gst_controller($p_id, $ip_add, $qty)
{
    //create instance of the cart class
    $cart_instance = new Cart();
    //calls method from Cart class
    return $cart_instance->add_cart_gst($p_id, $ip_add, $qty);
}

//Customer logged in: Check duplicates in cart controller
function check_cart_lg_controller($p_id, $c_id)
{
    //create instance of the cart class
    $cart_instance = new Cart();
    //calls method from Cart class
    return $cart_instance->check_cart_lg($p_id, $c_id);
}

//Guest: Check duplicates in cart item controller
function check_cart_gst_controller($p_id, $ip_add)
{
    //create instance of the cart class
    $cart_instance = new Cart();
    //calls method from Cart class
    return $cart_instance->check_cart_gst($p_id, $ip_add);
}

//Customer logged in: Updates cart controller
function update_cart_lg_controller($qty, $p_id, $c_id)
{
    //create instance of the cart class
    $cart_instance = new Cart();
    //calls method from Cart class
    return $cart_instance->update_cart_lg($qty, $p_id, $c_id);
}


//Guest: Updates cart controller
function update_cart_gst_controller($qty, $p_id, $ip_add)
{
    //create instance of the cart class
    $cart_instance = new Cart();
    //calls method from Cart class
    return $cart_instance->update_cart_gst($qty, $p_id, $ip_add);
}


//Customer logged in: Delete from cart controller
function delete_cart_lg_controller($p_id, $c_id)
{
    //create instance of the cart class
    $cart_instance = new Cart();
    //calls method from Cart class
    return $cart_instance->delete_cart_lg($p_id, $c_id);
}

//Guest: Delete from cart controller
function delete_cart_gst_controller($p_id, $ip_add)
{
    //create instance of the cart class
    $cart_instance = new Cart();
    //calls method from Cart class
    return $cart_instance->delete_cart_gst($p_id, $ip_add);
}

//Customer logged in: Select one item in cart
function select_one_lg_controller($p_id, $c_id)
{
    //create instance of the cart class
    $cart_instance = new Cart();
    //calls method from Cart class
    return $cart_instance->select_one_cart_lg($p_id, $c_id);
}

//Guest: Select one item in cart
//Customer logged in: Select one item in cart
function select_one_gst_controller($p_id, $ip_add)
{
    //create instance of the cart class
    $cart_instance = new Cart();
    //calls method from Cart class
    return $cart_instance->select_one_cart_gst($p_id, $ip_add);
}

//Customer logged in: Count items in cart controller
function count_cart_lg_controller($c_id)
{
    //create instance of the cart class
    $cart_instance = new Cart();
    //calls method from Cart class
    return $cart_instance->count_cart_lg($c_id);
}

//Guest: Count items in cart controller
function count_cart_gst_controller($ip_add)
{
    //create instance of the cart class
    $cart_instance = new Cart();
    //calls method from Cart class
    return $cart_instance->count_cart_gst($ip_add);
}

//Customer logged in: Select all items in cart controller
function select_all_cart_lg_controller($c_id)
{
    //create instance of the cart class
    $cart_instance = new Cart();
    //calls method from Cart class
    return $cart_instance->select_all_cart_lg($c_id);
}

//Guest: Select all items in cart controller
function select_all_cart_gst_controller($ip_add)
{
    //create instance of the cart class
    $cart_instance = new Cart();
    //calls method from Cart class
    return $cart_instance->select_all_cart_gst($ip_add);
}

//Customer logged in: Sum of cart
function sum_cart_lg_controller($c_id)
{
    //create instance of the cart class
    $cart_instance = new Cart();
    //calls method from Cart class
    return $cart_instance->sum_amount_lg($c_id);
}

//Guest: Sum of cart
function sum_cart_gst_controller($ip_add)
{
    //create instance of the cart class
    $cart_instance = new Cart();
    //calls method from Cart class
    return $cart_instance->sum_amount_gst($ip_add);
}

//Get stocks of products
function get_stock_controller($product_id)
{
    //create instance of the cart class
    $cart_instance = new Cart();
    //calls method from Cart class
    return $cart_instance->get_stock($product_id);
}

//Update stocks of products
function update_stock_controller($stock, $product_id)
{
    //create instance of the cart class
    $cart_instance = new Cart();
    //calls method from Cart class
    return $cart_instance->update_stock($stock, $product_id);
}

//Customer logged in: Checkout Total
function total_checkout_lg_controller($c_id)
{
    //create instance of the cart class
    $cart_instance = new Cart();
    //calls method from Cart class
    return $cart_instance->total_checkout_lg($c_id);
}

//ORDERS & PAYMENTS ------------------------------

function add_order_controller($user_id, $invoice_no, $order_date, $order_status)
{
    //create instance of the cart class
    $cart_instance = new Cart();
    //calls method from cart class
    return $cart_instance->add_order($user_id, $invoice_no, $order_date, $order_status);
}

function add_order_details_controller($order_id, $product_id, $qty)
{
    //create instance of the cart class
    $cart_instance = new Cart();
    //calls method from cart class
    return $cart_instance->add_order_details($order_id, $product_id, $qty);
}

function get_last_order_controller()
{
    //create instance of the cart class
    $cart_instance = new Cart();
    //calls method from cart class
    return $cart_instance->get_last_order();
}

function payment_cart_controller($amount, $user_id, $order_id, $currency, $payment_date)
{
    //create instance of the cart class
    $cart_instance = new Cart();
    //calls method from cart class
    return $cart_instance->payment_cart($amount, $user_id, $order_id, $currency, $payment_date);
}

function clear_cart_controller($user_id)
{
    //create instance of the cart class
    $cart_instance = new Cart();
    //calls method from cart class
    return $cart_instance->clear_cart($user_id);
}

//Get Order Details for User
function select_orderDetails_controller($user_id)
{
    //create instance of the cart class
    $cart_instance = new Cart();
    //calls method from cart class
    return $cart_instance->select_orderDetails($user_id);
}

function select_order_admin_controller()
{
    //create instance of the cart class
    $cart_instance = new Cart();
    //calls method from cart class
    return $cart_instance->select_order_admin();
}

function select_orderDetails_admin_controller()
{
    //create instance of the cart class
    $cart_instance = new Cart();
    //calls method from cart class
    return $cart_instance->select_orderDetails_admin();
}

function select_payment_admin_controller()
{
    //create instance of the cart class
    $cart_instance = new Cart();
    //calls method from cart class
    return $cart_instance->select_payment_admin();
}

function delete_order_controller($order_id)
{
    //create instance of the cart class
    $cart_instance = new Cart();
    //calls method from cart class
    return $cart_instance->delete_order($order_id);
}

function delete_payment_controller($pay_id)
{
    //create instance of the cart class
    $cart_instance = new Cart();
    //calls method from cart class
    return $cart_instance->delete_payment($pay_id);
}

function delete_order_customers_controller($ord_id){
     //create instance of the cart class
     $cart_instance = new Cart();
     //calls method from cart class
     return $cart_instance->delete_order_customers($ord_id);
}

function count_orders_controller(){
    //create instance of the cart class
    $cart_instance = new Cart();
    //calls method from cart class
    return $cart_instance->count_orders();
}


function count_products_controller(){
    //create instance of the cart class
    $cart_instance = new Cart();
    //calls method from cart class
    return $cart_instance->count_products();
}

function sum_revenue_controller(){
    //create instance of the cart class
    $cart_instance = new Cart();
    //calls method from cart class
    return $cart_instance->sum_revenue();
}

?>