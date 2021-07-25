<?php

   
include('./config.php');
function distance($lat1, $lon1, $lat2, $lon2, $unit) {

  $theta = $lon1 - $lon2;
  $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
  $dist = acos($dist);
  $dist = rad2deg($dist);
  $miles = $dist * 60 * 1.1515;
  $unit = strtoupper($unit);

  if ($unit == "K") {
      return ($miles * 1.609344);
  } else if ($unit == "N") {
      return ($miles * 0.8684);
  } else {
      return $miles;
  }
}

if ($_SERVER['REQUEST_METHOD']=='GET'){
    
    if(isset($_GET['My_src_btn']) || isset($_GET['catSearch'])){
        $filForKey      =     array();
        $filForValue    =     array();
        $Gen            =     array();
        if(isset($_GET['catSearch'])){
          $Search          =     $mysqli->real_escape_string($_GET['catName']);
         
        }else{
          $Search          =     $mysqli->real_escape_string($_GET['Search_Name']);
          $usersLat        =     doubleval($mysqli->real_escape_string($_GET['lat']));
          $usersLong       =     doubleval($mysqli->real_escape_string($_GET['long']));

          
        }
        if (strlen($Search) > 2){
            $shopArray        =   array();
            $junctionArray    =   array();
            $bustopArray      =   array();
            $aboutArray       =   array();
            $picArray         =   array();
            $linkArray        =   array();
            $facebookArray    =   array();
            $whatsappArray    =   array();
            $distanceArray    =   array();

            // $sql="SELECT id,shop_name,bustop,junction,our_offer,facebook,whatsapp,(3959 * acos(cos(radians($usersLat))*cos(radians(latitude))*cos(radians(longitude)) - radians($usersLong))
            //     +sin(radians($usersLat))*sin(radians(latitude))) AS distance
            //     FROM marketers
            //     WHERE our_offer LIKE '%$Search%' OR shop_name LIKE '%$Search%'";


            $sql="SELECT id,shop_name,bustop,junction,our_offer,facebook,whatsapp, distance($usersLat,$usersLong,latitude,longitude,N) AS distance
            FROM marketers
            WHERE our_offer LIKE '%$Search%' OR shop_name LIKE '%$Search%'";


            $run = mysqli_query($mysqli,$sql);
            $row = mysqli_fetch_assoc($run);
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
                      $distance       =       $row["distance"];

                      
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
                      $distanceArray[]  = $distance;
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