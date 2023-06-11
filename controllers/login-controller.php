<?
if($islogedin){
    if($page_name == "signup"){
        header('Location: Main/FinalProj-Template/index.php');
        exit;
    }elseif($page_name == "signin"){
        header('Location: index.php');
        exit;
    }elseif($page_name == "Profile"){
        if(isset($_GET['user_id'])){
            $sql = "select * from user where id = ".$_GET['user_id'];
            $res = $mysqli->query($sql);
            if($row = $res->fetch_assoc()){
                if($row['id'] != $user_info['id']){
                    header('Location: index.php');
                    exit;
                }
            }else{
                header('Location: index.php');
                exit;
            }
        }else{
            header('Location: index.php');
            exit;
        }
    }elseif($page_name == "Upload Product"){
        if($user_info['type'] != 'admin'){
            header('Location: Main/FinalProj-Template/index.php');
            exit;
        }
    }
}else{
    if($page_name == "home"){
        header('Location: Main/FinalProj-Template/index.php');
        exit;
    }elseif($page_name == "Profile"){
        header('Location: Main/FinalProj-Template/index.php');
        exit;
    }elseif($page_name == "jess-chat"){
        header('Location: Main/FinalProj-Template/index.php');
        exit;
    }elseif($page_name == "Upload Product"){
        header('Location: Main/FinalProj-Template/index.php');
        exit;
    }elseif($page_name == "store"){
        header('Location: Main/FinalProj-Template/index.php');
        exit;
    }elseif($page_name == "Diet Plan"){
        header('Location: Main/FinalProj-Template/index.php');
        exit;
    }elseif($page_name == "contact"){
        header('Location: Main/FinalProj-Template/index.php');
        exit;
    }
}

?>