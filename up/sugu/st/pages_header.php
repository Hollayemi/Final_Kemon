<?php
  require_once('../webTemp.php');
  session_start();
  include_once('configuration/config.php');
  include_once('configuration/initialize.php');
  include('in-session.php');
?>
<!DOCTYPE html>
<html lang="">
  <head>
    <title>Kemon-Market</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="../../lib/v2.3.2/jquery.rateyo.min.css"/>
    <?php
          include('css/style.css.php');
          echo "</style>";
    ?><br>
    <link rel="stylesheet" href="../../lib/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="../../<?php echo $webTemp ?>/st/css/mycss.css">
    <script>document.cookie = "_quex224My = "+screen.width</script>
  </head>
  <?php 
      include("dropdown.php");
  ?>
  <body id="top" class="top" style="overflow:auto">
         
<div class="wrapper row0">
<div id="topbar" class="hoc clear" style="margin-top:-20px">
    <div class="fl_left">
      <div class="myTopBar">
        <ul class="nospace">
          <li><a href="../<?php echo $genId ?>.php"><i class="fas fa fa-home fa-lg"></i></a></li>
              <?php
              foreach($allMyReadyPageArr as $tabb){
                if(ucwords($name)==$tabb){
              ?>
          
          <li><a href="../pg/<?php echo $tabb?>.php"><?php echo $tabb?></a></li>
                
                <?php
                  }else{
                    echo '<li><a href="../pg/'.$tabb.'.php">'.$tabb.'</a></li>';
                  }
                }
                ?>
        <li style="margin-left:90px; margin-right:30px"><a href="../../../exp.php">Logout</a></li>
        </ul>
      </div>
      <div class="fl_right">
    </div>
    </div>
  </div>

</div>
   
<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <div id="logo" class="one_half first">
      <h1 class="logoname"><a href="../<?php echo $genId ?>.php"><span><?php echo $row_id['shop_name'] ?></span>Kemon-Market</a><br><br>
      <?php //echo ucwords('<h1 class="pageTitle">('.$extPage.')</h1>') ?></h1>
    </div>
    <div class="one_half">
      <ul class="nospace clear">
        <li class="one_half first">
          <div class="block clear"><i class="fas fa fa2 fa-phone"></i> <span><strong class="block">Call Us:</strong> <?php echo $row_id['phone'] ?></span></span> </div>
        </li>
        <li class="one_half">
          <div class="block clear"><i class="far fa fa2 fa-envelope"></i> <span><strong class="block"> Email:</strong> <?php echo $sellerInfo['email'] ?></span></span> </div>
        </li>
      </ul>
    </div>

    </header>
    <nav id="mainav" class="hoc clear"> 
          <ul class="clear">
            <li class="active"><a href="../<?php echo $genId ?>.php">Home</a></li>
            <?php 
                // print_r($allMyReadyPageArr);
                for($a=0;$a<count($allMyReadyPageArr); $a++){
                  if(strtolower($name) == strtolower($allMyReadyPageArr[$a])){
                    echo '<li class="active"><a class="drop" href="#">'. $allMyReadyPageArr[$a].'</a>';
                }else{
                  echo '<li><a class="drop" href="../pg/'.$allMyReadyPageArr[$a].'.php">'. $allMyReadyPageArr[$a].'</a>';
                }
                  echo "<ul>";
                    for($b=0;$b<count($allMyReadyTabArr); $b++){
                      $eacT = explode('-', $allMyReadyTabArr[$b]);
                      if(strtolower($eacT[0]) == strtolower($allMyReadyPageArr[$a])){
                          echo '<li><a href="../tb/'.strtolower($allMyReadyTabArr[$b]).'.php">-- '.$eacT[1].'</a></li>';
                      }
                    }
              ?>
              </ul>
            </li>
            <?php 
                }
            ?>
          </ul>    
        </nav>
</div>
<div class="wrapper bgded overlay" style="background-image:url('../pic/<?php echo $Mypic[(sizeof($Mypic)-1)]?>');">
  <div id="pageintro" class="hoc clear"> 
    <article>
      <p style="letter-spacing:1px;text-transform:lowercase"><?php echo strtolower(substr($row_id['our_offer'],0,100))."[...]";?></p>
      <h3 class="heading"><?php echo $row_id['shop_name'] ?></h3>
      <p>Junction: <?php echo $row_id['junction'] ?><br>Bustop:<?php echo $row_id['bustop'] ?></p>
      <footer><a class="btn scrollto" style="padding:0px 15px" href="#locMap">Show map</a></footer>
    </article>
  </div>
</div>
