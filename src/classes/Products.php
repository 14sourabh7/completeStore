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
}
