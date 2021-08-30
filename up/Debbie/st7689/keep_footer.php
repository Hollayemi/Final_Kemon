<footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <h3 style="color:red; underline:"><?php echo $_SESSION['in-shop_name'] ?></h3>
            <p><?php echo $_SESSION['in-desc'] ?></p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="fa fa-angle-right"></i> <a href="#">Home</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">About us</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Services</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="fa fa-angle-right"></i> <a href="#">Home</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">About us</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Services</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Terms of service</a></li>
              <li><i class="fa fa-angle-right"></i> <a href="#">Privacy policy</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>TheEvent</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=TheEvent
        -->
         <h5>kemon-market was designed by stephanyemmitty</h5>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="../st/lib/jquery/jquery.min.js"></script>
  <script src="../st/lib/jquery/jquery-migrate.min.js"></script>
  <script src="../st/lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../st/lib/easing/easing.min.js"></script>
  <script src="../st/lib/superfish/hoverIntent.js"></script>
  <script src="../st/lib/superfish/superfish.min.js"></script>
  <script src="../st/lib/wow/wow.min.js"></script>
  <script src="../st/lib/venobox/venobox.min.js"></script>
  <script src="../st/lib/owlcarousel/owl.carousel.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="../st/contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="../st/js/main.js"></script>
</body>

</html>
echo '
          <script>
          function myFunction'.abs(1-$i).'() {
            var remo = document.getElementById("remo'.abs(1-$i).'");
            var dots = document.getElementById("dots'.abs(1-$i).'");
            var moreText = document.getElementById("more'.abs(1-$i).'");
            var btnText =document.getElementById("myBtn'.abs(1-$i).'");

            if (dots.style.display === "none") {
                dots.style.display = "inline";
                btnText.innerHTML = "Read more"; 
                moreText.style.display = "none";
                remo.style.display = "inline";
              } else {
                  dots.style.display = "none";
                  btnText.innerHTML = "Read less"; 
                  moreText.style.display = "inline";
                  remo.style.display = "none";
                }
            }
            function myShare'.abs(1-$i).'(){
              var media'.abs(1-$i).'a = document.getElementById("media'.abs(1-$i).'a");
              var media'.abs(1-$i).'b = document.getElementById("media'.abs(1-$i).'b");
              var media'.abs(1-$i).'c = document.getElementById("media'.abs(1-$i).'c");
              if (media'.abs(1-$i).'a.style.display === "none"){
                console.log("ioioi")
                media'.abs(1-$i).'a.style.display = "block"
                media'.abs(1-$i).'b.style.display = "block"
                media'.abs(1-$i).'c.style.display = "block"
              }else{
                media'.abs(1-$i).'a.style.display = "none"
                media'.abs(1-$i).'b.style.display = "none"
                media'.abs(1-$i).'c.style.display = "none"
              }
          }



      

          </script>
          
          





          if(isset($Mypic[abs(3-$i)])){
        $remo = substr($Mycap[abs(3-$i)],0,80);
        $txt = strlen( $Mycap[abs(3-$i)]);
        $MyRealpic =  $Mycap[abs(3-$i)];
        $ti = explode('_This was uploaded on_',$Mycap[abs(3-$i)]);
        
        $tim =  $ti[1];
        $timi=explode('`for`',$ti[1]);
        $time = $timi[0];
        echo '
      <li class="one_quarter">
        <article style="position:relative">
          <figure><a href="#"><img src="'.($Mypic[abs(3-$i)]).'" style="height:200px; width:100%" alt=""></a>.
            <figcaption>
              <time datetime="2045-04-06T08:15+00:00"><strong>'.abs(2+$i).'</strong> <em>&#x20A6 '.$timi[1].'</em></time>
            </figcaption>
          </figure>
          <div class="excerpt" style="margin-top:-25px">
            <i class="cap-td"><p><span id="remo'.abs(3-$i).'" style="display:block">'.$remo.'</span> <span id="dots'.abs(3-$i).'" style="display:block">...</span><span id="more'.abs(3-$i).'" style="display:none">'.$ti[0].'</span></p></i>
            <footer>'; ?><button onclick="myFunction('<?php echo abs(3-$i)?>')" id="myBtn<?php echo abs(3-$i)?>" class="readMoreBtn">Read more</button>
            <?php echo '
            <div style="display:flex;padding:5px">
            <h4 id="media_a'.abs(3-$i).'" style="display:none"><a href=""><i class="anime fir fa fa-whatsapp"></a></i></h4>
            <h4 id="media_b'.abs(3-$i).'" style="display:none"><a href=""><i class="anime sec fa fa-facebook"></a></i></h4>
            <h4 id="media_c'.abs(3-$i).'" style="display:none"><a href=""><i class="anime thr fa fa-instagram"></a></i></h4>
          </div>
          <button id="share" onclick="myShare('.abs(3-$i).')" class="readMoreBtn" style="color:green;"><i class="fa fa-share"></i></button><br>';
          if ($user_id == $visitor_id){
            echo '<form action="../st/myAction.php" method="GET">
             <input type="text" style="border:none;background-color:#fff; display:none;" disabled="true" name="text'.abs(3-$i).'" value="'.$Mypic[abs(3-$i)].'">
             <input type="submit" name="deleteNo'.abs(3-$i).'" class="readMoreBtn btn" style="color:red;font-weight:bold;margin:-28px 0px 0px 70%" value="X">
           </form>
            ';
          }
          echo $time.'
            </footer>
          </div>
        </article>
      </li>
      ';
        }
        if(isset($Mypic[abs(2-$i)])){
          $remo = substr($Mycap[abs(2-$i)],0,80);
          $txt = strlen( $Mycap[abs(2-$i)]);
          $MyRealpic =  $Mycap[abs(2-$i)];
          $ti = explode('_This was uploaded on_',$Mycap[abs(2-$i)]);
          
          $tim =  $ti[1];
          $timi=explode('`for`',$ti[1]);
          $time = $timi[0];

      echo '
      
      <li class="one_quarter">
        <article>
          <figure><a href="#"><img src="'.$Mypic[abs(2-$i)].'" style="height:200px; width:100%" alt=""></a>.
            <figcaption>
              <time datetime="2045-04-06T08:15+00:00"><strong>'.abs(1+$i).'</strong> <em>&#x20A6 '.$timi[1].'</em></time>
            </figcaption>
          </figure>
          <div class="excerpt" style="margin-top:-25px">
            <i class="cap-td"><p><span id="remo'.abs(2-$i).'" style="display:block">'.$remo.'</span> <span id="dots'.abs(2-$i).'" style="display:block">...</span><span id="more'.abs(2-$i).'" style="display:none">'.$ti[0].'</span></p></i>
            <footer>'; ?><button onclick="myFunction('<?php echo abs(2-$i)?>')" id="myBtn<?php echo abs(2-$i)?>" class="readMoreBtn">Read more</button>
            <?php echo '
             <div style="display:flex;padding:5px">
             <h4 id="media_a'.abs(2-$i).'" style="display:none"><a href=""><i class="anime fir fa fa-whatsapp"></a></i></h4>
             <h4 id="media_b'.abs(2-$i).'" style="display:none"><a href=""><i class="anime sec fa fa-facebook"></a></i></h4>
             <h4 id="media_c'.abs(2-$i).'" style="display:none"><a href=""><i class="anime thr fa fa-instagram"></a></i></h4>
           </div>
           <button id="share" onclick="myShare('.abs(2-$i).')" class="readMoreBtn" style="color:green;"><i class="fa fa-share"></i></button><br>';
          if ($user_id == $visitor_id){
            echo '<form action="../st/myAction.php" method="GET">
             <input type="text" style="border:none;background-color:#fff; display:none;" disabled="true" name="text'.abs(2-$i).'" value="'.$Mypic[abs(2-$i)].'">
             <input type="submit" name="deleteNo'.abs(2-$i).'" class="readMoreBtn btn" style="color:red;font-weight:bold;margin:-28px 0px 0px 70%" value="X">
           </form>
            ';
          }
          echo $time.'
            </footer>
          </div>
        </article>
      </li>

        ';

        }
        
        if(isset($Mypic[abs(1-$i)])){
          
          $remo = substr($Mycap[abs(1-$i)],0,80);
          $txt = strlen( $Mycap[abs(1-$i)]);
          $MyRealpic =  $Mycap[abs(1-$i)];
          $ti = explode('_This was uploaded on_',$Mycap[abs(1-$i)]);
          
          $tim =  $ti[1];
          $timi=explode('`for`',$ti[1]);
          $time = $timi[0];
          echo '
      <li class="one_quarter">
        <article>
          <figure><a href="#"><img src="'.$Mypic[abs(1-$i)].'" style="height:200px; width:100%" alt=""></a>.
            <figcaption>
              <time datetime="2045-04-06T08:15+00:00"><strong>'.(abs($i)).'</strong> <em>&#x20A6 '.$timi[1].'</em></time>
            </figcaption>
          </figure>
          <div class="excerpt" style="margin-top:-25px">
            <i class="cap-td"><p><span id="remo'.abs(1-$i).'" style="display:block">'.$remo.'</span> <span id="dots'.abs(1-$i).'" style="display:block">...</span><span id="more'.abs(1-$i).'" style="display:none">'.$ti[0].'</span></p></i>
            <footer>'; ?><button onclick="myFunction('<?php echo abs(1-$i)?>')" id="myBtn<?php echo abs(1-$i)?>" class="readMoreBtn">Read more</button>
            <?php echo '
            <div style="display:flex;padding:5px">
            <h4 id="media_a'.abs(1-$i).'" style="display:none"><a href=""><i class="anime fir fa fa-whatsapp"></a></i></h4>
            <h4 id="media_b'.abs(1-$i).'" style="display:none"><a href=""><i class="anime sec fa fa-facebook"></a></i></h4>
            <h4 id="media_c'.abs(1-$i).'" style="display:none"><a href=""><i class="anime thr fa fa-instagram"></a></i></h4>
          </div>
          <button id="share" onclick="myShare('.abs(1-$i).')" class="readMoreBtn" style="color:green;"><i class="fa fa-share"></i></button><br>';
          if ($user_id == $visitor_id){
            echo '<form action="../st/myAction.php" method="GET">
             <input type="text" style="border:none;background-color:#fff; display:none;" disabled="true" name="text'.abs(1-$i).'" value="'.$Mypic[abs(1-$i)].'">
             <input type="submit" name="deleteNo'.abs(1-$i).'" class="readMoreBtn btn" style="color:red;font-weight:bold;margin:-28px 0px 0px 70%" value="X">
           </form>
            ';
          }
          echo $time.'
            </footer>
          </div>
        </article>
      </li>

      ';
        }