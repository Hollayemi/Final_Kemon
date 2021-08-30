
      <footer id="footer" class="section-bg">

          <div class="flexFooter">


            <div class="FooterLeft">
              <div>
                <a href="#header" class="scrollto"><img src="img/myKemon.png" alt="" class="imgfluidFooter"></a>
              </div>
              <div class="social-links-s">
                  <a href="https://twitter.com/oluwasusi_ola?s=09" class="twitter"><i class="fa fa-twitter"></i></a>
                  <a href="https://mobile.facebook.com/Stephanyemmitty" class="facebook"><i class="fa fa-facebook"></i></a>
                  <a href="https://api.whatsapp.com/send?phone=08147702684&text=Hi,%20from%20Kemon-Market.%20My%20name%20is%20" class="instagram"><i class="fa fa-whatsapp"></i></a>
                  <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
              </div>
            </div>


            <div class="flexFooterContent">
              <div class="generalRight">
                <div>
                    <ul>
                      <h5>About us</h5>
                      <a href="terms-and-condition.html">Terms and Conditions</a>
                      <a href="privacy.html">Privacy policy</a>
                      <a href="#">About Kemon</a>
                      <a href="refund-policy.html">Refund Policy</a>
                      <a href="cookie-policy.html">Cookie policy</a>
                    </ul>
                </div>


                <div>
                    <ul>
                      <h5>Support</h5>
                      <a href="#">Contact us</a>
                      <a href="#">FAQ</a>
                      <a href="#">Safety Tips</a>
                    </ul>
                </div>
              </div>

              <div class="category">
                  <h5>Categories</h5><br>
                  <ul>
                    <a href="#">Cloth <i class="fa fa-caret-up"></i></a>
                    <a href="#">Beauty salon<i class="fa fa-caret-up"></i></a>
                    <a href="#">Restaurant<i class="fa fa-caret-up"></i></a>
                    <a href="#">Movie<i class="fa fa-caret-up"></i></a>

                    <a href="#">Fruits<i class="fa fa-caret-up"></i></a>
                    <a href="#">Bar<i class="fa fa-caret-up"></i></a>
                    <a href="#">Gym<i class="fa fa-caret-up"></i></a>
                    <a href="#">Cyber Cafe<i class="fa fa-caret-up"></i></a>

                    <a href="#">Hotel and Suites<i class="fa fa-caret-up"></i></a>
                    <a href="#">Clinic</a>
                    <a href="#">Convenience store<i class="fa fa-caret-up"></i></a>
                    <a href="#">Electronics<i class="fa fa-caret-up"></i></a>
                  </ul>
              </div>
            </div>
          </div>

          <div class="container">
            <div class="copyright">
              Designed with love by <strong>stephanyemmitty</strong>.
            </div>
                <div class="credits">
            </div>
          </div>
        </footer>
    




<script>
    var letsChat = document.querySelector(".letsChat")
    var chatPhone = document.querySelector(".chatPhone")
    var iPhoneButton = document.querySelector(".iPhoneButton")
            
    letsChat.addEventListener("click",function(){
      if(chatPhone.style.display=="none"){
        letsChat.style.right="-48px" 
        letsChat.style.borderRadius="5px" 
        letsChat.style.height="100px" 
        chatPhone.style.display="block"
        
        }else{
          
        }
    });


        iPhoneButton.addEventListener('click',function(){
            letsChat.style.right="0px"
            letsChat.style.borderRadius="50%" 
            letsChat.style.height="50px" 
            chatPhone.style.display="none"
        })
</script>

    <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

    <script src="lib/jquery/jquery.min.js"></script>
    <script src="lib/jquery/jquery-migrate.min.js"></script>
    <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/mobile-nav/mobile-nav.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>
    <script src="js/custom-file-input.js"></script>
    <!-- Contact Form JavaScript File -->
    <!-- <script src="./contactform/contactform.js"></script> -->
    <script src="js/main.js"></script>
    <script src="js/register.js"></script>
    <!-- <script src="node_modules/mysql/index.js"></script> -->
    <script data-main="./js/config" src="./js/require.js"></script>
    <?php include('./js/jsToSql.php')?>
    <?php include('pop-ups.php')?>
  </body>

</html>


