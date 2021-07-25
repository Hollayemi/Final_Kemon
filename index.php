<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kemon-Market</title>
    <link href="../img/km.png" rel="icon">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
    <link rel="stylesheet" href="indexx.css">
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    <div class="nameTop"><h2>KEMON</h2></div>

    <div class="scrolledHeader" id="scrolledHeader">
        <div class="leftNameHeader">Kemon market</div>
        <a href="Register.php" class="regBtnHeader">Get Started</a>
    </div>
    <div class="scrolledFooter" id="scrolledFooter">
        <a href="Register.php" class="">Get Started for FREE</a>    
    </div>
    <main>
        <div class="inner">
            <div class="Kem_header">
                <center>
                    <form action="index.php?Searchfor" method="GET" autocomplete="off" >
                        <input type="text" name="Search_Name" value="dove" placeholder="Search Kemon"><i class="ion-search myIons"></i><br>
                        <input type="text" id="btnLat" name="lat" value="6.5568767999999995" placeholder="city" style="display:none"></i><br>
                        <input type="text" id="btnLong" name="long" value="3.3718272" placeholder="city" style="display:none"></i><br>
                        <input class="My_src_btn" name='My_src_btn' type="submit" value="Search"></input>
                    </form>
                </center>
            </div>            
        </div>
    </main>
    <br><br><br>
    <?php
        include('./indexEngine.php')
    ?>
        <section class="myCategory">
            <h2 class="righrArr">></h2>
            <h2 class="leftArr"><</h2>
            <div class="inif">
                <?php 
                foreach($allCategory as $cat){
                ?>
                    <div class="inner_cat">
                        <img src="img/sd/<?php echo $cat?>.jpg" alt="">
                        <form action="" method="GET" >
                            <input type="text" name="catName" value="<?php echo $cat?>" style="display:none">
                            <input type="text" class="catLati" name="lat" value="" style="display:none">
                            <input type="text" class="catLong" name="long" value="" style="display:none">
                            <button type="submit" name="catSearch"><h5><?php echo substr($cat,0,25)?></h5></button>
                        </form>
                    </div>
                    <?php
                }
                    ?>
            </div>
        </section>
        <p style="margin-top:100px"></p>
        <section>
            <div class="flexSearched">
            <?php
                
                for($i=0; $i<$arraySize; $i++){
                ?>
                    <div class="flexSearchedDiv">
                        <div class="textInPic">
                            <div class="searchedPicFrame">
                                <div class="blackOverLay"></div>
                                <?php if(isset($picArray[$i])){?>
                                <div class="scalePic"><img src="up<?php echo $picArray[$i]?>" alt=""></div>
                                <?php }else{
                                    ?>
                                    <div class="scalePic"><img src="img/myKemon.png" alt=""></div>
                                    <?php
                                } ?>
                                <div class="myDesc">
                                    <h5>distance: <?php echo $distanceArray[$i]?></h5> 
                                    <h5>junction: <?php echo $junctionArray[$i]?></h5> 
                                    <h5>bustop: <?php echo $bustopArray[$i]?></h5> 
                                    <h5><?php echo substr($aboutArray[$i],0,15)."...[more]"?></h5>
                                </div>
                        </div>
                    </div>
                    <?php
                                    if( $_SESSION['er'] == 1 && $_SESSION['ex'] == 1 ){
                                    echo '<div class="browsedShopName">';
                                        echo '<a href="up/'.$linkArray[$i].' "><h4>'.ucwords($shopArray[$i]).'</h4></a>';
                                        echo '<a href="https://api.whatsapp.com/send?phone='.$whatsappArray[$i].'&text=Hi,%20from%20Kemon-Market.%20My%20name%20is%20"><i class="first fa fa-whatsapp"></i></a>';
                                        echo '<a href="'.$facebookArray[$i].'"><i class="fa fa-facebook"></i></a><br><br>
                                    </div>';
                                    }else{
                                    echo '<div class="browsedShopName">';
                                    echo '<h4>'.ucwords($shopArray[$i]).'</h4>';
                                    echo '<a href="https://api.whatsapp.com/send?phone='.$whatsappArray[$i].'&text=Hi,%20from%20Kemon-Market.%20My%20name%20is%20"><i class="first fa fa-whatsapp"></i></a>';
                                    echo '<a href="'.$facebookArray[$i].'"><i class="fa fa-facebook"></i></a><br><br>
                                </div>';
                                    }
                                ?>
                </div>
                <?php
                }

                if(isset($resultErr)){
                    echo $resultErr;
                }
                ?>
            
            </section>
</div>
<?php
    // include('./kem_footer.php');
?>








































<section class="indexFooter">
        <!-- <img src="img/whitedots.png" class="dots" alt=""> -->
        <center>
            <p class="indexAbout"><a href="#">Support</a> <a href="#">Privacy Policy</a>  <a href="#">About</a></p>
            <p class="copyright">&copy; copyright <?php echo date('Y') ?> <strong>Kemon Market</strong></p>
        </center>
</section>

<br><br><br>
</body>
</html>
<script src="js/index.js"></script>
</body>
</html>

