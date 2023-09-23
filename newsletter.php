<?php
include 'admin/includes/confile.php';
if (isset($_POST['newsuser'])) {
   $nwsletter = $_POST['newsletter'];
  if ($nwsletter != '') {
    $insertnews = mysqli_query($con, "INSERT INTO `newsletter` (`mobile`) VALUES('$nwsletter')");
    if($insertnews){
        header("Refresh:0; url=index.php");
    }else{
       header("Refresh:0; url=index.php");
    }
  }
}
?>