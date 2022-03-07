<?php

class Orders extends DB
{
    private $orders;

    public function __construct()
    {
        $this->orders = array();
    }


    /**
     * placeOrder($user_id, $quant, $total, $address, $pin, $cart, $status)
     * 
     * function to place order
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
    public function placeOrder($user_id, $quant, $total, $address, $pin, $cart, $status)
    {
        $conn = DB::getInstance();
        $stmt = $conn->prepare("INSERT INTO `orders` (`user_id`, `quantity`, `amount`, `address`, `pin`, `cart`,`status`)  VALUES('$user_id','$quant','$total','$address','$pin','$cart','$status')");
        $stmt->execute();
        $last_id = $conn->lastInsertId();
        return json_encode($last_id);
    }

    /**
     * getOrders($user_id)
     * 
     * function to orders based on user
     *
     * @param [type] $user_id
     * @return void
     */
    public function getOrders($user_id)
    {
        $conn = DB::getInstance();
        $stmt = $conn->prepare("SELECT * from `orders` WHERE `user_id`='$user_id'");
        $stmt->execute();
        return json_encode($stmt->fetchAll());
    }

    /**
     * getAllOrders()
     * 
     * function to fetch all orders from db
     *
     * @param [type] $user_id
     * @return void
     */
    public function getAllOrders()
    {
        $conn = DB::getInstance();
        $stmt = $conn->prepare("SELECT * from `orders` WHERE 1");
        $stmt->execute();
        return json_encode($stmt->fetchAll());
    }

    public function updateOrderStatus($order_id, $status)
    {
        $conn = DB::getInstance();
        $stmt = $conn->prepare("UPDATE `orders` SET `status`='$status' WHERE `order_id`='$order_id'");
        $stmt->execute();
        return json_encode(array('updated'));
    }
}
