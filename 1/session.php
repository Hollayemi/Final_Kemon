<?php

include('../config/config.php');

if(isset($_SESSION['user'])){
    $emailName  =   $_SESSION['user'];
    include('../config/main_Handler.php');
    updatePage_func($conn,$myId,$emailName);
    updateFunc_Subscribers($conn,$myId,$myIdFetch);

    $numOfFiles = [];
    $numOfFile = glob('pages/'.$emailName.'/pictures/*.*');

    for ($i=0; $i<count($numOfFile); $i++){
        $numOfFiles[]=$numOfFile[$i];
    }
    $_SESSION['numOfFiles'] = (sizeof($numOfFiles));
    $username   =   $myIdFetch['username'];
}
else
{
    header('Location:../exp.php');
}
?>


