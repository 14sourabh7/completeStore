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


    public function validateUser($email, $password)
    {
        $conn = DB::getInstance();
        // prepare sql and bind parameters
        $stmt = $conn->prepare("SELECT * FROM `Users` WHERE email='$email' AND password='$password'");
        $stmt->execute();
        return json_encode($stmt->fetchAll());
    }
    public function validateEmail($email)
    {
        $conn = DB::getInstance();
        // prepare sql and bind parameters
        $stmt = $conn->prepare("SELECT * FROM `Users` WHERE email='$email'");
        $stmt->execute();
        return json_encode($stmt->fetchAll());
    }

    public function addUser($name, $email, $password, $role)
    {
        $conn = DB::getInstance();
        $stmt = $conn->prepare("INSERT INTO Users( `name`, `password`, `email`, `role`,`status`) VALUES('$name','$password','$email','$role','approved')");
        $stmt->execute();
        $last_id = $conn->lastInsertId();
        return json_encode($last_id);
    }

    public function getUser()
    {
        $conn = DB::getInstance();
        // prepare sql and bind parameters
        $stmt = $conn->prepare("SELECT * FROM `Users`");
        $stmt->execute();
        return json_encode($stmt->fetchAll());
    }
}
