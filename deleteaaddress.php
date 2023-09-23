<?php include 'admin/includes/confile.php' ?>
<?php
  if(isset($_REQUEST['id']) && isset($_REQUEST['enid']) && isset($_REQUEST['uid'])){
      $adid = $_REQUEST['id'];
      $enid = $_REQUEST['enid'];
      $uid = $_REQUEST['uid'];
      $deletequery = mysqli_query($con,"DELETE FROM `address1` WHERE `id` = '$adid' ");
      if( $deletequery){
        header("refresh:0;url=addaddress.php?enid=$enid&&uid=$uid");
      }else{
        header("refresh:0;url=addaddress.php?enid=$enid&&uid=$uid");
      }
  }
?>