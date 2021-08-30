<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Kemon-Market</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="Kemon,Kemon-market,Online business,showcasing,store,online store,business registrantion,registration,Business,legit money,
  agent, near place, buy, sell, product, brand" name="keywords">
  
  <meta content="This is a platform that helps in showcasing your products online. You can also get search for any product from the nearest store." name="description">

  <meta property="og:url"           content="https://www.kemon-market.com" />
  <meta property="og:type"          content="website" />
  <meta property="og:title"         content="Kemon-Market" />
  <meta property="og:description"   content="Kemon-market helps in showcasing your product to " />
  <meta property="og:image"         content="https://www.your-domain.com/path/image.jpg" />
  <link href="img/km.png" rel="icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- facebook sharer -->
  <div id="fb-root"></div>
  <script async defer crossorigin="anonymous" src="https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v11.0&appId=201688678534772&autoLogAppEvents=1" nonce="wOIS2gIf"></script>
  <!-- facebook sharer -->


  <script src="https://js.paystack.co/v1/inline.js"></script>
  <link href="https://fonts.googleapis.com/css2?family=Material+Icons"rel="stylesheet">
  <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
  <link href="css/style.css" rel="stylesheet">
  <link href="css/info.css" rel="stylesheet">
  <link href="css/style2.css" rel="stylesheet">
  <?php
  include('session.php');
  $MyProf =  '1/'.$username.($myId+30).'.php';
  $contents ="<?php include('Myprofile.php'); ?>";


  $MyLoader =  '1/'.$username.($myId+30).'loader.php';
  $contents2 ="<?php include('../loader.php');  ?>";
  if(file_put_contents($MyLoader,$contents2))
  if(file_put_contents($MyProf,$contents))

    if(isset($_POST['regBusiness'])){

        $Shop_Name    = testInput($_POST['Shop_Name']);
        $shop_nick    = testInput($_POST['aka']);
        $website      = testInput($_POST['website']);
        $country      = testInput($_POST['Country']);
        $state        = testInput($_POST['state']);
        $City         = testInput($_POST['City']);
        $Junction     = testInput($_POST['Junction']);
        $Bustop       = testInput($_POST['Bustop']);
        $VCT          = testInput($_POST['VCT']);
        $facebook     = testInput($_POST['Facebook']);
        $whatsapp     = testInput($_POST['Whatsapp']);
        $Phone        = testInput($_POST['BPhone']);
        $Offer        = testInput($_POST['Desc']);
        $categ        = $_POST['test'];
        $longitude    = testInput($_POST['longitude']);
        $latitude     = testInput($_POST['latitude']);

        $myVerff  =   marketersInfoByShopNick($conn,$shop_nick);
        if(sizeof(marketersInfo($conn,$myId)) < 1){
          
          if($myVerff['shop_nick'] != $shop_nick){
            $category = implode(',',$categ);
              if(!empty($Shop_Name) && !empty($shop_nick) && !empty($country) && !empty($state) && !empty($City) && !empty($Junction)
              && !empty($Bustop) && !empty($VCT) && !empty($facebook) && !empty($whatsapp) && !empty($Phone) && !empty($Offer) && !empty($longitude) && !empty($latitude)){
                setRegisteration($conn,$Shop_Name,$shop_nick,$website,$country,$state,$City,$Junction,$Bustop,$VCT,$facebook,
                $whatsapp,$Phone,$Offer,$myId,$longitude,$latitude,$category);
              }else{
                echo $Offer;
              }


              if(sizeof(allCategories($conn,$myId)) < 1){
                if(!empty($category)){
                  registerCategory($conn,$myId,$category);
                }
              }
          }else{
            echo "try with another fixed name";
          }
        }else{
          echo "account already exist";
        }
    }

      if(isset($reg)){
        include('whatsapp.php');
        echo '<link href="css/animate.css" rel="stylesheet">
              <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
              <script src="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.jquery.min.js"></script>
              <link href="https://cdn.rawgit.com/harvesthq/chosen/gh-pages/chosen.min.css" rel="stylesheet"/>
              <link rel="stylesheet" href="add.css">
    ';
      }
      if(isset($Agent)){
        echo '<link href="css/agent.css" rel="stylesheet">';
      }
  ?>
  
</head>
<body class="kemBody">
  <header id="header">

    <div id="topbar">
      <div class="container">
        <div class="social-links">
          <a href="https://twitter.com/oluwasusi_ola?s=09" class="twitter"><i class="fa fa-twitter"></i></a>
          <a href="https://mobile.facebook.com/Stephanyemmitty" class="facebook"><i class="fa fa-facebook"></i></a>
          <a href="https://api.whatsapp.com/send?phone=+2348147702684&text=Hi,%20from%20Kemon-Market.%20My%20name%20is%20" class="linkedin"><i class="fa fa-whatsapp"></i></a>
          <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
        </div>
      </div>
    </div>
    <div class="Mycontainer" style="width:100%">
      <div class="logo float-left" style="margin-left:5%">
        <!-- <h1 class="text-light"><a href="index.php" class="scrollto"><span>Ke<span style="color:skyblue">M</span>on</span></a></h1> -->
        <a href="#header" class="scrollto"><img src="img/kemon.png" alt="" class="imgfluid"></a>
      </div>
      <nav class="main-nav float-right d-none d-lg-block margin-rt">
        <ul>
          <?php
              if(isset($beg)){
            echo '<li><a href="index.php" style="color:rgb(109, 192, 240)">Home</a></li>';
              }else{
                echo '<li><a href="index.php">Home</a></li>';
              }
          ?>
          <?php
              if(isset($reg)){
            echo '<li class="active"><a href="Register.php">Register</a></li>';
              }else{
                echo '<li><a href="Register.php">Register</a></li>';
              }
          ?>
          <li><a href="Register.php#team">Team</a></li>
          <?php
              if(isset($Agent)){
                echo '<li class="active scrollto"><a href="Agent.php" style="color:rgb(109, 192, 240)">Agent</a></li>';
              }else{
                echo '<li class="scrollto"><a href="Agent.php">Agent</a></li>';
              }
            ?>        
          <li class="drop-down"><a href="">Xtra Plans</a>
            <ul>
              <li><a href=" Xtra_Memory.php">Purchase Xtra Memory</a></li>
              <li><a href="Xtra_Brand.php">Purchase Xtra Brands</a></li>
              <li><a href="Xtra_Product.php">Purchase Xtra Product</a></li>
              <li class="scrollto"><a href="#pricing">More</a></li>
            </ul>
          </li>
          <li><a href="#footer">Contact Us</a></li>
      <?php
                $_SESSION['veri_payment'] = $myIdFetch['veri_payment'];
                if($_SESSION['veri_payment'] == "True"){
                    echo "<li><a href='1/".$myIdFetch['username'].($myId+30)."loader.php'>Dashboard</a></li>";
                }else{
                    echo "<li title='Register before creating your profile'class='scrollto'><a href='Register.php#payNow'>Dashboard</a></li>";
                }
                if($myIdFetch['veri_payment'] == "True"){
                  echo "<li class='top drop-down float-rt'><a href='#'><img src='up/".$shop_nick."/profile.png' height='60' width='60' style=\"border-radius:50%;margin-top:-20px\" class='arrTop'></a>
                  <ul class='subscription  logout-left'>
                      <li class='top forPointer' data-toggle='modal' data-target='#logoutModal'><i class='fa fa-sign-out-alt '></i> Logout</li>
                  </ul>
                  </li>";
            }else{
                echo "<li class='top drop-down float-rt'><a href='#'><img src='img/profile.png' height='60' width='60' style=\"background-color:#000;border-radius:50%;margin-top:-20px\" class='arrTop'></a>
                <ul class='subscription  logout-left'>
                    <li class='top forPointer' data-toggle='modal' data-target='#logoutModal'><i class='fa fa-sign'></i> Logout</li>
                </ul>
                </li>";
              };
                      
            "
        </ul>
      </nav>
      
      ";
 ?>
</header>



