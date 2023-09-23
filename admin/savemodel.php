<?php 
 include 'includes/confile.php';
 if(isset($_POST)){
    $category = $_POST['categoryname'];
	$subcategory = $_POST['subcategory'];
	$childcategory = $_POST['childcategory'];
	$productname = $_POST['modelname'];
	$productimage = str_replace(" ","_",$_FILES['modelimg']['name']);
	move_uploaded_file($_FILES['modelimg']['tmp_name'], "img/".str_replace(" ","_",$_FILES['modelimg']['name']));
	$query = mysqli_query($con,"INSERT INTO `product` (`categoryid`,`subcategoryid`,`childcategoryid`,`product_name`,`product_image`)
	                                VALUES('$category','$subcategory','$childcategory','$productname','$productimage')");
		if($query)
		{
		   $mmid = mysqli_fetch_assoc(mysqli_query($con,"SELECT LAST_INSERT_ID() AS `id` FROM `product`"));
		   $mid = $mmid['id'];
		   $quinsert = mysqli_query($con,"INSERT INTO `questions`(`categoryid`,`subcategoryid`,`childcategoryid`,`product_name`)
			VALUES('$category','$subcategory','$childcategory','$mid') ");
			if($quinsert){
		      $varient = $_POST['varient'];
			  $upto = $_POST['upto'];
			  foreach($varient as $key => $value){
			  $insertvarient = mysqli_query($con,"INSERT INTO `varient`(`categoryid`,`subcategoryid`,`childcategoryid`,`product_name`,`varient`,`uptovalue`)
			          VALUES('$category','$subcategory','$childcategory','$mid','$value','$upto[$key]')");
		    }
		   if($insertvarient){
			echo "<script> alert('varient successfully');
			
			
			</script>";
		   }else{
			echo "<script> alert('varient unsuccessfully');
		
			
			</script>";
		   }
		}
		  else
		  {
			echo "<script> alert('insert unsuccessfully');
			</script>";  
		  } 
	 }
 }
?>