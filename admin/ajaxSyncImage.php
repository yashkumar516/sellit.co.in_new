<?php include 'includes/confile.php' ?>
<?php
    include_once "./classes/syncImage.php";
    $syncImageManager = new SyncImageManager($con);
    if (isset($_POST["syncOn"])) {
        $syncOn=$_POST["syncOn"];
        echo "<br/>-------------------------";
        echo "<br/>-------------------------";
        echo "<br/>-------------------------";
        echo "<br/>-------------------------";
        echo "<br/>-------------------------";
        echo "<br/>------------------------syncOn-".$syncOn;
        if($syncOn ==="brand"){

            $result =  $syncImageManager->syncBrandImage();
            $errorValue = $result['error'];
            $dataValue = $result['data'];
            $totalValue = $result['totalData'];
    
            if (!$errorValue) {
                echo " Sync brand image $totalValue out of $dataValue ";
            } else {
                echo "Sync brand image failed";
            }
        } else if($syncOn ==="model"){
            
            $result =  $syncImageManager->syncProductImage();
            $errorValue = $result['error'];
            $dataValue = $result['data'];
            $totalValue = $result['totalData'];
    
            if (!$errorValue) {
                echo " Sync brand image $totalValue out of $dataValue ";
            } else {
                echo "Sync brand image failed";
            }
        }
    }
?>