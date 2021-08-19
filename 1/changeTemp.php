<?php

require_once('session.php');
$filesFolder = $shop_nick;
$myProfLink = $username.($myId+30).".php";
include('functions.php');
echo "er";
echo $_POST['sugu'];
if(isset($_POST['changeTemp'])){
    
    if($filesFolder){
        $templateType = $_POST['sugu'];
        removeFolder('../up/'.$filesFolder.'/st');
        mkdir('../up/'.$filesFolder.'/st');
        copyFolder("../up/".$templateType."/st","../up/".$filesFolder."/st");
        setDefaultTemplate($conn,$myId,$templateType);
        header('Location:'.$myProfLink.'?'.'theme=changed');
        echo "er";
    }else{
    }
}


?>
