<?php
include 'admin/includes/confile.php';
if (isset($_POST['review'])) {
  $rname = $_POST['rname'];
  $rcity = $_POST['rcity'];
  $rating = $_POST['rating'];
  $review = $_POST['msg'];
 $q = mysqli_query($con, "INSERT INTO `product_reviews`(`rname`,`rcity`,`rmsg`,`rating`) VALUES('$rname','$rcity','$review','$rating')");
 if($q){
     header("Refresh:0; url=index.php");
 }else{
    header("Refresh:0; url=index.php");
 }
}
?>
<?php
if (isset($_POST['newsuser'])) {
  $nwsletter = $_POST['newsletter'];
  if ($nwsletter != '') {
    $insertnews = mysqli_query($con, "INSERT INTO `newsletter` (`mobile`) VALUES('$nwsletter')");
  }
}
?>