<?
include 'controllers/head.php';
?>
<body class="theme-light">

<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>

<div id="page">

    <div class="header header-fixed header-logo-center">
        <a href="#" class="header-title">Get in Touch</a>
        <a href="#" data-back-button class="header-icon header-icon-1"><i class="fas fa-chevron-left"></i></a>
        <a href="#" data-menu="menu-main" class="header-icon header-icon-4"><i class="fas fa-bars"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-dark"><i class="fas fa-sun"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-light"><i class="fas fa-moon"></i></a>
    </div>

<?
$page_name="contact";
include 'controllers/header.php';
if(isset($_POST['SendMessage'])){
    $name = $_POST['contactNameField'];
    $email = $_POST['contactEmailField'];
    $message = $_POST['contactMessageTextarea'];
    $message = 'Name : '.$name.'<br>'.'Email : '.$email.'<br>'.' Message : <br>'. $message;
    if(mailto('fuad.bader@outlook.com','contact form',$message)){
        echo sweetalert2 ('success','your message has been sent',5000,'top');
    }else{
        echo sweetalert2('warning','Oops .. somthing went wrong',5000,'top');
    }
}
?>


    <!--<div class="card card-fixed mb-n5" data-card-height="350">-->
    <!--    <div class="map-full">-->
    <!--        <iframe src="https://www.google.com/maps/embed/v1/view?key=AIzaSyAM3nxDVrkjyKwdIZp8QOplmBKLRVI5S_Y&center=-33.8569,151.2152&zoom=16&maptype=satellite"></iframe>-->
    <!--    </div>-->
    <!--</div>-->
    <!--<div class="card card-clear" data-card-height="350"></div>-->


    <div class="page-content pb-3">

        <div class="card card-full rounded-m pb-4">
            <div class="drag-line"></div>

            <div class="content">
                <p class="font-600 mb-n1 color-highlight">We're here</p>
                <h1>Contact Us</h1>
                <p>
                    Fully functional contact form, just drop your message and we'll get back to you in the shortest possible time.
                </p>
            </div>

            <div class="form-sent disabled">
                <div class="card card-style">
                    <div class="shadow-l rounded-m gradient-green me-n1 ms-n1 mb-n1 ">
                        <h1 class="color-white text-center pt-4"><i class="fa fa-check-circle fa-3x shadow-s scale-box rounded-circle"></i></h1>
                        <h2 class="color-white bold text-center pt-3">Message Sent</h2>
                        <p class="color-white pb-4 text-center mt-n2 mb-0">We'll get back to you shortly.</p>
                    </div>
                </div>

                <div class="card card-style">
                    <div class="content text-center">
                        <h2>Meanwhile, let's get social!</h2>
                        <p class="boxed-text-xl">
                            Here are our social media platforms! Follow us for the latest updates or just say hello!
                        </p>
                        <a href="#" class="icon icon-xl shadow-xl rounded-xl bg-facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="#" class="icon icon-xl shadow-xl rounded-xl bg-instagram ms-3 me-3"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="icon icon-xl shadow-xl rounded-xl bg-twitter"><i class="fab fa-twitter"></i></a>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="content">
                    <form action="" method="post">
                            <div class="form-field form-name">
                                <label class="contactNameField color-theme" for="contactNameField">Name:<span>(required)</span></label>
                                <input type="text" name="contactNameField" value="" class="round-small" id="contactNameField" required />
                            </div>
                            <div class="form-field form-email">
                                <label class="contactEmailField color-theme" for="contactEmailField">Email:<span>(required)</span></label>
                                <input type="email" name="contactEmailField" value="" class="round-small" id="contactEmailField" required />
                            </div>
                            <div class="form-field form-text">
                                <label class="contactMessageTextarea color-theme" for="contactMessageTextarea">Message:<span>(required)</span></label>
                                <textarea name="contactMessageTextarea" class="round-small" id="contactMessageTextarea" required></textarea>
                            </div>
                            <div class="form-button">
                                <input type="submit" name="SendMessage" class="btn bg-highlight text-uppercase font-900 btn-m btn-full rounded-sm  shadow-xl contactSubmitButton" value="Send Message"/>
                            </div>
                    </form>
                </div>
            </div>

            <div class="content mt-0">
                <!--<div class="divider"></div>-->

                <!--<h3 class="font-700">Postal Information</h3>-->
                <!--<p class="pb-0 mb-0">PO Box 22161 Street Collins East</p>-->
                <!--<p class="pb-0 mb-0">PO Box 16122 Collins Street West</p>-->
                <!--<p class="pb-0">Victoria 8007 Australia</p>-->

                <div class="divider"></div>

                <h3 class="font-700">Al Hussein Bin Talal university</h3>
                <p class="pb-0 mb-0">121 King Street, Melbourne</p>
                <p class="pb-0 mb-0">PO Box 16122 Collins Street West</p>
                <p class="pb-0">Victoria 3000 Australia</p>

                <div class="list-group list-custom-small">
                    <a href="tel:+1 234 567 890" class="external-link">
                        <i class="fa font-14 fa-phone color-phone"></i>
                        <span>+1 234 567 8900</span>
                        <span class="badge bg-highlight">TAO TO CALL</span>
                        <i class="fa fa-angle-right"></i>
                    </a>
                    <a href="mailto:mail@domain.com" class="external-link">
                        <i class="fa font-14 fa-envelope color-mail"></i>
                        <span>mail@domain.com</span>
                        <span class="badge bg-highlight">TAO TO MAIL</span>
                        <i class="fa fa-angle-right"></i>
                    </a>
                    <a href="https://www.facebook.com/enabled.labs/" class="external-link">
                        <i class="fab font-14 fa-facebook color-facebook"></i>
                        <span>enabled.labs</span>
                        <i class="fa fa-link"></i>
                    </a>
                    <a href="https://twitter.com/iEnabled" class="external-link">
                        <i class="fab font-14 fa-twitter-square color-twitter"></i>
                        <span>@iEnabled</span>
                        <i class="fa fa-link"></i>
                    </a>
                    <a href="#" class="border-0">
                        <i class="fab font-14 fa-linkedin color-linkedin"></i>
                        <span>@Enabled</span>
                        <i class="fa fa-link"></i>
                    </a>

                </div>


            </div>
        </div>

    </div>
    <!-- Page content ends here-->

    <!-- Main Menu-->
    <div id="menu-main" class="menu menu-box-left rounded-0" data-menu-load="menu-main.php" data-menu-width="280" data-menu-active="nav-contact"></div>

    <!-- Share Menu-->
    <div id="menu-share" class="menu menu-box-bottom rounded-m" data-menu-load="menu-share.html" data-menu-height="370"></div>

    <!-- Colors Menu-->
    <div id="menu-colors" class="menu menu-box-bottom rounded-m" data-menu-load="menu-colors.html" data-menu-height="480"></div>


</div>

<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
</body>
