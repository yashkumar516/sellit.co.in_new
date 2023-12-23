<?php include 'includes/confile.php' ?>
<?php
    include_once "./classes/syncImage.php";
    $syncImageManager = new SyncImageManager($con);
    if (isset($_POST["syncOn"])) {
        $syncOn=$_POST["syncOn"]; 
        if($syncOn ==="Brand"){

            $result =  $syncImageManager->syncBrandImage();
            $errorValue = $result['error'];
            $dataValue = $result['data'];
            $totalValue = $result['totalData'];
    
            
            // return $result;
            if (!$errorValue) {
                $msg = $dataValue>1?"Brand images $dataValue out of $totalValue have been synced successfully.":"Brand image $dataValue out of $totalValue have been synced successfully.";
                echo $msg;
            } else {
                $msg = $totalValue>1?"Brand images sync failed":"Brand image sync failed";
                echo $msg;
            }
        } else if($syncOn ==="Model"){
            
            $result =  $syncImageManager->syncProductImage();
            $errorValue = $result['error'];
            $dataValue = $result['data'];
            $totalValue = $result['totalData'];
    
            if (!$errorValue) {
                $msg = $dataValue>1?"Model images $dataValue out of $totalValue have been synced successfully.":"Model image $dataValue out of $totalValue have been synced successfully.";
                echo $msg;
            } else {
                $msg = $totalValue>1?"Model images sync failed":"Model image sync failed";
                echo $msg;
            }
        } else{
            
        echo "Error uploading the 'syncType' is not set.";
        }
    }
?>