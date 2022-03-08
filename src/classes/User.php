<?php

namespace App;

class User extends DB
{
    public $user_id;
    public $username;
    public $password;
    public $email;

    public function __construct($user_id, $username, $password, $email)
    {
        $this->user_id = $user_id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
    }


    /**
     * function to validate single user
     *
     * @param [type] $email
     * @param [type] $password
     * @return void
     */
    public function validateUser($email, $password)
    {
        $conn = DB::getInstance();
        // prepare sql and bind parameters
        $stmt = $conn->prepare("SELECT * FROM `Users` WHERE email='$email' AND password='$password'");
        $stmt->execute();
        return json_encode($stmt->fetchAll());
    }

    /**
     * validateEmail($email)
     *function to validate email
     * @param [type] $email
     * @return void
     */
    public function validateEmail($email)
    {
        $conn = DB::getInstance();
        // prepare sql and bind parameters
        $stmt = $conn->prepare("SELECT * FROM `Users` WHERE email='$email'");
        $stmt->execute();
        return json_encode($stmt->fetchAll());
    }



    /**
     * addUser($name,$email,$password,$role)
     * function to add new user
     *
     * @param [type] $name
     * @param [type] $email
     * @param [type] $password
     * @param [type] $role
     * @return void
     */
    public function addUser($name, $email, $password, $role)
    {
        $conn = DB::getInstance();
        $stmt = $conn->prepare("INSERT INTO Users( `name`, `password`, `email`, `role`,`status`)
         VALUES('$name','$password','$email','$role','restricted')");
        $stmt->execute();
        $last_id = $conn->lastInsertId();

        $tmt = $conn->prepare("INSERT INTO `User-details`(`user_id`, `name`, `email`) VALUES 
        ('$last_id','$name','$email')");
        $tmt->execute();
        return json_encode(array($last_id));
    }


    /**
     * getUser()
     * function to get all users
     * @return void
     */
    public function getUser()
    {
        $conn = DB::getInstance();
        // $end = $start + 4;
        // prepare sql and bind parameters
        $stmt = $conn->prepare("SELECT * FROM `Users` WHERE 1");
        $stmt->execute();
        return json_encode($stmt->fetchAll());
    }

    /**
     * updateStatus($status,$id,$col)
     *
     * @param [type] $status
     * @param [type] $id
     * @param [type] $col
     * @return void
     */
    public function updateStatus($status, $id, $col)
    {
        $conn = DB::getInstance();
        // prepare sql and bind parameters
        $stmt = $conn->prepare("UPDATE `Users` SET `$col`='$status' WHERE user_id='$id'");
        $stmt->execute();
        return json_encode(array('updated'));
    }


    /**
     * updateUserDetails($id,$name,$email)
     * function to update user details in user table
     *
     * @param [type] $id
     * @param [type] $name
     * @param [type] $email
     * @return void
     */
    public function updateUserDetails($id, $name, $email)
    {
        $conn = DB::getInstance();
        // prepare sql and bind parameters
        $stmt = $conn->prepare("UPDATE `Users` SET `name`='$name',`email`='$email' WHERE user_id='$id'");
        $stmt->execute();
        return json_encode(array('updated'));
    }

    /**
     * updateUserDetail($user_id,$name,$email,$address,$mobile,$pin)
     * function to update user detail in user-details table
     *
     * @param [type] $user_id
     * @param [type] $name
     * @param [type] $email
     * @param [type] $address
     * @param [type] $mobile
     * @param [type] $pin
     * @return void
     */
    public function updateUserDetail($user_id, $name, $email, $address, $mobile, $pin)
    {
        $conn = DB::getInstance();
        // prepare sql and bind parameters
        $stmt = $conn->prepare("UPDATE `User-details` 
        SET `user_id`='$user_id',
        `name`='$name',
        `email`='$email',
        `mobile`=$mobile,
        `address`='$address',
        `pin`='$pin' WHERE user_id='$user_id'");
        $stmt->execute();
        $tmt = $conn->prepare("UPDATE `Users` SET `name`='$name',`email`='$email' WHERE user_id='$user_id'");
        $tmt->execute();

        return json_encode(array('user updated'));
    }

    /**
     * deleteUser($user_id)
     * function to delete user
     *
     * @param [type] $user_id
     * @return void
     */
    public function deleteUser($user_id)
    {
        $conn = DB::getInstance();
        $stmt = $conn->prepare(" DELETE FROM `Users` WHERE `user_id`='$user_id'");
        $stmt->execute();
        return json_encode(array('deleted'));
    }


    /**
     * getUserDetails($user_id)
     * function to return details of particular user
     *
     * @param [type] $user_id
     * @return void
     */
    public function getUserDetails($user_id)
    {
        $conn = DB::getInstance();
        // prepare sql and bind parameters
        $stmt = $conn->prepare("SELECT * FROM `User-details` WHERE `user_id`='$user_id'");
        $stmt->execute();
        return json_encode($stmt->fetchAll());
    }
}
