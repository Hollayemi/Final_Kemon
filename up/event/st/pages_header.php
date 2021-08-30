<?php 
  
  session_start();
  include('configuration/actions.php');
  include('configuration/initialize.php');
  include('in-session.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <title>Kemon-Market</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">
  <link href="../st/img/km.png" rel="icon">
  <link href="../st/img/km.png" rel="apple-touch-icon">
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800" rel="stylesheet">
  <link href="../../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <link href="../../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="../../lib/animate/animate.min.css" rel="stylesheet">
  <link href="../../lib/venobox/venobox.css" rel="stylesheet">
  <link href="../../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <?php
    include('css/style.css.php')
  ?>
  <link href="../../<?php echo $webTemp?>/st/css/mycss.css" rel="stylesheet">
</head>
<body class="body">
<div id="fb-root"></div>
<script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v10.0" nonce="WHM8mb9K"></script>
  <header id="header">
    <div class="container">
      <div id="logo" class="pull-left">
        <h1><a href="#main">Ke<span>m</span>on</a></h1>
      </div>
          <?php                          
          
          $loo = explode('-',$loop[5]);
          $lo = ucwords($loo[0]);
          $exPag = explode('.',$loo[1]);
          $extPage = $exPag[0];
            include("dropdown.php");
            ?>
             <nav id="nav-menu-container">
              <ul class="nav-menu">
              <li class=""><a href="../<?php echo $genId ?>.php">Home</a></li>
              <?php
                foreach($allMyReadyPageArr as $tabb){
                  if(strtolower($loo[0]) == strtolower($tabb)){
                    echo '<li class="menu-active mainDropper"><a href="../pg/'.ucwords($tabb).'.php">'. ucwords($tabb).'</a>';
                  }else{
                    echo '<li class="mainDropper"><a href="../pg/'.ucwords($tabb).'.php">'. ucwords($tabb).'</a>';
                  }
                  echo "<ul>";
                  for($b=0;$b<count($allMyReadyTabArr); $b++){
                    $eacT = explode('-', $allMyReadyTabArr[$b]);
                    if(strtolower($eacT[0]) == strtolower($tabb)){
                        echo '<li><a href="../tb/'.strtolower($allMyReadyTabArr[$b]).'.php"> '.ucwords($eacT[1]).'</a></li>';
                    }
                  }
                  ?>
                  </ul>
                  
                </li><?php

                }
              
              ?>
            <li style="margin-left:0px; margin-right:0px"><a href="../../../signin.php">Logout</a></li>
        </ul>
      </nav>
    </div>
  </header>


  <div class="shiftMain">
    <div class="sub-menuDiv" style="margin-left:;opacity:1;visibility:hidden">
      <div class="sub_links">
    <?php
        require_once("dropdown.php");
        for($b=0;$b<count($allMyReadyTabArr); $b++){
          $eacT = explode('-', $allMyReadyTabArr[$b]);
          if(strtolower($eacT[0]) == strtolower($namePage)){
              echo '<li><a href="../tb/'.strtolower($allMyReadyTabArr[$b]).'.php"> '.$eacT[1].'</a></li>';
          }
        }
                              
?>
       </div>                         
    </div>
    <div class="sec-mainDiv">

      <main id='headerMain' style="background-image:url('../pic/<?php echo $Mypic[1]?>">
            <div class="headerDiv">
                        <div class="showSideLinks" style="top:80px;"><i class="menu-fa menu-fa1 fa fa-bars"></i> <i class="menu-fa menu-fa2 fa fa-remove" style="transform:scale(0)"></i></div>
                      <?php
                      if(!isset($_SESSION['user_info_id'])){
                        echo "<br><br><br><br><br><br><br>";
                      }
                      echo"<h1 class='shopHeader'>".ucwords($row_id['shop_name'])."<br>(".ucwords($extPage).")</h1><br>";
                      echo "<div style='text-align:center;color:#fff; width:70%;'>".substr($row_id['our_offer'],0,120)."...</div>"."<br>";
                      echo "<div class='About_me' style='text-align:left;'>";
                        echo '<span><a href="https://'.$row_id['facebook'].'"><i class="fa fa-facebook fa-2x"></i></a></span>';
                        echo '<span><a href="'.$row_id['whatsapp'].'"><i class="fa fa-whatsapp fa-2x " ></i></a></span><br>';

                      echo "</div>";
                  ?>
                  <div class="fb-share-button"
                   data-href="https://www.google.com/search?q=share+button+facebook&amp;source=lnms&amp;tbm=vid&amp;sa=X&amp;ved=2ahUKEwi9892tuL_wAhVaAWMBHfIJC88Q_AUoAnoECAEQBA" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.google.com%2Fsearch%3Fq%3Dshare%2Bbutton%2Bfacebook%26source%3Dlnms%26tbm%3Dvid%26sa%3DX%26ved%3D2ahUKEwi9892tuL_wAhVaAWMBHfIJC88Q_AUoAnoECAEQBA&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
                   <?php
                    if(!isset($_SESSION['user_info_id'])){
                      echo "<br><br>";
                    }
                   ?>
            </div>
      </main>
    