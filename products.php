<?php 
$near = 'tes';
include('kem_header.php')
?>


<div class="searBg">
<section class="svg">
			<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 319"><path fill=" rgb(100, 181, 247)" fill-opacity="1" d="M0,160L80,176C160,192,320,224,480,234.7C640,245,800,235,960,208C1120,181,1280,139,1360,117.3L1440,96L1440,0L1360,0C1280,0,1120,0,960,0C800,0,640,0,480,0C320,0,160,0,80,0L0,0Z"></path></svg>
		</section>
<div class="combineSearch">
		<div class="genSearchBtn">
        <form action="products.php?Searchfor" method="GET" autocomplete="off" >
          <!-- <div class="bg-tran">
            <div class ="search_pic" >
              <img class="src_img src_img2" src="pic/ad/search.png" alt="">
              <img class="km_img" src="pic/ad/km.png" alt="err">
            </div>
          </div> -->
          <div>
              <div class="searchInput">
                  <input type="text" name="Search_Name" value="" placeholder="search"required><i class="ion-search myIons"></i><br><br>
                  <input type="text" name="Search_City" value="" placeholder="city"required><i class="ion-map myIons"></i>
              </div>               
              <input class="My_src_btn" name='My_src_btn' type="submit" value="Search"></input>
          </div>
		  </form>
      </div>
      <div class="emptyDiv"><img src="img/SEO.png" alt=""></div>
</div>
    <br><br><br>
    </section>
<?php
$mysqli=mysqli_connect('localhost','root','','market');

if ($_SERVER['REQUEST_METHOD']=='GET'){
    
    if(isset($_GET['My_src_btn'])){
        $filForKey      =     array();
        $filForValue    =     array();
        $Gen            =     array();

        $Search          =     $mysqli->real_escape_string($_GET['Search_Name']);
        $City            =     $mysqli->real_escape_string($_GET['Search_City']);

        if (strlen($Search) > 2 || (strlen($City) > 2)){
      
          $shopArray      = array();
          $junctionArray  = array();
          $bustopArray    = array();
          $aboutArray     = array();
          $picArray       = array();
          $linkArray      = array();
          $facebookArray  = array();
          $whatsappArray  = array();
            $sql="SELECT id,shop_name,bustop,junction,our_offer,facebook,whatsapp FROM marketers WHERE city LIKE '%$City%' AND our_offer LIKE '%$Search%' OR shop_name LIKE '%$Search%' AND city LIKE '%$City%' OR bustop LIKE '%$Search%' AND city LIKE '%$City%' OR junction LIKE '%$Search%' AND city LIKE '%$City%'";
            $run = mysqli_query($mysqli,$sql);
            
            $queryRun = mysqli_num_rows($run);            
            if ($queryRun > 0){
                $x = 0;
                  while($row = mysqli_fetch_assoc($run)) {
                      $id             =       $row["id"];
                      $shop_name      =       $row["shop_name"];
                      $junction       =       $row["junction"];
                      $bustop         =       $row["bustop"];
                      $desc           =       $row["our_offer"];
                      $facebook       =       $row["facebook"];
                      $whatsapp       =       $row["whatsapp"];

                      
                      $sql2="SELECT my_pic,Subscribed,page_exist FROM users  WHERE id ='$id'";
                      $run2=mysqli_query($mysqli,$sql2);
                      $queryRun2 = mysqli_num_rows($run2);

                      while($row2 = mysqli_fetch_assoc($run2)) {
                        $pic            =       $row2["my_pic"];
                        $Subscribed     =       $row2['Subscribed'];
                      }

                    
                      $sql_link="SELECT My_page FROM users WHERE id='$id'";
                      $run_link=mysqli_query($mysqli,$sql_link);
                      $fetch_link = mysqli_fetch_array($run_link);
                      $link= $fetch_link['My_page'];
                      $_SESSION['lili']= $link;
                      $sql_does_my_page_exist   =   "SELECT page_exist,acc_ready From users Where My_page='$link'";
                      $run_does_my_page_exist   =   mysqli_query($mysqli,$sql_does_my_page_exist);
                      $row_page_exist           =   mysqli_fetch_array($run_does_my_page_exist);
                      // echo $row_page_exist['acc_ready'];
                      $_SESSION['er'] = $row_page_exist['acc_ready'];
                      $_SESSION['ex'] = $row_page_exist['page_exist'];
                      if ($_SESSION['ex']==1){
                      ?>
                  <div class="result" style="text-align:center;margin-left:30%; width:40%;">
                        <?php 
                      $prepic = explode('/',$_SESSION['lili']);
                      $dup_id = $prepic[0]-30;
                      $sql_pic="SELECT * FROM users WHERE id='$dup_id'";
                      $run_pic=mysqli_query($mysqli,$sql_pic);
                      $fetch_pic_name= mysqli_fetch_array($run_pic,MYSQLI_ASSOC);
                      
                      $myPicLin = $fetch_pic_name['my_pic'];
                      $myPicLink= explode('/up',$myPicLin);         
                      
                      $shopArray[]      = $shop_name;
                      $junctionArray[]  = $junction;
                      $bustopArray[]    = $bustop;
                      $aboutArray[]     = $desc;
                      if(isset($myPicLink[1])){
                      $picArray[]       = $myPicLink[1];
                      }
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
          echo "<div class='search_err'>";
            echo " No result found";
          echo "</div>";
        }
    }else{
      echo "<div class='search_err'>";
        echo " Oops!!!,\"$Search\" is too short";
      echo "</div>";
    }
  }else{
    echo "";
  }
}
if(isset($shopArray)){
$arraySize=sizeof($shopArray);
// echo $arraySize;
}else{
  $arraySize=0;
}
$allCategory = array();
  $sql_pica="SELECT category FROM category";
  $run_pica=mysqli_query($mysqli,$sql_pica);
  $fetch_pic_namea= mysqli_num_rows($run_pica);
  while($fetch_pic_n= mysqli_fetch_array ($run_pica)){

      $myUnfinshedCat = explode(',',$fetch_pic_n["category"]);
      for($i = 0; $i <=count($myUnfinshedCat)-1; $i++){
        if(!in_array($myUnfinshedCat[$i],$allCategory)){
          $allCategory[] = $myUnfinshedCat[$i];
        }
      }
  }
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
              <form action="" method="POST" >
                  <input type="text" name="catName" value="<?php echo $cat?>" style="display:none">
                  <button type="submit" name="catSearch"><h5><?php echo substr($cat,0,25)?></h5></button>
              </form>
          </div>
        <?php
      }
        ?>
  </div>
</section>


<?php

?>

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
        ?>
      
    </section>
</div>

<script>
        var hol = -70;
        document.querySelector('.righrArr').addEventListener('click', function(){
          document.querySelector('.inif').scrollLeft +=70
          hol +=70
          document.querySelector('.leftArr').style.opacity = "1"
          document.querySelector('.leftArr').style.visibility = "visible"
          if(document.querySelector('.inif').scrollLeft > 0){
              document.querySelector('.leftArr').style.opacity = "1"
          }
          if(hol > document.querySelector('.inif').scrollLeft){
            document.querySelector('.righrArr').style.opacity = "0"
            document.querySelector('.righrArr').style.visibility = "hidden"
          }
        })




        document.querySelector('.leftArr').addEventListener('click', function(){
          document.querySelector('.inif').scrollLeft -=70
          hol -=70
          document.querySelector('.righrArr').style.opacity = "1"
          document.querySelector('.righrArr').style.visibility = "visible"
          if(document.querySelector('.inif').scrollLeft == 0){
              document.querySelector('.leftArr').style.opacity = "0"
              document.querySelector('.leftArr').style.visibility = "hidden"
          }
        })


        geocode();

        function geocode(){
           var location = '76, olorunsogo street, okegbo';
           axios.get('https://maps.googleapis.com/maps/api/geocode/json',{
             params:{
               address : location,
               key : 'AIzaSyAMwNINVigpFFwSBmjLib4jr-oiAtN9H-4'

             }
           })
           .then(function(response){

              // console.log(response);
              console.log(response);

           })
           .catch(function(error){
            console.log(error)
           })
             
           }
</script>

   <?php
  // echo $fetch_pic_namea;
    include('kem_footer.php')
   ?>