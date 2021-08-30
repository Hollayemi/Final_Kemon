<?php
    if(!isset($sc)){
        require_once('../db.php');
    }else{
        require_once('../../db.php');
    }

    $curPageName        =           substr($_SERVER["SCRIPT_NAME"],strpos($_SERVER["SCRIPT_NAME"],"/")+1);
    $extr               =           explode('/',$curPageName);
    $genId              =           $extr[3];

    function webTemp($conn,$genId)
    {
        $sql    ="SELECT webType FROM marketers WHERE shop_nick=:shop_nick";
        $stmt   = $conn->prepare($sql);
        $stmt->execute(['shop_nick'=>$genId]);
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    $webTemp = webTemp($conn,$genId)['webType'];
?>