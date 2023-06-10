<?
include 'controllers/head.php';
?>

<body class="theme-light">

<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>

<div id="page">
<?if(!isset($_GET['reloaded'])){?>
<meta http-equiv="refresh" content="0;url=page-system-signup-1.php?reloaded"> 
<?}?> 
    <div class="header header-fixed header-logo-center">
        <a href="index.php" class="header-title">Registration</a>
        <a href="#" data-back-button class="header-icon header-icon-1"><i class="fas fa-chevron-left"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-4 show-on-theme-dark"><i class="fas fa-sun"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-4 show-on-theme-light"><i class="fas fa-moon"></i></a>
    </div>

<?
$page_name = "signup";
include 'controllers/login.php';
// sign up function
//include 'php/signup.php';

if(isset($_POST['SignUp'])){
    //echo '<script>alert("test");</script>';
    // get the data
    $p=$_POST['p'];
    $e=$_POST['e'];
    $FullName = $_POST['FullName'];
    $height = $_POST['height'];
    $weight = $_POST['weight'];
    $gender = $_POST['gender'];
    $physicalActivity = $_POST['physicalActivity'];
    $Target = $_POST['Target'];
    $birthday = $_POST['birthday'];
    
    //sanitize the data
    $p = $mysqli->real_escape_string($p);
    $e = $mysqli->real_escape_string($e);
    $FullName = $mysqli->real_escape_string($FullName);;
    $height = $mysqli->real_escape_string($height);
    $weight = $mysqli->real_escape_string($weight);
    $gender = $mysqli->real_escape_string($gender);
    $physicalActivity = $mysqli->real_escape_string($physicalActivity);
    $Target = $mysqli->real_escape_string($Target);
    $birthday = $mysqli->real_escape_string($birthday);
    $currentDate = date('Y-m-d');
    $age = date_diff(date_create($birthday), date_create($currentDate))->y;
    //generate varification kay
    $vkey = md5(time().$e);
    
    
    //insert into the database
    $p = md5($p);
    $sqlq="
INSERT INTO `user`(
    `email`,
    `password`,
    `FullName`,
    `vkey`,
    `Gender`,
    `birthday`
)
VALUES(
    '$e',
    '$p',
    '$FullName',
    '$vkey',
    '$gender',
    '$birthday'
)
    ";
    if($mysqli->query($sqlq)){
        $sql_guid = "select guid from user where email = '$e'";
        $res_guid = $mysqli->query($sql_guid);
        $row = $res_guid->fetch_assoc();
        $guid = $row['guid'];
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
    '$guid',
    '$height',
    '$weight',
    '$age',
    '$physicalActivity',
    '$Target'
)
        ";
        $mysqli->query($sql_med);
        //sending the verify email
        $to      = $e;
        $subject = 'Email Verification';
        $message = htmlMailSignupTemplate('NutriNation',$subject,$FullName,$vkey);
        mailto($to,$subject,$message);
        echo sweetalert2 ('warning','an email has been sent to <br> '.$e.',<br>please verify your account',5000,'top');
        
    }else{
         echo sweetalert2 ('warning','email already exists',5000,'top');
    }
    
    
} // is set submi
else // else is set submit
{ 
    
} // is set submit


?>

    <div class="page-content header-clear-medium">

        <div class="card card-style">
            <div class="content">
                <h1 class="font-30">Sign Up</h1>
                <form method="POST">
                    <div class="input-style no-borders has-icon validate-field mb-4">
                        <i class="fa fa-user"></i>
                        <input type="name" class="form-control validate-name" name="FullName" id="form1ab" placeholder="First name" required>
                        <label for="form1ab" class="color-highlight">Full Name</label>
                        <i class="fa fa-times disabled invalid color-red-dark"></i>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>
                    <div class="input-style no-borders has-icon validate-field mb-4">
                        <i class="fa fa-at"></i>
                        <input type="email" class="form-control validate-email" name="e" id="form1ac" placeholder="Email Address" required>
                        <label for="form1ac" class="color-highlight">Email Address</label>
                        <i class="fa fa-times disabled invalid color-red-dark"></i>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>
                    <div class="input-style no-borders has-icon validate-field mb-4">
                        <i class="fa fa-lock"></i>
                        <input type="password" class="form-control validate-password" name="p" id="form1ad" placeholder="Choose Password" required>
                        <label for="form1ad" class="color-highlight">Choose Password</label>
                        <i class="fa fa-times disabled invalid color-red-dark" style="margin-right: 20px"></i>
                        <i class="fa fa-check disabled valid color-green-dark" style="margin-right: 20px"></i>
                        <em>(8 Digits of Numbers and Characters)</em>
                    </div>
                    <div class="input-style no-borders has-icon mb-4">
                        <i class="fa fa-lock"></i>
                        <input type="password" class="form-control" name="p2" id="form1ae" placeholder="Confirm Password" required>
                        <label for="form1ae" class="color-highlight">Confirm Password</label>
                        <i id='conRedMsg' class="fa fa-times disabled invalid color-red-dark"style="margin-right: 20px"></i>
                        <i id='conGreenMsg' class="fa fa-check disabled valid color-green-dark" style="margin-right: 20px"></i>
                        <em id="reqConMsg">(required)</em>
                    </div>
                    
                    <div class="input-style no-borders has-icon validate-field mb-4">
                        <i class="fa fa-calendar" aria-hidden="true"></i>
                        <input type="date" class="form-control validate-date" name="birthday" id ="signup-age" placeholder="Age" required>
                        <label for="signup-age" class="color-highlight">Birthday</label>
                        <i class="fa fa-times disabled invalid color-red-dark"></i>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>
                    
                    <div class="input-style no-borders has-icon validate-field mb-4">
                        <i class="fa fa-arrows-v"></i>
                        <input type="number" class="form-control validate-number" name="height" id ="signup-height" placeholder="Height" required>
                        <label for="signup-height" class="color-highlight">Height</label>
                        <i class="fa fa-times disabled invalid color-red-dark"></i>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>
                    
                    <div class="input-style no-borders has-icon validate-field mb-4">
                        <i class="fa fa-user-circle"></i>
                        <input type="number" class="form-control validate-number" name="weight" id ="signup-weight" placeholder="Weight" required>
                        <label for="signup-weight" class="color-highlight">Weight</label>
                        <i class="fa fa-times disabled invalid color-red-dark"></i>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <em>(required)</em>
                    </div>
                    <i class="fa fa-venus-mars" aria-hidden="true"></i> Gender :
                    <div class="form-check icon-check">
                        <input class="form-check-input" type="radio" name="gender" value="Male" id="signup-male">
                        <label class="form-check-label" for="signup-male">Male</label>
                        <i class="icon-check-1 far fa-circle color-gray-dark font-16"></i>
                        <i class="icon-check-2 far fa-check-circle font-16 color-highlight"></i>
                    </div>
                    <div class="form-check icon-check">
                        <input class="form-check-input" type="radio" name="gender" value="Female" id="signup-Female">
                        <label class="form-check-label" for="signup-Female">Female</label>
                        <i class="icon-check-1 far fa-circle color-gray-dark font-16"></i>
                        <i class="icon-check-2 far fa-check-circle font-16 color-highlight"></i>
                    </div>
                    <div class="input-style no-icon mb-4">
                        <!--<label for="physicalActivity" class="color-highlight" style="top : 1px">Choose physical activity</label>-->
                        <select name="physicalActivity" style="padding: 5px" id="physicalActivity">
                            <option value="0">Choose physical activity</option>
                            <option value="sedentary">Sedentary</option>
                            <option value="lightly active">Lightly active</option>
                            <option value="moderately active">Moderately active</option>
                            <option value="very active">Very active</option>
                            <option value="extremely active">Extremely active</option>
                        </select>
                        <span><i class="fa fa-chevron-down"></i></span>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <i class="fa fa-check disabled invalid color-red-dark"></i>
                        <em></em>
                    </div>
                    <div class="input-style no-icon mb-4">
                        <!--<label for="Target" class="color-highlight" style="top : 1px">Choose Your Target</label>-->
                        <select name="Target" style="padding: 5px" id="Target">
                            <option value="0">Choose Your Target</option>
                            <option value="Lose weight">Lose weight</option>
                            <option value="Gain weight">Gain weight</option>
                            <option value="Stay at the same weight">Stay at the same weight</option>
                        </select>
                        <span><i class="fa fa-chevron-down"></i></span>
                        <i class="fa fa-check disabled valid color-green-dark"></i>
                        <i class="fa fa-check disabled invalid color-red-dark"></i>
                        <em></em>
                    </div>
                    <button type="submit" name="SignUp" class="btn btn-full btn-l font-600 font-13 gradient-highlight mt-4 rounded-s" onclick="submitButtonClick(event)" >Create Account</button>
                </form>
                <div class="row pt-3 mb-3">
                    <div class="col-6 text-start">
                        <!--<a href="page-system-forgot-1.php">Forgot Password?</a>-->
                    </div>
                    <div class="col-6 text-end">
                        <a href="page-system-signin-1.php">Sign In Here</a>
                    </div>
                </div>

                <div class="divider"></div>

                <!--<div class="row">-->
                <!--    <a href="#" class="btn btn-icon text-start btn-full btn-l font-600 font-13 bg-facebook mt-4 rounded-s"><i class="fab fa-facebook-f text-center"></i>Sign up with Facebook</a>-->
                <!--</div>-->
                <!--<div class="row">-->
                <!--    <a href="#" class="btn btn-icon text-start btn-full btn-l font-600 font-13 bg-twitter mt-2 rounded-s"><i class="fab fa-twitter text-center"></i>Sign up with Twitter</a>-->
                <!--</div>-->
                <!--<div class="row">-->
                <!--    <a href="#" class="btn btn-icon text-start btn-full btn-l font-600 font-13 bg-dark-dark mt-2 rounded-s"><i class="fab fa-apple text-center"></i>Sign up with Apple</a>-->
                <!--</div>-->


            </div>
        </div>
<script>
        //Validator
var flag1 = 'invalid';
var flag2 = 'invalid';
var flag3 = 'invalid';
var flag_name = 'invalid';
var flag_phone = 'invalid';
if(document.getElementById("form1ae")){
    document.getElementById("form1ae").addEventListener('keyup',e=>{
        if(!document.getElementById("form1ae").value){
            document.getElementById("conRedMsg").classList.add('disabled');
            document.getElementById("conGreenMsg").classList.add('disabled');
            document.getElementById("reqConMsg").classList.remove('disabled');
            
        }else{
            if (document.getElementById("form1ad").value == document.getElementById("form1ae").value) {
            document.getElementById("conRedMsg").classList.add('disabled');
            document.getElementById("conGreenMsg").classList.remove('disabled');
            document.getElementById("reqConMsg").classList.add('disabled');
            flag3 = 0;                        
            } else if (document.getElementById("form1ae").value == ""){
            document.getElementById("conRedMsg").classList.add('disabled');
            document.getElementById("conGreenMsg").classList.remove('disabled');
            document.getElementById("reqConMsg").classList.add('disabled');
            flag3 = 'invalid';
            }else {
            document.getElementById("conRedMsg").classList.remove('disabled');
            document.getElementById("conGreenMsg").classList.add('disabled');
            document.getElementById("reqConMsg").classList.add('disabled');
            flag3 = 'invalid';
            }
        }
    }) ;  
    
    document.getElementById("form1ad").addEventListener('keyup',e=>{
        if(!document.getElementById("form1ae").value){
            document.getElementById("conRedMsg").classList.add('disabled');
            document.getElementById("conGreenMsg").classList.add('disabled');
            document.getElementById("reqConMsg").classList.remove('disabled');
            
        }else{
            if (document.getElementById("form1ad").value == document.getElementById("form1ae").value) {
            document.getElementById("conRedMsg").classList.add('disabled');
            document.getElementById("conGreenMsg").classList.remove('disabled');
            document.getElementById("reqConMsg").classList.add('disabled');
            flag3 = 0;                        
            } else if (document.getElementById("form1ae").value == ""){
            document.getElementById("conRedMsg").classList.add('disabled');
            document.getElementById("conGreenMsg").classList.remove('disabled');
            document.getElementById("reqConMsg").classList.add('disabled');
            flag3 = 'invalid';
            }else {
            document.getElementById("conRedMsg").classList.remove('disabled');
            document.getElementById("conGreenMsg").classList.add('disabled');
            document.getElementById("reqConMsg").classList.add('disabled');
            flag3 = 'invalid';
            }
        }
    }) ;  
                
}                



 var inputField = document.querySelectorAll('input');
        if(inputField.length){
            var mailValidator = /^[A-Z0-9._%+-]+@([A-Z0-9-]+\.)+[A-Z]{2,4}$/i;
            //var phoneValidator = /^[(]{0,1}[0-9]{3}[)]{0,1}[-\s\.]{0,1}[0-9]{3}[-\s\.]{0,1}[0-9]{4}$/;
            var phoneValidator = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
            var nameValidator = /^[a-zA-Z\u0600-\u06FF\u0750-\u077F\s',.-]+$/u;
            var passwordValidator = new RegExp("^(?=(.*[a-zA-Z]){1,})(?=(.*[0-9]){2,}).{8,}$");
            var numberValidator = /^(0|[1-9]\d*)$/;
            var linkValidator = /^(http|https)?:\/\/[a-zA-Z0-9-\.]+\.[a-z]{2,4}/;
            var textValidator = /[A-Za-z]{2}[A-Za-z]*[ ]?[A-Za-z]*/;

            function valid(el,flag){
                if(flag == 6){
                    flag2=0;
                }else if (flag == 2){
                    flag1 =0;
                }else if (flag == 'name_valid'){
                    flag_name = 0;
                }else if(flag == 'phone_valid'){
                    flag_phone = 0;
                }
                el.parentElement.querySelectorAll('.valid')[0].classList.remove('disabled');
                el.parentElement.querySelectorAll('.invalid')[0].classList.add('disabled');
            }
            function invalid(el,flag){
                if(flag == 6){
                    flag2='invalid';
                }else if (flag == 2){
                    flag1 ='invalid';
                }else if (flag == 'name_invalid'){
                    flag_name = 'invalid';
                }else if(flag_phone == 'phone_invalid'){
                    flag_phone = 'invalid';
                }
                el.parentElement.querySelectorAll('.valid')[0].classList.add('disabled');
                el.parentElement.querySelectorAll('.invalid')[0].classList.remove('disabled');
            }
            function unfilled(el){
                el.parentElement.querySelectorAll('em')[0].classList.remove('disabled');
                el.parentElement.querySelectorAll('.valid')[0].classList.add('disabled');
                el.parentElement.querySelectorAll('.invalid')[0].classList.add('disabled');
            }

            var regularField = document.querySelectorAll('.input-style input:not([type="date"])')
            regularField.forEach(el => el.addEventListener('keyup', e => {
                if(!el.value == ""){
                    el.parentElement.classList.add('input-style-active');
                    el.parentElement.querySelector('em').classList.add('disabled');
                } else {
                    el.parentElement.querySelectorAll('.valid')[0].classList.add('disabled');
                    el.parentElement.querySelectorAll('.invalid')[0].classList.add('disabled');
                    el.parentElement.classList.remove('input-style-active');
                    el.parentElement.querySelector('em').classList.remove('disabled');
                }
            }));

            var regularTextarea = document.querySelectorAll('.input-style textarea')
            regularTextarea.forEach(el => el.addEventListener('keyup', e => {
                if(!el.value == ""){
                    el.parentElement.classList.add('input-style-active');
                    el.parentElement.querySelector('em').classList.add('disabled');
                } else {
                    el.parentElement.classList.remove('input-style-active');
                    el.parentElement.querySelector('em').classList.remove('disabled');
                }
            }));

            var selectField = document.querySelectorAll('.input-style select')
            selectField.forEach(el => el.addEventListener('change', e => {
                if(el.value !== "default"){
                    el.parentElement.classList.add('input-style-active');
                    el.parentElement.querySelectorAll('.valid')[0].classList.remove('disabled');
                    el.parentElement.querySelectorAll('.invalid, em, span')[0].classList.add('disabled');
                }
                if(el.value == "default"){
                    el.parentElement.querySelectorAll('span, .valid, em')[0].classList.add('disabled');
                    el.parentElement.querySelectorAll('.invalid')[0].classList.remove('disabled');
                    el.parentElement.classList.add('input-style-active');
                }
            }));

            var dateField = document.querySelectorAll('.input-style input[type="date"]')
            dateField.forEach(el => el.addEventListener('change', e => {
                el.parentElement.classList.add('input-style-active');
                el.parentElement.querySelectorAll('.valid')[0].classList.remove('disabled');
                el.parentElement.querySelectorAll('.invalid')[0].classList.add('disabled');
            }));

            var validateField = document.querySelectorAll('.validate-field input, .validator-field textarea');
            if(validateField.length){
                validateField.forEach(el => el.addEventListener('keyup', e => {
                    var getAttribute = el.getAttribute('type');
                    switch(getAttribute){
                        case 'name': 
                            nameValidator.test(el.value) ? valid(el,'name_valid') : invalid(el,'name_invalid');
                            break;
                        case 'number': 
                            numberValidator.test(el.value) ? valid(el,1) : invalid(el,2); 
                            break;
                        case 'email': 
                            mailValidator.test(el.value) ? valid(el,2) : invalid(el,2); 
                            break;
                        case 'text': 
                            textValidator.test(el.value) ? valid(el,3) : invalid(el,3); 
                            break;
                        case 'url': 
                            linkValidator.test(el.value) ? valid(el,4) : invalid(el,4); 
                            break;
                        case 'tel': 
                            phoneValidator.test(el.value) ? valid(el,'phone_valid') : invalid(el,'phone_invalid'); 
                            break;
                        case 'password': 
                            passwordValidator.test(el.value) ? valid(el,6) : invalid(el,6); 
                            break;
                    }
                    if(el.value === ""){unfilled(el);}
                }));
            }
        }
        
function submitButtonClick(event) {
    if (document.getElementById("form1ad").value != document.getElementById("form1ae").value){
        event.preventDefault();
        
    }
    let physicalActivity = document.getElementById("physicalActivity").value;
    let Target = document.getElementById("Target").value;
        if (!document.getElementById("form1ae").value||!document.getElementById("form1ad").value||!document.getElementById("form1acc").value||!document.getElementById("form1ab").value||!document.getElementById("form1abb").value){
		    event.preventDefault();
            
        }
        if (flag1 == 'invalid' || flag2 == 'invalid' || flag3=='invalid' || flag_name == 'invalid' || flag_phone == 'invalid' || physicalActivity == 0 || Target == 0){
            
            //alert('flag1 : '+flag2+'| flag2 : '+flag2+'| flag3 : '+flag3+'| name : '+flag_name+'| phone : '+flag_phone);
            event.preventDefault(); 
        }
    }    
    
    // end validator   
</script>
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

<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
</body>