
<?php
require "config/config.php";
require "config/main_Handler.php";


$AgnUser = $_SESSION['AgnUser'];
// echo $AgnUser;

$row = allAgentByPic($conn,$AgnUser);

$NewCount =  $row['1_year'] + 1;
$Total_reg =  $row['Total_reg'] + 1;
$unq=$_SESSION['paymentNum'];



$sql_agent="UPDATE agent SET 1_year='$NewCount', Total_reg='$Total_reg' WHERE agnPic='$AgnUser'";
$run_agent  = updateAgn_year($conn,$NewCount,$Total_reg,$AgnUser);


$sub_username                =   $myIdFetch['username'];
$sub_email                   =   $myIdFetch['email'];
$sub_shop                    =   $marketersInfo['shop_name'];
$type                        =   "12";

$sub_emai  = explode('.',$sub_email);
$sub_emails = $sub_emai[0];

$preMont=date('m') + 12;
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
$newNumPage = ($myIdFetch['num_Page']+10);
$newNumTab = ($myIdFetch['num_Tab']+105);
$newStorage = ($myIdFetch['userStorage']+(1025*10));


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