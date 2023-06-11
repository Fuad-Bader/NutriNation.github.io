<?php
//echo'<script>alert("test login")</script>';
include 'database_connection.php';
$notV_flag = false;
$eMsg="";
if(isset($_POST["log_out"]))
{
        if(isset($logoutflag)){
            header("Location: $logoutflag");
            //echo '<script>window.location.replace("'.$logoutflag.'");</script>';  
        }
        //echo '<script>alert("'.$logoutflag.'")</script>';
    //session_destroy();
    session_unset();
    unset($_COOKIE['login']);
    unset($_COOKIE['PHPSESSID']);
    setcookie('login', '', time() - 3600, '/');
}

//if(!isset($page)){$page="Home";$json[$page]["subtitle"]="Home";}
if (session_status() === PHP_SESSION_NONE) {
    session_start();
    $falg1 = 1;
}


$islogedin=false;

if (isset($_POST['login'])){
    //echo'<script>alert("test")</script>';
    //form data
    $e=$mysqli->real_escape_string($_POST['email']);
    $p=$mysqli->real_escape_string($_POST['password']);
    $p = md5($p);
    
    //get the data from the database
    $sql="SELECT * FROM `user` WHERE `email` = '$e' AND `password` = '$p' LIMIT 1";
    $result = $mysqli->query($sql);
    
    if ($row = $result->fetch_assoc()){
        //logged in
        
        //check if the account is verified
        $verified = $row['verified'];
        $email = $row['email'];
        $date = $row['createdate'];
        $date = strtotime ($date);
        $date = date('M d Y',$date);
        
        if ($verified == 1){
            //continue the prosses
            $user_info=$row;
            $_SESSION["user_info"]=$user_info;
            $_SESSION["login"]=true;
            $_COOKIE['login'] = serialize($_SESSION["user_info"]);
            setcookie('login', $_COOKIE['login'], time() + (86400 * 30), "/"); // set the cookie for 30 days
            
            header("Location: index.php");
        }else{
            $notV_flag = true;
            $eMsg = "This acconut has not yet been verified !. an email has been sent to ".$email." at ".$date;
        }
        
    }else{
        echo '<script>alert("the email or password is incorrect !");</script>';
    }
    
}else{
    
}


if(isset($_SESSION["error"])){
echo '<script>alert("'.$_SESSION["error"].'");</script>';
unset($_SESSION["error"]);
}

if(isset($_SESSION["alert"])){
echo '<script>alert("'.$_SESSION["alert"].'");</script>';
unset($_SESSION["alert"]);
}

if(isset($_SESSION["user_info"]))
if($_SESSION["login"]==true)
{
    $islogedin=true;
    $user_info=$_SESSION["user_info"];
    $name = $user_info['FullName'];
    $nameParts = explode(" ", $name);
    $User_firstName = $nameParts[0];
    
} 


function RandomString()
{
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randstring = '';
    for ($i = 0; $i < 10; $i++) {
        $randstring.= $characters[rand(0, strlen($characters)-1)];
    }
    return $randstring;
}
function mailto ($to,$subject,$message){
    $headers = 'From: no-reply@snobar-software.tech' . "\r\n".'X-Mailer: PHP/' . phpversion();
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
    
    if(mail($to, $subject, $message, $headers)){
        return true;
    }else{
        return false;
    }
}
function sweetalert2 ($icon,$text,$timer,$position){
    $alert = 
	     '<script type="text/javascript">
            Swal.fire({
            position: "'.$position.'",
            icon: "'.$icon.'",
            title: `<p style="color : black">'.$text.'</p>`,
            showConfirmButton: false,
            timer: '.$timer.'
            })</script>';
    return $alert;
}

function calculateBMIandCalories($gender, $age, $height, $weight, $physicalActivity, $target)
{
    // Convert height from cm to meters
    $height = $height / 100;

    // Calculate BMI
    $bmi = $weight / ($height * $height);

    // Calculate BMR (Basal Metabolic Rate) based on gender
    if ($gender === 'Male') {
        $bmr = 66 + (13.75 * $weight) + (5 * $height * 100) - (6.75 * $age);
    } elseif ($gender === 'Female') {
        $bmr = 655 + (9.56 * $weight) + (1.85 * $height * 100) - (4.68 * $age);
    } else {
        return false; // Invalid gender provided
    }

    // Calculate TDEE (Total Daily Energy Expenditure) based on physical activity level
    $activityMultipliers = array(
        'sedentary' => 1.2,
        'lightly active' => 1.375,
        'moderately active' => 1.55,
        'very active' => 1.725,
        'extremely active' => 1.9
    );

    if (!array_key_exists($physicalActivity, $activityMultipliers)) {
        return false; // Invalid physical activity level provided
    }

    $tdee = $bmr * $activityMultipliers[$physicalActivity];

    // Calculate daily calories needed to achieve the target
    if ($target === 'Gain weight') {
        $caloriesToTarget = $tdee + 500; // Increase 500 calories per day for weight gain
    } elseif ($target === 'Lose weight') {
        $caloriesToTarget = $tdee - 500; // Reduce 500 calories per day for weight loss
    } elseif ($target === 'Stay at the same weight') {
        $caloriesToTarget = $tdee; // Stay at the same weight
    } else {
        return false; // Invalid target option provided
    }

    // Create the result array
    $result = array(
        'BMI' => $bmi,
        'DailyCalories' => $tdee,
        'CaloriesToTarget' => $caloriesToTarget
    );

    return $result;
}
if($islogedin){
$sql_med = "
SELECT
    `record_id`,
    `record_user_guid`,
    `record_height`,
    `record_weight`,
    `record_physicalActivity`,
    `record_Target`,
    `record_date`,
    `record_age`
FROM
    `MedicalRecords`
WHERE
    record_user_guid = '".$user_info['guid']."'
    order by record_id desc limit 1
";
$res_med = $mysqli->query($sql_med);
$user_med = $res_med->fetch_assoc();
$user_bmi = calculateBMIandCalories($user_info['Gender'], $user_med['record_age'], $user_med['record_height'], $user_med['record_weight'], $user_med['record_physicalActivity'], $user_med['record_Target']);
}
include 'html-mail-signup-form.php';

include 'login-controller.php';