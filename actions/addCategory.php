<?php

include_once (dirname(__FILE__)) . '/../controller/productController.php';

if (isset($_POST['addCategory'])) {
    $category_name = $_POST['name'];

    $check_category = check_category_function($category_name);
    if ($check_category) {
        echo "<script>alert('The category is already in the database.');
        window.history.back();
        </script>";
    } else {
        $addCategory = add_category_function($category_name);
        if ($addCategory) {
            echo "<script type='text/javascript'> alert('Category was added successfully.');
            window.location.href = '../admin/adminProducts.php';
            </script>";
        } else {
            echo "Addition to category failed.";
        }
    }
} else {
    echo "<script type='text/javascript'> alert('Adding to category failed');
        window.history.back();
        </script>";
}
