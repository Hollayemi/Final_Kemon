<?php
include('configuration/config.php');
$sql="SELECT phone,shop_name,bustop,junction,whatsapp,facebook,linked_in,our_offer,city,bgPic,longitude,latitude FROM marketers WHERE id='$user_id'";
$run=mysqli_query($mysqli,$sql);
$queryRun = mysqli_num_rows($run);

while($row = mysqli_fetch_assoc($run)){
    $_SESSION['in-phone']          =       $row["phone"];
    $_SESSION['in-shop_name']      =       $row["shop_name"];
    $_SESSION['in-bustop']         =       $row["bustop"];
    $_SESSION['in-junction']       =       $row["junction"];
    $_SESSION['in-shop_lines']     =       $row["phone"];
    $_SESSION['in-desc']           =       $row["our_offer"];
    $_SESSION['in-city']           =       $row["city"];
    $_SESSION['in-whatsapp']       =       $row["whatsapp"];
    $_SESSION['in-facebook']       =       $row["facebook"];
    $_SESSION['in-linked_in']      =       $row["linked_in"];
    $_SESSION['bgPic']             =       $row["bgPic"];
    $_SESSION['longitude']         =       $row["longitude"];
    $_SESSION['latitude']          =       $row["latitude"];
}
$sqlCat="SELECT category FROM category WHERE id='$user_id'";
$runCat=mysqli_query($mysqli,$sqlCat);
$querycats = mysqli_fetch_assoc($runCat);

$splitCategory = explode(',',$querycats['category']);

$sqls="SELECT email,username FROM users WHERE id='$user_id'";
$runs=mysqli_query($mysqli,$sqls);
// $queryRuns = mysqli_num_rows($runs);

while($rows = mysqli_fetch_assoc($runs)){
    $_SESSION['in-email']          =       $rows["email"];
    $_SESSION['in-username']       =       $rows["username"];
    
}

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
        // print_r($LinkShow);
        if(ucwords($LinkShow[2]) == ucwords($name)){
            $ShowPic = glob("../pic/*.*");
            // echo $ShowPic[0];
            $hop = array();
            for ($j=0; $j<count($ShowPic); $j++){
                $PicS = explode('~',$ShowPic[$j]);
                $PicSh2 = explode('/',$PicS[0]);
                $PicSh = explode('-',$PicS[0]);
                $PicSho = explode('/',$PicSh[0]);
                
                $PicShow = $PicSho[2];
                if(strtolower($PicShow) == strtolower($name)){
                    $myCp   =   explode('.',$PicS[1]);
                    $fileName="../cp/".$myCp[0].".".$myCp[1].".txt";
                        $myfile = fopen("$fileName","r");
                        // str_replace("\n", '', $myfile);
                        // str_replace("\r", '', $myfile);
                        $hol = fgets($myfile);
                        // echo $hol;


                    $disPic = $ShowPic[$j];
                    // echo $PicSh[1];
                    $disLink= "../tb/".$PicSh2[2].".php";
                    if(!in_array($disPic,$matchPic)){
                        if(!in_array($disLink,$matchName)){
                            if(!in_array($disLink,$matchLink)){
                                    $matchLink[]= $disLink;
                                    $matchPic[]= $disPic;
                                    $matchName[]= $PicSh[1];
                                    $matchCap[] = substr($hol,0,50)."...";
                                        }
                      }
                  }
                } 
                    }
                }
            }

// print_r($matchName);
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
$_SESSION['whatsapp'] = "https://api.whatsapp.com/send?phone=".$_SESSION['in-whatsapp']."&text=Hi,%20from%20Kemon-Market.%20I%20viewed%20your%20page";


$tabChkExistence = array();
$verifyP = glob("pic/*.*");
for ($a=0; $a<count($verifyP); $a++){
$veri = explode('/',$verifyP[$a]);
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
              // echo ucwords($AllLinkShow[0])."----";
                  $AllShowPic = glob("pic/*.*");
                  for ($j=0; $j<count($AllShowPic); $j++){
      
                      $AllPicS = explode('~',$AllShowPic[$j]);
                      $AllPicShh = explode('/',$AllPicS[0]);
                      $AllPicSh2 = explode('-',$AllPicShh[1]);
                      // echo $AllPicSh2[0]."~~~~~~~~~~~";
                      $AllPicShName = explode('-',$AllPicShh[1]);
      
                      $AllPicShow = $AllPicSh2[0];
                      $AllLinkSh2 = explode('-',$AllLinkShow[0]);
      
                      // echo $AllLinkSh2[0].'--'.$AllPicShow.'-----------';
                      if(strtolower($AllPicShow) == strtolower($AllLinkSh2[0])){
                          
                          $AlldisPic = $AllShowPic[$j];
                          // echo $AlldisPic;
                          $AlldisLink= "pg/".ucwords($AllPicShow).".php";
                          // echo $AlldisLink."-=-=-=-=".$AlldisPic."--------------------".$AllPicShName[1]."<br>";
                          if(!in_array($AlldisPic,$allPic)){
                              $allLink[]= $AlldisLink;
                              $allPic[]= $AlldisPic;
                              $allName[]= $AllPicShName[1];
                          }
                    } 
                }
        }
$footerLink = array();
$footerLinkName = array();
// print_r($ShowAllLink);
for($k=0; $k<count($ShowAllLink); $k++){
    $footerLi = $ShowAllLink[$k];
    $FN = $ShowAllLink[$k];
    $FNa = explode('-',$FN);
    $FNam = explode('.',$FNa[1]);
    $footerNa = ucwords(strtolower($FNam[0]));
    

    if(in_array($footerNa,$_SESSION['tabChkExistence'])){
        if(!in_array($footerNa,$footerLinkName)){
            $footerLink[]= $footerLi;
            $footerLinkName[]= $footerNa;
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
$myHomeBg = $HomeBgPic[$rendBg-1];

$_SESSION['myHomeBg']=$myHomeBg;



if(isset($_POST['Newsletter'])){

    $receiverName = $row_myLetter['username'];
    $receiverEmail = $row_myLetter['email'];
    $senderEmail = $_SESSION['in-email'];
    $senderShop = $_SESSION['in-shop_name'];


    $mysqli=mysqli_connect('localhost','root','','market');
    $sql="INSERT INTO newsletters (receiverName,receiverEmail,senderEmail,senderShop,id) VALUES ('$receiverName','$receiverEmail','$senderEmail','$senderShop','$myVisitor')";
    mysqli_query($mysqli,$sql);
    
        $myfile = fopen("../Newsletter.txt", "a") or die("Unable to open file!");
        $txt = $receiverName."~~".$receiverEmail."||";
        fwrite($myfile, $txt);
        fclose($myfile);

    }
    if(isset($_SESSION['user_info_id'])){
        $ppID = $_SESSION['user_info_id'];
        $sql="SELECT star FROM rating WHERE id='$ppID'";
        $run=mysqli_query($mysqli,$sql);
        $queryRun = mysqli_fetch_assoc($run);
        if(isset($queryRun['star'])){
            echo "<script>localStorage.setItem('rate',".$queryRun['star'].")</script>";
        }else{
            echo "<script>localStorage.removeItem('rate')</script>";
        }
    
    }
        if(isset($_POST['rateMyShop'])){
            $raterID    =$mysqli->real_escape_string($_POST['raterID']);
            $rateeShop  =$mysqli->real_escape_string($_POST['rateeShop']);
            $extRate   =$mysqli->real_escape_string($_POST['extRate']);
            
            $ratingSql="INSERT INTO rating (id,star,shopname) VALUES ('$raterID','$extRate','$rateeShop')";
            mysqli_query($mysqli,$ratingSql);
        }  
    
?>