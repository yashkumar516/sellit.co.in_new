<?php include 'header.php' ?>

<head>
    <title>Sell Old Mobile Phones Online in India | Mobile Phone Selling Online</title>
    <meta name="description"
        content="Sell old mobile phones online in India - Sellit.co.in is the best and used old mobile phone selling online website, where you can sell your used and old phone easily against better cash.">
</head>
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

                        <a href="sell-old-mobile-phones/1"><img src="admin/img/sell-phone.png" class="img-fluid" alt="">
                            <h4 class="text-uppercase">Sell mobile</h4>
                        </a>

                    </div>
                </div>

                <div class="col-lg-3 col-3 text-center">
                    <div class="row-nice">

                        <a href="tabletbrand.php?id=3"> <img src="assets/images/sell-tablet.png" class="img-fluid"
                                alt="">
                            <h4 class="text-uppercase">sell tablet</h4>
                        </a>

                    </div>
                </div>

                <div class="col-lg-3 col-3 text-center">
                    <div class="row-nice">
                        <a href="watchbrand.php?id=2"><img src="assets/images/sell-watch.png" class="img-fluid" alt="">
                            <h4 class="text-uppercase">sell watch</h4>
                        </a>
                    </div>
                </div>
                <div class="col-lg-3 col-3 text-center">
                    <div class="row-nice">
                        <a href="earpbrand.php?id=4"><img src="assets/images/earbuds.jpg" class="img-fluid" alt="">
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
                <h3 class="tablet-heading pl-2 "><?php echo $selmob['title'] ?></h3>
                <div class="col-lg-8 offset-lg-1 search-option">
                    <form action="/action_page.php">
                        <div class="input-group">
                            <input type="text" id="searchmobile" class="form-control" placeholder="Search your Mobile"
                                name="search">
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
                            <a
                                href="sell-old-mobile-phones/sell-old-<?= strtolower(str_replace(' ','-',$ar['subcategory_name'])) ?>/<?php echo $ar['id'] ?>">
                                <img src="admin/img/<?php echo $ar['subcategory_image'] ?>" class="img-fluid" alt="">
                            </a>
                        </div>
                        <?php
            }
            ?>
                    </div>
                    <div class="text-center">
                        <a href="sell-old-mobile-phones/1"> <button class="btn brand-btn sm-brand mt-4">More Brands <i
                                    class="fas fa-chevron-right" aria-hidden="true"></i></button></a>
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
                <h3 class="tablet-heading  d-flex justify-content-end"><?php echo $seltab['title'] ?></h3>

                <div class="col-lg-8 offset-lg-3 search-option">
                    <form action="/action_page.php">
                        <div class="input-group">
                            <input type="text" id="tabletsearch" class="form-control" placeholder="Search your Tablet"
                                name="search">
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
                        <div class="col-lg-3 col-3"><a href="oldtablet.php?id=<?php echo $ar['id'] ?>"><img
                                    src="admin/img/<?php echo $ar['subcategory_image'] ?>" width="100%"
                                    class="img-fluid" alt=""></a></div>
                        <?php
            }
            ?>
                    </div>
                    <div class="text-center">
                        <a href="tabletbrand.php?id=3"> <button class="btn brand-btn sm-brand mt-4">More Brands <i
                                    class="fas fa-chevron-right" aria-hidden="true"></i></button></a>
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
                <h3 class="tablet-heading pl-1 "><?php echo $selwatch['title'] ?></h3>
                <div class="col-lg-8 offset-lg-1 search-option">
                    <form action="/action_page.php">
                        <div class="input-group">
                            <input type="text" id="watchsearch" class="form-control" placeholder="Search your Watch"
                                name="search">
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
                        <div class="col-lg-3 col-3">
                            <a href="oldwatch.php?id=<?php echo $ar['id'] ?>">
                                <img src="admin/img/<?php echo $ar['subcategory_image'] ?>" width="100%"
                                    class="img-fluid" alt="">
                            </a>
                        </div>
                        <?php
            }
            ?>
                    </div>
                    <div class="text-center">
                        <a href="watchbrand.php?id=2"><button class="btn brand-btn sm-brand mt-4">More Brands <i
                                    class="fas fa-chevron-right" aria-hidden="true"></i></button></a>
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
                <h3 class="tablet-heading  d-flex justify-content-end mr-5 pr-3 "><?php echo $seltab['title'] ?></h3>

                <div class="col-lg-8 offset-lg-3 search-option">
                    <form action="/action_page.php">
                        <div class="input-group">
                            <input type="text" id="earbudsearch" class="form-control" placeholder="Search your Earbuds"
                                name="search">
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
                        <div class="col-lg-3 col-3"><a href="oldearpod.php?id=<?php echo $ar['id'] ?>"><img
                                    src="admin/img/<?php echo $ar['subcategory_image'] ?>" width="100%"
                                    class="img-fluid" alt=""></a></div>
                        <?php
            }
            ?>
                    </div>
                    <div class="text-center">
                        <a href="earpbrand.php?id=4"> <button class="btn brand-btn sm-brand mt-4">More Brands <i
                                    class="fas fa-chevron-right" aria-hidden="true"></i></button></a>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<section class="py-4">
    <div class="container">
        <h1 class="tablet-heading">Sell Old Mobile Phones Online in India</h1>
        <p>If you're looking to sell your old mobile phone, then Sellit.co.in is the website you need. With its
            user-friendly platform and competitive prices, it offers a hassle-free selling experience. Here's everything
            you need to know about selling your old mobile phone on Sellit.co.in.</p>
        <h4 style="font-weight: 600;">Why Sell Your Old Mobile Phone Online on Sellit.co.in?</h4>
        <p>Sellit.co.in is the ideal destination for selling old mobile phones online because of the following reasons:
        </p>
        <ol class="pl-5">
            <li>User-friendly platform: The website's user-friendly interface makes it easy to navigate and use.</li>
            <li>Competitive prices: Sellit.co.in offers competitive prices for old mobile phones, ensuring that sellers
                get the best value for their devices.</li>
            <li>Hassle-free selling experience: Selling your old mobile phone on Sellit.co.in is a hassle-free
                experience. The process is simple, quick, and convenient.</li>
            <li>Wide range of brands and models: Sellit.co.in accepts a wide range of brands and models, ensuring that
                sellers can sell their devices regardless of the make and model.</li>
            <li>Instant quotes: The website offers instant quotes for old mobile phones, ensuring that sellers can get
                an estimate of the value of their devices before selling.</li>
        </ol>
        <h4 style="font-weight: 600;">How to Sell Your Old Mobile Phone on Sellit.co.in?</h4>
        <p>Selling your old mobile phone on Sellit.co.in is a simple process. Here's how you can do it</p>
        <ol class="pl-5">
            <li>Visit the website: Visit Sellit.co.in and click on the "Sell Now" button.</li>
            <li>Select your device: Select the brand and model of your device, and provide details about its condition,
                age, and accessories.</li>
            <li>Get an instant quote: Get an instant quote for your device based on the information you've provided.
            </li>
            <li>Schedule a pickup: If you're happy with the quote, schedule a pickup for your device.</li>
            <li>Get paid: After Sellit.co.in receives and verifies your device, you'll get paid directly to your bank
                account.</li>
        </ol>
        <h4 style="font-weight: 600;">Sell Your Old Mobile Phones Now!</h4>
        <p>Sellit.co.in is the best website to sell your old mobile phone online in India. With its user-friendly
            platform, competitive prices, and hassle-free selling experience, it's the ideal destination for anyone
            looking to sell their old mobile phone. Visit Sellit.co.in now to sell your old mobile phone online and get
            the best value for your device.</p>
    </div>
</section>
<?php include 'footer.php' ?>