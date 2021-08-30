<!DOCTYPE html>
<html lang="">
<head>
<title>Kemon-Market</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<?php
        $sc = "tru";
        session_start();
        include_once('configuration/config.php');
        include('in-session.php');
        include('layout/styles/layout.css.php');
        include('layout/styles/framework.css.php');
        include("dropdown.php");
    ?><br>
    <link rel="stylesheet" href="font-awesome.min.css">
    <link rel="stylesheet" href="css/mycss.css">

</head>
<body id="top">

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
          <li class="active"><a href="../pg/<?php echo $tabb?>.php"><?php echo $tabb?></a></li>
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
        <button onclick="showLinkMenu()" id="showLinkMe" class="show_shotLink"><i class="fas fa fa-bars fa-2x"></i></button>
      </ul>
    </div>
  </div>
</div>
<div class="wrapper row1">
  <header id="header" class="hoc clear"> 
    <div id="logo" class="one_half first">
      <h1 class="logoname"><a href="../<?php echo $genId ?>.php"><span><?php echo $row_id['shop_name'] ?></span>Kemon-Market</a></h1>
    </div>
    <?php 
    if(isset($_COOKIE['_quex224My'])){
      if($_COOKIE['_quex224My'] < 751 && isset($_SESSION['user_info_id'])){
        echo "<h2 class='rate_review' id='rateUs'>Rate us</h2>";
        include("../st/sec.php");
        ?>
        <div class="rateyo-readonly-widg myRater" style="block"><h4 id="ratingVeri"></h4></div>
      <form action="" method="POST">
        <input type="text" value="<?php echo $_SESSION['user_info_id'] ?>" name="raterID"  style="display:none">
        <input type="text" value="<?php echo $row_id['shop_name'] ?>" name="rateeShop"  style="display:none">
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
      <li><a href="../<?php echo $genId ?>.php">Home</a></li>
      <?php 
          
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
<div class="wrapper bgded overlay" style="background-image:url('<?php echo $_SESSION['myHomeBg'] ?>');">
  <div id="pageintro" class="hoc clear"> 
    <!-- ################################################################################################ -->
    <article>
    <p style="letter-spacing:1px;text-transform:lowercase"><?php echo strtolower(substr($row_id['our_offer'],0,100))."[...]";?></p>
      <h3 class="heading"><?php echo $row_id['shop_name'] ?></h3>
      <p>Junction: <?php echo $row_id['junction'] ?><br>Bustop:<?php echo $row_id['bustop'] ?></p>
      <footer><a class="btn scrollto" href="#locMap">Show map</a></footer>
    </article>
    
  </div>
</div>



<div class="wrapper row3">
  <main class="hoc container clear"> 
    <!-- main body -->
    <!-- ################################################################################################ -->
    <div class="sectiontitle">
      <h6 class="heading">Exploy</h6>
      <!-- <p>Mauris tempor aenean pretium sem et luctus semper justo velit</p> -->
    </div>
    <ul class="nospace group overview">
      <li class="one_third">
        <figure><a href="../tb/<?php echo $matchLink[$_SESSION['randRange0']-1] ?>"><img src="../pic/<?php echo $matchPic[$_SESSION['randRange0']-1]?>" style='height:350px;width:350px;' class="picBox" alt=""></a>
          <figcaption>
            <h6 class="heading"><a href=""><?php echo ucwords($matchName[$_SESSION['randRange0']-1]).'</a>' ?></h6>
            <p><?php echo $matchCap[$_SESSION['randRange0']-1] ?></p>
          </figcaption>
        </figure>
      </li>
      <li class="one_third">
        <figure><a href="../tb/<?php echo $matchLink[$_SESSION['randRange1']-1] ?>"><img src="../pic/<?php echo$matchPic[$_SESSION['randRange1']-1] ?>" style='height:350px;width:350px;' class="picBox" alt=""></a>
          <figcaption>
            <h6 class="heading"><a href=""><?php echo ucwords($matchName[$_SESSION['randRange1']-1]).'</a>' ?></h6>
            <p><?php echo $matchCap[$_SESSION['randRange1']-1] ?></p>
          </figcaption>
        </figure>
      </li>
      <li class="one_third">
        <figure><a href="../tb/<?php echo $matchLink[$_SESSION['randRange2']-1] ?>"><img src="../pic/<?php echo $matchPic[$_SESSION['randRange2']-1] ?>" style='height:350px;width:350px;' class="picBox" alt=""></a>
          <figcaption>
            <h6 class="heading"><a href="'"><?php echo ucwords($matchName[$_SESSION['randRange2']-1]).'</a>' ?></h6>
            <p><?php echo $matchCap[$_SESSION['randRange2']-1] ?>.</p>
          </figcaption>
        </figure>
      </li>
      <li class="one_third">
        <figure><a href="../tb/<?php echo $matchLink[$_SESSION['randRange3']-1] ?>"><img src="../pic/<?php echo $matchPic[$_SESSION['randRange3']-1]?>" style='height:350px;width:350px;' class="picBox" alt=""></a>
          <figcaption>
            <h6 class="heading"><a href=""><?php echo ucwords($matchName[$_SESSION['randRange3']-1]).'</a>' ?></h6>
            <p><?php echo $matchCap[$_SESSION['randRange3']-1] ?></p>
          </figcaption>
        </figure>
      </li>
      <li class="one_third">
        <figure><a href="../tb/<?php echo $matchLink[$_SESSION['randRange4']-1] ?>"><img src="../pic/<?php echo $matchPic[$_SESSION['randRange4']-1]?>" style='height:350px;width:350px;' class="picBox" alt=""></a>
          <figcaption>
            <h6 class="heading"><a href="'.$allLink[$_SESSION['allrandRange4']-1].'"><?php echo ucwords($matchName[$_SESSION['randRange4']-1]).'</a>' ?></h6>
            <p><?php echo $matchCap[$_SESSION['randRange4']-1] ?></p>
          </figcaption>
        </figure>
      </li>
      </li>
      <li class="one_third">
        <figure><a href="../tb/<?php echo $matchLink[$_SESSION['randRange5']-1] ?>"><img src="../pic/<?php echo $matchPic[$_SESSION['randRange5']-1]?>" style='height:350px;width:350px;' class="picBox" alt=""></a>
          <figcaption>
            <h6 class="heading"><a href=""><?php echo ucwords($matchName[$_SESSION['randRange5']-1]).'</a>' ?></h6>
            <p><?php echo $matchCap[$_SESSION['randRange5']-1] ?></p>
          </figcaption>
        </figure>
      </li>
    </ul>
    <!-- ################################################################################################ -->
    <!-- / main body -->
    <div class="clear"></div>
  </main>
</div>




<div class="wrapper row2">
  <section id="latest" class="hoc container clear"> 
    <!-- ################################################################################################ -->
    <div class="sectiontitle">
      <h6 class="heading">TEAM</h6>
      <p></p>
    </div>
    <?php $ShowTeam = glob("../usersTeam/*.png") ?>
    <ul class="nospace group">
    <?php
        for($c=0; $c<count($ShowTeam); $c++){
            $showT = explode('/',$ShowTeam[$c]);
            $showTe = explode('.',$showT[2]);
            $showTex = fopen('../usersTeam/'.$showTe[0].".txt", "r");
            $showText = fgets($showTex);
            $showTexts=explode('---',$showText);
        ?>
      <li class="one_third <?php if($c==0){echo "first";}?>">
        <article>
          <figure><a href="#"><img src="<?php echo $ShowTeam[$c] ?>"  style="height:400px;width:100%;" alt=""></a>
            <figcaption>
              <!-- <time datetime="2045-04-06T08:15+00:00"><strong>06</strong> <em>Apr</em></time> -->
            </figcaption>
          </figure>
          <div class="excerpt" style="text-align:center">
            <h6 class="heading"><?php echo $showTexts[0] ?></h6>
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
<?php include('pages_footer.php'); ?>