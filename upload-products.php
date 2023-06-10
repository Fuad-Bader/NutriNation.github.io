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
$page_name="Upload Product";
include 'controllers/header.php';
$sdescription = "";
$sname = "";
$slogo = "";
$defult_path = 'error';
if(isset($_POST['add'])){
    $target_dir = $imagePath;
    $ext = ".".pathinfo(basename($_FILES["logo"]["name"]), PATHINFO_EXTENSION);
    $target_image = $target_dir . RandomString(). $ext;
    if(basename($_FILES["logo"]["name"])!="")
    move_uploaded_file($_FILES["logo"]["tmp_name"], $target_image);
    else $target_image=$slogo;
    
    $ref_id = $user_info['national_number'];
    $service_name = $_POST['sname'];
    $service_desc = $_POST['description'];
    
    if ((isset($_GET['shop']) && $_GET['shop'] == 'update')){
        $sql = "UPDATE `shop_services` SET `service_logo`='$target_image',`service_name`='$service_name',`service_desc`='$service_desc' WHERE shop_id = ".$_GET['shop_id']." AND service_id = ".$_GET['service'];
        if($mysqli->query($sql)){
            echo sweetalert2('success',updated,3000,'top');
        }else{
            echo sweetalert2('warning','Opss .. somthing went wrong',3000,'top');
        }
    }elseif(isset($_GET['vet']) && $_GET['vet'] == 'update'){
        $sql = "UPDATE `veterinarian_services` SET `service_logo`='$target_image',`service_name`='$service_name',`service_desc`='$service_desc' WHERE veterinarian_id = ".$_GET['clinic_id']." AND service_id = ".$_GET['service'];
        if($mysqli->query($sql)){
            echo sweetalert2('success','Updated',3000,'top');
        }else{
            echo sweetalert2('warning','Opss .. somthing went wrong',3000,'top');
        }
        
    }elseif ((isset($_GET['shop']) && $_GET['shop'] == 'add') || (isset($_GET['vet']) && $_GET['vet'] == 'add')){
        $sql = "INSERT INTO `$tableName`( `$idClmn`, `service_logo`, `service_name`, `service_desc`) VALUES ('$ref_id','$target_image','$service_name','$service_desc')";
        if($mysqli->query($sql)){
            echo sweetalert2('success','Added',3000,'top');
        }else{
            echo sweetalert2('warning','Opss .. somthing went wrong',3000,'top');
        }
    }
    
}


$path = false;
if ($defult_path == "images/empty.png"){
  $path = false;
}else{
  $path = true;
}
?>

<div class="page-content">
    <div class="card card-full-left card-style">
        <div style="width:100%;text-align:center;padding: 25px 10px 10px 10px;height:auto"> 
            <div class="col-md-12" style="padding-bottom:15px;">
                <span class="cat-title" >Upload Product</span>
            </div>
        </div>
        <!--enctype="multipart/form-data"-->
        <form method="POST" id="f1" enctype="multipart/form-data">
        	<div class="row" style="margin-bottom:25px;margin-left: 12%;">
        	    <!---->
        	    <div class="col-6 mb-4 pe-0">
                    <a href="https://www.carrefourjordan.com/mafjor/ar/sugar-free/storck-werthers-sugar-free-box-42-g/p/288352?list_name=category%7CFJOR1200000"
                        target="_blank">
                        <img src="images/carrefour-products/werther.jpg"
                            class="rounded-sm shadow-xl img-fluid"></a>
                </div>
                <div class="col-6">
                    <a href="#" class="d-block">
                        <i class="fa fa-star color-yellow-dark"></i>
                        <i class="fa fa-star color-yellow-dark"></i>
                        <i class="fa fa-star color-yellow-dark"></i>
                        <i class="fa fa-star color-yellow-dark"></i>
                        <i class="fa fa-star color-yellow-dark"></i><br>
                    </a>
                    <a href="https://www.carrefourjordan.com/mafjor/ar/sugar-free/storck-werthers-sugar-free-box-42-g/p/288352?list_name=category%7CFJOR1200000"
                        target="_blank">
                        <h5 class="mb-0">Sugar-free candies</h5>
                        <span class="color-green-dark font-10">In Stock</span>
                    </a>
                    <h1 class="mt-1 mb-n2 font-800">$0<sup class="font-300 font-16">.95</sup></h1>
                    <span class="opacity-50 font-11"><del>$1<sup>.9</sup></del> (- 50%)</span>
                </div>
        	    <!---->
                <div class="col-md-12" style="margin-top:14px;">
                    <div class="col-6 pe-2">
                        <a href="#" id="clinic_logo" class="card card-style mx-0 mb-3 bg-1" style="background-image: url(<?echo $slogo?>);" data-card-height="150">
                            <div class="card-center ps-3">
                                <h1 id="service-name" class="color-white mb-n1 font-24"><?echo $sname?></h1>
                                <p id="service-desc" class="color-white opacity-50 mb-0 font-11 mt-n2"><?echo $sdescription?></p>
                            </div>
                            <div class="card-overlay bg-black opacity-60"></div>
                        </a>
                    </div>
                    <div class="input-style no-borders has-icon mb-4">
                        <i class="fa fa-user"></i>
                        <input id="name" type="name" name="sname" value="<?echo $sname?>" class="form-control " placeholder="Enter new product name" required>
                        <label for="form1a" class="color-highlight">Enter new product name</label>
                        <em>(required)</em>
                    </div>
                    <div class="input-style no-borders has-icon mb-4">
                        <i class="fa fa-file-text"></i>
                        <textarea name="description"  id="description" placeholder="Enter new product description" required><?echo $sdescription?></textarea>
                        <label for="description" class="color-highlight">Enter new product description</label>
                        <em>(required)</em>
                    </div>
                    <div>
                        <button  onclick="getFile()" type="button" class="gradient-highlight btn btn-s border-white mt-2"style="border-radius: 12px 0px 0px 12px;"><i class="fa fa-camera pe-2"></i>Upload Image</button>
                        <button id="update_logo" name = "add" onclick="prevent(event)" type="submit" class="gradient-highlight btn btn-s border-white mt-2" style="border-radius: 0px 12px 12px 0px;display:none;">ADD</button>
                        <input  style="height:0px;width:0px;display:none;" accept="image/*" type="file" id="logo" name="logo">
                    </div>
        		</div>
        	</div>
        </form>
<script type="text/javascript">
var update_logo = document.getElementById("update_logo");
var description = document.getElementById("description");
var service_name = document.getElementById("name");
var demo_name = document.getElementById("service-name");
var demo_desc = document.getElementById("service-desc");

setInterval(myFunction, 1000);
function myFunction() {
const [file] = logo.files   
    if(description.value.length > 0 && service_name.value.length > 0){
        update_logo.style.display = "unset";
    }else{
        update_logo.style.display = "none";
    }
}
// var flag = <?php //if(!$path)echo 1 ?>;
var p_test = 0;
var d_test = 0;
var n_test = 0;
function getFile(){
     document.getElementById("logo").click();
    //  console.log(name_v);
    //  console.log(description_v);
}

description.addEventListener('keyup',e=>{
    var description_v = description.value;
    demo_desc.innerHTML = description_v;
    if (description_v.length > 0) {
        d_test = 1;
        if(p_test == 1 && d_test == 1 && n_test == 1){
            update_logo.style.display = "unset";
        }
    } else {
        d_test = 0;
        update_logo.style.display = "none";
        e.preventDefault();
    }
});
service_name.addEventListener('keyup',e=>{
    var name_v = service_name.value;
    demo_name.innerHTML = name_v;
    if (name_v.length > 0) {
        n_test = 1;
        if(p_test == 1 && d_test == 1 && n_test == 1){
            update_logo.style.display = "unset";
        }
    } else {
        n_test = 0;
        update_logo.style.display = "none";
        e.preventDefault();
    }
}); 

logo.onchange = evt => {
const [file] = logo.files
  if (file) {
    clinic_logo.style.backgroundImage = "url('"+URL.createObjectURL(file)+"')";
    //flag = 0;
    p_test = 1;
    if(p_test == 1 && d_test == 1 && n_test == 1){
        update_logo.style.display = "unset";
    }
  }
}



function prevent(e) {
const [file] = logo.files
    if (!file) {
        //e.preventDefault();
        //alert("hello");
    }
}

</script>
    </div>
    <!--card card-full-left card-style-->
    <?
    //include 'sections/upload_service.php';
    ?>
</div>
<!-- Page content ends here-->

<!-- Main Menu--> 
<div id="menu-main" class="menu menu-box-left rounded-0" data-menu-load="menu-main.php" data-menu-width="280" data-menu-active="nav-pages"></div>

<!-- Share Menu-->
<div id="menu-share" class="menu menu-box-bottom rounded-m" data-menu-load="menu-share.html" data-menu-height="370"></div>  

<!-- Colors Menu-->
<div id="menu-colors" class="menu menu-box-bottom rounded-m" data-menu-load="menu-colors.html" data-menu-height="480"></div> 
<?
include 'controllers/footer.php';
?>