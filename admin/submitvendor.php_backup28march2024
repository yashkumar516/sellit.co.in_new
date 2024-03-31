
<?php include 'includes/confile.php' ?>
<?php
 if(isset($_POST['vendor'])){
  
    $name = $_POST['name'];
    $mobileno = $_POST['mobileno'];
    $alternateno = $_POST['alternateno'];
    $email = $_POST['email'];
    $password = explode("@",$email);
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
    $ownerimg = str_replace(" ","_",$_FILES['ownerimg']['name']);
    $ownerimgtmp = $_FILES['ownerimg']['tmp_name'];
    $visitingcard = str_replace(" ","_",$_FILES['visitingcard']['name']);
    $visittmp  = $_FILES['visitingcard']['tmp_name'];
    $adharcard = str_replace(" ","_",$_FILES['adharcard']['name']);
    $aadhartmp  = $_FILES['adharcard']['tmp_name'];
    $bankcopy = str_replace(" ","_",$_FILES['bankcopy']['name']);
    $bankcopytmp  = $_FILES['bankcopy']['tmp_name'];

    // NEW
    $ownerimg = rand(10, 20).uniqid().$ownerimg;
    $visitingcard = rand(10, 20).uniqid().$visitingcard;
    $adharcard = rand(10, 20).uniqid().$adharcard;
    $bankcopy = rand(10, 20).uniqid().$bankcopy;
    
    $rowscount = mysqli_num_rows(mysqli_query($con,"SELECT * FROM `vendors` WHERE `email` = '$email' "));
    if($rowscount >= 1){
        echo '<script>
                alert("please try with another email id this email already exixt");
                window.location.href = "addvendor.php";
         </script>';
    }else{
    $insertquery = mysqli_query($con,"INSERT INTO `vendors`(`name`,`mobileno`,`alternateno`,`email`,`password`,`presentadd`,`permanentadd`,`city`,`pincode`,`maritalstatus`,`shopname`,
    `shopadd`,`accountholder`,`accountno`,`ifccode`,`bankname`,`ownerphoto`,`visitingphoto`,`aadharphoto`,`bankphoto`) values('$name','$mobileno','$alternateno','$email','$password[0]','$presentadd','$permanentadd',
    '$city','$pincode','$marital','$shopname','$shopadd','$accountholder','$accountno','$ifsc','$bankname','$ownerimg','$visitingcard','$adharcard','$bankcopy')");
    if($insertquery)
    {
    move_uploaded_file($ownerimgtmp, "img/vendors/".$ownerimg);
    move_uploaded_file($visittmp, "img/vendors/".$visitingcard);
    move_uploaded_file($aadhartmp, "img/vendors/".$adharcard);
    move_uploaded_file($bankcopytmp, "img/vendors/".$bankcopy);
    // razorpay code start 

    $curl = curl_init();
    curl_setopt_array($curl, array(
      CURLOPT_URL => 'https://api.razorpay.com/v1/beta/accounts',
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_ENCODING => '',
      CURLOPT_MAXREDIRS => 10,
      CURLOPT_TIMEOUT => 0,
      CURLOPT_FOLLOWLOCATION => true,
      CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
      CURLOPT_CUSTOMREQUEST => 'POST',
      CURLOPT_POSTFIELDS =>'{
        "name": "'.$accountholder.'",
        "email": "'.$email.'",
        "tnc_accepted": true,
        "account_details": {
            "business_name": "sellit",
            "business_type": "individual"
        },
        "bank_account": {
            "ifsc_code": "'.$ifsc.'",
            "beneficiary_name": "'.$accountholder.'",
            "account_type": "current",
            "account_number": "'.$accountno.'"
        }
    }',
      CURLOPT_HTTPHEADER => array(
        'Authorization: Basic cnpwX3Rlc3RfRGN0VWhHekprZnc0T0Y6QzNSWkE4cU45WUlDRHB4Qno2TzJiODZw',
        'Content-Type: application/json'
      ),
    ));
    $response = curl_exec($curl);
    curl_close($curl);
    $result = json_decode($response);
    $razid = $result->id;
    $updateraz = mysqli_query($con,"UPDATE `vendors` SET `razorpayaccountid` = '$razid' WHERE `id` = LAST_INSERT_ID() ");
    if($updateraz){
    echo '<script>
    alert("success fully added");
    window.location.href = "addvendor.php";
        </script>';
       }else{
              echo '<script>
              alert("razorpay account not created");
              window.location.href = "addvendor.php";
                  </script>';
       }
//    razorpay code end  
    }else{
         echo '<script>
                alert("failed");
                window.location.href = "addvendor.php";
         </script>';
    }

 }
 }
?>