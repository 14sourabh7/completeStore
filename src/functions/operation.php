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
    }
}
