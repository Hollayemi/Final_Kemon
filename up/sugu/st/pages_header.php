<?php
  session_start();
  include_once('configuration/config.php');
  include_once('initialization/initialize.php');
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
                      echo "<a href='../../../login_form.php' class='LLS'><h2>Logout</h2></a>";
                    }else{
                      echo " <h2 class='LLS'><a href='../../../login_form.php'>Login</a></h2>";
                    }
                    echo "</center>"
                ?>
          </div>
      </section>

<section>
<center>
  <div class="popIn">
      <h3 class="cancelPopX" onclick="myFunctionBig()">X</h3>
      <a href="#"><img id="changeImage" src="../../../img/km.png"  alt=""></a>
      <h5 id="changeText"></h5>
      <!-- <span><button style="width:100px;height:100px"  onclick="myFunctionBig()">X</button></span> -->
  </div>
</center>

</section>
  
   <?php                          
          
          $chkExistence = array();
          $verifyP = glob("../pic/*.*");
          for ($a=0; $a<count($verifyP); $a++){
            $veri = explode('/',$verifyP[$a]);
            $verri = explode('-',$veri[2]);
            $anVery = $verri[0];
            if(!in_array($anVery,$chkExistence)){
              $chkExistence[] =  ucwords(strtolower($anVery));
              
            }
          }
          $allTabs = array();
                    echo "</div>";
            $protabs = glob("../pg/*.php");
            echo "<div class='each_page'>";
            for ($i=0; $i<count($protabs); $i++){
                $tab = $protabs[$i];
                $Tabs = explode('/',$tab);
                $TabChecked = explode('.',$Tabs[2]);
                    if($TabChecked[1] ==  'php'){
                      $extTab=$TabChecked[0];
                      // echo ucwords(strtolower($extTab));
                      if(in_array(ucwords(strtolower($extTab)),$chkExistence)){
                        $allTabs[]=$extTab;
                      }
                echo "<span>";
              }
            }
            $allTabs;

            echo '<section class="closeLink">';
            $subLink = array();
            $subLinkName = array();
            $paging = glob("../tb/*.*");
            echo "<div class='each_page_ca'>";
              for ($i=0; $i<count($paging); $i++){
                  $pages = $paging[$i];
                  // echo $pages ."<br>";
                  $pag = explode('/',$pages);
                  // echo $pag[2]."<br>";
                  $page = explode('-',$pag[2]);
                  $PN = ucwords($page[0]).".php";
                  // echo $PN."<br>";
                  $loo = explode('-',$loop[5]);
                  $lo = ucwords($loo[0]);
                  // echo $lo."<br><br>";
                  $exPag = explode('.',$loo[1]);
                  $extPage = $exPag[0];
                  if($PN==$lo.'.php'){
                    $sec_nam = explode('.',$page[1]);
                      if($sec_nam[1] ==  'php'){              
                            // if(ucfirst($name) == ucwords($sec_nam[0])){                  
                              $subLinks[]=$pag[2];
                              $subLinkNames[]= ucwords($sec_nam[0]);
                          echo "</span>";
                    }
                  }
               }
            echo '</div>';
      echo '</section>';
?>

<div class="norBlur">          
<div class="wrapper row0">
<div id="topbar" class="hoc clear" style="margin-top:-20px">
    <div class="fl_left">
      <div class="myTopBar">
        <ul class="nospace">
          <li><a href="../<?php echo $genId ?>.php"><i class="fas fa fa-home fa-lg"></i></a></li>
              <?php
              foreach($allTabs as $tabb){
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
      <ul class="nospace">
        <button class="show_shotLink"><i class="fas fa fa-bars fa-2x"></i></button>
      </ul>
    </div>
  </div>

</div>
   
<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <div id="logo" class="one_half first">
      <h1 class="logoname"><a href="../<?php echo $genId ?>.php"><span><?php echo $_SESSION['in-shop_name'] ?></span>Kemon-Market</a><br><br>
      <?php echo ucwords('<h1 class="pageTitle">('.$extPage.')</h1>') ?></h1>
    </div>
    <div class="one_half">
      <ul class="nospace clear">
        <li class="one_half first">
          <div class="block clear"><i class="fas fa fa2 fa-phone"></i> <span><strong class="block">Call Us:</strong> <?php echo $_SESSION['in-phone'] ?></span></span> </div>
        </li>
        <li class="one_half">
          <div class="block clear"><i class="far fa fa2 fa-envelope"></i> <span><strong class="block"> Email:</strong> <?php echo $email ?></span></span> </div>
        </li>
      </ul>
    </div>

    </header>
  <nav id="mainav" class="hoc clear"> 
      <ul class="clear">
    <?php 
        for ($s=0; $s<count($subLinks); $s++){
        ?>
        <li><a href="<?php echo $subLinks[$s] ?>"><?php echo $subLinkNames[$s] ?></a></li>
      <?php
          }
        
     ?>
    </ul>
    
  </nav>
</div>
<div class="wrapper bgded overlay" style="background-image:url('<?php echo $Mypic[$myRand-1]?>');">
  <div id="pageintro" class="hoc clear"> 
    <article>
      <p style="letter-spacing:1px;text-transform:lowercase"><?php echo strtolower(substr($_SESSION['in-desc'],0,100))."[...]";?></p>
      <h3 class="heading"><?php echo $_SESSION['in-shop_name'] ?></h3>
      <p>Junction: <?php echo $_SESSION['in-junction'] ?><br>Bustop:<?php echo $_SESSION['in-bustop'] ?></p>
      <footer><a class="btn scrollto" href="#locMap">Show map</a></footer>
    </article>
  </div>
</div>
