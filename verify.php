<?php
if (isset($_GET['vkey'])){
$vkey = $_GET['vkey'];
include 'controllers/database_connection.php';

$sql ="SELECT `vkey`, `verified` FROM `user` WHERE verified = 0 and vkey='$vkey' LIMIT 1";

$result = $mysqli->query($sql);

if ($result->num_rows == 1){
    //validate teh email
    $sqlupdate  = "UPDATE `user` SET `verified`= 1 WHERE vkey = '$vkey' LIMIT 1";
    $resultUpDate = $mysqli->query($sqlupdate);
    if ($resultUpDate)echo '<script>
    alert("Thank you, your account has been verified successfully, you can login now");
    window.location.href = "page-system-signin-1.php";
    </script>';
}else{
    echo '<script>alert("this account is invalid or already verified!");</script>'; 
}


}else{
    die("you can't access this page");
}




?>