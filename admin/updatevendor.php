
<?php include 'includes/confile.php' ?>
<?php
 if(isset($_POST['vendor']) && isset($_REQUEST['vid'])){
    $vendorid = $_REQUEST['vid']; 
    $name = $_POST['name'];
    $mobileno = $_POST['mobileno'];
    $alternateno = $_POST['alternateno'];
    $email = $_POST['email'];
    $presentadd = $_POST['presentadd'];
    $permanentadd = $_POST['permanentadd'];
    $city = $_POST['city'];
    $pincode = $_POST['pincode'];
    $marital = $_POST['marital'];
    $shopname = $_POST['shopname'];
    $shopadd = $_POST['shopadd'];
    $accountholder = $_POST['accountholder'];
    $accountno = $_POST['accountno'];
    $ifsc = $_POST['ifsc'];
    $bankname = $_POST['bankname'];
    // new 
    if($_FILES['ownerimg']['name'] != null){
    $ownerimg = str_replace(" ","_",$_FILES['ownerimg']['name']);
    $ownerimgtmp = $_FILES['ownerimg']['tmp_name'];
    $ownerimg = rand(10, 20).uniqid().$ownerimg;
    move_uploaded_file($ownerimgtmp, "img/vendors/".$ownerimg);
    }else{
        $ownerimg = $_POST['ownerimg1'];
    }
    if($_FILES['visitingcard']['name'] != null){
    $visitingcard = str_replace(" ","_",$_FILES['visitingcard']['name']);
    $visittmp  = $_FILES['visitingcard']['tmp_name'];
    $visitingcard = rand(10, 20).uniqid().$visitingcard;
    move_uploaded_file($visittmp, "img/vendors/".$visitingcard);
    }else{
        $visitingcard = $_POST['visitingcard1'];
    }
    if($_FILES['adharcard']['name'] != null){
    $adharcard = str_replace(" ","_",$_FILES['adharcard']['name']);
    $aadhartmp  = $_FILES['adharcard']['tmp_name'];
    $adharcard = rand(10, 20).uniqid().$adharcard;
    move_uploaded_file($aadhartmp, "img/vendors/".$adharcard);
    }else{
        $adharcard = $_POST['adharcard1'];
    }
    if($_FILES['bankcopy']['name'] != null){
    $bankcopy = str_replace(" ","_",$_FILES['bankcopy']['name']);
    $bankcopytmp  = $_FILES['bankcopy']['tmp_name'];
    $bankcopy = rand(10, 20).uniqid().$bankcopy;
    move_uploaded_file($bankcopytmp, "img/vendors/".$bankcopy);
    }else{
        $bankcopy = $_POST['bankcopy1'];
    }

    $updatequery = mysqli_query($con,"UPDATE `vendors` SET `name`='$name',`mobileno`='$mobileno',`alternateno`='$alternateno',`email`='$email',`presentadd`='$presentadd',
    `permanentadd`='$permanentadd',`city`='$city',`pincode`='$pincode',`maritalstatus`='$marital',`shopname`='$shopname',`shopadd`='$shopadd',`accountholder`='$accountholder'
    ,`accountno`='$accountno',`ifccode`='$ifsc',`bankname`='$bankname',`ownerphoto`='$ownerimg',`visitingphoto`='$visitingcard',`aadharphoto`='$adharcard',`bankphoto`='$bankcopy' WHERE `id` = '$vendorid' ");
    if($updatequery){
     echo '<script>
            alert("vendor added successfully");
            window.location.href = "vendorlist.php";
     </script>';
    }else{
         echo '<script>
                alert("failed");
                window.location.href = "vendorlist.php";
         </script>';
    }

 }
?>