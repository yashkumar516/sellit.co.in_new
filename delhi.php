<?php include "header.php"; ?>

<head>
    <title>Sell Your Old Mobile Phone in Delhi & Get Instant Cash | Sellit</title>
    <meta name="description"
        content="Want to sell your old iPhone or smartphone in Delhi? Sellit.co.in offers a quick, easy, and secure way to get cash for your pre-loved device. Get an instant quote, free pickup, and competitive prices.">
</head>
<br>
<section class="slider">
    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
        <div class="carousel-inner">
            <?php
            $queryBanner = mysqli_query(
                $con,
                "SELECT * FROM `homebanner` WHERE `status` = 'active'"
            );
            $active = 0;
            while ($bannerData = mysqli_fetch_assoc($queryBanner)) {
                if ($active == "0") { ?>
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="admin/img/<?php echo $bannerData["image"]; ?>" alt="First slide">
                    </div>
                <?php } else { ?>
                    <div class="carousel-item ">
                        <img class="d-block w-100" src="admin/img/<?php echo $bannerData["image"]; ?>" alt="First slide">
                    </div>
            <?php }
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
    <?php $selectBanner = mysqli_fetch_assoc(
        mysqli_query(
            $con,
            "SELECT * FROM `banner` WHERE `status` = 'active' AND `category` = 'Sell Phone' "
        )
    ); ?>
    <div class="container watch-row">
        <div class="row">
            <div class="col-lg-8 col-8" id="yalign" style="margin-top: 5%;">
                <h3 class="tablet-heading pl-2 "><?php echo $selectBanner["title"]; ?></h3>
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
                        $queryBrand = mysqli_query(
                            $con,
                            "SELECT * FROM `subcategory` WHERE `status` = 'active' AND `category_id` = 1 ORDER BY `id` ASC LIMIT 4 "
                        );
                        while (
                            $brandData = mysqli_fetch_assoc($queryBrand)
                        ) { ?>
                            <div class="col-lg-3 col-3">
                                <a href="sell-old-mobile-phones/sell-old-<?= strtolower(
                                                                                str_replace(
                                                                                    " ",
                                                                                    "-",
                                                                                    $brandData["subcategory_name"]
                                                                                )
                                                                            ) ?>/<?php echo $brandData["id"]; ?>">
                                    <img src="admin/img/<?php echo $brandData["subcategory_image"]; ?>" class="img-fluid" alt="">
                                </a>
                            </div>
                        <?php }
                        ?>
                    </div>
                    <div class="text-center">
                        <a href="sell-old-mobile-phones/1"> <button class="btn brand-btn sm-brand mt-4">More Brands <i
                                    class="fas fa-chevron-right" aria-hidden="true"></i></button></a>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-4" id="ymalign">
                <img src="admin/img/<?php echo $selectBanner["banner_image"]; ?>" class="img-fluid" alt="">
            </div>
        </div>
    </div>
</section>

<section id="have">
    <div class="container tablet-div">
        <?php $selectBanner = mysqli_fetch_assoc(
            mysqli_query(
                $con,
                "SELECT * FROM `banner` WHERE `status` = 'active' AND `category` = 'Tablet' "
            )
        ); ?>
        <div class="row" id="prow">
            <div class="col-lg-4 col-4" id="ymalign">
                <img src="admin/img/<?php echo $selectBanner["banner_image"]; ?>" class="img-fluid" alt="">
            </div>
            <div class="col-lg-8 col-8" id="yalign" style="margin-top: 5%;">
                <h3 class="tablet-heading  d-flex justify-content-end"><?php echo $selectBanner["title"]; ?></h3>

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
                        $queryBrand = mysqli_query(
                            $con,
                            "SELECT * FROM `subcategory` WHERE `status` = 'active' AND `category_id` = 3 ORDER BY `id` ASC LIMIT 4 "
                        );
                        while (
                            $brandData = mysqli_fetch_assoc($queryBrand)
                        ) { ?>
                            <div class="col-lg-3 col-3"><a href="oldtablet.php?id=<?php echo $brandData["id"]; ?>"><img src="admin/img/<?php echo $brandData["subcategory_image"]; ?>" width="100%" class="img-fluid" alt=""></a></div>
                        <?php }
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
        <?php $selectBanner = mysqli_fetch_assoc(
            mysqli_query(
                $con,
                "SELECT * FROM `banner` WHERE `status` = 'active' AND `category` = 'Watch' "
            )
        ); ?>
        <div class="row ">
            <div class="col-lg-8 col-8" id="yalign" style="margin-top: 5%">
                <h3 class="tablet-heading pl-1 "><?php echo $selectBanner["title"]; ?></h3>
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
                        $queryBrand = mysqli_query(
                            $con,
                            "SELECT * FROM `subcategory` WHERE `status` = 'active' AND `category_id` = 2 ORDER BY `id` ASC LIMIT 4 "
                        );
                        while (
                            $brandData = mysqli_fetch_assoc($queryBrand)
                        ) { ?>
                            <div class="col-lg-3 col-3">
                                <a href="oldwatch.php?id=<?php echo $brandData["id"]; ?>">
                                    <img src="admin/img/<?php echo $brandData["subcategory_image"]; ?>" width="100%" class="img-fluid" alt="">
                                </a>
                            </div>
                        <?php }
                        ?>
                    </div>
                    <div class="text-center">
                        <a href="watchbrand.php?id=2"><button class="btn brand-btn sm-brand mt-4">More Brands <i
                                    class="fas fa-chevron-right" aria-hidden="true"></i></button></a>
                    </div>
                </div>

            </div>
            <div class="col-lg-4 col-4" id="ymalign">
                <img src="admin/img/<?php echo $selectBanner["banner_image"]; ?>" class="img-fluid" alt="">
            </div>
        </div>
    </div>
</section>

<section id="have">
    <div class="container tablet-div">
        <?php $selectBanner = mysqli_fetch_assoc(
            mysqli_query(
                $con,
                "SELECT * FROM `banner` WHERE `status` = 'active' AND `category` = 'Ear Buds' "
            )
        ); ?>
        <div class="row" id="prow">
            <div class="col-lg-4 col-4" id="ymalign">
                <img src="admin/img/<?php echo $selectBanner["banner_image"]; ?>" class="img-fluid" alt="">
            </div>
            <div class="col-lg-8 col-8" id="yalign" style="margin-top: 5%;">
                <h3 class="tablet-heading  d-flex justify-content-end mr-5 pr-3 "><?php echo $selectBanner["title"]; ?>
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
                        $queryBrand = mysqli_query(
                            $con,
                            "SELECT * FROM `subcategory` WHERE `status` = 'active' AND `category_id` = 4 ORDER BY `id` ASC LIMIT 4 "
                        );
                        while (
                            $brandData = mysqli_fetch_assoc($queryBrand)
                        ) { ?>
                            <div class="col-lg-3 col-3"><a href="oldearpod.php?id=<?php echo $brandData["id"]; ?>"><img src="admin/img/<?php echo $brandData["subcategory_image"]; ?>" width="100%" class="img-fluid" alt=""></a></div>
                        <?php }
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
        <h1 class="tablet-heading">Sell your Old Mobile Phone in Delhi</h1>

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
                    $selectModel = mysqli_query(
                        $con,
                        "SELECT * FROM `product` WHERE `status` = 'active' AND `best` = 'active' AND `categoryid` = '1'"
                    );
                    while ($modelData = mysqli_fetch_assoc($selectModel)) {

                        $topsubcatid = $modelData["subcategoryid"];
                        $topsubcatname = mysqli_fetch_assoc(
                            mysqli_query(
                                $con,
                                "select * from `subcategory` WHERE `id` = '$topsubcatid' "
                            )
                        );
                    ?>
                        <div class="item my-3">
                            <a href="/sell-old-phones/sell-old-<?= strtolower(
                                                                    $topsubcatname["subcategory_name"] .
                                                                        "-" .
                                                                        strtolower(
                                                                            str_replace(
                                                                                " ",
                                                                                "-",
                                                                                $modelData["product_name"]
                                                                            )
                                                                        )
                                                                ) .
                                                                    "/" .
                                                                    $modelData["id"] .
                                                                    "_" .
                                                                    $modelData["subcategoryid"] ?>">
                                <div class="text-center" id="md">
                                    <img src="admin/img/<?php echo $modelData["product_image"]; ?>" class="img-fluid" alt="">
                                    <span class="sum-heading1 text-center" style="color:black;"><?php echo $modelData["product_name"]; ?></span>
                                </div>
                            </a>
                        </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </section>

        <h2 class="tablet-heading">Breathe New Life into Your Old Phone: Sell iPhones & Smartphones Online in Delhi with
            Sellit.co.in</h2>
        <p>
            Do you have an old iPhone or smartphone lying dormant in a Delhi drawer? Perhaps it's a trusty companion
            from a few years back, or an upgrade left you with a perfectly functional device gathering dust. Whatever
            the reason, there's no need for your pre-loved phone to become e-waste. Sellit.co.in offers a convenient and
            secure solution to sell your old iPhone or any smartphone online, right here in Delhi.</p>

        <h4 style="font-weight: 600;">Why Sell Your Old Phone with Sellit.co.in?</h4>
        <p>
            Delhi residents seeking a simple and rewarding way to declutter can benefit greatly from Sellit:
        </p>
        <ol class="pl-5" style="list-style-type: inherit">
            <li>Quick and Easy Process</li>
            <li>Competitive Prices</li>
            <li>Hassle-Free Experience</li>
            <li>Safe and Secure.</li>
            <li>Eco-Friendly Choice.</li>
        </ol>
        <h4 style="font-weight: 600;">How to Sell Your Phone on Sellit.co.in</h4>
        <p>
            Selling your old phone with Sellit is a straightforward process:

        </p>
        <ol class="pl-5" style="list-style-type: inherit">
            <li>Visit Sellit.co.in</li>
            <li>Select Your Device.</li>
            <li>Describe Your Phone's Condition</li>
            <li>Get an Instant Quote</li>
            <li>Schedule a Pickup (if happy with quote):</li>
            <li>Get Paid

        </ol>
        <h4 style="font-weight: 600;">What Happens After Pickup?</h4>
        <p>
            Once Sellit picks up your phone from your Delhi location, their team will thoroughly inspect it to ensure it
            matches the description you provided. If everything is in order, you'll receive the agreed-upon amount
            within a short timeframe. In the unlikely event of any discrepancies, Sellit will contact you to discuss the
            revised offer before proceeding.
        </p>

        <h4 style="font-weight: 600;">Sell Your iPhone or Smartphone Today and Earn Cash</h4>
        <p>
            Don't let your old iPhone or smartphone become obsolete. Sell it online with Sellit.co.in and unlock its
            potential value. Whether you're in Delhi or any other city in India, Sellit offers a convenient, secure, and
            rewarding way to declutter your space and earn some cash. Visit Sellit.co.in today and breathe new life into
            your pre-loved phone, all from the comfort of your home in Delhi!
        </p>
    </div>
</section>
<?php include "footerCity.php"; ?>