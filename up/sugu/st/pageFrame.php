<?php 
if(isset($_SESSION['user_info_id'])){
  $visitor_id = $_SESSION['user_info_id'];
}else{
  $visitor_id = -5;
}
?>
<div class="wrapper row2">
    <div class="sectiontitle">
      <h6 class="heading"><?php echo $name ?></h6>
      <p></p>
    </div>
    <ul class="nospace group forProdDisplay">
    <?php 
      $Pict=sizeof($Mypic);
      // echo $Pict;
      for ($i=$Pict; $i >=0; $i--){

        ?>
        <?php       
          echo '
          <style>
          #more'.$i.'{display:none;}
          button{
            height:25px !important;
          }
        </style>
        ';
        // echo $i;
        if(isset($Mypic[$i])){
          $remo = substr($Mycap[abs($i)],0,120);
          $txt = strlen( $Mycap[abs($i)]);
          $MyRealpic =  $Mycap[abs($i)];
          
  
          echo ' 
          <li class="one_quarter eacF" style"height:200px>
            <article style="padding-bottom:30px;">
              <figure><a href="#"><img src="../pic/'.$Mypic[abs($i)].'" class="pic_'.abs($i).'" style="height:200px; width:100%" alt=""></a>
                <figcaption class="amount_show">
                  <time datetime="2045-04-06T08:15+00:00"><em> '.$Myamt[$i].'</em></time>
                </figcaption>
              </figure>
              <div class="excerpt">
              <i class="cap-td"><p><span id="remo'.($i).'" style="display:block;">'.strtolower(str_replace('<br>', ' ', $remo)).'</span> <span id="dots'.abs($i).'" style="display:block">...</span><span id="more'.abs($i).'" style="display:none">'.$Mycap[$i].'</span></p></i>
              <footer>
              <center>'; 

            if($_COOKIE['_quex224My'] > 751){
            ?>
            <button onclick="myFunction('<?php echo abs($i)?>')" id="myBtn<?php echo abs($i)?>" class="readMoreBtn readMore1 btn">Read more</button>
          <?php
            }else{
              ?>
              <button onclick="myFunction('<?php echo abs($i)?>')" id="myBtn<?php echo abs($i)?>" class="readMoreBtn readMore1 btn">Read more</button>
        <?php
            }
          echo '
          </center>
            <div style="display:flex;padding:5px">
            <h4 id="media_a'.abs($i).'" style="display:none;margin:0px;"><a href=""><i class="anime fir fa fa-whatsapp"></a></i></h4>
            <h4 id="media_b'.abs($i).'" style="display:none;margin:0px;"><a href=""><i class="anime sec fa fa-facebook"></a></i></h4>
            <h4 id="media_c'.abs($i).'" style="display:none;margin:0px;"><button class="thr" onclick="copyToClipboard('.abs($i).')"><i class="anime  fa fa-copy"></i></button></h4>
          </div>
          <button id="share" onclick="myShare('.abs($i).')" class="sharebtn"><i class="fa fa-share"></i></button>
          
            <form action="../st/myAction.php" method="GET">
             <input type="text" id="cap'.abs($i).'" style="border:0px solid black;background-color:#fff; width:0px;position:absolute;"  readonly  name="text'.abs($i).'" value="'.$Mycap[$i].'">';
             if (isset($myVisitor) && $myVisitor == $visitor_id){
              echo '
             <input type="submit" name="deleteNo'.abs($i).'" class="btn btn2" style="height:30px;margin:-48px 0px 0px 77%;line-height:25px" value="X">
             ';
          }
             echo '</form>';
          
          echo "<h4 class='dateCenter'>".explode(" ",$Mydat[$i])[0].'</h4>
            </footer>
          </div>
        </article>
      </li>
      ';
    ?>
  <?php
      }
      
        }
        ?>        
  </div>
        <script>
          function myFunction(x){
            var p = x
            
            var remo = document.getElementById("remo"+p);
            var dots = document.getElementById("dots"+p);
            var moreText = document.getElementById("more"+p);
            var btnText =document.getElementById("myBtn"+p);
            // console.log(dots.style.display)
            if (dots.style.display === "block"){
                dots.style.display = "none";
                btnText.innerHTML = "Read less"; 
                moreText.style.display = "block";
                // console.log(moreText.style.display+"moreText")
                document.querySelector(".pic_"+p).style.boxShadow="0 4px 6px 0 rgba(0, 0, 0, 0.2), 0 6px 16px 0 rgba(0, 0, 0, 0.2)";
                remo.style.display = "none";
              }else{
                  dots.style.display = "block";
                  btnText.innerHTML = "Read more"; 
                  moreText.style.display = "none";
                  document.querySelector(".pic_"+p).style.boxShadow="none";
                  remo.style.display = "block";
                }
            }




            function myFunctionBig(x){
              var p = x
              console.log(p)
              if(p != -2){
                var changeText = document.getElementById("changeText");
                var changeImage = document.getElementById("changeImage");
                var passArrayPic = <?php echo json_encode($Mypic) ?>;
                var passArrayText = <?php echo json_encode($Mycap) ?>;
                changeImage.src="../pic/"+passArrayPic[parseInt(p)];
                changeText.innerHTML = passArrayText[parseInt(p)];
                var remo = document.getElementById("remo"+p);
                var dots = document.getElementById("dots"+p);
                var moreText = document.getElementById("more"+p);
                var btnText = document.getElementById("myBtn"+p);
                document.querySelector(".popIn").classList.toggle("popOut");
                document.querySelector(".top").style.overflow="hidden";
                
               
                }else{
                  document.querySelector(".popIn").classList.toggle("popOut");
                  document.querySelector(".top").style.overflow="auto";
                }
            }


            
            function copyToClipboard(copy){

                var copyId = "copy"+copy;
                // console.log(copyId)
                var copyText =  document.getElementById("cap"+copy)
                var edited = copyText.value.split('<br>').join('\n');
                copyText.select();
                copyText.setSelectionRange(0, 99999);
                document.execCommand("copy");

                // alert('Referral Link Copied '+ copyId.value)
                // console.log(edited)
            }
          
            function myShare(dab){
              var media_a = document.getElementById("media_a"+dab);
              var media_b = document.getElementById("media_b"+dab);
              var media_c = document.getElementById("media_c"+dab);
              
              if (media_a.style.display === "none"){
                
                media_a.style.display = "block"
                media_b.style.display = "block"
                media_c.style.display = "block"
              }else{
                media_a.style.display = "none"
                media_b.style.display = "none"
                media_c.style.display = "none"
              }
          }
        function toggleNav(){
          document.querySelector(".holla").classList.toggle("navbar--open");
        }
  
    //     function myFunction() {
    //         var newPageName = document.getElementById("newPageName"); 
    //         var newPageDis = document.getElementById("newPageDis");           
    
    //         if (newPageName.style.display === "none"){
    //             newPageName.style.display = "block";
    //             newPageButton.style.display = "block";
             
    //         } else {
    //             newPageName.style.display = "none";
    //             newPageButton.style.display = "none";
    //   }
    // }
    
    function showLinks(){
        document.querySelector(".closeLink").classList.toggle("tab-sec");
        document.querySelector(".body").classList.toggle("bodymi");

        var shwLnk = document.getElementById('shwLnk');
        if(shwLnk.style.display=="block"){
          shwLnk.style.display="none"
        }else{
          shwLnk.style.display="block"
        }
    }
 
</script>