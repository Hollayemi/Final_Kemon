<?php

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
  <script src="../../lib/jquery/jquery.min.js"></script>
  <script src="../../lib/jquery/jquery-migrate.min.js"></script>
  <script src="../../lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../../lib/easing/easing.min.js"></script>
  <script src="../../lib/superfish/hoverIntent.js"></script>
  <script src="../../lib/superfish/superfish.min.js"></script>
  <script src="../../lib/wow/wow.min.js"></script>
  <script src="../../lib/venobox/venobox.min.js"></script>
  <script src="../../lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="../st/js/main.js"></script>
  <script src="../st/js/setup.js"></script>
<script type="text/javascript" src="../../v2.3.2/jquery.rateyo.js"></script>
  <script>
     <?php 
      if(isset($Pagehommie)){
      ?>  
          document.querySelector('.subscribeSignUp').addEventListener('click',function(){
          document.querySelector('.popLogin').style.display="block"
        })
      <?php 
            }
      ?>


  
  </script>

</body>

</html>

