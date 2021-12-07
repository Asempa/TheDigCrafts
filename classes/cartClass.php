<?php
include_once(dirname(__FILE__)).'/../Settings/databaseClass.php';


class Cart extends Connection{

    //Customer logged in: Add to cart
    function add_cart_lg($p_id, $c_id, $quantity){
        return $this->query("insert into cart(p_id, ip_add, c_id, quantity) values ('$p_id', ' ', '$c_id','$quantity')");
    }

    //Guest: Add to cart
    function add_cart_gst($p_id,$ip_add,$quantity){
        return $this->query("insert into cart(p_id, ip_add, quantity) values ('$p_id','$ip_add','$quantity')");
    }

    //Customer logged in: Check duplicates in cart
    function check_cart_lg($p_id, $c_id){
        return $this->fetch("select p_id, c_id from cart where p_id='$p_id' and c_id='$c_id'");
    }

    //Guest: Check duplicates in cart item
    function check_cart_gst($p_id, $ip_add){
        return $this->fetch("select p_id, ip_add from cart where p_id='$p_id' and ip_add='$ip_add' ");
    }

    //Customer logged in: Updates cart
    function update_cart_lg($qty,$p_id, $c_id){
        return $this->query("update cart set quantity='$qty' where p_id='$p_id' and c_id='$c_id'");
    }

    //Guest: Updates cart
    function update_cart_gst($qty,$p_id,$ip_add ){
        return $this->query("update cart set quantity='$qty' where p_id='$p_id' and ip_add='$ip_add'");
    }

    //Customer logged in: Delete from cart
    function delete_cart_lg($p_id,$c_id){
        return $this->query("delete from cart where c_id = '$c_id' and p_id = '$p_id'");
    }

    //Guest: Delete from cart
    function delete_cart_gst($p_id,$ip_add){
        return $this->query("delete from cart where ip_add = '$ip_add' and p_id = '$p_id'");
    }

    //Customer logged in: Count items in cart
    function count_cart_lg($c_id){
        return $this->fetchOne("select count(c_id) as count from cart where c_id = '$c_id'");
    }

    //Guest: Count items in cart
    function count_cart_gst($ip_add){
        return $this->fetchOne("select count(ip_add) as count from cart where ip_add = '$ip_add'");
    }

    //Customer logged in: Select one item in cart
    public function select_one_cart_lg($p_id, $c_id){
        return $this->fetch("select * from cart where p_id='$p_id' and c_id='$c_id'");
    }

    //Guest: Select one item in cart
    public function select_one_cart_gst($p_id, $ip_add){
        return $this->fetch("select * from cart where p_id='$p_id' and ip_add='$ip_add'");
    }

    //Customer logged in: Select all items in cart
    function select_all_cart_lg($c_id){
        return $this->fetch("select products.product_id, products.product_title, products.product_price, products.product_image, cart.p_id, cart.c_id, cart.quantity from cart join products on (products.product_id = cart.p_id) where cart.c_id = '$c_id'");
    }

    //Guest: Select all items in cart
    function select_all_cart_gst($ip_add){
        return $this->fetch("select products.product_id, products.product_cat, products.product_brand, products.product_title, products.product_price, products.product_desc, products.product_image, cart.p_id, cart.ip_add, cart.quantity from cart join products on (products.product_id = cart.p_id) where cart.ip_add = '$ip_add'");
    }

    //Customer logged in: Sum of cart
    function sum_amount_lg($c_id){
        return $this->fetchOne("select sum(products.product_price * cart.quantity) as result from cart join products on (products.product_id = cart.p_id) where cart.c_id = '$c_id'");
    }

    //Guest: Sum of cart
    function sum_amount_gst($ip_address){
        return $this->fetchOne("select sum(products.product_price * cart.quantity) as result from cart join products on (products.product_id = cart.p_id) where cart.ip_add = '$ip_address'");
    }

    //Get stock of products
    function get_stock($product_id){
        return $this->fetchOne("select stock from products where product_id = '$product_id'");
    }

    //update stock
    function update_stock($stock,$product_id){
        return $this->query("update products set stock='$stock' where product_id='$product_id'");
    }


    //Customer logged in: Checkout Total
    function total_checkout_lg($c_id){
        $fixedDeliveryCost= 0.01;
        $fixedAdditionalServices = 0.01;
        return $this->fetchOne("select round(sum(products.product_price * cart.quantity) + ('$fixedDeliveryCost') + ('$fixedAdditionalServices'),2) as total from cart join products on (products.product_id = cart.p_id) where cart.c_id = '$c_id' ");
    }


    //ORDERS & PAYMENTS --------------------------------
    //Add orders
    function add_order($user_id, $invoice_no, $order_date, $order_status){
        return $this->query("insert into orders (user_id, invoice_no, order_date, order_status) values('$user_id','$invoice_no', '$order_date', '$order_status')");
    }

    //Add Order Details
    function add_order_details($order_id, $product_id, $quantity){
        return $this->query("insert into orderdetails (order_id,product_id,	quantity) values('$order_id','$product_id', '$quantity')");
    }
    //Get Last Order
    function get_last_order(){
        return $this ->fetchOne("select max(order_id) as currentOrder from orders");
    }

    //Add payment
    function payment_cart($amount,$user_id,$order_id,$currency,$payment_date){
    return $this->query("insert into payment (amount,user_id,order_id,currency,payment_date) values ('$amount','$user_id','$order_id','$currency','$payment_date')");
    }

    //Clear cart
    function clear_cart($user_id){
        return $this->query("delete from cart where c_id ='$user_id'");
    }


    //Get Order Details for User
    function select_orderDetails($user_id){
        return $this->fetch("select products.product_title,products.product_image, products.product_price,  orders.order_id, orders.invoice_no, orders.order_date, orders.order_status, orderdetails.quantity from orderdetails join products on (orderdetails.product_id = products.product_id) join orders on (orderdetails.order_id = orders.order_id) where orders.user_id = '$user_id'");
    }

    //Get Customer Orders for Admin
    function select_order_admin(){
        return $this->fetch("select users.user_id, users.user_fname, users.user_lname, orders.order_id, orders.invoice_no, orders.order_date, orders.order_status from orders join users on (users.user_id = orders.user_id)");
    }

    //Get Order Details for Admin
    function select_orderDetails_admin(){
        return $this->fetch("select products.product_id, products.product_title,products.product_image, products.product_price, orders.order_id, orders.invoice_no, orders.order_date, orders.order_status, orderdetails.quantity, orderdetails.quantity * products.product_price as result from orderdetails join products on (orderdetails.product_id = products.product_id) join orders on (orderdetails.order_id = orders.order_id)");
    }

    function select_payment_admin(){

        return $this->fetch("select users.user_fname, users.user_lname, orders.order_id, orders.invoice_no, orders.order_date, orders.order_status, payment.amount, payment.currency, payment.payment_date, payment.payment_id from payment join orders on (orders.order_id = payment.order_id) join users on (users.user_id = payment.user_id) ");
    }

    //delete orders
    function delete_order($order_id){
        return $this->query("delete from orderDetails where order_id = '$order_id' ");
    }

    //delete payment
    function delete_payment($pay_id){
        return $this->query("delete from payment where payment_id = '$pay_id' ");
    }
    //delete customers
    function delete_order_customers($ord_id){
        return $this->query("delete from orders where order_id = '$ord_id' ");
    }

    //Count Number of Orders
	function count_orders()
	{
		return $this->fetchOne("select count(*) as count from orders");
	}

    //Count Number of Products
	function count_products()
	{
		return $this->fetchOne("select count(*) as count from products");
	}

        //Count Revenue
	function sum_revenue()
	{
		return $this->fetchOne("select SUM(amount) as result from payment");
	}



}
