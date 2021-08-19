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
            $shopNickArray      =   array();
            $distanceArray      =   array();

            $allRow = searchBusiness($conn,$Search);
            $queryRun = sizeof($allRow);            
            if ($queryRun > 0){
                $x = 0;
                foreach($allRow as $row) {
                    $latitude       =       $row["latitude"];
                    $longitude      =       $row["longitude"];
                    $distance       =   distance($latitude, $longitude, $usersLat, $usersLong);
                    $shopNickArray[]  =  $row["shop_nick"];
                    $distanceArray[]  =   $distance;
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
   


        $shopDistance = array();
        $count = count($shopNickArray);
        for($x = 0; $x < $count; $x++){
            $shopDistance[$distanceArray[$x].$x] = $shopNickArray[$x];
        }
        foreach($shopDistance as $key => $value){
            $output_key = substr($key, 0, -1);
            $output_value = $value;
        }
        ksort($shopDistance);




        $shopArray          =   array();
        $shopNickArray      =   array();
        $junctionArray      =   array();
        $bustopArray        =   array();
        $aboutArray         =   array();
        $picArray           =   array();
        $linkArray          =   array();
        $facebookArray      =   array();
        $whatsappArray      =   array();
        $categoryArray      =   array();
        $accountReadyArray  =   array();

        foreach($shopDistance as $sortedDistance){
          $searchBusinessByShopNick = searchBusinessByShopNick($conn,$sortedDistance);
          $id             =       $searchBusinessByShopNick[0]["id"];      
          $shop_name      =       $searchBusinessByShopNick[0]["shop_name"];
          $shop_nick      =       $searchBusinessByShopNick[0]["shop_nick"];
          $junction       =       $searchBusinessByShopNick[0]["junction"];
          $bustop         =       $searchBusinessByShopNick[0]["bustop"];
          $desc           =       $searchBusinessByShopNick[0]["our_offer"];
          $facebook       =       $searchBusinessByShopNick[0]["facebook"];
          $whatsapp       =       $searchBusinessByShopNick[0]["whatsapp"];
          $category       =       $searchBusinessByShopNick[0]['category'];
            
          $BusinessInfo   =   BusinessInfo($conn,$id);
          $pic            =       'up/'.$shop_nick.'/profile.png';
          $Subscribed     =       $BusinessInfo['Subscribed'];
                    
          $link           =       'up/'.$shop_nick.'/'.$shop_nick.'.php';
          
          $accRedy        = $BusinessInfo['acc_ready'];
          $_SESSION['ex'] = $BusinessInfo['page_exist'];

          if ($_SESSION['ex']==1){
              $accountReadyArray[] = $accRedy;
              $shopArray[]      = $shop_name;
              $shopNickArray[]  = $shop_nick;
              $junctionArray[]  = $junction;
              $bustopArray[]    = $bustop;
              $aboutArray[]     = $desc;
              $picArray[]       = $pic;
              $categoryArray[]  = $category;
              // $distanceArray[]  = $distance;
              $linkArray[]      = $link;
              $facebookArray[]  = $facebook;
              $whatsappArray[]  = $whatsapp;
          }
                    


        }



        if(isset($shopArray)){
          $arraySize=sizeof($shopArray);
        }else{
          $arraySize=0;
        }

      }else{
        echo "";
      }

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