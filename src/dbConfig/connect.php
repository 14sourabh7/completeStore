<?php

$servername = "mysql-server";
$username = "root";
$password = "secret";
$dbname = "store";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    // prepare sql and bind parameters
    $stmt = $conn->prepare("INSERT INTO Products (sku_no, name,brand,price,discount,type,image)
  VALUES (:sku_no, :name, :brand,:price,:discount,:type,:image)");
    $stmt->bindParam(':sku_no', $sku_no);
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':brand', $brand);
    $stmt->bindParam(':price', $price);
    $stmt->bindParam(':discount', $discount);
    $stmt->bindParam(':type', $type);
    $stmt->bindParam(':image', $image);

    // insert a row
    $sku_no = '101';
    $name = 'shirt';
    $brand = 'xyz';
    $type = 'faishion';
    $price = '1000';
    $discount = '10';
    $image = 'product.png';
    $stmt->execute();

    // insert a row
    $sku_no = '102';
    $name = 'shirt';
    $brand = 'xyz';
    $type = 'faishion';
    $price = '2000';
    $discount = '10';
    $image = 'product.png';
    $stmt->execute();

    // insert a row
    $sku_no = '103';
    $name = 'Tshirt';
    $brand = 'xyz';
    $type = 'faishion';
    $price = '1500';
    $discount = '10';
    $image = 'product.png';
    $stmt->execute();

    // insert a row
    $sku_no = '104';
    $name = 'Mobile';
    $brand = 'xyz';
    $type = 'Electronics';
    $price = '15000';
    $discount = '10';
    $image = 'product.png';
    $stmt->execute();

    // insert a row
    $sku_no = '105';
    $name = 'Mobile';
    $brand = 'xyz';
    $type = 'Electronics';
    $price = '25000';
    $discount = '15';
    $image = 'product.png';
    $stmt->execute();

    // insert a row
    $sku_no = '106';
    $name = 'Mobile';
    $brand = 'Television';
    $type = 'Appliance';
    $price = '12000';
    $discount = '20';
    $image = 'product.png';
    $stmt->execute();

    echo "New records created successfully";
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
echo "</table>";
