<?php 
  require_once('refer.php');
  if(isset( $_COOKIE['Code-Agent'])){
    echo '<div class="letsChat"><img src="'. $_COOKIE["Code-Agent"].'" class="letsChatPic" alt="">
                <h4 class="activeness"></h4>
          </div>';
  }elseif(isset( $_COOKIE['Agent'])){
    echo '<div class="letsChat">
            <img src="'.$_COOKIE["Agent"].'" class="letsChatPic" alt="nn">
            <h4 class="activeness"></h4>
          </div>
     ';
  }else{
   echo '<button id="fakePhone" class="letsChat" style="right:0px; border:none;display:block" onclick="fakePhone()"><i class="letsChatPic material-icons " style="font-size:30px">chat <i class="cha fa fa-whatsapp"></i></i></button>';
  }
     ?>
    <section class='chatPhone' style="display:none">
    <div class="allChat">
        <div>
            <div class="iPhoneSpeaker">
              <div class="circ"></div>
              <div class="rect"></div>
            </div>
            <div class='chatKemonCover'>
                <i class='fa fa-whatsapp fa-3x'></i>
                <h5>Hello!, Click one of our member below to chat on whatsapp </h5>
            </div><br>
            
        </div>
        <a target="_blank" href="https://api.whatsapp.com/send?phone=+2348147702684&text=Hi,%20from%20Kemon-Market.%20I%20viewed%20your%20page.%20My%20name%20is">
        <div class='chatEachDiv'>
            <img src="img/chatStep.PNG" class="chatEachPic" alt="">
            <h5><br>08147702684</h5>
        </div>
        </a>

        <a target="_blank" href="https://api.whatsapp.com/send?phone=+2349034789500&text=Hi,%20from%20Kemon-Market.%20I%20viewed%20your%20page.%20My%20name%20is">
        <div class='chatEachDiv'>
            <img src="img/simple.png" class="chatEachPic" alt="">
            <h5><br>09034789500</h5>
        </div>
        </a>

        <a target="_blank" href="https://api.whatsapp.com/send?phone=+2348135001120&text=Hi,%20from%20Kemon-Market.%20I%20viewed%20your%20page.%20My%20name%20is">
        <div class='chatEachDiv'>
            <img src="img/evelyn.png" class="chatEachPic" alt="">
            <h5><br>08135001120</h5>
        </div>
        </a>

          <a target="_blank" href="https://api.whatsapp.com/send?phone=+2347068881292&text=Hi,%20from%20Kemon-Market.%20I%20viewed%20your%20page.%20My%20name%20is">
        <div class='chatEachDiv'>
            <img src="img/gbengene.jpg" class="chatEachPic" alt="">
            <h5><br>07068881292</h5>
        </div>
        </a>

        <button class='iPhoneButton'><i class="letsChatPic material-icons " style="font-size:30px">close</i></button>
     </div>
  </section>