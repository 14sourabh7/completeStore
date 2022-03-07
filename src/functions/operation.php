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
        case 'getUsers':
            echo getUser();
            break;
        case 'updateStatus':
            echo updateStatus($_POST['status'], $_POST['user_id'], $_POST['column']);
            break;
        case   'updateUserDetails':
            echo updateUserDetails($_POST['user_id'], $_POST['name'], $_POST['email']);
            break;
        case 'deleteUser':
            echo deleteUser($_POST['user_id']);
            break;
        case 'getUserDetails':
            echo getUserDetails($_POST['user_id']);
            break;
        case 'updateUserDetail':
            echo updateUserDetail($_POST['user_id'], $_POST['name'], $_POST['email'], $_POST['address'], $_POST['mobile'], $_POST['pin']);
            break;

            // product related actions
        case 'getProducts':
            echo getProducts();
            break;
        case 'getProduct':
            echo getProduct($_POST['sku']);
            break;
        case 'addNewProduct':
            echo addNewProduct($_POST['name'], $_POST['brand'], $_POST['category'], $_POST['price'], $_POST['discount'], $_POST['description']);
            break;
        case 'updateProduct':
            echo updateProduct($_POST['product_id'], $_POST['name'], $_POST['brand'], $_POST['category'], $_POST['price'], $_POST['discount']);
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
