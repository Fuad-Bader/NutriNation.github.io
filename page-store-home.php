<?
include 'controllers/head.php';
?>


<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
<title>NutriNation</title>
<link rel="icon" href="/images/NutriNation-N-transparent.png">
<link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">
<link rel="manifest" href="_manifest.json">
<link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
</head>

<body class="theme-light" data-highlight="highlight-red">

<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>

<div id="page">
<?if(!isset($_GET['reloaded'])){?>
<meta http-equiv="refresh" content="0;url=page-store-home.php?reloaded"> 
<?}?> 
    <div class="header header-auto-show header-fixed header-logo-center">
        <a href="index.php" class="header-title">NutriNation</a>
        <a href="#" data-menu="menu-main" class="header-icon header-icon-1"><i class="fas fa-bars"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-4 show-on-theme-dark"><i class="fas fa-sun"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-4 show-on-theme-light"><i class="fas fa-moon"></i></a>
        <a href="#" data-menu="menu-share" class="header-icon header-icon-3"><i class="fas fa-share-alt"></i></a>
    </div>

    <?
$page_name="store";
include 'controllers/header.php';
function limit_cond ($user_type,$limit) {
    if($user_type == 'admin'){
        $limit_cond = '';
    }else{
        $limit_cond = 'LIMIT '.$limit;
    }
    return $limit_cond;
}
if(isset($_POST['delete'])){
    $pId = $_POST['pId'];
    if($mysqli->query("DELETE FROM `products` WHERE product_id = $pId")){
        echo sweetalert2('success','Deleted',5000,'top');
    }else{
        echo sweetalert2('warning','Oops .. somthing went wrong',5000,'top');
    }
}
?>

    <!--<div id="footer-bar" class="footer-bar-6">-->
    <!--    <a href="page-profile-2.html"><i class="fa fa-user"></i><span>Profile</span></a>-->
    <!--    <a href="page-chat.html"><img src="" data-src="images/NutriNation-N-transparent.png" width="18" class="rounded-circle shadow-xl preload-img"><span>Jess AI</span></a>-->
    <!--    <a href="index.html" class="circle-nav active-nav"><i class="fa fa-home"></i><span>Home</span></a>-->
    <!--    <a href="page-store-home.html"><i class="fa fa-cutlery"></i><span>Products</span></a>-->
    <!--    <a href="#" data-menu="menu-main"><i class="fa fa-bars"></i><span>Menu</span></a>-->
    <!--</div>-->
    
    <div class="page-title page-title-fixed">
        <h1>Store</h1>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-share"><i class="fa fa-share-alt"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-light" data-toggle-theme><i class="fa fa-moon"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-dark" data-toggle-theme><i class="fa fa-lightbulb color-yellow-dark"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-main"><i class="fa fa-bars"></i></a>
    </div>
    <div class="page-title-clear"></div>
        
    <div class="page-content">
                    
        <div class="splide single-slider slider-no-arrows slider-no-dots" id="single-slider-1">
            <div class="splide__track">
                <div class="splide__list">
                    <?
                    $sql = "
                    SELECT `product_id`,
                    `product_link`,
                    `product_name`,
                    `product_desc`,
                    `product_price`,
                    `product_pic`,
                    `product_view`,
                    `product_click` 
                    FROM `products` 
                    WHERE product_view = 'Head'
                    order by product_id desc
                    ".limit_cond ($user_info['type'],'5');
                    $res = $mysqli->query($sql);
                    while ($row = $res->fetch_assoc()){
                    ?>
                    <!---->
                    <div class="splide__slide">
                        <!---->
                        
                        <div class="card card-style mb-3 bg-19" data-card-height="300" style="background-image: url(<?echo $row['product_pic']?>); background-size: contain; background-position: bottom !important; background-repeat: no-repeat;">
                            
                            <div class="card-top">
                                <?if($user_info['type'] == 'admin'){?>
                                <a href="upload-p.php?edit=<?echo $row['product_id']?>&reloaded" class="icon icon-s bg-white color-blue-dark rounded-xl mt-3 me-3 float-end"><i class="fa fa-cog"></i></a>
                                <form method="post">
                                        <input type="text" name="pId" value="<?php echo $row['product_id']; ?>" hidden>
                                        <button type="submit" name="delete" class="icon icon-s bg-white color-red-dark rounded-xl mt-3 me-3 float-end" onclick="return confirmDelete(event);"  style=""><i class="fa fa-trash" aria-hidden="true"></i></button>
                                </form>
                                <?}?>
                                <!--<a href="#" data-menu="menu-cart" class="icon icon-s bg-white color-black rounded-xl mt-3 me-2 float-end"><i class="fa fa-shopping-bag"></i></a>-->
                            </div>
                            <div class="card-bottom mb-3 ms-3 me-3">
                                <a a href="<?echo $row['product_link']?>" target="_blank">
                                    <h1 class="color-white font-800 mb-n2"><?echo $row['product_name']?></h1>
                                    <p class="color-white font-14 mb-2 opacity-60">
                                        <?echo $row['product_desc']?>
                                    </p>
                                </a>
                            </div>
                            <div class="card-overlay bg-black opacity-60"></div>
                        </div>
                        <!---->
                    </div>
                    <!---->
                    <?}?>
                </div>
            </div>
        </div>
        
        <div class="content mb-3">
            <h3>Popular Products</h3>
        </div>           
        
        <div class="splide double-slider slider-no-dots" id="double-slider-1">
            <div class="splide__track">
                <div class="splide__list">
                    <?
                    $sql = "
                    SELECT `product_id`,
                    `product_link`,
                    `product_name`,
                    `product_desc`,
                    `product_price`,
                    `product_pic`,
                    `product_view`,
                    `product_click` 
                    FROM `products` 
                    order by product_click desc
                    LIMIT 5
                    ";
                    $res = $mysqli->query($sql);
                    while ($row = $res->fetch_assoc()){
                        $number = $row['product_price'];
                        $number = number_format($number, 2, '.', '');
                        $parts = explode('.', $number);
                        
                        $beforeDecimal = $parts[0];
                        $afterDecimal = $parts[1];
                    ?>
                    <!-- a href="<?//echo $row['product_link']?>" target="_blank" -->
                    <div  class="splide__slide">
                        <a href="<?echo $row['product_link']?>" target="_blank">
                            <div class="card mx-3 mb-0 card-style bg-20" data-card-height="250" style="background-image: url(<?echo $row['product_pic']?>); background-size: contain; background-position: bottom !important; background-repeat: no-repeat;">
                                <div class="card-top">
                                    <!--<a href="#" data-menu="menu-cart" class="icon icon-xxs bg-white color-black rounded-xl mt-3 me-2 float-end"><i class="fa fa-shopping-bag"></i></a>-->
                                </div>
                                <div class="card-bottom">
                                    <h3 class="color-white font-800 mb-3 pb-1 ps-3">JD <?echo $beforeDecimal?><sup>.<?echo $afterDecimal?></sup></h3>
                                </div>
                                <div class="card-overlay bg-gradient"></div>
                            </div>
                            <h4 class="mx-3 mb-4"><?echo $row['product_name']?></h4>
                        </a>
                    </div>
                    <!---->
                    <?}?>
                </div>
            </div>
        </div>

        <div class="divider divider-margins"></div>
        
        <div class="card card-style">
            <div class="content mb-0">
                <p class="mb-n1 font-600 color-highlight">Handpicked by our Staff</p>
                <h2 class="mb-4">Featured Products</h2>
                
                <div class="row mb-0">
                    <?
                    $sql = "
                    SELECT `product_id`,
                    `product_link`,
                    `product_name`,
                    `product_desc`,
                    `product_price`,
                    `product_pic`,
                    `product_view`,
                    `product_click` 
                    FROM `products` 
                    where product_view = 'Featured'
                    order by product_click desc
                    ".limit_cond ($user_info['type'],'5');
                    $res = $mysqli->query($sql);
                    $i=0;
                    while ($row = $res->fetch_assoc()){
                        $i++;
                        $number = $row['product_price'];
                        $number = number_format($number, 2, '.', '');
                        $parts = explode('.', $number);
                        
                        $beforeDecimal = $parts[0];
                        $afterDecimal = $parts[1];
                    ?>
                    <!---->
                    <div class="col-5 mb-4 pe-0">
                        <a href="<?echo $row['product_link']?>" target="_blank"><img src="<?echo $row['product_pic']?>" class="rounded-sm shadow-xl img-fluid" width="300"></a>
                        
                    </div>
                    <div class="col-7">
                        <a href="<?echo $row['product_link']?>" target="_blank">
                            <h5 class="mb-0"><?echo $row['product_name']?></h5>
                        </a>
                        <h1 class="mt-1 mb-n2 font-800">JD <?echo $beforeDecimal?><sup class="font-300 font-16">.<?echo $afterDecimal?></sup></h1>
                        <br>
                        <p>
                            <?echo $row['product_desc']?>
                        </p>
                        <?
                        if($user_info['type'] == 'admin'){
                        ?>
                        <div class="row" style="margin:20px">
                            <a href="upload-p.php?edit=<?echo $row['product_id']?>&reloaded" class="btn btn-m btn-full mb-3 rounded-xl text-uppercase font-700 shadow-s bg-highlight">Edit</a>
                        </div>
                        <form method="post">
                            <div class="row" style="margin: 20px;">
                                <input type="text" name="pId" value="<?php echo $row['product_id']; ?>" hidden>
                                <button type="submit" name="delete" onclick="return confirmDelete(event);" class="btn btn-m btn-full mb-3 rounded-xl text-uppercase font-700 shadow-s" style="background-color: red;">Delete</button>
                            </div>
                        </form>
                        <?}?>
                    </div>
                    
                    
                    <div class="w-100 divider divider-margins" <?echo ($i == $res->num_rows) ? 'hidden' : ''?>></div>
                    <!---->
                    <?}?>
                </div>
                                
                <a href="https://www.carrefourjordan.com/mafjor/en/c/FJOR1200000" class="btn btn-full btn-sm rounded-s mb-3 font-600 gradient-highlight">View More Featured Products</a>
            </div>
        </div>
        
        
        <div class="card card-style">
            <div class="content mb-0">
                <p class="mb-n1 font-600 color-highlight">Fresh Arrivals</p>
                <h2 class="mb-4">New in Store</h2>
                
                <div class="row text-center mb-0">
                    <?
                    $sql = "
                    SELECT `product_id`,
                    `product_link`,
                    `product_name`,
                    `product_desc`,
                    `product_price`,
                    `product_pic`,
                    `product_view`,
                    `product_click` 
                    FROM `products`
                    order by product_id desc
                    LIMIT 2
                    ";
                    $res = $mysqli->query($sql);
                    $i=0;
                    while ($row = $res->fetch_assoc()){
                        $i++;
                        $number = $row['product_price'];
                        $number = number_format($number, 2, '.', '');
                        $parts = explode('.', $number);
                        
                        $beforeDecimal = $parts[0];
                        $afterDecimal = $parts[1];
                    ?>
                    <!---->
                    <div class="col-6 mb-4">
                        <a href="<?echo $row['product_link']?>" target="_blank"><img src="<?echo $row['product_pic']?>" class="rounded-sm shadow-xl img-fluid"></a>
                        <a href="<?echo $row['product_link']?>" target="_blank">
                            <h5 class="mt-1"><?echo $row['product_name']?></h5>
                        </a>
                        <h1 class="mt-1 mb-n2 font-800">JD <?echo $beforeDecimal?><sup class="font-300 font-16">.<?echo $afterDecimal?></sup></h1>
                    </div>
                    <!---->
                    <?}?>
                </div>

                
                <a href="https://www.carrefourjordan.com/mafjor/en/c/FJOR1200000" class="btn btn-full btn-sm rounded-s mb-3 font-600 gradient-highlight">View More New Arrivals</a>
                
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
<script>
    function confirmDelete(event) {
        if (!confirm('Are you sure you want to delete this item?')) {
            event.preventDefault();
        }
        // else{
        //     window.location.href = '?delete='+id;
        // }
    }
</script>
<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
</body>
