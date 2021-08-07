<?php

require "config/config.php";

if(isset($_COOKIE['Code-Agent'])){
    $AgnUser = $_COOKIE['Code-Agent'];
}elseif(isset($_COOKIE['Agent'])){
    $AgnUser = $_COOKIE['Agent'];
}else{
    $AgnUser = "AgentPic/Stephanyemmitty.png";
}
echo $AgnUser;

$row = allAgentByPic($conn,$AgnUser);

$NewCount =  $row['counting'] + 1;
$NewTot =  $row['Total_reg'] + 1;

$unq="07568";

$run_agent  = updateAgn_norm($conn,$NewCount,$NewTot,$AgnUser);

$user_id = $_SESSION['user_info_id'] ;
$sql = "SELECT * from users WHERE id='$user_id'";

$sub_username                =   $myIdFetch['username'];
$sub_email                   =   $myIdFetch['email'];
// $sub_shop                    =   $_SESSION['shop_name'];

if($myIdFetch['veri_payment'] == 'False'){
    $sql_add = "UPDATE users Set veri_payment = 'False'  WHERE id ='$myId'";
    if($run_agent){
        if($_GET['Registration_Fee_Successfullypaid']){
            // header('Location:1/'.$sub_username.($user_id+30).'loader.php?successfullypaid='.$unq);
            $maRef = explode('__',$_GET['Registration_Fee_Successfullypaid']);
            header('Location:1/'.$sub_username.($user_id+30).'loader.php?successfullypaid='.$unq.'&rreef='.$maRef[0]);
            }else{
                header('Location:Register.php?err=no payment');
            }
        }else{
            header('Location:1/'.$sub_username.($user_id+30).'loader.php?successfullypaid='.$unq);
        }    
    }else{
        header('Location:Register.php?notice=Account is active');
    }

?>


