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
                      // $distanceArray[]  = $distance;
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