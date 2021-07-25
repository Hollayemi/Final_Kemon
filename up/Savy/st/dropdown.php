<?php 
$allMyReadyPicArr =  array();
$allMyReadyPicArrSecond =  array();
$allMyReadyPageArr =  array();
$allMyReadyTabArr =  array();

if(isset($sc)){
    $allMyReadyPic  =glob("../pic/*.*");
    $allMyReadyPage = glob("../pg/*.*");
    $allMyReadyTab  = glob("../tb/*.*");

    
        for($a=0;$a<count($allMyReadyPic); $a++){
            $deriveP = explode('-',$allMyReadyPic[$a]);
            $derivePi = explode('/',$deriveP[0]);
            $derivePiSe = explode('~',$deriveP[1]);
            $derivePiSec = $derivePiSe[0];
            
            $allMyReadyPicArrSecond[] = $derivePiSec;
            $derivePic = $derivePi[2];
            if(!in_array($derivePic,$allMyReadyPicArr)){
            $allMyReadyPicArr[]=$derivePic;
            }            
        }
        
        for($b=0;$b<count($allMyReadyPage); $b++){
            $deriveN = explode('/',$allMyReadyPage[$b]);
            $deriveNa = explode('.',$deriveN[2]);
            $deriveName = $deriveNa[0];
            
            if(in_array(strtolower($deriveName),$allMyReadyPicArr)){
                $allMyReadyPageArr[]= $deriveName;
                
            }
        }

        for($c=0;$c<count($allMyReadyTab); $c++){
            $deriveT = explode('-',$allMyReadyTab[$c]);
            $deriveTa = explode('.',$deriveT[1]);
            $deriveTab = $deriveTa[0];
            
            if(in_array(strtolower($deriveTab),($allMyReadyPicArrSecond))){
                
                if(!in_array(strtolower($deriveTab),($allMyReadyTabArr))){
                    $deriveFi = explode('/',$allMyReadyTab[$c]);
                    $deriveFin = explode('.',$deriveFi[2]);
                    $deriveFinal =  $deriveFin[0];
                    
                $allMyReadyTabArr[]= $deriveFinal;
            }
        }
        }









}else{
    $allMyReadyPic  =glob("pic/*.*");
    $allMyReadyPage = glob("pg/*.*");
    $allMyReadyTab  = glob("tb/*.*");


    for($a=0;$a<count($allMyReadyPic); $a++){
        $deriveP = explode('-',$allMyReadyPic[$a]);
        $derivePi = explode('/',$deriveP[0]);
        $derivePiSe = explode('~',$deriveP[1]);
        $derivePiSec = $derivePiSe[0];
        
        $allMyReadyPicArrSecond[] = $derivePiSec;
        $derivePic = $derivePi[1];
        if(!in_array($derivePic,$allMyReadyPicArr)){
        $allMyReadyPicArr[]=$derivePic;
        }
    }
    for($b=0;$b<count($allMyReadyPage); $b++){
        $deriveN = explode('/',$allMyReadyPage[$b]);
        $deriveNa = explode('.',$deriveN[1]);
        $deriveName = $deriveNa[0];
        
        if(in_array(strtolower($deriveName),$allMyReadyPicArr)){
            $allMyReadyPageArr[]= $deriveName;
            
        }
    }
    
    for($c=0;$c<count($allMyReadyTab); $c++){
        $deriveT = explode('-',$allMyReadyTab[$c]);
        $deriveTa = explode('.',$deriveT[1]);
        $deriveTab = $deriveTa[0];
        
        if(in_array(strtolower($deriveTab),($allMyReadyPicArrSecond))){
            
            if(!in_array(strtolower($deriveTab),($allMyReadyTabArr))){
                $deriveFi = explode('/',$allMyReadyTab[$c]);
                $deriveFin = explode('.',$deriveFi[1]);
                $deriveFinal =  $deriveFin[0];
                
            $allMyReadyTabArr[]= $deriveFinal;
        }
    }
    }
}




?>