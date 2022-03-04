<?php



include 'Product.php';


class Products extends DB
{
    private $product;

    public function __construct()
    {
        $this->product = array();
    }

    public function getProducts()
    {
        $conn = DB::getInstance();
        // prepare sql and bind parameters
        $stmt = $conn->prepare("SELECT * FROM `Products`");
        $stmt->execute();
        return json_encode($stmt->fetchAll());
    }
    public function addNewProduct($name, $brand, $category, $price, $discount)
    {

        $conn = DB::getInstance();
        // prepare sql and bind parameters
        $stmt = $conn->prepare(" INSERT INTO `Products`(`name`, `brand`, `price`, `discount`, `type`, `image`) VALUES ('$name','$brand','$price','$discount','$category','product.png')");
        $stmt->execute();
        $last_id = $conn->lastInsertId();
        return json_encode($last_id);
    }

    public function updateProduct($product_id, $name, $brand, $category, $price, $discount)
    {

        $conn = DB::getInstance();
        // prepare sql and bind parameters
        $stmt = $conn->prepare("UPDATE `Products` SET `name`='$name',`brand`='$brand',`price`='$price',`discount`='$discount',`type`='$category',`image`='product.png' WHERE `sku_no`='$product_id'");
        $stmt->execute();
        return json_encode(array('updated'));
    }
    public function deleteProduct($product_id)
    {

        $conn = DB::getInstance();
        // prepare sql and bind parameters
        $stmt = $conn->prepare(" DELETE FROM `Products` WHERE `sku_no`='$product_id'");
        $stmt->execute();
        return json_encode(array('deleted'));
    }
}
