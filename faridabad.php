<?php include 'header.php' ?>

<head>
    <title>Sell Your Old Mobile Phone in Faridabad | Sellit</title>
    <meta name="description"
        content="Sell Your old Mobile Phone online in Faridabad via Sellit.co.in. It is the best place to quickly sell old used Mobile Phone in Faridabad and get instant cash online while staying at home.">
</head>
<br>
<section class="slider">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php
      $queryBanner = mysqli_query($con, "SELECT * FROM `homebanner` WHERE `status` = 'active'");
      $active = 0;
      while ($bannerData = mysqli_fetch_assoc($queryBanner)) {
        if ($active == '0') {
      ?>
            <div class="carousel-item active">
                <img class="d-block w-100" src="admin/img/<?php echo $bannerData['image'] ?>" alt="First slide">
            </div>
            <?php
        } else {
        ?>
            <div class="carousel-item ">
                <img class="d-block w-100" src="admin/img/<?php echo $bannerData['image'] ?>" alt="First slide">
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
  $selectBanner = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `banner` WHERE `status` = 'active' AND `category` = 'Sell Phone' "));
  ?>
    <div class="container watch-row">
        <div class="row">
            <div class="col-lg-8 col-8" id="yalign" style="margin-top: 5%;">
                <h3 class="tablet-heading pl-2 "><?php echo $selectBanner['title'] ?></h3>
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
            $queryBrand = mysqli_query($con, "SELECT * FROM `subcategory` WHERE `status` = 'active' AND `category_id` = 1 ORDER BY `id` ASC LIMIT 4 ");
            while ($brandData = mysqli_fetch_assoc($queryBrand)) {
            ?>
                        <div class="col-lg-3 col-3">
                            <a
                                href="sell-old-mobile-phones/sell-old-<?= strtolower(str_replace(' ','-',$brandData['subcategory_name'])) ?>/<?php echo $brandData['id'] ?>">
                                <img src="admin/img/<?php echo $brandData['subcategory_image'] ?>" class="img-fluid"
                                    alt="">
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
                <img src="admin/img/<?php echo  $selectBanner['banner_image'] ?>" class="img-fluid" alt="">
            </div>
        </div>
    </div>
</section>

<section id="have">
    <div class="container tablet-div">
        <?php
    $selectBanner = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `banner` WHERE `status` = 'active' AND `category` = 'Tablet' "));
    ?>
        <div class="row" id="prow">
            <div class="col-lg-4 col-4" id="ymalign">
                <img src="admin/img/<?php echo $selectBanner['banner_image'] ?>" class="img-fluid" alt="">
            </div>
            <div class="col-lg-8 col-8" id="yalign" style="margin-top: 5%;">
                <h3 class="tablet-heading  d-flex justify-content-end"><?php echo $selectBanner['title'] ?></h3>

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
            $queryBrand = mysqli_query($con, "SELECT * FROM `subcategory` WHERE `status` = 'active' AND `category_id` = 3 ORDER BY `id` ASC LIMIT 4 ");
            while ($brandData = mysqli_fetch_assoc($queryBrand)) {
            ?>
                        <div class="col-lg-3 col-3"><a href="oldtablet.php?id=<?php echo $brandData['id'] ?>"><img
                                    src="admin/img/<?php echo $brandData['subcategory_image'] ?>" width="100%"
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
    $selectBanner = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `banner` WHERE `status` = 'active' AND `category` = 'Watch' "));
    ?>
        <div class="row ">
            <div class="col-lg-8 col-8" id="yalign" style="margin-top: 5%">
                <h3 class="tablet-heading pl-1 "><?php echo $selectBanner['title'] ?></h3>
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
            $queryBrand = mysqli_query($con, "SELECT * FROM `subcategory` WHERE `status` = 'active' AND `category_id` = 2 ORDER BY `id` ASC LIMIT 4 ");
            while ($brandData = mysqli_fetch_assoc($queryBrand)) {
            ?>
                        <div class="col-lg-3 col-3">
                            <a href="oldwatch.php?id=<?php echo $brandData['id'] ?>">
                                <img src="admin/img/<?php echo $brandData['subcategory_image'] ?>" width="100%"
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
                <img src="admin/img/<?php echo $selectBanner['banner_image'] ?>" class="img-fluid" alt="">
            </div>
        </div>
    </div>
</section>

<section id="have">
    <div class="container tablet-div">
        <?php
    $selectBanner = mysqli_fetch_assoc(mysqli_query($con, "SELECT * FROM `banner` WHERE `status` = 'active' AND `category` = 'Ear Buds' "));
    ?>
        <div class="row" id="prow">
            <div class="col-lg-4 col-4" id="ymalign">
                <img src="admin/img/<?php echo $selectBanner['banner_image'] ?>" class="img-fluid" alt="">
            </div>
            <div class="col-lg-8 col-8" id="yalign" style="margin-top: 5%;">
                <h3 class="tablet-heading  d-flex justify-content-end mr-5 pr-3 "><?php echo $selectBanner['title'] ?>
                </h3>

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
            $queryBrand = mysqli_query($con, "SELECT * FROM `subcategory` WHERE `status` = 'active' AND `category_id` = 4 ORDER BY `id` ASC LIMIT 4 ");
            while ($brandData = mysqli_fetch_assoc($queryBrand)) {
            ?>
                        <div class="col-lg-3 col-3"><a href="oldearpod.php?id=<?php echo $brandData['id'] ?>"><img
                                    src="admin/img/<?php echo $brandData['subcategory_image'] ?>" width="100%"
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
        <h1 class="tablet-heading">Sell your Old Used Mobile Phone in Faridabad</h1>
        <p>It only takes a few minutes to sell your old phone and get you a fair price.</p>
        <section class="top-selling" style="background-color: #fff;">
            <div class="container top-selling-div">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-12 col-12 mx-auto">
                        <div class="row">
                            <div class="col-lg-3 col-2"></div>
                            <div class="col-lg-6 col-8" id="choosebrand">
                                <h3 class="top-sell-heading text-center pb-4"> Top Selling Mobiles </h3>
                            </div>
                            <div class="col-lg-3 col-2"></div>
                        </div>
                    </div>
                </div>
                <!-- </div>
  <div class="container mb-5"> -->
                <div class="owl-carousel owl-carousel-12 owl-theme col-12">
                    <?php 
        $selectModel = mysqli_query($con, "SELECT * FROM `product` WHERE `status` = 'active' AND `best` = 'active' AND `categoryid` = '1'");
      while ($modelData = mysqli_fetch_assoc($selectModel)) {
        $topsubcatid = $modelData['subcategoryid'];
        $topsubcatname = mysqli_fetch_assoc(mysqli_query($con,"select * from `subcategory` WHERE `id` = '$topsubcatid' "));
     ?>
                    <div class="item my-3">
                        <a
                            href="/sell-old-phones/sell-old-<?= strtolower($topsubcatname['subcategory_name'].'-'.strtolower(str_replace(' ','-',$modelData['product_name']))).'/'.$modelData['id'].'_'.$modelData['subcategoryid'] ?>">
                            <div class="text-center" id="md">
                                <img src="admin/img/<?php echo $modelData['product_image'];  ?>" class="img-fluid"
                                    alt="">
                                <span class="sum-heading1 text-center"
                                    style="color:black;"><?php echo $modelData['product_name'] ?></span>
                            </div>
                        </a>
                    </div>
                    <?php
      }
      ?>
                </div>
            </div>
        </section>

        <h2 class="tablet-heading">Give Your Old Phone a Faridabad Farewell: Sell It Online with Sellit.co.in</h2>
        <p>
            Is an old phone gathering dust in a Faridabad drawer? Maybe it's a trusty device from a few years back, or
            perhaps a recent upgrade left you with a perfectly functional phone gathering cobwebs. Whatever the reason,
            there's no need for your pre-loved phone to become e-waste. Sellit.co.in provides a secure and convenient
            solution to sell your old mobile phone online, regardless of where you are in India, including Faridabad.
        </p>

        <h4 style="font-weight: 600;">Faridabad Residents: Turn Your Phone into Cash with Sellit</h4>
        <p>
            If you're in Faridabad and looking to declutter your space and earn some cash, Sellit.co.in is the perfect
            option. Here's why:
        </p>
        <ol class="pl-5" style="list-style-type: inherit">
            <li><strong>Effortless Selling:</strong> Sellit's user-friendly platform makes selling your phone a breeze.
                A few clicks are
                all it takes to get an instant quote and schedule a pickup from your Faridabad location.
            </li>
            <li><strong>Competitive Prices:</strong> We offer fair and competitive prices for your device, ensuring you
                get the best
                value for your pre-loved phone, right here in Faridabad.
            </li>
            <li><strong>Stress-Free Experience:</strong> From getting a quote to receiving payment, Sellit takes care of
                everything. No
                need to deal with the hassle of finding buyers or meeting strangers in Faridabad.
            </li>
            <li><strong>Security You Can Trust:</strong> Sellit prioritizes security. Your information and device are
                handled with utmost
                care throughout the process.
            </li>
            <li><strong>Eco-Friendly Choice:</strong> Selling your old phone is an environmentally friendly decision.
                You're giving your
                phone a new life and reducing e-waste in Faridabad and beyond.
            </li>
        </ol>
        <h4 style="font-weight: 600;">Selling Your Phone with Sellit is Simple</h4>
        <p>
            The process of selling your phone with Sellit is straightforward:
        </p>
        <ol class="pl-5" style="list-style-type: inherit">

            <li><strong>Head to Sellit.co.in:</strong> Visit the Sellit website and click the prominent "Sell Now"
                button.
            </li>
            <li><strong>Identify Your Device:</strong> From the list of manufacturers, choose your phone's brand. Then,
                select the exact
                model.
            </li>
            <li><strong>Describe Your Phone's Condition:</strong> Be honest and accurate about your phone's condition.
                This includes
                aspects like screen cracks, dents, battery life, and whether you have the original charger and box. The
                more details you provide, the more accurate your quote will be.
            </li>
            <li><strong>Instant Quote:</strong> Based on the information you entered, Sellit will generate an instant
                quote for your
                phone.
            </li>
            <li><strong>Schedule a Pickup (if happy with quote):</strong> If you're satisfied with the offered price,
                you can schedule a
                convenient pickup time for your phone directly in Faridabad. Sellit offers pickup services across India.
            </li>
            <li><strong>Get Paid:</strong> Once Sellit receives and verifies your device, you'll receive the payment
                directly into your
                bank account.
            </li>

        </ol>
        <h4 style="font-weight: 600;">What Happens After Pickup?</h4>
        <p>Once Sellit picks up your phone from your Faridabad location, their team will thoroughly inspect it to ensure
            it matches the description you provided. If everything is in order, you'll receive the agreed-upon amount
            within a short timeframe. In the unlikely event of any discrepancies, Sellit will contact you to discuss the
            revised offer before proceeding.
        </p>

        <h4 style="font-weight: 600;">Give Your Old Phone a New Life and Get Cash</h4>
        <p>
            Don't let your old phone become obsolete. Sell it online with Sellit.co.in and unlock its potential value.
            Whether you're in Faridabad or any other city in India, Sellit offers a convenient, secure, and rewarding
            way to declutter your space and earn some cash. Visit Sellit.co.in today and give your pre-loved phone a new
            life, all from the comfort of your home in Faridabad!
        </p>
    </div>
</section>
<?php include 'footerCity.php' ?>