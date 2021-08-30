<!DOCTYPE html>
<html lang="en">
<?php
  $nameHome =  "yes";
  if(isset($_SESSION['user_info_id'])){
    $Pagehommie = "true";
  }
  ?>
<head>
  <meta charset="utf-8">
  <title>Kemon-Market</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <link rel="stylesheet" href="../lib/v2.3.2/jquery.rateyo.min.css"/>
  <script>document.cookie = "_quex224My= "+screen.width</script>
  <link href="st/img/km.png" rel="icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">
  <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../lib/animate/animate.min.css" rel="stylesheet">
  <link href="../lib/venobox/venobox.css" rel="stylesheet">
  <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">

  <link rel="stylesheet" href="../<?php echo $webTemp ?>/st/css/mycss.css">
  <?php
    include('in-session.php');
    include('css/style.css.php');
    include('dropdown.php');
    include('Configuration/actions.php');
  ?>
</head>
<body>
 <?php
  if(require_once('../../functions.php')){
    // rating($row_id['shop_name']);
  }
?>
  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <h1><a href="#main">Ke<span>m</span>on</a></h1>
      </div>
         
      <nav id="nav-menu-container">
        <ul class="nav-menu">
            <li class="menu-active"><a href="#intro">Home</a></li>
            <?php
              foreach($allMyReadyPageArr as $tabb){
                echo '<li class="mainDropper"><a href="pg/'.$tabb.'.php">'. ucwords($tabb).'</a>';
                echo "<ul>";
                for($b=0;$b<count($allMyReadyTabArr); $b++){
                  $eacT = explode('-', $allMyReadyTabArr[$b]);
                  if(strtolower($eacT[0]) == strtolower($tabb)){
                      echo '<li><a href="tb/'.strtolower($allMyReadyTabArr[$b]).'.php"> '.ucwords($eacT[1]).'</a></li>';
                  }
                }
                
                ?>
                    </ul>
                
              </li><?php
                

              }
            ?>
            <li style="position:absolute;right:30px;">

              <?php
              if(isset($_SESSION['user_info_id'])){
                  echo '<form method="POST" action="'.$_SERVER["PHP_SELF"].'">
                        <button type="submit" name="Newsletter" style="padding:5px 10px;"class="subscribeClass subCl" value="submit">Subscribe</button>
                      
                  </form>';
                  echo '<li class="subscribeClass" style="margin-top:-5px"><a href="../../signin.php">Logout</a></li>';
                  
              }else{
                echo '<li class="subscribeClass" style="margin-top:-5px"><a href="../../signup.php">Sign up</a></li>';
              }
                 ?>
            </li>
        </ul>
      </nav>
    </div>
  </header>
  <!-- <a href="../../../exp.php" class="popLogin "><h4>Login</h4></a> -->
  <?php
  $explod=explode(' ',$row_id['shop_name']);
  if($row_id['bgPic'] == 'rotate'){
    $myBg = $_SESSION['myHomeBg'];
  }else{
    $myBg = 'homeBg.png';
  }
  ?>
  <section id="intro" style="background-image:url('<?php echo $myBg?>')">
    <div class="intro-container wow fadeIn">
      <h1 class="mb-4 pb-0"><span><?php echo $row_id['shop_name'] ?></span><?php isset($explod[0]) ? $explod[0] :  " r"?></h1>
      <p class="mb-4 pb-0" style='width:60%'><?php echo substr($row_id['our_offer'],0,150)."..." ?></p> 
      <a href="https://www.youtube.com/watch?v=jDDaplaOz7Q" class="venobox play-btn mb-4" data-vbtype="video"
        data-autoplay="true"></a>
      <a href="#footer" class="about-btn scrollto">Contact Us</a>
    </div>
  </section>
  <main id="main">
    <!--==========================
      About Section
    ============================-->
    <section id="about">
      <div class="container">
        <div class="row">
          <div class="col-lg-6">
            <h2>Our Info</h2>
            <p><?php echo substr($row_id['our_offer'],0,50) ?></p>
          </div>
          <div class="col-lg-3">
            <h3>Address</h3>
            <p><?php echo ($row_id['junction']) ?></p>
            <p><?php echo ($row_id['bustop']) ?></p>
            <p><?php echo ($row_id['city']) ?></p>
          </div>
          <div class="col-lg-3">
            <h3>Connect Us </h3>
            <p><?php echo ($sellerInfo['phone']) ?></p>
            <p><?php echo ($sellerInfo['email']) ?></p>
          </div>
        </div>
      </div>
    </section>
    </section>
    <section id="speakers" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Our Uploads</h2>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6">
            <div class="speaker">
              <?php echo '<img src="pic/'.$matchPic[$_SESSION['allrandRange0']-1].'"  alt="pic1" height="350px" width="350px" class="picBox">'?>
              <div class="details">
                <?php echo '<h3><a href="'.$matchPageLink[$_SESSION['allrandRange0']-1].'">'.ucwords($matchName[$_SESSION['allrandRange0']-1]).'</a></h3>';?>
                <div class="social">
                  <a href="<?php echo $row_id['facebook'] ?>"><i class="fa fa-facebook"></i></a>
                  <?php echo '<a href="tel:'.$row_id['phone'].'"><i class="fa fa-phone"></i></a>'?>
                  <?php echo '<a href="'.$_SESSION['whatsapp'].'"><i class="fa fa-whatsapp"></i></a>'?>
                  <a class="twitter-share-button"href="https://twitter.com/intent/tweet?text=Hello%20world"data-size="large">Tweet</a>
                  <div class="fb-share-button" data-href="<?php echo $_SERVER['PHP_SELF'].'/'.$allPic[$_SESSION['allrandRange0']-1] ?>" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.google.com%2Fsearch%3Fq%3Dshare%2Bbutton%2Bfacebook%26source%3Dlnms%26tbm%3Dvid%26sa%3DX%26ved%3D2ahUKEwi9892tuL_wAhVaAWMBHfIJC88Q_AUoAnoECAEQBA&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-lg-4 col-md-6">
            <div class="speaker">
            <?php echo '<img src="pic/'.$matchPic[$_SESSION['allrandRange1']-1].'" alt="Speaker 1" height="350px !important" width="350px" class="picBox">'?>
              <div class="details">
              <?php echo '<h3><a href="'.$matchPageLink[$_SESSION['allrandRange1']-1].'">'.ucwords($matchName[$_SESSION['allrandRange1']-1]).'</a></h3>';?>
              <div class="social">
             <a href="<?php echo $row_id['facebook'] ?>"><i class="fa fa-facebook"></i></a>
             <?php echo '<a href="tel:'.$sellerInfo['phone'].'"><i class="fa fa-phone"></i></a>'?>
             <?php echo '<a href="'.$_SESSION['whatsapp'].'"><i class="fa fa-whatsapp"></i></a>'?>
           </div>
              </div>
            </div>
          </div>
     <div class="col-lg-4 col-md-6">
       <div class="speaker">
       <?php echo '<img src="pic/'.$matchPic[$_SESSION['allrandRange2']-1].'" alt="Speaker 1" height="350px !important" width="350px" class="picBox">'?>
         <div class="details">
         <?php echo '<h3><a href="'.$matchPageLink[$_SESSION['allrandRange2']-1].'">'.ucwords($matchName[$_SESSION['allrandRange2']-1]).'</a></h3>';?>
         <div class="social">
             <a href="<?php echo $row_id['facebook'] ?>"><i class="fa fa-facebook"></i></a>
             <?php echo '<a href="tel:'.$sellerInfo['phone'].'"><i class="fa fa-phone"></i></a>'?>
             <?php echo '<a href="'.$_SESSION['whatsapp'].'"><i class="fa fa-whatsapp"></i></a>'?>
           </div>
         </div>
       </div>
     </div>
    
     <div class="col-lg-4 col-md-6">
       <div class="speaker">
       <?php echo '<img src="pic/'.$matchPic[$_SESSION['allrandRange3']-1].'" alt="Speaker 1" height="350px !important" width="350px" class="picBox">'?>
         <div class="details">
         <?php echo '<h3><a href="'.$matchPageLink[$_SESSION['allrandRange3']-1].'">'.ucwords($matchName[$_SESSION['allrandRange3']-1]).'</a></h3>';?>

           <div class="social">
             <a href="<?php echo $row_id['facebook'] ?>"><i class="fa fa-facebook"></i></a>
             <?php echo '<a href="tel:'.$sellerInfo['phone'].'"><i class="fa fa-phone"></i></a>'?>
             <?php echo '<a href="'.$_SESSION['whatsapp'].'"><i class="fa fa-whatsapp"></i></a>'?>
           </div>

         </div>
       </div>
     </div>

     <div class="col-lg-4 col-md-6">
       <div class="speaker">
       <?php echo '<img src="pic/'.$matchPic[$_SESSION['allrandRange4']-1].'" alt="Speaker 1" height="350px !important" width="350px" class="picBox">'?>
         <div class="details">
         <?php echo '<h3><a href="'.$matchPageLink[$_SESSION['allrandRange4']-1].'">'.ucwords($matchName[$_SESSION['allrandRange4']-1]).'</a></h3>';?>

           <div class="social">
             <a href="<?php echo $row_id['facebook'] ?>"><i class="fa fa-facebook"></i></a>
             <?php echo '<a href="tel:'.$sellerInfo['phone'].'"><i class="fa fa-phone"></i></a>'?>
             <?php echo '<a href="'.$row_id['whatsapp'].'"><i class="fa fa-whatsapp"></i></a>'?>
           </div>

         </div>
       </div>
     </div>

     <div class="col-lg-4 col-md-6">
       <div class="speaker">
       <?php echo '<img src="pic/'.$matchPic[$_SESSION['allrandRange5']-1].'" alt="Speaker 1" height="350px" width="350px" class="picBox">'?>
         <div class="details">
         <?php echo '<h3><a href="'.$matchPageLink[$_SESSION['allrandRange5']-1].'">'.ucwords($matchName[$_SESSION['allrandRange5']-1]).'</a></h3>';?>

         <div class="social">
             <a href="<?php echo $row_id['facebook'] ?>"><i class="fa fa-facebook"></i></a>
             <?php echo '<a href="tel:'.$row_id['phone'].'"><i class="fa fa-phone"></i></a>'?>
             <?php echo '<a href="'.$row_id['whatsapp'].'"><i class="fa fa-whatsapp"></i></a>'?>
           </div>
           </div>
         </div>
       </div>
     </div>
    </section>
    
    <!--==========================
      Hotels Section
    ============================-->
    
    <!--==========================
      Gallery Section
    ============================-->
    <?php 
    if(sizeof($myGal) != 0){
      ?>
    
      <section id="gallery" class="wow fadeInUp">

        <div class="container">
          <div class="section-header">
            <h2>Gallery</h2>
            <p>Check our gallery from the recent events</p>
          </div>
        </div>

        <div class="owl-carousel gallery-carousel">

        <?php
        $Owl_AllPics = $myGal;
        
          for($i=0; $i< count($Owl_AllPics); $i++){
        ?>
          <a href="pic/<?php echo $Owl_AllPics[$i]['picture']?> " class="venobox" data-gall="gallery-carousel"><img src="pic/<?php echo $Owl_AllPics[$i]['picture']?>" width="250" height="270" alt=""></a>
        
        <?php
            }
        ?>
        
        </div>
      </section>    

    <?php 
    }
      ?>

    <section id="hotels" style="margin-top:-50px" class="section-with-bg wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <br><h2>Team</h2>
        </div>
          <?php $ShowTeam = glob("usersTeam/*.png") ?>
        <div class="row">
<?php
        
    for($c=0; $c<count($ShowTeam); $c++){
        $showT = explode('/',$ShowTeam[$c]);
        $showTe = explode('.',$showT[1]);
        $showTex = fopen('usersTeam/'.$showTe[0].".txt", "r");
        $showText = fgets($showTex);
        $showTexts=explode('---',$showText);
    ?>
          <div class="col-lg-<?php if(count($ShowTeam)<3){echo "5";}else{echo "4";} ?> col-md-6">
            <div class="hotel">
              <div class="hotel-img">
                <img src="<?php echo $ShowTeam[$c] ?>" alt="Team" style="height:400px;width:100%;" class="img-fluid">
              </div>
              <h3 style="text-align:center"><a href="tel:<?php echo $showTexts[2]?>"><?php echo $showTexts[0] ?></a></h3>
              <p style="text-align:center"><?php echo $showTexts[1] ?></p>
              <div style="text-align:center; margin-top:-10px; padding-bottom:20px">
                <a href="tel:<?php echo $showTexts[2]?>"><i class="mafa fa fa-phone"></i></a>
                <a href="mailto:<?php echo $showTexts[3]?>"><i class="mafa fa fa-envelope"></i></a>
              </div>
              
            </div>
          </div>
<?php

    }

?>
          
        </div>
      </div>

    </section>

    <section id="faq" class="wow fadeInUp">

      <div class="container">

        <div class="section-header">
          <h2>F.A.Q </h2>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-9">
              <ul id="faq-list">
              <?php
                  $loadFaq = glob("cp/*.txt");
                  
                  for($c=0; $c<count($loadFaq); $c++){
                    $loadF = explode('/',$loadFaq[$c]);
                    $showTe = explode('-',$loadF[1]);
                    if($showTe[0]=="Faq"){
                      // echo $showTe[0].'-'.$showTe[1].".txt";
                        $showTex = fopen('cp/'.$showTe[0].'-'.$showTe[1], "r");
                        $showText = fgets($showTex);
                        $showTexts=explode('===',$showText);
                        ?>
                        <li>
                          <a data-toggle="collapse" class="collapsed" href="#faq<?php echo $c?>"><?php echo ucwords($showTexts[0]) ?><i class="mafa fa fa-minus-circle"></i></a>
                          <div id="faq<?php echo $c?>" class="collapse" data-parent="#faq-list">
                            <p>
                            <?php echo ucfirst($showTexts[1]) ?>
                            </p>
                          </div>
                        </li>
                      <?php    
                    }            
                  } 
      ?>
              </ul>
          </div>
        </div>

      </div>

    </section>

    <!--==========================
      Subscribe Section
    ============================-->
    <section id="subscribe">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h2 ><a target="_blank" style="color:#fff;" href="https://awesome-wears.firebaseapp.com">Awesome wears</a></h2>
          <p>We get you a better outfits. We render Good services for our clients.</p>
        </div>
         <?php
              for($t= date("s"); $t <=52; $t++){
                  echo "<img src='../../pic/f".$t.".jpg' alt'Advert' class='wearsPic'";
            }     
            
        ?>
      </div>
    </section>

    <!--==========================
      Buy Ticket Section
    ============================-->
   
    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="section-bg wow fadeInUp">

      <div class="container">

        <div class="section-header">
          <h2>Contact Us</h2>
          <p>Message to <?php echo $row_id['shop_name'] ?>.</p>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Address</h3>
              <address><?php echo $row_id['city'] ?></address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Phone Number</h3>
              <p><a href="tel:<?php echo $sellerInfo['phone'] ?>"><?php echo $sellerInfo['phone'] ?></a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:<?php echo $sellerInfo['email'] ?>"><?php echo $sellerInfo['email'] ?></a></p>
            </div>
          </div>

        </div>

      <?php
        if(isset($_POST['send_message'])){
          echo "yuyu";
            $name=$mysqli->real_escape_string($_POST['name']);
            $email=$mysqli->real_escape_string($_POST['email']);
            $subject=$mysqli->real_escape_string($_POST['subject']);
            $message=$mysqli->real_escape_string($_POST['message']);

            $newSubject  = "<h4>From Kemon Market -> customer message.<br><br>".$subject."</h4>";
            $newMessage  = "<h5>Name:".$name."<br>Email:".$email."<br><br>Hi".$row_id['shop_name']."<br>".$message."</h4>";
            if(MyMailer($newSubject,'stephanyemmitty@gmail.com',$newMessage)){
                  $Sent = "Your message has been sent. Thank you!";
            }else{
              $sent = "Your message not sent. check your connection and try again!";
            }


        }else{
          
        }

        ?>
        <div class="frm">
          <div id="sendmessage"></div>
          <div id="errormessage"></div>
          <form action="" method="POST">
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
              <div class="validation"></div>
            </div>
            <div class="text-center"><button name='send_message' class="btn btn-primary" type="submit">Send Message</button></div>
          </form>
        </div>

      </div>
    </section>
    </main>
 























 
<?php

$footerLink = array();
$footerLinkName = array();


for($k=0; $k<count($allMyReadyTabArr); $k++){
  
  $FNa = explode('-',$allMyReadyTabArr[$k]);
  
  $footerNa = ucwords(strtolower($FNa[1]));
  

  if(!in_array($footerNa,$footerLinkName)){
      if(isset($nameHome)){
        $footerLink[]= "tb/".$allMyReadyTabArr[$k].".php";
      }else{
        $footerLink[]= "../tb/".$allMyReadyTabArr[$k].".php";
      }
      $footerLinkName[]= $footerNa;
  }
}

function repeatFooter($numTimes,$footerLinkName,$footerLink){
  if(!is_float($numTimes+1)){
  for($i=0; $i<$numTimes+1; $i++){
?>
  <div class="col-lg-3 col-md-6 footer-links">
  <h4>Links</h4>
  <ul>
   
  <?php
    if(isset($footerLinkName[(5*$i)+4])){
      echo '<li><i class="fa fa-angle-right"></i> <a href="'.$footerLink[5*$i].'">'.$footerLinkName[5*$i].'</a></li>';
    }
    ?>
  
    <?php
    if(isset($footerLinkName[(5*$i)+1])){
      echo '<li><i class="fa fa-angle-right"></i> <a href="'.$footerLink[(5*$i)+1].'">'.$footerLinkName[(5*$i)+1].'</a></li>';
    }
    ?>
    <?php
    if(isset($footerLinkName[(5*$i)+2])){
      echo '<li><i class="fa fa-angle-right"></i> <a href="'.$footerLink[(5*$i)+2].'">'.$footerLinkName[(5*$i)+2].'</a></li>';
    }
    ?>
    <?php
    if(isset($footerLinkName[(5*$i)+3])){
      echo '<li><i class="fa fa-angle-right"></i> <a href="'.$footerLink[(5*$i)+3].'">'.$footerLinkName[(5*$i)+3].'</a></li>';
    }
    ?>

    
    <?php
    if(isset($footerLinkName[(5*$i)+4])){
      echo '<li><i class="fa fa-angle-right"></i> <a href="'.$footerLink[(5*$i)+4].'">'.$footerLinkName[(5*$i)+4].'</a></li>';
    }
    ?>
  </ul>
</div>

<?php
}
}
}


    ?>
</ul>
</div>
<?php
?>

<footer id="footer">
  <div class="footer-top">
    <div class="container">
      <div class="row">

        <div class="col-lg-3 col-md-6 footer-info">
          <h3><?php echo $row_id['shop_name'] ?></h3>
          <p><?php echo $row_id['our_offer'] ?></p>
        </div>

       <?php 
        // echo sizeof($footerLinkName)."-=-";
         $numTims = sizeof($footerLinkName)/5;
        //  echo $numTims;
         $numTime = explode('.',$numTims);           
         if(is_float($numTims)){
            $timti = $numTime[1] - $numTims;
            $timt = explode('.',$timti);
            $tim = $timt[1]/2;
         }else{
           $tim = 0;
         }
         
         repeatFooter($numTime[0],($footerLinkName),$footerLink);
         $rev_allNames = array_reverse($footerLinkName);
         
        //  repeatFooterLeftOver($tim,$rev_allNames,$numTime[0]+1)
       ?>
        <div class="col-lg-3 col-md-6 footer-contact">
          <h4>Contact Us</h4>
          <p>
            <?php echo $row_id['junction'] ?>,<br>
            <?php echo $row_id['bustop'] ?>,<br>
            <?php echo $row_id['city'] ?>,<br>
            <strong>Phone:</strong> <a href="tel:<?php echo $sellerInfo['phone'] ?>"><?php echo " ".$sellerInfo['phone'] ?></a><br>
            <strong>Email:</strong><a href="mailto:<?php echo $sellerInfo['email'] ?>"><?php echo " ".$sellerInfo['email'] ?></a><br>
          </p>
          <div class="social-links">
            <?php echo '<a href="tel:'.$row_id['phone'].'"><i class="mafa fa fa-phone"></i></a>'?>
            <?php echo '<a href="'.$row_id['whatsapp'].'"><i class="mafa fa fa-whatsapp"></i></a>'?>
            <?php echo '<a href="'.$row_id['facebook'].'"><i class="mafa fa fa-facebook"></i></a>'?>
            <!-- <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
            <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a> -->
          </div>

        </div>

      </div>
    </div>
  </div>

  <div class="container">
    <div class="copyright">
    </div>
    <div class="credits" >
       <h5 style="color:#fff; font-size:17px"></h5> Powered by kemon-Market &copy; <?php echo date('Y') ?> <strong><?php echo $row_id['shop_name'] ?></strong>. </h5>
    </div>
  </div>
</footer>


         
<a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>
<script src="../lib/jquery/jquery.min.js"></script>
<script src="../lib/jquery/jquery-migrate.min.js"></script>
<script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="../lib/easing/easing.min.js"></script>
<script src="../lib/superfish/hoverIntent.js"></script>
<script src="../lib/superfish/superfish.min.js"></script>
<script src="../lib/wow/wow.min.js"></script>
<script src="../lib/venobox/venobox.min.js"></script>
<script src="../lib/owlcarousel/owl.carousel.min.js"></script>
<script src="../<?php echo $webTemp ?>/st/js/main.js"></script>
<script src="../<?php echo $webTemp ?>/st/js/setup.js"></script>
<script type="text/javascript" src="../lib/v2.3.2/jquery.rateyo.js"></script>
<script>
   <?php 
    // if(isset($Pagehommie)){
    // ?>  
    //     document.querySelector('.subscribeSignUp').addEventListener('click',function(){
    //     document.querySelector('.popLogin').style.display="block"
    //   })
    // <?php 
    //       }
    ?>



</script>

</body>

</html>


