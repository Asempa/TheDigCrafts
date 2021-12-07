<?php

include_once (dirname(__FILE__)) . '/../Settings/databaseClass.php';

// inherit the methods from Connection
class product_class extends Connection
{

	// functions to add, delete, update and select brands

	//add brand name to database
	function add_brand($bname)
	{
		return $this->query("insert into brands(brand_name) values('$bname')");
	}

	//check duplicate brand name
	function check_brand($bname)
	{
		return $this->fetch("select brand_name from brands where brand_name='$bname'");
	}

	//delete a brand
	function delete_one_brand($id)
	{
		return $this->query("delete from brands where brand_id = '$id'");
	}

	//update a brand
	function update_one_brand($id, $bname)
	{
		return $this->query("update brands set brand_name='$bname' where brand_id = '$id'");
	}

	//select all brands
	function select_all_brands()
	{
		return $this->fetch("select * from brands");
	}

	//select a single brand
	function select_one_brand($id)
	{
		return $this->fetchOne("select * from brands where brand_id='$id'");
	}

	//functions to add, select, update and delete categories

	//add category function
	function add_category($cname)
	{
		return $this->query("insert into categories(cat_name) values('$cname')");
	}

	//check duplicate category name
	function check_category($cname)
	{
		return $this->fetch("select cat_name from categories where cat_name='$cname'");
	}

	//delete category
	function delete_one_category($id)
	{
		return $this->query("delete from categories where cat_id = '$id'");
	}

	//update category
	function update_one_category($id, $cname)
	{
		return $this->query("update categories set cat_name='$cname' where cat_id = '$id'");
	}

	//select all categories
	function select_all_categories()
	{
		return $this->fetch("select * from categories");
	}

	//select one category
	function select_one_category($id)
	{
		return $this->fetchOne("select * from categories where cat_id='$id'");
	}

	//functions to add, select, update and delete products

	//add products to database function
	function add_product($prod_cat, $prod_brand, $prod_title, $prod_price, $prod_desc, $prod_img, $prod_key, $stock)
	{
		return $this->query("insert into products(product_cat, product_brand, product_title, product_price, product_desc, product_image, product_keywords,stock)
		values('$prod_cat', '$prod_brand', '$prod_title', '$prod_price', '$prod_desc', '$prod_img', '$prod_key', '$stock')");
	}

	//check duplicate product title
	function check_product($prod_title)
	{
		return $this->fetch("select product_title from products where product_title='$prod_title'");
	}

	//delete a product from database
	function delete_one_product($id)
	{
		return $this->query("delete from products where product_id = '$id'");
	}

	//update a product
	function update_one_product($id, $prod_cat, $prod_brand, $prod_title, $prod_price, $prod_desc, $prod_img, $prod_key, $stock)
	{
		return $this->query("update products set product_cat='$prod_cat', product_brand = '$prod_brand',
		product_title = '$prod_title', product_price = '$prod_price',product_desc = '$prod_desc', product_image = '$prod_img',
		product_keywords= '$prod_key', stock = '$stock' where product_id = '$id'");
	}
	//select all products in the database
	function select_all_products()
	{
		return $this->fetch("select brands.brand_name, brands.brand_id, categories.cat_name, categories.cat_id, products.product_id, products.product_cat, products.product_brand, products.product_title, products.product_price, products.product_desc, products.product_image, products.product_keywords, products.stock from products join brands on (products.product_brand = brands.brand_id) join categories on (products.product_cat = categories.cat_id)");
	}

	//select a single product
	function select_a_product($id)
	{
		return $this->fetchOne("select `brands`.`brand_name`, `brands`.`brand_id`, `categories`.`cat_name`, `categories`.`cat_id`,
		`products`.`product_title`,`products`.`product_id`, `products`.`product_price`, `products`.`product_desc`, `products`.`product_image`, `products`.`product_keywords`,
		`products`.`stock` from `products`
		JOIN brands ON (`products`.`product_brand` = `brands`.`brand_id`)
		JOIN categories ON (`products`.`product_cat` = `categories`.`cat_id`)
		WHERE `products`.`product_id` = '$id'");
	}

	//select a product from the database where the product is like the search term
	function search_for_product($searchTerm)
	{
		return $this->fetch("select brands.brand_id, brands.brand_name, categories.cat_id, categories.cat_name, products.product_id, products.product_title, products.product_price, products.product_desc, products.product_image, products.product_keywords from products join brands on (products.product_brand = brands.brand_id) join categories on (products.product_cat = categories.cat_id) where product_title like '%$searchTerm%' or brand_name like '%$searchTerm%' or cat_name like '%$searchTerm%'");
	}

	//Select best sellers
	function get_best_seller()
	{
		return $this->fetch("select brands.brand_name, brands.brand_id, categories.cat_name, categories.cat_id,
		products.product_id, products.product_cat, products.product_brand, products.product_title, products.product_price,
		 products.product_desc, products.product_image, products.product_keywords, products.stock from products join brands on
		 (products.product_brand = brands.brand_id) join categories on (products.product_cat = categories.cat_id)
		 where products.product_price > 0");
	}

	//Select featured products
	function featured_products()
	{
		return $this->fetch("select brands.brand_name, brands.brand_id, categories.cat_name, categories.cat_id,
		products.product_id, products.product_cat, products.product_brand, products.product_title, products.product_price,
		products.product_desc, products.product_image, products.product_keywords, products.stock from products join brands on
		(products.product_brand = brands.brand_id) join categories on (products.product_cat = categories.cat_id) where brands.brand_name = 'Nyansapo'");
	}

	//Select hottest products
	//Add Reviews
	function add_order_reviews($user_id, $product_id, $desc, $p_date)
	{
		return $this->query("insert into product_review(user_id, product_id, review, p_date) values('$user_id', '$product_id', '$desc', '$p_date')");
	}

	//Get Order Reviews

	function select_order_reviews($product_id)
	{
		return $this->fetch("select product_review.review_id, product_review.product_id, product_review.review, product_review.p_date, users.user_fname, users.user_lname, users.user_id from product_review join users ON (product_review.user_id = users.user_id) WHERE product_id='$product_id'");

	}



}
