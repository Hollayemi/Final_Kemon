<div class="mapBodyBlack" style="visibility:hidden;display:none;">
   <div class="mainMap">
      <div class="removeMap">
          <i class="fa fa-remove removeMapIcon"></i>
      </div>
      <iframe width="100%" height="100%" src="https://maps.google.com/maps?q<?php echo $_SESSION['latitude'].','. $_SESSION['longitude']?>&output=embed" frameborder="0"></iframe>
   </div>
</div>



<div class="wrapper gradient">
  <section id="cta" class="hoc container clear"> 
    
    <div class="sectiontitle">
      <h6 class="heading">Contact us via</h6>
      <p>We are always at your service to reply any message</p>
    </div>
    <ul class="nospace clear">
      <li class="one_third first">
      <a href="tel:<?php echo $_SESSION['in-phone'] ?>" style="color:black"><div class="block clear"><i class="fas fa fa2 fa-phone"></i> <span><strong>Give us a call:</strong> <?php echo $_SESSION['in-shop_lines'] ?></span> </div></a>
      </li>
      <li class="one_third">
      <div class="block clear"><i class="fas fa fa2 fa-envelope"></i> <span><strong>Send us a mail:</strong> <?php echo $_SESSION['in-email'] ?></span> </div>
      </li>
      <li class="one_third">
        <div id="locMap" class="block clear"><i class="fas fa fa2 fa-map-marker"></i> <span><strong>Come visit us:</strong> Directions to</span><span class="mapAdd"><?php echo $_SESSION['in-city'] ?></span> </div>
      </li>
    </ul>
   
  </section>
</div>


<div class="wrapper row4">
  <footer id="footer" class="hoc clear"> 

    <div class="one_third first">
      <h1 class="logoname secLogoname"><span><?php echo $_SESSION['in-shop_name'] ?></span> Kemon-Market</h1>
      <p class="btmspace-30"><?php echo $_SESSION['in-shop_name']?>[<a href="#">&hellip;</a>]</p>
      <ul class="faico clear">
        <li><a class="faicon-dribble fa3" href="tel:<?php echo $_SESSION['in-shop_lines']?>"><i class="fas fa fa-phone"></i></a></li>
        <li><a class="faicon-facebook fa3" href="https://api.whatsapp.com/send?phone=<?php echo $_SESSION['in-whatsapp'] ?>&text=Hi,%20from%20Kemon-Market.%20My%20name%20is%20"><i class="fab fa fa-whatsapp"></i></a></li>
        <li><a class="faicon-google-plus fa3" href="https://<?php echo $_SESSION['in-facebook'] ?>"><i class="fab fa fa-facebook"></i></a></li>
        <li><a target="_blank" class="faicon-linkedin fa3" href="https://<?php echo $_SESSION['in-linked_in'] ?>"><i class="fab fa fa-linkedin"></i></a></li>
        <!-- <li><a class="faicon-twitter" href="#"><i class="fab fa-twitter"></i></a></li>
        <li><a class="faicon-vk" href="#"><i class="fab fa-vk"></i></a></li> -->
      </ul>
    </div>

    <?php

function repeatFooter($numTimes,$footerLinkName,$footerLink){
  if(!is_float($numTimes+1)){
  for($i=0; $i<$numTimes+1; $i++){
?>
 <div class="one_third">
      <h6 class="heading">Link<?php echo $i + 1 ?>  </h6>
    <ul class="nospace linklist">
   
      <?php
        if(isset($footerLinkName[(5*$i)+4])){
          echo '<li><i class="fa fa-angle-right"></i> <a href="'.$footerLink[5*$i].'">'.$footerLinkName[5*$i].'</a></li>';
        }
        ?>
      
        <?php
        if(isset($footerLinkName[(5*$i)+1])){
          echo '<li><i class="fa fa-angle-right"> </i> <a href="'.$footerLink[(5*$i)+1].'">'.$footerLinkName[(5*$i)+1].'</a></li>';
          // echo '<li><i class="fa fa-angle-right"></i><a href="'.$footerLink[(5*$i)+1].'">'.$footerLinkName[(5*$i)+1].'</a></li>';
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


<div class="one_third">
      <h6 class="heading">News Letter</h6>
      <p class="nospace btmspace-15">Drop your name and your email with <b><?php echo $_SESSION['in-shop_name'] ?></b> for updates</p>
      <form method="POST" action="<?php echo $_SERVER['PHP_SELF'] ?>">
        <fieldset>
          <button type="submit" class="btn readMoreBtn btnOnWhite" name="Newsletter" value="submit">Subscribe</button>
        </fieldset>
      </form>
    </div>

    
  </footer>
  <!-- <?php //include("v2.3.2/rating.php"); ?> -->
</div>
<div class="wrapper row5">
  <div id="copyright" class="hoc clear"> 
    <p class="fl_left" style="color:blue"><i class="fa fa-heart" style="color:Red"></i> stephanyemmitty</p>
    <p class="fl_right powered"> Powered by kemon-Market &copy; <?php echo date('Y') ?> <strong><?php echo $_SESSION['in-shop_name'] ?></strong></p>
  </div>
</div>
<a id="backtotop" href="#top"><i class="fas fa-chevron-up"></i></a>
<!-- JAVASCRIPTS -->



<script>
 document.querySelector(".show_shotLink").addEventListener('click', function(){
      document.querySelector(".sub-menuDiv").style.height="100%"
      document.querySelector(".sec-mainDiv").style.marginTop="calc(100% + 40px)"
      var Check = 1;
    });
  document.querySelector(".cancel_x").addEventListener('click', function(){
      document.querySelector(".sub-menuDiv").style.height="0px"
      document.querySelector(".sec-mainDiv").style.marginTop="-20px"
    });
  
    
    if(typeof Check !== "undefined"){
    

        window.addEventListener('mouseup', function(e){
          if(e.target  != document.querySelector(".shotLnk") && e.target.parentNode  != document.querySelector(".shotLnk")){
            document.querySelector(".show_shotLink").style.display="block"
            document.querySelector(".shotLnk").style.right="-70%"
          }

        })
    }
    document.querySelector('.mapAdd').addEventListener('click', function(){
      
      document.querySelector('.mapBodyBlack').style.display="flex"
      document.querySelector('.mapBodyBlack').style.visibility="visible"
    })
    document.querySelector('.removeMapIcon').addEventListener('click', function(){
      
      document.querySelector('.mapBodyBlack').style.display="none"
      document.querySelector('.mapBodyBlack').style.visibility="hidden"
    })
</script>
<?php
if(isset($nameHome)){
?>
    <script type="text/javascript" src="st/jquery.min.js"></script>
    <script type="text/javascript" src="../v2.3.2/jquery.rateyo.js"></script>
    <script src="st/layout/scripts/jquery.backtotop.js"></script>
    <script src="st/layout/scripts/jquery.mobilemenu.js"></script>
    <script src="../lib/wow/wow.js"></script>
    <script src="../lib/venobox/venobox.js"></script>
    <script src="../lib/venobox/venobox.min.js"></script>
    <script src="../lib/wow/wow.min.js"></script>
<?php
}else{
?>
    <script type="text/javascript" src="../st/jquery.min.js"></script>
    <script type="text/javascript" src="../st/v2.3.2/jquery.rateyo.js"></script>
    <script src="../st/layout/scripts/jquery.backtotop.js"></script>
    <script src="../st/layout/scripts/jquery.mobilemenu.js"></script>

<?php
}
?>
  <script>
    if(localStorage.getItem('rate') != null){
      document.querySelector('.myRater').style.display="none"
    }else{
      document.querySelector('.myRater').style.display="block"
    }
      $(function () {
        var rating = 0;
        $(".rateyo-readonly-widg").rateYo({
          rating: rating,
          numStars: 5,
          precision: 2,
          minValue: 1,
          maxValue: 6
        }).on("rateyo.change", function (e, data) {
          document.getElementById('rateValueId').value=data.rating
          if(data.rating > 0){
            document.querySelector('.submitRate').style.visibility="visible"
          }else{
            document.querySelector('.submitRate').style.visibility="hidden"
          }
        });
      });

    $(function () {
      var chk = localStorage.getItem('rate')
      
     if(chk == null){
        var rateYoInstance = chk
        console.log(rateYoInstance)
        $('.rating_star').css('display','none')
      $("#rateYo").rateYo({
        fullStar: false,
        onSet: function (rating,rateYoInstance){
          // alert(rating)
          localStorage.setItem('rate',rating)

        }
      });
     }else{
       var chosen_index = chk-1;
       for(var i= 0; i <= chosen_index; i++){
        $('.rating_star').css('display','block')
       $('.fa-star:eq('+i+')').css('color','green')
     }
    }
    });

  </script>
</body>
</html>