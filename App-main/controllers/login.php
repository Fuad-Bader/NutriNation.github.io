<?php
//echo'<script>alert("test login")</script>';
include 'database_connection.php';
include 'lang.php';
$notV_flag = false;
$eMsg="";
if(isset($_POST["log_out"]))
{
    
    
        if(isset($logoutflag)){
            header("Location: $logoutflag");
            //echo '<script>window.location.replace("'.$logoutflag.'");</script>';  
        }
        
        //echo '<script>alert("'.$logoutflag.'")</script>';
    if(isset($_POST['user_id'])){
        $sql = "UPDATE `user` SET `online_status`='offline' WHERE id = ".$_POST['user_id'];
        if($mysqli->query($sql)){
            //session_destroy();
            session_unset();
            unset($_COOKIE['PHPSESSID']);
        }
    }
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
    $e=$mysqli->real_escape_string($_POST['e']);
    $p=$mysqli->real_escape_string($_POST['p']);
    $p = md5($p);
    
    //get the data from the database
    if (isset($_POST['craftsman'])){
        $sql="SELECT * FROM `service_provider` WHERE `email` = '$e' AND `password` = '$p' LIMIT 1";
    }else{
        $sql="SELECT * FROM `user` WHERE `email` = '$e' AND `password` = '$p' LIMIT 1";
    }
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
            if(isset($_POST['craftsman'])){
                echo'<script>alert("craftsman")</script>';
            }
            //continue the prosses
            $sql2 = "UPDATE `user` SET `online_status`='online' WHERE id = ".$row['id'];
            $mysqli->query($sql2);
            $user_info=$row;
            $_SESSION["user_info"]=$user_info;
            $_SESSION["login"]=true;
            
            
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
    mail($to, $subject, $message, $headers);
}
function sweetalert2 ($icon,$text,$timer,$position){
    $alert = 
	     '<script type="text/javascript">
            Swal.fire({
            position: "'.$position.'",
            icon: "'.$icon.'",
            title: "'.$text.'",
            showConfirmButton: false,
            timer: '.$timer.'
            })</script>';
    return $alert;
}
