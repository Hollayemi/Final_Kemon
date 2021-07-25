<?php

$CityCat = $sqlCat="SELECT city FROM category WHERE category LIKE '$selectedCat'";
$runCat = mysqli_query($mysqli,$sqlCat);

$queryRunCat = mysqli_num_rows($runCat);  

if(isset($_POST['catSearch'])){
    $selectedCat = $_POST['catName'];
  
  
    $sqlCat="SELECT id FROM category WHERE category LIKE '$selectedCat'";
    $runCat = mysqli_query($mysqli,$sqlCat);

    $queryRunCat = mysqli_num_rows($runCat);     
    if ($queryRunCat > 0){
        $x = 0;
        while($row = mysqli_fetch_assoc($run)) {

        $sql="SELECT shop_name,bustop,junction,our_offer,facebook,whatsapp FROM marketers WHERE city LIKE '%$City%' AND our_offer LIKE '%$Search%' OR shop_name LIKE '%$Search%' AND city LIKE '%$City%' OR bustop LIKE '%$Search%' AND city LIKE '%$City%' OR junction LIKE '%$Search%' AND city LIKE '%$City%' and ;
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
        } 
    }
 }

?>