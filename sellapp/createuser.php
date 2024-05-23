<?php include '../admin/includes/confile.php' ?>
<?php 
  if(isset($_REQUEST['mobile'])){
     $mobilenumber = $_REQUEST['mobile'];
     $row = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `userrecord` WHERE `mobile` = '$mobilenumber' "));
     if($row >= 1){
         $uid = $row['id'];
         echo $uid;
     }else{
         $query = mysqli_query($con,"INSERT INTO `userrecord` (`mobile`) VALUES('$mobilenumber')");
         if( $query){
             $seluid = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `userrecord` WHERE `mobile` = '$mobilenumber' ORDER BY `id` DESC  LIMIT 1  "));
             if($seluid){
                $uid = $seluid['id'];
                echo $uid;
             }else{
                 echo "no runs select query ";
             }
         }else{
             echo "no insert query runs";
         }
     }
  }

?>