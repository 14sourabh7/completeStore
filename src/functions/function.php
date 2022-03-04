<?php
session_start();
require('../vendor/autoload.php');

use App\Cart;
use App\Product;

include '../classes/User.php';

$cart = new Cart;


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
    $user = new User(101, 'ss', 'ss', 'ss');

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
 * 
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

function userValidate($email, $password)
{
    $user = new User(101, 'ss', 'ss', 'ss', 'ss@mail.com');
    $result = $user->validateUser($email, $password);
    return $result;
}
function emailValidate($email)
{
    $user = new User(101, 'ss', 'ss', 'ss', 'ss@mail.com');
    $result = $user->validateEmail($email);
    return $result;
}
function addUser($name, $email, $password)
{

    $role = 'customer';
    $user = new User(101, 'ss', 'ss', 'ss', 'ss@mail.com');
    $result = $user->addUser($name, $email, $password, $role);
    return $result;
}

function getUser()
{
    $role = 'customer';
    $user = new User(101, 'ss', 'ss', 'ss', 'ss@mail.com');
    $result = $user->getUser();
    return $result;
}
