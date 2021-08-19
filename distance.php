<?php

if(isset($_POST['send_to_email'])){
  require_once('functions.php');
    echo "yuyu";
    $name=    testInput($_POST['name']);
    $email=   testInput($_POST['email']);
    $subject=   testInput($_POST['subject']);
    $message=   testInput($_POST['message']);

    $newSubject  = "From Kemon Market -> customer message.".$subject."</h4>";
    $newMessage  = "
                      <section style='background-color:#000;border:2px solid #570e9b; padding:10px 25px; '>
                              
                      <div style='border:1px solid #eee;padding:30px;font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;'>
                      <h2 style='text-align:center;'></h2><br>
                      <h4 style='text-align:left; font-size:18px; color:#fff;'Name:".$name."! <br><br>Email:".$email."</h4>
                        <h5 style='font-size:15px;font-weight: normal;'>
                        ".
                        $message
                        ."
                        </h5>
                      </div>
                    </section>
                      
                  ";
    if(MyMailer($newSubject,'stephanyemmitty@gmail.com',$newMessage)){
          $Sent = "Your message has been sent. Thank you!";
    }else{
      $Sent = "Your message not sent. check your connection and try again!";
    }
}

?>





<?php 
    

          
    if(isset($_GET['err'])){
      $myErrNote = "popo";
      include_once('functions.php');
      $err = "Transaction not successful, poor connection <i class='ion-sad'></i>  ";
      myMessage("err","Error in Transaction",$err,"ion-android-cancel");
    }


    if(isset($_GET['warning'])){
      $myErrNote = "popo";
      include_once('functions.php');
      $err = "Take the proper step of payment. Click the button to make any tansaction";
      myMessage("warning","Warning",$err,"ion-android-warning");
    }

    $allSubscribers  =  allSubscribers($conn,$myId);
    if(isset($_GET['notice'])){
      $myErrNote = "popo";
      include_once('functions.php');
      $err = "We noticed that you are on ".$allSubscribers['type_of_sub']." months plan with ".$_SESSION['daysLeft']." left";
      myMessage("notice","Already Subscribed",$err,'ion-information-circled');
    }
  ?>

  <script>
<?php
if(isset($myErrNote)){
?>
    window.addEventListener('mouseup', function(event){
    if(event.target != document.querySelector('.myAlertbox') && event.target.parentNode != document.querySelector('.myAlertbox')){
    document.querySelector('.mainBox').style.display='none'
    document.querySelector('.kemBody').style.overflow='auto'
  }
})
<?php
}
?>

</script>












<!--  -->









<div class="footer-top">
            <div class="container">

              <div class="row">

                <div class="col-lg-6">

                  <div class="row">

                      <div class="col-sm-6">

                        <div class="footer-info">
                          <h3>Kemon</h3>
                          <p>Kemon-Market provides the easiest, fastest and most effective way to get any product you desire anywhere you are, even though you have no idea of the location to get it from. <br><br>If you open a webpage with us, we believe we can and will also provide you a better service</p>
                        </div>
                      </div>

                      <div class="col-sm-6">
                        <div class="footer-links">
                          <h4>Useful Links</h4>
                          <ul>
                            <li class="scrollto"><a href="index.php">Home</a></li>
                            <li class="scrollto"><a href="Register.php">Register</a></li>
                            <li class="scrollto"><a href="Register.php#team">Team</a></li>
                            <?php 
                              
                              $_SESSION['veri_payment'] = $myIdFetch['veri_payment'];
                              if($myIdFetch['veri_payment'] == "True"){
                                  echo "<li><a href='1/".$shop_nick.($user_id+30)."loader.php'>Dashboard</a></li>";
                              }else{
                                  echo "<li title='Register before setting your profile'class='scrollto'><a href='#about'>Dashboard</a></li>";
                              }
                            ?>
                            <li><a href="Agent.php">Agent</a></li>
                            <li><a href="Register.php#pricing">Subscriptions</a></li>
                          </ul>
                        </div>

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
                          <a href="https://twitter.com/oluwasusi_ola?s=09" class="twitter"><i class="fa fa-twitter"></i></a>
                          <a href="https://mobile.facebook.com/Stephanyemmitty" class="facebook"><i class="fa fa-facebook"></i></a>
                          <a href="https://api.whatsapp.com/send?phone=08147702684&text=Hi,%20from%20Kemon-Market.%20My%20name%20is%20" class="instagram"><i class="fa fa-whatsapp"></i></a>
                          <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                        </div>
                      </div>
                  </div>
                </div>
                <div class="col-lg-6">

                  <div class="form">
                    <?php if(isset($Sent)){echo $Sent; }?>
                    <h4>Send us a message</h4>
                    <p>You can send some text and we promise to take a proper step after seeing the message</p>
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

                      <div class="text-center"><button type="submit" name="send_to_email" title="Send Message">Send Message</button></div>
                    </form>
                  </div>

                </div>

                

              </div>

            </div>
          </div>



















          <?php

   
include('config/indexConfig.php');

if ($_SERVER['REQUEST_METHOD']=='GET'){
    
    if(isset($_GET['My_src_btn']) || isset($_GET['catSearch'])){
        $filForKey      =     array();
        $filForValue    =     array();
        $Gen            =     array();
        if(isset($_GET['catSearch'])){
          $Search          =     testInput($_GET['catName']);
          $usersLat        =     doubleval(testInput($_GET['lat']));
          $usersLong       =     doubleval(testInput($_GET['long']));
        }else{
          $Search          =     testInput($_GET['Search_Name']);
          $usersLat        =     doubleval(testInput($_GET['lat']));
          $usersLong       =     doubleval(testInput($_GET['long']));
        }

        if (strlen($Search) > 2){
            $shopArray          =   array();
            $shopNickArray      =   array();
            $junctionArray      =   array();
            $bustopArray        =   array();
            $aboutArray         =   array();
            $picArray           =   array();
            $linkArray          =   array();
            $facebookArray      =   array();
            $whatsappArray      =   array();
            $distanceArray      =   array();
            $LongitideArray     =   array();
            $categoryArray      =   array();
            $LatitudeArray      =   array();
            $accountReadyArray  =   array();

            $allRow = searchBusiness($conn,$Search);
            $queryRun = sizeof($allRow);            
            if ($queryRun > 0){
                $x = 0;
                  foreach($allRow as $row) {
                      $id             =       $row["id"];
                      $shop_name      =       $row["shop_name"];
                      $shop_nick      =       $row["shop_nick"];
                      $junction       =       $row["junction"];
                      $bustop         =       $row["bustop"];
                      $desc           =       $row["our_offer"];
                      $facebook       =       $row["facebook"];
                      $whatsapp       =       $row["whatsapp"];
                      $latitude       =       $row["latitude"];
                      $longitude      =       $row["longitude"];
                      $category       =       $row['category'];
                     
                      $distance       =   distance($latitude, $longitude, $usersLat, $usersLong);
                      $BusinessInfo   =   BusinessInfo($conn,$id);
                      $pic            =       'up/'.$shop_nick.'/profile.png';
                      $Subscribed     =       $BusinessInfo['Subscribed'];
                      
                      $link           =       'up/'.$shop_nick.'/'.$shop_nick.'.php';
                      
                      $accRedy        = $BusinessInfo['acc_ready'];
                      $_SESSION['ex'] = $BusinessInfo['page_exist'];
                      $accountReadyArray[] = $accRedy;
                      if ($_SESSION['ex']==1){
                      ?>
                  <div class="result" style="text-align:center;margin-left:30%; width:40%;">
                        <?php 
                      $accountReadyArray[] = $accRedy;
                      $shopArray[]      = $shop_name;
                      $shopNickArray[]      = $shop_nick;
                      $junctionArray[]  = $junction;
                      $bustopArray[]    = $bustop;
                      $aboutArray[]     = $desc;
                      $picArray[]       = $pic;
                      $categoryArray[]  = $category;
                      $distanceArray[]  = $distance;
                      $linkArray[]      = $link;
                      $facebookArray[]  = $facebook;
                      $whatsappArray[]  = $whatsapp;
              }
              ?>
      </section>
              </div>
              <?php
              }
      }else{
        $resultErr =  "<div class='search_err'>
             No result found
          </div>";
        }
    }else{
      $resultErr = "<div class='search_err'>
         Oops!!!,\"$Search\" is too short
      </div>";
    }
  }else{
    echo "";
  }
}
    if(isset($shopArray)){
        $arraySize=sizeof($shopArray);
        }else{
            $arraySize=0;
        }


        $allCategory = array();
        $AllCategory = AllCategory($conn);

        foreach($AllCategory as $rachRowCategory){
            $myUnfinshedCat = explode(',',$rachRowCategory["category"]);
            for($i = 0; $i <=count($myUnfinshedCat)-1; $i++){
                if(!in_array($myUnfinshedCat[$i],$allCategory)){
                $allCategory[] = $myUnfinshedCat[$i];
                }
            }
        }
 


?>