<?php
require "config/config.php";
require "config/main_Handler.php";

if(isset($_COOKIE['Code-Agent'])){
    $AgnUser = $_COOKIE['Code-Agent'];
}elseif(isset($_COOKIE['Agent'])){
    $AgnUser = $_COOKIE['Agent'];
}else{
    $AgnUser = "AgentPic/stephanyemmitty.png";
}


$row = allAgentByPic($conn,$AgnUser);
$NewCountMonth =  $row['3_months'] + 1;
$NewCount =  $row['Total_reg'] + 1;

$unq= '09064';

$run_agent  = updateAgn_3($conn,$NewCountMonth,$NewCount,$AgnUser);

$sub_username                =   $myIdFetch['username'];
$sub_email                   =   $myIdFetch['email'];
$sub_shop                    =   $marketersInfo['shop_name'];
$type                        =   "3";

$sub_emai  = explode('.',$sub_email);
$sub_emails = $sub_emai[0];

$preMont=date('m') + 3;
$preDay= date('d');
$preYear = date('y');
$date_subscribed             = date("20".'y/m/d');

if($preMont>12){
    $relMonth = $preMont - 12;
    $reaYear = $preYear + 1;
}else{
$relMonth = $preMont;
$reaYear = $preYear;
}
$date_expired                =   date("20".$reaYear.'/'.$relMonth.'/'.$preDay);




// =--------------------==========max page==============-----------------------
$newNumPage = ($myIdFetch['num_Page']+2);
$newNumTab = ($myIdFetch['num_Tab']+6);
$newStorage = ($myIdFetch['userStorage']+1025);

if($myIdFetch['Subscribed'] == 0){
    $n = $myIdFetch['Subscribed']+0;
    $sql_sub = newSubscriber($conn,$myId,$sub_username,$sub_emails,$sub_shop,$date_expired,$date_subscribed,$type);
    
    $sql_add = updateSub_User($conn,$n,$newNumPage,$newNumTab,$newStorage,$myId);

    if($run_agent){
        if(isset($_GET['sg-ref-kcl']) && isset($_GET['sub-crol_err-key'])){
            if($sql_sub && $sql_add){

                $oldSKey = $_GET['sub-crol_err-key'];
                $newSkey  = generate_string($permitted_chars,50);
               
                $sql_sKey = updateKey($conn,$newSkey,$oldSKey);
                echo $newSkey;
                if($sql_sub){
                    // header('Location:1/'.$username.($suer_id+30).'loader.php?subscription_was_successfulpaid='.$unq.'&rreef='.$_GET['sg-ref-kcl']);
                }else{
                    // header('Location:Register.php?err=error in transactionpopop');
                }
            }else{
                header('Location:Register.php?err=error in transaction');
            }
        }else{
            header('Location:Register.php?warning=error in transaction');
        }
    }else{
        header('Location:Register.php?err=error in transaction2');
    }
    
}else{
    header('Location:Register.php?notice=Already subscribed');
}

?>