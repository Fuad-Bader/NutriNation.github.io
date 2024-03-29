<?
include 'controllers/head.php';
?>

<body class="theme-light" data-highlight="highlight-red">

<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>

<div id="page">

    <div class="header header-auto-show header-fixed header-logo-center">
        <a href="index.html" class="header-title">NutriNation</a>
        <a href="#" data-menu="menu-main" class="header-icon header-icon-1"><i class="fas fa-bars"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-4 show-on-theme-dark"><i class="fas fa-sun"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-4 show-on-theme-light"><i class="fas fa-moon"></i></a>
        <a href="#" data-menu="menu-share" class="header-icon header-icon-3"><i class="fas fa-share-alt"></i></a>
    </div>

    

<?
$page_name="home";
include 'controllers/header.php';
?>

    <div class="page-title page-title-fixed">
        <h1>NutriNation</h1>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-share"><i class="fa fa-share-alt"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-light" data-toggle-theme><i class="fa fa-moon"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-dark" data-toggle-theme><i class="fa fa-lightbulb color-yellow-dark"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-main"><i class="fa fa-bars"></i></a>
    </div>
    <div class="page-title-clear"></div>

    <div id="menu-main" class="menu menu-box-left rounded-0" data-menu-width="280" data-menu-active="nav-pages" data-menu-load="menu-main.php"></div>
    <div id="menu-share" class="menu menu-box-bottom rounded-m"  data-menu-load="menu-share.html" data-menu-height="370"> </div>
    <div id="menu-colors" class="menu menu-box-bottom rounded-m" data-menu-load="menu-colors.html" data-menu-height="480"></div>

    <div class="card card-style" data-card-height="720">
        <video height="720" controls>
            <source src="videos/NutriNation-intro.mp4" type="video/mp4">
            Your browser does not support the video tag.
        </video>
    
        <div class="card-top">
            <h1 class="text-center font-30 font-800 mt-4 mb-0">Welcome to NutriNation</h1>
            <!--<p class="color-white text-center">A word from our nutritionist</p>-->
        </div>
        <!-- <div class="card-overlay bg-gradient opacity-70"></div>         -->
    </div>
    

    <div class="page-content">

        <div class="splide double-slider visible-slider slider-no-dots" id="double-slider-1">
            <div class="splide__track">
                <div class="splide__list">
                <!--<div class="splide__slide ps-3">-->
                <!--    <a href="page-profile-2.php">-->
                <!--    <div data-card-height="220" class="card  shadow-xl rounded-m" style="background-image: ur("images/avatars/colors.png"); height: 220px;">-->
                <!--        <div class="card-bottom text-center">-->
                <!--            <h4 class="color-white font-800 mb-3">Keep track of your calories here</h4>-->
                <!--        </div>-->
                <!--        <div class="card-overlay bg-gradient"></div>-->
                <!--    </div>-->
                <!--    </a>-->
                <!--</div>-->
                <!--<div class="splide__slide ps-3">-->
                <!--    <div data-card-height="220" class="card  shadow-xl rounded-m NN-N">-->
                <!--        <div class="card-bottom text-center">-->
                <!--            <h4 class="color-white font-800 mb-3">BMI Calculator</h4>-->
                <!--        </div>-->
                <!--        <div class="card-overlay bg-gradient"></div>-->
                <!--    </div>-->
                <!--</div>-->
                <!--<div class="splide__slide ps-3">-->
                <!--    <a href="page-profile-2.php">-->
                        
                <!--    <div data-card-height="220" class="card  shadow-xl rounded-m user-update">-->
                <!--        <div class="card-bottom text-center">-->
                <!--            <h4 class="color-white font-800 mb-3">Update your data to view your progress</h4>-->
                <!--        </div>-->
                <!--        <div class="card-overlay bg-gradient"></div>-->
                <!--    </div>-->
                <!--    </a>-->
                <!--</div>-->
                    
                <!--<div class="splide__slide ps-3">-->
                <!--    <a href="page-chat.php">-->
                        
                <!--    <div data-card-height="220" class="card  shadow-xl rounded-m NN-N">-->
                <!--        <div class="card-bottom text-center">-->
                <!--            <h4 class="color-white font-800 mb-3">Consult with JessAI your digital nutritionist</h4>-->
                <!--        </div>-->
                <!--        <div class="card-overlay bg-gradient"></div>-->
                <!--    </div>-->
                <!--    </a>-->
                <!--</div>-->
                
                <!-- <div class="splide__slide ps-3">
                    <div data-card-height="220" class="card  shadow-xl rounded-m bg-33">
                        <div class="card-bottom text-center">
                                <h4 class="color-white font-800 mb-3">Mobile Kit</h4>
                        </div>
                        <div class="card-overlay bg-gradient"></div>
                    </div>
                </div> -->
                <div class="splide__slide ps-3">
                    <a href="diet-plan.php">
                        <div data-card-height="220" class="card  shadow-xl rounded-m "
                                style="background-image: url(images/avatars/calories-tracker.jpg);">
                            <div class="card-bottom text-center">
                                <h4 class="color-white font-800 mb-3">Keep track of your calories here</h4>
                            </div>
                            <div class="card-overlay bg-gradient"></div>
                        </div>
                    </a>

                    </div>
                    <div class="splide__slide ps-3">
                        <a href="page-profile-2.php?user_id=<?echo $user_info['id']?>">
                            <div data-card-height="220" class="card  shadow-xl rounded-m "
                                    style="background-image: url(images/avatars/colors.png);">
                                <div class="card-bottom text-center">
                                    <h4 class="color-white font-800 mb-3">Update your information to view your progress</h4>
                                </div>
                                <div class="card-overlay bg-gradient"></div>
                            </div>
                        </a>
                    </div>
                    <!--<div class="splide__slide ps-3">-->
                    <!--    <a href="page-dashboard.html">-->
                    <!--        <div data-card-height="220" class="card  shadow-xl rounded-m "-->
                    <!--            style="background-image: url(images/avatars/medical-record.jpg);">-->
                    <!--            <div class="card-bottom text-center">-->
                    <!--                <h4 class="color-white font-800 mb-3">Access your Diet Plan</h4>-->
                    <!--            </div>-->
                    <!--            <div class="card-overlay bg-gradient"></div>-->
                    <!--        </div>-->
                    <!--    </a>-->
                    <!--</div>-->
                    <div class="splide__slide ps-3">
                        <a href="page-chat.php">
                            <div data-card-height="220" class="card  shadow-xl rounded-m NN-N">
                            <div class="card-bottom text-center">
                                <h4 class="color-white font-800 mb-3">Consult with JessAI your digital nutritionist</h4>
                            </div>
                            <div class="card-overlay bg-gradient"></div>
                        </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>


        <div class="card card-style shadow-xl">
            <div class="content">
                <p class="color-highlight font-600 mb-n1">A Complete Solution</p>
                <h1 class="font-24 font-700 mb-2">Welcome to Nutrination <i class="fa fa-star mt-n2 font-30 color-yellow-dark float-end me-2 scale-box"></i></h1>
                <p class="mb-1">
                    The ultimate calorie tracker and nutrition expert powered by artificial intelligence.
                </p>
            </div>
        </div>


        <div class="card card-style">
            <div class="content">
                <div class="d-flex">
                    <div class="me-3">
                        <img width="120" class="fluid-img rounded-m shadow-xl"
                                src="images/avatars/diet-plan.png">
                    </div>
                    <div>
                        <p class="color-highlight font-600 mb-n1">Track your calories</p>
                        <h2>Diet Plan</h2>
                        <p class="mt-2">
                            Enjoy healthy food.
                        </p>
                        <a href="diet-plan.php" class="btn btn-sm rounded-s font-13 font-600 gradient-highlight">View All</a>
                    </div>
                </div>

                <div class="divider mt-4"></div>

                <div class="d-flex">
                    <div class="me-3">
                        <img width="120" class="fluid-img rounded-m shadow-xl" src="images/NutriNation-N.png">
                    </div>
                    <div>
                        <p class="color-highlight font-600 mb-n1">Intelligently Crafted</p>
                        <h2>Jess the AI Nutritionist</h2>
                        <p class="mt-2">
                            Try Jess the smart AI assistant to help you manage your diet.
                        </p>
                        <a href="page-chat.php" class="btn btn-sm rounded-s font-13 font-600 gradient-highlight">Try Jess</a>
                    </div>
                </div>
                <div class="divider mt-4"></div>

                <div class="d-flex">
                    <div class="me-3">
                        <img width="120" class="fluid-img rounded-m shadow-xl" src="images/avatars/shop-img.jpg">
                    </div>
                    <div>
                        <p class="color-highlight font-600 mb-n1">Endless Options</p>
                        <h2>Products</h2>
                        <p class="mt-2">
                            Absolutely awesome nutrition products and supplements for you to enjoy.
                        </p>
                        <a href="page-store-home.php" class="btn btn-sm rounded-s font-13 font-600 gradient-highlight">View All</a>
                    </div>
                </div>

            </div>
        </div>

        <div class="row mb-0">
            <a href="#" class="col-6 pe-0">
                <div class="card mr-0 card-style">
                    <div class="d-flex pt-3 pb-3">
                        <div class="align-self-center">
                            <i class="fa fa-home color-green-light ms-3 font-34 mt-1"></i>
                        </div>
                        <div class="align-self-center">
                            <h5 class="ps-2 ms-1 mb-0">Install <br> Application</h5>
                        </div>
                    </div>
                    <p class="px-3">
                        Enjoy NutriNation from your Home Screen.
                    </p>
                </div>
            </a>
            <a href="#" data-menu="menu-main" class="col-6 ps-0">
                <div class="card ml-0 card-style">
                    <div class="d-flex pt-3 pb-3">
                        <div class="align-self-center">
                            <i class="fa fa-cog color-blue-dark ms-3 font-34 mt-1"></i>
                        </div>
                        <div class="align-self-center">
                            <h5 class="ps-2 ms-1 mb-0">Settings</h5>
                        </div>
                    </div>
                    <p class="px-3">
                        Access the app settings.
                    </p>
                </div>
            </a>
        </div>

        <!-- <a href="#" data-toggle-theme>
            <div class="card card-style">
                <div class="d-flex pt-3 mt-1 mb-2 pb-2">
                    <div class="align-self-center">
                        <i class="color-icon-gray color-gray-dark font-30 icon-40 text-center fa fa-moon ms-3 show-on-theme-light"></i>
                        <i class="color-icon-yellow color-yellow-dark font-30 icon-40 text-center fa fa-sun ms-3 show-on-theme-dark"></i>
                    </div>
                    <div class="align-self-center">
                        <p class="ps-2 ms-1 color-highlight font-500 mb-n1 mt-n2">Tap to Enable</p>
                        <h4 class="show-on-theme-light ps-2 ms-1 mb-0">Dark Mode</h4>
                        <h4 class="show-on-theme-dark ps-2 ms-1 mb-0">Light Mode</h4>
                    </div>
                    <div class="ms-auto align-self-center mt-n2">
                        <div class="custom-control small-switch ios-switch me-3 mt-n2">
                            <input data-toggle-theme type="checkbox" class="ios-input" id="toggle-dark-home">
                            <label class="custom-control-label" for="toggle-dark-home"></label>
                        </div>
                    </div>
                </div>
            </div>
        </a> -->

        <div data-menu-load="menu-footer.html"></div>


    </div>
    <!-- End of Page Content-->
    <!-- All Menus, Action Sheets, Modals, Notifications, Toasts, Snackbars get Placed outside the <div class="page-content"> -->

    <!-- Menu Share -->
    <div id="menu-share" class="menu menu-box-bottom menu-box-detached">
        <div class="menu-title mt-n1"><h1>Share the Love</h1><p class="color-highlight">Just Tap the Social Icon. We'll add the Link</p><a href="#" class="close-menu"><i class="fa fa-times"></i></a></div>
        <div class="content mb-0">
            <div class="divider mb-0"></div>
            <div class="list-group list-custom-small list-icon-0">
                <a href="auto_generated" class="shareToFacebook external-link">
                    <i class="font-18 fab fa-facebook-square color-facebook"></i>
                    <span class="font-13">Facebook</span>
                    <i class="fa fa-angle-right"></i>
                </a>
                <a href="auto_generated" class="shareToTwitter external-link">
                    <i class="font-18 fab fa-twitter-square color-twitter"></i>
                    <span class="font-13">Twitter</span>
                    <i class="fa fa-angle-right"></i>
                </a>
                <a href="auto_generated" class="shareToLinkedIn external-link">
                    <i class="font-18 fab fa-linkedin color-linkedin"></i>
                    <span class="font-13">LinkedIn</span>
                    <i class="fa fa-angle-right"></i>
                </a>
                <a href="auto_generated" class="shareToWhatsApp external-link">
                    <i class="font-18 fab fa-whatsapp-square color-whatsapp"></i>
                    <span class="font-13">WhatsApp</span>
                    <i class="fa fa-angle-right"></i>
                </a>
                <a href="auto_generated" class="shareToMail external-link border-0">
                    <i class="font-18 fa fa-envelope-square color-mail"></i>
                    <span class="font-13">Email</span>
                    <i class="fa fa-angle-right"></i>
                </a>
            </div>
        </div>
    </div>

    <!-- Be sure this is on your main visiting page, for example, the index.html page-->
    <!-- Install Prompt for Android -->
    <div id="menu-install-pwa-android" class="menu menu-box-bottom rounded-m">
        <img class="mx-auto mt-4 rounded-m" src="app/icons/icon-128x128.png" alt="img" width="90">
        <h4 class="text-center mt-4 mb-2">NutriNation on your Home Screen</h4>
        <p class="text-center boxed-text-xl">
            Install NutriNation on your home screen, and access it just like a regular app. It really is that simple!
        </p>
        <div class="boxed-text-l">
            <a href="#" class="pwa-install mx-auto btn btn-m font-600 bg-highlight">Add to Home Screen</a>
            <a href="#" class="pwa-dismiss close-menu btn-full mt-3 pt-2 text-center text-uppercase font-600 color-red-light font-12 pb-4 mb-3">Maybe later</a>
        </div>
    </div>

    <!-- Install instructions for iOS -->
    <div id="menu-install-pwa-ios" class="menu menu-box-bottom rounded-m">
        <div class="boxed-text-xl top-25">
            <img class="mx-auto mt-4 rounded-m" src="app/icons/icon-128x128.png" alt="img" width="90">
            <h4 class="text-center mt-4 mb-2">NutriNation on your Home Screen</h4>
            <p class="text-center ms-3 me-3">
                Install NutriNation on your home screen, and access it just like a regular app. Open your Safari menu and tap "Add to Home Screen".
            </p>
            <a href="#" class="pwa-dismiss close-menu btn-full mt-3 text-center text-uppercase font-700 color-red-light opacity-90 font-110 pb-5">Maybe later</a>
        </div>
    </div>

</div>

<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
</body>
