<?php

$servername = "mysql-server";
$username = "root";
$password = "secret";
$dbname = "store";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO Users (user_id,user_name,password,name,email,role)
  VALUES (:user_id, :user_name, :password,:name,:email,:role)");
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':user_name', $user_name);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':role', $role);


    // insert a row
    $sku_no = '101';
    $name = 'shirt';
    $brand = 'xyz';
    $type = 'faishion';
    $price = '1000';
    $discount = '10';
    $image = 'product.png';
    $stmt->execute();


    echo "New records created successfully";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
