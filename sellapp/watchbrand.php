<?php include 'header.php' ?>
​
<section class="sell-section">
    <div class="container">
        <div class="row">
            <div class="col-12 mx-auto">
                <h1 class="sell-header text-center">Sell Your Watch</h1>  
                </div>
        </div>
    </div>
</section>
​
​
<!-- select brand -->
​
<section class="select-brand">
    
    <div class="container py-3" id="brndd">
    <h1 class="select-brand-heading pb-3">Select Brand</h1>
        <div class="row">
        <?php
           $selectquery = mysqli_query($con,"SELECT * FROM `subcategory` WHERE `status` = 'active' AND `category_id` = '2' ");
           while($artop = mysqli_fetch_assoc( $selectquery ))
           {
          ?>
          <div class="col-lg-2 col-3 mt-4">
           <a href="oldwatch.php?id=<?php echo $artop['id'] ?>"> <img src="../admin/img/<?php echo $artop['subcategory_image'] ?>" class="img-fluid box1" alt=""></a> 
          </div>
          <?php
           }
           ?>
         
          
        </div>
      </div>
    
</section>
<?php include 'footerwatch.php' ?>