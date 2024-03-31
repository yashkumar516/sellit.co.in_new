<?php

class CheckModelValue
{
    private $conn; 

    public function __construct($db)
    {
        $this->conn = $db; 
    }
 

    public function getProductBrandValue($brandId, $productId)
    {
   
        $checkQuery = "
            SELECT product_value.*, product_value.id as product_value_id, product_value.brand_id as brand_id, 
                subcategory.subcategory_name, subcategory.subcategory_image
            FROM product_value
            JOIN subcategory ON subcategory.id = product_value.brand_id
            WHERE product_value.product_id = ?";
        $checkStmt = $this->conn->prepare($checkQuery);
        $checkStmt->bind_param("s", $productId);

        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows > 0) {
            return $checkResult->fetch_assoc();
        } else { 
            $checkQuery = "SELECT * FROM `subcategory` WHERE  `id` = ?  ";
            $checkBrandStmt = $this->conn->prepare($checkQuery);
            $checkBrandStmt->bind_param("s",  $brandId );

            $checkBrandStmt->execute();
            $checkBrandResult = $checkBrandStmt->get_result();

            return $checkBrandResult->fetch_assoc();
        }
    }
}