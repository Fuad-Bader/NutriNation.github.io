<?
include 'controllers/head.php';
?>

<body class="theme-light" data-highlight="highlight-red">
<style>
table {
  border-collapse: collapse;
}

td, th {
  border: 1px solid white;
}
</style>
<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>

<div id="page">

    <div class="header header-auto-show header-fixed header-logo-center">
        <a href="index.html" class="header-title">Profile</a>
        <a href="#" data-menu="menu-main" class="header-icon header-icon-1"><i class="fas fa-bars"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-4 show-on-theme-dark"><i class="fas fa-sun"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-4 show-on-theme-light"><i class="fas fa-moon"></i></a>
        <a href="#" data-menu="menu-share" class="header-icon header-icon-3"><i class="fas fa-share-alt"></i></a>
    </div>

    

<?
$page_name = 'Profile';
include 'controllers/header.php';

if(isset($_POST['new_record'])){
    $weight = $_POST['weight'];
    $height = $_POST['height'];
    $age = $_POST['age'];
    $physicalActivity = $_POST['physicalActivity'];
    $Target = $_POST['Target'];
    $birthday = $_POST['birthday'];
    $mysqli->query("update user set birthday = '$birthday' where guid = '".$user_info['guid']."'");
    $res_update = $mysqli->query("select * from user where guid = '".$user_info['guid']."'");
    $_SESSION["user_info"] = $row = $res_update->fetch_assoc();
        $sql_med = "
INSERT INTO `MedicalRecords`(
    `record_user_guid`,
    `record_height`,
    `record_weight`,
    `record_age`,
    `record_physicalActivity`,
    `record_Target`
)
VALUES(
    '".$user_info['guid']."',
    '$height',
    '$weight',
    '$age',
    '$physicalActivity',
    '$Target'
)
        ";
        if($mysqli->query($sql_med)){
            echo sweetalert2 ('success','your information has been updated',5000,'top');
        }
}


$bmi = $user_bmi['BMI'];
if ($bmi < 15.9) {
    $img_src = "Main/FinalProj-Template/img/images/body/less16.png";
} else if ($bmi >= 16 && $bmi <= 16.9) {
    $img_src = "Main/FinalProj-Template/img/images/body/16to17.png";
} else if ($bmi >= 17 && $bmi <= 18.4) {
    $img_src = "Main/FinalProj-Template/img/images/body/17to18.5.png";
} else if ($bmi >= 18.5 && $bmi <= 24.9) {
    $img_src = "Main/FinalProj-Template/img/images/body/18.5to25.png";
} else if ($bmi >= 25 && $bmi <= 29.9) {
    $img_src = "Main/FinalProj-Template/img/images/body/25to30.png";
} else if ($bmi >= 30 && $bmi <= 34.9) {
    $img_src = "Main/FinalProj-Template/img/images/body/30to35.png";
} else if ($bmi >= 35 && $bmi <= 39.9) {
    $img_src = "Main/FinalProj-Template/img/images/body/35to40.png";
} else if ($bmi >= 40) {
    $img_src = "Main/FinalProj-Template/img/images/body/more40.png";
} else {
    $img_src = "Main/FinalProj-Template/img/images/body/b&w.png";
}



?>

    <div class="page-title page-title-fixed">
        <h1>Profile</h1>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-share"><i class="fa fa-share-alt"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-light" data-toggle-theme><i class="fa fa-moon"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-dark" data-toggle-theme><i class="fa fa-lightbulb color-yellow-dark"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-main"><i class="fa fa-bars"></i></a>
    </div>
    <div class="page-title-clear"></div>
        
    <div class="page-content">
             
        <div class="card card-style">
            
            <div class="d-flex content mb-1">
                <!-- left side of profile -->
                <div class="flex-grow-1 align-items-center">
                    <h2>Welcome <?echo $User_firstName?>
                        <!--<i class="fa fa-check-circle color-blue-dark font-18 mt-2 ms-3"></i>\-->
                    </h2>
                    <br>
                    <p>Access your information from the tabs below</p>
                </div>
                <!-- right side of profile. increase image width to increase column size-->
                <!--<img src="<?echo $user_info['user_pic']?>" width="115" height="103" class="rounded-circle mt-3 shadow-xl">-->
            </div>
            <!-- follow buttons-->
            <div class="content mb-0">
                <div class="row mb-0">
                    <div class="col-7">
                        
                    </div>
                    <div class="col-5">
                        
                    </div>
                </div>
            </div>
            
            <div class="divider mt-4 mb-0"></div>
            
            <!---->
            
            <div class="content" id="tab-group-2">
                <div class="tab-controls tabs-small tabs-rounded" data-highlight="bg-highlight">
                    <a href="#" data-active data-bs-toggle="collapse" data-bs-target="#tab-5">User Info</a>
                    <a href="#" data-bs-toggle="collapse" data-bs-target="#tab-6">BMI</a>
                    <a href="#" data-bs-toggle="collapse" data-bs-target="#tab-7">Medical Records</a>
                </div>
                <div class="clearfix mb-3"></div>
                <div data-bs-parent="#tab-group-2" class="collapse show" id="tab-5">
                    <form method = "post">
                        <div class="content">
                            <div class="d-flex mb-4">
                                <div class="align-self-center">
                                    <h1 class="font-40 opacity-20 mb-n1 icon-80"><i class="fa fa-user" aria-hidden="true"></i></h1>
                                </div>
                                <div class="align-self-center">
                                    <h5 class="font-12 mb-n1 opacity-30">Full name</h5>
                                    <h5 class="mb-0"><?echo $user_info['FullName']?></h5>
                                </div>
                            </div>
                            <div class="d-flex mb-4">
                                <div class="align-self-center">
                                    <h1 class="font-40 opacity-20 mb-n1 icon-80"><i class="fa fa-envelope" aria-hidden="true"></i></h1>
                                </div>
                                <div class="align-self-center">
                                    <h5 class="font-12 mb-n1 opacity-30">Email</h5>
                                    <h5 class="mb-0"><?echo $user_info['email']?></h5>
                                </div>
                            </div>
                            <div class="d-flex mb-4">
                                <div class="align-self-center">
                                    <h1 class="font-40 opacity-20 mb-n1 icon-80"><i class="fa fa-venus-mars" aria-hidden="true"></i></h1>
                                </div>
                                <div class="align-self-center">
                                    <h5 class="font-12 mb-n1 opacity-30">Gender</h5>
                                    <h5 class="mb-0"><?echo $user_info['Gender']?></h5>
                                </div>
                            </div>
                            <div class="d-flex mb-4">
                                <div class="align-self-center">
                                    <h1 class="font-40 opacity-20 mb-n1 icon-80"><i class="fa fa-calendar" aria-hidden="true"></i></h1>
                                </div>
                                <div class="align-self-center">
                                    <h5 class="font-12 mb-n1 opacity-30">Date of birth</h5>
                                    <h5 class="mb-0">
                                        <div class="input-style no-borders has-icon validate-field mb-4">
                                            <input type="date" class="form-control" style="padding-left: 0px;font-size: 16px !important;line-height: 22px;font-weight: bold;background-color: transparent;" value="<?echo $user_info['birthday']?>" name="birthday" id ="signup-birthday" placeholder="Date of birth">
                                        </div>
                                    </h5>
                                </div>
                            </div>
                            <div class="d-flex mb-4">
                                <div class="align-self-center">
                                    <h1 class="font-40 opacity-20 mb-n1 icon-80"><i class="fa fa-calendar" aria-hidden="true"></i></h1>
                                </div>
                                <div class="align-self-center">
                                    <h5 class="font-12 mb-n1 opacity-30">Age</h5>
                                    <h5 class="mb-0">
                                        <div class="input-style no-borders has-icon validate-field mb-4">
                                            <input type="number" class="form-control" style="padding-left: 0px;font-size: 16px !important;line-height: 22px;font-weight: bold;background-color: transparent;" value="<?echo $user_info['Age']?>" name="age" id ="signup-age" placeholder="Age" readonly>
                                        </div>
                                    </h5>
                                </div>
                            </div>
                            
                            <div class="d-flex mb-4">
                                <div class="align-self-center">
                                    <h1 class="font-40 opacity-20 mb-n1 icon-80"><i class="fa fa-arrows-v" aria-hidden="true"></i></h1>
                                </div>
                                <div class="align-self-center">
                                    <h5 class="font-12 mb-n1 opacity-30">Height (cm)</h5>
                                    <h5 class="mb-0">
                                        <div class="input-style no-borders has-icon validate-field mb-4">
                                            <input type="number" class="form-control" style="padding-left: 0px;font-size: 16px !important;line-height: 22px;font-weight: bold;" value="<?echo $user_med['record_height']?>" name="height" id ="signup-height" placeholder="Age">
                                        </div>
                                    </h5>
                                </div>
                            </div>
                            <div class="d-flex mb-4">
                                <div class="align-self-center">
                                    <h1 class="font-40 opacity-20 mb-n1 icon-80"><i class="fa fa-user-circle" aria-hidden="true"></i></h1>
                                </div>
                                <div class="align-self-center">
                                    <h5 class="font-12 mb-n1 opacity-30">Weight (kg)</h5>
                                    <h5 class="mb-0">
                                        <div class="input-style no-borders has-icon validate-field mb-4">
                                            <input type="number" class="form-control" style="padding-left: 0px;font-size: 16px !important;line-height: 22px;font-weight: bold;" value="<?echo $user_med['record_weight']?>" name="weight" id ="signup-weight" placeholder="Age">
                                        </div>
                                    </h5>
                                </div>
                            </div>
                            <div class="d-flex mb-4">
                                <div class="align-self-center">
                                    <h1 class="font-40 opacity-20 mb-n1 icon-80"><i class="fa fa-male" aria-hidden="true"></i></h1>
                                </div>
                                <div class="align-self-center">
                                    <h5 class="font-12 mb-n1 opacity-30">physicalActivity</h5>
                                    <h5 class="mb-0">
                                        <div class="input-style no-icon mb-4">
                                            <select style="padding-left: 0px;font-size: 16px !important;line-height: 22px;font-weight: bold;" name="physicalActivity" id="physicalActivity">
                                                <option value="0">Choose physical activity</option>
                                                <option value="sedentary"
                                                <?echo ($user_med['record_physicalActivity'] == 'sedentary') ? 'selected' : ''?>
                                                >Sedentary</option>
                                                <option value="lightly active"
                                                <?echo ($user_med['record_physicalActivity'] == 'lightly active') ? 'selected' : ''?>
                                                >Lightly active</option>
                                                <option value="moderately active"
                                                <?echo ($user_med['record_physicalActivity'] == 'moderately active') ? 'selected' : ''?>
                                                >Moderately active</option>
                                                <option value="very active"
                                                <?echo ($user_med['record_physicalActivity'] == 'very active') ? 'selected' : ''?>
                                                >Very active</option>
                                                <option value="extremely active"
                                                <?echo ($user_med['record_physicalActivity'] == 'extremely active') ? 'selected' : ''?>
                                                >Extremely active</option>
                                            </select>
                                            <span><i class="fa fa-chevron-down"></i></span>
                                        </div>
                                    </h5>
                                </div>
                            </div>
                            <div class="d-flex mb-4">
                                <div class="align-self-center">
                                    <h1 class="font-40 opacity-20 mb-n1 icon-80"><i class="fa fa-check" aria-hidden="true"></i></h1>
                                </div>
                                <div class="align-self-center">
                                    <h5 class="font-12 mb-n1 opacity-30">Target</h5>
                                    <h5 class="mb-0">
                                        <div class="input-style no-icon mb-4">
                                            <select name="Target" style="padding-left: 0px;font-size: 16px !important;line-height: 22px;font-weight: bold;" id="Target">
                                                <option value="0">Choose Your Target</option>
                                                <option value="Lose weight"
                                                <?echo ($user_med['record_Target'] == 'Lose weight') ? 'selected' : ''?>
                                                >Lose weight</option>
                                                <option value="Gain weight"
                                                <?echo ($user_med['record_Target'] == 'Gain weight') ? 'selected' : ''?>
                                                >Gain weight</option>
                                                <option value="Stay at the same weight"
                                                <?echo ($user_med['record_Target'] == 'Stay at the same weight') ? 'selected' : ''?>
                                                >Stay at the same weight</option>
                                            </select>
                                            <span><i class="fa fa-chevron-down"></i></span>
                                        </div>
                                    </h5>
                                </div>
                            </div>
                            <center><button type="submit" name="new_record" class="btn btn-full btn-sm rounded-s font-600 font-13 color-highlight border-highlight">Update Records</button></center>
                        </div>
                    </form>
                </div>
                <div data-bs-parent="#tab-group-2" class="collapse" id="tab-6">
                    <div class="content">
                        <div class="d-flex mb-4">
                            <div class="align-self-center">
                                <h1 class="font-40 opacity-20 mb-n1 icon-80">1</h1>
                            </div>
                            <div class="align-self-center">
                                <h5 class="font-12 mb-n1 opacity-30">The Daily Calories You Need</h5>
                                <h5 class="mb-0"><?echo $user_bmi['DailyCalories']?></h5>
                            </div>
                        </div>
                        <div class="d-flex mb-4">
                            <div class="align-self-center">
                                <h1 class="font-40 opacity-20 mb-n1 icon-80">2</h1>
                            </div>
                            <div class="align-self-center">
                                <h5 class="font-12 mb-n1 opacity-30">Your Body Mass Index Is</h5>
                                <h5 class="mb-0"><?echo $user_bmi['BMI']?></h5>
                            </div>
                        </div>
                        <div class="d-flex mb-4">
                            <div class="align-self-center">
                                <h1 class="font-40 opacity-20 mb-n1 icon-80">3</h1>
                            </div>
                            <div class="align-self-center">
                                <h5 class="font-12 mb-n1 opacity-30">The daily calories you need to achieve your target</h5>
                                <h5 class="mb-0"><?echo $user_bmi['CaloriesToTarget']?></h5>
                            </div>
                        </div>
                        <div class="d-flex mb-4">
                            <div class="align-self-center">
                                <h1 class="font-40 opacity-20 mb-n1 icon-80">4</h1>
                            </div>
                            <div class="align-self-center">
                                <h5 class="mb-0"><img id="myImage" src="<?echo $img_src?>" height="50%" width="100%"></h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div data-bs-parent="#tab-group-2" class="collapse" id="tab-7">
                    <table class="table table-borderless text-center rounded-sm shadow-l " style="overflow: hidden;">
                        <thead>
                            <tr>
                                <th scope="col" class="bg-highlight color-white py-3 font-14">Modify date</th>
                                <th scope="col" class="bg-highlight color-white py-3 font-14">BMI</th>
                                <th scope="col" class="bg-highlight color-white py-3 font-14">Weight</th>
                                <th scope="col" class="bg-highlight color-white py-3 font-14">Age</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?
$sql_med = "
SELECT
    `record_id`,
    `record_user_guid`,
    `record_height`,
    `record_weight`,
    `record_age`,
    `record_physicalActivity`,
    `record_Target`,
    `record_date`
FROM
    `MedicalRecords`
WHERE
    record_user_guid = '".$user_info['guid']."'
    order by record_id desc
";
$res_med = $mysqli->query($sql_med);
while ($row = $res_med->fetch_assoc()){
$user_bmi = calculateBMIandCalories($user_info['Gender'], $row['record_age'], $row['record_height'], $row['record_weight'], $row['record_physicalActivity'], $row['record_Target']);
                            ?>
                            <tr class="bg-highlight color-gray-light">
                                <td><?echo $row['record_date']?></td>
                                <td><?echo $user_bmi['BMI']?></td>
                                <td><?echo $row['record_weight']?></td>
                                <td><?echo $row['record_age']?></td>
                            </tr>
                            <?
}                            
                            ?>
                        </tbody>
                    </table>
                </div>
            </div>   
            
            <!---->
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
    // Get the elements by their IDs
var birthdayInput = document.getElementById('signup-birthday');
var ageOutput = document.getElementById('signup-age');

// Calculate the age based on the given birthday
function calculateAge() {
  var birthday = new Date(birthdayInput.value);
  var today = new Date();
  var age = today.getFullYear() - birthday.getFullYear();

  // Check if the birthday hasn't occurred yet this year
  if (
    today.getMonth() < birthday.getMonth() ||
    (today.getMonth() === birthday.getMonth() && today.getDate() < birthday.getDate())
  ) {
    age--;
  }

  // Update the value of the age element
  ageOutput.value = age;
}

// Add event listener to calculate the age when the birthday input changes
birthdayInput.addEventListener('change', calculateAge);

</script>
<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
</body>
