<!-- header and slider start -->
<?php include 'includes/header.php' ?>
<?php include 'includes/sidebar.php' ?>
<!-- header and slider end  -->
<?php
			// "Category ID": '',0
			// "Brand Name": '',1
			// "Brand Image": "",2
			// "Call Not Recieve": '',3
			// "Below 3 Months": '',4
			// "3-6 Months": '',5
			// "6-11 Months": '',6
			// "Above 11 Months": '',7
			// "Touch screen": '',8
			// "Large spots": '',9
			// "Multiple spots": '',10
			// "Minor spots": '',11
			// "No spots": '',12
			// "Display faded": '',13
			// "Multiple lines": '',14
			// "No lines": '',15
			// "Screen cracked": '',16
			// "Damaged screen": '',17
			// "Heavy scratches": '',18
			// "1-2 scratches": '',19
			// "No scratches": '',20
			// "Major scratches": '',21
			// "Less than 2 scratches": '',22
			// "No scratches": '',23
			// "Multiple/heavy dents": '',24
			// "Less than 2 dents": '',25
			// "No dents": '',26
			// "Cracked/ broken side or back panel": '',27
			// "Missing side or back panel": '',28
			// "No defect on side or back panel": '',29
			// "Bent/ curved panel": '',30
			// "Loose screen (Gap in screen and body)": '',31
			// "No Bents": '',32
			// "Orignal Charger": '',33
			// "Original Earphones": '',34
			// "Box with same IMEI": '',35
			// "Bill with same IMEI": '',36
		 
		if(isset($_POST['uploadcsv']))
		  {
			$filename = $_FILES['csvfile']['tmp_name'];
			if($_FILES['csvfile']['size'] > 0)
			{
				$file = fopen($filename, 'r');
				// Read the header to handle column names
				$header = fgetcsv($file, 1000, ',');
			 
				while(($getdata = fgetcsv($file, 1000, ",")) !== FALSE)
				{    
 
					if(isset($getdata) && isset($getdata[0]) && isset($getdata[1])){
						$categoryId = (int)$getdata[0];
						 
						$name =(string)$getdata[1]; 
						$image = $getdata[2];
						$callvalue = $getdata[3];
						$threemonths = $getdata[4];
						$threeto6months = $getdata[5];
						$sixto11months = $getdata[6];
						$above11 = $getdata[7];

						$touchscreen = $getdata[8];
						$largespot = $getdata[9];
						$multiplespot = $getdata[10];
						$minorspot = $getdata[11];
						$nospot = $getdata[12];
						$displayfade = $getdata[13];
						$multilines = $getdata[14];
						$nolines = $getdata[15];
						$crackedscreen = $getdata[16];
						$damegescreen = $getdata[17];
						$heavyscracthes = $getdata[18];
						$scratches12 = $getdata[19];
						$noscratches = $getdata[20];
						// body questions starts
						$majorscratch = $getdata[21];
						
						$bodyscratches2 = $getdata[22];
						$nobodysratches = $getdata[23];
						$heavydents = $getdata[24];
						$dents2 = $getdata[25];
						$nodents = $getdata[26];
						$crackedsideback = $getdata[27];
						$missingsideback = $getdata[28];
						$nodefectssideback = $getdata[29];
						$bentcurvedpanel = $getdata[30];
						$loosescreen = $getdata[31];
						$nobents = $getdata[32];
						// accessries questions
						$charger = $getdata[33];
						$earphone = $getdata[34];
						$boximei = $getdata[35];
						$billimei = $getdata[36];

						$query = mysqli_query($con,"INSERT INTO `subcategory` (`category_id`,`subcategory_name`,`subcategory_image`,`callvalue`,`3months`,`3to6months`,`6to11months`,
						`above11`,`touchscreen`,`largespot`,`multiplespot`,`minorspot`,`nospot`,`displayfade`,`multilines`,`nolines`,`crackedscreen`,`damegescreen`,`heavyscracthes`,
						`12scratches`,`noscratches`,`majorscratch`,`2bodyscratches`,`nobodysratches`,`heavydents`,`2dents`,`nodents`,`crackedsideback`,`missingsideback`,`nodefectssideback`,`bentcurvedpanel`,
						`loosescreen`,`nobents`,`charger`,`earphone`,`boximei`,`billimei`)
						 values('$categoryId','$name','$image','$callvalue','$threemonths','$threeto6months','$sixto11months','$above11','$touchscreen','$largespot','$multiplespot','$minorspot','$nospot',
						 '$displayfade','$multilines','$nolines','$crackedscreen','$damegescreen','$heavyscracthes','$scratches12','$noscratches','$majorscratch','$bodyscratches2','$nobodysratches','$heavydents',
						 '$dents2','$nodents','$crackedsideback','$missingsideback','$nodefectssideback','$bentcurvedpanel','$loosescreen','$nobents','$charger','$earphone','$boximei','$billimei') ");
					}					
				}
				if($query)
				{
					echo "<script> alert('Brand upload successfully');
					window.location.href = 'subcategory-list.php';
					</script>";
				}
				else
				{
					echo "<script> alert('Brand upload failed');
					window.location.href = 'subcategory-list.php';
					</script>";	
				}
			}
		} 
      ?>
<section role="main" class="content-body content-body-modern mt-0">
    <header class="page-header page-header-left-inline-breadcrumb">
        <h2 class="font-weight-bold text-6">Brand Name</h2>
        <div class="right-wrapper">
            <ol class="breadcrumbs">
                <li><span>Home</span></li>
                <li><span>eCommerce</span></li>
                <li><span>Brand</span></li>
            </ol>
            <a class="sidebar-right-toggle" data-open="sidebar-right"><i class="fas fa-chevron-left"></i></a>
        </div>
    </header>

    <div class="row action-buttons my-3">
        <div class="col-12 col-md-auto   ">

            <a href="subcategory.php"
                class="cancel-button btn btn-light btn-px-4 my-3 border font-weight-semibold text-color-dark text-3">Upload
                Brand</a>
        </div>
        <div class="col-12 col-md-auto px-0  ">
            <a href="#"
                class="cancel-button btn btn-primary btn-px-4 my-3 border font-weight-semibold text-color-dark text-3">Import
                CSV</a>
        </div>
    </div>

    <!-- start: page -->
    <div class="row pt-0">
        <div class="col">
            <section class="card card-modern card-big-info">
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-2-5 col-xl-1-5 text-center">
                            <i class="card-big-info-icon bx bx-box"></i>
                            <h2 class="card-big-info-title">Import CSV</h2>
                            <p class="card-big-info-desc">Upload here the brand with all details.</p>

                        </div>
                        <div class="col-lg-3-5 col-xl-4-5">
                            <div class="form-group row align-items-end  py-2 text-lg-right ">
                                <div class=" col-12 float-right">
                                    <button class="btn btn-light  " onclick="downloadCSV(demoCSV)">Sample
                                        CSV</button>
                                </div>
                            </div>
                            <form action="#" enctype="multipart/form-data" method="POST">

                                <div class="form-group row align-items-center  py-5">
                                    <label class="col-lg-4 col-xl-3 control-label text-lg-right mb-0">CSV
                                        File</label>
                                    <div class="col-lg-6 col-xl-6">

                                        <input type="file" class="form form-control" name="csvfile" required>

                                    </div>

                                    <div class="col-lg-2 col-xl-3">
                                        <input type="submit" class="btn btn-primary" value="upload" name="uploadcsv">
                                    </div>
                                </div>
                                <!-- <div class="row">
                                     <div class="col-8">
                                         <input type="file" class="form form-control" name="csvfile" required>
                                     </div>
                                     <div class="col-4">
                                         <input type="submit" class="btn btn-primary" value="upload" name="uploadcsv">
                                     </div>
                                 </div> -->
                            </form>


                        </div>
                    </div>
                </div>
            </section>
        </div>
    </div>

    <!-- end: page -->

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
<script src="vendor/jquery-validation/jquery.validate.js"></script>
<script src="vendor/dropzone/dropzone.js"></script>
<script src="vendor/pnotify/pnotify.custom.js"></script>


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
<script src="js/examples/examples.ecommerce.form.js"></script>

<script>
var demoCSV = [{
    "Category ID": '',
    "Brand Name": '',
    "Brand Image": "",
    "Call Not Recieve": '',
    "Below 3 Months": '',
    "3-6 Months": '',
    "6-11 Months": '',
    "Above 11 Months": '',
    "Touch screen": '',
    "Large spots": '',
    "Multiple spots": '',
    "Minor spots": '',
    "No spots": '',
    "Display faded": '',
    "Multiple lines": '',
    "No lines": '',
    "Screen cracked": '',
    "Damaged screen": '',
    "Heavy scratches": '',
    "1-2 scratches": '',
    "No scratches": '',
    "Major scratches": '',
    "Less than 2 scratches": '',
    "No scratches": '',
    "Multiple/heavy dents": '',
    "Less than 2 dents": '',
    "No dents": '',
    "Cracked/ broken side or back panel": '',
    "Missing side or back panel": '',
    "No defect on side or back panel": '',
    "Bent/ curved panel": '',
    "Loose screen (Gap in screen and body)": '',
    "No Bents": '',
    "Orignal Charger": '',
    "Original Earphones": '',
    "Box with same IMEI": '',
    "Bill with same IMEI": '',
}]

function createCSV(array) {
    var keys = Object.keys(array[0]); //Collects Table Headers

    var result = ''; //CSV Contents
    result += keys.join(','); //Comma Seperates Headers
    result += '\n'; //New Row

    array.forEach(function(item) { //Goes Through Each Array Object
        keys.forEach(function(key) { //Goes Through Each Object value
            result += item[key] + ','; //Comma Seperates Each Key Value in a Row
        })
        result += '\n'; //Creates New Row
    })

    return result;
}


function downloadCSV(array) {
    csv = 'data:text/csv;charset=utf-8,' + createCSV(array); //Creates CSV File Format
    excel = encodeURI(csv); //Links to CSV 

    link = document.createElement('a');
    link.setAttribute('href', excel); //Links to CSV File 
    link.setAttribute('download', 'sample-brand.csv'); //Filename that CSV is saved as
    link.click();
}
</script>
</body>

</html>