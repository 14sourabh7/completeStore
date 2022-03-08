<?php
include 'function.php';

/**
 * code to handle all actions
 */
if (isset($_POST)) {
    $action = $_POST['action'];
    switch ($action) {

            // cart actions
        case 'get':
            echo getCart();
            break;
        case 'add':
            echo addToCart($_POST['id'], $_POST['name'], $_POST['price']);
            break;
        case 'increase':
            echo increase($_POST['id']);
            break;
        case 'decrease':
            echo decrease($_POST['id']);
            break;
        case 'delete':
            echo delete($_POST['id']);
            break;
        case 'empty':
            echo emptyCart();
            break;

            // user related actions
        case 'validateUser':
            echo userValidate($_POST['email'], $_POST['password']);
            break;
        case 'validateEmail':
            echo emailValidate($_POST['email']);
            break;
        case 'addUser':
            echo addUser($_POST['name'], $_POST['email'], $_POST['password']);
            break;
        case 'getUsers':
            echo getUser();
            break;
        case 'updateStatus':
            echo updateStatus($_POST['status'], $_POST['user_id'], $_POST['column']);
            break;
        case 'updateUserDetails':
            echo updateUserDetails($_POST['user_id'], $_POST['name'], $_POST['email']);
            break;
        case 'deleteUser':
            echo deleteUser($_POST['user_id']);
            break;
        case 'getUserDetails':
            echo getUserDetails($_POST['user_id']);
            break;
        case 'updateUserDetail':
            $user_id = $_POST['user_id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $address = $_POST['address'];
            $mobile = $_POST['mobile'];
            $pin = $_POST['pin'];
            echo updateUserDetail($user_id, $name, $email, $address, $mobile, $pin);
            break;

            // product related actions
        case 'getProducts':
            echo getProducts();
            break;
        case 'getProduct':
            echo getProduct($_POST['sku']);
            break;
        case 'addNewProduct':

            $brand = $_POST['brand'];
            $name = $_POST['name'];
            $category = $_POST['category'];
            $price = $_POST['price'];
            $discount = $_POST['discount'];
            $description = $_POST['description'];
            echo addNewProduct($name, $brand, $category, $price, $discount, $description);
            break;
        case 'updateProduct':
            $id = $_POST['product_id'];
            $brand = $_POST['brand'];
            $name = $_POST['name'];
            $category = $_POST['category'];
            $price = $_POST['price'];
            $discount = $_POST['discount'];
            echo updateProduct($id, $name, $brand, $category, $price, $discount);
            break;
        case 'deleteProduct':
            echo deleteProduct($_POST['product_id']);
            break;

        case 'getFilterProducts':
            echo getFilterProducts($_POST['filter']);
            break;


            // order related actions
        case 'placeOrder':
            echo placeOrder(
                $_POST['user_id'],
                $_POST['quant'],
                $_POST['total'],
                $_POST['address'],
                $_POST['pin'],
                $_POST['cart'],
                $_POST['status']
            );
            break;
        case 'getOrders':
            echo getOrders($_POST['user_id']);
            break;
        case 'getAllOrders':
            echo getAllOrders();
            break;
        case "updateOrderStatus":
            echo updateOrderStatus($_POST['order_id'], $_POST['status']);
            break;
    }
}
