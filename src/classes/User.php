<?php


include 'DB.php';
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
     * function to fetch single user
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
     * validateEmail
     *function to fetch email
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
     * addUser
     * function to add user
     */

    public function addUser($name, $email, $password, $role)
    {
        $conn = DB::getInstance();
        $stmt = $conn->prepare("INSERT INTO Users( `name`, `password`, `email`, `role`,`status`) VALUES('$name','$password','$email','$role','approved')");
        $stmt->execute();
        $last_id = $conn->lastInsertId();
        return json_encode($last_id);
    }


    /**
     * getUser()
     *function to get users
     * @return void
     */
    public function getUser()
    {
        $conn = DB::getInstance();
        // prepare sql and bind parameters
        $stmt = $conn->prepare("SELECT * FROM `Users`");
        $stmt->execute();
        return json_encode($stmt->fetchAll());
    }

    /**
     * updateStatus()
     *function to update status
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

    public function updateUserDetails($id, $name, $email)
    {
        $conn = DB::getInstance();
        // prepare sql and bind parameters
        $stmt = $conn->prepare("UPDATE `Users` SET `name`='$name',`email`='$email' WHERE user_id='$id'");
        $stmt->execute();
        return json_encode(array('updated'));
    }
    public function deleteUser($user_id)
    {
        $conn = DB::getInstance();
        $stmt = $conn->prepare(" DELETE FROM `Users` WHERE `user_id`='$user_id'");
        $stmt->execute();
        return json_encode(array('deleted'));
    }
}
