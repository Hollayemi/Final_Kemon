<?php
$ShowLink = glob("../tb/*.*");
// print_r($ShowLink);
    $matchLink      = array();
    $matchPageLink  = array();
    $matchPic       = array();
    $matchName      = array();
    $matchCap       = array();

    $SelectAllPageById  =   SelectAllPageById($conn,$id);
    for($i=0; $i<count($SelectAllPageById); $i++){
        $forM_link        =   strtolower($SelectAllPageById[$i]['page']).".php";
        
        $forM_nam         =   explode('-',$SelectAllPageById[$i]['page']);
        $forM_name        =   $forM_nam[0];
        $forM_Page_link   =   ucwords(strtolower($forM_nam[0])).".php";
        if(strlen($SelectAllPageById[$i]['caption'] >100)){
            $forM_cap         =   substr($SelectAllPageById[$i]['caption'],0,100)."...";
        }else{
            $forM_cap         =   $SelectAllPageById[$i]['caption'];
        }

        $forM_pic         =   $SelectAllPageById[$i]['picture'];
        if(isset($sc) && strtolower($name)== strtolower($forM_nam[0])){
            $matchLink[]      =    $forM_link;
            $matchPageLink[]  =    $forM_Page_link;
            $matchPic[]       =    $forM_pic;
            $matchName[]      =    $forM_name;
            $matchCap[]       =    $forM_cap;
        }elseif(!isset($sc)){
            $matchLink[]      =    $forM_link;
            $matchPageLink[]  =    $forM_Page_link;
            $matchPic[]       =    $forM_pic;
            $matchName[]      =    $forM_name;
            $matchCap[]       =    $forM_cap;
        }else{

        }

    
    }

// print_r($matchName);
// print_r($matchPic);
$len = sizeof($matchPic);
$randRange0=rand(1,$len);
$randRange1=rand(1,$len);
$randRange2=rand(1,$len);
$randRange3=rand(1,$len);
$randRange4=rand(1,$len);
$randRange5=rand(1,$len);
$randRange6=rand(1,$len);

$_SESSION['randRange0']=$randRange0;
$_SESSION['randRange1']=$randRange1;
$_SESSION['randRange2']=$randRange2;
$_SESSION['randRange3']=$randRange3;
$_SESSION['randRange4']=$randRange4;
$_SESSION['randRange5']=$randRange5;
$_SESSION['randRange6']=$randRange6;
// echo $_SESSION['randRange1'];
// echo $matchLink[$_SESSION['randRange0']-1]."br>";
// echo $matchPic[$_SESSION['randRange0']-1]."<br>";
// echo '<img src="'.$matchPic[$_SESSION['randRange0']-1].'">';//----------------".$matchName[$_SESSION['randRange0']-1];
$row_id['whatsapp'] = "https://api.whatsapp.com/send?phone=".$row_id['whatsapp']."&text=Hi,%20from%20Kemon-Market.%20I%20viewed%20your%20page";


$tabChkExistence = array();
$verifyP = glob("pic/*.*");
for ($a=0; $a<count($verifyP); $a++){
$veri = explode('--',$verifyP[$a]);
$verr = explode('-',$veri[1]);
$verri = explode('~',$verr[1]);
$anVery =  ucwords(strtolower($verri[0]));
if(!in_array($anVery,$tabChkExistence)){
    $tabChkExistence[] =  ucwords(strtolower($anVery));
}
$_SESSION['tabChkExistence'] = $tabChkExistence;
// echo count($_SESSION['tabChkExistence']);
}
          
        

$splitCategory = explode(',',selectAllCat($conn,$id)['category']);

           

if(isset($sc)){
    $HomeBgPic = glob("../pic/*.*");
    
}else{
    $HomeBgPic = glob("pic/*.*");
    
}
$allHomeBg = array();
for($c=0; $c<count($HomeBgPic); $c++){
    $allHomeBg[]=$HomeBgPic[$c];
}
$rendBg = rand(1,sizeof($allHomeBg));
// print_r($HomeBgPic);
$myHomeBg = $HomeBgPic[($rendBg-1)];

$_SESSION['myHomeBg']=$myHomeBg;
if(isset($_SESSION['user_info_id'])){
    if(!empty(visitors($conn,$_SESSION['user_info_id']))){
        $visitors =  visitors($conn,$_SESSION['user_info_id']);
        if(isset($_POST['Newsletter'])){
            $myVisitor    = $visitors['id'];
            $receiverName = $visitors['username'];
            $receiverEmail = $visitors['email'];
            $senderEmail = $sellerInfo['email'];
            $senderShop = $row_id['shop_nick'];
            if(count(selectNewsletters($conn,$myVisitor)) < 1){
                if(newsletters($conn,$receiverName,$receiverEmail,$senderEmail,$senderShop,$myVisitor)){
                
                    $myfile = fopen("../Newsletter.txt", "a") or die("Unable to open file!");
                    $txt = $receiverName."~~".$receiverEmail."||";
                    fwrite($myfile, $txt);
                    fclose($myfile);
                }
            }
        }
    }

}
    if(isset($_SESSION['user_info_id'])){
        
        if(!empty(selectStar($conn,$myVisitor))){
            $queryRun   =   selectStar($conn,$myVisitor);
            if(isset($queryRun['star'])){
                echo "<script>localStorage.setItem('rate',".$queryRun['star'].")</script>";
            }else{
                echo "<script>localStorage.removeItem('rate')</script>";
            }
        }
    
    }
        if(isset($_POST['rateMyShop'])){
            $raterID   =    testInput($_POST['raterID']);
            $rateeShop =    testInput($_POST['rateeShop']);
            $extRate   =    testInput($_POST['extRate']);
            if(empty($selectStar['star'])){
                insertRating($conn,$raterID,$extRate,$rateeShop);
            }
        }  
    
?>