<?php include 'includes/confile.php' ?>
<?php
 if(isset($_REQUEST['id']) && isset($_REQUEST['status'])){
    $enqid  = $_REQUEST['id'];
    $status  = $_REQUEST['status'];
    if($enqid != null && $status != null){
        $update = mysqli_query($con,"UPDATE `enquiry` SET `status` = '$status' WHERE `id` = '$enqid'");
        if($update){
            header("refresh:0; url=avaibaleleads.php");
        }
    }
 }
?>