<?php



include 'Product.php';


class Products extends DB
{
    private $product;

    public function __construct()
    {
        $this->product = array();
    }


    /**
     * getProducts()
     * 
     * function to get all products
     *
     * @return void
     */
    public function getProducts()
    {
        $conn = DB::getInstance();
        // prepare sql and bind parameters
        $stmt = $conn->prepare("SELECT * FROM `Products`");
        $stmt->execute();
        return json_encode($stmt->fetchAll());
    }

    /**
     * getProduct($sku)
     * 
     * function to get particular product
     *
     * @param [type] $sku
     * @return void
     */
    public function getProduct($sku)
    {
        $conn = DB::getInstance();
        // prepare sql and bind parameters
        $stmt = $conn->prepare("SELECT * FROM `Products`  WHERE `Products`.`sku_no`='$sku'");
        $stmt->execute();
        return json_encode($stmt->fetchAll());
    }

    /**
     * getFilterProducts($filter)
     * 
     * function to get products on particular filter
     *
     * @param [type] $filter
     * @return void
     */
    public function getFilterProducts($filter)
    {
        $conn = DB::getInstance();
        // prepare sql and bind parameters
        if ($filter == 'All') {
            $stmt = $conn->prepare("SELECT * FROM `Products`");
        } else {
            $stmt = $conn->prepare("SELECT * FROM `Products` WHERE `Products`.`type`='$filter'");
        }

        $stmt->execute();
        return json_encode($stmt->fetchAll());
    }

    /**
     * addNewProduct($name,$brand, $category, $price, $discount)
     * 
     * function to add new product
     *
     * @param [type] $name
     * @param [type] $brand
     * @param [type] $category
     * @param [type] $price
     * @param [type] $discount
     * @return void
     */
    public function addNewProduct($name, $brand, $category, $price, $discount)
    {

        $conn = DB::getInstance();
        // prepare sql and bind parameters
        $stmt = $conn->prepare(" INSERT INTO `Products`(`name`, `brand`, `price`, `discount`, `type`, `image`) VALUES ('$name','$brand','$price','$discount','$category','product.png')");
        $stmt->execute();
        $last_id = $conn->lastInsertId();
        return json_encode($last_id);
    }


    /**
     * updateProduct
     * 
     * function to update product
     *
     * @param [type] $product_id
     * @param [type] $name
     * @param [type] $brand
     * @param [type] $category
     * @param [type] $price
     * @param [type] $discount
     * @return void
     */
    public function updateProduct($product_id, $name, $brand, $category, $price, $discount)
    {

        $conn = DB::getInstance();
        // prepare sql and bind parameters
        $stmt = $conn->prepare("UPDATE `Products` SET `name`='$name',`brand`='$brand',`price`='$price',`discount`='$discount',`type`='$category',`image`='product.png' WHERE `sku_no`='$product_id'");
        $stmt->execute();
        return json_encode(array('updated'));
    }

    /**
     * deleteProduct($product_id)
     * 
     * function to delete product
     *
     * @param [type] $product_id
     * @return void
     */
    public function deleteProduct($product_id)
    {

        $conn = DB::getInstance();
        // prepare sql and bind parameters
        $stmt = $conn->prepare(" DELETE FROM `Products` WHERE `sku_no`='$product_id'");
        $stmt->execute();
        return json_encode(array('deleted'));
    }
}
