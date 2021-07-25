<?php 
    session_start();
    $curPageName = substr($_SERVER["SCRIPT_NAME"],strpos($_SERVER["SCRIPT_NAME"],"/")+1);
    $deriveC = explode('/',$curPageName);
    $deriveCod = explode('.',$deriveC['3']);
    $deriveCode=$deriveCod[0];

    $mysqli=mysqli_connect('sql105.epizy.com','epiz_28257429','BHiMYLgFzV3pjb','epiz_28257429_market');
    $sql="SELECT * FROM agent WHERE referralLink='$deriveCode'";
    $run=mysqli_query($mysqli,$sql);
    $row = mysqli_fetch_assoc($run);
    
    $_SESSION['referralCookie'] = $deriveCode;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Referral</title>
    <link href="../lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,500,600,700,700i|Montserrat:300,400,500,600,700" rel="stylesheet">
    <link href="../lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
    <script>(function(e,t,n){var r=e.querySelectorAll("html")[0];r.className=r.className.replace(/(^|\s)no-js(\s|$)/,"$1js$2")})(document,window,0);</script>
    <link href="../css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="../referral.css">

</head>
<body>
<main>
    <div class="inner">
        <header id="navbar" class="fixedOnScroll">
            <nav>
                <div class="logo">
                    <h2>KEMON</h2>
                </div>
                
                <div class="signing-up">
                         <a class="referSignup" href="../create_acc.php">Sign Up</a>
                         <a href="../login_form.php">Sign In</a>
                </div>
                    
            </nav>
        </header>
        <div class="main-sec">
            <div class="kemon-Logo2 first">
                <h2>
                    KE<i style="color:rgb(69, 156, 255)">M</i>ON <i style="color:rgb(69, 156, 255)"> M</i>ARKET <br> Easy Market Soft Earning
                </h2>
                <h5 class='info-info'>Join Kemon Market today to start a stress free marketing</h5><br><br>
                <h3 class="getStarted"><a href="../index.php">Get Started</a></h3>
            </div>

            <div class="kemon-Logo2 mainPic">
                <img src="../<?php echo $row['agnPic'] ?>" height='200' width='200'  class="agn-pic" alt="pop">
                <h1 class="pic-bor"></h1><br>
                <h3 class="myUsername"><?php echo $row['agnUsername'] ?></h3>
                <h5 class="agentType">(Agent)</h5>
            </div>
        </div>
    </div>
</main>   
<section class="referral-icon" style="backround-color:#000">
    <div class="fa-flexbox">
        <div>
            <i class="fa-4x fa fa-wpforms"></i><br><br>
            <h5>To start with, Fill out the registration form to register for the program and get your  through email</h5>
        </div>
        <div>
            <i class="fa fa-4x fa-wechat middle-up"></i><br><br>
            <h5>share your referral link with friends and organisations via social media or by any means to benefit from Kemon Market online store  and a free search</h5>
        </div>
        <div>
            <i class="fa-5x fa fa-dollar"></i><br><br>
            <h5>You can earn up to ₦ 9500 in Kemon-Market for shops you refer in a week to register their shops. it's our way of saying "thanks" for spreading the good words and increasing the shop registered on Kemon. <br><br></h5> 
                <!-- Once we confirm your referral, we are going to note it and sum it up with the number of referral you have in that week. We will pay you at the end of every week if we find any referral of that week. To check your balance, you have it at the top right cornal of your phone-->
        </div>
    </div>
</section>







<footer id="footer" class="section-bg">
    <div class="footer-top">
      <div class="container">

        <div class="row">

          <div class="col-lg-6">

            <div class="row">

                <div class="col-sm-6">

                  <div class="footer-info">
                    <h3>Kemon</h3>
                    <p>Kemon-Market provides the easiest, fastest and most effective way to get any product of your desire anywhere you are, even though you have no idea of the location to get it from. <br><br>If you open a webpage with us, we believe we can, and we will provide you a beter service</p>
                  </div>
<!-- 
                  <div class="footer-newsletter">
                    <h4>Our Newsletter</h4>
                    <p></p>
                    <form action="" method="post">
                      <input type="email" name="email"><input type="submit"  value="Subscribe">
                    </form>
                  </div> -->

                

                
                  <div class="footer-links">
                    <h4>Contact Us</h4>
                    <p>
                      76,Olorunsogo Street,<br>
                      Okeigbo, Ondo State,<br>
                      Nigeria.<br>
                      <strong>Phone:</strong> +2348147702684<br>
                      <strong>Email: </strong> kemononlinemarket@gmail.com<br>
                    </p>
                  </div>

                  <div class="social-links">
                    <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                    <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                    <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
                    <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                  </div>

                </div>

            </div>

          </div>

          <div class="col-lg-6">

            <div class="form">
              
              <h4>Send us a message</h4>
              <p>You can send some text and we promise to take the proper step after seen the message</p>
              <form action="" method="post" role="form" class="contactForm">
                <div class="form-group">
                  <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
                  <div class="validation"></div>
                </div>
                <div class="form-group">
                  <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
                  <div class="validation"></div>
                </div>

                <div id="sendmessage">Your message has been sent. Thank you!</div>
                <div id="errormessage"></div>

                <div class="text-center"><button type="submit" title="Send Message">Send Message</button></div>
              </form>
            </div>

          </div>

          

        </div>

      </div>
    </div>

    <div class="container">
      <div class="copyright">
        Designed with love by <strong>stephanyemmitty</strong>.
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Rapid
        -->

      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>



  <?php include('../js/payment.php') ?>
  <script src="../lib/jquery/jquery.min.js"></script>
  <script src="../lib/jquery/jquery-migrate.min.js"></script>
  <script src="../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../lib/easing/easing.min.js"></script>
  <script src="../lib/mobile-nav/mobile-nav.js"></script>
  <script src="../lib/wow/wow.min.js"></script>
  <script src="../lib/waypoints/waypoints.min.js"></script>
  <script src="../lib/counterup/counterup.min.js"></script>
  <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="../lib/isotope/isotope.pkgd.min.js"></script>
  <script src="../lib/lightbox/js/lightbox.min.js"></script>
  <script src="../js/custom-file-input.js"></script>
  <script src="../contactform/contactform.js"></script>
  <script src="../js/main.js"></script>
  

</body>
</html>


<script>

    var prevScrollpos = window.pageYOffset;
    console.log(prevScrollpos)
    window.onscroll= function(){
        var currentScrollPos = window.pageYOffset;
        if(prevScrollpos > currentScrollPos){
            document.getElementById("navbar").style.top = "0";
        }else{
            // if(prevScrollpos<100)
            document.getElementById("navbar").style.top = "-75px";
        }
        prevScrollpos=currentScrollPos;

        // document.querySelector(".relativeOnStart").classList.toggle("fixedOnScroll");
    }
</script>
</body>
</html>
