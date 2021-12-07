<?php

include_once (dirname(__FILE__)) . '/../controller/productController.php';

if (isset($_POST['addBrand'])) {
    $brand_name = $_POST['name'];

    $check_brand = check_brand_function($brand_name);
    if ($check_brand) {
        echo "<script>alert('The brand is already in the database.');
        window.history.back();
        </script>";
    } else {
        //add brand
        $addBrand = add_brand_function($brand_name);
        if ($addBrand) {
            echo "<script type='text/javascript'> alert('Brand was added successfully.');
            window.location.href = '../admin/adminProducts.php';
            </script>";
        } else {
            echo "Addition to brand failed.";
        }
    }
} else {
    echo "<script type='text/javascript'> alert('Adding to brand failed');
        window.history.back();
        </script>";
}


if (isset($_POST["editBrand"])) {

    $brand_id = $_GET['brand_id'];
    $updateValue = $_POST['name'];

    // call method from controller
    $result = update_brand_controller($brand_id, $updateValue);

    if ($result === true) {
        echo "<script type='text/javascript'> alert('Successfully Updated Brand');
            document.location.href='../admin/adminProducts.php';
            </script>";
    } else {
        echo "<script type='text/javascript'> alert('Update Failed');
            document.location.href='../admin/updateBrand.php';
            </script>";
    }
} else {
    header('location: ../admin/adminProducts.php');
}

//update category
if (isset($_POST["addCategory"])) {

    $cat_id = $_GET['cat_id'];
    $updateValue = $_POST['name'];

    // call method from controller
    $result = update_category_controller($cat_id, $updateValue);

    if ($result === true) {
        echo "<script type='text/javascript'> alert('Successfully Updated Category');
            document.location.href='../admin/adminProducts.php';
            </script>";
    } else {
        echo "<script type='text/javascript'> alert('Update Failed');
            document.location.href='../admin/updateCategory.php';
            </script>";
    }
} else {
    header('location: ../admin/adminProducts.php');
}


if (isset($_GET['id'])) {

    $id = $_GET['id'];

    // call the function
    $result = delete_brand_function($id);

    if ($result === true) {
        echo "<script type='text/javascript'> alert('Brand Deleted.');
                document.location.href = '../admin/adminProducts.php';
                </script>";
    } else {
        echo "<script type='text/javascript'> alert('Deletion Failed');
            window.history.back();
            </script>";
    }
}

if (isset($_GET['del_id'])) {

    $id = $_GET['del_id'];

    // call the function
    $result = delete_category_function($id);

    if ($result === true) {
        echo "<script type='text/javascript'> alert('Category Deleted.');
                document.location.href = '../admin/adminProducts.php';
                </script>";
    } else {
        echo "<script type='text/javascript'> alert('Deletion Failed');
            window.history.back();
            </script>";
    }
}


if (isset($_POST['editProduct'])) {
    $product_id = $_GET['product_id'];
    $product_cat = $_POST['category'];
    $product_brand = $_POST['brand'];
    $product_title = $_POST['title'];
    $product_price = $_POST['price'];
    $product_desc = $_POST['description'];
    $product_key = $_POST['keyword'];
    $product_stock = $_POST['stock'];

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

            $result = update_product_controller($product_id, $product_cat, $product_brand, $product_title, $product_price, $product_desc, $target_file, $product_key, $product_stock);

            if ($result === true) {
                echo "<script type='text/javascript'> alert('Successfully Updated Category');
                    document.location.href='../admin/adminProducts.php';
                    </script>";
            } else {
                echo "<script type='text/javascript'> alert('Update Failed');
                    document.location.href='../admin/updateCategory.php';
                    </script>";
            }
        }
    }
}

if (isset($_GET['delete_id'])) {

    $id = $_GET['delete_id'];

    // call the function
    $result = delete_product_function($id);

    if ($result === true) {
        echo "<script type='text/javascript'> alert('Category Deleted.');
                document.location.href = '../admin/adminProducts.php';
                </script>";
    } else {
        echo "<script type='text/javascript'> alert('Deletion Failed');
            window.history.back();
            </script>";
    }
}
