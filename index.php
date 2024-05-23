<?php include 'header.php' ?>

<head>
    <title>Best Place & Website to Sell Old Mobile Phones Online | Sellit</title>
    <meta name="description"
        content="Sellit.co.in is the best website to sell old phones online in Delhi NCR. With its easy-to-use platform and best prices, it's the ideal choice for anyone who's looking for the best place to sell old phones online quickly and easily.">
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
        <h1 class="tablet-heading">Cash Your Phone: Sellit - Best Website to Sell Old Mobile Phones</h1>
        <p>Sitting on an old phone that's become obsolete? Don't let it gather dust – turn it into cash and declutter
            your life with Sellit.co.in! This convenient and secure platform allows you to effortlessly sell your
            pre-owned phone and get paid what it's worth.</p>
        <h4 style="font-weight: 600;">Why Sellit is the Best Place to Sell Your Old Mobile Phones</h4>
        <p>Forget the hassle of online marketplaces or unreliable local buyers. Sellit offers a streamlined experience
            that prioritizes your comfort and ease:
        </p>
        <ol class="pl-5" style="list-style-type: inherit">
            <li><strong>Effortless Selling from Home:</strong> No need to travel! Simply visit Sellit's user-friendly
                website,
                provide details about your phone's condition, and receive an instant quote.</li>
            <li><strong>Top Dollar for Your Device:</strong> Sellit guarantees fair market value for your phone. Their
                transparent
                pricing ensures you get a competitive price based on your phone's model and condition.</li>
            <li><strong>Hassle-Free Process:</strong> Selling is a breeze. Schedule a pick-up at your convenience, and a
                Sellit
                representative will collect your phone. Once verified, you'll receive the agreed-upon amount directly
                into your bank account.</li>
            <li><strong>Eco-Friendly Solution:</strong> By selling your phone instead of throwing it away, you
                contribute to a greener
                environment. Sellit ensures responsible e-waste management, minimizing environmental impact.</li>
            <!-- <li><strong>Instant quotes:</strong> The website offers instant quotes for old mobile phones, ensuring that
                sellers can get
                an estimate of the value of their devices before selling.</li> -->
        </ol>
        <h4 style="font-weight: 600;">Selling Made Simple with Sellit</h4>
        <p>Transforming your old phone into cash takes just a few clicks:</p>
        <ol class="pl-5">
            <li><strong>
                    Head to Sellit.co.in:</strong> Visit their website and click the "Sell Now" button. </li>
            <li><strong>
                    Describe Your Phone:</strong> Select your phone's brand, model, and accurately describe its
                condition, including
                any cosmetic or functionality issues. Honesty is key – the final price reflects the phone's state.
            </li>
            <li><strong>Instant Quote:</strong> Based on your description, Sellit generates an instant quote for your
                phone. </li>
            <li><strong>
                    Schedule a Pick-Up:</strong> Happy with the quote? Choose a convenient time and location for
                pick-up. Sellit
                handles everything, so you don't have to travel.
            </li>
            <li><strong>Get Paid:</strong> Once Sellit receives and verifies your phone, they deposit the agreed amount
                directly into
                your bank account.
            </li>
        </ol>
        <h4 style="font-weight: 600;">Sellit: Beyond Just Convenience</h4>
        <p>Sellit goes beyond just offering a hassle-free selling experience. Here's what sets them apart:</p>

        <ol class="pl-5" style="list-style-type: inherit">
            <li>
                <strong>Wide Range of Devices:</strong> Sellit accepts a vast array of phones, from popular brands like
                Apple and Samsung to lesser-known manufacturers.

            </li>
            <li>
                <strong>Transparency You Can Trust:</strong> Sellit's process is clear and upfront. You'll always be
                informed about the expected price and what to expect throughout the process.

            </li>
            <li>
                <strong>Secure Transactions:</strong> Sellit prioritizes customer safety. They utilize secure payment
                methods to ensure your financial information is protected.

            </li>
        </ol>

        <h4 style="font-weight: 600;"> Declutter and Get Rewarded</h4>
        <p>
            Sellit.co.in is the perfect platform to declutter your life and turn your unused phone into cash quickly and
            easily. Their user-friendly website, competitive offers, convenient pick-up service, and commitment to
            responsible e-waste management make them the ideal choice. Choose Sellit the Best Website to Sell Old Mobile
            Phones, declutter your space, breathe new life into your old phone, and get rewarded in the process! Visit
            Sellit.co.in today and unlock the cash potential of your pre-owned device.
        </p>

        <h4 style="font-weight: 600;"> Best Place to Sell Old Phones</h4>
        <p>
            How long have you been trying to sell your old phone? However, due to your lack of expertise in this field,
            it always ends up being an exhausting task. Finding An Ideal Client Who Will Provide The Best Market Cost
            Estimate For Your Old Used Phone Won't Without A Doubt Give You An Ever Finishing Migraine. You're clueless
            in a situation like this. What Are You Expected To Do?
        </p>
        <p>
            How About If We Tell You To Sit Back And Relax And Let SellIt Take Over The Reins And Come To Your Aid? Yes,
            You Heard It Right. Sel+-lIt is the best place to sell old phones in India. It is an online platform that
            allows you to sell your used phone quickly and easily. With SellIt, you can get a fair price for your old
            phone, and you can do it all from the comfort of your home.
        </p>


        <h4 style="font-weight: 600;">Where To Sell My Mobile For The Best Price?</h4>
        <p>One of the best things about SellIt is that it is a completely hassle-free process. All you need to do is
            visit the SellIt website, select your device's brand and model, and provide a few basic details about the
            phone's condition. Based on this information, SellIt will give you an instant quote for your phone. If you
            are happy with the price, you can then schedule a pickup for your phone at a time that is convenient for
            you.</p>
        <p>
            SellIt offers competitive prices for all types of phone devices. The platform also accepts phones in all
            conditions, whether they are<strong> new, used, or damaged</strong>.

        </p>
        <p>Selling your old phone through SellIt is also an eco-friendly choice. By selling your phone instead of
            throwing it away, you are helping to reduce electronic waste and make a positive impact on the environment.
            So, if you are looking for the best website to sell old phones in India, SellIt is the way to go. It is an
            easy, hassle-free, and eco-friendly way to get a fair price for your old phone.</p>
    </div>
</section>
<?php include 'footer.php' ?>