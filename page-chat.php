<?
$page_name = "jess-chat";
include 'controllers/login.php';
?>
<!DOCTYPE HTML>
<html lang="en">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent">
<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1, viewport-fit=cover" />
<title>JessAI</title>
<link rel="stylesheet" type="text/css" href="styles/bootstrap.css">
<link rel="stylesheet" type="text/css" href="styles/style.css">
<link href="https://fonts.googleapis.com/css2?family=Inter:wght@100;200;300;400;500;600;700;800;900&display=swap" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="fonts/css/fontawesome-all.min.css">    
<link rel="manifest" href="_manifest.json" data-pwa-version="set_in_manifest_and_pwa_js">
<link rel="apple-touch-icon" sizes="180x180" href="app/icons/icon-192x192.png">
<script src="ChatGPT-API/script.js" defer></script>
</head>
    
<body class="theme-light">
    
<div id="preloader"><div class="spinner-border color-highlight" role="status"></div></div>
    
<div id="page">
<?if(!isset($_GET['reloaded'])){?>
<meta http-equiv="refresh" content="0;url=page-chat.php?reloaded"> 
<?}?>    
    <div class="header header-fixed header-logo-center header-auto-show">
        <a href="#" class="header-title">JessAI</a>
        <a href="#" data-back-button class="header-icon header-icon-1"><i class="fas fa-chevron-left"></i></a>
        <a href="#" data-menu="menu-main" class="header-icon header-icon-4"><i class="fas fa-bars"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-dark"><i class="fas fa-sun"></i></a>
        <a href="#" data-toggle-theme class="header-icon header-icon-3 show-on-theme-light"><i class="fas fa-moon"></i></a>
    </div>
    <form id="chat-form" class="chat-input-form">
        <div id="footer-bar" class="d-flex">
            <div class="me-2 speach-icon">
                <div id="preloader2" class=" mt-1 ms-2" style="border-width: 7px;"  role="status" > <img src="images/loading.gif" alt="Loading" width="50" /> </div>
            </div>
                <div class="flex-fill speach-input">
                    <input id="chat-input" type="text" class="form-control" placeholder="Enter your Message here">
                </div>
                <div class="ms-3 speach-icon">
                    <button type="submit" id="send-btn" class="btn btn-m btn-full mb-3 rounded-xl text-uppercase font-700 shadow-s bg-highlight me-2 mt-2"><i class="fa fa-arrow-up pt-2"></i></button>
                </div>
            
        </div>
    </form>
    
    <div class="page-title page-title-fixed">
        <h1>JessAI</h1>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-share"><i class="fa fa-share-alt"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-light" data-toggle-theme><i class="fa fa-moon"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme show-on-theme-dark" data-toggle-theme><i class="fa fa-lightbulb color-yellow-dark"></i></a>
        <a href="#" class="page-title-icon shadow-xl bg-theme color-theme" data-menu="menu-main"><i class="fa fa-bars"></i></a>
    </div>
    <div class="page-title-clear"></div>
       
    <div class="page-content">
        
        <div class="content mt-0 mb-n5" id="chat-output">
            
        </div>

        
    </div>
    <div class="d-flex justify-content-center">
            
        </div> 
    
    <!-- Page content ends here-->
    <div class="card-body card-block">
        <p id="conversation" type="button" class="text-center color-blue-dark"></p>
    </div>
    <div id="menu-upload" 
         class="menu menu-box-bottom rounded-m" 
         data-menu-height="275" 
         data-menu-effect="menu-over">
        <div class="list-group list-custom-small ps-2 me-4">
            <a href="#">
                <i class="font-14 fa fa-file color-gray2-dark"></i>
                <span class="font-13">File</span>
                <i class="fa fa-angle-right"></i>
            </a>
            <a href="#">
                <i class="font-14 fa fa-image color-gray2-dark"></i>
                <span class="font-13">Photo</span>
                <i class="fa fa-angle-right"></i>
            </a>
            <a href="#">
                <i class="font-14 fa fa-video color-gray2-dark"></i>
                <span class="font-13">Video</span>
                <i class="fa fa-angle-right"></i>
            </a>
            <a href="#">
                <i class="font-14 fa fa-user color-gray2-dark"></i>
                <span class="font-13">Camera</span>
                <i class="fa fa-angle-right"></i>
            </a>  
            <a href="#">
                <i class="font-14 fa fa-map-marker color-gray2-dark"></i>
                <span class="font-13">Location</span>
                <i class="fa fa-angle-right"></i>
            </a>  
        </div>
    </div> 
    
    
    <!-- Main Menu--> 
    <div id="menu-main" class="menu menu-box-left rounded-0" data-menu-load="menu-main.php" data-menu-width="280" data-menu-active="nav-pages"></div>
    
    <!-- Share Menu-->
    <div id="menu-share" class="menu menu-box-bottom rounded-m" data-menu-load="menu-share.html" data-menu-height="370"></div>  
    
    <!-- Colors Menu-->
    <div id="menu-colors" class="menu menu-box-bottom rounded-m" data-menu-load="menu-colors.html" data-menu-height="480"></div> 
    <script>

        var suggestedQuestions = ["How many calories and protein in eggs?",
                                  "How healthy foods affect the health of the body?",
                                  "What are the effects of obesity on human health?",
                                  "What are some effective strategies for weight management?",
                                  "How does hydration impact overall health, and how much water should I be drinking each day?",
                                  "How does nutrition impact brain health and cognitive function?",
                                  "What are some practical strategies for managing food allergies or intolerances?",
                                  "What are the potential benefits and risks associated with caffeine consumption?",
                                  "What are some healthy alternatives to sugar?",
                                  "Can you provide guidance on healthy eating during pregnancy and meeting the nutritional needs of both mother and baby?" 
                                ];
        function displaySuggestedQuestions() {
            
             var conversationDiv = document.getElementById("conversation");
             var questionsHTML = "";

             for (var i = 0; i < suggestedQuestions.length; i++) {
                 questionsHTML += '<button class="speech-bubble" onclick="sendQuestion(\'' + suggestedQuestions[i] + '\')">' + suggestedQuestions[i] + '</button><br>';
             }

             conversationDiv.innerHTML = questionsHTML;
            
        }
        function sendQuestion(question) {
            
            document.getElementById("chat-input").value =  question ;
            document.getElementById("conversation").innerHTML='';

            

            // After selecting and submitting a question, replay the suggested questions.
            //displaySuggestedQuestions();
        }
        window.onload = function () {
           displaySuggestedQuestions();
        }



    </script>     
    
</div>

<script type="text/javascript" src="scripts/bootstrap.min.js"></script>
<script type="text/javascript" src="scripts/custom.js"></script>
</body>
