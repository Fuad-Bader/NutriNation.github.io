<?
include 'controllers/head.php';
?>

<body class="theme-light" data-highlight="highlight-red">

<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>

<div id="page">
<?if(!isset($_GET['reloaded'])){?>
<meta http-equiv="refresh" content="0;url=upload-p.php?reloaded"> 
<?}?> 
    <div class="header header-auto-show header-fixed header-logo-center">
        <a href="index.html" class="header-title">Upload Products</a>
        <a href="#" data-menu="menu-main" class="header-icon header-icon-1"><i class="fas fa-bars"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-4 show-on-theme-dark"><i class="fas fa-sun"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-4 show-on-theme-light"><i class="fas fa-moon"></i></a>
        <a href="#" data-menu="menu-share" class="header-icon header-icon-3"><i class="fas fa-share-alt"></i></a>
    </div>

    

<?
$page_name="Upload Product";
include 'controllers/header.php';
?>

    <div class="page-title page-title-fixed">
        <h1>Upload Products</h1>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-share"><i class="fa fa-share-alt"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-light" data-toggle-theme><i class="fa fa-moon"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-dark" data-toggle-theme><i class="fa fa-lightbulb color-yellow-dark"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-main"><i class="fa fa-bars"></i></a>
    </div>
    <div class="page-title-clear"></div>

    <div id="menu-main" class="menu menu-box-left rounded-0" data-menu-width="280" data-menu-active="nav-pages" data-menu-load="menu-main.php"></div>
    <div id="menu-share" class="menu menu-box-bottom rounded-m"  data-menu-load="menu-share.html" data-menu-height="370"> </div>
    <div id="menu-colors" class="menu menu-box-bottom rounded-m" data-menu-load="menu-colors.html" data-menu-height="480"></div>
    <!---->
<div class="page-content">
    <div class="card card-style">
        <!--enctype="multipart/form-data"-->
<?
$pDescription = 'demo description';
$pPrice = 'JD 1.6 demo';
$pName = 'demo name';
$pLink = '';
$pUrl = 'images/pictures/1.jpg';
$pView = '';
if(isset($_GET['edit'])){
    if (is_numeric($_GET['edit'])){
        $sql_get_data = "
SELECT
    `product_id`,
    `product_link`,
    `product_name`,
    `product_desc`,
    `product_price`,
    `product_pic`,
    `product_view`,
    `product_click`
FROM
    `products`
WHERE
    product_id =".$_GET['edit'];
        if($res_get_data = $mysqli->query($sql_get_data)){
            if($row_data = $res_get_data->fetch_assoc()){
                $pDescription = $row_data['product_desc'];
                $pPrice = $row_data['product_price'];
                $pName = $row_data['product_name'];
                $pLink = $row_data['product_link'];
                $pUrl = $row_data['product_pic'];
                $pView = $row_data['product_view'];
            }
        }
    }
}
if(isset($_POST['add'])){
    $pUrl = $_POST['pUrl'];
    $pLink = $_POST['pLink'];
    $pName = $_POST['pName'];
    $pPrice = $_POST['pPrice'];
    $pDescription = $_POST['pDescription'];
    $pView = $_POST['pView'];
if(isset($_GET['edit'])){
    if (is_numeric($_GET['edit'])){
        $sql_get_data = "
SELECT
    *
FROM
    `products`
WHERE
    product_id =".$_GET['edit'];
        if($res_get_data = $mysqli->query($sql_get_data)){
            if($row_data = $res_get_data->fetch_assoc()){
                $sql_update = "
UPDATE
    `products`
SET
    `product_link` = '$pLink',
    `product_name` = '$pName',
    `product_desc` = '$pDescription',
    `product_price` = '$pPrice',
    `product_pic` = '$pUrl',
    `product_view` = '$pView'
WHERE
	product_id =".$_GET['edit'];
                if($mysqli->query($sql_update)){
                    echo sweetalert2('success','Updated',3000,'top');
                }else{
                    echo sweetalert2('warning','Oops .. somthing went wrong',3000,'top');
                }
            }else{
                $sql_insert = "
                INSERT INTO `products`( `product_link`, `product_name`, `product_desc`, `product_price`, `product_pic`, `product_view`) VALUES ('$pLink','$pName','$pDescription','$pPrice','$pUrl','$pView')
                ";
                if($mysqli->query($sql_insert)){
                    echo sweetalert2('success','Added',3000,'top');
                }else{
                    echo sweetalert2('warning','Oops .. somthing went wrong',3000,'top');
                }
            }
        }else{
            $sql_insert = "
            INSERT INTO `products`( `product_link`, `product_name`, `product_desc`, `product_price`, `product_pic`, `product_view`) VALUES ('$pLink','$pName','$pDescription','$pPrice','$pUrl','$pView')
            ";
            if($mysqli->query($sql_insert)){
                echo sweetalert2('success','Added',3000,'top');
            }else{
                echo sweetalert2('warning','Oops .. somthing went wrong',3000,'top');
            }
        }
    }else{
        $sql_insert = "
        INSERT INTO `products`( `product_link`, `product_name`, `product_desc`, `product_price`, `product_pic`, `product_view`) VALUES ('$pLink','$pName','$pDescription','$pPrice','$pUrl','$pView')
        ";
        if($mysqli->query($sql_insert)){
            echo sweetalert2('success','Added',3000,'top');
        }else{
            echo sweetalert2('warning','Oops .. somthing went wrong',3000,'top');
        }
    }
}else{
    $sql_insert = "
    INSERT INTO `products`( `product_link`, `product_name`, `product_desc`, `product_price`, `product_pic`, `product_view`) VALUES ('$pLink','$pName','$pDescription','$pPrice','$pUrl','$pView')
    ";
    if($mysqli->query($sql_insert)){
        echo sweetalert2('success','Added',3000,'top');
    }else{
        echo sweetalert2('warning','Oops .. somthing went wrong',3000,'top');
    }
}

}
?>
        <form method="POST" id="f1">
        	<div class="row" style="margin-bottom:25px;margin-left: 5%;">
        	    <!---->
        	    <div class="col-6 mb-4 pe-0 mt-3">
                    <a id="PDemoLink" href="<?echo $pLink?>"
                        target="_blank">
                        <img id="PDemoImg" src="<?echo $pUrl?>"
                            class="rounded-sm shadow-xl img-fluid"></a>
                </div>
                <div class="col-6 mt-3">
                    <a href="https://www.carrefourjordan.com/mafjor/ar/sugar-free/storck-werthers-sugar-free-box-42-g/p/288352?list_name=category%7CFJOR1200000"
                        target="_blank">
                        <h5 id="PDemoName" class="mb-0"><?echo $pName?></h5>
                    </a>
                    <h1 id="PDemoPrice" class="mt-1 mb-n2 font-800"><?echo $pPrice?></h1>
                    <h6 id="PDemoDesc">
                        <?echo $pDescription?>
                    </h6>
                </div>
                <div class = "row">
                    <div class="col-12">
                        <div class="input-style no-borders has-icon mb-4">
                            <i class="fa fa-link"></i>
                            <input id="pUrl" type="text" name="pUrl" class="form-control " value="<?echo $pUrl?>" placeholder="Enter new product Image (URL)" required>
                            <label for="form1a" class="color-highlight">Enter new product Image (URL)</label>
                            <em>(required)</em>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="input-style no-borders has-icon mb-4">
                            <i class="fa fa-link"></i>
                            <input id="pLink" type="text" name="pLink" class="form-control " value="<?echo $pLink?>" placeholder="Enter new product Link (URL)" required>
                            <label for="form1a" class="color-highlight">Enter new product Link (URL)</label>
                            <em>(required)</em>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="input-style no-borders has-icon mb-4">
                            <i class="fa fa-user"></i>
                            <input id="pName" type="name" name="pName" class="form-control " value="<?echo $pName?>" placeholder="Enter new product name" required>
                            <label for="form1a" class="color-highlight">Enter new product name</label>
                            <em>(required)</em>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="input-style no-borders has-icon mb-4">
                            <i class="fa fa-credit-card-alt"></i>
                            <input id="pPrice" type="number" step="0.01" name="pPrice" class="form-control " value="<?echo $pPrice?>" placeholder="Enter new product Price" required>
                            <label for="form1a" class="color-highlight">Enter new product Price</label>
                            <em>(required)</em>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="input-style no-borders has-icon mb-4">
                            <i class="fa fa-file-text"></i>
                            <textarea name="pDescription"  id="pDescription" placeholder="Enter new product description" required><?echo $pDescription?></textarea>
                            <label for="description" class="color-highlight">Enter new product description</label>
                            <em>(required)</em>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-check icon-check">
                            <input name="pView" class="form-check-input" type="radio" value="Featured" <?echo ($pView =='Featured')? 'checked':''?> id="pFeatured">
                            <label class="form-check-label" for="pFeatured">Featured</label>
                            <i class="icon-check-1 fa fa-circle color-gray-dark font-16"></i>
                            <i class="icon-check-2 fa fa-check-circle font-16 color-highlight"></i>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-check icon-check">
                            <input name="pView" class="form-check-input" type="radio" value="Head" <?echo ($pView =='Head')? 'checked':''?> id="pHead">
                            <label class="form-check-label" for="pHead">Head</label>
                            <i class="icon-check-1 fa fa-circle color-gray-dark font-16"></i>
                            <i class="icon-check-2 fa fa-check-circle font-16 color-highlight"></i>
                        </div>
                    </div>
                </div>
                <div class ="row">
                    <button name = "add" onclick="" type="submit" class="gradient-highlight btn btn-s border-white mt-2" style=""><?echo (isset($_GET['edit']))? 'Update':'Add'?></button>
                </div>
        	    <!---->
        	</div>
        </form>
<script type="text/javascript">
var uploadPUrl = document.getElementById("pUrl");
var uploadPName = document.getElementById("pName");
var uploadPPrice = document.getElementById("pPrice");
var uploadPDesc = document.getElementById("pDescription");
var uploadPLink = document.getElementById("pLink");

var uploadPDemoImg = document.getElementById("PDemoImg");
var uploadPDemoName = document.getElementById("PDemoName");
var uploadPPDemoPrice = document.getElementById("PDemoPrice");
var uploadPPDemoDesc = document.getElementById("PDemoDesc");
var uploadPDemoLink = document.getElementById("PDemoLink");

uploadPUrl.addEventListener('keyup',e=>{
    var uploadPUrl_v = uploadPUrl.value;
    uploadPDemoImg.src = uploadPUrl_v;
});
uploadPName.addEventListener('keyup',e=>{
    var uploadPName_v = uploadPName.value;
    uploadPDemoName.innerHTML  = uploadPName_v;
});
uploadPPrice.addEventListener('keyup',e=>{
    var uploadPPrice_v = uploadPPrice.value;
    uploadPPDemoPrice.innerHTML  = 'JD '+uploadPPrice_v;
});
uploadPDesc.addEventListener('keyup',e=>{
    var uploadPDesc_v = uploadPDesc.value;
    uploadPPDemoDesc.innerHTML  = uploadPDesc_v;
});
uploadPLink.addEventListener('keyup',e=>{
    var uploadPLink_v = uploadPLink.value;
    uploadPDemoLink.setAttribute("href", uploadPLink_v);
});

// 
// // var flag = <?php //if(!$path)echo 1 ?>;
// var p_test = 0;
// var d_test = 0;
// var n_test = 0;

//setInterval(myFunction, 1000);
// function myFunction() {
// const [file] = logo.files   
//     if(description.value.length > 0 && service_name.value.length > 0){
//         update_logo.style.display = "unset";
//     }else{
//         update_logo.style.display = "none";
//     }
// }

</script>
    </div>
    <!--card card-full-left card-style-->
    <?
    //include 'sections/upload_service.php';
    ?>
</div>    
    
    
    
    <!---->


</div>
<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
</body>
