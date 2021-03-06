<?php
  session_start();
  include_once('configuration/config.php');
  include_once('configuration/initialize.php');
  include('../st/in-session.php');
?>
<!DOCTYPE html>
<html lang="">
  <head>
    <title>Kemon-Market</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="../../v2.3.2/jquery.rateyo.min.css"/>
    <?php
          include('../st/layout/styles/layout.css.php');
          include('../st/layout/styles/framework.css.php');
    ?><br>
    <link rel="stylesheet" href="../st/font-awesome.min.css">
    <link rel="stylesheet" href="../st/css/mycss.css">
    <script>document.cookie = "_quex224My = "+screen.width</script>
  </head>
  <?php 
      include("../st/dropdown.php");
  ?>
  <body id="top" class="top" style="overflow:auto">
      <section class="shotLnk">
          <div class="sho">
                <button id="showLinkMenu" style="position:absolute;top:30px; right:15px;font-size:30px" class="cancel_x">X</button>
                <li class="active"><a href="../<?php echo $genId ?>.php">Home</a></li><br>
                <?php 
                    for($a=0;$a<count($allMyReadyPageArr); $a++){
                      echo '<li class="mainDropper"><a class="drop" href="../pg/'.$allMyReadyPageArr[$a].'.php">'. $allMyReadyPageArr[$a].' </a><i class="indDrop">></i>';
                      echo "<ul>";
                        for($b=0;$b<count($allMyReadyTabArr); $b++){
                          $eacT = explode('-', $allMyReadyTabArr[$b]);
                          if(strtolower($eacT[0]) == strtolower($allMyReadyPageArr[$a])){
                              echo '<li class="sideBarDropDown" style="display:none"><a href="../tb/'.strtolower($allMyReadyTabArr[$b]).'.php"> '.$eacT[1].'</a></li>';
                          }
                        }?>
                  </ul>
                </li>
                <?php 
                    }
                    echo "<center><br><br>";
                    if(isset( $_SESSION['user_info_id'])){
                      echo '<form method="POST" action="'.$_SERVER["PHP_SELF"].'">
                              <button type="submit" name="Newsletter" class="LLSa" value="submit">Subscribe</button>                   
                          </form>';
                      echo "<a href='../../../signin.php' class='LLS'><h2>Logout</h2></a>";
                    }else{
                      echo " <h2 class='LLS'><a href='../../../signin.php'>Login</a></h2>";
                    }
                    echo "</center>"
                ?>
          </div>
      </section>

<section>
<!-- <center>
  <div class="popIn">
      <h3 class="cancelPopX" onclick="myFunctionBig()">X</h3>
      <a href="#"><img id="changeImage" src="../../../img/km.png"  alt="" style="width:30px;height:30px;border-radius:50%;"></a>
      <h5 id="changeText"></h5>
  </div>
</center> -->

</section>
 
<div class="norBlur">          
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
<div class="wrapper bgded overlay" style="background-image:url('../pic/<?php echo $Mypic[0]?>');">
  <div id="pageintro" class="hoc clear"> 
    <article>
      <p style="letter-spacing:1px;text-transform:lowercase"><?php echo strtolower(substr($row_id['our_offer'],0,100))."[...]";?></p>
      <h3 class="heading"><?php echo $row_id['shop_name'] ?></h3>
      <p>Junction: <?php echo $row_id['junction'] ?><br>Bustop:<?php echo $row_id['bustop'] ?></p>
      <footer><a class="btn scrollto" href="#locMap">Show map</a></footer>
    </article>
  </div>
</div>
