<?
$page_name = "menu-main";
include 'controllers/login.php';
?>
<div class="card rounded-0 NN-N" data-card-height="150">
    <div class="card-top">
        <a href="#" class="close-menu float-end me-2 text-center mt-3 icon-40 notch-clear"><i class="fa fa-times color-white"></i></a>
    </div>
    <div class="card-bottom">
        <h1 class="color-white ps-3 mb-n1 font-28">NutriNation</h1>
        <p class="mb-2 ps-3 font-12 color-white bg-highlight opacity-50">A New Way to Track Your Calories.</p>
    </div>
    <div class="card-overlay bg-gradient"></div>
</div>
<div class="mt-4"></div>
<?if($user_info['type'] == 'admin'){?>
<h6 class="menu-divider">Admin</h6>
<div class="list-group list-custom-small list-menu">
    <a id="nav-homepages" href="upload-p.php">
        <i class="fa-plus gradient-green color-white"></i>
        <span>Upload Product</span>
        <i class="fa fa-angle-right"></i>
    </a>
</div>
<?}?>
<h6 class="menu-divider">Navigation</h6>
<div class="list-group list-custom-small list-menu">
    <a id="nav-homepages" href="index.php">
        <i class="fa fa-home gradient-green color-white"></i>
        <span>Home</span>
        <i class="fa fa-angle-right"></i>
    </a>
    <a id="nav-components" href="page-profile-2.php?user_id=<?echo $user_info['id']?>">
        <i class="fa fa-user gradient-blue color-white"></i>
        <span>Profile</span>
        <i class="fa fa-angle-right"></i>
    </a>
    <a id="nav-pages" href="page-store-home.php">
        <i class="fa fa-shopping-cart gradient-brown color-white"></i>
        <span>Products</span>
        <i class="fa fa-angle-right"></i>
    </a>
    <a id="nav-media" href="diet-plan.php">
        <i class="fa fa fa-heartbeat gradient-red color-white"></i>
        <span>Diet Plan</span>
        <i class="fa fa-angle-right"></i>
    </a>
    <a id="nav-contact" href="page-contact.php">
        <i class="fa fa-envelope gradient-teal color-white"></i>
        <span>Contact</span>
        <i class="fa fa-angle-right"></i>
    </a>
</div>
<h6 class="menu-divider mt-4">Settings</h6>
<div class="list-group list-custom-small list-menu">
    
    <a href="#" data-menu="menu-colors">
        <i class="fa fa-brush gradient-highlight color-white"></i>
        <span>Highlights</span>
        <i class="fa fa-angle-right"></i>
    </a>
    <a href="#" data-toggle-theme="" data-trigger-switch="switch-dark-mode">
        <i class="fa fa-moon gradient-dark color-white"></i>
        <span>Dark Mode</span>
        <div class="custom-control small-switch ios-switch">
            <input data-toggle-theme type="checkbox" class="ios-input" id="toggle-dark-menu">
            <label class="custom-control-label" for="toggle-dark-menu"></label>
        </div>
    </a>
    <?
    if($islogedin){
    ?>
    <form method="post">
        <button type="submit" name="log_out" id="logout" >
            <i class="fa fa-sign-out" style="background: linear-gradient(to bottom, #F44336, #D32F2F);"></i>
            <span>LOGOUT</span>
        </button><br>
    </form>
    <?
    }
    ?>
</div>

<h6 class="menu-divider font-10 mt-4">Made with <i class="fa fa-heart color-red-dark pl-1 pr-1"></i> by: <br>Fuad Bader<br>Khaled Awwad<br>Mohammad Assaf<br>Areeg Muhaisen<br>Mohammad Shorman<br>Enabled in <span class="copyright-year">2023</span></h6>
