<?php include 'header.php' ?>
<br>
<section class="slider">
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
      <?php
      $selectbanner = mysqli_query($con, "SELECT * FROM `homebanner` WHERE `status` = 'active'");
      $active = 0;
      while ($arbanner = mysqli_fetch_assoc($selectbanner)) {
        if ($active == '0') {
      ?>
          <div class="carousel-item active">
            <img class="d-block w-100" src="admin/img/<?php echo $arbanner['image'] ?>" alt="First slide">
          </div>
        <?php
        } else {
        ?>
          <div class="carousel-item ">
            <img class="d-block w-100" src="admin/img/<?php echo $arbanner['image'] ?>" alt="First slide">
          </div>
      <?php
        }
        $active++;
      }
      ?>

    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</section><br>

<section class="py-5" id="catsec" style="background-color: #fff;">
  <div class="container sell">

    <div class="col-lg-12 col-12  mx-auto card">
      <div class="row" id="sell">
     

        <div class="col-lg-3 col-3 text-center">
          <div class="row-nice">

            <a href="mobile.php?id=1"><img src="admin/img/sell-phone.png" class="img-fluid" alt="">
              <h4 class="text-uppercase">Sell mobile</h4>
            </a>

          </div>
        </div>

        <div class="col-lg-3 col-3 text-center">
          <div class="row-nice">

            <a href="tabletbrand.php?id=3"> <img src="assets/images/sell-tablet.png" class="img-fluid" alt="">
            <h4 class="text-uppercase">sell tablet</h4></a>

          </div>
        </div>

        <div class="col-lg-3 col-3 text-center">
          <div class="row-nice">
            <a  href="watchbrand.php?id=2"><img src="assets/images/sell-watch.png" class="img-fluid" alt="">
            <h4 class="text-uppercase">sell watch</h4>
            </a>
          </div>
        </div>
        <div class="col-lg-3 col-3 text-center">
          <div class="row-nice">
            <a  href="earpbrand.php?id=4"><img src="assets/images/earbuds.jpg" class="img-fluid" alt="">
            <h4 class="text-uppercase">sell Earbud</h4>
            </a>
          </div>
        </div>

      </div>
    </div>
  </div>
</section>

<section class="watch-div mt-3">
  <?php
  $selmob = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `banner` WHERE `status` = 'active' AND `category` = 'Sell Phone' "));
  ?>
  <div class="container watch-row">
    <div class="row">
      <div class="col-lg-8 col-8" id="yalign" style="margin-top: 5%;">
        <h1 class="tablet-heading pl-2 "><?php echo $selmob['title'] ?></h1>
        <div class="col-lg-8 offset-lg-1 search-option">
          <form action="/action_page.php">
            <div class="input-group">
              <input type="text" id="searchmobile" class="form-control" placeholder="Search your Mobile" name="search">
            </div>
            <div class=" col-11 filter">
                   <ul class="response p-2" type="none">

                   </ul>
             </div>

          </form>
          <div class="row">
            <div class="col-lg-4 col-3">
              <hr style="border: 1px solid white">
            </div>
            <div class="col-lg-6 col-8" id="mor">
              <h6>or choose a brand</h6>
            </div>

          </div>
          <div class="row px-1">
            <?php
            $selectquery = mysqli_query($con, "SELECT * FROM `subcategory` WHERE `status` = 'active' AND `category_id` = 1 ORDER BY `id` ASC LIMIT 4 ");
            while ($ar = mysqli_fetch_assoc($selectquery)) {
            ?>
              <div class="col-lg-3 col-3">
                <a href="oldmobile.php?id=<?php echo $ar['id'] ?>">
                <img src="admin/img/<?php echo $ar['subcategory_image'] ?>" class="img-fluid" alt="">
              </a>
            </div>
            <?php
            }
            ?>
          </div>
          <div class="text-center">
            <a href="mobile.php?id=1"> <button class="btn brand-btn sm-brand mt-4">More Brands <i class="fas fa-chevron-right" aria-hidden="true"></i></button></a>
          </div>
        </div>
      </div>
      <div class="col-lg-4 col-4" id="ymalign">
        <img src="admin/img/<?php echo  $selmob['banner_image'] ?>" class="img-fluid" alt="">
      </div>
    </div>
  </div>
</section>



<section id="have">
  <div class="container tablet-div">
    <?php
    $seltab = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `banner` WHERE `status` = 'active' AND `category` = 'Tablet' "));
    ?>
    <div class="row" id="prow">
      <div class="col-lg-4 col-4" id="ymalign">
        <img src="admin/img/<?php echo $seltab['banner_image'] ?>" class="img-fluid" alt="">
      </div>
      <div class="col-lg-8 col-8" id="yalign" style="margin-top: 5%;">
        <h1 class="tablet-heading  d-flex justify-content-end"><?php echo $seltab['title'] ?></h1>

        <div class="col-lg-8 offset-lg-3 search-option">
          <form action="/action_page.php">
            <div class="input-group">
              <input type="text" id="tabletsearch" class="form-control" placeholder="Search your Tablet" name="search">
            </div>
            <div class=" col-11 filter1">
                   <ul class="response1 p-2" type="none">

                   </ul>
             </div>
          </form>
          <div class="row">
            <div class="col-lg-4 col-3">
              <hr style="border: 1px solid white">
            </div>
            <div class="col-lg-6 col-8" id="choose">
              <h6>or choose a brand</h6>
            </div>

          </div>
          <div class="row px-1">
            <?php
            $selectquery = mysqli_query($con, "SELECT * FROM `subcategory` WHERE `status` = 'active' AND `category_id` = 3 ORDER BY `id` ASC LIMIT 4 ");
            while ($ar = mysqli_fetch_assoc($selectquery)) {
            ?>
              <div class="col-lg-3 col-3"><a href="oldtablet.php?id=<?php echo $ar['id'] ?>"><img src="admin/img/<?php echo $ar['subcategory_image'] ?>" width="100%" class="img-fluid" alt=""></a></div>
            <?php
            }
            ?>
          </div>
          <div class="text-center">
           <a href="tabletbrand.php?id=3"> <button class="btn brand-btn sm-brand mt-4">More Brands <i class="fas fa-chevron-right" aria-hidden="true"></i></button></a>
          </div>
        </div>

      </div>
    </div>
  </div>

</section>



<section class="watch-div">
  <div class="container watch-row">
    <?php
    $selwatch = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `banner` WHERE `status` = 'active' AND `category` = 'Watch' "));
    ?>
    <div class="row ">
      <div class="col-lg-8 col-8" id="yalign" style="margin-top: 5%">
        <h1 class="tablet-heading pl-1 "><?php echo $selwatch['title'] ?></h1>
        <div class="col-lg-8 offset-lg-1 search-option">
          <form action="/action_page.php">
            <div class="input-group">
              <input type="text" id="watchsearch" class="form-control" placeholder="Search your Watch" name="search">
            </div>
            <div class=" col-11 filter2">
                   <ul class="response2 p-2" type="none">

                   </ul>
             </div>
          </form>
          <div class="row">
            <div class="col-lg-4 col-3">
              <hr style="border: 1px solid white">
            </div>
            <div class="col-lg-6 col-8" id="mor">
              <h6>or choose a brand</h6>
            </div>
          </div>
          <div class="row px-1">
            <?php
            $selectquery = mysqli_query($con, "SELECT * FROM `subcategory` WHERE `status` = 'active' AND `category_id` = 2 ORDER BY `id` ASC LIMIT 4 ");
            while ($ar = mysqli_fetch_assoc($selectquery)) {
            ?>
              <div class="col-lg-3 col-3" >
                <a href="oldwatch.php?id=<?php echo $ar['id'] ?>">
                <img src="admin/img/<?php echo $ar['subcategory_image'] ?>" width="100%" class="img-fluid" alt="">
              </a>
            </div>
            <?php
            }
            ?>
          </div>
          <div class="text-center">
          <a href="watchbrand.php?id=2"><button class="btn brand-btn sm-brand mt-4">More Brands <i class="fas fa-chevron-right" aria-hidden="true"></i></button></a> 
          </div>
        </div>

      </div>
      <div class="col-lg-4 col-4" id="ymalign">
        <img src="admin/img/<?php echo $selwatch['banner_image'] ?>" class="img-fluid" alt="">
      </div>
    </div>
  </div>
</section>

<section id="have">
  <div class="container tablet-div">
    <?php
    $seltab = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `banner` WHERE `status` = 'active' AND `category` = 'Ear Buds' "));
    ?>
    <div class="row" id="prow">
      <div class="col-lg-4 col-4" id="ymalign">
        <img src="admin/img/<?php echo $seltab['banner_image'] ?>" class="img-fluid" alt="">
      </div>
      <div class="col-lg-8 col-8" id="yalign" style="margin-top: 5%;">
        <h1 class="tablet-heading  d-flex justify-content-end mr-5 pr-3 "><?php echo $seltab['title'] ?></h1>

        <div class="col-lg-8 offset-lg-3 search-option">
          <form action="/action_page.php">
            <div class="input-group">
              <input type="text" id="earbudsearch" class="form-control" placeholder="Search your Earbuds" name="search">
            </div>
            <div class=" col-11 filterear">
                   <ul class="responseear p-2" type="none">

                   </ul>
             </div>
          </form>
          <div class="row">
            <div class="col-lg-4 col-3">
              <hr style="border: 1px solid white">
            </div>
            <div class="col-lg-6 col-8" id="choose">
              <h6>or choose a brand</h6>
            </div>

          </div>
          <div class="row px-1">
            <?php
            $selectquery = mysqli_query($con, "SELECT * FROM `subcategory` WHERE `status` = 'active' AND `category_id` = 4 ORDER BY `id` ASC LIMIT 4 ");
            while ($ar = mysqli_fetch_assoc($selectquery)) {
            ?>
              <div class="col-lg-3 col-3"><a href="oldearpod.php?id=<?php echo $ar['id'] ?>"><img src="admin/img/<?php echo $ar['subcategory_image'] ?>" width="100%" class="img-fluid" alt=""></a></div>
            <?php
            }
            ?>
          </div>
          <div class="text-center">
           <a href="earpbrand.php?id=4"> <button class="btn brand-btn sm-brand mt-4">More Brands <i class="fas fa-chevron-right" aria-hidden="true"></i></button></a>
          </div>
        </div>

      </div>
    </div>
  </div>

</section>

<?php include 'footer.php' ?>