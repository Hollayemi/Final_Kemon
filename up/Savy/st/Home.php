// stylelint-disable property-blacklist, scss/dollar-variable-default

// SCSS RFS mixin
//
// Automated font-resizing
//
// See https://github.com/twbs/rfs

// Configuration

// Base font size
$rfs-base-font-size: 1.25rem !default;
$rfs-font-size-unit: rem !default;

// Breakpoint at where font-size starts decreasing if screen width is smaller
$rfs-breakpoint: 1200px !default;
$rfs-breakpoint-unit: px !default;

// Resize font-size based on screen height and width
$rfs-two-dimensional: false !default;

// Factor of decrease
$rfs-factor: 10 !default;

@if type-of($rfs-factor) != "number" or $rfs-factor <= 1 {
  @error "`#{$rfs-factor}` is not a valid  $rfs-factor, it must be greater than 1.";
}

// Generate enable or disable classes. Possibilities: false, "enable" or "disable"
$rfs-class: false !default;

// 1 rem = $rfs-rem-value px
$rfs-rem-value: 16 !default;

// Safari iframe resize bug: https://github.com/twbs/rfs/issues/14
$rfs-safari-iframe-resize-bug-fix: false !default;

// Disable RFS by setting $enable-responsive-font-sizes to false
$enable-responsive-font-sizes: true !default;

// Cache $rfs-base-font-size unit
$rfs-base-font-size-unit: unit($rfs-base-font-size);

// Remove px-unit from $rfs-base-font-size for calculations
@if $rfs-base-font-size-unit == "px" {
  $rfs-base-font-size: $rfs-base-font-size / ($rfs-base-font-size * 0 + 1);
}
@else if $rfs-base-font-size-unit == "rem" {
  $rfs-base-font-size: $rfs-base-font-size / ($rfs-base-font-size * 0 + 1 / $rfs-rem-value);
}

// Cache $rfs-breakpoint unit to prevent multiple calls
$rfs-breakpoint-unit-cache: unit($rfs-breakpoint);

// Remove unit from $rfs-breakpoint for calculations
@if $rfs-breakpoint-unit-cache == "px" {
  $rfs-breakpoint: $rfs-breakpoint / ($rfs-breakpoint * 0 + 1);
}
@else if $rfs-breakpoint-unit-cache == "rem" or $rfs-breakpoint-unit-cache == "em" {
  $rfs-breakpoint: $rfs-breakpoint / ($rfs-breakpoint * 0 + 1 / $rfs-rem-value);
}

// Responsive font-size mixin
@mixin rfs($fs, $important: false) {
  // Cache $fs unit
  $fs-unit: if(type-of($fs) == "number", unit($fs), false);

  // Add !important suffix if needed
  $rfs-suffix: if($important, " !important", "");

  // If $fs isn't a number (like inherit) or $fs has a unit (not px or rem, like 1.5em) or $ is 0, just print the value
  @if not $fs-unit or $fs-unit != "" and $fs-unit != "px" and $fs-unit != "rem" or $fs == 0 {
    font-size: #{$fs}#{$rfs-suffix};
  }
  @else {
    // Variables for storing static and fluid rescaling
    $rfs-static: null;
    $rfs-fluid: null;

    // Remove px-unit from $fs for calculations
    @if $fs-unit == "px" {
      $fs: $fs / ($fs * 0 + 1);
    }
    @else if $fs-unit == "rem" {
      $fs: $fs / ($fs * 0 + 1 / $rfs-rem-value);
    }

    // Set default font-size
    @if $rfs-font-size-unit == rem {
      $rfs-static: #{$fs / $rfs-rem-value}rem#{$rfs-suffix};
    }
    @else if $rfs-font-size-unit == px {
      $rfs-static: #{$fs}px#{$rfs-suffix};
    }
    @else {
      @error "`#{$rfs-font-size-unit}` is not a valid unit for $rfs-font-size-unit. Use `px` or `rem`.";
    }

    // Only add media query if font-size is bigger as the minimum font-size
    // If $rfs-factor == 1, no rescaling will take place
    @if $fs > $rfs-base-font-size and $enable-responsive-font-sizes {
      $min-width: null;
      $variable-unit: null;

      // Calculate minimum font-size for given font-size
      $fs-min: $rfs-base-font-size + ($fs - $rfs-base-font-size) / $rfs-factor;

      // Calculate difference between given font-size and minimum font-size for given font-size
      $fs-diff: $fs - $fs-min;

      // Base font-size formatting
      // No need to check if the unit is valid, because we did that before
      $min-width: if($rfs-font-size-unit == rem, #{$fs-min / $rfs-rem-value}rem, #{$fs-min}px);

      // If two-dimensional, use smallest of screen width and height
      $variable-unit: if($rfs-two-dimensional, vmin, vw);

      // Calculate the variable width between 0 and $rfs-breakpoint
      $variable-width: #{$fs-diff * 100 / $rfs-breakpoint}#{$variable-unit};

      // Set the calculated font-size.
      $rfs-fluid: calc(#{$min-width} + #{$variable-width}) #{$rfs-suffix};
    }

    // Rendering
    @if $rfs-fluid == null {
      // Only render static font-size if no fluid font-size is available
      font-size: $rfs-static;
    }
    @else {
      $mq-value: null;

      // RFS breakpoint formatting
      @if $rfs-breakpoint-unit == em or $rfs-breakpoint-unit == rem {
        $mq-value: #{$rfs-breakpoint / $rfs-rem-value}#{$rfs-breakpoint-unit};
      }
      @else if $rfs-breakpoint-unit == px {
        $mq-value: #{$rfs-breakpoint}px;
      }
      @else {
        @error "`#{$rfs-breakpoint-unit}` is not a valid unit for $rfs-breakpoint-unit. Use `px`, `em` or `rem`.";
      }

      @if $rfs-class == "disable" {
        // Adding an extra class increases specificity,
        // which prevents the media query to override the font size
        &,
        .disable-responsive-font-size &,
        &.disable-responsive-font-size {
          font-size: $rfs-static;
        }
      }
      @else {
        font-size: $rfs-static;
      }

      @if $rfs-two-dimensional {
        @media (max-width: #{$mq-value}), (max-height: #{$mq-value}) {
          @if $rfs-class == "enable" {
            .enable-responsive-font-size &,
            &.enable-responsive-font-size {
              font-size: $rfs-fluid;
            }
          }
          @else {
            font-size: $rfs-fluid;
          }

          @if $rfs-safari-iframe-resize-bug-fix {
            // stylelint-disable-next-line length-zero-no-unit
            min-width: 0vw;
          }
        }
      }
      @else {
        @media (max-width: #{$mq-value}) {
          @if $rfs-class == "enable" {
            .enable-responsive-font-size &,
            &.enable-responsive-font-size {
              font-size: $rfs-fluid;
            }
          }
          @else {
            font-size: $rfs-fluid;
          }

          @if $rfs-safari-iframe-resize-bug-fix {
            // stylelint-disable-next-line length-zero-no-unit
            min-width: 0vw;
          }
        }
      }
    }
  }
}

// The font-size & responsive-font-size mixin uses RFS to rescale font sizes
@mixin font-size($fs, $important: false) {
  @include rfs($fs, $important);
}

@mixin responsive-font-size($fs, $important: false) {
  @include rfs($fs, $important);
}
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        <a class="twitter-share-button"href="https://twitter.com/intent/tweet?text=Hello%20world"data-size="large">Tweet</a>
                  <div class="fb-share-button" data-href="<?php echo $_SERVER['PHP_SELF'].'/'.$allPic[$_SESSION['allrandRange0']-1] ?>" data-layout="button" data-size="small"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fwww.google.com%2Fsearch%3Fq%3Dshare%2Bbutton%2Bfacebook%26source%3Dlnms%26tbm%3Dvid%26sa%3DX%26ved%3D2ahUKEwi9892tuL_wAhVaAWMBHfIJC88Q_AUoAnoECAEQBA&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
                </div>
              </div>
            </div>
          </div>
          
          <div class="col-lg-4 col-md-6">
            <div class="speaker">
            <?php echo '<img src="'.$allPic[$_SESSION['allrandRange1']-1].'" alt="Speaker 1" height="350px !important" width="350px" class="picBox">'?>
              <div class="details">
              <?php echo '<h3><a href="'.$allLink[$_SESSION['allrandRange1']-1].'">'.ucwords($allName[$_SESSION['allrandRange1']-1]).'</a></h3>';?>
              <div class="social">
             <a href="<?php echo $row_id['facebook'] ?>"><i class="fa fa-facebook"></i></a>
             <?php echo '<a href="tel:'.$row_id['phone'].'"><i class="fa fa-phone"></i></a>'?>
             <?php echo '<a href="'.$row_id['whatsapp'].'"><i class="fa fa-whatsapp"></i></a>'?>
           </div>
              </div>
            </div>
          </div>
     <div class="col-lg-4 col-md-6">
       <div class="speaker">
       <?php echo '<img src="'.$allPic[$_SESSION['allrandRange2']-1].'" alt="Speaker 1" height="350px !important" width="350px" class="picBox">'?>
         <div class="details">
         <?php echo '<h3><a href="'.$allLink[$_SESSION['allrandRange2']-1].'">'.ucwords($allName[$_SESSION['allrandRange2']-1]).'</a></h3>';?>
         <div class="social">
             <a href="<?php echo $row_id['facebook'] ?>"><i class="fa fa-facebook"></i></a>
             <?php echo '<a href="tel:'.$row_id['phone'].'"><i class="fa fa-phone"></i></a>'?>
             <?php echo '<a href="'.$row_id['whatsapp'].'"><i class="fa fa-whatsapp"></i></a>'?>
           </div>
         </div>
       </div>
     </div>
    
     <div class="col-lg-4 col-md-6">
       <div class="speaker">
       <?php echo '<img src="'.$allPic[$_SESSION['allrandRange3']-1].'" alt="Speaker 1" height="350px !important" width="350px" class="picBox">'?>
         <div class="details">
         <?php echo '<h3><a href="'.$allLink[$_SESSION['allrandRange3']-1].'">'.ucwords($allName[$_SESSION['allrandRange3']-1]).'</a></h3>';?>

           <div class="social">
             <a href="<?php echo $row_id['facebook'] ?>"><i class="fa fa-facebook"></i></a>
             <?php echo '<a href="tel:'.$row_id['phone'].'"><i class="fa fa-phone"></i></a>'?>
             <?php echo '<a href="'.$row_id['whatsapp'].'"><i class="fa fa-whatsapp"></i></a>'?>
           </div>

         </div>
       </div>
     </div>

     <div class="col-lg-4 col-md-6">
       <div class="speaker">
       <?php echo '<img src="'.$allPic[$_SESSION['allrandRange4']-1].'" alt="Speaker 1" height="350px !important" width="350px" class="picBox">'?>
         <div class="details">
         <?php echo '<h3><a href="'.$allLink[$_SESSION['allrandRange4']-1].'">'.ucwords($allName[$_SESSION['allrandRange4']-1]).'</a></h3>';?>

           <div class="social">
             <a href="<?php echo $row_id['facebook'] ?>"><i class="fa fa-facebook"></i></a>
             <?php echo '<a href="tel:'.$row_id['phone'].'"><i class="fa fa-phone"></i></a>'?>
             <?php echo '<a href="'.$row_id['whatsapp'].'"><i class="fa fa-whatsapp"></i></a>'?>
           </div>

         </div>
       </div>
     </div>

     <div class="col-lg-4 col-md-6">
       <div class="speaker">
       <?php echo '<img src="'.$allPic[$_SESSION['allrandRange5']-1].'" alt="Speaker 1" height="350px" width="350px" class="picBox">'?>
         <div class="details">
         <?php echo '<h3><a href="'.$allLink[$_SESSION['allrandRange5']-1].'">'.ucwords($allName[$_SESSION['allrandRange5']-1]).'</a></h3>';?>

         <div class="social">
             <a href="<?php echo $row_id['facebook'] ?>"><i class="fa fa-facebook"></i></a>
             <?php echo '<a href="tel:'.$row_id['phone'].'"><i class="fa fa-phone"></i></a>'?>
             <?php echo '<a href="'.$_SESSION['whatsapp'].'"><i class="fa fa-whatsapp"></i></a>'?>
           </div>
           </div>
         </div>
       </div>
     </div>
    </section>
    
    <!--==========================
      Hotels Section
    ============================-->
    
    <!--==========================
      Gallery Section
    ============================-->
    <section id="gallery" class="wow fadeInUp">

      <div class="container">
        <div class="section-header">
          <h2>Gallery</h2>
          <p>Check our gallery from the recent events</p>
        </div>
      </div>

      <div class="owl-carousel gallery-carousel">

      <?php
      $Owl_AllPics = glob('pic/*.*');
        for($i=0; $i< count($Owl_AllPics); $i++){

      ?>
        <a href=" <?php echo $Owl_AllPics[$i]?> " class="venobox" data-gall="gallery-carousel"><img src="<?php echo $Owl_AllPics[$i]?>" width="250" height="270" alt=""></a>
      
      <?php
          }
      ?>
      
      </div>


    </section>    
    <section id="hotels" style="margin-top:-50px" class="section-with-bg wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <br><h2>Team</h2>
        </div>
          <?php $ShowTeam = glob("usersTeam/*.png") ?>
        <div class="row">
<?php
        
    for($c=0; $c<count($ShowTeam); $c++){
        $showT = explode('/',$ShowTeam[$c]);
        $showTe = explode('.',$showT[1]);
        $showTex = fopen('usersTeam/'.$showTe[0].".txt", "r");
        $showText = fgets($showTex);
        $showTexts=explode('---',$showText);
    ?>
          <div class="col-lg-<?php if(count($ShowTeam)<3){echo "5";}else{echo "4";} ?> col-md-6">
            <div class="hotel">
              <div class="hotel-img">
                <img src="<?php echo $ShowTeam[$c] ?>" alt="Team" style="height:400px;width:100%;" class="img-fluid">
              </div>
              <h3 style="text-align:center"><a href="tel:<?php echo $showTexts[2]?>"><?php echo $showTexts[0] ?></a></h3>
              <p style="text-align:center"><?php echo $showTexts[1] ?></p>
              <div style="text-align:center; margin-top:-10px; padding-bottom:20px">
                <a href="tel:<?php echo $showTexts[2]?>"><i class="mafa fa fa-phone"></i></a>
                <a href="mailto:<?php echo $showTexts[3]?>"><i class="mafa fa fa-envelope"></i></a>
              </div>
              
            </div>
          </div>
<?php

    }

?>
          <!-- <div class="col-lg-4 col-md-6">
            <div class="hotel">
              <div class="hotel-img">
              <img src="<?php echo $ShowTeam[1] ?>" alt="Team" class="img-fluid">
              </div>
              <h3><a href="https://mobile.facebook.com/holluwarsussystephenholluwasheunfunmie.thankgod">Oluwasusi Stephen Olayemi</a></h3>
              <div class="stars">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star-half-full"></i>
              </div>
              <p>Website Developer and data analyst</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6">
            <div class="hotel">
              <div class="hotel-img">
              <img src="<?php echo $ShowTeam[2] ?>" alt="Team" class="img-fluid">
              </div>
              <h3><a href="https://www.facebook.com/oludamiro.ayomidesamuel">Oludamiro Samuel Ayomide</a></h3>
              <div class="stars">
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
                <i class="fa fa-star"></i>
              </div>
              <p>Graphics Designer</p>
            </div>
          </div> -->

        </div>
      </div>

    </section>

    <section id="faq" class="wow fadeInUp">

      <div class="container">

        <div class="section-header">
          <h2>F.A.Q </h2>
        </div>

        <div class="row justify-content-center">
          <div class="col-lg-9">
              <ul id="faq-list">
              <?php
                  $loadFaq = glob("cp/*.txt");
                  
                  for($c=0; $c<count($loadFaq); $c++){
                    $loadF = explode('/',$loadFaq[$c]);
                    $showTe = explode('-',$loadF[1]);
                    if($showTe[0]=="Faq"){
                      // echo $showTe[0].'-'.$showTe[1].".txt";
                        $showTex = fopen('cp/'.$showTe[0].'-'.$showTe[1], "r");
                        $showText = fgets($showTex);
                        $showTexts=explode('===',$showText);
                        ?>
                        <li>
                          <a data-toggle="collapse" class="collapsed" href="#faq<?php echo $c?>"><?php echo ucwords($showTexts[0]) ?><i class="mafa fa fa-minus-circle"></i></a>
                          <div id="faq<?php echo $c?>" class="collapse" data-parent="#faq-list">
                            <p>
                            <?php echo ucfirst($showTexts[1]) ?>
                            </p>
                          </div>
                        </li>
                      <?php    
                    }            
                  } 
      ?>
              </ul>
          </div>
        </div>

      </div>

    </section>

    <!--==========================
      Subscribe Section
    ============================-->
    <section id="subscribe" style="background-image:url('st/img/body-bg.png')">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h2 ><a target="_blank" style="color:#fff;" href="https://awesome-wears.firebaseapp.com">Awesome wears</a></h2>
          <p>We get you a better outfits. We render Good services for our clients.</p>
        </div>
         <?php
              for($t= date("s"); $t <=52; $t++){
                  echo "<img src='../../pic/f".$t.".jpg' alt'Advert' class='wearsPic'";
            }     
            
        ?>
      </div>
    </section>

    <!--==========================
      Buy Ticket Section
    ============================-->
   
    <!--==========================
      Contact Section
    ============================-->
    <section id="contact" class="section-bg wow fadeInUp">

      <div class="container">

        <div class="section-header">
          <h2>Contact Us</h2>
          <p>Message to <?php echo $row_id['shop_name'] ?>.</p>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Address</h3>
              <address><?php echo $row_id['state'] .','. $row_id['country'] ?></address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Phone Number</h3>
              <p><a href="tel:<?php echo $row_id['phone'] ?>"><?php echo $row_id['phone'] ?></a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:<?php echo $sellerInfo['email'] ?>"><?php echo $sellerInfo['email'] ?></a></p>
            </div>
          </div>

        </div>

      <?php
        if(isset($_POST['send_message'])){
            echo "yuyu";
            $name     =     testInput($_POST['name']);
            $email    =     testInput($_POST['email']);
            $subject  =     testInput($_POST['subject']);
            $message  =     testInput($_POST['message']);

            $newSubject  = "<h4>From Kemon Market -> customer message.<br><br>".$subject."</h4>";
            $newMessage  = "<h5>Name:".$name."<br>Email:".$email."<br><br>Hi".$row_id['shop_name']."<br>".$message."</h4>";
            if(MyMailer($newSubject,'stephanyemmitty@gmail.com',$newMessage)){
                  $Sent = "Your message has been sent. Thank you!";
            }else{
              $sent = "Your message not sent. check your connection and try again!";
            }


        }else{
          
        }

        ?>
        <div class="frm">
          <div id="sendmessage"></div>
          <div id="errormessage"></div>
          <form action="" method="POST">
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
              <div class="validation"></div>
            </div>
            <div class="text-center"><button name='send_message' class="btn btn-primary" type="submit">Send Message</button></div>
          </form>
        </div>

      </div>
    </section>
    </main>
 























 
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
         $numTime = expl//
// Callouts
//

.bd-callout {
  padding: 1.25rem;
  margin-top: 1.25rem;
  margin-bottom: 1.25rem;
  border: 1px solid #eee;
  border-left-width: .25rem;
  @include border-radius();

  h4 {
    margin-top: 0;
    margin-bottom: .25rem;
  }

  p:last-child {
    margin-bottom: 0;
  }

  code {
    @include border-radius();
  }

  + .bd-callout {
    margin-top: -.25rem;
  }
}

// Variations
@mixin bs-callout-variant($color) {
  border-left-color: $color;

  h4 { color: $color; }
}

.bd-callout-info { @include bs-callout-variant($bd-info); }
.bd-callout-warning { @include bs-callout-variant($bd-warning); }
.bd-callout-danger { @include bs-callout-variant($bd-danger); }
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                         