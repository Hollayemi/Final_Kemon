<?php
     

          $shopName       =  testInput($_POST['shopName']);
          $shopOp         =  testInput($_POST['shopOp']);
          $shopCl         =  testInput($_POST['shopCl']);
          $shopCountry    =  testInput($_POST['shopCountry']);
          $shopState      =  testInput($_POST['shopState']);
          $shopJunction   =  testInput($_POST['shopJunction']);
          $shopBustop     =  testInput($_POST['shopBustop']);
          $shopCity       =  testInput($_POST['shopCity']);
          $shopVCT        =  testInput($_POST['shopVCT']);
          $shopFb         =  testInput($_POST['shopFb']);
          $shopWhat       =  testInput($_POST['shopWhat']);
          $shopPhn        =  testInput($_POST['shopPhn']);
          $shopLi         =  testInput($_POST['shopLi']);
          $ourOffer       =  testInput($_POST['our_offer']);


          $_SESSION['Username']='Username';
          $_SESSION['shop_name']='$Shop_Name';
          $_SESSION['shop_line']='$Shop_Line';
          $_SESSION['Email']='Email';


             if ($shopName !="" && $shopCountry != "" && $shopState != "" && $shopJunction !="" & $shopBustop != ""){

                if ($ourOffer == ''){
                    if(update_Profile($conn,$myId,$shopName,$shopOp,$shopCl,$shopState,$shopCountry,
                                   $shopVCT,$shopBustop,$shopJunction,$shopCity,$shopFb,
                                   $shopWhat,$shopPhn,$shopLi))
                    {
                        echo displayMessage('success',"Updated");
                        $eventType = "Updation";
                        $myAction = "Granted";
                        $activity = "Updation in website information";
                        updateActivite($conn,$eventType,$myAction,$myId,$activity);
                    }else{
                        $eventType = "Updation";
                        $myAction = "Denied";
                        $activity = "Error occured in Updating website info";
                        updateActivite($conn,$eventType,$myAction,$myId,$activity);
                    }

                    if(isset($_COOKIE['_categoriesEdit'])){ 
                        $category =  $_COOKIE['_categoriesEdit'];
                        $sqlCategory = "UPDATE category SET id='$user_id',category='$category' WHERE id = '$user_id'";
                        $runCategory = mysqli_query($mysqli,$sqlCategory);
                        if($runCategory){
                            // setcookie("_categoriesEdit",$category,time()-3600);
                            // $knwO = "popo";
                            // echo "<div class='loginStatus'>
                            //     <h4>Notice,</h4><br>
                            //     <h5>We noticed a change in your change in your category section.</h5>
                            //     <p>( Probably a mistake )</p>
                            // </div>";
                        }                        
                    }
                }else{
                    if(update_ProfileOffer($conn,$myId,$shopName,$shopOp,$shopCl,$shopState,$shopCountry,
                                   $shopVCT,$shopBustop,$shopJunction,$shopCity,$shopFb,
                                   $shopWhat,$shopPhn,$shopLi,$ourOffer))
                    {
                        echo displayMessage('success',"Updated");

                        $eventType = "Updation";
                        $myAction = "Granted";
                        $activity = "Updation in website information";
                        updateActivite($conn,$eventType,$myAction,$myId,$activity);
                                
                        if(isset($_COOKIE['_categories'])){ 
                            $category =  $_COOKIE['_categories'];
                            $sqlCategory = "UPDATE category SET id='$user_id',category='$category' WHERE id = '$user_id'";
                            $runCategory = mysqli_query($mysqli,$sqlCategory);
                            if($runCategory){
                                // setcookie("_categories","",time()-3600);
                                // $knwO = "popo";
                                // echo "<div class='loginStatus'>
                                //     <h4>Notice,</h4><br>
                                //     <h5>We noticed a change in your change in your category section.</h5>
                                //     <p>( Probably a mistake )</p>
                                // </div>";
                            }                        
                        }
                    }else{
                        $eventType = "Updation";
                        $myAction = "Denied";
                        $activity = "Error occured in Updating website info";
                        updateActivite($conn,$eventType,$myAction,$myId,$activity);
                    }

                }
            }else{
              echo "nothing is inserted";
            }      
  ?>



