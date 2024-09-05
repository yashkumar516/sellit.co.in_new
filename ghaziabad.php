<?php include "header.php"; ?>

<head>
    <title>Sell Your Old Mobile Phone in Ghaziabad | Sellit</title>
    <meta name="description"
        content="Sell Your old Mobile Phone online in Ghaziabad via Sellit.co.in. It is the best place to quickly sell your old Mobile Phone in Ghaziabad and get instant cash online while staying at home.">
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
                <img class="d-block w-100" src="admin/img/<?php echo $bannerData[
                    "image"
                ]; ?>" alt="First slide">
            </div>
            <?php } else { ?>
            <div class="carousel-item ">
                <img class="d-block w-100" src="admin/img/<?php echo $bannerData[
                    "image"
                ]; ?>" alt="First slide">
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
                <h3 class="tablet-heading pl-2 "><?php echo $selectBanner[
                    "title"
                ]; ?></h3>
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
                                <img src="admin/img/<?php echo $brandData[
                                    "subcategory_image"
                                ]; ?>" class="img-fluid" alt="">
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
                <img src="admin/img/<?php echo $selectBanner[
                    "banner_image"
                ]; ?>" class="img-fluid" alt="">
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
                <img src="admin/img/<?php echo $selectBanner[
                    "banner_image"
                ]; ?>" class="img-fluid" alt="">
            </div>
            <div class="col-lg-8 col-8" id="yalign" style="margin-top: 5%;">
                <h3 class="tablet-heading  d-flex justify-content-end"><?php echo $selectBanner[
                    "title"
                ]; ?></h3>

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
                        <div class="col-lg-3 col-3"><a href="oldtablet.php?id=<?php echo $brandData[
                            "id"
                        ]; ?>"><img src="admin/img/<?php echo $brandData[
                                        "subcategory_image"
                                    ]; ?>" width="100%" class="img-fluid" alt=""></a></div>
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
                <h3 class="tablet-heading pl-1 "><?php echo $selectBanner[
                    "title"
                ]; ?></h3>
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
                            <a href="oldwatch.php?id=<?php echo $brandData[
                                "id"
                            ]; ?>">
                                <img src="admin/img/<?php echo $brandData[
                                    "subcategory_image"
                                ]; ?>" width="100%" class="img-fluid" alt="">
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
                <img src="admin/img/<?php echo $selectBanner[
                    "banner_image"
                ]; ?>" class="img-fluid" alt="">
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
                <img src="admin/img/<?php echo $selectBanner[
                    "banner_image"
                ]; ?>" class="img-fluid" alt="">
            </div>
            <div class="col-lg-8 col-8" id="yalign" style="margin-top: 5%;">
                <h3 class="tablet-heading  d-flex justify-content-end mr-5 pr-3 "><?php echo $selectBanner[
                    "title"
                ]; ?>
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
                        <div class="col-lg-3 col-3"><a href="oldearpod.php?id=<?php echo $brandData[
                            "id"
                        ]; ?>"><img src="admin/img/<?php echo $brandData[
                                        "subcategory_image"
                                    ]; ?>" width="100%" class="img-fluid" alt=""></a></div>
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
        <h1 class="tablet-heading">Sell your Old Mobile Phone in Ghaziabad</h1>

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
                                <img src="admin/img/<?php echo $modelData[
                                    "product_image"
                                ]; ?>" class="img-fluid" alt="">
                                <span class="sum-heading1 text-center" style="color:black;"><?php echo $modelData[
                                        "product_name"
                                    ]; ?></span>
                            </div>
                        </a>
                    </div>
                    <?php
                    }
                    ?>
                </div>
            </div>
        </section>

        <h2 class="tablet-heading">Sellit.co.in: Cash for Your Old Phone, Convenience at Your Doorstep</h2>
        <p>Lying in a drawer, your old phone is a forgotten relic of technological advancements. It served you well,
            capturing memories and keeping you connected. But now, it's time to give it a new lease on life. Forget the
            hassle of local classifieds or unreliable buyers. Sellit.co.in offers a convenient and secure way to sell
            your used mobile phone online in Ghaziabad, turning that old tech into cash for your next adventure</p>

        <h4 style="font-weight: 600;">
            Why Choose Sellit.co.in?
        </h4>
        <ol class="pl-5" style="list-style-type: inherit">
            <li><strong>Quotes:</strong> No more waiting for offers or haggling with strangers. Just a few clicks on
                Sellit.co.in
                gets you an instant quote for your phone based on its brand, model, condition, and age. Transparency and
                speed – that's the Sellit way!
            </li>
            <li><strong>Competitive Prices:</strong> We understand the value of your used phone. Sellit compares prices
                across various
                platforms to ensure you get a fair and competitive offer. No lowballers here, just a chance to get the
                most out of your pre-loved device.
            </li>
            <li><strong>Effortless Selling:</strong> Say goodbye to crowded marketplaces and endless phone calls. Sellit
                handles
                everything. Simply schedule a free pickup at your convenience in Ghaziabad. Our trusted partner will
                collect your phone, eliminating any need for you to travel.
            </li>
            <li><strong>Wide Range of Devices:</strong> From the latest iPhones to older Samsung models, Sellit.co.in
                accepts a wide
                variety of phones in all conditions – working, cracked, or even water damaged. We breathe new life into
                pre-loved devices, giving them a second chance while putting cash in your pocket.
            </li>
            <li><strong>Eco-Friendly Choice:</strong> Selling your old phone is an environmentally responsible decision.
                By giving it a
                second life, you're reducing electronic waste and contributing to a more sustainable future.
            </li>
        </ol>

        <h4 style="font-weight: 600;">Selling Your Phone with Sellit is Simple:</h4>
        <ol class="pl-5" style="list-style-type: inherit">
            <li>Head over to Sellit.co.in and click "Sell Now."</li>
            <li>Select your phone's brand and model.</li>
            <li>Get your instant quote!</li>
            <li>Schedule a free pickup at your convenience.</li>
            <li>Relax and get paid.</li>

        </ol>
        <h4 style="font-weight: 600;">
            Sellit.co.in: Your Trusted Partner for Selling Used Phones in Ghaziabad</h4>
        <p>
            Don't let your old phone gather dust. Sellit.co.in offers a secure, convenient, and eco-friendly way to turn
            it into cash. Get a fair price, enjoy a hassle-free experience, and contribute to a greener future. Visit
            Sellit.co.in today and unlock the value of your used phone.
        </p>

    </div>
</section>
<?php include "footerCity.php"; ?>