<?php
include 'function.php';

/**
 * code to handle all actions
 */
if (isset($_POST)) {
    $action = $_POST['action'];
    switch ($action) {
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
            echo updateStatus($_POST['status'], $_POST['user_id']);
            break;
        case   'updateUserDetails':
            echo updateUserDetails($_POST['user_id'], $_POST['name'], $_POST['email']);
            break;
    }
}
