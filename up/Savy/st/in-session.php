<?php
if(!isset($sc)){
    session_start();
}
include('configuration/actions.php');


// $sql_fetch_pic2 = "SELECT phone,shop_name,our_offer,bustop,junction,city,facebook,whatsapp,linked_in FROM marketers WHERE id='$pap'";
// $run_fetch_pic2= mysqli_query($mysqli,$sql_fetch_pic2);
// $row_fetch_pic2 = mysqli_fetch_array($run_fetch_pic2);


// $shop_line  =   $row_fetch_pic2['phone'];
// $shop_name  =   $row_fetch_pic2['shop_name'];
// $desc       =   $row_fetch_pic2['our_offer'];
// $bustop     =   $row_fetch_pic2['bustop'];
// $junction   =   $row_fetch_pic2['junction'];
// $city       =   $row_fetch_pic2['city'];
// $facebook     =   $row_fetch_pic2['facebook'];
// $whatsapp   =   $row_fetch_pic2['whatsapp'];
// $linked_in       =   $row_fetch_pic2['linked_in'];




echo "</div>";
$ShowLink = glob("../tb/*.*");
// print_r($ShowLink);
    $matchLink = array();
    $matchPic = array();
    $matchName = array();
    $matchCap  = array();
    for($i=0;$i<count($ShowLink); $i++){
        $LinkS = $ShowLink[$i];
        $LinkSh = explode('-',$LinkS);
        $LinkShow = explode('/',$LinkSh[0]);
        if(ucwords($LinkShow[2]) == ucwords($name)){
            $ShowPic = glob("../pic/*.*");
            
            $hop = array();
            for ($j=0; $j<count($ShowPic); $j++){

                $PicS = explode('--',$ShowPic[$j]);
                $PicSh2 = explode('-',$PicS[1]);
                $tab_Link = explode('~',$PicSh2[1]);
                $secret = explode('.',$tab_Link[1]);

                $getSkey  = $secret[0];
                
                $PicShow = $PicSh2[0];
                if(strtolower($PicShow) == strtolower($name)){
                    $myCp   =   explode('.',$PicS[1]);

                    $Skey       =   SelectTrack($conn,$getSkey);
                    // echo $Skey['caption'];
                    // $fileName="../cp/".$myCp[0].".".$myCp[1].".txt";
                    //     $myfile = fopen("$fileName","r");
                    //     // str_replace("\n", '', $myfile);
                    //     // str_replace("\r", '', $myfile);
                    //     $hol = fgets($myfile);

                    $disPic = $ShowPic[$j];
                    // echo $PicSh[1];
                    $disLink= "../tb/".$tab_Link[0].".php";
                    if(!in_array($disPic,$matchPic)){
                        if(!in_array($disLink,$matchName)){
                            if(!in_array($disLink,$matchLink)){
                                $matchLink[]= $disLink;
                                $matchPic[]= $disPic;
                                $matchName[]= $tab_Link[0];
                                $matchCap[] = substr($Skey['caption'],0,50)."...";
                            }
                        }
                    }
                } 
            }
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
          
        





          $ShowAllLink = glob("tb/*.*");
          $allLink = array();
          $allPic = array();
          $allName = array();
          for($i=0;$i<count($ShowAllLink); $i++){
              $AllLinkS = $ShowAllLink[$i];
              $AllLinkSh = explode('/',$AllLinkS);
              $AllLinkShow = explode('.',$AllLinkSh[1]);
                  $AllShowPic = glob("pic/*.*");
                  for ($j=0; $j<count($AllShowPic); $j++){
      
                      $AllPicS = explode('--',$AllShowPic[$j]);
                      $AllPicShh = explode('-',$AllPicS[1]);
                     
                      $AllPicShow = $AllPicShh[0];
                      $AllLinkSh2 = explode('-',$AllLinkShow[0]);
      
                      // echo $AllLinkSh2[0].'--'.$AllPicShow.'-----------';
                      if(strtolower($AllPicShow) == strtolower($AllLinkSh2[0])){
                          
                          $AlldisPic = $AllShowPic[$j];
                          $AlldisLink= "pg/".ucwords($AllPicShow).".php";
                        //   echo $AlldisLink."-=-=-=-=".$AlldisPic."--------------------".$AllPicShow."<br>";
                          if(!in_array($AlldisPic,$allPic)){
                              $allLink[]= $AlldisLink;
                              $allPic[]= $AlldisPic;
                              $allName[]= $AllPicShow;
                          }
                    } 
                }
        }
 
// print_r($allName);
$allLen = sizeof($allPic);
$allrandRange0=rand(1,$allLen);
$allrandRange1=rand(1,$allLen);
$allrandRange2=rand(1,$allLen);
$allrandRange3=rand(1,$allLen);
$allrandRange4=rand(1,$allLen);
$allrandRange5=rand(1,$allLen);

$_SESSION['allrandRange0']=$allrandRange0;
$_SESSION['allrandRange1']=$allrandRange1;
$_SESSION['allrandRange2']=$allrandRange2;
$_SESSION['allrandRange3']=$allrandRange3;
$_SESSION['allrandRange4']=$allrandRange4;
$_SESSION['allrandRange5']=$allrandRange5;

           

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

if(isset($_POST['Newsletter'])){
    $receiverName = $visitors['username'];
    $receiverEmail = $visitors['email'];
    $senderEmail = $sellerInfo['email'];
    $senderShop = $row_id['shop_name'];

    if(newsletters($conn,$receiverName,$receiverEmail,$senderEmail,$senderShop,$myVisitor)){
    
        $myfile = fopen("../Newsletter.txt", "a") or die("Unable to open file!");
        $txt = $receiverName."~~".$receiverEmail."||";
        fwrite($myfile, $txt);
        fclose($myfile);
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