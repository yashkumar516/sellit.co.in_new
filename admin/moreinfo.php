 <!-- include header start -->
 <?php include 'includes/header.php' ?>
 <?php include 'includes/sidebar.php' ?>
 <!-- end sidebar -->

 <?php
  if(isset($_REQUEST['id'])){
      $enqid = $_REQUEST['id'];
      $enqdetail = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM  `enquiry` WHERE `id` = '$enqid' "));
	  $userid = $enqdetail['userid'];
	  $usernumber  = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `userrecord` WHERE `id` = '$userid' "));
	  $customerName = $usernumber['name'];
	  $customerMobile = $usernumber['mobile'];
	  $rowaddress = mysqli_num_rows(mysqli_query($con,"SELECT * FROM `address` WHERE `enquid` = '$enqid' "));
	  if($rowaddress >= 1){
      $pickupdate = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `address` WHERE `enquid` = '$enqid' "));
	  $soon = $pickupdate['soon'];
      $choseday = $pickupdate['choseday'];
      $day = $pickupdate['day'];
      $time = $pickupdate['time'];
      $addressid = $pickupdate['addressid'];
	  }else{
		$pickupdate = null;
		$soon = null;
		$choseday = null;
		$day = null;
		$time = null;
      $addressid = null;
	  }
	  $rowaddress1 = mysqli_num_rows(mysqli_query($con,"SELECT * FROM `address1` WHERE `id` = '$addressid' "));
	  if($rowaddress1 > 0){
      $addressdetail = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `address1` WHERE `id` = '$addressid' "));
      $pincodeforv = $addressdetail['pincode'];
	  }else{
		$addressdetail = null;
		$pincodeforv = null;
	  }
	  $rowaccountdetail = mysqli_num_rows(mysqli_query($con,"SELECT * FROM `useraccount` WHERE `enquiryid` = '$enqid' "));
	  if($rowaccountdetail == 1){
      $accountdetail = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `useraccount` WHERE `enquiryid` = '$enqid' "));
	}else{
		$accountdetail = null;
	}
  }
?>

 <?php
 if(isset($_POST['assignlead'])){
	  $pincode = $_POST['leadpin'];
	  $vendorid = $_POST['vendors'];
       $insertquery = mysqli_query($con,"UPDATE `enquiry` SET  `vendor_id`='$vendorid' WHERE `id` = '$enqid'");
	   if($insertquery){
		 echo '<script>
		    alert("lead assigned successfully");  
		   </script>';
	   }
  }
?>
 <section role="main" class="content-body content-body-modern">
     <header class="page-header page-header-left-inline-breadcrumb">
         <h2 class="font-weight-bold text-6">Dashboard</h2>
         <div class="right-wrapper">
             <ol class="breadcrumbs">
                 <li><span>Home</span></li>
                 <li><span>eCommerce Dashboard</span></li>
             </ol>
             <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
         </div>
     </header>

     <!-- start: page -->
     <div class="row">
         <div class="col">

             <div class="row mt-3">


                 <div class="col-6 mb-3">
                     <div class="card card-modern card-modern-table-over-header">
                         <div class="card-header">
                             <!-- <div class="card-actions">
                                 <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                             </div> -->
                             <h2 class="card-title">LEAD <span style="color:gray;">
                                     &nbsp; #<?php echo $enqdetail['genorderid'] ?></span>
                             </h2>
                         </div>
                         <div class="card-body">
                             <div class="row">
                                 <div class="col-4">
                                     <?php if(!empty($enqdetail['mimg'])){ ?>
                                     <img src="img/<?= $enqdetail['mimg']  ?>" class="img-fluid">
                                     <br><br>
                                     <?php } ?>
                                 </div>
                                 <div class="col-8 p-0">
                                     <table style='width:100%; border-collapse: collapse; font-size:16px'>
                                         <tr>
                                             <td style='padding: 6px 0px;  text-transform:capitalize;'>
                                                 <b>Lead Id</b>
                                             </td>
                                             <td
                                                 style='padding: 6px 0px; text-transform:capitalize; color:#000; font-weight:600;'>

                                                 : &nbsp; #<?php echo $enqdetail['id'] ?>
                                         </tr>
                                         <tr>
                                             <td style='padding: 6px 0px;  text-transform:capitalize;'>
                                                 <b>Device Name</b>
                                             </td>
                                             <td
                                                 style='padding: 6px 0px; text-transform:capitalize; color:#000; font-weight:600;'>
                                                 : &nbsp; <?php echo $enqdetail['model_name']  ?>
                                         </tr>
                                         <tr>
                                             <td style='padding: 6px 0px;  text-transform:capitalize;'>
                                                 <b>Offer Price</b>
                                             </td>
                                             <td
                                                 style='padding: 6px 0px; text-transform:capitalize; color:#000; font-weight:600;'>
                                                 : &nbsp; ₹<?php echo $enqdetail['offerprice'] ?>
                                         </tr>
                                         <tr>
                                             <td style='padding: 6px 0px;  text-transform:capitalize;'>
                                                 <b>IMEI Number </b>
                                             </td>
                                             <td
                                                 style='padding: 6px 0px; text-transform:capitalize; color:#000; font-weight:600;'>

                                                 : &nbsp;
                                                 <?php echo (!empty($enqdetail['emino']))?  $enqdetail['emino']:"Not Available" ?>

                                         </tr>
                                     </table>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>

                 <div class="col-3 mb-3"> <?php 
								       if($enqdetail['status'] == 'Complete'){ ?>
                     <div class="card card-modern card-modern-table-over-header">
                         <div class="card-header">
                             <!-- <div class="card-actions">
                                 <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                             </div> -->
                             <h2 class="card-title">Vendor Detail
                             </h2>
                         </div>
                         <div class="card-body">

                             <?php   
								       $venddetailfetch = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `vendors` WHERE `id` = '$enqdetail[vendor_id]' "));
								     ?>

                             <table style='width:100%; border-collapse: collapse; font-size:14px'>
                                 <tr>
                                     <td style='padding: 6px 0px;  text-transform:capitalize;'>
                                         <b>Vendor Name</b>
                                         </br>
                                         <?php echo (!empty($venddetailfetch['name']))?  $venddetailfetch['name']:"Not Available" ?>

                                     </td>
                                 </tr>
                                 <tr>
                                     <td style='padding: 6px 0px;  text-transform:capitalize;'>
                                         <b>Vendor Email</b>
                                         </br>
                                         <?php echo (!empty($venddetailfetch['email']))?  $venddetailfetch['email']:"Not Available" ?>

                                     </td>
                                 </tr>
                                 <tr>
                                     <td style='padding: 6px 0px;  text-transform:capitalize;'>
                                         <b>Vendor Mobile No.</b>
                                         </br>
                                         <?php echo (!empty($venddetailfetch['mobileno']))?  $venddetailfetch['mobileno']:"Not Available" ?>

                                     </td>
                                 </tr>
                             </table>




                         </div>
                     </div>
                     <?php  }?>
                 </div>

                 <div class="col-3 mb-3">
                     <?php 
								       if($enqdetail['status'] == 'Complete'){ ?>
                     <div class="card card-modern card-modern-table-over-header">
                         <div class="card-header">
                             <!-- <div class="card-actions">
                                 <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                             </div> -->
                             <h2 class="card-title">Agent Detail
                             </h2>
                         </div>
                         <div class="card-body">

                             <?php  
								        $agentdetailfetch = mysqli_fetch_assoc(mysqli_query($con,"SELECT * FROM `ajents` WHERE `id` = '$enqdetail[ajentid]' "));
								    ?>

                             <table style='width:100%; border-collapse: collapse; font-size:14px'>
                                 <tr>
                                     <td style='padding: 6px 0px;  text-transform:capitalize;'>
                                         <b>Agent Name</b>
                                         </br>
                                         <?php echo (!empty($agentdetailfetch['ajentname']))?  $agentdetailfetch['ajentname']:"Not Available" ?>

                                     </td>
                                     <!-- <td style='padding: 6px 0px; text-transform:capitalize;'>
                                         : &nbsp;
                                         <?php echo (!empty($agentdetailfetch['ajentname']))?  $agentdetailfetch['ajentname']:"Not Available" ?>
                                     </td> -->
                                 </tr>
                                 <tr>
                                     <td style='padding: 6px 0px;  text-transform:capitalize;'>
                                         <b>Agent Email</b>
                                         </br>
                                         <?php echo (!empty($agentdetailfetch['email']))?  $agentdetailfetch['email']:"Not Available" ?>
                                     </td>
                                     <!-- <td style='padding: 6px 0px; text-transform:capitalize;'>
                                         : &nbsp;
                                         <?php echo (!empty($agentdetailfetch['email']))?  $agentdetailfetch['email']:"Not Available" ?>
                                     </td> -->
                                 </tr>
                                 <tr>
                                     <td style='padding: 6px 0px;  text-transform:capitalize;'>
                                         <b>Agent Mobile No.</b>
                                         </br>
                                         <?php echo (!empty($agentdetailfetch['phone']))?  $agentdetailfetch['phone']:"Not Available" ?>
                                     </td>
                                     <!-- <td style='padding: 6px 0px; text-transform:capitalize;'>
                                         : &nbsp;
                                         <?php echo (!empty($agentdetailfetch['phone']))?  $agentdetailfetch['phone']:"Not Available" ?>
                                     </td> -->
                                 </tr>
                             </table>


                         </div>
                     </div>
                     <?php  }?>
                 </div>

                 <div class="col-12 mb-3">
                     <div class="card card-modern card-modern-table-over-header">
                         <div class="card-header">
                             <div class="card-actions">
                                 <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                             </div>
                             <h2 class="card-title">Customer Information
                             </h2>
                         </div>
                         <div class="card-body">
                             <div class="row">

                                 <div class="col-12">
                                     <div class="row">

                                         <div class="col-6">

                                             <h3 class="mb-1"><b>Name:</b>
                                                 <span style="color:#000">
                                                     <?php echo !empty($customerName)?$customerName:"Not Available" ?></span>
                                             </h3>
                                         </div>


                                         <div class="col-6">

                                             <h3 class="mb-1"><b>Mobile:</b>
                                                 <span style="color:#000">
                                                     <?php echo (!empty($customerMobile))?  $customerMobile:"Not Available" ?></span>
                                             </h3>
                                         </div>
                                     </div>
                                 </div>
                                 <div class="col-6">
                                     <h3> Address :</h3>
                                     <?php 
												if($addressdetail != null){
                                                 ?>
                                     <p class="mb-1"><b>Loation:</b>
                                         <?php echo (!empty($addressdetail['location']))?  $addressdetail['location']:"Not Available" ?>
                                     </p>
                                     <p class="mb-1"><b>Flat/Office/floor:</b>
                                         <?php echo (!empty($addressdetail['flatno']))?  $addressdetail['flatno']:"Not Available" ?>
                                     </p>
                                     <p class="mb-1"><b>Land Mark:</b>
                                         <?php echo (!empty($addressdetail['landmark']))?  $addressdetail['landmark']:"Not Available" ?>
                                     </p>
                                     <p class="mb-1"><b>Pincode:</b>
                                         <?php echo (!empty($addressdetail['pincode']))?  $addressdetail['pincode']:"Not Available" ?>
                                     </p>
                                     <p class="mb-1"><b>City:</b>
                                         <?php echo (!empty($addressdetail['city']))?  $addressdetail['city']:"Not Available" ?>
                                     </p>
                                     <p class="mb-1"><b>State:</b>
                                         <?php echo (!empty($addressdetail['state']))?  $addressdetail['state']:"Not Available" ?>
                                     </p>
                                     <p class="mb-1"><b>Address Type:</b>
                                         <?php echo (!empty($addressdetail['addtype']))?  $addressdetail['addtype']:"Not Available" ?>
                                     </p>
                                     <?php  
											  }else{
                                                echo "No Address Found On this Lead Please Contact Customer. ";
                                              }
										    ?>


                                     <h3>Account Detail :</h3>
                                     <?php
											  if($accountdetail != null){
                                              if($accountdetail['accountno']  != null && $accountdetail['beneficiarname'] && $accountdetail['ifsc'] && $accountdetail['bankname']){
                                              ?>
                                     <p class="mb-1"><b>Account no:</b> <?php echo $accountdetail['accountno'] ?></p>
                                     <p class="mb-1"><b>Beneficiary Name:</b>
                                         <?php echo $accountdetail['beneficiarname'] ?></p>
                                     <p class="mb-1"><b>IFSC Code:</b> <?php echo $accountdetail['ifsc'] ?></p>
                                     <p class="mb-1"><b>BANK NAME:</b> <?php echo $accountdetail['bankname'] ?></p>
                                     <?php
                                                    }elseif($accountdetail['upi'] != null){
                                                    ?>

                                     <p><b>UPI ID:</b> <?php echo $accountdetail['upi'] ?></p>

                                     <?php
                                                      }elseif($accountdetail['paytm']!= null){
													 ?>
                                     <p><b>Paytm No:</b> <?php echo $accountdetail['paytm'] ?></p>
                                     <?php
														  }
													    }else{
														 echo "<td>No Account Detail Add Please Contact Customer.</td>";
													 }
											    ?>


                                 </div>
                                 <div class="col-3">
                                     <h3>Aadhar Front Photo :</h3>
                                     <div
                                         style="width:100% ;box-shadow: 0px 0px 30px -20px rgba(0, 0, 0, 0.4); min-height:300px; border-radius:8px;">

                                         <?php if(!empty($enqdetail['aadharfront']) && $enqdetail['aadharfront']!=null){ ?>
                                         <img src="img/mobileimages/<?= $enqdetail['aadharfront']  ?>" class="img-fluid"
                                             style="width:100% ;border-radius:8px;" />

                                         <?php }  else{
                                                   echo  "Not Available";
                                           
                                     }  ?>
                                     </div>

                                 </div>
                                 <div class="col-3">
                                     <h3>Aadhar Back Photo :</h3>
                                     <div
                                         style="width:100% ;box-shadow: 0px 0px 30px -20px rgba(0, 0, 0, 0.4); min-height:300px; border-radius:8px;">

                                         <?php if(!empty($enqdetail['aadharback']) && $enqdetail['aadharback']!=null){ ?>
                                         <img src="img/mobileimages/<?= $enqdetail['aadharback']  ?>" class="img-fluid"
                                             style="width:100% ;border-radius:8px;" />

                                         <?php }  else{
                                                   echo  "Not Available";
                                           
                                     }  ?>
                                     </div>
                                 </div>
                             </div>
                         </div>
                     </div>
                 </div>


                 <?php if ($enqdetail['status'] == 'Complete') { ?>
                 <div class="col-12 mb-3">
                     <div class="card card-modern card-modern-table-over-header">
                         <div class="card-header">
                             <div class="card-actions">
                                 <a href="#" class="card-action card-action-toggle" data-card-toggle></a>
                             </div>
                             <h2 class="card-title">Device Photos</h2>
                         </div>
                         <div class="card-body">
                             <div class="row">
                                 <?php displayImage($enqdetail['pic1']); ?>
                                 <?php displayImage($enqdetail['pic2']); ?>
                                 <?php displayImage($enqdetail['pic3']); ?>
                                 <?php displayImage($enqdetail['pic4']); ?>
                             </div>
                         </div>
                     </div>
                 </div>
                 <?php } ?>

                 <?php
                        function displayImage($image)
                        {
                            if (!empty($image)) {
                        ?>
                 <div class="col-3">
                     <div
                         style="width:100%; box-shadow: 0px 0px 30px -20px rgba(0, 0, 0, 0.4); min-height:300px; border-radius:8px;">
                         <img src="img/mobileimages/<?= $image ?>" class="img-fluid"
                             style="width:100%; border-radius:8px;" />
                     </div>
                 </div>
                 <?php
                            }
                        }
                        ?>

                 <div class="col-12 mb-3">
                     <div class="row mt-3">


                         <div class="col-4 mb-3">

                             <div class="card card-modern card-modern-table-over-header">
                                 <div class="card-header">

                                     <h2 class="card-title">IF YOUR MOBILE UNDER WARRANTY?</h2>
                                 </div>

                                 <div class="card-body">
                                     <div class="row">

                                         <div class="col-12">

                                             <?php  
               
                              echo "<table style='width:100%; border-collapse: collapse;'>"; // start table
                           if (!empty($enqdetail['warenty']) && trim($enqdetail['warenty']) != "out of Warranty" &&  trim($enqdetail['warenty']) !="Mobile Out of Warranty")  {
                            // if( "Out Of Warranty")
                            // echo $enqdetail['warenty'];
                            // echo   "<br/>";
                                echo "<tr><td style='padding: 8px;  text-transform:capitalize;'><b>Mobile Warranty</b></td><td style='padding: 8px;  text-transform:capitalize;' class='text-success'><b>{$enqdetail['warenty']}</b></td></tr>";
                            } else{
                                echo "<tr><td style='padding: 8px;  text-transform:capitalize;'><b>Mobile Warranty</b></td><td style='padding: 8px; text-transform:capitalize;' class='text-danger'><b>Out Of Warranty</b></td></tr>";
                            }
                          echo "</table>"; // end table
                       
                       ?>

                                         </div>
                                     </div>
                                 </div>
                             </div>

                             <div class="card card-modern card-modern-table-over-header">
                                 <div class="card-header">

                                     <h2 class="card-title">MOBILE AGE</h2>
                                 </div>

                                 <div class="card-body">
                                     <div class="row">

                                         <div class="col-12">

                                             <?php  
                            //            echo $enqdetail['age'];
                            // echo   "<br/>";
                                    echo "<table style='width:100%; border-collapse: collapse;'>"; // start table
                                                if (!empty($enqdetail['age']) && trim($enqdetail['age'])!="Above 11 Months") {
                                    echo "<tr><td style='padding: 8px;  text-transform:capitalize;'><b>Mobile Age</b></td><td style='padding: 8px; text-transform:capitalize;' class='text-success'><b>{$enqdetail['age']}</b></td></tr>";
                                } else{
                                    echo "<tr><td style='padding: 8px;  text-transform:capitalize;'><b>Mobile Age</b></td><td style='padding: 8px; text-transform:capitalize;' class='text-danger'><b>Above 11 Months</b></td></tr>";
                                }
                                echo "</table>"; // end table
                                            
                                            ?>

                                         </div>
                                     </div>
                                 </div>
                             </div>

                             <div class="card card-modern card-modern-table-over-header">
                                 <div class="card-header">

                                     <h2 class="card-title">SCREEN CONDITIONS</h2>
                                 </div>

                                 <div class="card-body">
                                     <div class="row">

                                         <div class="col-12">

                                             <?php
                                                //  'offerprice', 'extraamount', 'customerprice','failreason', 'modify_date', 'status', 'emino'
                                                // 'callvalue', 'warenty', 'age', 'touchscreen', 'screenspot', 'screenlines', 
                                                // 'screenphysicalcondition', 'bodyscratches', 'bodydents', 'sidebackpanel', 
                                                // 'bodybents', 'charger', 'earphone', 'boximei', 'billimei', 'front_camera', 
                                                // 'back_camera', 'volume', 'speaker', 'power_btn', 'face_sensor', 
                                                // 'charging_port', 'audio_receiver', 'camera_glass', 'wifi', 'silent_btn', 
                                                // 'battery', 'bluetooth', 'vibrator', 'microphone', 'conditions', 
                                                // 'connectivity', 'physicalissue', 'cable', 'switchof',		
                                                // $fields = [
                                                //     'callvalue', 'warenty', 'age', 
                                                //     'touchscreen', 'screenspot', 'screenlines', 'screenphysicalcondition', 'bodyscratches', 
                                                //     'bodydents', 'sidebackpanel', 'bodybents', 'charger', 'earphone', 'boximei', 'billimei', 
                                                //     'copydisplay', 'front_camera', 'back_camera', 'volume', 'finger_touch', 'speaker', 'power_btn', 
                                                //     'face_sensor', 'charging_port', 'audio_receiver', 'camera_glass', 'wifi', 'silent_btn', 'battery', 
                                                //     'bluetooth', 'vibrator', 'microphone', 'switchof', 'magnetic', 'digitalcrown', 'opticalheart', 'stap', 
                                                //     'pencil', 'conditions', 'pcondition', 'sidebutton', 'gps', 'connectivity', 'physicalissue', 'cable', 
                                                 
                                                $fieldObjects = [
                                                    (object) ['code' => 'touchscreen', 'name' => 'Touch Screen', 'value'=>'Touch Working'],
                                                    (object)  ['code' => 'screenspot', 'name' => 'Screen Spot', 'value'=>'No spots on screen'],
                                                    (object)  ['code' => 'screenlines', 'name' => 'Screen Lines', 'value'=>'No line(s) on Display'],
                                                    (object)  ['code' => 'screenphysicalcondition', 'name' => 'Screen Physical Condition', 'value'=>'No scratches on screen']
                                                ];
                                                
                                                echo "<table style='width:100%; border-collapse: collapse;'>"; // start table
                                              
                                                foreach ($fieldObjects as $field) {
                                                    if (isset($enqdetail[$field->code]) && !empty($enqdetail[$field->code]) && $enqdetail[$field->code] !== "") {
                                                        if (trim($enqdetail[$field->code]) === "Touch Working" || 
                                                        trim($enqdetail[$field->code]) === "No spots on screen" || 
                                                        trim($enqdetail[$field->code]) === "No line(s) on Display" || 
                                                        trim($enqdetail[$field->code]) === "No scratches on screen") {
                                                                
                                                            echo "<tr>
                                                                    <td style='padding: 8px; text-transform:capitalize;'><b>{$field->name}</b></td>
                                                                    <td style='padding: 8px; text-transform:capitalize;' class='text-success'><b>{$enqdetail[$field->code]}</b></td>
                                                                  </tr>";
                                                        } else {
                                                            echo "<tr>
                                                                    <td style='padding: 8px; text-transform:capitalize;'><b>{$field->name}</b></td>
                                                                    <td style='padding: 8px; text-transform:capitalize;' class='text-danger'><b>{$enqdetail[$field->code]}</b></td>
                                                                  </tr>";
                                                        }
                                                    } else {
                                                        echo "<tr>
                                                                <td style='padding: 8px; text-transform:capitalize;'><b>{$field->name}</b></td>
                                                                <td style='padding: 8px; text-transform:capitalize;' class='text-success'><b>{$field->value}</b></td>
                                                              </tr>";
                                                    }
                                                }
                                                echo "</table>"; // end table
                                                ?>


                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>
                         <div class="col-4 mb-3">
                             <div class="card card-modern card-modern-table-over-header">
                                 <div class="card-header">

                                     <h2 class="card-title">DO YOU HAVE THE FOLLOWING</h2>
                                 </div>

                                 <div class="card-body">
                                     <div class="row">

                                         <div class="col-12">

                                             <?php 
                                                $fields = [  'charger', 'earphone', 'boximei', 'billimei'];
                                                
                                                $fieldObjects = [
                                                    (object) ['code' => 'charger', 'name' => 'Charger'],
                                                    (object)  ['code' => 'earphone', 'name' => 'Earphone'],
                                                    (object)  ['code' => 'boximei', 'name' => 'Box'],
                                                    (object)  ['code' => 'billimei', 'name' => 'Valid Bill']
                                                ];
                                                echo "<table style='width:100%; border-collapse: collapse;'>"; // start table
                                                // echo "<tr><th>Field</th><th>Value</th></tr>"; // table header
                                                // $fieldObjects = array_map(function($field) {
                                                //     // Remove underscores and capitalize each word for the name
                                                //     $name =  str_replace('_', ' ', $field);
                                                //     return (object) ['code' => $field, 'name' => $name];
                                                // }, $fields);
                                                foreach ($fieldObjects as $field) {
                                                    if (!empty($enqdetail[$field->code])) {
                                                        // $displayField = ucwords(str_replace('_', ' ', $field));

                            //            echo $enqdetail[$field->code];
                            // echo   "<br/>";
                                                        echo "<tr><td style='padding: 8px;  text-transform:capitalize;'><b>{$field->name}</b></td><td style='padding: 8px; text-transform:capitalize;' class='text-success'><b>Available</b></td></tr>";
                                                    } else{
                                                        echo "<tr><td style='padding: 8px;  text-transform:capitalize;'><b>{$field->name}</b></td><td style='padding: 8px; text-transform:capitalize;' class='text-danger'><b>Not Available</b></td></tr>";
                                                       
                                                    }
                                                }

                                                echo "</table>"; // end table

                                                ?>

                                         </div>
                                     </div>
                                 </div>
                             </div>

                             <div class="card card-modern card-modern-table-over-header">
                                 <div class="card-header">

                                     <h2 class="card-title">PHONE'S OVERALL CONDITIONS</h2>
                                 </div>

                                 <div class="card-body">
                                     <div class="row">

                                         <div class="col-12">

                                             <?php  
                                                $fieldObjects = [
                                                    (object) ['code' => 'bodyscratches', 'name' => 'Body Scratches','value'=>'No scratches'],
                                                    (object)  ['code' => 'bodydents', 'name' => 'Body Dents','value'=>'No dents'],
                                                    (object)  ['code' => 'sidebackpanel', 'name' => 'Side Back Panel','value'=>'No defect on side or back panel'],
                                                    (object)  ['code' => 'bodybents', 'name' => 'Body Bents','value'=>'Phone not bent']
                                                ]; 
                                                echo "<table style='width:100%; border-collapse: collapse;'>"; // start table
                                               
                                                foreach ($fieldObjects as $field) {
                                                    if (isset($enqdetail[$field->code]) && !empty($enqdetail[$field->code]) &&  $enqdetail[$field->code] !== "") {
                                                        if (trim($enqdetail[$field->code]) === "No scratches" || 
                                                        trim($enqdetail[$field->code]) === "No dents" || 
                                                        trim($enqdetail[$field->code]) === "No defect on side or back panel" || 
                                                        trim($enqdetail[$field->code]) === "Phone not bent") {
                                                                
                                                            echo "<tr>
                                                                    <td style='padding: 8px; text-transform:capitalize;'><b>{$field->name}</b></td>
                                                                    <td style='padding: 8px; text-transform:capitalize;' class='text-success'><b>{$enqdetail[$field->code]}</b></td>
                                                                  </tr>";
                                                        } else {
                                                            echo "<tr>
                                                                    <td style='padding: 8px; text-transform:capitalize;'><b>{$field->name}</b></td>
                                                                    <td style='padding: 8px; text-transform:capitalize;' class='text-danger'><b>{$enqdetail[$field->code]}</b></td>
                                                                  </tr>";
                                                        }
                                                    } else {
                                                        echo "<tr>
                                                                <td style='padding: 8px; text-transform:capitalize;'><b>{$field->name}</b></td>
                                                                <td style='padding: 8px; text-transform:capitalize;' class='text-success'><b>{$field->value}</b></td>
                                                              </tr>";
                                                    }
                                                }

                                                echo "</table>"; // end table

                                                ?>

                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>

                         <div class="col-4">
                             <div class="card card-modern card-modern-table-over-header">
                                 <div class="card-header">

                                     <h2 class="card-title">FUNCTIONAL PROBLEM'S</h2>
                                 </div>

                                 <div class="card-body">
                                     <div class="row">

                                         <div class="col-12">

                                             <?php  
                                                // $fieldObjects = [
                                                //     (object) ['code' => 'bodyscratches', 'name' => 'Body Scratches','value'=>'No scratches'],
                                                //     (object)  ['code' => 'bodydents', 'name' => 'Body Dents','value'=>'No dents'],
                                                //     (object)  ['code' => 'sidebackpanel', 'name' => 'Side Back Panel','value'=>'No defect on side or back panel'],
                                                //     (object)  ['code' => 'bodybents', 'name' => 'Body Bents','value'=>'Phone not bent']
                                                // ]; 
                                                $fields = [ 
                                                    'copydisplay', 'front_camera', 'back_camera', 'volume', 'finger_touch', 'speaker', 'power_btn', 
                                                    'charging_port', 'face_sensor',   'audio_receiver', 'camera_glass', 'wifi', 'silent_btn', 'battery', 
                                                    'bluetooth', 'vibrator', 'microphone',  
                                                ];
                                                echo "<table style='width:100%; border-collapse: collapse;'>"; // start table
                                                // echo "<tr><th>Field</th><th>Value</th></tr>"; // table header
                                                $fieldObjects = array_map(function($field) {
                                                    // Remove underscores and capitalize each word for the name
                                                    $name =  str_replace('_', ' ', $field);
                                                    return (object) ['code' => $field, 'name' => $name];
                                                }, $fields);
                                                foreach ($fieldObjects as $field) {
                                                    if (!empty($enqdetail[$field->code])) {
                                               
                                                            if( trim($enqdetail[$field->code])==="no copy display" ){
                                                                echo "<tr><td style='padding: 8px;  text-transform:capitalize;'><b>{$field->name}</b></td><td style='padding: 8px; text-transform:capitalize;' class='text-success'><b>Orignal display</b></td></tr>";         
                                                            } else{
                                                                echo "<tr><td style='padding: 8px;  text-transform:capitalize;'><b>{$field->name}</b></td><td style='padding: 8px; text-transform:capitalize;' class='text-danger'><b>Not Working</b></td></tr>";                                                                         
                                                            }
                                                     } else{
                                                        
                                                        if( $field->code=== "copydisplay"){
                                                            echo "<tr><td style='padding: 8px;  text-transform:capitalize;'><b>{$field->name}</b></td><td style='padding: 8px; text-transform:capitalize;' class='text-success'><b>Orignal display</b></td></tr>";         
                                                        } else{
                                                            echo "<tr><td style='padding: 8px;  text-transform:capitalize;'><b>{$field->name}</b></td><td style='padding: 8px; text-transform:capitalize;' class='text-success'><b>Working</b></td></tr>";
                                                        }
                                                    }
                                                }

                                                echo "</table>"; // end table

                                                ?>

                                         </div>
                                     </div>
                                 </div>
                             </div>
                         </div>

                     </div>
                 </div>
             </div>
             <!-- end: page -->
 </section>
 <section style="height:600px">
     <!-- lead assigning start -->
     <div class="col">
         <div class="card card-modern card-modern-table-over-header">
             <form method="post">
                 <div class="row">
                     <div class="col-4">
                         <input name="leadpin" id="leadpin" class="search-term form-control"
                             value="<?php echo $pincodeforv ?>" type="text" readonly>
                     </div>
                     <div class="col-4">
                         <select class="search-term form-control" name="vendors" id="vendors">
                         </select>
                     </div>
                     <div class="col-4">
                         <input class="search-term form-control btn-primary" type="submit" name="assignlead"
                             value="Assign Lead">
                     </div>
                 </div>
             </form>
         </div>
     </div>
     <!-- lead assigning end -->
 </section>
 </div>

 <aside id="sidebar-right" class="sidebar-right">
     <div class="nano">
         <div class="nano-content">
             <a href="#" class="mobile-close d-md-none">
                 Collapse <i class="fas fa-chevron-right"></i>
             </a>

             <div class="sidebar-right-wrapper">

                 <div class="sidebar-widget widget-calendar">
                     <h6>Upcoming Tasks</h6>
                     <div data-plugin-datepicker data-plugin-skin="dark"></div>

                     <ul>
                         <li>
                             <time datetime="2017-04-19T00:00+00:00">04/19/2017</time>
                             <span>Company Meeting</span>
                         </li>
                     </ul>
                 </div>

                 <div class="sidebar-widget widget-friends">
                     <h6>Friends</h6>
                     <ul>
                         <li class="status-online">
                             <figure class="profile-picture">
                                 <img src="img/%21sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
                             </figure>
                             <div class="profile-info">
                                 <span class="name">Joseph Doe Junior</span>
                                 <span class="title">Hey, how are you?</span>
                             </div>
                         </li>
                         <li class="status-online">
                             <figure class="profile-picture">
                                 <img src="img/%21sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
                             </figure>
                             <div class="profile-info">
                                 <span class="name">Joseph Doe Junior</span>
                                 <span class="title">Hey, how are you?</span>
                             </div>
                         </li>
                         <li class="status-offline">
                             <figure class="profile-picture">
                                 <img src="img/%21sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
                             </figure>
                             <div class="profile-info">
                                 <span class="name">Joseph Doe Junior</span>
                                 <span class="title">Hey, how are you?</span>
                             </div>
                         </li>
                         <li class="status-offline">
                             <figure class="profile-picture">
                                 <img src="img/%21sample-user.jpg" alt="Joseph Doe" class="rounded-circle">
                             </figure>
                             <div class="profile-info">
                                 <span class="name">Joseph Doe Junior</span>
                                 <span class="title">Hey, how are you?</span>
                             </div>
                         </li>
                     </ul>
                 </div>

             </div>
         </div>
     </div>
 </aside>

 </section>

 <!-- Vendor -->
 <script src="vendor/jquery/jquery.js"></script>
 <script src="vendor/jquery-browser-mobile/jquery.browser.mobile.js"></script>
 <script src="vendor/jquery-cookie/jquery.cookie.js"></script>
 <script src="master/style-switcher/style.switcher.js"></script>
 <script src="vendor/popper/umd/popper.min.js"></script>
 <script src="vendor/bootstrap/js/bootstrap.js"></script>
 <script src="vendor/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
 <script src="vendor/common/common.js"></script>
 <script src="vendor/nanoscroller/nanoscroller.js"></script>
 <script src="vendor/magnific-popup/jquery.magnific-popup.js"></script>
 <script src="vendor/jquery-placeholder/jquery.placeholder.js"></script>

 <!-- Specific Page Vendor -->
 <script src="vendor/raphael/raphael.js"></script>
 <script src="vendor/morris/morris.js"></script>
 <script src="vendor/datatables/media/js/jquery.dataTables.min.js"></script>
 <script src="vendor/datatables/media/js/dataTables.bootstrap4.min.js"></script>


 <!--(remove-empty-lines-end)-->

 <!-- Theme Base, Components and Settings -->
 <script src="js/theme.js"></script>

 <!-- Theme Custom -->
 <script src="js/custom.js"></script>

 <!-- Theme Initialization Files -->
 <script src="js/theme.init.js"></script>
 <!-- Analytics to Track Preview Website -->
 <script>
(function(i, s, o, g, r, a, m) {
    i['GoogleAnalyticsObject'] = r;
    i[r] = i[r] || function() {
        (i[r].q = i[r].q || []).push(arguments)
    }, i[r].l = 1 * new Date();
    a = s.createElement(o), m = s.getElementsByTagName(o)[0];
    a.async = 1;
    a.src = g;
    m.parentNode.insertBefore(a, m)
})(window, document, 'script', '../../../www.google-analytics.com/analytics.js', 'ga');
ga('create', 'UA-42715764-8', 'auto');
ga('send', 'pageview');
 </script>
 <!-- Examples -->
 <script src="js/examples/examples.header.menu.js"></script>
 <script src="js/examples/examples.ecommerce.dashboard.js"></script>
 <script src="js/examples/examples.ecommerce.datatables.list.js"></script>
 <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
 <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"></script>
 <script type="text/javascript">
$(document).ready(function() {
    $('#datatable-ecommerce-list').DataTable({
        dom: 'Bfrtip',
        buttons: [{
            extend: 'csv',
            className: 'btn btn-primary px-3 mx-1 '
        }, {
            extend: 'excel',
            className: 'btn btn-primary px-3 mx-1 '
        }, {
            extend: 'pdf',
            className: 'btn btn-primary px-3 mx-1'
        }]
    });
});
 </script>
 </body>
 </html>

 <script>
$(document).ready(function() {
    var pinno = $('#leadpin').val();
    $.ajax({
        method: "post",
        url: "checkvendors.php",
        data: {
            pinno: pinno
        },
        dataType: "html",
        success: function(result) {
            $('#vendors').html(result);
        }
    })
});
 </script>

 <script type="text/javascript">
$(document).ready(function() {
    $('#vendors').multiselect();
});
 </script>