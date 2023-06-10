<?
include 'controllers/head.php';
?>
    
<body class="theme-light">
    
<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>

<div id="page">
    
    <div class="header header-fixed header-logo-center header-auto-show">
        <a href="index.php" class="header-title">Diet Plan</a>
        <a href="#" data-back-button class="header-icon header-icon-1"><i class="fas fa-chevron-left"></i></a>
        <a href="#" data-menu="menu-main" class="header-icon header-icon-4"><i class="fas fa-bars"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-dark"><i class="fas fa-sun"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-light"><i class="fas fa-moon"></i></a>
    </div>
<?if(!isset($_GET['reloaded'])){?>
<meta http-equiv="refresh" content="0;url=diet-plan.php?reloaded"> 
<?}?>
<?
$page_name = 'Diet Plan';
include 'controllers/header.php';
$currentDate = date("Y-m-d");
$sql_data = "
SELECT
    `id`,
    `record_guid`,
    `user_guid`,
    `caloreis_record`,
    `record_date`
FROM
    `calories`
WHERE
    record_date = '$currentDate' AND user_guid = '".$user_info['guid']."'
";
//echo $sql_data;
$res_plan_data = $mysqli->query($sql_data);
if($row_plan_data = $res_plan_data->fetch_assoc()){
    $plan_data = $row_plan_data;
    $sql_food_data = "
    select * from calories_record_details where calories_record_id = '".$plan_data['record_guid']."'
    ";
    $res_plan_food = $mysqli->query($sql_food_data);
    $data_food_plan = array();
    while($row_plan_food = $res_plan_food->fetch_assoc()){
        $data_food_plan[] = $row_plan_food['food_id'];
    }
}
if(isset($_POST['new_record'])){
    $sql = "SELECT uuid() as 'guid';";
    $res_guid = $mysqli->query($sql);
    $row_res_guid = $res_guid->fetch_assoc();
    $guid = $row_res_guid['guid'];
    $calories_record = $_POST['calories-record'];
    if(isset($plan_data['record_guid'])){
        $sql1="
UPDATE `calories` SET `caloreis_record`='$calories_record' WHERE record_guid = '".$plan_data['record_guid']."'
        ";
        //echo $sql1;
        $mysqli->query($sql1);
        if (isset($_POST['selectedFood'])) {
            $mysqli->query("delete from calories_record_details where calories_record_id = '".$plan_data['record_guid']."'");
            foreach ($_POST['selectedFood'] as $selectedFood) {
                $selectedFoodArray = json_decode(htmlspecialchars_decode($selectedFood), true);
                $id = $selectedFoodArray[1];
                $sql2 ="
INSERT INTO `calories_record_details`(`calories_record_id`, `food_id`) VALUES ('".$plan_data['record_guid']."','".$id."');
                    ";
                $mysqli->query($sql2);
            }
        }
        echo '<meta http-equiv="refresh" content="0;url=diet-plan.php">';
    }else{
        $sql1="
INSERT INTO `calories`(`record_guid`,`user_guid`, `caloreis_record`) VALUES ('$guid','".$user_info['guid']."','$calories_record')
        ";
        //echo $sql1;
        $mysqli->query($sql1);
        
        if (isset($_POST['selectedFood'])) {
            foreach ($_POST['selectedFood'] as $selectedFood) {
                $selectedFoodArray = json_decode(htmlspecialchars_decode($selectedFood), true);
                $id = $selectedFoodArray[1];
                $sql2 ="
INSERT INTO `calories_record_details`(`calories_record_id`, `food_id`) VALUES ('".$guid."','".$id."');
                    ";
                $mysqli->query($sql2);
            }
        }
        echo '<meta http-equiv="refresh" content="0;url=diet-plan.php">';
    }
}
?>
    
    <div class="page-title page-title-fixed">
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme me-0 ms-3" data-back-button><i class="fa fa-arrow-left"></i></a>
        <h1>Diet Plan</h1>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-light" data-toggle-theme><i class="fa fa-moon"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-dark" data-toggle-theme><i class="fa fa-lightbulb color-yellow-dark"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-main"><i class="fa fa-bars"></i></a>
    </div>
    <div class="page-title-clear"></div>
        
    <div class="page-content">

        
        <div class="card card-style">
            <div class="row mt-4 p-3 text-center" style="margin-bottom:0px">
                <div class="col-12">
                    <h2 id="calories-cons">
                        Consumed Calories : <?echo (isset($plan_data['caloreis_record'])) ? $plan_data['caloreis_record'] : '0' ?>
                    </h2>
                </div>
            </div>
            <div class="row p-3 text-center" style="">
                <div class="col-6" style="border: solid 1px;border-radius: 10px 0px 0 10px;">
                    The Daily Calories You Need : <? echo $user_bmi['DailyCalories'] ?>
                </div>
                <div class="col-6" style="border: solid 1px;border-radius: 0px 10px 10px 0px;">
                    The daily calories you need to achieve your target : <? echo $user_bmi['CaloriesToTarget'] ?>
                </div>
            </div>
            <div id="calories-alert">
                
            </div>
            <form method="POST" class="select-food">
                <center>
                    <button type="submit" name="new_record" class="btn btn-full btn-sm rounded-s font-600 font-13 color-highlight border-highlight">Update Diet</button>
                    <input type="number" name="calories-record" value="<?echo (isset($plan_data['caloreis_record'])) ? $plan_data['caloreis_record'] : '0' ?>" id="calories-record" hidden>
                </center>
            <div class="content mb-0 mt-3" id="diet-group">
                <div class="tab-controls tabs-small tabs-rounded" data-highlight="bg-highlight">
                    <?
                    $sql = "
SELECT type FROM `food`
GROUP by Type
                    ";
                    $res = $mysqli->query($sql);
                    $i=0;
                    while($row = $res->fetch_assoc()){
                    ?>
                    <a href="#" <?echo ($i == 0) ? 'data-active' : ''?> data-bs-toggle="collapse" data-bs-target="#<?echo $row['type']?>">
                        <?echo $row['type']?>
                    </a>
                    <?$i++;}?>
                </div>
                <div class="clearfix mb-4"></div>
                    
                <?
                $sql = "
SELECT type FROM `food`
GROUP by Type
                ";
                $res = $mysqli->query($sql);
                $i=0;
                $f=0;
                while($row = $res->fetch_assoc()){
                ?>
                <!--type card-->
                <div data-bs-parent="#diet-group" class="collapse <?echo ($i == 0 ) ? 'show' : ''?>" id="<?echo $row['type']?>">
                    <?
                    $sql2 = "
SELECT
    `id`,
    `Name`,
    `food_pic`,
    `Type`,
    `Calories`,
    `weight`
FROM
    `food`
WHERE TYPE
    = '".$row['type']."'
                    ";
                    $res2 = $mysqli->query($sql2);
                    
                    while($row2 = $res2->fetch_assoc()){
                    ?>
                    <!--food-->
                    <div class="d-flex mb-4">
                        <div class="align-self-center">
                            <img src="<?echo $row2['food_pic']?>" class="rounded-sm me-3" width="40">
                        </div>
                        <div class="align-self-center">
                            <p class="color-highlight font-11 mb-n2"><?echo $row2['Name']?></p>
                            <h2 class="font-15 line-height-s mt-1 mb-1">Calories : <?echo $row2['Calories']?> Per 100g</h2>
                        </div>
                        <div class="ms-auto ps-3 align-self-center text-center">
                            <div class="form-check icon-check">
                                <input class="form-check-input" name="selectedFood[]" type="checkbox" value="<?php echo htmlspecialchars(json_encode([$row2['Calories'], $row2['id']])); ?>" id="food-cb<?php echo $f; ?>" <?echo (isset($data_food_plan) && in_array($row2['id'], $data_food_plan)) ? 'checked' : ''?>>
                                <label class="form-check-label" for="food-cb<?echo $f;?>">Choose : <?echo $row2['Name']?></label>
                                <i class="icon-check-1 far fa-frown color-gray-dark font-20"></i>
                                <i class="icon-check-2 far fa-smile font-20 color-highlight"></i>
                            </div>
                        </div>
                    </div>
                    <!--food-->
                    <?$f++;}?>
                </div>
                <!--type card-->
                <?$i++;}?>
                
            </div>
            </form>
        </div>
<script>
function initialize() {
  const selectFoodDiv = document.querySelector('.select-food');
  const checkboxes = selectFoodDiv.querySelectorAll('input[type="checkbox"]');
  const maxCalories = parseInt(<?php echo $user_bmi['CaloriesToTarget']; ?>);
  const food_cons = document.getElementById("calories-cons");
  const caloriesRecord = document.getElementById("calories-record");
  const caloriesAlert = document.getElementById("calories-alert");
  var current_calories = parseInt(<?echo (isset($plan_data['caloreis_record'])) ? $plan_data['caloreis_record'] : '0' ?>);

  checkboxes.forEach(function (checkbox) {
    checkbox.addEventListener('change', function () {
        var value = JSON.parse(checkbox.value);
        var calories_cb = value[0];
      if (checkbox.checked) {
        if (current_calories >= maxCalories) {
          event.preventDefault();
          caloriesAlert.innerHTML = `
            <div class="ms-3 me-3 alert alert-small rounded-s shadow-xl bg-yellow-dark" role="alert" style="">
              <span><i class="fa fa-exclamation-triangle color-white"></i></span>
              <strong class="color-white">You have reached the max calories for the day</strong>
              <button type="button" class="close color-white opacity-60 font-16" data-bs-dismiss="alert" aria-label="Close">×</button>
            </div>
          `;
          checkbox.checked = false;
          return;
        } else {
          changeCalories('plus', calories_cb);
        }
      } else {
        changeCalories('minus', calories_cb);
      }
    });
  });

  function changeCalories(type, value) {
    var calories = parseInt(value);

    if (type === 'plus') {
      current_calories += calories;
    } else {
      current_calories -= calories;
    }

    food_cons.innerHTML = `Consumed Calories : ${current_calories}`;
    caloriesRecord.value = current_calories;
  }
}

document.addEventListener("DOMContentLoaded", initialize);

</script> 
            
        <div data-menu-load="menu-footer.html"></div>
    </div>
    <!-- Page content ends here-->
    
    <!-- Main Menu--> 
    <div id="menu-main" class="menu menu-box-left rounded-0" data-menu-load="menu-main.php" data-menu-width="280" data-menu-active="nav-components"></div>
    
    <!-- Share Menu-->
    <div id="menu-share" class="menu menu-box-bottom rounded-m" data-menu-load="menu-share.html" data-menu-height="370"></div>  
    
    <!-- Colors Menu-->
    <div id="menu-colors" class="menu menu-box-bottom rounded-m" data-menu-load="menu-colors.html" data-menu-height="480"></div> 
     
    
</div>

<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
</body>
