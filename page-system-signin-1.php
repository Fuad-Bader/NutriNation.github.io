<?
include 'controllers/head.php';
?>

<body class="theme-light">

<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>

<div id="page">

    <div class="header header-fixed header-logo-center">
        <a href="index.php" class="header-title">Sign in</a>
        <a href="#" data-back-button class="header-icon header-icon-1"><i class="fas fa-chevron-left"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-4 show-on-theme-dark"><i class="fas fa-sun"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-4 show-on-theme-light"><i class="fas fa-moon"></i></a>
    </div>

<?
$page_name = "signin";
include 'controllers/login.php';
if($notV_flag){
    echo sweetalert2 ('warning',$eMsg,5000,'top');   
}
?>


    <div class="page-content header-clear-medium">

        <div class="card card-style">
            <div class="content">
                <h1 class="font-30">Sign In</h1>
                <p>
                    Enter your credentials below to sign into your account.
                </p>
                <form method="post">
                    <div class="input-style no-borders has-icon validate-field mb-4">
                        <i class="fa fa-user"></i>
                        <input type="email" class="form-control validate-email" id="form1a" name="email" placeholder="Email" required>
                        <label for="form1a" class="color-highlight">Email</label>
                        <i class="fa fa-times disabled invalid color-red-dark"></i>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>
                    <div class="input-style no-borders has-icon validate-field mb-4">
                        <i class="fa fa-lock"></i>
                        <input type="password" class="form-control validate-password" name = "password" id="form1ab" placeholder="Password" required>
                        <label for="form1ab" class="color-highlight">Password</label>
                        <i class="fa fa-times disabled invalid color-red-dark"></i>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>
                
                    <button type="submit" name="login" class="btn btn-full btn-l font-600 font-13 gradient-highlight mt-4 rounded-s">Sign In</button>
                </form>

                <div class="row pt-3 mb-3">
                    <div class="col-6 text-start">
                        <!--<a href="page-system-forgot-1.php" class="color-highlight">Forgot Password?</a>-->
                    </div>
                    <div class="col-6 text-end">
                        <a href="page-system-signup-1.php" class="color-highlight">Create Account</a>
                    </div>
                </div>

                <!--<div class="divider"></div>-->

                <!--<a href="#" class="btn btn-icon text-start btn-full btn-l font-600 font-13 bg-facebook mt-4 rounded-s"><i class="fab fa-facebook-f text-center"></i>Sign In with Facebook</a>-->
                <!--<a href="#" class="btn btn-icon text-start btn-full btn-l font-600 font-13 bg-twitter mt-2 rounded-s"><i class="fab fa-twitter text-center"></i>Sign In with Twitter</a>-->
                <!--<a href="#" class="btn btn-icon text-start btn-full btn-l font-600 font-13 bg-dark-dark mt-2 rounded-s"><i class="fab fa-apple text-center"></i>Sign In with Apple</a>-->

            </div>
        </div>


        <div data-menu-load="menu-footer.html"></div>
    </div>
    <!-- Page content ends here-->

    <!-- Main Menu-->
    <div id="menu-main" class="menu menu-box-left rounded-0" data-menu-load="menu-main.php" data-menu-width="280" data-menu-active="nav-pages"></div>

    <!-- Share Menu-->
    <div id="menu-share" class="menu menu-box-bottom rounded-m" data-menu-load="menu-share.html" data-menu-height="370"></div>

    <!-- Colors Menu-->
    <div id="menu-colors" class="menu menu-box-bottom rounded-m" data-menu-load="menu-colors.html" data-menu-height="480"></div>


</div>

<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
</body>
