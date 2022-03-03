<?php

$servername = "mysql-server";
$username = "root";
$password = "secret";
$dbname = "store";

try {
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $stmt = $conn->prepare("SELECT * FROM Products");
    $stmt->execute();

    // set the resulting array to associative
    $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
    echo (json_encode($stmt->fetchAll()));
} catch (PDOException $e) {
    echo "Error: " . $e->getMessage();
}
$conn = null;
