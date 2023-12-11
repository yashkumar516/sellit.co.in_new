<?php

class ChildCategoryManager {
    private $conn;

    public function __construct($db) {
        $this->conn = $db;
    }

    public function upsertChildCategory($getdata, $categoryId, $brandId) {
        // Create a DateTime object from the input string
        $currentDateTimeObject =new DateTime();//::createFromFormat('Y-m-d H:i:s.u', $inputString);
 
        // Format the DateTime object
        $nowDate= $currentDateTimeObject->format('Y-m-d H:i:s.u');
        // Check if the childcategory already exists 
        
        $seriesName = isset($getdata["Series"]) &&trim($getdata["Series"])!==""?trim($getdata["Series"]): trim($getdata["Series Name"]);
      
        $id =isset($getdata["Series ID"])? (int)$getdata["Series ID"]:"";  
       
        $status="active";
        $checkQuery = $id!=="" && $id!==null && $id>0? "SELECT * FROM `childcategory` WHERE  `id` = ? ":"SELECT * FROM `childcategory` WHERE `childcategory` = ? AND `subcatid` = ? AND  `categoryid` = ?";
        // $checkQuery ="SELECT * FROM `subcategory` WHERE (`subcategory_name` = ? OR `id` = ?) AND `category_id` = ?";
        $checkStmt = $this->conn->prepare($checkQuery);
        $checkId=$id!=="" && $id!==null && $id>0?$id:$seriesName;

        // $seriesName = trim($getdata["Series"]); 
        
        // $checkQuery ="SELECT * FROM `childcategory` WHERE `childcategory` = ? AND `subcatid` = ? AND  `categoryid` = ?";
        // $checkStmt = $this->conn->prepare($checkQuery);
        // $checkStmt->bind_param("sss", $checkId, $brandId, $categoryId);
        if($id!=="" && $id!==null && $id>0){
            $checkStmt->bind_param("s", $checkId);
        } else{
            $checkStmt->bind_param("sss", $checkId, $brandId, $categoryId);
        }
        // echo "---<br/>------------------checkId---------".$checkId;
        // echo "---<br/>------------------categoryId".$categoryId;
        $checkStmt->execute();
        $checkResult = $checkStmt->get_result();

        if ($checkResult->num_rows > 0) {
            // ChildCategory exists, update it
            $existingChildCategory = $checkResult->fetch_assoc(); // Fetch existing childcategory data
            $childcategoryId = $existingChildCategory['id']; // Get the existing childcategory ID
             
            $updateQuery = " UPDATE `childcategory`
            SET
                `categoryid` = ?,
                `subcatid` = ?,
                `childcategory` = ?,
                `status` = ?,
                `modify` = ?
            WHERE
                `id` = ?
            ";
            $updateStmt = $this->conn->prepare($updateQuery);
            $updateStmt->bind_param("sssssi", $categoryId, $brandId, $seriesName, $status, $nowDate, $childcategoryId);
            $updateStmt->execute();
        
            // Fetch and return updated childcategory information
            $updatedChildCategory = $existingChildCategory; // Use the existing childcategory data
            $updatedChildCategory['categoryid'] = $categoryId;
            $updatedChildCategory['subcatid'] = $brandId;
            $updatedChildCategory['childcategory'] = $seriesName;
            $updatedChildCategory['status'] = $status; 
        
            return $updatedChildCategory;  
        } else {
            // ChildCategory doesn't exist, insert it 
            $insertQuery=  "INSERT INTO `childcategory` (`categoryid`,`subcatid`,`childcategory`,`status`)  VALUES(?,?,?,?)";
         
            $insertStmt = $this->conn->prepare($insertQuery);
            $insertStmt->bind_param("dsss", $categoryId, $brandId, $seriesName, $status);
          
            $insertStmt->execute();

            // Fetch and return inserted childcategory information
            $insertedChildCategoryId = $insertStmt->insert_id;
            $insertedChildCategoryQuery = "SELECT * FROM childcategory WHERE id = ?";
            $insertedChildCategoryStmt = $this->conn->prepare($insertedChildCategoryQuery);
            $insertedChildCategoryStmt->bind_param("d", $insertedChildCategoryId);
            $insertedChildCategoryStmt->execute();
            $insertedChildCategoryResult = $insertedChildCategoryStmt->get_result();
            $insertedChildCategory = $insertedChildCategoryResult->fetch_assoc();

            return $insertedChildCategory;
        }
    }

    // upsertChildCategorySerie
}

?>