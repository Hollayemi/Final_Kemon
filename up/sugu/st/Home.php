<!DOCTYPE html>
<html lang="">
<head>
    <title>Kemon-Market</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <link rel="stylesheet" href="../v2.3.2/jquery.rateyo.min.css"/>
    <link rel="stylesheet" href="st/css/mycss.css"/>
    <?php
        $name     ="home";
        $nameHome = "set";
        include("st/dropdown.php");
        session_start();
        include('st/in-session.php');
        include('st/layout/styles/layout.css.php');
        include('st/layout/styles/framework.css.php');
        
        if(require_once('../../functions.php')){
          rating($_SESSION['in-shop_name']);
        }
      
    ?><br>
    <script>document.cookie = "_quex224My= "+screen.width</script>
    <script type="text/javascript" src="st/v2.3.2/jquery.min.js"></script>
    <script type="text/javascript" src="st/v2.3.2/jquery.rateyo.js"></script>
    <script type="text/javascript" src="st/js/main.js"></script>
    <link rel="stylesheet" href="st/font-awesome.min.css">
</head>
<body id="top">
<section class="shotLnk">
<div class="sho">
      <!-- <button id="showLinkMenu" style="position:absolute;top:30px; right:15px;font-size:30px" class="cancel_x">X</button> -->
       <li class="active"><a href="<?php echo $genId ?>.php">Home</a></li><br>
      <?php 
          for($a=0;$a<count($allMyReadyPageArr); $a++){
      echo '<li class="mainDropper"><a class="drop" href="../'.$genId.'/pg/'.$allMyReadyPageArr[$a].'.php">'. $allMyReadyPageArr[$a].' </a><i class="indDrop">></i>';
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
            echo "<a href='../../login_form.php' class='LLS'><h2>Logout</h2></a>";
          }else{
            echo " <h2 class='LLS'><a href='../../login_form.php'>Login</a></h2>";
          }
          echo "</center>"
      ?>
      </div>
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
            ?>

<!--================++++++++++++++++++++++++++ rating +++++++++++++++++++++++++++++++================================== -->
  <div class="shiftMain">
    <div class="sub-menuDiv" style="margin-left:;opacity:1;visibility:visible;display:none;">
      <div class="sub_links">
      <button id="showLinkMenu" class="cancel_x">X</button>
      <ul class="shoLinksUl">
            <li class="active shotHome" ><a href="<?php echo $genId ?>.php">Home</a></li><br>
            <?php 
                for($a=0;$a<count($allMyReadyPageArr); $a++){
            echo '<li class="mainDropper"><a class="drop" href="../'.$genId.'/pg/'.$allMyReadyPageArr[$a].'.php">'. $allMyReadyPageArr[$a].' </a><i class="indDrop">></i>';
                  echo "<ul>";
                    for($b=0;$b<count($allMyReadyTabArr); $b++){
                      $eacT = explode('-', $allMyReadyTabArr[$b]);
                      if(strtolower($eacT[0]) == strtolower($allMyReadyPageArr[$a])){
                          echo '<li class="sideBarDropDown" style="display:none"><a href="tb/'.strtolower($allMyReadyTabArr[$b]).'.php"> '.$eacT[1].'</a></li>';
                      }
                    }?>
              </ul>
            </li>
        </ul>
            <?php 
                }
                echo "<center><br><br>";
                if(isset( $_SESSION['user_info_id'])){
                  echo '<form method="POST" action="'.$_SERVER["PHP_SELF"].'">
                          <button type="submit" name="Newsletter" class="LLSa" value="submit">Subscribe</button>                   
                      </form>';
                  echo "<a href='../../login_form.php' class='LLS'><h2>Logout</h2></a>";
                }else{
                  echo " <h2 class='LLS'><a href='../../login_form.php'>Login</a></h2>";
                }
                echo "</center>"
            ?>
      </div>                         
    </div>
    <div class="sec-mainDiv">



      <div class="wrapper row0" style="margin-top:-20px">
      <div id="topbar" class="hoc clear">
          <div class="fl_left">
            <div class="myTopBar">
              <ul class="nospace">

                <li><a href="<?php echo $genId ?>.php"><i class="fas fa fa-home fa-lg"></i></a></li>
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
              
              <li>
              <?php
              require_once('in-session.php');
                    if(isset($_SESSION['user_info_id'])){
                      $nletterUsername = $_SESSION["in-username"];
                        echo '
                        <li style="margin-left:90px; margin-right:30px"><a href="../../exp.php">Logout</a></li>
                        <form method="POST" action="'.$_SERVER["PHP_SELF"].'">
                          <button type="submit" name="Newsletter" class="subscribeClass" style="position:absolute;right:20px;top:7px" value="submit">Subscribe</button>                   
                        </form>';
                        
                    }else{
                          echo '<li style="margin-left:90px; margin-right:30px;" class="loginNav"><a href="../../login_form.php">Login</a></li>';
                        }
                        ?>
                  </li>
              </ul>
            </div>
            <div class="fl_right">
          </div>
            <ul class="nospace">
              <button  class="show_shotLink"><i class="fas fa fa-bars fa-2x"></i></button>
              <h4 class="kmLogo">Kemon-Market</h4>
            </ul>
          </div>
        </div>
      </div>

      <a href="../../exp.php" class="popLogin"><h4>Login</h4></a>


      <div class="wrapper row1">
        <header id="header" class="hoc clear"> 
          <div id="logo" class="one_half first">
            <h1 class="logoname"><a href="../../Register.php"><span><?php echo $_SESSION['in-shop_name'] ?></span>Kemon-Market</a></h1>
          </div>
          <?php 
    if(isset($_COOKIE['_quex224My'])){
      if($_COOKIE['_quex224My'] < 751 && isset($_SESSION['user_info_id'])){
        echo "<h2 class='rate_review' id='rateUs'>Rate us</h2>";
        include("st/sec.php");
        ?>
        <div class="rateyo-readonly-widg myRater" style="block"><h4 id="ratingVeri"></h4></div>
      <form action="" method="POST">
        <input type="text" value="<?php echo $_SESSION['user_info_id'] ?>" name="raterID"  style="display:none">
        <input type="text" value="<?php echo $_SESSION['in-shop_name'] ?>" name="rateeShop"  style="display:none">
        <input type="text" value="" id="rateValueId" name="extRate" style="display:none">
        <input type="submit" value="Submit" class="btn submitRate" name="rateMyShop" style="display:none; height:40px;line-height:30px;margin-left:50px">

      </form>
        <?php
      }
    }
    
    ?>
          <div class="one_half">
            <ul class="nospace clear">
              <li class="one_half first">
                <div class="block clear"><i class="fas fa fa2 fa-phone"></i> <span><strong class="block">Call Us:</strong> <?php echo $_SESSION['in-phone'] ?></span></span> </div>
              </li>
              <li class="one_half">
                <div class="block clear"><i class="far fa fa2 fa-envelope"></i> <span><strong class="block"> Email:</strong> <?php echo $_SESSION['in-email'] ?></span></span> </div>
              </li>
            </ul>
          </div>
          <?php //include("st/dropdown.php") ?>
        </header>
        <nav id="mainav" class="hoc clear"> 
          <ul class="clear">
            <li class="active"><a href="<?php echo $genId ?>.php">Home</a></li>
            <?php 
                // print_r($allMyReadyPageArr);
                for($a=0;$a<count($allMyReadyPageArr); $a++){
                  if(strtolower($name) == strtolower($allMyReadyPageArr[$a])){
                    echo '<li class="active"><a class="drop" href="#">'. $allMyReadyPageArr[$a].'</a>';
                }else{
                  echo '<li><a class="drop" href="../'.$genId.'/pg/'.$allMyReadyPageArr[$a].'.php">'. $allMyReadyPageArr[$a].'</a>';
                }
                  echo "<ul>";
                    for($b=0;$b<count($allMyReadyTabArr); $b++){
                      $eacT = explode('-', $allMyReadyTabArr[$b]);
                      if(strtolower($eacT[0]) == strtolower($allMyReadyPageArr[$a])){
                          echo '<li><a href="../'.$genId.'/tb/'.strtolower($allMyReadyTabArr[$b]).'.php">-- '.$eacT[1].'</a></li>';
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
      <?php  
        if($_SESSION['bgPic'] == "fix"){
          echo '<div class="wrapper bgded overlay" style="background-image:url(\'homeBg.png\');">';

        }else{
          echo '<div class="wrapper bgded overlay" style="background-image:url(\''.$_SESSION["myHomeBg"].'\');">';
        }
      ?>
      
        <div id="pageintro" class="hoc clear"> 
          <!-- ################################################################################################ -->
          <article>
          <p style="letter-spacing:1px;text-transform:lowercase;width:70%"><?php echo substr($_SESSION['in-desc'],0,100)."[...]";?></p>
            <h3 class="heading" style="font-size:35px"><?php echo $_SESSION['in-shop_name'] ?></h3>
            <p>Junction: <?php echo $_SESSION['in-junction'] ?><br>Bustop:<?php echo $_SESSION['in-bustop'] ?></p>
            <footer><a class="btn backtotop sm" href="#locMap">Show map</a></footer>
          </article>
          
        </div>
      </div>

      <!-- ################################################################################################ -->
      <!-- ################################################################################################ -->
      <!-- ################################################################################################ -->
      <div class="wrapper row3">
        <main class="hoc container clear"> 
          <!-- main body -->
          <!-- ################################################################################################ -->
          <div class="sectiontitle">
            <h6 class="heading">Our Uploads</h6>
            <!-- <p>Mauris tempor aenean pretium sem et luctus semper justo velit</p> -->
          </div>
          <ul class="nospace group overview">
            <li class="one_third">
              <figure><a href="<?php echo $allLink[$_SESSION['allrandRange0']-1] ?>"><img src="<?php echo $allPic[$_SESSION['allrandRange0']-1]?>" style='height:350px;width:350px;' class="picBox" alt=""></a>
                <figcaption>
                  <h6 class="heading"><?php echo '<a href="'.$allLink[$_SESSION['allrandRange0']-1].'">'.ucwords($allName[$_SESSION['allrandRange0']-1]).'</a>' ?></h6>
                  <p>Congue quam erat et dui morbi at sapien non enim blandit.</p>
                </figcaption>
              </figure>
            </li>
            <li class="one_third">
              <figure><a href="<?php echo $allLink[$_SESSION['allrandRange1']-1] ?>"><img src="<?php echo $allPic[$_SESSION['allrandRange1']-1]?>" style='height:350px;width:350px;' class="picBox" alt=""></a>
                <figcaption>
                  <h6 class="heading"><?php echo '<a href="'.$allLink[$_SESSION['allrandRange1']-1].'">'.ucwords($allName[$_SESSION['allrandRange1']-1]).'</a>' ?></h6>
                  <p>Congue quam erat et dui morbi at sapien non enim blandit.</p>
                </figcaption>
              </figure>
            </li>
            <li class="one_third">
              <figure><a href="<?php echo $allLink[$_SESSION['allrandRange2']-1] ?>"><img src="<?php echo $allPic[$_SESSION['allrandRange2']-1]?>" style='height:350px;width:350px;' class="picBox" alt=""></a>
                <figcaption>
                  <h6 class="heading"><?php echo '<a href="'.$allLink[$_SESSION['allrandRange2']-1].'">'.ucwords($allName[$_SESSION['allrandRange2']-1]).'</a>' ?></h6>
                  <p>Congue quam erat et dui morbi at sapien non enim blandit.</p>
                </figcaption>
              </figure>
            </li>
            <li class="one_third">
              <figure><a href="<?php echo $allLink[$_SESSION['allrandRange3']-1] ?>"><img src="<?php echo $allPic[$_SESSION['allrandRange3']-1]?>" style='height:350px;width:350px;' class="picBox" alt=""></a>
                <figcaption>
                  <h6 class="heading"><?php echo '<a href="'.$allLink[$_SESSION['allrandRange3']-1].'">'.ucwords($allName[$_SESSION['allrandRange3']-1]).'</a>' ?></h6>
                  <p>Congue quam erat et dui morbi at sapien non enim blandit.</p>
                </figcaption>
              </figure>
            </li>
            <li class="one_third">
              <figure><a href="<?php echo $allLink[$_SESSION['allrandRange4']-1] ?>"><img src="<?php echo $allPic[$_SESSION['allrandRange4']-1]?>" style='height:350px;width:350px;' class="picBox" alt=""></a>
                <figcaption>
                  <h6 class="heading"><?php echo '<a href="'.$allLink[$_SESSION['allrandRange4']-1].'">'.ucwords($allName[$_SESSION['allrandRange4']-1]).'</a>' ?></h6>
                  <p>Congue quam erat et dui morbi at sapien non enim blandit.</p>
                </figcaption>
              </figure>
            </li>
            </li>
            <li class="one_third">
              <figure><a href="<?php echo $allLink[$_SESSION['allrandRange5']-1] ?>"><img src="<?php echo $allPic[$_SESSION['allrandRange5']-1]?>" style='height:350px;width:350px;' class="picBox" alt=""></a>
                <figcaption>
                  <h6 class="heading"><?php echo '<a href="'.$allLink[$_SESSION['allrandRange5']-1].'">'.ucwords($allName[$_SESSION['allrandRange5']-1]).'</a>' ?></h6>
                  <p>Congue quam erat et dui morbi at sapien non enim blandit.</p>
                </figcaption>
              </figure>
            </li>
          </ul>
          <!-- ################################################################################################ -->
          <!-- / main body -->
          <div class="clear"></div>
        </main>
      </div>
      <!-- ################################################################################################ -->
      <!-- ################################################################################################ -->
      <!-- ################################################################################################ -->
      <div class="wrapper row2">
        <section class="hoc container clear"> 
          <!-- ################################################################################################ -->
          <div class="sectiontitle">
            <h6 class="heading">Our deals</h6>
            <p>These are the list of what we do</p>
          </div>
          <div class="group center">
            <?php 
            for($s = 0; $s <= (count($splitCategory)-1); $s++){
              ?>
            <article class="<?php if((count($splitCategory)-1) < 2){echo "one_half";}else{echo "one_third";}?> <?php if($s == 0){echo "first";} ?>"><a class="ringcon btmspace-50" style="overflow:hidden" href="#"><img src="../../img/sd/<?php echo $splitCategory[$s] ?>.jpg" style="height:250px" alt=""></i></a>
              <h6 class="heading"><?php echo $splitCategory[$s] ?></h6>
              <!-- <p>Tortor proin sagittis mauris ac odio morbi ut massa donec suscipit eros ut justo etiam non orci nullam at tortor maecenas eu.</p> -->
            </article>
            <?php
            }
            ?>
          </div>
          <!-- ################################################################################################ -->
        </section>
      </div>
      <!-- ################################################################################################ -->
      <!-- ################################################################################################ -->
      <!-- ################################################################################################ -->
      <div class="wrapper gradient">
        <section id="testimonials" class="hoc container clear"> 
          <div class="sectiontitle">
            <h6 class="heading">Kemon Team</h6>
            <p></p>
          </div>
          <article class="one_quarter first">
            <blockquote>There is only one boss. The customer. And he can fire everybody in the company from the chairman on down, simply by spending his money somewhere else <b>We Value You Dear Customer</b></blockquote>
          <h6 class="heading">Oluwasusi Stephen Olayemi</h6>
            <em>Fullstack Developer</em></article>
          <article class="one_quarter">
            <blockquote>Execellent customer service is the number job in any company! It is the personality of the company and the reason customers come back. Without customers there is no company! <b>We Love You</b></blockquote>
          <h6 class="heading">Tolulope Gbenga Olaoluwa</h6>
            <em>Fullstack Developer</em></article>
      
        
          <article class="one_quarter">
            <blockquote>The sole reason we are in business is to make life less difficult for our client (to make it easier). speak simply, explain thoroughly, listen fully respond promptly and break the standard workflow when needed<b><br> Trust me, we got this</b></blockquote>
          <h6 class="heading">Abimbola Evelyn Boluwatife</h6>
            <em>UI/UX</em></article>
          <article class="one_quarter">
            <blockquote>Unless you love everybody you cant sell for anybody. We are are ready to give our best to our customers and we will be ecstastic if you ready to take it from us <br><b>we would love to build a long lasting relationship with you</b></blockquote>
          <h6 class="heading">Amuroko Kemisola Joy</h6>
            <em>Front-End Developer</em></article>
        </section>
      </div>





      <div class="wrapper row2">
        <section id="latest" class="hoc container clear"> 
          <div class="sectiontitle">
            <h6 class="heading">TEAM</h6>
            <p></p>
          </div>
          <?php $ShowTeam = glob("usersTeam/*.png") ?>
          <ul class="nospace group">
          <?php
              for($c=0; $c<count($ShowTeam); $c++){
                  $showT = explode('/',$ShowTeam[$c]);
                  $showTe = explode('.',$showT[1]);
                  $showTex = fopen('usersTeam/'.$showTe[0].".txt", "r");
                  $showText = fgets($showTex);
                  $showTexts=explode('---',$showText);
              ?>
            <li class="one_third <?php if($c==0){echo "first";}?> "style="border:2px solid #fff">
              <article>
                <figure><a href="#"><img src="<?php echo $ShowTeam[$c] ?>"  style="height:400px;width:100%;" alt=""></a>
                  <figcaption>
                    <!-- <time datetime="2045-04-06T08:15+00:00"><strong>06</strong> <em>Apr</em></time> -->
                  </figcaption>
                </figure>
                <div class="excerpt" style="text-align:center">
                  <h6 class="heading"><?php echo $showTexts[0] ?></h6>
                  <h6 class="heading"><?php echo $showTexts[1] ?></h6>
                  <ul class="nospace meta">
                    <li><a href="tel:<?php echo $showTexts[2]?>"><i style="font-size:20px" class="fas fa fa fa-phone"></i></a></li>
                    <li><a href="mailto:<?php echo $showTexts[3]?>"><i style="font-size:20px" class="fas fa fa-envelope"></i></a></li>
                  </ul>
                  <!-- <p>Vestibulum consequat praesent bibendum vehicula mi sed fermentum erat sit amet imperdiet dictum enim lectus [<a href="#">&hellip;</a>]</p> -->
                  <!-- <footer><a class="btn" href="#">Read More</a></footer> -->
                </div>
              </article>
            </li>
            <?php
              }
            ?>
          </ul>
          <!-- ################################################################################################ -->
        </section>
      </div>
  </div>
</div>
<?php include('st/pages_footer.php'); ?>