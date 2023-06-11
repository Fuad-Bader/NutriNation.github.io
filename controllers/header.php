<?php
include 'login.php';
?>
    <div id="footer-bar" class="footer-bar-6">
        <a href="page-profile-2.php?user_id=<?echo $user_info['id']?>"><i class="fa fa-user"></i><span><?echo $User_firstName?></span></a>
        <a href="page-chat.php"><img src="" data-src="images/NutriNation-N-transparent.png" width="18" class="rounded-circle shadow-xl preload-img"><span>Jess AI</span></a>
        <a href="index.php" class="circle-nav active-nav"><i class="fa fa-home"></i><span>Home</span></a>
        <a href="page-store-home.php"><i class="fa fa-shopping-cart"></i><span>Products</span></a>
        <a href="#" data-menu="menu-main"><i class="fa fa-bars"></i><span>Menu</span></a>
    </div>