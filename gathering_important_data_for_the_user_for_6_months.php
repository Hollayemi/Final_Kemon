<?php
require "config/config.php";
require "config/main_Handler.php";


if(isset($_COOKIE['Code-Agent'])){
    $AgnUser = $_COOKIE['Code-Agent'];
}elseif(isset($_COOKIE['Agent'])){
    $AgnUser = $_COOKIE['Agent'];
}else{
    $AgnUser = "AgentPic/Stephanyemmitty.png";
}

$row = allAgentByPic($conn,$AgnUser);

$NewCountMonth =  $row['6_months'] + 1;
$NewCount =  $row['Total_reg'] + 1;

$unq=$_SESSION['paymentNum'];

$run_agent=updateAgn_6($conn,$NewCountMonth,$NewCount,$AgnUser);

$sub_username                =   $myIdFetch['username'];
$sub_email                   =   $myIdFetch['email'];
$sub_shop                    =   $marketersInfo['shop_name'];
$type                        =   "6";

$sub_emai  = explode('.',$sub_email);
$sub_emails = $sub_emai[0];

$preMont=date('m') + 6;
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
$date_expired    =   date("20".$reaYear.'/'.$relMonth.'/'.$preDay);




// =--------------------==========max page==============-----------------------
$newNumPage = ($myIdFetch['num_Page']+4);
$newNumTab = ($myIdFetch['num_Tab']+15);
$newStorage = ($myIdFetch['userStorage']+(1025*2));


if($myIdFetch['Subscribed'] == 0){
    $n = $myIdFetch['Subscribed']+1;
    $sql_add = updateSub_User($conn,$n,$newNumPage,$newNumTab,$newStorage,$myId);
    $allsub  = allSubscribers($conn,$myId);
    if($run_agent && empty($allsub)){
        if(isset($_GET['sg-ref-kcl']) && isset($_GET['sub-crol_err-key'])){
            if($sql_add){
                $oldSKey = $_GET['sub-crol_err-key'];
                $newSkey  = generate_string($permitted_chars,50);

                $sql_sKey = updateKey($conn,$newSkey,$oldSKey);
                $sql_sub = newSubscriber($conn,$myId,$sub_username,$sub_emails,$sub_shop,$date_expired,$date_subscribed,$type);
                if($sql_sKey){
                    header('Location:1/'.$myIdFetch['username'].($myId+30).'loader.php?subscription_was_successfulpaid='.$unq.'&rreef='.$_GET['sg-ref-kcl']);
                }else{
                    header('Location:Register.php?err=error in transactionpopop');
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