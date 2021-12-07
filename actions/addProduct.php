<?php
include_once (dirname(__FILE__)) . '/../controller/productController.php';

if (isset($_POST['addProduct'])) {
    $product_cat = $_POST['category'];
    $product_brand = $_POST['brand'];
    $product_title = $_POST['title'];
    $product_price = $_POST['price'];
    $product_desc = $_POST['description'];
    $product_key = $_POST['keyword'];
    $product_stock = $_POST['stock'];


    $check_product = check_product_function($product_title);
    if ($check_product) {
        echo "<script>alert('This product is already in the database.'); window.history.back();</script>";
    } else {
        $target_dir = "../images/products/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $imgFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (empty($_FILES["image"]["name"])) {
            echo "Inser an image";
        } else {
            $img_size = getimagesize($_FILES["image"]["tmp_name"]);
            if ($img_size == false) {
                echo "The file is not a valid image. Change it.";
            }
            if ($_FILES["image"]["size"] > 5000000000) {
                echo "Image file is too large";
            }
            if ($imgFileType != "jpg" && $imgFileType != "png" && $imgFileType != "jpeg" && $imgFileType != "gif") {
                echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
            }

            $image_upload = move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);
            if ($image_upload) {
                $addProduct = add_product_function($product_cat, $product_brand, $product_title, $product_price, $product_desc, $target_file, $product_key, $product_stock);
                if ($addProduct == true) {
                    echo "<script type='text/javascript'> alert('Successfully added Product');
                    window.location.href = '../admin/adminProducts.php';
                    </script>";
                } else {
                    echo "<script type='text/javascript'> alert('Failed to insert');
                    window.history.back();
                    </script>";
                }
            } else {
                echo "<script type='text/javascript'> alert('Upload Failed');
                window.history.back();
                </script>";
            }
        }
    }
}

if (isset($_GET['deleteProductID'])) {

    $id = $_GET['deleteProductID'];

    // call the function
    $result = delete_product_function($id);

    if ($result === true) {
        echo "<script type='text/javascript'> alert('Successfully deleted Product');
            window.location.href = '../Admin/productView.php';
            </script>";
    } else {
        echo "<script type='text/javascript'> alert('Delete Failed');
        window.history.back();
        </script>";
    }
}

// process product update form
if (isset($_POST["updateProd"])) {
    $p_id = $_POST["p_id"];
    $product_cat = $_POST['category'];
    $product_brand = $_POST['brand'];
    $product_title = $_POST['title'];
    $product_price = $_POST['price'];
    $product_desc = $_POST['desc'];
    $product_key = $_POST['keyword'];
    $product_stock = $_POST['stock'];


    $target_dir = "../Assets/Images/products/";
    $target_file = $target_dir . basename($_FILES["image"]["name"]);
    $imgFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    if (empty($_FILES["image"]["name"])) {
        echo "Must insert an Image";
    } else {
        $img_size = getimagesize($_FILES["image"]["tmp_name"]);
        if ($img_size == false) {
            echo "The file is not a valid image";
        }
        if ($_FILES["image"]["size"] > 5000000000) {
            echo "Image file is too large";
        }
        if ($imgFileType != "jpg" && $imgFileType != "png" && $imgFileType != "jpeg" && $imgFileType != "gif") {
            echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        }

        $image_upload = move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

        if ($image_upload) {

            $result = update_product_controller($p_id, $product_cat, $product_brand, $product_title, $product_price, $product_desc, $target_file, $product_key, $product_stock);

            if ($result === true) {
                echo "<script type='text/javascript'> alert('Successfully Updated Product');
                    window.location.href = '../Admin/productView.php';
                    </script>";
            } else {
                echo "
                            <script type='text/javascript'>
                                alert('Failed to update product');
                                window.history.back();
                            </script>
                        ";
            }
        } else {
            echo "<script type='text/javascript'> alert('Upload Failed');
                window.history.back();
                </script>";
        }
    }
}
