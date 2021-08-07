<?php 
$myTabbs =  array();
$allMyReadyPageArr =  array();
$allMyReadyTabArr =  array();


$allPages    =   SelectAllPage($conn);

for($a=0;$a<count($allPages); $a++){
    $allPage    =   explode('-',$allPages[$a]);
    
    if( !in_array($allPages,$myTabbs)){
        $myTabbs[]  =   $allPages;
    }

    if( !in_array($allPage[0],$allMyReadyPageArr)){
        $allMyReadyPageArr[]  =   $allPage[0];
    }

}

for($a=0;$a<count($myTabbs[0]); $a++){
    if( !in_array($myTabbs[0][$a],$allMyReadyTabArr)){
        $allMyReadyTabArr[]  =   $myTabbs[0][$a];
    }
}







// if(isset($sc)){
//     $allMyReadyPic  =glob("../pic/*.*");
//     $allMyReadyPage = glob("../pg/*.*");
//     $allMyReadyTab  = glob("../tb/*.*");

    
//         for($a=0;$a<count($allMyReadyPic); $a++){
//             $deriveP = explode('-',$allMyReadyPic[$a]);
//             $derivePi = explode('/',$deriveP[0]);
//             $derivePiSe = explode('~',$deriveP[1]);
//             $derivePiSec = $derivePiSe[0];
            
//             $allMyReadyPicArrSecond[] = $derivePiSec;
//             $derivePic = $derivePi[2];
//             if(!in_array($derivePic,$allMyReadyPicArr)){
//             $allMyReadyPicArr[]=$derivePic;
//             }            
//         }
        
//         for($b=0;$b<count($allMyReadyPage); $b++){
//             $deriveN = explode('/',$allMyReadyPage[$b]);
//             $deriveNa = explode('.',$deriveN[2]);
//             $deriveName = $deriveNa[0];
            
//             if(in_array(strtolower($deriveName),$allMyReadyPicArr)){
//                 $allMyReadyPageArr[]= $deriveName;
                
//             }
//         }

//         for($c=0;$c<count($allMyReadyTab); $c++){
//             $deriveT = explode('-',$allMyReadyTab[$c]);
//             $deriveTa = explode('.',$deriveT[1]);
//             $deriveTab = $deriveTa[0];
            
//             if(in_array(strtolower($deriveTab),($allMyReadyPicArrSecond))){
                
//                 if(!in_array(strtolower($deriveTab),($allMyReadyTabArr))){
//                     $deriveFi = explode('/',$allMyReadyTab[$c]);
//                     $deriveFin = explode('.',$deriveFi[2]);
//                     $deriveFinal =  $deriveFin[0];
                    
//                 $allMyReadyTabArr[]= $deriveFinal;
//             }
//         }
//         }









// }else{
//     $allMyReadyPic  =glob("pic/*.*");
//     $allMyReadyPage = glob("pg/*.*");
//     $allMyReadyTab  = glob("tb/*.*");


//     for($a=0;$a<count($allMyReadyPic); $a++){
//         $deriveP = explode('-',$allMyReadyPic[$a]);
//         $derivePi = explode('/',$deriveP[0]);
//         $derivePiSe = explode('~',$deriveP[1]);
//         $derivePiSec = $derivePiSe[0];
        
//         $allMyReadyPicArrSecond[] = $derivePiSec;
//         $derivePic = $derivePi[1];
//         if(!in_array($derivePic,$allMyReadyPicArr)){
//         $allMyReadyPicArr[]=$derivePic;
//         }
//     }
//     for($b=0;$b<count($allMyReadyPage); $b++){
//         $deriveN = explode('/',$allMyReadyPage[$b]);
//         $deriveNa = explode('.',$deriveN[1]);
//         $deriveName = $deriveNa[0];
        
//         if(in_array(strtolower($deriveName),$allMyReadyPicArr)){
//             $allMyReadyPageArr[]= $deriveName;
            
//         }
//     }
    
//     for($c=0;$c<count($allMyReadyTab); $c++){
//         $deriveT = explode('-',$allMyReadyTab[$c]);
//         $deriveTa = explode('.',$deriveT[1]);
//         $deriveTab = $deriveTa[0];
        
//         if(in_array(strtolower($deriveTab),($allMyReadyPicArrSecond))){
            
//             if(!in_array(strtolower($deriveTab),($allMyReadyTabArr))){
//                 $deriveFi = explode('/',$allMyReadyTab[$c]);
//                 $deriveFin = explode('.',$deriveFi[1]);
//                 $deriveFinal =  $deriveFin[0];
                
//             $allMyReadyTabArr[]= $deriveFinal;
//         }
//     }
//     }
// }




?>