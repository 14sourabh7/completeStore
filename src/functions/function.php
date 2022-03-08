<?php

session_start();

require('../vendor/autoload.php');

use App\Cart;
use App\Orders;
use App\Product;
use App\Products;
use App\User;

$cart = new Cart;
// CART FUNCTIONS//////////////////////////////////////////////////////////////

/**
 * addTocart
 * function calling class to add elements to cart
 *
 * @param [type] $id
 * @param [type] $name
 * @param [type] $price
 * @return cartArray
 */
function addToCart($id, $name, $price)
{
    global $cart;
    // $user = new User(101, 'ss', 'ss', 'ss');

    if (!isset($_SESSION['cart'])) {
        $tempArr = array();
        $_SESSION['cart'] = json_encode($tempArr);
    }

    $cart->setCart(json_decode($_SESSION['cart']));
    $product = new Product($id, $name, $price);
    $cart->addToCart($product);
    $_SESSION['cart'] = json_encode($cart->getCart());
    return ($_SESSION['cart']);
}


/**
 * increase
 * function to call class increase function
 *
 * @param [type] $id
 * @return cartArray
 */
function increase($id)
{
    global $cart;
    $cart->setCart(json_decode($_SESSION['cart']));
    $cart->increaseQuantity($id);
    $_SESSION['cart'] = json_encode($cart->getCart());
    return ($_SESSION['cart']);
}


/**
 * decrease
 *function to call class decreaseQuantity function
 * @param [type] $id
 * @return cartArray
 */
function decrease($id)
{
    global $cart;
    $cart->setCart(json_decode($_SESSION['cart']));
    $cart->decreaseQuantity($id);
    $_SESSION['cart'] = json_encode($cart->getCart());
    return ($_SESSION['cart']);
}


/**
 * delete
 * function calling class delete function
 *
 * @param [type] $id
 * @return cartArray
 */
function delete($id)
{
    global $cart;
    $cart->setCart(json_decode($_SESSION['cart']));
    $cart->deleteProduct($id);
    $_SESSION['cart'] = json_encode($cart->getCart());
    return ($_SESSION['cart']);
}


/**
 * emptyCart
 * function calling class clearcart function
 *
 * @return cartArray
 */
function emptyCart()
{
    global $cart;
    $cart->setCart(json_decode($_SESSION['cart']));
    $cart->clearCart();
    $_SESSION['cart'] = json_encode($cart->getCart());
    return ($_SESSION['cart']);
}


/**
 *getCart
 *  function to display cart elements on startup
 *
 * @return cartArray
 */
function getCart()
{
    return ($_SESSION['cart']);
}




//// USER functions /////////////////////////////////////////////////////////////////


/**
 * userValidate()
 * function to validate user
 *
 * @param [type] $email
 * @param [type] $password
 * @return void
 */
function userValidate($email, $password)
{
    $user = new User(101, 'ss', 'ss', 'ss', 'ss@mail.com');
    $result = $user->validateUser($email, $password);
    return $result;
}

/**
 * emailValidate()
 * function to validate email
 * @param [type] $email
 * @return void
 */
function emailValidate($email)
{
    $user = new User(101, 'ss', 'ss', 'ss', 'ss@mail.com');
    $result = $user->validateEmail($email);
    return $result;
}

/**
 * addUser
 * function to add user
 *
 * @param [type] $name
 * @param [type] $email
 * @param [type] $password
 * @return void
 */
function addUser($name, $email, $password)
{

    $role = 'customer';
    $user = new User(101, 'ss', 'ss', 'ss', 'ss@mail.com');
    $result = $user->addUser($name, $email, $password, $role);
    return $result;
}


/**
 * getUser()
 * function to getUser from db
 *
 * @return void
 */
function getUser()
{

    $user = new User(101, 'ss', 'ss', 'ss', 'ss@mail.com');
    $result = $user->getUser();
    return $result;
}


/**
 * updateStatus
 * function to update status
 */

function updateStatus($status, $id, $col)
{
    $user = new User(101, 'ss', 'ss', 'ss', 'ss@mail.com');
    $result = $user->updateStatus($status, $id, $col);
    return $result;
}


/**
 * deleteUser()
 * function to delete user
 *
 * @param [type] $user_id
 * @return void
 */
function deleteUser($user_id)
{
    $user = new User(101, 'ss', 'ss', 'ss', 'ss@mail.com');
    $result = $user->deleteUser($user_id);
    return $result;
}

/**
 * function to get user details
 *
 * @param [type] $user_id
 * @return void
 */
function getUserDetails($user_id)
{

    $user = new User(101, 'ss', 'ss', 'ss', 'ss@mail.com');
    $result = $user->getUserDetails($user_id);
    return $result;
}

/**
 * updateUserDetails()
 * function to updateUserdetails in user table
 *
 * @param [type] $id
 * @param [type] $name
 * @param [type] $email
 * @return void
 */
function updateUserDetails($id, $name, $email)
{
    $user = new User(101, 'ss', 'ss', 'ss', 'ss@mail.com');
    $result = $user->updateUserDetails($id, $name, $email);
    return $result;
}


/**
 * updateUserDetail()
 *
 * function to updateUserDetails in user details table
 * @param [type] $user_id
 * @param [type] $name
 * @param [type] $email
 * @param [type] $address
 * @param [type] $mobile
 * @param [type] $pin
 * @return void
 */
function updateUserDetail($user_id, $name, $email, $address, $mobile, $pin)
{

    $user = new User(101, 'ss', 'ss', 'ss', 'ss@mail.com');
    $result = $user->updateUserDetail($user_id, $name, $email, $address, $mobile, $pin);
    return $result;
}




//product related functions//////////////////////////////////////////////////////////////////////////

/**
 * getProducts()
 * function to call class function getProducts()
 *
 * @return void
 */
function getProducts()
{
    $products = new Products();
    $result = $products->getProducts();
    return $result;
}


/**
 * getProduct($sku)
 *function to get single product from class
 * @param [type] $sku
 * @return void
 */
function getProduct($sku)
{
    $products = new Products();
    $result = $products->getProduct($sku);
    return $result;
}

function addNewProduct($name, $brand, $category, $price, $discount, $desc)
{
    $products = new Products();
    $result = $products->addNewProduct($name, $brand, $category, $price, $discount, $desc);
    return $result;
}


/**
 * updateProduct()
 * function to update product
 *
 * @param [type] $product_id
 * @param [type] $name
 * @param [type] $brand
 * @param [type] $category
 * @param [type] $price
 * @param [type] $discount
 * @return void
 */
function updateProduct($product_id, $name, $brand, $category, $price, $discount)
{
    $products = new Products();
    $result = $products->updateProduct($product_id, $name, $brand, $category, $price, $discount);
    return $result;
}


/**
 * deleteProduct()
 * function to delete product
 *
 * @param [type] $product_id
 * @return void
 */
function deleteProduct($product_id)
{
    $products = new Products();
    $result = $products->deleteProduct($product_id);
    return $result;
}


/**
 * getFilterProducts()
 * function to get filter products
 *
 * @param [type] $filter
 * @return void
 */
function getFilterProducts($filter)
{
    $products = new Products();
    $result = $products->getFilterProducts($filter);
    return $result;
}




///order related functions///////////////////////////////////////////////////////////////////////

/**
 * placeOrder()
 * function place order
 *
 * @param [type] $user_id
 * @param [type] $quant
 * @param [type] $total
 * @param [type] $address
 * @param [type] $pin
 * @param [type] $cart
 * @param [type] $status
 * @return void
 */
function placeOrder($user_id, $quant, $total, $address, $pin, $cart, $status)
{
    $order = new Orders;
    $result = $order->placeOrder($user_id, $quant, $total, $address, $pin, $cart, $status);
    return $result;
}


/**
 * getOrders
 * function to get all orders with user id
 *
 * @param [type] $user_id
 * @return void
 */
function getOrders($user_id)
{

    $order = new Orders();
    $result = $order->getOrders($user_id);
    return $result;
}

/**
 * getAllorders()
 * function to get all orders in db
 *
 * @return void
 */
function getAllOrders()
{
    $order = new Orders();
    $result = $order->getAllOrders();
    return $result;
}


function updateOrderStatus($order_id, $status)
{
    $order = new Orders();
    $result = $order->updateOrderStatus($order_id, $status);
    return $result;
}
